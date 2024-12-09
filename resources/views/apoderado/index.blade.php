@extends('layouts.app')

@hasanyrole('administrador|profesor|apoderado')
@section('template_title')
    Apoderados
@endsection

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow-lg border-0 rounded">
                <div class="card-header bg-dark text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <span id="card_title" class="h5" style="margin-left: 10px;">
                            {{ __('Lista de Apoderados') }}
                        </span>
                        @hasanyrole('administrador|profesor')
                        <a href="{{ route('apoderados.create') }}" class="btn btn-primary btn-sm">
                            {{ __('Crear Nuevo') }}
                        </a>
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
                    <form method="GET" action="{{ route('apoderados.index') }}" class="mb-4">
                        <div class="d-flex justify-content-start align-items-center" style="gap: 15px;">
                            <span class="font-weight-bold">Filtrar por Run Apoderado:</span>
                            <div>
                                <input type="text" name="RunApoderado" class="form-control form-control-sm" 
                                       placeholder="Ejemplo: 12345678-9" value="{{ request('RunApoderado') }}">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fas fa-search"></i> {{ __('Filtrar') }}
                                </button>
                            </div>
                            <div>
                                <a href="{{ route('apoderados.index') }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-undo"></i> {{ __('Restablecer') }}
                                </a>
                            </div>
                        </div>
                    </form>

                    <!-- Tabla -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Run del Apoderado</th>
                                    <th class="text-center">Nombres</th>
                                    <th class="text-center">Apellidos</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Usuario Asignado</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($apoderados as $apoderado)
                                    <tr id="row-{{ $apoderado->RunApoderado }}">
                                        <td class="text-center">{{ ++$i }}</td>
                                        <td class="text-center">{{ $apoderado->RunApoderado }}</td>
                                        <td class="text-center">{{ $apoderado->Nombres }}</td>
                                        <td class="text-center">{{ $apoderado->Apellidos }}</td>
                                        <td class="text-center">{{ $apoderado->Correo }}</td>
                                        <td class="text-center">{{ $apoderado->Telefono }}</td>
                                        <td class="text-center">
                                            @if ($apoderado->user_id)
                                                <span class="badge bg-success">{{ __('Asignado') }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ __('No Asignado') }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <button id="actionDropdown" type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{ __('Acciones') }}
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                    <a class="dropdown-item text-primary" href="{{ route('apoderados.show', $apoderado->RunApoderado) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}
                                                    </a>
                                                    @hasanyrole('administrador|profesor')
                                                    <a class="dropdown-item text-success" href="{{ route('apoderados.edit', $apoderado->RunApoderado) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </a>
                                                    @endhasanyrole
                                                    @if (!$apoderado->user_id)
                                                    <form action="{{ route('apoderados.asignarUsuario', $apoderado->RunApoderado) }}" method="POST" style="display:inline">
                                                        @csrf
                                                        <button class="dropdown-item text-warning">
                                                            <i class="fa fa-fw fa-user"></i> {{ __('Asignar Usuario') }}
                                                        </button>
                                                    </form>
                                                    @endif
                                                    @role('administrador')
                                                    <button type="button" class="dropdown-item text-danger delete-button" data-id="{{ $apoderado->RunApoderado }}">
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
                            {!! $apoderados->withQueryString()->links('pagination::bootstrap-4') !!}
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
                <p>{{ __('¿Está seguro de que desea eliminar este apoderado?') }}</p>
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
                const apoderadoId = this.getAttribute('data-id');
                const row = document.getElementById(`row-${apoderadoId}`);
                row.classList.add('table-danger');

                deleteForm.setAttribute('action', `/apoderados/${apoderadoId}`);
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
