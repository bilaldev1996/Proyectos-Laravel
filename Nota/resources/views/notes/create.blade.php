
@extends('layouts.plantilla')

@section('title', 'Notes create')

@section('content')
    <h1 class="text-5xl text-center mt-5">Crear Nota</h1>
    <div class="flex justify-center mt-5">
        <div class="w-full bg-white p-6 rounded-lg">
            <form action="{{ route('notes.store') }}" method="post">
                @csrf <!-- Esto es para evitar ataques de tipo CSRF -->
                <div class="mb-4">
                    <label for="title" class="sr-only">Titulo</label>
                    <input type="text" name="title" id="title" placeholder="Titulo" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('title') border-red-500 @enderror" value="{{ old('title') }}">
                    @error('title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="content" class="sr-only">Contenido</label>
                    <textarea name="content" id="content" cols="30" rows="4" placeholder="Contenido" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Crear</button>
                </div>
            </form>
        </div>
    </div>
@endsection