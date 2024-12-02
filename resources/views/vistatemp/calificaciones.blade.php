@extends('layouts.app')

@section('template_title')
    Notas de Alumnos
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-success text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title" class="h4">
                                {{ __('Notas de Alumnos') }}
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
                                        <th>Asignatura</th>
                                        <th>Notas</th>
                                        <th>Promedio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Alumno 1 -->
                                    <tr>
                                        <td>1</td>
                                        <td>12345678-9</td>
                                        <td>Juan</td>
                                        <td>Pérez</td>
                                        <td>
                                            <ul>
                                                <li>Matemáticas</li>
                                                <li>Lenguaje</li>
                                                <li>Ciencias</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                                <li>6.0, 5.5, 6.3</li>
                                                <li>5.0, 6.0, 5.8</li>
                                                <li>6.5, 5.8, 6.0</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                                <li>5.93</li>
                                                <li>5.60</li>
                                                <li>6.10</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    
                                    <!-- Alumno 2 -->
                                    <tr>
                                        <td>2</td>
                                        <td>98765432-1</td>
                                        <td>María</td>
                                        <td>González</td>
                                        <td>
                                            <ul>
                                                <li>Matemáticas</li>
                                                <li>Lenguaje</li>
                                                <li>Historia</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                                <li>7.0, 6.5, 6.8</li>
                                                <li>6.0, 6.0, 5.9</li>
                                                <li>6.3, 5.8, 6.0</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                                <li>6.77</li>
                                                <li>5.97</li>
                                                <li>6.03</li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <!-- Alumno 3 -->
                                    <tr>
                                        <td>3</td>
                                        <td>12398765-4</td>
                                        <td>Pedro</td>
                                        <td>López</td>
                                        <td>
                                            <ul>
                                                <li>Matemáticas</li>
                                                <li>Inglés</li>
                                                <li>Educación Física</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                                <li>5.5, 6.0, 5.8</li>
                                                <li>6.2, 5.8, 6.0</li>
                                                <li>6.5, 6.8, 7.0</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                                <li>5.77</li>
                                                <li>6.00</li>
                                                <li>6.77</li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <!-- Alumno 4 -->
                                    <tr>
                                        <td>4</td>
                                        <td>12987654-3</td>
                                        <td>Lucía</td>
                                        <td>Ramírez</td>
                                        <td>
                                            <ul>
                                                <li>Lenguaje</li>
                                                <li>Ciencias</li>
                                                <li>Historia</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                                <li>5.8, 6.0, 6.1</li>
                                                <li>6.5, 6.0, 6.3</li>
                                                <li>5.9, 6.0, 5.7</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                                <li>5.97</li>
                                                <li>6.27</li>
                                                <li>5.87</li>
                                            </ul>
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
