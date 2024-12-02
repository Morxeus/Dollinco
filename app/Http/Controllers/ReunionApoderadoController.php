<?php

namespace App\Http\Controllers;

use App\Models\ReunionApoderado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ReunionApoderadoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ReunionApoderadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $reunionApoderados = ReunionApoderado::paginate();

        return view('reunion-apoderado.index', compact('reunionApoderados'))
            ->with('i', ($request->input('page', 1) - 1) * $reunionApoderados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $reunionApoderado = new ReunionApoderado();

        return view('reunion-apoderado.create', compact('reunionApoderado'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReunionApoderadoRequest $request): RedirectResponse
    {
        ReunionApoderado::create($request->validated());

        return Redirect::route('reunion-apoderados.index')
            ->with('success', 'ReunionApoderado created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $reunionApoderado = ReunionApoderado::find($id);

        return view('reunion-apoderado.show', compact('reunionApoderado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $reunionApoderado = ReunionApoderado::find($id);

        return view('reunion-apoderado.edit', compact('reunionApoderado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReunionApoderadoRequest $request, ReunionApoderado $reunionApoderado): RedirectResponse
    {
        $reunionApoderado->update($request->validated());

        return Redirect::route('reunion-apoderados.index')
            ->with('success', 'ReunionApoderado updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        ReunionApoderado::find($id)->delete();

        return Redirect::route('reunion-apoderados.index')
            ->with('success', 'ReunionApoderado deleted successfully');
    }
}
