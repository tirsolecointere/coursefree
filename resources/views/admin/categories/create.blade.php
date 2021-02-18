@extends('adminlte::page')

@section('title', 'Course Free')

@section('content_header')
    <h1>Crear nueva categoría</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-8 col-xl-6">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'admin.categories.store']) !!}

                        @include('admin.categories.partials.form')

                        <div class="mt-4">
                            {!! Form::submit('Crear categoría', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
