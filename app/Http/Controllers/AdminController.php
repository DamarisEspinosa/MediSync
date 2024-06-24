<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
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
        
        return redirect(route('login'))->with('success', 'Registro exitoso. Por favor, inicia sesión.');
    }

    public function doLogin(Request $request){
        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            // Buscamos al usuario por correo 
            $usuario = User::where('email', $request->email)->firstOrFail();
            if($usuario->tipoUsuario === 'Admin') {
                return redirect(route('administrador'));
            }
        } else { 
            return redirect(route('login'));
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken(); 

        return redirect(route('login'));
    } 
}
