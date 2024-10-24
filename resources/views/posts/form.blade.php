
@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST">
        @csrf
        @if(isset($post))
            @method('PUT')
        @endif
        <div class="mb-4">
            <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
            <input type="text" name="titulo" value="{{ $post->titulo ?? '' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Título">
        </div>
        <div class="mb-4">
            <label for="contenido" class="block text-gray-700 text-sm font-bold mb-2">Contenido:</label>
            <textarea name="contenido" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Contenido">{{ $post->contenido ?? '' }}</textarea>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@endsection
