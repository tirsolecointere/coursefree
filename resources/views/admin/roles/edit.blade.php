@extends('adminlte::page')

@section('title', 'Course Free')

@section('content_header')
    <h1>Editar role: {{ $role->name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-8 col-xl-6">
            @if (session('success'))
                <div class="alert alert-success mb-4 alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}

                        @include('admin.roles.partials.form')

                        <div class="mt-4">
                            {!! Form::submit('Actualizar role', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
@stop
