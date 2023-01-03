@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
	<h1>Mostrar detalle Categoría</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<p><strong>Nombre: </strong>{{$category->name}}</p>
			<p><strong>Slug: </strong>{{$category->slug}}</p>
			<p><strong>Color: </strong>{{$category->color}}</p>
		</div>
	</div>
@stop

