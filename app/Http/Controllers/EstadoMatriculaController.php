<?php

namespace App\Http\Controllers;

use App\Models\EstadoMatricula;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EstadoMatriculaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EstadoMatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $estadoMatriculas = EstadoMatricula::paginate();

        return view('estado-matricula.index', compact('estadoMatriculas'))
            ->with('i', ($request->input('page', 1) - 1) * $estadoMatriculas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $estadoMatricula = new EstadoMatricula();

        return view('estado-matricula.create', compact('estadoMatricula'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstadoMatriculaRequest $request): RedirectResponse
    {
        EstadoMatricula::create($request->validated());

        return Redirect::route('estado-matriculas.index')
            ->with('success', 'EstadoMatricula created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($IDMatriculaEstado): View
    {
        $estadoMatricula = EstadoMatricula::find($IDMatriculaEstado);

        return view('estado-matricula.show', compact('estadoMatricula'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IDMatriculaEstado): View
    {
        $estadoMatricula = EstadoMatricula::find($IDMatriculaEstado);

        return view('estado-matricula.edit', compact('estadoMatricula'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstadoMatriculaRequest $request, EstadoMatricula $estadoMatricula): RedirectResponse
    {
        $estadoMatricula->update($request->validated());

        return Redirect::route('estado-matriculas.index')
            ->with('success', 'EstadoMatricula updated successfully');
    }

    public function destroy($IDMatriculaEstado): RedirectResponse
    {
        EstadoMatricula::find($IDMatriculaEstado)->delete();

        return Redirect::route('estado-matriculas.index')
            ->with('success', 'EstadoMatricula deleted successfully');
    }
}
