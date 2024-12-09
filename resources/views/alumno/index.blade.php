@extends('layouts.app')

@hasanyrole('administrador|profesor|apoderado')
@section('template_title')
    Lista de Alumnos
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow-lg border-0 rounded">
                    <div class="card-header bg-dark text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title" class="h5" style="margin-left: 10px;">
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

                    @if($message = Session::get('error'))
                        <div class="alert alert-danger m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-light">
                        <!-- Formulario de filtro -->
                        <form method="GET" action="{{ route('alumnos.index') }}" class="mb-4">
                            <div class="d-flex justify-content-start align-items-center" style="gap: 20px;">
                                <div>
                                    <label for="RunAlumno" class="form-label font-weight-bold">{{ __('Filtrar por Run Alumno') }}</label>
                                </div>
                                <div>
                                    <input 
                                        type="text" 
                                        name="RunAlumno" 
                                        id="RunAlumno" 
                                        class="form-control form-control-sm" 
                                        value="{{ old('RunAlumno', $runAlumno) }}" 
                                        placeholder="Ejemplo: 12345678-9">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fas fa-search"></i> {{ __('Filtrar') }}
                                    </button>
                                </div>
                                <div>
                                    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-undo"></i> {{ __('Restablecer') }}
                                    </a>
                                </div>
                            </div>
                        </form>

                        <!-- Tabla de alumnos -->
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
                                    @forelse ($alumnos as $alumno)
                                        <tr id="row-{{ $alumno->RunAlumno }}">
                                            <td class="text-center">{{ ++$i }}</td>
                                            <td class="text-center">{{ $alumno->RunAlumno }}</td>
                                            <td class="text-center">{{ $alumno->Nombres }}</td>
                                            <td class="text-center">{{ $alumno->Apellidos }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($alumno->FechaNacimiento)->format('d-m-Y') }}</td>
                                            <td class="text-center">
                                                @if ($alumno->Genero === 'F')
                                                    {{ __('Femenino') }}
                                                @elseif ($alumno->Genero === 'M')
                                                    {{ __('Masculino') }}
                                                @else
                                                    {{ __('Otro') }}
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $alumno->Direccion }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <button id="actionDropdown" type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{ __('Acciones') }}
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                        <a class="dropdown-item text-primary" href="{{ route('alumnos.show', $alumno->RunAlumno) }}">
                                                            <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                        </a>
                                                        @hasanyrole('administrador|profesor')
                                                        <a class="dropdown-item text-success" href="{{ route('alumnos.edit', $alumno->RunAlumno) }}">
                                                            <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                        </a>
                                                        @endhasanyrole
                                                        @role('administrador')
                                                        <button type="button" class="dropdown-item text-danger delete-button" data-id="{{ $alumno->RunAlumno }}">
                                                            <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                                        </button>
                                                        @endrole
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">{{ __('No se encontraron alumnos.') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Paginación -->
                        <div class="d-flex justify-content-center mt-3">
                            <ul class="pagination pagination-sm">
                                {!! $alumnos->links('pagination::bootstrap-4') !!}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">{{ __('Confirmar Eliminación') }}</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('¿Está seguro de que desea eliminar este alumno?') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancelar') }}</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Eliminar') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-button');
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            const deleteForm = document.getElementById('deleteForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const alumnoId = this.getAttribute('data-id');
                    const row = document.getElementById(`row-${alumnoId}`);
                    row.classList.add('table-danger');

                    deleteForm.setAttribute('action', `/alumnos/${alumnoId}`);
                    deleteModal.show();

                    deleteModal._element.addEventListener('hidden.bs.modal', function () {
                        row.classList.remove('table-danger');
                    });
                });
            });
        });
    </script>

    <style>
        .table-danger {
            background-color: #f8d7da !important;
        }
    </style>
@endhasanyrole
@endsection
