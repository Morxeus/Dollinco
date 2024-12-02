<?php

namespace App\Http\Controllers;

use App\Models\Reunion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ReunionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\ProfesorDirector;

class ReunionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $reunions = Reunion::paginate();

        return view('reunion.index', compact('reunions'))
            ->with('i', ($request->input('page', 1) - 1) * $reunions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $reunion = new Reunion();
        $profesores = ProfesorDirector::all(); // Obtener todos los profesores
    
        return view('reunion.create', compact('reunion', 'profesores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReunionRequest $request): RedirectResponse
    {
        Reunion::create($request->validated());

        return Redirect::route('reunions.index')
            ->with('success', 'Reunion created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($IDReunion): View
    {
        $reunion = Reunion::find($IDReunion);

        return view('reunion.show', compact('reunion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IDReunion): View
    {
        $reunion = Reunion::find($IDReunion);
        $profesores = ProfesorDirector::all();

        return view('reunion.edit', compact('reunion', 'profesores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReunionRequest $request, Reunion $reunion): RedirectResponse
    {
        $reunion->update($request->validated());

        return Redirect::route('reunions.index')
            ->with('success', 'Reunion updated successfully');
    }

    public function destroy($IDReunion): RedirectResponse
    {
        Reunion::find($IDReunion)->delete();

        return Redirect::route('reunions.index')
            ->with('success', 'Reunion deleted successfully');
    }
}
