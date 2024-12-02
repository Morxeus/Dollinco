@extends('layouts.app')

@section('template_title')
    Lista de Anotaciones por Alumno - 3° Básico A
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-warning text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title" class="h4">
                                {{ __('Lista de Anotaciones por Alumno - 3° Básico A') }}
                            </span>
                        </div>
                    </div>

                    <div class="card-body bg-light">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered rounded-lg">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Run Alumno</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Curso</th>
                                        <th>Tipo de Anotación</th>
                                        <th>Descripción</th>
                                        <th>Fecha de Anotación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Anotaciones para el Alumno 1 -->
                                    <tr>
                                        <td>1</td>
                                        <td>20.123.456-7</td>
                                        <td>Pedro</td>
                                        <td>Pérez González</td>
                                        <td>3° Básico A</td>
                                        <td>Positiva</td>
                                        <td>Participación destacada en clase</td>
                                        <td>2024-03-15</td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>20.123.456-7</td>
                                        <td>Pedro</td>
                                        <td>Pérez González</td>
                                        <td>3° Básico A</td>
                                        <td>Negativa</td>
                                        <td>Falta de respeto a un compañero</td>
                                        <td>2024-04-10</td>
                                    </tr>

                                    <!-- Anotaciones para el Alumno 2 -->
                                    <tr>
                                        <td>3</td>
                                        <td>19.987.654-3</td>
                                        <td>María</td>
                                        <td>Ramírez Soto</td>
                                        <td>3° Básico A</td>
                                        <td>Positiva</td>
                                        <td>Trabajo en equipo excepcional</td>
                                        <td>2024-05-02</td>
                                    </tr>

                                    <!-- Anotaciones para el Alumno 3 -->
                                    <tr>
                                        <td>4</td>
                                        <td>21.654.321-8</td>
                                        <td>Carlos</td>
                                        <td>Figueroa López</td>
                                        <td>3° Básico A</td>
                                        <td>Negativa</td>
                                        <td>No entregar tarea</td>
                                        <td>2024-06-18</td>
                                    </tr>

                                    <!-- Anotaciones para el Alumno 4 -->
                                    <tr>
                                        <td>5</td>
                                        <td>20.321.789-2</td>
                                        <td>Ana</td>
                                        <td>Fernández Castillo</td>
                                        <td>3° Básico A</td>
                                        <td>Positiva</td>
                                        <td>Ayuda a compañeros con dificultades</td>
                                        <td>2024-07-01</td>
                                    </tr>

                                    <!-- Anotaciones para el Alumno 5 -->
                                    <tr>
                                        <td>6</td>
                                        <td>22.654.987-1</td>
                                        <td>Jorge</td>
                                        <td>Muñoz Herrera</td>
                                        <td>3° Básico A</td>
                                        <td>Negativa</td>
                                        <td>Interrumpir constantemente la clase</td>
                                        <td>2024-08-22</td>
                                    </tr>

                                    <!-- Anotaciones para el Alumno 6 -->
                                    <tr>
                                        <td>7</td>
                                        <td>23.123.654-5</td>
                                        <td>Paula</td>
                                        <td>Martínez Silva</td>
                                        <td>3° Básico A</td>
                                        <td>Positiva</td>
                                        <td>Mejora notable en sus notas</td>
                                        <td>2024-09-15</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <!-- Paginación en caso de tener muchas anotaciones -->
                    {{-- {!! $anotaciones->withQueryString()->links() !!} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
