<?php

namespace App\Http\Controllers;

use App\Models\Anotacion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AnotacionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AnotacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $anotacions = Anotacion::paginate();

        return view('anotacion.index', compact('anotacions'))
            ->with('i', ($request->input('page', 1) - 1) * $anotacions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $anotacion = new Anotacion();

        return view('anotacion.create', compact('anotacion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnotacionRequest $request): RedirectResponse
    {
        Anotacion::create($request->validated());

        return Redirect::route('anotacions.index')
            ->with('success', 'Anotacion created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($IDAnotacion): View
    {
        $anotacion = Anotacion::find($IDAnotacion);

        return view('anotacion.show', compact('anotacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IDAnotacion): View
    {
        $anotacion = Anotacion::find($IDAnotacion);

        return view('anotacion.edit', compact('anotacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnotacionRequest $request, Anotacion $anotacion): RedirectResponse
    {
        $anotacion->update($request->validated());

        return Redirect::route('anotacions.index')
            ->with('success', 'Anotacion updated successfully');
    }

    public function destroy($IDAnotacion): RedirectResponse
    {
        Anotacion::find($IDAnotacion)->delete();

        return Redirect::route('anotacions.index')
            ->with('success', 'Anotacion deleted successfully');
    }
}
