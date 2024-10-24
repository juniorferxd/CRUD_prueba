<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts List') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <form id="postForm" action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @if(isset($post))
                @method('PUT')
            @endif
            <div class="mb-4">
                <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2">Título</label>
                <input type="text" name="titulo" value="{{ $post->titulo ?? '' }}" placeholder="Título" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="contenido" class="block text-gray-700 text-sm font-bold mb-2">Contenido</label>
                <textarea name="contenido" placeholder="Contenido" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $post->contenido ?? '' }}</textarea>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Guardar</button>
                <a href="{{ route('posts.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Regresar</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('postForm').addEventListener('submit', function(event) {
            var titulo = document.querySelector('input[name="titulo"]').value;
            var contenido = document.querySelector('textarea[name="contenido"]').value;

            if (!titulo || !contenido) {
                event.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Campos vacíos',
                    text: 'Por favor, complete todos los campos antes de enviar el formulario.',
                });
            }
        });
    </script>
</x-app-layout>





