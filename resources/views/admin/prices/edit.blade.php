@extends('adminlte::page')

@section('title', 'Course Free')

@section('content_header')
    <h1>Crear nuevo precio</h1>
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
                    {!! Form::model($price, ['route' => ['admin.prices.update', $price], 'method' => 'PUT', 'autocomplete' => 'off']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombre') !!}
                            {!! Form::text('name', null, ['class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''), 'placeholder' => 'Escriba un nombre']) !!}
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::label('value', 'Valor') !!}
                            {!! Form::number('value', null, ['class' => 'form-control ' . ($errors->has('value') ? 'is-invalid' : ''), 'placeholder' => 'Ingrese valor', 'min' => 0]) !!}
                            @error('value')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mt-4">
                            {!! Form::submit('Actualizar precio', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
