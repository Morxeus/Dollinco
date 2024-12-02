<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RendimientoController extends Controller
{
    /**
     * Muestra la vista inicial con estudiantes y asignaturas.
     */
    public function index()
    {
        // Obtener lista de estudiantes con su RUN y nombre completo
        $estudiantes = DB::table('alumnos')
            ->select('RunAlumno', DB::raw("CONCAT(Nombres, ' ', Apellidos) AS NombreCompleto"))
            ->get();

        // Obtener lista de asignaturas
        $asignaturas = DB::table('asignaturas')
            ->select('IDAsignatura', 'NombreAsignatura')
            ->get();

        // Retornar la vista con los datos obtenidos
        return view('rendimiento.index', compact('estudiantes', 'asignaturas'));
    }

    /**
     * Consulta las notas específicas de un estudiante y asignatura.
     */
    public function consultarNotas(Request $request)
    {
        // Validar los datos requeridos
        $request->validate([
            'estudiante' => 'required', // RUN del estudiante
            'asignatura' => 'required', // Nombre de la asignatura
        ]);

        $estudiante = $request->estudiante; // RUN del alumno
        $asignatura = $request->asignatura; // Nombre de la asignatura

        // Ejecutar la consulta para obtener las notas
        $notas = DB::select(
            "SELECT 
                a.Nombres AS NombreAlumno, 
                a.Apellidos AS ApellidoAlumno, 
                asig.NombreAsignatura, 
                e.Nota, 
                e.FechaEvaluacion 
            FROM 
                alumnos a 
            JOIN 
                matriculas m ON a.RunAlumno = m.RunAlumno 
            JOIN 
                registrosde_clases rc ON m.NumeroMatricula = rc.NumeroMatricula 
            JOIN 
                evaluacions e ON rc.IDEvaluacion = e.IDEvaluacion 
            JOIN 
                mallas ma ON rc.IDCursoAsignatura = ma.IDCursoAsignatura 
            JOIN 
                asignaturas asig ON ma.IDAsignatura = asig.IDAsignatura
            WHERE 
                a.RunAlumno = ? 
                AND asig.NombreAsignatura = ?
            ORDER BY 
                e.FechaEvaluacion",
            [$estudiante, $asignatura]
        );

        // Retornar las notas en formato JSON
        return response()->json($notas);
    }
}
