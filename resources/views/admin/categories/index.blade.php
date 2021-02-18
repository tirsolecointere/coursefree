@extends('adminlte::page')

@section('title', 'Course Free')

@section('content_header')
    <h1>Categorías</h1>
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
        <div class="card-header">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Crear categoría</a>
        </div>
        <div class="card-body p-0">
              <table class="table table-striped">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col" colspan="2"></th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td scope="row">{{ $category->id }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category) }}">{{ $category->name }}</a>
                        </td>
                        <td width="1rem">
                            <a class="btn btn-secondary btn-sm" href="{{ route('admin.categories.edit', $category) }}">Editar</a>
                        </td>
                        <td width="1rem">
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4">No se encontraron registros.</td>
                        </tr>
                    @endforelse
                </tbody>
              </table>
        </div>
    </div>
@stop
