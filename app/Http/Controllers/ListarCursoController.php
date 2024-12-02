<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use app\Models\CursoOfrecido;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Collection; // Para manejar colecciones

use Illuminate\Support\Facades\DB;  // Asegúrate de incluir DB

class ListarCursoController extends Controller
{
    public function index()
    {
        // Ejecutar la consulta SQL personalizada
        $resultados = DB::select("
            SELECT cursos.NombreCurso AS Curso, alumnos.RunAlumno AS RUN, 
            CONCAT(alumnos.Nombres, ' ', alumnos.Apellidos) AS NombreAlumno 
            FROM alumnos 
            INNER JOIN matriculas ON alumnos.RunAlumno = matriculas.RunAlumno 
            INNER JOIN mallas ON matriculas.NumeroMatricula = mallas.NumeroMatricula 
            INNER JOIN cursos ON mallas.IDCurso = cursos.IDCurso 
            INNER JOIN curso_ofrecidos ON curso_ofrecidos.IDCurso = cursos.IDCurso 
            ORDER BY cursos.NombreCurso, alumnos.Apellidos, alumnos.Nombres;
            
        ");

        // Convertir el resultado a una colección de Laravel
        $resultados = collect($resultados);

        // Retornar la vista con los resultados
        return view('vistatemp.listacurso', compact('resultados'));
    }
    
}
