@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
	<h1>Crear nuevo Rol</h1>
@stop

@section('content')
<div class="card">
	@if(count($errors) > 0)
		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<div class="card-body">
		{!! Form::open(['route' => 'admin.roles.store', 'autocomplete' => 'off']) !!}
			<div class="form-group">
                {!! Form::label('name', 'Name')!!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del rol'])!!}
            </div>
			<h2 class="h3">Lista de permisos</h2>
			@foreach ($permissions as $permission)
				<div>
					<label>
						{!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
						{{ $permission->description }}

					</label>
				</div>
				@endforeach
		{!! Form::submit('Crear Rol', ['class' => 'btn btn-primary']) !!}
		{!! Form::close() !!}
	</div>
</div>
@stop
