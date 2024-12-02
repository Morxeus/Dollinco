@extends('layouts.app')

@section('template_title')
    Profesor Directores
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="d-flex justify-content-between align-items-center">
                            <span id="card_title">{{ __('Profesor Directores') }}</span>
                            <a href="{{ route('profesor-directors.create') }}" class="btn btn-primary btn-sm float-right">
                                {{ __('Crear Nuevo') }}
                            </a>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>
                                        <th>Run Profesor</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Correo</th>
                                        <th>Teléfono</th>
                                        <th>Usuario Asignado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($profesorDirectors as $index => $profesorDirector)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $profesorDirector->RunProfesor }}</td>
                                            <td>{{ $profesorDirector->Nombres }}</td>
                                            <td>{{ $profesorDirector->Apellidos }}</td>
                                            <td>{{ $profesorDirector->Correo }}</td>
                                            <td>{{ $profesorDirector->Telefono }}</td>
                                            <td>
                                                @if ($profesorDirector->user_id)
                                                    <span class="badge bg-success">Asignado</span>
                                                @else
                                                    <span class="badge bg-danger">No Asignado</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('profesor-directors.show', $profesorDirector->RunProfesor) }}">
                                                    <i class="fa fa-fw fa-eye"></i> Ver
                                                </a>
                                                <a class="btn btn-sm btn-success" href="{{ route('profesor-directors.edit', $profesorDirector->RunProfesor) }}">
                                                    <i class="fa fa-fw fa-edit"></i> Editar
                                                </a>
                                                @if (!$profesorDirector->user_id)
                                                    <form action="{{ route('profesor-directors.asignarUsuario', $profesorDirector->RunProfesor) }}" method="POST" style="display:inline">
                                                        @csrf
                                                        <button class="btn btn-sm btn-warning">
                                                            <i class="fa fa-fw fa-user"></i> Asignar Usuario
                                                        </button>
                                                    </form>
                                                @endif
                                                <form action="{{ route('profesor-directors.destroy', $profesorDirector->RunProfesor) }}" method="POST" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este profesor?')">
                                                        <i class="fa fa-fw fa-trash"></i> Eliminar
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {!! $profesorDirectors->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
