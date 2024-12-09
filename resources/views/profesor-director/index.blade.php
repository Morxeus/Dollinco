@extends('layouts.app')

@section('template_title')
    Profesor Directores
@endsection

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow-lg border-0 rounded">
                <div class="card-header bg-dark text-white">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title" class="h5" style="margin-left: 10px;">
                            {{ __('Lista de Profesores') }}
                        </span>
                        @hasanyrole('administrador|profesor')
                        <div class="float-right">
                            <a href="{{ route('profesor-directors.create') }}" class="btn btn-primary btn-sm" data-placement="left">
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
                    <form method="GET" action="{{ route('profesor-directors.index') }}" class="mb-4">
                        <div class="card p-3 shadow-sm">
                            <div class="row g-3">
                                <div class="col-12 col-md-3">
                                    <span class="font-weight-bold">Filtrar por Run Profesor:</span>
                                </div>
                                <div class="col-12 col-md-4">
                                    <input type="text" name="RunProfesor" id="RunProfesor" 
                                           class="form-control form-control-sm" 
                                           placeholder="Ejemplo: 12345678-9" value="{{ request('RunProfesor') }}">
                                </div>
                                <div class="col-12 col-md-2">
                                    <button type="submit" class="btn btn-primary btn-sm w-100">
                                        <i class="fas fa-search"></i> Filtrar
                                    </button>
                                </div>
                                <div class="col-12 col-md-2">
                                    <a href="{{ route('profesor-directors.index') }}" class="btn btn-secondary btn-sm w-100">
                                        <i class="fas fa-undo"></i> Restablecer
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="table-responsive" style="overflow-x: auto; white-space: nowrap;">
                    <table class="table table-hover table-bordered table-striped">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Run del Profesor</th>
                                <th class="text-center">Nombres</th>
                                <th class="text-center">Apellidos</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">Teléfono</th>
                                <th class="text-center">Usuario Asignado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profesorDirectors as $index => $profesorDirector)
                                <tr id="row-{{ $profesorDirector->RunProfesor }}">
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td class="text-center">{{ $profesorDirector->RunProfesor }}</td>
                                    <td class="text-center">{{ $profesorDirector->Nombres }}</td>
                                    <td class="text-center">{{ $profesorDirector->Apellidos }}</td>
                                    <td class="text-center">{{ $profesorDirector->Correo }}</td>
                                    <td class="text-center">{{ $profesorDirector->Telefono }}</td>
                                    <td class="text-center">
                                        @if ($profesorDirector->user_id)
                                            <span class="badge bg-success">Asignado</span>
                                        @else
                                            <span class="badge bg-danger">No Asignado</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <button id="actionDropdown" type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{ __('Acciones') }}
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                <a class="dropdown-item text-primary" href="{{ route('profesor-directors.show', $profesorDirector->RunProfesor) }}">
                                                    <i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}
                                                </a>
                                                @hasanyrole('administrador|profesor')
                                                <a class="dropdown-item text-success" href="{{ route('profesor-directors.edit', $profesorDirector->RunProfesor) }}">
                                                    <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                </a>
                                                @endhasanyrole
                                                @role('administrador')
                                                <button type="button" class="dropdown-item text-danger delete-button" data-id="{{ $profesorDirector->RunProfesor }}">
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
                        {!! $profesorDirectors->withQueryString()->links('pagination::bootstrap-4') !!}
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
                <p>{{ __('¿Está seguro de que desea eliminar este profesor?') }}</p>
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
                const profesorId = this.getAttribute('data-id');
                const row = document.getElementById(`row-${profesorId}`);
                row.classList.add('table-danger');

                deleteForm.setAttribute('action', `/profesor-directors/${profesorId}`);
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
@endsection
