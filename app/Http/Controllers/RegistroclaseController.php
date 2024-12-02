<?php

namespace App\Http\Controllers;

use App\Models\Registroclase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RegistroclaseRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RegistroclaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $registroclases = Registroclase::paginate();

        return view('registroclase.index', compact('registroclases'))
            ->with('i', ($request->input('page', 1) - 1) * $registroclases->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $registroclase = new Registroclase();

        return view('registroclase.create', compact('registroclase'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegistroclaseRequest $request): RedirectResponse
    {
        Registroclase::create($request->validated());

        return Redirect::route('registroclases.index')
            ->with('success', 'Registroclase created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $registroclase = Registroclase::find($id);

        return view('registroclase.show', compact('registroclase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $registroclase = Registroclase::find($id);

        return view('registroclase.edit', compact('registroclase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RegistroclaseRequest $request, Registroclase $registroclase): RedirectResponse
    {
        $registroclase->update($request->validated());

        return Redirect::route('registroclases.index')
            ->with('success', 'Registroclase updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Registroclase::find($id)->delete();

        return Redirect::route('registroclases.index')
            ->with('success', 'Registroclase deleted successfully');
    }
}
