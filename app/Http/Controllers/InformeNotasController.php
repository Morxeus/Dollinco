<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class InformeNotasController extends Controller
{
    // Método para mostrar la vista con las notas y promedios
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
                ->join('detalleregistroclases as drc', 'm.NumeroMatricula', '=', 'drc.NumeroMatricula')
                ->join('evaluacions as e', 'drc.IdEvaluacion', '=', 'e.IdEvaluacion')
                ->join('registroclases as rc', 'drc.IdRegistroClases', '=', 'rc.IdRegistroClases')
                ->join('mallas as ma', 'rc.IdMalla', '=', 'ma.IdMalla')
                ->join('asignaturas as asig', 'ma.IdAsignatura', '=', 'asig.IDAsignatura')
                ->where('m.RunApoderado', '=', $apoderadoId)
                ->select(
                    'a.Nombres AS NombreAlumno',
                    'a.Apellidos AS ApellidoAlumno',
                    'e.NombreEvaluacion',
                    'asig.NombreAsignatura',
                    DB::raw('AVG(drc.NotaEvaluacion) AS PromedioNotas'),
                    DB::raw("GROUP_CONCAT(drc.NotaEvaluacion SEPARATOR ', ') AS NotasEvaluacion"),
                    DB::raw("
                        CASE 
                            WHEN AVG(drc.NotaEvaluacion) >= 6.0 THEN 'Excelente'
                            WHEN AVG(drc.NotaEvaluacion) >= 5.0 THEN 'Bueno'
                            WHEN AVG(drc.NotaEvaluacion) >= 4.0 THEN 'Aprobado'
                            ELSE 'Reprobado'
                        END AS Observacion
                    ")
                )
                ->groupBy(
                    'a.RunAlumno',
                    'a.Nombres',
                    'a.Apellidos',
                    'e.NombreEvaluacion',
                    'asig.NombreAsignatura'
                )
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
    
        // Consulta de notas y asistencia
        $notas = DB::table('alumnos as a')
            ->join('matriculas as m', 'a.RunAlumno', '=', 'm.RunAlumno')
            ->join('detalleregistroclases as drc', 'm.NumeroMatricula', '=', 'drc.NumeroMatricula')
            ->join('evaluacions as e', 'drc.IdEvaluacion', '=', 'e.IdEvaluacion')
            ->join('registroclases as rc', 'drc.IdRegistroClases', '=', 'rc.IdRegistroClases')
            ->join('mallas as ma', 'rc.IdMalla', '=', 'ma.IdMalla')
            ->join('asignaturas as asig', 'ma.IdAsignatura', '=', 'asig.IDAsignatura')
            ->leftJoin('asistencias as asis', 'drc.IdAsistencia', '=', 'asis.IDAsistencia')
            ->where('m.RunApoderado', '=', $apoderadoId)
            ->select(
                'a.Nombres AS NombreAlumno',
                'a.Apellidos AS ApellidoAlumno',
                'e.NombreEvaluacion',
                'asig.NombreAsignatura',
                DB::raw('AVG(drc.NotaEvaluacion) AS PromedioNotas'),
                DB::raw("GROUP_CONCAT(drc.NotaEvaluacion SEPARATOR ', ') AS NotasEvaluacion"),
                DB::raw("
                    CASE 
                        WHEN AVG(drc.NotaEvaluacion) >= 6.0 THEN 'Excelente'
                        WHEN AVG(drc.NotaEvaluacion) >= 5.0 THEN 'Bueno'
                        WHEN AVG(drc.NotaEvaluacion) >= 4.0 THEN 'Aprobado'
                        ELSE 'Reprobado'
                    END AS Observacion
                "),
                DB::raw('COUNT(drc.IdAsistencia) AS TotalClases'),
                DB::raw('SUM(CASE WHEN asis.EstadoAsistencia = "PRESENTE" THEN 1 ELSE 0 END) AS ClasesAsistidas'),
                DB::raw('(SUM(CASE WHEN asis.EstadoAsistencia = "PRESENTE" THEN 1 ELSE 0 END) / COUNT(drc.IdAsistencia)) * 100 AS PorcentajeAsistencia')
            )
            ->groupBy(
                'a.RunAlumno',
                'a.Nombres',
                'a.Apellidos',
                'e.NombreEvaluacion',
                'asig.NombreAsignatura'
            )
            ->get();
    
        // Generar el PDF usando la vista
        $pdf = Pdf::loadView('informes.notas-pdf', compact('notas', 'apoderadoId'));
    
        // Mostrar el PDF en el navegador
        return $pdf->stream('informe_notas.pdf');
    }
    
    
}

