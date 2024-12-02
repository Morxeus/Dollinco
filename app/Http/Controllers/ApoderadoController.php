<?php

namespace App\Http\Controllers;

use App\Models\Apoderado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ApoderadoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApoderadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $apoderados = Apoderado::paginate();

        return view('apoderado.index', compact('apoderados'))
            ->with('i', ($request->input('page', 1) - 1) * $apoderados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $apoderado = new Apoderado();

        return view('apoderado.create', compact('apoderado'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'RunApoderado' => 'required|string|unique:apoderados,RunApoderado|max:12',
            'Nombres' => 'required|string|max:50',
            'Apellidos' => 'required|string|max:50',
            'Correo' => 'required|email|unique:apoderados,Correo|max:100',
            'Telefono' => 'nullable|integer',
            'Genero' => 'nullable|string|max:50',
            'Direccion' => 'nullable|string|max:100',
        ]);
    
        // Crear apoderado
        $apoderado = Apoderado::create($validated);
    
        // Crear usuario asociado
        $user = User::create([
            'name' => $apoderado->Nombres . ' ' . $apoderado->Apellidos,
            'email' => $apoderado->Correo,
            'password' => Hash::make('password123'), // Contraseña predeterminada
        ]);
    
        // Relacionar el usuario con el apoderado
        $apoderado->user_id = $user->id;
        $apoderado->save();
    
        // Asignar automáticamente el rol de 'apoderado'
        $user->assignRole('apoderado');
    
        return redirect()->route('apoderados.index')->with('success', 'Apoderado creado y rol asignado automáticamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($RunApoderado): View
    {
        $apoderado = Apoderado::find($RunApoderado);

        return view('apoderado.show', compact('apoderado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($RunApoderado): View
    {
        $apoderado = Apoderado::find($RunApoderado);

        return view('apoderado.edit', compact('apoderado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApoderadoRequest $request, Apoderado $apoderado): RedirectResponse
    {
        $apoderado->update($request->validated());

        return Redirect::route('apoderados.index')
            ->with('success', 'Apoderado actualizado exitosamente');
    }

    public function destroy($RunApoderado): RedirectResponse
    {
        Apoderado::find($RunApoderado)->delete();

        return Redirect::route('apoderados.index')
            ->with('success', 'Apoderado eliminado exitosamente');
    }
    public function getApoderadosByCurso($cursoId)
    {
        // Obtiene los apoderados relacionados con el curso seleccionado
        $apoderados = Apoderado::whereHas('alumnos', function ($query) use ($cursoId) {
            $query->where('ID_Curso', $cursoId);
        })->get(['RunApoderado', 'Nombres', 'Apellidos']);
    
        return response()->json($apoderados);
    }
    
    

}
