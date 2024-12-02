@extends('layouts.app')

@section('template_title')
    Visualización de Notas
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">
                            {{ __('Rendimiento Académico - Visualización de Notas') }}
                        </h4>
                    </div>

                    <div class="card-body bg-light">
                        <!-- Formulario para seleccionar estudiante y asignatura -->
                        <h5 class="mb-4">Consultar Rendimiento Académico</h5>
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="estudiante" class="form-label">Seleccionar Estudiante</label>
                                    <select id="estudiante" class="form-control">
                                        <option value="" disabled selected>-- Seleccione un estudiante --</option>
                                        <option value="1">Pedro Pérez</option>
                                        <option value="2">María López</option>
                                        <option value="3">Carlos Sánchez</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="asignatura" class="form-label">Seleccionar Asignatura</label>
                                    <select id="asignatura" class="form-control">
                                        <option value="" disabled selected>-- Seleccione una asignatura --</option>
                                        <option value="1">Matemáticas</option>
                                        <option value="2">Lenguaje</option>
                                        <option value="3">Ciencias</option>
                                    </select>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success">Consultar Notas</button>
                        </form>

                        <!-- Tabla para mostrar el desglose de notas -->
                        <div class="table-responsive mt-4">
                            <h5>Notas del Estudiante</h5>
                            <table class="table table-hover table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Evaluación</th>
                                        <th>Fecha</th>
                                        <th>Nota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Nota 1 -->
                                    <tr>
                                        <td>1</td>
                                        <td>Prueba Diagnóstica</td>
                                        <td>2024-03-15</td>
                                        <td>6.0</td>
                                    </tr>
                                    <!-- Nota 2 -->
                                    <tr>
                                        <td>2</td>
                                        <td>Tarea 1</td>
                                        <td>2024-04-10</td>
                                        <td>5.5</td>
                                    </tr>
                                    <!-- Nota 3 -->
                                    <tr>
                                        <td>3</td>
                                        <td>Prueba Parcial</td>
                                        <td>2024-05-01</td>
                                        <td>4.8</td>
                                    </tr>
                                    <!-- Nota 4 -->
                                    <tr>
                                        <td>4</td>
                                        <td>Examen Final</td>
                                        <td>2024-06-20</td>
                                        <td>6.2</td>
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
