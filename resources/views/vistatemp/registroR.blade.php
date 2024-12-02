@extends('layouts.app')

@section('template_title')
    Registro de Reuniones con Apoderados
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-info text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title" class="h4">
                                {{ __('Registro de Reuniones con Apoderados') }}
                            </span>
                        </div>
                    </div>

                    <div class="card-body bg-light">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered rounded-lg">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Curso</th>
                                        <th>Apoderado</th>
                                        <th>Tipo de Reunión</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Reunión 1 -->
                                    <tr>
                                        <td>1</td>
                                        <td>2024-10-20</td>
                                        <td>15:00</td>
                                        <td>3° Básico A</td>
                                        <td>Juan Pérez</td>
                                        <td>Puntual (Apoderado)</td>
                                        <td>Reunión para discutir el rendimiento académico del alumno Pedro Pérez.</td>
                                    </tr>

                                    <!-- Reunión 2 -->
                                    <tr>
                                        <td>2</td>
                                        <td>2024-10-21</td>
                                        <td>17:00</td>
                                        <td>4° Básico B</td>
                                        <td>María González</td>
                                        <td>General (Curso)</td>
                                        <td>Reunión general para discutir las actividades del segundo semestre.</td>
                                    </tr>

                                    <!-- Reunión 3 -->
                                    <tr>
                                        <td>3</td>
                                        <td>2024-10-22</td>
                                        <td>09:00</td>
                                        <td>1° Medio C</td>
                                        <td>Carlos Ramírez</td>
                                        <td>Puntual (Apoderado)</td>
                                        <td>Reunión para tratar temas de comportamiento del alumno Jorge Ramírez.</td>
                                    </tr>

                                    <!-- Reunión 4 -->
                                    <tr>
                                        <td>4</td>
                                        <td>2024-10-23</td>
                                        <td>12:00</td>
                                        <td>5° Básico A</td>
                                        <td>Todos los apoderados</td>
                                        <td>General (Curso)</td>
                                        <td>Reunión general de planificación para el evento escolar de fin de año.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <!-- Paginación en caso de tener muchas reuniones -->
                    {{-- {!! $reuniones->withQueryString()->links() !!} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
