
@extends('layouts.plantilla')

@section('title', 'Cursos')

@section('content')
    <h1>Editar Curso</h1>
    <form action="{{ route('cursos.update',$curso) }}" method="POST">
        @csrf
        @method('put')
        <label>
            Nombre:
            <br>
            <input type="text" name="name" value="{{ old('name',$curso->name) }}">
        </label>
        @error('name')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <label>
            Descripción:
            <br>
            <textarea name="description" rows="5">
                {{ old('description',$curso->description) }}
            </textarea>
        </label>
        @error('description')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <label>
            Categoria:
            <br>
            <input type="text" name="category" value="{{ old('category',$curso->category) }}">
        </label>
        @error('category')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <button type="submit">Actualizar formulario</button>
    </form>
    <a href="{{route('cursos.show',$curso)}}">Volver</a>
@endsection