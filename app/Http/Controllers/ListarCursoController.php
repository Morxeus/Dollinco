<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Para usar DB
use Illuminate\Support\Collection; // Para manejar colecciones

class ListarCursoController extends Controller
{
    public function index()
    {
        // Obtener todos los cursos para el filtro
        $cursos = DB::table('curso_ofrecidos')
            ->join('cursos', 'curso_ofrecidos.IDCurso', '=', 'cursos.IDCurso')
            ->select(DB::raw("CONCAT(cursos.NombreCurso, ' - ', curso_ofrecidos.Letra) AS CursoCompleto, curso_ofrecidos.IDCursoOfrecido"))
            ->orderBy('CursoCompleto')
            ->get();

        return view('vistatemp.listacurso', compact('cursos'));
    }

    public function filtrar(Request $request)
    {
        $idCursoOfrecido = $request->input('IDCursoOfrecido');

        // Ejecutar la consulta SQL personalizada
        $resultados = DB::select("
            SELECT 
                CONCAT(c.NombreCurso, ' - ', co.Letra) AS CursoCompleto,
                a.RunAlumno AS RUN,
                CONCAT(a.Nombres, ' ', a.Apellidos) AS NombreAlumno,
                COUNT(DISTINCT m.NumeroMatricula) AS NumeroMatriculas,
                co.Cupos,
                (co.Cupos - COUNT(DISTINCT m.NumeroMatricula)) AS Disponibilidad
            FROM 
                curso_ofrecidos co
            INNER JOIN cursos c ON co.IDCurso = c.IDCurso
            LEFT JOIN mallas ma ON co.IDCurso = ma.IdCurso
            LEFT JOIN matriculas m ON ma.NumeroMatricula = m.NumeroMatricula
            LEFT JOIN alumnos a ON m.RunAlumno = a.RunAlumno
            WHERE co.IDCursoOfrecido = ?
            GROUP BY 
                CursoCompleto, a.RunAlumno, a.Nombres, a.Apellidos, co.Cupos
            ORDER BY 
                CursoCompleto, a.Apellidos, a.Nombres;
        ", [$idCursoOfrecido]);

        // Convertir el resultado a una colección de Laravel
        $resultados = collect($resultados);

        // Obtener todos los cursos para el filtro
        $cursos = DB::table('curso_ofrecidos')
            ->join('cursos', 'curso_ofrecidos.IDCurso', '=', 'cursos.IDCurso')
            ->select(DB::raw("CONCAT(cursos.NombreCurso, ' - ', curso_ofrecidos.Letra) AS CursoCompleto, curso_ofrecidos.IDCursoOfrecido"))
            ->orderBy('CursoCompleto')
            ->get();

        return view('vistatemp.listacurso', compact('resultados', 'cursos', 'idCursoOfrecido'));
    }
}
