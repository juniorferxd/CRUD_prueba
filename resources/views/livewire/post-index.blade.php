<div class="card">
    <div class="card-header flex justify-between items-center p-4 border-b">
        <a class="mb-2 bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded" href="{{ route('posts.create') }}">
            <i class="fas fa-plus"></i> Nuevo Post
        </a>
        <div class="float-right">
            <input wire:model.live="search" class="form-control border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Buscar por título">
        </div>
    </div>

    @if ($posts->count())
        <div class="card-body p-4">
            <div class="mb-4">
                {{ $posts->links() }}
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover w-full">
                    <thead class="border text-center bg-gray-200">
                        <tr>
                            <th>Item</th>
                            <th>Título</th>
                            <th>Contenido</th>
                            <th>Fecha Creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr class="border-t">
                                <td style="text-align: center;">{{ $posts->perPage() * ($posts->currentPage() - 1) + $loop->iteration }}</td>
                                <td class="py-2">{{ $post->titulo }}</td>
                                <td class="py-2">{{ $post->contenido }}</td>
                                <td class="py-2">{{ \Carbon\Carbon::parse($post->created_at)->setTimezone('America/Lima')->format('d/m/Y H:i') }}</td>
                                <td width="200px" class="py-2 text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('posts.edit', $post) }}" class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-1 px-2 rounded">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="{{ route('posts.show', $post) }}" class="bg-green-800 hover:bg-green-900 text-white font-bold py-1 px-2 rounded">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button onclick="confirmDelete({{ $post->id }})" class="bg-red-800 hover:bg-red-900 text-white font-bold py-1 px-2 rounded">
                                            <i class="fas fa-minus-circle"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="card-body p-4">
            <strong>Sin registros</strong>
        </div>
    @endif
</div>

<script>
    function confirmDelete(postId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarlo!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                @this.call('delete', postId);
                Swal.fire(
                    '¡Eliminado!',
                    'El post ha sido eliminado.',
                    'success'
                )
            }
        })
    }
</script>


