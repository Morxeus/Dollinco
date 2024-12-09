@extends('layouts.app')

@section('template_title')
    Lista de Alumnos Inscritos por Curso
@endsection

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm rounded">
                <div class="card-header bg-primary text-white">
                    <h1 class="h4 mb-0 text-center">Lista de Alumnos Inscritos por Curso</h1>
                </div>
                <div class="card-body bg-light">
                    <!-- Formulario de selección de curso -->
                    <form method="POST" action="{{ route('listacursos.filtrar') }}" class="mb-4">
                        @csrf
                        <div class="form-group row">
                            <label for="IDCursoOfrecido" class="col-sm-2 col-form-label">Seleccionar Curso:</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="IDCursoOfrecido" name="IDCursoOfrecido" required>
                                    <option value="">-- Seleccione un curso --</option>
                                    @foreach($cursos as $curso)
                                        <option value="{{ $curso->IDCursoOfrecido }}" {{ isset($idCursoOfrecido) && $idCursoOfrecido == $curso->IDCursoOfrecido ? 'selected' : '' }}>
                                            {{ $curso->CursoCompleto }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">Filtrar</button>
                            </div>
                        </div>
                    </form>

                    @if(isset($resultados) && $resultados->isNotEmpty())
                        @php
                            // Agrupar los resultados por curso
                            $cursosAgrupados = $resultados->groupBy('CursoCompleto');
                        @endphp

                        @foreach($cursosAgrupados as $curso => $alumnos)
                            <div class="mb-4">
                                <h3 class="text-primary">{{ $curso }}</h3>
                                <p><strong>Total Matriculados:</strong> {{ $alumnos->first()->NumeroMatriculas }}</p>
                                <p><strong>Cupos:</strong> {{ $alumnos->first()->Cupos }}</p>
                                <p><strong>Disponibilidad:</strong> {{ $alumnos->first()->Disponibilidad }}</p>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">RUN</th>
                                                <th scope="col">Nombre Alumno</th>
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
                    @elseif(isset($resultados))
                        <div class="alert alert-warning text-center" role="alert">
                            No hay alumnos inscritos en el curso seleccionado.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
