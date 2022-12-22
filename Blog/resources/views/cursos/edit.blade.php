
@extends('layouts.plantilla')

@section('title', 'Cursos')

@section('content')
    <h1>Editar nota</h1>
    <form action="{{ route('cursos.update',$curso->id) }}" method="POST">
        @csrf
        @method('put')
        <label>
            Nombre:
            <br>
            <input type="text" name="name" value="{{ $curso->name }}">
        </label>
        <br>
        <label>
            Descripción:
            <br>
            <textarea name="description" rows="5">
                {{ $curso->description }}
            </textarea>
        </label>
        <br>
        <label>
            Categoria:
            <br>
            <input type="text" name="category" value="{{ $curso->category }}">
        </label>
        <br>
        <button type="submit">Actualizar formulario</button>
    </form>
    <a href="{{route('cursos.index')}}">Volver al inicio</a>
@endsection