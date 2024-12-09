<?php

namespace App\Http\Controllers;

use App\Model\Alumno;
use App\Model\Anotacion;
use App\Model\RegistroClase;
use App\Model\DetalleRegistroClase;
use App\Model\Malla;
use App\Model\Matricula;
use App\Model\ProfesorDirector;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Collection; 
use Illuminate\Support\Facades\DB;

class ListaAnotacionesController extends Controller
{
    // Método para obtener las anotaciones de los alumnos
    public function index()
    {
        // Ejecutar la consulta SQL personalizada
        $resultados = DB::select("
            SELECT 
                a.RunAlumno AS RUN,
                CONCAT(a.Nombres, ' ', a.Apellidos) AS Alumno,
                ac.TipoAnotacion AS Tipo,
                ac.DescripcionAnotacion AS Descripcion,
                r.FechaClase AS FechaClase,
                r.DescripcionClase AS ClaseDescripcion,
                CONCAT(p.Nombres, ' ', p.Apellidos) AS Profesor
            FROM 
                anotacions ac
            INNER JOIN detalleregistroclases drc ON ac.IdDetalleRegistroClase = drc.IdDetalleRegistroClase
            INNER JOIN registroclases r ON drc.IdRegistroClases = r.IdRegistroClases
            INNER JOIN mallas m ON r.IdMalla = m.IdMalla
            INNER JOIN matriculas mat ON m.NumeroMatricula = mat.NumeroMatricula
            INNER JOIN alumnos a ON mat.RunAlumno = a.RunAlumno
            INNER JOIN profesor_directors p ON m.RunProfesor = p.RunProfesor
            ORDER BY a.Apellidos, a.Nombres, r.FechaClase;
        ");

        // Convertir los resultados a una colección de Laravel
        $resultados = collect($resultados);

        // Retornar la vista con los resultados
        return view('anotaciones.index', compact('resultados'));
    }
}
