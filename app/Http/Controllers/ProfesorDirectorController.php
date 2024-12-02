<?php

namespace App\Http\Controllers;

use App\Models\ProfesorDirector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProfesorDirectorRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfesorDirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $profesorDirectors = ProfesorDirector::paginate();

        return view('profesor-director.index', compact('profesorDirectors'))
            ->with('i', ($request->input('page', 1) - 1) * $profesorDirectors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $profesorDirector = new ProfesorDirector();

        return view('profesor-director.create', compact('profesorDirector'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validar los datos
    $validated = $request->validate([
        'RunProfesor' => 'required|string|unique:profesor_directors,RunProfesor|max:12',
        'Nombres' => 'required|string|max:100',
        'Apellidos' => 'required|string|max:100',
        'Correo' => 'required|email|unique:profesor_directors,Correo|max:100',
        'telefono' => 'nullable|string|max:15',
    ]);

    // Crear profesor
    $profesor = ProfesorDirector::create($validated);

    // Crear usuario asociado
    $user = User::create([
        'name' => $profesor->Nombres . ' ' . $profesor->Apellidos,
        'email' => $profesor->Correo,
        'password' => Hash::make('password123'), // Contraseña predeterminada
    ]);

    // Relacionar el usuario con el profesor
    $profesor->user_id = $user->id;
    $profesor->save();

    // Asignar el rol de profesor
    $user->assignRole('profesor');

    return redirect()->route('profesor-directors.index')->with('success', 'Profesor creado y rol asignado.');
}

    /**
     * Display the specified resource.
     */
    public function show($RunProfesor): View
    {
        $profesorDirector = ProfesorDirector::findOrFail($RunProfesor);

        return view('profesor-director.show', compact('profesorDirector'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($RunProfesor): View
    {
        $profesorDirector = ProfesorDirector::find($RunProfesor);

        return view('profesor-director.edit', compact('profesorDirector'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfesorDirectorRequest $request, ProfesorDirector $profesorDirector): RedirectResponse
    {
        $profesorDirector->update($request->validated());

        return Redirect::route('profesor-directors.index')
            ->with('success', 'ProfesorDirector updated successfully');
    }

    public function destroy($RunProfesor): RedirectResponse
    {
        $profesorDirector = ProfesorDirector::findOrFail($RunProfesor);
        $profesorDirector->delete();
    
        return Redirect::route('profesor-directors.index')
            ->with('success', 'ProfesorDirector deleted successfully');
    }
    
}
