@extends('layouts.app')

@hasanyrole('administrador|profesor|apoderado')
@section('template_title')
    Matriculas
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow-lg border-0 rounded">
                    <div class="card-header bg-dark text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title" class="h5" style="margin-left: 10px;">
                                {{ __('Lista de Matriculas') }}
                            </span>
                            @hasanyrole('administrador|profesor')
                            <div class="float-right">
                                <a href="{{ route('matriculas.create') }}" class="btn btn-primary btn-sm" data-placement="left">
                                  {{ __('Crear Nueva') }}
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

                    <form method="GET" action="{{ route('matriculas.index') }}" class="mb-4">
                        <div class="card p-4 shadow-sm">
                            <h5 class="text-left mb-4">Filtrar por</h5>
                            <div class="row gy-3 justify-content-center">
                                <div class="col-lg-3 col-md-6">
                                    <label for="NumeroMatricula" class="form-label">Número de Matrícula</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        <input type="text" name="NumeroMatricula" id="NumeroMatricula" class="form-control" 
                                               placeholder="Ejemplo: 12345" value="{{ request('NumeroMatricula') }}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <label for="RunAlumno" class="form-label">Run del Alumno</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" name="RunAlumno" id="RunAlumno" class="form-control" 
                                               placeholder="Ejemplo: 12.345.678-9" value="{{ request('RunAlumno') }}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <label for="EstadoMatricula" class="form-label">Estado de Matrícula</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-clipboard-list"></i></span>
                                        <select name="EstadoMatricula" id="EstadoMatricula" class="form-control">
                                            <option value="">-- Seleccionar Estado --</option>
                                            @foreach($estadosMatricula as $estado)
                                                <option value="{{ $estado->IDMatriculaEstado }}" 
                                                        {{ request('EstadoMatricula') == $estado->IDMatriculaEstado ? 'selected' : '' }}>
                                                    {{ $estado->EstadoMatricula }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fas fa-search"></i> {{ __('Filtrar') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Número de Matrícula</th>
                                    <th class="text-center">Datos del Alumno</th>
                                    <th class="text-center">Datos del Apoderado</th>
                                    <th class="text-center">Fecha de Inscripción</th>
                                    <th class="text-center">Estado de Matrícula</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($matriculas as $matricula)
                                    <tr id="row-{{ $matricula->NumeroMatricula }}">
                                        <td class="text-center">{{ ++$i }}</td>
                                        <td class="text-center">{{ $matricula->NumeroMatricula }}</td>
                                        <td class="text-center">
                                            {{ $matricula->alumno->RunAlumno }} - {{ $matricula->alumno->Nombres }} {{ $matricula->alumno->Apellidos }}
                                        </td>
                                        <td class="text-center">
                                            {{ $matricula->apoderado->RunApoderado }} - {{ $matricula->apoderado->Nombres }} {{ $matricula->apoderado->Apellidos }}
                                        </td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($matricula->FechaInscripcion)->format('d-m-Y') }}</td>
                                        <td class="text-center">{{ $matricula->EstadoMatricula->EstadoMatricula }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <button id="actionDropdown" type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" 
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{ __('Acciones') }}
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                    <a class="dropdown-item text-primary" href="{{ route('matriculas.show', $matricula->NumeroMatricula) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                    </a>
                                                    @hasanyrole('administrador|profesor')
                                                    <a class="dropdown-item text-success" href="{{ route('matriculas.edit', $matricula->NumeroMatricula) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </a>
                                                    @endhasanyrole
                                                    @role('administrador')
                                                    <button type="button" class="dropdown-item text-danger delete-button" data-id="{{ $matricula->NumeroMatricula }}">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                                    </button>
                                                    @endrole
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        <ul class="pagination pagination-sm">
                            {!! $matriculas->withQueryString()->links('pagination::bootstrap-4') !!}
                        </ul>
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
                    <p>{{ __('¿Está seguro de que desea eliminar esta matrícula?') }}</p>
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
                    const matriculaId = this.getAttribute('data-id');
                    const row = document.getElementById(`row-${matriculaId}`);
                    row.classList.add('table-danger');

                    deleteForm.setAttribute('action', `/matriculas/${matriculaId}`);
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
