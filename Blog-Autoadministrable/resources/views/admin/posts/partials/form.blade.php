{{-- crear formulario --}}
{!! Form::open(['route' => 'admin.posts.store', 'method' => 'POST', 'files' => true]) !!}

    {!! Form::hidden('user_id', auth()->user()->id) !!}


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
    {!! Form::submit('Crear post', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}