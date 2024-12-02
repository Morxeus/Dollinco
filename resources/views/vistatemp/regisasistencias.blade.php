@extends('layouts.app')

@section('template_title')
    Registro de Asistencias
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">
                            {{ __('Registro de Asistencias Diarias') }}
                        </h4>
                    </div>

                    <div class="card-body bg-light">
                        <!-- Formulario para seleccionar curso y fecha -->
                        <h5 class="mb-4">Registrar Asistencias</h5>
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="curso" class="form-label">Seleccionar Curso</label>
                                    <select id="curso" class="form-control">
                                        <option value="" disabled selected>-- Seleccione un curso --</option>
                                        <option value="1">3° Básico A</option>
                                        <option value="2">4° Básico B</option>
                                        <option value="3">1° Medio C</option>
                                        <option value="4">5° Básico A</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="fecha" class="form-label">Seleccionar Fecha</label>
                                    <input type="date" id="fecha" class="form-control">
                                </div>
                            </div>
                            <button type="button" class="btn btn-success">Cargar Lista</button>
                        </form>

                        <!-- Tabla para registrar asistencias -->
                        <div class="table-responsive mt-4">
                            <h5>Lista de Estudiantes</h5>
                            <table class="table table-hover table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre del Estudiante</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Estudiante 1 -->
                                    <tr>
                                        <td>1</td>
                                        <td>Juan Pérez</td>
                                        <td>
                                            <select class="form-control">
                                                <option value="Presente">Presente</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Justificado">Justificado</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <!-- Estudiante 2 -->
                                    <tr>
                                        <td>2</td>
                                        <td>María López</td>
                                        <td>
                                            <select class="form-control">
                                                <option value="Presente">Presente</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Justificado">Justificado</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <!-- Estudiante 3 -->
                                    <tr>
                                        <td>3</td>
                                        <td>Carlos Sánchez</td>
                                        <td>
                                            <select class="form-control">
                                                <option value="Presente">Presente</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Justificado">Justificado</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <!-- Estudiante 4 -->
                                    <tr>
                                        <td>4</td>
                                        <td>Luisa Fernández</td>
                                        <td>
                                            <select class="form-control">
                                                <option value="Presente">Presente</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Justificado">Justificado</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Botón para guardar los cambios -->
                        <div class="mt-3">
                            <button type="button" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
