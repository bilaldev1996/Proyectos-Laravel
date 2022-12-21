
@extends('layouts.plantilla')

@section('title', 'Notes edit')

@section('content')
    <h1 class="text-5xl text-center mt-5">Editar Nota</h1>
    <div class="flex justify-center mt-5">
        <div class="w-full bg-white p-6 rounded-lg">
            <form action="{{ route('notes.update',$note->id) }}" method="post">
                @csrf <!-- Esto es para evitar ataques de tipo CSRF -->
                @method('put') <!-- Esto es para indicar que el metodo es PUT -->
                <div class="mb-4">
                    <label for="title" class="sr-only">Titulo</label>
                    <input type="text" name="title" id="title" placeholder="Titulo" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('title') border-red-500 @enderror" value="{{ $note->title }}">
                    @error('title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="content" class="sr-only">Contenido</label>
                    <textarea name="content" id="content" cols="30" rows="4" placeholder="Contenido" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('content') border-red-500 @enderror">{{ $note->content }}</textarea>
                    @error('content')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
    {{-- <a href="{{ route('notes.index') }}">Volver a inicio</a>
    <form action="{{ route('notes.update',$note->id) }}" method="post">
        @csrf <!-- Esto es para evitar ataques de tipo CSRF -->
        @method('put') <!-- Esto es para indicar que el metodo es PUT -->
        <label>
            Titulo:
            <br>
            <input type="text" name="title" value="{{ $note->title }}">
        </label>
        <br>
        <label>
            Contenido:
            <br>
            <textarea name="content" rows="5">{{ $note->content }}</textarea>
        </label>
        <br>
        <input type="submit" value="Actualizar">
    </form> --}}
@endsection