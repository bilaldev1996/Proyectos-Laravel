
@extends('layouts.plantilla')

@section('title', 'Notes')

@section('content')
    <h1 class="text-5xl text-center mt-5">Listado de notas</h1>
    <a href="{{ route('notes.create') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Crear Nota</a>
    <ul class="mt-4">
        @forelse ($notes as $note)
            <li class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-4 relative" role="alert">
                <p class="font-bold">Titulo: {{ $note->title }}</p>
                <p class="text-sm">Contenido: {{ $note->content }}</p>
                <p class="text-sm">Creado: {{ $note->created_at->diffForHumans() }}</p>
                <a href="{{ route('notes.show', $note->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute right-0 bottom-0">Ver Nota</a>
            </li>
        @empty
            <li class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-4" role="alert">
                <p class="font-bold">No hay notas</p>
            </li>
        @endforelse
    </ul>
    
        {{ $notes->links() }} {{-- Paginacion --}}
@endsection

