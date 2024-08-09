<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paciente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();

        $user->nombre = $request->nombre;
        $user->apellidos = $request->apellidos;
        $user->password = Hash::make($request->password);
        $user->correo = $request->correo;
        $user->telefono = $request->telefono;
        $user->area = $request->area;
        $user->tipoUsuario = $request->tipoUsuario;

        $user->save();

        return redirect(route('verUsuarios'))->with('success', 'Registro exitoso. Por favor, inicia sesión.');
    }

    public function doLogin(Request $request)
    {
        $credentials = [
            "correo" => $request->correo,
            "password" => $request->password
        ];

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Buscamos al usuario por correo 
            $usuario = User::where('correo', $request->correo)->firstOrFail();
            if($usuario->tipoUsuario === 'admin') {
                return redirect(route('administrador'));
            } else if($usuario->tipoUsuario === 'doctor'){
                return redirect(route('doctor.index'));
            } else if($usuario->tipoUsuario === 'secretaria') {
                return redirect(route('recepcionista.index'));
            }
        } 

        // si llega hasta aquí entonces la autenticación falló 
        return redirect(route('login'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
