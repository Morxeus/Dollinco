<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Muestra el formulario para cambiar la contraseña.
     */
    public function showChangePasswordForm()
    {
        return view('auth.passwords.change');
    }

    /**
     * Maneja el cambio de contraseña.
     */
    public function changePassword(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);
    
        // Obtener el usuario autenticado
        $user = Auth::user();
    
        // Verificar que el usuario sea válido
        if (!$user || !$user instanceof \App\Models\User) {
            return back()->withErrors(['user' => 'El usuario actual no es válido.']);
        }
    
        // Verificar que el correo corresponde al usuario autenticado
        if ($user->email !== $request->email) {
            return back()->withErrors(['email' => 'El correo proporcionado no coincide con el usuario actual.']);
        }
    
        // Verificar la contraseña actual
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'La contraseña actual no es correcta.']);
        }
    
        // Cambiar la contraseña
        $user->password = Hash::make($request->new_password);
        $user->save();
    
        // Redireccionar con un mensaje de éxito
        return redirect()->route('password.change.form')->with('success', '¡Contraseña actualizada correctamente!');
    }
    
}
