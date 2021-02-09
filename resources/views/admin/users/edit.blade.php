@extends('adminlte::page')

@section('title', 'Course Free')

@section('content_header')
    <h1>Asignar rol</h1>
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
                    {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Nombre</label>
                            <div class="col-sm-9">
                                <input type="text" id="name" class="form-control" value="{{ $user->name }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Lista de roles</label>
                            <div class="col-sm-9">
                                    <ul class="list-unstyled">
                                        @foreach ($roles as $role)
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    {!! Form::checkbox('roles[]', $role->id, null, ['id' => 'role-' . $role->id, 'class' => 'custom-control-input']) !!}
                                                    {!! Form::label('role-' . $role->id, $role->name, ['class' => 'custom-control-label']) !!}
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
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
