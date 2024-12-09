@extends('layouts.app')

@section('template_title')
    Visualización de Promedios
@endsection

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-sm rounded">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0 text-center text-md-left">Rendimiento Académico - Visualización de Promedios</h4>
                </div>

                <div class="card-body bg-light">
                    <h5 class="mb-4 text-center text-md-left">Consultar Promedios de Alumnos</h5>

                    <form id="formPromedios" method="GET" action="{{ route('informe-notas') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
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
                        <div class="text-left mt-3">
                            <button type="submit" class="btn btn-success">Consultar Promedios</button>
                        </div>
                    </form>

                    <form action="{{ route('informe-notas.ver-pdf') }}" method="GET" target="_blank" class="mt-3 text-left">
                        @csrf
                        <input type="hidden" name="apoderado_id" value="{{ $apoderadoId }}">
                        <button type="submit" class="btn btn-primary">Ver PDF</button>
                    </form>

                    <div class="table-responsive mt-4">
                        <h5 class="text-center text-md-left">Promedios de los Alumnos</h5>
                        <table class="table table-hover table-striped table-bordered" id="tablaPromedios">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Alumno</th>
                                    <th>Promedio de Notas</th>
                                    <th>Observación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($notas as $index => $nota)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $nota->NombreAlumno }} {{ $nota->ApellidoAlumno }}</td>
                                        <td>{{ number_format($nota->PromedioNotas, 2) }}</td>
                                        <td>{{ $nota->Observacion }}</td>
                                    </tr>
                                @endforeach
                                @if($notas->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center">No se encontraron promedios para este apoderado.</td>
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
