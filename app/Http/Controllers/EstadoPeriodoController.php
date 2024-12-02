<?php

namespace App\Http\Controllers;

use App\Models\EstadoPeriodo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EstadoPeriodoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EstadoPeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $estadoPeriodos = EstadoPeriodo::paginate();

        return view('estado-periodo.index', compact('estadoPeriodos'))
            ->with('i', ($request->input('page', 1) - 1) * $estadoPeriodos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $estadoPeriodo = new EstadoPeriodo();

        return view('estado-periodo.create', compact('estadoPeriodo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstadoPeriodoRequest $request): RedirectResponse
    {
        EstadoPeriodo::create($request->validated());

        return Redirect::route('estado-periodos.index')
            ->with('success', 'EstadoPeriodo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $estadoPeriodo = EstadoPeriodo::find($id);

        return view('estado-periodo.show', compact('estadoPeriodo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $estadoPeriodo = EstadoPeriodo::find($id);

        return view('estado-periodo.edit', compact('estadoPeriodo'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(EstadoPeriodoRequest $request, EstadoPeriodo $estadoPeriodo): RedirectResponse
    {
        $estadoPeriodo->update($request->validated());

        return Redirect::route('estado-periodos.index')
            ->with('success', 'EstadoPeriodo updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        EstadoPeriodo::find($id)->delete();

        return Redirect::route('estado-periodos.index')
            ->with('success', 'EstadoPeriodo deleted successfully');
    }
}
