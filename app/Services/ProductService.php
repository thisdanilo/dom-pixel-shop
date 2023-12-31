<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductService
{
    /**
     * Cadastra ou atualiza o registro
     */
    public function updateOrCreate(array $request, int $id = null): void
    {
        DB::beginTransaction();

        try {
            $data = [
                'name' => $request['name'],
                'price' => $request['price'],
                'description' => $request['description'],
                'stock' => $request['stock'],
            ];

            Product::updateOrCreate(['id' => $id], $data);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            abort(500);
        }
    }

    /**
     * Exclui o registro
     */
    public function delete(Product $product): void
    {
        DB::beginTransaction();

        try {
            $product->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            abort(500);
        }
    }
}
