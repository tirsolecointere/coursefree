<div class="mb-4">
    {!! Form::label('title', 'Título del curso') !!}
    {!! Form::text('title', null, ['class' => 'form-input mt-1' . ($errors->has('title') ? ' invalid' : '')]) !!}
    @error('title')
        <b class="block text-xs text-red-500 mt-1">{{ $message }}</b>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-input mt-1' . ($errors->has('slug') ? ' invalid' : ''), 'readonly' => 'readonly']) !!}
    @error('slug')
        <b class="block text-xs text-red-500 mt-1">{{ $message }}</b>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('subtitle', 'Subtítulo') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input mt-1' . ($errors->has('subtitle') ? ' invalid' : '')]) !!}
    @error('subtitle')
        <b class="block text-xs text-red-500 mt-1">{{ $message }}</b>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::textarea('description', null, ['class' => 'form-input mt-1' . ($errors->has('description') ? ' invalid' : '')]) !!}
    @error('description')
        <b class="block text-xs text-red-500 mt-1">{{ $message }}</b>
    @enderror
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-5 my-8">
    <div>
        {!! Form::label('category_id', 'Categoria') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-input']) !!}
    </div>
    <div>
        {!! Form::label('level_id', 'Nivel') !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'form-input']) !!}
    </div>
    <div>
        {!! Form::label('price_id', 'Precio') !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'form-input']) !!}
    </div>
</div>

<h1 class="text-2xl font-bold mb-8">Portada del curso</h1>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <figure>
        @isset($course->image)
            <img id="picture" class="w-full h-64 object-cover object-center" src="{{ Storage::url($course->image->url) }}">
            @else
            <img id="picture" class="w-full h-64 object-cover object-center" src="{{ asset('img/courses/placeholder-course-image.png') }}">
        @endisset
    </figure>
    <div>
        {!! Form::label('file', 'Seleccionar imagen', ['class' =>  ($errors->has('file') ? 'text-red-500' : '')]) !!}
        {!! Form::file('file', ['class' => 'block mt-1', 'accept' => 'image/*']) !!}
        @error('file')
            <b class="block text-xs text-red-500 mt-1">{{ $message }}</b>
        @enderror
    </div>
</div>
