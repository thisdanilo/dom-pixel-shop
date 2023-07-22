<div class="card card-outline card-secondary">

    <div class="card-header">
        <h5 class="card-title">
            Dados do Produto
        </h5>
    </div>

    <div class="card-body">
        <div class="row">

            @if ($show ?? false)
                {{-- Nome --}}
                <div class="col-sm-4 mb-2">
                    <label class="form-label">Nome</label>
                    <input class="form-control" value="{{ $product->name }}" readonly>
                </div>

                {{-- Preço --}}
                <div class="col-sm-4 mb-2">
                    <label class="form-label">Preço</label>
                    <input class="form-control" value="{{ $product->formatted_price }}" readonly>
                </div>

                {{-- Estoque --}}
                <div class="col-sm-4 mb-2">
                    <label class="form-label">Estoque</label>
                    <input class="form-control" value="{{ $product->stock}}" readonly>
                </div>

                {{-- Descrição --}}
                <div class="col-sm-12 mb-2">
                    <label class="form-label">Descrição</label>
                    <input class="form-control" value="{{ $product->description }}" readonly>
                </div>
            @elseif (isset($product))
                {{-- Nome --}}
                <div class="col-sm-4 mb-2">
                    <label class="form-label">Nome<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required value="{{ $product->name }}">
                </div>

                {{-- Preço --}}
                <div class="col-sm-4 mb-2">
                    <label class="form-label">Preço<span class="text-danger">*</span></label>
                    <input type="text" name="price" class="form-control money" required value="{{ $product->formatted_price }}">
                </div>

                 {{-- Estoque--}}
                 <div class="col-sm-4 mb-2">
                    <label class="form-label">Estoque<span class="text-danger">*</span></label>
                    <input type="number" name="stock" class="form-control stock" required value="{{ $product->stock }}">
                </div>

                {{-- Descrição --}}
                <div class="col-sm-12 mb-2">
                    <label class="form-label">Descrição<span class="text-danger">*</span></label>
                    <input type="text" name="description" class="form-control" value="{{ $product->description }}">
                </div>
            @else

                {{-- Nome --}}
                <div class="col-sm-4 mb-2">
                    <label class="form-label">Nome<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                {{-- Preço --}}
                <div class="col-sm-4 mb-2">
                    <label class="form-label">Preço<span class="text-danger">*</span></label>
                    <input type="text" name="price" class="form-control money" required>
                </div>

                {{-- Estoque--}}
                <div class="col-sm-4 mb-2">
                    <label class="form-label">Estoque<span class="text-danger">*</span></label>
                    <input type="number" name="stock" class="form-control" required>
                </div>

                {{-- Descrição --}}
                <div class="col-sm-12 mb-2">
                    <label class="form-label">Descrição<span class="text-danger">*</span></label>
                    <input type="text" name="description" class="form-control">
                </div>
            @endif

        </div>
    </div>

    <div class="card-footer"></div>

</div>
