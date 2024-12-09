<?php

namespace App\Http\Controllers;

use App\Models\Detalleregistroclase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DetalleregistroclaseRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Matricula;
use App\Models\Evaluacion;
use App\Models\Registroclase;
use App\Models\Asistencia;


class DetalleregistroclaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $detalleregistroclases = Detalleregistroclase::paginate(10);

        return view('detalleregistroclase.index', compact('detalleregistroclases'))
            ->with('i', ($request->input('page', 1) - 1) * $detalleregistroclases->perPage());
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Cargar datos necesarios para la vista
        $registroClases = RegistroClase::with(['malla.curso', 'malla.asignatura'])->get();
        $evaluaciones = Evaluacion::all();
        $alumnos = Matricula::with('alumno')->get();
        $asistencias = Asistencia::all();
    
        return view('detalleregistroclase.create', compact('registroClases', 'evaluaciones', 'alumnos','asistencias'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'IdRegistroClases' => 'required|exists:registroclases,IdRegistroClases',
            'IdEvaluacion' => 'required|exists:evaluacions,IdEvaluacion',
            'NumeroMatricula' => 'required|exists:matriculas,NumeroMatricula',
            'NotaEvaluacion' => 'nullable|numeric|min:1|max:10',
            'IdAsistencia' => 'nullable|exists:asistencias,IdAsistencia',
        ]);
    
        Detalleregistroclase::create($request->all());
    
        return redirect()->route('detalleregistroclases.index')->with('success', 'Detalle de registro de clase guardado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($IdDetalleRegistroClase): View
    {
        $detalleregistroclase = Detalleregistroclase::find($IdDetalleRegistroClase);

        return view('detalleregistroclase.show', compact('detalleregistroclase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IdDetalleRegistroClase): View
    {
        $detalleregistroclase = Detalleregistroclase::find($IdDetalleRegistroClase);

        return view('detalleregistroclase.edit', compact('detalleregistroclase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DetalleregistroclaseRequest $request, Detalleregistroclase $detalleregistroclase): RedirectResponse
    {
        $detalleregistroclase->update($request->validated());

        return Redirect::route('detalleregistroclases.index')
            ->with('success', 'Detalleregistroclase updated successfully');
    }

    public function destroy($IdDetalleRegistroClase): RedirectResponse
    {
        try {
            $detalleRegistroClase = Detalleregistroclase::findOrFail($IdDetalleRegistroClase);
    
            // Verificar relaciones manualmente (opcional si no se maneja en el modelo)
            if (
                $detalleRegistroClase->anotacion()->exists() ||
                $detalleRegistroClase->asistencia()->exists() ||
                $detalleRegistroClase->evaluacion()->exists()
            ) {
                return Redirect::route('detalleregistroclases.index')
                    ->with('error', 'No se puede eliminar el detalle del registro de clase porque tiene relaciones activas.');
            }
    
            $detalleRegistroClase->delete();
    
            return Redirect::route('detalleregistroclases.index')
                ->with('success', 'Detalle del registro de clase eliminado exitosamente.');
        } catch (\Exception $e) {
            return Redirect::route('detalleregistroclases.index')
                ->with('error', 'Ocurrió un error al intentar eliminar el detalle del registro de clase: ' . $e->getMessage());
        }
    }
    
}
