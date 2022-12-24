@extends('layouts.plantilla')

@section('title', 'Contactanos')

@section('content')
    <h1 class="text-3xl text-center">Déjanos un mensaje</h1>
    <form action="{{ route('contactanos.store') }}" method="POST">
        @csrf
        <label>
            Nombre:
            <br>
            <input type="text" name="name">
        </label>
        <br>
        @error('name')
            <small class="text-red-500">*{{ $message }}</small>
            <br>
        @enderror
        <label>
            Correo:
            <br>
            <input type="text" name="email">
        </label>
        <br>
        @error('email')
            <small class="text-red-500">*{{ $message }}</small>
            <br>
        @enderror
        <label>
            Asunto:
            <br>
            <input type="text" name="subject">
        </label>
        <br>
        @error('subject')
            <small class="text-red-500">*{{ $message }}</small>
            <br>
        @enderror
        <label>
            Contenido:
            <br>
            <textarea name="content" id="" cols="30" rows="10"></textarea>
        </label>
        <br>
        @error('content')
            <small class="text-red-500">*{{ $message }}</small>
            <br>
        @enderror
        <button type="submit">Enviar mensaje</button>
    </form>

    @if (session('info'))
        <script>
            alert("{{ session('info') }}");
        </script>
    @endif
@endsection
