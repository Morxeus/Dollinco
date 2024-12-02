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
                        <h4 class="mb-0">Rendimiento Académico - Visualización de Notas</h4>
                    </div>

                    <div class="card-body bg-light">
                        <h5 class="mb-4">Consultar Rendimiento Académico</h5>
                        <form id="formNotas" method="GET" action="{{ route('informe-notas') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="apoderado_id" class="form-label">Seleccionar Apoderado</label>
                                    <select id="apoderado_id" name="apoderado_id" class="form-control" required>
                                        <option value="" disabled selected>-- Seleccione un Apoderado --</option>
                                        @foreach($apoderados as $apoderado)
                                            <option value="{{ $apoderado->RunApoderado }}" {{ $apoderado->RunApoderado == $apoderadoId ? 'selected' : '' }}>
                                                {{ $apoderado->Nombres }} {{ $apoderado->Apellidos }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="text-right mt-3">
                            <div class="text-right mt-3">
                                
                                <div class="text-right mt-3">
                                    <form action="{{ route('informe-notas.ver-pdf') }}" method="GET">
                                        @csrf
                                        <input type="hidden" name="apoderado_id" value="{{ $apoderadoId }}">
                                        <button type="submit" class="btn btn-primary">Ver PDF</button>
                                    </form>
                                </div>
                        </div>
                        </div>

                            <button type="submit" class="btn btn-success">Consultar Notas</button>
                        </form>

                        <div class="table-responsive mt-4">
                            <h5>Notas del Alumno</h5>
                            <table class="table table-hover table-striped table-bordered" id="tablaNotas">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Alumno</th>
                                        <th>Curso</th>
                                        <th>Asignatura</th>
                                        <th>Fecha de Evaluación</th>
                                        <th>Nota</th>
                                        <th>Desempeño</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($notas as $index => $nota)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $nota->Alumno }}</td>
                                            <td>{{ $nota->Curso }}</td>
                                            <td>{{ $nota->Asignatura }}</td>
                                            <td>{{ $nota->FechaEvaluacion }}</td>
                                            <td>{{ $nota->Nota }}</td>
                                            <td>{{ $nota->Desempeño }}</td>
                                        </tr>
                                    @endforeach
                                    @if($notas->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center">No se encontraron notas para este apoderado.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




