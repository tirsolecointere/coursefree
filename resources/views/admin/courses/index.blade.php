@extends('adminlte::page')

@section('title', 'Course Free')

@section('content_header')
    <h1>Cursos pendientes por aprobación</h1>
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

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                    <tr>
                        <td scope="row">{{ $course->id }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->category->name }}</td>

                        <td width="1rem">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.courses.show', $course) }}">Revisar</a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="3">No se encontraron registros.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $courses->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
@stop
