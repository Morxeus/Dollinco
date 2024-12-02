@extends('layouts.app')

@section('template_title')
    Clases por Curso - Año 2024
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-primary text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title" class="h4">
                                {{ __('Listado de Clases por Curso - Año 2024') }}
                            </span>
                        </div>
                    </div>

                    <div class="card-body bg-light">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered rounded-lg">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Curso</th>
                                        <th>Asignatura</th>
                                        <th>Profesor</th>
                                        <th>Horario</th>
                                        <th>Año</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Clases para 3° Básico A -->
                                    <tr>
                                        <td>1</td>
                                        <td>3° Básico A</td>
                                        <td>Matemáticas</td>
                                        <td>Juan Pérez</td>
                                        <td>Lunes 08:00 - 09:30</td>
                                        <td>2024</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>3° Básico A</td>
                                        <td>Lenguaje</td>
                                        <td>María González</td>
                                        <td>Martes 10:00 - 11:30</td>
                                        <td>2024</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>3° Básico A</td>
                                        <td>Ciencias</td>
                                        <td>Carlos Ramírez</td>
                                        <td>Miércoles 12:00 - 13:30</td>
                                        <td>2024</td>
                                    </tr>

                                    <!-- Clases para 4° Básico B -->
                                    <tr>
                                        <td>4</td>
                                        <td>4° Básico B</td>
                                        <td>Matemáticas</td>
                                        <td>Lucía Ramírez</td>
                                        <td>Jueves 08:00 - 09:30</td>
                                        <td>2024</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>4° Básico B</td>
                                        <td>Historia</td>
                                        <td>Jorge Fuentes</td>
                                        <td>Viernes 10:00 - 11:30</td>
                                        <td>2024</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>4° Básico B</td>
                                        <td>Inglés</td>
                                        <td>Paula Moya</td>
                                        <td>Miércoles 14:00 - 15:30</td>
                                        <td>2024</td>
                                    </tr>

                                    <!-- Clases para 1° Medio C -->
                                    <tr>
                                        <td>7</td>
                                        <td>1° Medio C</td>
                                        <td>Física</td>
                                        <td>Pedro Morales</td>
                                        <td>Lunes 08:00 - 09:30</td>
                                        <td>2024</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>1° Medio C</td>
                                        <td>Química</td>
                                        <td>Javier Silva</td>
                                        <td>Martes 10:00 - 11:30</td>
                                        <td>2024</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>1° Medio C</td>
                                        <td>Biología</td>
                                        <td>Ana Fernández</td>
                                        <td>Miércoles 12:00 - 13:30</td>
                                        <td>2024</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <!-- Paginación en caso de tener muchas clases -->
                    {{-- {!! $clases->withQueryString()->links() !!} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
