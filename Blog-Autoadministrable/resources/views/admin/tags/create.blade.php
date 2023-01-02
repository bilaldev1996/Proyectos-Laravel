@extends('adminlte::page')
@section('title', 'crear etiqueta')

@section('content_header')
	<h1>Crear Etiqueta</h1>
@stop

@section('content')
	@if (session('info'))
		<div class="alert alert-success">
			<strong>{{session('info')}}</strong>
		</div>
	@endif
	<div class="card">
		<div class="card-body">
			{!! Form::open(['route' => 'admin.tags.store']) !!}
				@include('admin.tags.partials.form')
				{!! Form::submit('Crear etiqueta', ['class' => 'btn btn-primary']) !!}
			{!! Form::close() !!}
		</div>
	</div>
@stop

