<?php

namespace App\Http\Controllers;

use App\Models\Malla;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MallaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MallaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $mallas = Malla::paginate();

        return view('malla.index', compact('mallas'))
            ->with('i', ($request->input('page', 1) - 1) * $mallas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $malla = new Malla();

        return view('malla.create', compact('malla'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MallaRequest $request): RedirectResponse
    {
        Malla::create($request->validated());

        return Redirect::route('mallas.index')
            ->with('success', 'Malla created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $malla = Malla::find($id);

        return view('malla.show', compact('malla'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $malla = Malla::find($id);

        return view('malla.edit', compact('malla'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MallaRequest $request, Malla $malla): RedirectResponse
    {
        $malla->update($request->validated());

        return Redirect::route('mallas.index')
            ->with('success', 'Malla updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Malla::find($id)->delete();

        return Redirect::route('mallas.index')
            ->with('success', 'Malla deleted successfully');
    }
}
