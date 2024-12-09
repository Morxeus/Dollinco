@extends('layouts.app')

@section('template_title')
    Generación de Certificados
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Generación de Certificados</h4>
                    </div>

                    <div class="card-body bg-light">
                        <h5 class="mb-4">Consultar Certificados</h5>
                        <form id="formCertificados" method="POST" action="{{ route('certificados.generar') }}">
                            @csrf
                            <div class="form-group">
                                <label for="tipoCertificado">Seleccionar Tipo de Certificado</label>
                                <select id="tipoCertificado" name="tipoCertificado" class="form-control" required>
                                    <option value="" disabled selected>-- Seleccione un Tipo de Certificado --</option>
                                    <option value="Certificado de Alumno Regular">Certificado de Alumno Regular</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="apoderado">Seleccionar Apoderado</label>
                                <select id="apoderado" name="apoderado" class="form-control" required>
                                    <option value="" disabled selected>-- Seleccione un Apoderado --</option>
                                    @foreach($apoderados as $apoderado)
                                        <option value="{{ $apoderado->RunApoderado }}">{{ $apoderado->NombreCompleto }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="alumno">Seleccionar Alumno</label>
                                <select id="alumno" name="alumno" class="form-control" required>
                                    <option value="" disabled selected>-- Seleccione un Alumno --</option>
                                </select>
                            </div>

                            <script>
                                document.getElementById('apoderado').addEventListener('change', function () {
                                    const apoderado = this.value;
                            
                                    fetch(`/certificados/alumnos/${apoderado}`)
                                        .then(response => response.json())
                                        .then(data => {
                                            const alumnoSelect = document.getElementById('alumno');
                                            alumnoSelect.innerHTML = '<option value="" disabled selected>-- Seleccione un Alumno --</option>';
                                            data.forEach(alumno => {
                                                alumnoSelect.innerHTML += `<option value="${alumno.RunAlumno}">${alumno.RunAlumno} - ${alumno.NombreCompleto}</option>`;
                                            });
                                        })
                                        .catch(error => console.error('Error al cargar los alumnos:', error));
                                });
                            </script>
                            

                            <div class="form-group text-right mt-3">
                                <button type="submit" target="_blank" class="btn btn-success">Generar Certificado</button>
                            </div>
                        </form>

                        <!-- Eliminar la tabla de certificados previos -->
                        <!-- No se necesitan más detalles de certificados previos, solo se genera el PDF al enviar el formulario -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
