@extends('adminlte::page')
@section('title', 'editar etiqueta')

@section('content_header')
	<h1>Editar etiqueda</h1>
@stop

@section('content')
	@if (session('info'))
		<div class="alert alert-success">
			<strong>{{session('info')}}</strong>
		</div>
	@endif
	<div class="card">
		<div class="card-body">
			{!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'put']) !!}
				@include('admin.tags.partials.form')
				{!! Form::submit('Actualizar etiqueta', ['class' => 'btn btn-primary']) !!}
			{!! Form::close() !!}
		</div>
	</div>
@stop

