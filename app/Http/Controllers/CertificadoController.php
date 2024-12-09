<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Apoderado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Matricula;

class CertificadoController extends Controller
{
    // Mostrar formulario de selección de certificado
    public function index()
    {
        // Obtener lista de apoderados
        $apoderados = Apoderado::select('RunApoderado', DB::raw("CONCAT(Nombres, ' ', Apellidos) AS NombreCompleto"))->get();
    
        // Obtener alumnos vinculados a apoderados a través de matrículas
        $alumnos = Alumno::select('alumnos.RunAlumno', DB::raw("CONCAT(alumnos.Nombres, ' ', alumnos.Apellidos) AS NombreCompleto"))
            ->join('matriculas', 'alumnos.RunAlumno', '=', 'matriculas.RunAlumno')
            ->get();
    
        // Solo se tiene una opción para el tipo de certificado en este momento
        $tiposCertificado = [
            'Certificado de Alumno Regular',
        ];
    
        // Pasar datos a la vista
        return view('Certificados.index', compact('apoderados', 'alumnos', 'tiposCertificado'));
    }

    public function obtenerAlumnosPorApoderado($runApoderado)
    {
        // Obtener los alumnos vinculados al apoderado mediante la tabla matrículas
        $alumnos = Alumno::select('alumnos.RunAlumno', DB::raw("CONCAT(alumnos.Nombres, ' ', alumnos.Apellidos) AS NombreCompleto"))
            ->join('matriculas', 'alumnos.RunAlumno', '=', 'matriculas.RunAlumno')
            ->where('matriculas.RunApoderado', $runApoderado)
            ->get();

        // Retornar como JSON para el uso en el frontend
        return response()->json($alumnos);
    }
        

    // Generar el certificado PDF
    public function generarCertificado(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'alumno' => 'required|exists:alumnos,RunAlumno',
            'apoderado' => 'required|exists:apoderados,RunApoderado',
            'tipoCertificado' => 'required|string|in:Certificado de Alumno Regular',
        ]);

        // Obtener los datos del formulario
        $runAlumno = $request->input('alumno');
        $runApoderado = $request->input('apoderado');
        $tipoCertificado = $request->input('tipoCertificado');

        // Obtener los datos del alumno y apoderado
        $alumno = Alumno::where('RunAlumno', $runAlumno)->firstOrFail();
        $apoderado = Apoderado::where('RunApoderado', $runApoderado)->firstOrFail();

        // Obtener matrícula y datos adicionales
        $matricula = Matricula::where('RunAlumno', $runAlumno)
            ->where('RunApoderado', $runApoderado)
            ->firstOrFail();

        // Preparar los datos para el certificado
        $data = [
            'alumno' => [
                'nombre' => $alumno->Nombres, // Solo el nombre
                'apellido' => $alumno->Apellidos, // Solo el apellido
                'rut' => $alumno->RunAlumno,
                'direccion' => $alumno->Direccion,
                'genero' => $alumno->Genero,
            ],
            'apoderado' => [
                'nombre' => $apoderado->Nombres, // Solo el nombre
                'apellido' => $apoderado->Apellidos, // Solo el apellido
                'rut' => $apoderado->RunApoderado,
                'correo' => $apoderado->Correo,
                'telefono' => $apoderado->Telefono,
                'direccion' => $apoderado->Direccion,
            ],
            'matricula' => $matricula->FechaInscripcion,
            'colegio' => [
                'nombre' => 'ESCUELA BÁSICA DOLLINCO',
            ],
            'fecha' => \Carbon\Carbon::now()->locale('es')->isoFormat('D [de] MMMM [de] YYYY'),
            'tipo_certificado' => $tipoCertificado,
        ];

        // Generar el PDF con los datos
        $pdf = PDF::loadView('Certificados.Certificado', $data);

        // Descargar el certificado generado como PDF
        return $pdf->stream('Certificado.pdf');
    }

}
