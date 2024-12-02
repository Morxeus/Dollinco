<?php

namespace App\Http\Controllers;

use App\Models\Detalleregistroclase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DetalleregistroclaseRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DetalleregistroclaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $detalleregistroclases = Detalleregistroclase::paginate();

        return view('detalleregistroclase.index', compact('detalleregistroclases'))
            ->with('i', ($request->input('page', 1) - 1) * $detalleregistroclases->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $detalleregistroclase = new Detalleregistroclase();

        return view('detalleregistroclase.create', compact('detalleregistroclase'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DetalleregistroclaseRequest $request): RedirectResponse
    {
        Detalleregistroclase::create($request->validated());

        return Redirect::route('detalleregistroclases.index')
            ->with('success', 'Detalleregistroclase created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $detalleregistroclase = Detalleregistroclase::find($id);

        return view('detalleregistroclase.show', compact('detalleregistroclase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $detalleregistroclase = Detalleregistroclase::find($id);

        return view('detalleregistroclase.edit', compact('detalleregistroclase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DetalleregistroclaseRequest $request, Detalleregistroclase $detalleregistroclase): RedirectResponse
    {
        $detalleregistroclase->update($request->validated());

        return Redirect::route('detalleregistroclases.index')
            ->with('success', 'Detalleregistroclase updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Detalleregistroclase::find($id)->delete();

        return Redirect::route('detalleregistroclases.index')
            ->with('success', 'Detalleregistroclase deleted successfully');
    }
}
