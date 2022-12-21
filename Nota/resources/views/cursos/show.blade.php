
@extends('layouts.plantilla')

@section('title', 'Cursos' . $curso)

@section('content')
    <h1>Lista de cursos</h1>
    <p>Curso : {{ $curso }}</p>
@endsection
