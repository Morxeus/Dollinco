<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class InformeNotasController extends Controller
{
    // Método para mostrar la vista con las notas
    public function generarInforme(Request $request)
    {
        // Obtener todos los apoderados
        $apoderados = DB::table('apoderados')
            ->select('RunApoderado', 'Nombres', 'Apellidos', 'Correo', 'Telefono', 'Genero', 'Direccion', 'created_at', 'updated_at')
            ->get();

        // Obtener el apoderado_id desde la solicitud
        $apoderadoId = $request->input('apoderado_id');

        // Inicializar las notas como una colección vacía
        $notas = collect();

        // Si el apoderado_id existe, realizar la consulta
        if ($apoderadoId) {
            $notas = DB::table('alumnos as a')
                ->join('matriculas as m', 'a.RunAlumno', '=', 'm.RunAlumno')
                ->join('registrosde_clases as rc', 'm.NumeroMatricula', '=', 'rc.NumeroMatricula')
                ->join('evaluacions as e', 'rc.IDEvaluacion', '=', 'e.IDEvaluacion')
                ->join('mallas as ma', 'rc.IDCursoAsignatura', '=', 'ma.IDCursoAsignatura')
                ->join('cursos as c', 'ma.IDCurso', '=', 'c.IDCurso')
                ->join('asignaturas as asig', 'ma.IDAsignatura', '=', 'asig.IDAsignatura')
                ->where('m.RunApoderado', '=', $apoderadoId)
                ->select(
                    'a.RunAlumno as RUN',
                    DB::raw("CONCAT(a.Nombres, ' ', a.Apellidos) AS Alumno"),
                    'a.FechaNacimiento AS FechaNacimiento',
                    'c.NombreCurso AS Curso',
                    'asig.NombreAsignatura AS Asignatura',
                    'e.FechaEvaluacion AS FechaEvaluacion',
                    'e.Nota AS Nota',
                    DB::raw("
                        CASE
                            WHEN e.Nota >= 6.0 THEN 'Excelente'
                            WHEN e.Nota >= 5.0 THEN 'Bueno'
                            WHEN e.Nota >= 4.0 THEN 'Suficiente'
                            ELSE 'Insuficiente'
                        END AS Desempeño
                    ")
                )
                ->orderBy('a.Apellidos')
                ->orderBy('a.Nombres')
                ->orderBy('e.FechaEvaluacion')
                ->get();
        }

        // Retornar la vista con los datos
        return view('informes.notas', compact('notas', 'apoderados', 'apoderadoId'));


    }

    // Método para generar el PDF
    public function verPDF(Request $request)
    {
        // Obtener el apoderado_id desde la solicitud
        $apoderadoId = $request->input('apoderado_id');

        // Consulta de notas
        $notas = DB::table('alumnos as a')
            ->join('matriculas as m', 'a.RunAlumno', '=', 'm.RunAlumno')
            ->join('registrosde_clases as rc', 'm.NumeroMatricula', '=', 'rc.NumeroMatricula')
            ->join('evaluacions as e', 'rc.IDEvaluacion', '=', 'e.IDEvaluacion')
            ->join('mallas as ma', 'rc.IDCursoAsignatura', '=', 'ma.IDCursoAsignatura')
            ->join('cursos as c', 'ma.IDCurso', '=', 'c.IDCurso')
            ->join('asignaturas as asig', 'ma.IDAsignatura', '=', 'asig.IDAsignatura')
            ->where('m.RunApoderado', '=', $apoderadoId)
            ->select(
                'a.RunAlumno as RUN',
                DB::raw("CONCAT(a.Nombres, ' ', a.Apellidos) AS Alumno"),
                'a.FechaNacimiento AS FechaNacimiento',
                'c.NombreCurso AS Curso',
                'asig.NombreAsignatura AS Asignatura',
                'e.FechaEvaluacion AS FechaEvaluacion',
                'e.Nota AS Nota',
                DB::raw("
                    CASE
                        WHEN e.Nota >= 6.0 THEN 'Excelente'
                        WHEN e.Nota >= 5.0 THEN 'Bueno'
                        WHEN e.Nota >= 4.0 THEN 'Suficiente'
                        ELSE 'Insuficiente'
                    END AS Desempeño
                ")
            )
            ->orderBy('a.Apellidos')
            ->orderBy('a.Nombres')
            ->orderBy('e.FechaEvaluacion')
            ->get();

        // Generar el PDF usando la vista
        $pdf = Pdf::loadView('informes.notas-pdf', compact('notas', 'apoderadoId'));

        // Mostrar el PDF en el navegador
        return $pdf->stream('informe_notas.pdf');
    }
}
