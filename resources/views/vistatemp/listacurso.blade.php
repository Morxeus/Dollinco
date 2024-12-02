@extends('layouts.app')

@section('template_title')
    Lista de Alumnos Inscritos por Curso
@endsection

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm rounded">
                <!-- Encabezado principal -->
                <div class="card-header bg-primary text-white">
                    <h1 class="h4 mb-0 text-center">Lista de Alumnos Inscritos por Curso</h1>
                </div>
                <div class="card-body bg-light">
                    @php
                        // Agrupar los resultados por curso
                        $cursos = $resultados->groupBy('Curso');
                    @endphp

                    @if($cursos->isEmpty())
                        <div class="alert alert-warning text-center" role="alert">
                            No hay alumnos inscritos en los cursos.
                        </div>
                    @else
                        @foreach($cursos as $curso => $alumnos)
                            <!-- Título de cada curso -->
                            <div class="mb-4">
                                <h3 class="text-primary">{{ $curso }}</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Run</th>
                                                <th scope="col">Nombre</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($alumnos as $alumno)
                                                <tr>
                                                    <td>{{ $alumno->RUN }}</td>
                                                    <td>{{ $alumno->NombreAlumno }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
