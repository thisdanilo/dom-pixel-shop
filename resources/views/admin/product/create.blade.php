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
    {{-- Respostas --}}
    @include('dashboard.partials.errors')

    <form id="form" method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">

        {{-- Elementos Ocultos --}}
        @csrf

        {{-- Dados do Catálogo de Produtos--}}
        @include('admin.product.partials._product')

        {{-- Botão --}}
        <div class="row mt-3">
            <div class="col-md-12">
                <button class="ladda-button btn btn-success" dir="ltr" data-style="expand-left">
                    Cadastrar
                </button>
            </div>
        </div>
    </form>
@endsection

@section('footer-extras')
    <script src="{{ mix('js/product.js') }}"></script>
@endsection
