@extends('layouts.app')

@section('template_title')
    Periodos
@endsection

@section('content')
    <div class="container-fluid mt-4"> <!-- Espacio desde arriba -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow-lg border-0 rounded"> <!-- Añadido sombreado y borde redondeado -->
                    <div class="card-header bg-dark text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title" class="h5" style="margin-left: 10px;">
                                {{ __('Lista de Periodos') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('periodos.create') }}" class="btn btn-primary btn-sm" data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                            </div>
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
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <thead class="bg-secondary text-white">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Fecha de Inicio</th>
                                        <th class="text-center">Fecha de Fin</th>
                                        <th class="text-center">Estado del Periodo</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($periodos as $periodo)
                                        <tr id="row-{{ $periodo->IDPeriodo }}">
                                            <td class="text-center">{{ ++$i }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($periodo->FechaInicio)->format('d-m-Y') }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($periodo->FechaFin)->format('d-m-Y') }}</td>
                                            <td class="text-center">{{ $periodo->estadoPeriodo->NombreEstado }}</td> <!-- Suponiendo que 'estadoPeriodo' es la relación -->
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <button id="actionDropdown" type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{ __('Acciones') }}
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                        <a class="dropdown-item text-primary" href="{{ route('periodos.show', $periodo->IDPeriodo) }}">
                                                            <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                        </a>
                                                        <a class="dropdown-item text-success" href="{{ route('periodos.edit', $periodo->IDPeriodo) }}">
                                                            <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                        </a>
                                                        <button type="button" class="dropdown-item text-danger delete-button" data-id="{{ $periodo->IDPeriodo }}">
                                                            <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Paginación con botones pequeños -->
                        <div class="d-flex justify-content-center mt-3">
                            <ul class="pagination pagination-sm">
                                {!! $periodos->withQueryString()->links('pagination::bootstrap-4') !!}
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
                    <p>{{ __('¿Está seguro de que desea eliminar este periodo?') }}</p>
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
                    const periodoId = this.getAttribute('data-id');
                    const row = document.getElementById(`row-${periodoId}`);
                    row.classList.add('table-danger');

                    deleteForm.setAttribute('action', `/periodos/${periodoId}`);
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
