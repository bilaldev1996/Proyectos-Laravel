{{-- crear formulario --}}
@if ($errors->any())
		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del post',
    'autocomplete' => 'off']) !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug del post', 'readonly']) !!}
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Categoría') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>
    @foreach ($tags as $tag)
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{ $tag->name }}
        </label>
    @endforeach
</div>
<div class="row mb-3">
	<div class="col">
		<div class="image-wrapper">
			<img id="picture" src="https://cdn.pixabay.com/photo/2022/12/20/11/17/hiking-7667621_960_720.jpg" alt="imagen">
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			{!! Form::label('file', 'Imagen que se mostrará en el post') !!}
			{!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
		</div>
		<p>
			Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum facilis quos error hic natus, delectus voluptate officiis debitis deserunt, consectetur, nulla nostrum eveniet! Quia ab, minus impedit voluptatem eaque itaque!

		</p>
	</div>
</div>
<div class="form-group">
    {!! Form::label('extract', 'Extracto') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Cuerpo del post') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <p class="font-weight-bold">Estado</p>
    <label class="mr-2">
        {!! Form::radio('status', 'DRAFT', true) !!}
        Borrador
    </label>
    <label class="mr-2">
        {!! Form::radio('status', 'PUBLISHED') !!}
        Publicado
    </label>
</div>

@section('css')
	<style>
		.image-wrapper {
			position: relative;
			padding-bottom: 56.25%;
		}
		.image-wrapper img {
            position: absolute;
			object-fit: cover;
			width: 100%;
            height: 100%;
		}
	</style>
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

			// cambiar imagen por defecto a la que ha subido el usuario
			document.getElementById('file').addEventListener('change', cambiarImagen);

			function cambiarImagen(event){
				event.preventDefault();

                var file = event.target.files[0];
                var reader = new FileReader();
                reader.onload = (event) => {
					document.getElementById('picture').setAttribute('src', event.target.result);
				};
				reader.readAsDataURL(file);
			}
	</script>
@stop
