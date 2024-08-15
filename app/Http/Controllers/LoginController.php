<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
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
        $credentials = $request->only('correo', 'password');

        if (Auth::attempt(['correo' => $credentials['correo'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            $usuario = User::where('correo', $request->correo)->first();
            if($usuario->tipoUsuario === 'admin') {
                return redirect(route('verUsuarios'));
            } elseif ($usuario->tipoUsuario === 'recepcionista') {
                return redirect(route('recepcionista.index'));
            } elseif ($usuario->tipoUsuario === 'doctor') {
                return redirect(route('doctor.index'));
            } else {
                return back()->withErrors([
                    'correo' => 'No se pudo determinar el tipo de usuario.',
                ])->withInput();
            }
        }

        $paciente = Paciente::where('correo', $credentials['correo'])->first();
        if ($paciente && Hash::check($credentials['password'], $paciente->password)) {
            $request->session()->regenerate();
            return redirect(route('paciente.perfil')); 
        }

         $doctor = Doctor::where('correo', $credentials['correo'])->first();
         if ($doctor && Hash::check($credentials['password'], $doctor->password)) {
                $request->session()->regenerate();
                return redirect(route('inicioDocColab')); 
         }
 
        return back()->withErrors([
            'correo' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
