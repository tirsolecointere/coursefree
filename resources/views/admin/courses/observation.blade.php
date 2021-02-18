@extends('adminlte::page')

@section('title', 'Course Free')

@section('content_header')
    <h1>Observaciones del curso: <b>{{ $course->title }}</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => ['admin.courses.reject', $course]]) !!}
                        <div class="form-group">
                            {!! Form::label('body', 'Observaciones', ['class' => ($errors->has('body') ? 'text-danger' : '')]) !!}
                            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

                            @error('body')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {!! Form::submit('Rechazar curso', ['class' => 'btn btn-danger']) !!}
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
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor.create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });
    </script>
@stop
