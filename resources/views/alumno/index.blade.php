@extends('layouts.app')
@hasanyrole('administrador|profesor|apoderado')
@section('template_title')
    Lista de Alumnos
@endsection

@section('content')
<div></div>
    <div class="container-fluid mt-4"> <!-- Espacio desde arriba -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow-lg border-0 rounded"> <!-- Añadido sombreado y borde redondeado -->
                    <div class="card-header bg-dark text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title" class="h5" style="margin-left: 10px;"> <!-- Espacio de medio cm agregado aquí -->
                                {{ __('Lista de Alumnos') }}
                            </span>
                            @hasanyrole('administrador|profesor')
                            <div class="float-right">
                                <a href="{{ route('alumnos.create') }}" class="btn btn-primary btn-sm" data-placement="left">
                                    {{ __('Crear Nuevo') }}
                                </a>
                            </div>
                            @endhasanyrole
                        </div>
                    </div>
                    
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-light">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <thead class="bg-secondary text-white">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Run Alumno</th>
                                        <th class="text-center">Nombres</th>
                                        <th class="text-center">Apellidos</th>
                                        <th class="text-center">Fecha de Nacimiento</th>
                                        <th class="text-center">Género</th>
                                        <th class="text-center">Dirección</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumnos as $alumno)
                                        <tr>
                                            <td class="text-center">{{ ++$i }}</td>
                                            <td>{{ $alumno->RunAlumno }}</td>
                                            <td>{{ $alumno->Nombres }}</td>
                                            <td>{{ $alumno->Apellidos }}</td>
                                            <td>{{ $alumno->FechaNacimiento }}</td>
                                            <td>{{ $alumno->Genero }}</td>
                                            <td>{{ $alumno->Direccion }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <button id="actionDropdown" type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{ __('Acciones') }}
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                        <a class="dropdown-item text-primary" href="{{ route('alumnos.show', $alumno->RunAlumno) }}">
                                                            <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                        </a>
                                                        @hasanyrole('administrador|profesro')
                                                        <a class="dropdown-item text-success" href="{{ route('alumnos.edit', $alumno->RunAlumno) }}">
                                                            <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                        </a>
                                                        @endhasanyrole
                                                        <!-- Botón de eliminar solo visible para el rol de administrador -->
                                                        @role('administrador')
                                                        <form action="{{ route('alumnos.destroy', $alumno->RunAlumno) }}" method="POST" style="display:inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('¿Estás seguro de eliminar?')">
                                                                <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                                            </button>
                                                        </form>
                                                        @endrole
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Paginación solo si hay más de 20 registros -->
                        @if ($alumnos->total() > 20)
                            <div class="d-flex justify-content-center mt-3">
                                {!! $alumnos->links() !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <style>
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }
    </style>
@endhasanyrole
@endsection
