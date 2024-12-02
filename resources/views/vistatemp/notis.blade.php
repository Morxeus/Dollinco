@extends('layouts.app')

@section('template_title')
    Notificaciones
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">
                            {{ __('Notificaciones de Rendimiento Bajo e Inasistencias') }}
                        </h4>
                    </div>

                    <div class="card-body bg-light">
                        <!-- Tabla para mostrar notificaciones -->
                        <h5 class="mb-4">Notificaciones Recientes</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Tipo</th>
                                        <th>Estudiante</th>
                                        <th>Detalle</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Notificación 1 -->
                                    <tr>
                                        <td>1</td>
                                        <td>Rendimiento Bajo</td>
                                        <td>Pedro Pérez</td>
                                        <td>Nota baja en Matemáticas: 3.5</td>
                                        <td>2024-11-15</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info">Ver Detalles</a>
                                        </td>
                                    </tr>

                                    <!-- Notificación 2 -->
                                    <tr>
                                        <td>2</td>
                                        <td>Inasistencia</td>
                                        <td>María López</td>
                                        <td>Ausencia sin justificar el 2024-11-14</td>
                                        <td>2024-11-14</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info">Ver Detalles</a>
                                        </td>
                                    </tr>

                                    <!-- Notificación 3 -->
                                    <tr>
                                        <td>3</td>
                                        <td>Inasistencia</td>
                                        <td>Carlos Sánchez</td>
                                        <td>Ausencia sin justificar el 2024-11-10</td>
                                        <td>2024-11-10</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info">Ver Detalles</a>
                                        </td>
                                    </tr>

                                    <!-- Notificación 4 -->
                                    <tr>
                                        <td>4</td>
                                        <td>Rendimiento Bajo</td>
                                        <td>Luisa Fernández</td>
                                        <td>Nota baja en Ciencias: 4.0</td>
                                        <td>2024-11-08</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info">Ver Detalles</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
