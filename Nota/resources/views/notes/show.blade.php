
@extends('layouts.plantilla')

@section('title', 'Notes ' . $note->title)

@section('content')
    <h1 class="text-3xl text-center mt-5">Mostrar una Nota</h1>
    {{-- meter todo en una tarjeta con tailwind --}}
    <div class="max-w-lg rounded overflow-hidden shadow-lg mx-auto">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ $note->title }}</div>
            <p class="text-gray-700 text-base">
                {{ $note->content }}
            </p>
        </div>
        <div class="px-6 py-4">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#create {{ $note->created_at->diffForHumans() }}</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#update {{ $note->updated_at->diffForHumans() }}</span>
        </div>
        <div class="px-6 py-4">
            <a href="{{ route('notes.edit',$note->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 m-1 rounded cursor-pointer">Editar Nota</a>
            <a href="{{ route('notes.confirmDelete',$note->id) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 m-1 rounded cursor-pointer">Borrar Nota</a>
            <a href="{{ route('notes.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded cursor-pointer">Volver a inicio</a>
    </div>
@endsection
