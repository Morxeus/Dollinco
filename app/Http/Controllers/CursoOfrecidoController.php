<?php

namespace App\Http\Controllers;

use App\Models\CursoOfrecido;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CursoOfrecidoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Curso;
use App\Models\Periodo;

class CursoOfrecidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $cursoOfrecidos = CursoOfrecido::with(['curso', 'periodo'])->paginate(10);

        return view('curso-ofrecido.index', compact('cursoOfrecidos'))
            ->with('i', ($request->input('page', 1) - 1) * $cursoOfrecidos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $cursoOfrecido = new CursoOfrecido();
        $cursos = Curso::all();
        $periodos = Periodo::all();

        return view('curso-ofrecido.create', compact('cursoOfrecido','cursos','periodos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CursoOfrecidoRequest $request): RedirectResponse
    {
        CursoOfrecido::create($request->validated());

        return Redirect::route('curso-ofrecidos.index')
            ->with('success', 'Curso ofrecido creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($IDCursoOfrecido): View
    {
        $cursoOfrecido = CursoOfrecido::find($IDCursoOfrecido);

        return view('curso-ofrecido.show', compact('cursoOfrecido'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IDCursoOfrecido): View
    {
        $cursoOfrecido = CursoOfrecido::find($IDCursoOfrecido);
        $cursos = Curso::all();
        $periodos = Periodo::all();

        return view('curso-ofrecido.edit', compact('cursoOfrecido','cursos','periodos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CursoOfrecidoRequest $request, CursoOfrecido $cursoOfrecido): RedirectResponse
    {
        $cursoOfrecido->update($request->validated());

        return Redirect::route('curso-ofrecidos.index')
            ->with('success', 'Curso ofrecido actualizado exitosamente.');
    }

    public function destroy($IDCursoOfrecido): RedirectResponse
    {
        try {
            $cursoOfrecido = CursoOfrecido::findOrFail($IDCursoOfrecido);
    
            // Verificar manualmente las relaciones (opcional, si no se maneja en el modelo)
            if ($cursoOfrecido->curso()->exists() || $cursoOfrecido->periodo()->exists()) {
                return Redirect::route('curso-ofrecidos.index')
                    ->with('error', 'No se puede eliminar el CursoOfrecido porque tiene relaciones con Curso o Periodo.');
            }
    
            $cursoOfrecido->delete();
    
            return Redirect::route('curso-ofrecidos.index')
                ->with('success', 'Curso ofrecido eliminado exitosamente.');
        } catch (\Exception $e) {
            return Redirect::route('curso-ofrecidos.index')
                ->with('error', 'Ocurrió un error al intentar eliminar el CursoOfrecido: ' . $e->getMessage());
        }
    }
    
}