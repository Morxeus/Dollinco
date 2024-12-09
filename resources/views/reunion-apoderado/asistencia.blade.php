@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pasar Asistencia para la Reunión</h1>
    <p>Curso: {{ $reunionApoderado->IdCurso }}</p>

    <!-- Mostrar errores -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reunion-apoderados.guardarAsistencia', $reunionApoderado->IdReunionApoderado) }}" method="POST">
        @csrf

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre del Apoderado</th>
                    <th>Asistencia</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apoderados as $apoderado)
                    <tr>
                        <td>{{ $apoderado->Nombres }} {{ $apoderado->Apellidos }}</td>
                        <td>
                            <input type="hidden" name="asistencias[{{ $apoderado->RunApoderado }}]" value="No">
                            <input type="checkbox" name="asistencias[{{ $apoderado->RunApoderado }}]" value="Sí">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Guardar Asistencia</button>
    </form>
</div>
@endsection
