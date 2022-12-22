
@extends('layouts.plantilla')

@section('title', 'Cursos')

@section('content')
    <h1>Bienvenido a la página de creacion de cursos</h1>
    <form action="{{route('cursos.store')}}" method="POST">
        @csrf
        <label>
            Nombre:
            <br>
            <input type="text" name="name">
        </label>
        <br>
        <label>
            Descripción:
            <br>
            <textarea name="description" rows="5"></textarea>
        </label>
        <br>
        <label>
            Categoria:
            <br>
            <input type="text" name="category">
        </label>
        <br>
        <button type="submit">Enviar formulario</button>
    </form>
    <a href="{{route('cursos.index')}}">Volver al inicio</a>
@endsection