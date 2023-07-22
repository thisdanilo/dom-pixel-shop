@extends('dashboard.master')

@section('title', 'Catálogo de Produtos')

@section('breadcrumb')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb d-sm-flex align-items-center justify-content-between mb-4">
            <li class="breadcrumb-item">Painel de Controle <span>/</span> Catálogo de Produtos</li>
        </ol>
    </nav>
@endsection

@section('content')

    {{-- Dados do Catálogo de Produtos --}}
    @include('admin.product.partials._product', ['show' => true])

    <div class="row mt-3">
        <div class="col-md-12">
            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">
                Editar
            </a>
        </div>
    </div>

@endsection

@section('footer-extras')
    <script src="{{ mix('js/product.js') }}"></script>
@endsection
