@extends('layouts.app')

@section('template_title')
    Lista de Alumnos y Asistencia - 3° Básico A
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-success text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title" class="h4">
                                {{ __('Lista de Alumnos y Asistencia - 3° Básico A') }}
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
                                        <th>Fecha de Nacimiento</th>
                                        <th>Asistencia (%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Alumno 1 -->
                                    <tr>
                                        <td>1</td>
                                        <td>20.123.456-7</td>
                                        <td>Pedro</td>
                                        <td>Pérez González</td>
                                        <td>2012-05-14</td>
                                        <td>98%</td>
                                    </tr>

                                    <!-- Alumno 2 -->
                                    <tr>
                                        <td>2</td>
                                        <td>19.987.654-3</td>
                                        <td>María</td>
                                        <td>Ramírez Soto</td>
                                        <td>2011-08-21</td>
                                        <td>95%</td>
                                    </tr>

                                    <!-- Alumno 3 -->
                                    <tr>
                                        <td>3</td>
                                        <td>21.654.321-8</td>
                                        <td>Carlos</td>
                                        <td>Figueroa López</td>
                                        <td>2012-11-02</td>
                                        <td>90%</td>
                                    </tr>

                                    <!-- Alumno 4 -->
                                    <tr>
                                        <td>4</td>
                                        <td>20.321.789-2</td>
                                        <td>Ana</td>
                                        <td>Fernández Castillo</td>
                                        <td>2012-02-28</td>
                                        <td>92%</td>
                                    </tr>

                                    <!-- Alumno 5 -->
                                    <tr>
                                        <td>5</td>
                                        <td>22.654.987-1</td>
                                        <td>Jorge</td>
                                        <td>Muñoz Herrera</td>
                                        <td>2012-06-10</td>
                                        <td>85%</td>
                                    </tr>

                                    <!-- Alumno 6 -->
                                    <tr>
                                        <td>6</td>
                                        <td>23.123.654-5</td>
                                        <td>Paula</td>
                                        <td>Martínez Silva</td>
                                        <td>2011-12-12</td>
                                        <td>88%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <!-- Paginación en caso de tener muchos alumnos -->
                    {{-- {!! $alumnos->withQueryString()->links() !!} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
