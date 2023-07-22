<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function __construct(
        protected Product $product,
        protected ProductService $product_service,
    ) {
    }

    /** Tela inicial */
    public function index(): View
    {
        return view('admin.product.index');
    }

    /**
     * Dados da tela inicial
     *
     * @codeCoverageIgnore
     */
    public function datatable(): JsonResponse
    {
        $model = $this->product->query();

        return DataTables::of($model)
            ->filterColumn(
                'price',
                function ($q, $keyword) {
                    $formatted_price = str_replace(',', '.', str_replace('.', '', $keyword));

                    $q->where('price', 'LIKE', '%'.$formatted_price.'%');
                }
            )
            ->editColumn('price', function ($product) {
                return $product->formatted_price;
            })
            ->addColumn('action', function ($model) {
                return view('admin.product.partials._action', compact('model'))->render();
            })
            ->rawColumns(['action'])
            ->make();
    }

    /** Tela de cadastro */
    public function create(): View
    {
        return view('admin.product.create');
    }

    /** Cria o registro */
    public function store(ProductRequest $request): RedirectResponse
    {
        $this->product_service->updateOrCreate($request->all());

        notify()->success('Cadastro realizado com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('product.index');
    }

    /** Tela de visualização */
    public function show(int $id): View
    {
        $product = $this->product->findOrFail($id);

        return view('admin.product.show', compact('product'));
    }

    /** Tela de edição */
    public function edit(int $id): View
    {
        $product = $this->product->findOrFail($id);

        return view('admin.product.edit', compact('product'));
    }

    /** Atualiza o registro */
    public function update(ProductRequest $request, int $id): RedirectResponse
    {
        $product = $this->product->findOrFail($id);

        $this->product_service->updateOrCreate($request->all(), $product->id);

        notify()->success('Atualização realizada com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('product.edit', $product->id);
    }

    /** Remove o registro */
    public function delete(int $id): RedirectResponse
    {
        $product = $this->product->findOrFail($id);

        $this->product_service->delete($product);

        notify()->success('Exclusão realizada com sucesso! ⚡️ ', 'Sucesso');

        return redirect()->route('product.index');
    }
}
