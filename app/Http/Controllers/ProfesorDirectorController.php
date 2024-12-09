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
     * Muestra una lista de los recursos.
     */
    public function index(Request $request): View
    {
        // Obtén el valor del filtro
        $runProfesor = $request->input('RunProfesor');

        // Base de la consulta
        $query = ProfesorDirector::query();

        // Aplica el filtro si se proporciona un RunProfesor
        if ($runProfesor) {
            $query->where('RunProfesor', 'like', '%' . $runProfesor . '%');
        }

        // Paginación
        $profesorDirectors = $query->paginate(10);

        return view('profesor-director.index', compact('profesorDirectors'))
            ->with('i', ($request->input('page', 1) - 1) * $profesorDirectors->perPage());
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create(): View
    {
        $profesorDirector = new ProfesorDirector();

        return view('profesor-director.create', compact('profesorDirector'));
    }

    /**
     * Almacena un recurso recién creado en la base de datos.
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

        return redirect()->route('profesor-directors.index')->with('success', 'Profesor creado y rol asignado correctamente.');
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show($RunProfesor): View
    {
        $profesorDirector = ProfesorDirector::findOrFail($RunProfesor);

        return view('profesor-director.show', compact('profesorDirector'));
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     */
    public function edit($RunProfesor): View
    {
        $profesorDirector = ProfesorDirector::find($RunProfesor);

        return view('profesor-director.edit', compact('profesorDirector'));
    }

    /**
     * Actualiza el recurso especificado en la base de datos.
     */
    public function update(ProfesorDirectorRequest $request, ProfesorDirector $profesorDirector): RedirectResponse
    {
        $profesorDirector->update($request->validated());

        return Redirect::route('profesor-directors.index')
            ->with('success', 'Profesor actualizado correctamente.');
    }

    /**
     * Elimina el recurso especificado de la base de datos.
     */
    public function destroy($RunProfesor): RedirectResponse
    {
        try {
            $profesorDirector = ProfesorDirector::findOrFail($RunProfesor);

            // Verificar si tiene relaciones antes de eliminar
            if ($profesorDirector->reunions()->exists()) {
                return Redirect::route('profesor-directors.index')
                    ->with('error', 'No se puede eliminar el profesor porque tiene reuniones relacionadas.');
            }

            $profesorDirector->delete();

            return Redirect::route('profesor-directors.index')
                ->with('success', 'Profesor eliminado correctamente.');
        } catch (\Exception $e) {
            return Redirect::route('profesor-directors.index')
                ->with('error', 'Ocurrió un error al intentar eliminar el profesor: ' . $e->getMessage());
        }
    }
}
