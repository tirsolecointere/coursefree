@extends('adminlte::page')

@section('title', 'Course Free')

@section('content_header')
    <h1>Categoría {{ $category->name }}</h1>
@stop

@section('content')
    <p>Welcome to Course Free - Admin Panel</p>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hello world!'); </script> --}}
@stop
