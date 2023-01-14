@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
	<h1>Editar Role</h1>
@stop

@section('content')
	<div class="card">
		@if(session('info'))
			<div class="alert alert-success" role="alert">
				<strong>{{ session('info') }}</strong>
			</div>
		@endif

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
			{!! Form::model($role, ['route' => ['admin.roles.update', $role], 'autocomplete' => 'off', 'method' => 'put']) !!}
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
			{!! Form::submit('Actualizar Rol', ['class' => 'btn btn-primary']) !!}
			{!! Form::close() !!}
		</div>
@stop
