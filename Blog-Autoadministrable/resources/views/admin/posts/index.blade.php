@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.posts.create') }}" class="btn btn-secondary btn-sm float-right">Nuevo post</a>
	<h1>Listado de Posts</h1>
@stop

@section('content')
    @livewire('admin.posts-index')
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
@stop
