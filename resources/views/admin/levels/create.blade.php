@extends('adminlte::page')

@section('title', 'Course Free')

@section('content_header')
    <h1>Crear nuevo nivel</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-8 col-xl-6">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'admin.levels.store', 'autocomplete' => 'off']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombre') !!}
                            {!! Form::text('name', null, ['class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''), 'placeholder' => 'Escriba un nombre']) !!}
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mt-4">
                            {!! Form::submit('Crear nivel', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
