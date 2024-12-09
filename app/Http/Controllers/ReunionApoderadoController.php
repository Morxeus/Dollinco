<?php

namespace App\Http\Controllers;

use App\Models\ReunionApoderado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ReunionApoderadoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Reunion;
use App\Models\Malla;
use App\Models\Curso;
use App\Models\Matricula;
use App\Models\Apoderado;
use App\Mail\ReunionNotificationMail; // Importar el mailable
use Illuminate\Support\Facades\Mail; // Importar la clase Mail


class ReunionApoderadoController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $reunionApoderados = ReunionApoderado::paginate(10);

        return view('reunion-apoderado.index', compact('reunionApoderados'))
            ->with('i', ($request->input('page', 1) - 1) * $reunionApoderados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $reunionApoderado = new ReunionApoderado();
        $cursos = Curso::whereIn('IdCurso', Malla::pluck('IdCurso')->unique())->get();
        $reuniones = Reunion::all(); // Cargar todas las reuniones disponibles
        return view('reunion-apoderado.create', compact('reunionApoderado','cursos','reuniones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReunionApoderadoRequest $request): RedirectResponse
    {
        $request->validate([
            'IdReunion' => 'required|exists:reunions,IdReunion',
            'IdCurso' => 'required|exists:cursos,IDCurso',
            'TipoReunion' => 'required|in:General,Específica',
            'asistencias' => 'nullable|array', // Permitir un array de asistencias
            'asistencias.*' => 'nullable|string|in:Sí,No', // Cada asistencia debe ser Sí o No
        ]);
    
        $idReunion = $request->IdReunion;
    
        if ($request->TipoReunion === 'General') {
            // Obtener las mallas y matrículas relacionadas con el curso
            $mallas = Malla::where('IdCurso', $request->IdCurso)->pluck('NumeroMatricula');
            $matriculas = Matricula::whereIn('NumeroMatricula', $mallas)->with('apoderado')->get();
    
            foreach ($matriculas as $matricula) {
                // Obtener el valor de asistencia para este apoderado (por defecto "No")
                $asistencia = $request->input("asistencias.{$matricula->RunApoderado}", 'No');
    
                ReunionApoderado::create([
                    'IdReunion' => $idReunion,
                    'IdMalla' => $matricula->mallas->first()->IdMalla ?? null,
                    'Asistencia' => $asistencia, // Guardar el valor "Sí" o "No"
                ]);
    
                // Enviar notificación por correo electrónico si el apoderado existe
                if ($matricula->apoderado) {
                    $reunion = Reunion::findOrFail($idReunion); // Detalles de la reunión
                    $correoData = [
                        'TipoReunion' => $reunion->TipoReunion,
                        'DescripcionReunion' => $reunion->DescripcionReunion,
                        'FechaInicio' => $reunion->FechaInicio,
                    ];
                    Mail::to($matricula->apoderado->Correo)->send(new ReunionNotificationMail($correoData));
                }
            }
        } else {
            $request->validate([
                'RunApoderado' => 'required|exists:apoderados,RunApoderado',
            ]);
    
            $malla = Malla::where('IdCurso', $request->IdCurso)->first();
            $asistencia = $request->input("asistencias.{$request->RunApoderado}", 'No');
    
            ReunionApoderado::create([
                'IdReunion' => $idReunion,
                'IdMalla' => $malla->IdMalla ?? null,
                'Asistencia' => $asistencia, // Guardar el valor "Sí" o "No"
            ]);
    
            // Enviar notificación por correo electrónico
            $apoderado = Apoderado::where('RunApoderado', $request->RunApoderado)->first();
            if ($apoderado) {
                $reunion = Reunion::findOrFail($idReunion); // Detalles de la reunión
                $correoData = [
                    'TipoReunion' => $reunion->TipoReunion,
                    'DescripcionReunion' => $reunion->DescripcionReunion,
                    'FechaInicio' => $reunion->FechaInicio,
                ];
                Mail::to($apoderado->Correo)->send(new ReunionNotificationMail($correoData));
            }
        }
    
        return redirect()->route('reunion-apoderados.index')
            ->with('success', 'Reunión registrada correctamente y correos enviados.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($IdReunionApoderado): View
    {
        $reunionApoderado = ReunionApoderado::find($IdReunionApoderado);

        return view('reunion-apoderado.show', compact('reunionApoderado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IdReunionApoderado): View
    {
        $reunionApoderado = ReunionApoderado::findOrFail($IdReunionApoderado);
        $cursos = Curso::whereIn('IdCurso', Malla::pluck('IdCurso')->unique())->get();
        $reuniones = Reunion::all();
    
        return view('reunion-apoderado.edit', compact('reunionApoderado', 'cursos', 'reuniones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReunionApoderadoRequest $request, $IdReunionApoderado): RedirectResponse
    {
        $request->validate([
            'asistencias' => 'required|array',
            'asistencias.*' => 'in:Sí,No', // Validación para cada asistencia
        ]);
    
        $reunionApoderado = ReunionApoderado::findOrFail($IdReunionApoderado);
    
        // Actualizar las asistencias para los apoderados relacionados
        foreach ($request->input('asistencias', []) as $runApoderado => $asistencia) {
            ReunionApoderado::where('IdReunion', $reunionApoderado->IdReunion)
                ->whereHas('malla.matriculas', function ($query) use ($runApoderado) {
                    $query->where('RunApoderado', $runApoderado);
                })
                ->update(['Asistencia' => $asistencia]);
        }
    
        return redirect()->route('reunion-apoderados.index')
            ->with('success', 'Asistencias actualizadas correctamente.');
    }
    

    public function destroy($IdReunionApoderado): RedirectResponse
    {
        try {
            $reunionApoderado = ReunionApoderado::findOrFail($IdReunionApoderado);
    
            // Verificar relaciones adicionales manualmente (opcional)
            if ($reunionApoderado->reunion()->exists()) {
                return Redirect::route('reunion-apoderados.index')
                    ->with('error', 'No se puede eliminar este registro porque está relacionado con una reunión.');
            }
    
            $reunionApoderado->delete();
    
            return Redirect::route('reunion-apoderados.index')
                ->with('success', 'Registro de ReunionApoderado eliminado exitosamente.');
        } catch (\Exception $e) {
            return Redirect::route('reunion-apoderados.index')
                ->with('error', 'Ocurrió un error al intentar eliminar el registro: ' . $e->getMessage());
        }
    }
    
    public function getApoderadosByCurso($idCurso)
    {
        // Obtener todas las mallas relacionadas con el curso
        $mallas = Malla::where('IdCurso', $idCurso)->pluck('NumeroMatricula');
    
        if ($mallas->isEmpty()) {
            return response()->json(['error' => 'No se encontraron mallas asociadas a este curso.'], 404);
        }
    
        // Obtener las matrículas relacionadas con esas mallas
        $matriculas = Matricula::whereIn('NumeroMatricula', $mallas)->with('apoderado')->get();
    
        if ($matriculas->isEmpty()) {
            return response()->json(['error' => 'No se encontraron matrículas para estas mallas.'], 404);
        }
    
        // Mapear los apoderados relacionados
        $apoderados = $matriculas->map(function ($matricula) {
            return [
                'RunApoderado' => $matricula->apoderado->RunApoderado,
                'Nombres' => $matricula->apoderado->Nombres,
                'Apellidos' => $matricula->apoderado->Apellidos,
            ];
        });
    
        return response()->json($apoderados);
    }
    
    
    // public function asistencia($id): View
    // {
    //     $reunionApoderado = ReunionApoderado::findOrFail($id);

    //     // Obtener los apoderados asociados al curso de la reunión
    //     $mallas = Malla::where('IdCurso', $reunionApoderado->IdCurso)->pluck('NumeroMatricula');
    //     $matriculas = Matricula::whereIn('NumeroMatricula', $mallas)->with('apoderado')->get();

    //     // Filtrar los apoderados disponibles
    //     $apoderados = $matriculas->map(function ($matricula) {
    //         return $matricula->apoderado;
    //     })->filter();

    //     return view('reunion-apoderado.asistencia', compact('reunionApoderado', 'apoderados'));
    // }

    // /**
    //  * Guardar la asistencia pasada.
    //  */
    // public function guardarAsistencia(Request $request, $id): RedirectResponse
    // {
    //     $reunionApoderado = ReunionApoderado::findOrFail($id);

    //     $request->validate([
    //         'asistencias' => 'required|array',
    //         'asistencias.*' => 'in:Sí,No',
    //     ]);

    //     // Procesar la asistencia de cada apoderado
    //     foreach ($request->asistencias as $runApoderado => $asistencia) {
    //         ReunionApoderado::updateOrCreate(
    //             [
    //                 'IdReunion' => $reunionApoderado->IdReunion,
    //                 'RunApoderado' => $runApoderado,
    //             ],
    //             [
    //                 'Asistencia' => $asistencia,
    //             ]
    //         );
    //     }

    //     return redirect()->route('reunion-apoderados.index')
    //         ->with('success', 'Asistencia guardada correctamente.');
    // }


    
}