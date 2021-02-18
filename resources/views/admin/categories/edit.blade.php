@extends('adminlte::page')

@section('title', 'Course Free')

@section('content_header')
    <h1>Editar categoría</h1>
@stop

@section('content')
    @if (session('success'))
    <div class="alert alert-success mb-4 alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        <div class="col-md-6 col-lg-8 col-xl-6">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put']) !!}

                        @include('admin.categories.partials.form')

                        <div class="mt-4">
                            {!! Form::submit('Actualizar categoría', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
