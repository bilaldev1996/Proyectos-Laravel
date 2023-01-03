@extends('adminlte::page')
@section('title', 'Mostrar Etiqueta')

@section('content_header')
	<h1>Mostrar Etiqueta</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<p><strong>Nombre: </strong>{{$tag->name}}</p>
			<p><strong>Slug: </strong>{{$tag->slug}}</p>
			<p><strong>Color: </strong>{{$tag->color}}</p>
		</div>
	</div>
@stop

