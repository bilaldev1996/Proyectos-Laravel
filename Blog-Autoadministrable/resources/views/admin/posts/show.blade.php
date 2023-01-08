@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
	<h1>Mostrar Detalle Post</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<p><strong>Nombre: </strong>{{$post->name}}</p>
			<p><strong>Slug: </strong>{{$post->slug}}</p>
			<strong>Extracto: </strong>{!! $post->extract !!}
			<p><strong>Categoría: </strong>{{$post->category->name}}</p>
			<p><strong>Etiquetas: </strong>
				@foreach ($post->tags as $tag)
					{{$tag->name}}
				@endforeach
			</p>
			<p><strong>Estado: </strong>{{$post->status}}</p>
			<p><strong>Imagen: </strong>
				<br>
				@if ($post->image)
					<img src="{{$post->getGetImageAttribute()}}" alt="" style="width: 300px">
				@endif
			</p>
			<strong>Contenido: </strong>{!! $post->body !!}
		</div>
	</div>
@stop
