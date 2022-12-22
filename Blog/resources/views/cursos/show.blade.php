
@extends('layouts.plantilla')

@section('title', 'Cursos')

@section('content')
    <h1>Bienvenido al curso de {{ $curso->name }} </h1>
    <a href="{{route('cursos.index')}}">Volver a cursos</a>
    <p><strong>Categoria: </strong>{{ $curso->category }}</p>
    <p><strong>Categoria: </strong>{{ $curso->description }}</p>
    <a href="{{ route('cursos.edit',$curso->id) }}">Editar Curso</a><br>
    <form action="{{route('cursos.delete', $curso)}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit">Eliminar</button>
    </form>
@endsection
