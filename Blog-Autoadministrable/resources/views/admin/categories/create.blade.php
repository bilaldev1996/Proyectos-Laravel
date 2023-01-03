@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
	<h1>Crear Categoría</h1>
@stop

@section('content')
	@if ($errors->any())
		<div class="alert alert-danger">
			<h5>Corrige los errores para continuar</h5>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<div class="card">
		<div class="card-body">
			{!! Form::open(['route' => 'admin.categories.store']) !!}
				<div class="form-group">
					{!! Form::label('name', 'Nombre') !!}
					{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoría']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('slug', 'Slug') !!}
					{!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la categoría', 'readonly']) !!}
				</div>

				{!! Form::submit('Crear categoría', ['class' => 'btn btn-primary']) !!}
			{!! Form::close() !!}
		</div>
	</div>
@stop

@section('js')
	<script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
	<script>
		$(document).ready( function() {
			$("#name").stringToSlug({
				setEvents: 'keyup keydown blur',
				getPut: '#slug',
				space: '-'
			});
		});
	</script>
@stop
