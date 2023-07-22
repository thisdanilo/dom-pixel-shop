<div class="dropdown no-arrow">
    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="{{ route('product.show', $model->id) }}">Ver</a>
        <a class="dropdown-item" href="{{ route('product.edit', $model->id) }}">Editar</a>

        <form method="post" action="{{ route('product.delete', $model->id) }}">

            {{-- Elementos Ocultos --}}
            @csrf
            @method('DELETE')
            <button type="submit" class="dropdown-item">Excluir</button>
        </form>

    </div>
</div>
