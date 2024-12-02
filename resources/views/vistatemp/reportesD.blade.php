@extends('layouts.app')

@section('template_title')
    Generación de Reportes
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">
                            {{ __('Generación de Reportes de Rendimiento Académico') }}
                        </h4>
                    </div>

                    <div class="card-body bg-light">
                        <!-- Formulario para generación de reportes -->
                        <h5 class="mb-4">Exportar Información</h5>
                        <form>
                            <div class="mb-3">
                                <label for="curso" class="form-label">Seleccionar Curso</label>
                                <select id="curso" class="form-control">
                                    <option value="" disabled selected>-- Seleccione un curso --</option>
                                    <option value="1">3° Básico A</option>
                                    <option value="2">4° Básico B</option>
                                    <option value="3">1° Medio C</option>
                                    <option value="4">5° Básico A</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="fecha_inicio" class="form-label">Rango de Fechas</label>
                                <div class="d-flex">
                                    <input type="date" id="fecha_inicio" class="form-control me-2">
                                    <input type="date" id="fecha_fin" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="formato" class="form-label">Formato de Exportación</label>
                                <select id="formato" class="form-control">
                                    <option value="" disabled selected>-- Seleccione un formato --</option>
                                    <option value="pdf">PDF</option>
                                    <option value="excel">Excel</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-success mt-3">Generar Reporte</button>
                        </form>

                    </div>
                </div>

                <!-- Tabla de reportes generados -->
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="mb-4">Historial de Reportes</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Curso</th>
                                        <th>Rango de Fechas</th>
                                        <th>Formato</th>
                                        <th>Fecha de Generación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Datos de demostración -->
                                    <tr>
                                        <td>1</td>
                                        <td>3° Básico A</td>
                                        <td>2024-10-01 - 2024-10-15</td>
                                        <td>PDF</td>
                                        <td>2024-10-20</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>4° Básico B</td>
                                        <td>2024-09-01 - 2024-09-30</td>
                                        <td>Excel</td>
                                        <td>2024-10-21</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>1° Medio C</td>
                                        <td>2024-08-01 - 2024-08-31</td>
                                        <td>PDF</td>
                                        <td>2024-10-22</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Paginación (comentada para uso futuro) -->
                {{-- <div class="d-flex justify-content-center mt-3">
                    {!! $reportes->withQueryString()->links() !!}
                </div> --}}
            </div>
        </div>
    </div>
@endsection
