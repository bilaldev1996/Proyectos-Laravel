@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
	<h1>Crear nuevo post</h1>
@stop

@section('content')
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
			@include('admin.posts.partials.form')
		</div>
	</div>
@stop

@section('js')
	<script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
	<script>
		$(document).ready( function() {
			$("#name, #slug").stringToSlug({
				callback: function(text){
					$("#slug").val(text);
				}
			});
		});
		ClassicEditor
			.create( document.querySelector( '#extract' ) )
			.catch( error => {
				console.error( error );
			} );
		ClassicEditor
			.create( document.querySelector( '#body' ) )
			.catch( error => {
				console.error( error );
			} );
	</script>
@stop

