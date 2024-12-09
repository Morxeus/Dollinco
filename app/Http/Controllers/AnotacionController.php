<?php

namespace App\Http\Controllers;

use App\Models\Anotacion;
use App\Models\Detalleregistroclase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AnotacionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AnotacionController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index(Request $request): View
    {
        $anotacions = Anotacion::paginate(10);

        return view('anotacion.index', compact('anotacions'))
            ->with('i', ($request->input('page', 1) - 1) * $anotacions->perPage());
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create(): View
    {
        $anotacion = new Anotacion();
        $detallesRegistroClase = Detalleregistroclase::all();
        return view('anotacion.create', compact('anotacion', 'detallesRegistroClase'));
    }

    /**
     * Almacena un recurso recién creado en la base de datos.
     */
    public function store(AnotacionRequest $request): RedirectResponse
    {
        Anotacion::create($request->validated());

        return Redirect::route('anotacions.index')
            ->with('success', 'Anotación creada exitosamente.');
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show($IdAnotacion): View
    {
        $anotacion = Anotacion::find($IdAnotacion);

        return view('anotacion.show', compact('anotacion'));
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     */
    public function edit($IdAnotacion): View
    {
        $anotacion = Anotacion::find($IdAnotacion);
        $detallesRegistroClase = Detalleregistroclase::all();
        return view('anotacion.edit', compact('anotacion', 'detallesRegistroClase'));
    }

    /**
     * Actualiza el recurso especificado en la base de datos.
     */
    public function update(AnotacionRequest $request, Anotacion $anotacion): RedirectResponse
    {
        $anotacion->update($request->validated());

        return Redirect::route('anotacions.index')
            ->with('success', 'Anotación actualizada exitosamente.');
    }

    /**
     * Elimina el recurso especificado de la base de datos.
     */
    public function destroy($IdAnotacion): RedirectResponse
    {
        Anotacion::find($IdAnotacion)->delete();

        return Redirect::route('anotacions.index')
            ->with('success', 'Anotación eliminada exitosamente.');
    }
}
