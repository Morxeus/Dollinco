<?php

namespace App\Http\Controllers;

use App\Models\ReunionApoderado;
use App\Models\Curso;
use App\Models\Apoderado;
use App\Models\Reunion;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\ReunionApoderadoRequest;

class ReunionApoderadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $reunionApoderados = ReunionApoderado::with(['apoderado', 'reunion'])->paginate(10);

        return view('reunion-apoderado.index', compact('reunionApoderados'))
            ->with('i', ($request->input('page', 1) - 1) * $reunionApoderados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $reunionApoderado = new ReunionApoderado(); // Crear un nuevo objeto vacío
        $cursos = Curso::all(); // Obtener todos los cursos
        $reunions = Reunion::all(); // Obtener todas las reuniones
        $apoderados = []; // Por defecto, no cargar apoderados
    
        return view('reunion-apoderado.create', compact('reunionApoderado', 'cursos', 'reunions', 'apoderados'));
    }
    
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(ReunionApoderadoRequest $request): RedirectResponse
    {
        // Depuración: registra los datos enviados
        \Log::info($request->all());
    
        // Continúa con el guardado
        $data = $request->validated();
        ReunionApoderado::create($data);
    
        return redirect()->route('reunion-apoderados.index')
            ->with('success', 'Reunión registrada exitosamente.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($IDReunionApoderado): View
    {
        $reunionApoderado = ReunionApoderado::with(['apoderado', 'reunion'])->findOrFail($IDReunionApoderado);

        return view('reunion-apoderado.show', compact('reunionApoderado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IDReunionApoderado): View
    {
        $reunionApoderado = ReunionApoderado::findOrFail($IDReunionApoderado);
        $cursos = Curso::all();

        return view('reunion-apodera.edit', compact('reunionApoderado', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReunionApoderadoRequest $request, $IDReunionApoderado): RedirectResponse
    {
        $reunionApoderado = ReunionApoderado::findOrFail($IDReunionApoderado);

        $reunionApoderado->update($request->validated());

        return redirect()->route('reunion-apoderados.index')
            ->with('success', 'Reunión actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($IDReunionApoderado): RedirectResponse
    {
        ReunionApoderado::findOrFail($IDReunionApoderado)->delete();

        return redirect()->route('reunion-apoderados.index')
            ->with('success', 'Reunión eliminada exitosamente.');
    }

    /**
     * Get apoderados filtered by course through mallas and matriculas.
     */
    public function getApoderadosByCurso($cursoId): \Illuminate\Http\JsonResponse
    {
        $apoderados = Apoderado::whereHas('matriculas', function ($query) use ($cursoId) {
            $query->whereHas('mallas', function ($subQuery) use ($cursoId) {
                $subQuery->where('IDCurso', $cursoId);
            });
        })->get(['RunApoderado', 'Nombres', 'Apellidos']);

        return response()->json($apoderados);
    }
}
