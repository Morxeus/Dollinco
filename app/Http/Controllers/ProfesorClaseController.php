<?php

namespace App\Http\Controllers;

use App\Models\ProfesorClase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProfesorClaseRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\ProfesorDirector;
use App\Models\RegistrosdeClase;

class ProfesorClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $profesorClases = ProfesorClase::paginate();

        return view('profesor-clase.index', compact('profesorClases'))
            ->with('i', ($request->input('page', 1) - 1) * $profesorClases->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $profesorClase = new ProfesorClase();
        $profesorDirectors = ProfesorDirector::all();
        $registrosdeClases = RegistrosdeClase::all();

        return view('profesor-clase.create', compact('profesorClase','profesorDirectors','registrosdeClases'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfesorClaseRequest $request): RedirectResponse
    {
        ProfesorClase::create($request->validated());

        return Redirect::route('profesor-clases.index')
            ->with('success', 'ProfesorClase created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($IDProfesorClase): View
    {
        $profesorClase = ProfesorClase::find($IDProfesorClase);

        return view('profesor-clase.show', compact('profesorClase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IDProfesorClase): View
    {
        $profesorClase = ProfesorClase::find($IDProfesorClase);

        $profesorDirectors = ProfesorDirector::all();
        $registrosdeClases = RegistrosdeClase::all();

        return view('profesor-clase.edit', compact('profesorClase','profesorDirectors','registrosdeClases'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfesorClaseRequest $request, ProfesorClase $profesorClase): RedirectResponse
    {
        $profesorClase->update($request->validated());

        return Redirect::route('profesor-clases.index')
            ->with('success', 'ProfesorClase updated successfully');
    }

    public function destroy($IDProfesorClase): RedirectResponse
    {
        ProfesorClase::find($IDProfesorClase)->delete();

        return Redirect::route('profesor-clases.index')
            ->with('success', 'ProfesorClase deleted successfully');
    }
}
