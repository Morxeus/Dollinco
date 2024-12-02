<?php

namespace App\Http\Controllers;

use App\Models\RegistrosdeClase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrosdeClaseRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Malla;
use App\Models\Matricula;
use App\Models\Evaluacion;
use App\Models\Asistencia;
use App\Models\Anotacion;

class RegistrosdeClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $registrosdeClases = RegistrosdeClase::paginate();

        return view('registrosde-clase.index', compact('registrosdeClases'))
            ->with('i', ($request->input('page', 1) - 1) * $registrosdeClases->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $registrosdeClase = new RegistrosdeClase();
        $mallas = Malla::all();
        $matriculas = Matricula::all();
        $evaluacions = Evaluacion::all();
        $asistencias = Asistencia::all();
        $anotacions = Anotacion::all();


        return view('registrosde-clase.create', compact('registrosdeClase','mallas','matriculas','evaluacions','asistencias','anotacions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegistrosdeClaseRequest $request): RedirectResponse
    {
        RegistrosdeClase::create($request->validated());

        return Redirect::route('registrosde-clases.index')
            ->with('success', 'RegistrosdeClase created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($IDRegistrodeClase): View
    {
        $registrosdeClase = RegistrosdeClase::find($IDRegistrodeClase);

        return view('registrosde-clase.show', compact('registrosdeClase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IDRegistrodeClase): View
    {
        $registrosdeClase = RegistrosdeClase::find($IDRegistrodeClase);
        $mallas = Malla::all();
        $matriculas = Matricula::all();
        $evaluacions = Evaluacion::all();
        $asistencias = Asistencia::all();
        $anotacions = Anotacion::all();


        return view('registrosde-clase.edit', compact('registrosdeClase','mallas','matriculas','evaluacions','asistencias','anotacions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RegistrosdeClaseRequest $request, RegistrosdeClase $registrosdeClase): RedirectResponse
    {
        $registrosdeClase->update($request->validated());

        return Redirect::route('registrosde-clases.index')
            ->with('success', 'RegistrosdeClase updated successfully');
    }

    public function destroy($IDRegistrodeClase): RedirectResponse
    {
        RegistrosdeClase::find($IDRegistrodeClase)->delete();

        return Redirect::route('registrosde-clases.index')
            ->with('success', 'RegistrosdeClase deleted successfully');
    }
}
