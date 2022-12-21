
@extends('layouts.plantilla')

@section('title', 'Notes delete')

@section('content')
    <h2 class="text-center text-3xl text-red-700 mt-5">¿Estas seguro de borrar la nota?</h2>
    {{-- poner la nota en una tarjeta --}}
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                Titulo
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Titulo" value="{{ $note->title }}" disabled>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                Contenido
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="content" type="text" placeholder="Contenido" disabled>{{ $note->content }}</textarea>
        </div>
    </div>
    <form action="{{ route('notes.delete',$note->id) }}" method="post">
        @csrf <!-- Esto es para evitar ataques de tipo CSRF -->
        @method('delete') <!-- Esto es para indicar que el metodo es DELETE -->
        <input type="submit" value="Borrar" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 m-3 rounded cursor-pointer">
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 m-3 rounded" href="{{ route('notes.show',$note->id) }}">Cancelar</a>
    </form>
@endsection