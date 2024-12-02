<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EvaluacionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $evaluacions = Evaluacion::paginate();

        return view('evaluacion.index', compact('evaluacions'))
            ->with('i', ($request->input('page', 1) - 1) * $evaluacions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $evaluacion = new Evaluacion();

        return view('evaluacion.create', compact('evaluacion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EvaluacionRequest $request): RedirectResponse
    {
        Evaluacion::create($request->validated());

        return Redirect::route('evaluacions.index')
            ->with('success', 'Evaluacion created successfully.');
            $request->merge([
                'Nota' => str_replace(',', '.', $request->Nota),
            
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($IDEvaluacion): View
    {
        $evaluacion = Evaluacion::find($IDEvaluacion);

        return view('evaluacion.show', compact('evaluacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IDEvaluacion): View
    {
        $evaluacion = Evaluacion::find($IDEvaluacion);

        return view('evaluacion.edit', compact('evaluacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EvaluacionRequest $request, Evaluacion $evaluacion): RedirectResponse
    {
        $evaluacion->update($request->validated());

        return Redirect::route('evaluacions.index')
            ->with('success', 'Evaluacion updated successfully');
    }

    public function destroy($IDEvaluacion): RedirectResponse
    {
        Evaluacion::find($IDEvaluacion)->delete();

        return Redirect::route('evaluacions.index')
            ->with('success', 'Evaluacion deleted successfully');
    }
}
