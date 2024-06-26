<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Medico;
use App\Models\Secretarias;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function registrarAdmin(Request $request) {
        // Validar los datos
        /*$request->validate([
            'correo' => 'required|string|email|max:100|unique:users'
        ]);*/
        
        $user = new User();

        $user->nombre = $request->nombre;
        $user->password = $request->password;
        $user->telefono = $request->telefono;
        $user->email = $request->email;
        $user->tipoUsuario = "Admin";

        $user->save();
        
        return redirect(route('administrador'))->with('success', 'Registro exitoso.');
    }

    public function doLogin(Request $request) {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        // Intentar autenticarse como Admin
        $admin = User::where('email', $request->email)->firstOrFail();
        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::login($admin);
            $request->session()->regenerate();
            return redirect(route('administrador'));
        }

        // Si llega aquí, las credenciales no son válidas
        return redirect(route('login'))->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken(); 

        return redirect(route('login'));
    } 
}
