@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
	<h1>Dashboard</h1>
@stop

@section('content')
	@if (session('info'))
		<div class="alert alert-success">
			<strong>{{ session('info') }}</strong>
		</div>
	@endif
	@if ($errors->any())
		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<div class="card">
		<div class="card-body">
			{!! Form::model($post, ['route' => ['admin.posts.update', $post], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}
				@include('admin.posts.partials.form')
			{!! Form::close() !!}
		</div>
	</div>
@stop

