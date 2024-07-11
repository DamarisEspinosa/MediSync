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
        $user->fechaNacimiento = $request->fechaNacimiento;
        $user->telefono = $request->telefono;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->tipoUsuario = "admin";
        $user->especialidad = null;
        $user->area = null;

        $user->save();
        
        return redirect(route('administrador'));
    }

    public function registrarEmpleado(Request $request) {
        // nombre, fechaNacimiento, telefono, email, password, tipoUsuario, especialidad, area 
        /*$request->validate([
            'nombre' => 'required|string|max:255',
            'fechaNacimiento' => 'required|date',
            'telefono' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'tipoUsuario' => 'required|string|in:doctor,secretaria,enfermera',
            'especialidad' => 'required_if:tipoUsuario,doctor|string|max:255',
            'area' => 'required_if:tipoUsuario,secretaria,enfermera|string|max:255',
        ]);*/

        $user = new User();

        $user->nombre = $request->nombre;
        $user->fechaNacimiento = $request->fechaNacimiento;
        $user->telefono = $request->telefono;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->tipoUsuario = $request->tipoUsuario;

        if ($request->tipoUsuario == 'doctor') {
            $user->especialidad = $request->especialidad;
            $user->area = null;
        } else if ($request->tipoUsuario == 'secretaria' || $request->tipoUsuario == 'enfermera') {
            $user->area = $request->area;
            $user->especialidad = null;
        }

        $user->save();
        
        return redirect(route('administrador'));
    }

    public function doLogin(Request $request) {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        // Intentar autenticarse como Admin
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Buscamos al usuario por correo 
            $usuario = User::where('email', $request->email)->firstOrFail();
            if($usuario->tipoUsuario === 'admin') {
                return redirect(route('administrador'));
            } else if($usuario->tipoUsuario === 'doctor'){
                return redirect(route('doctor'));
            } else if($usuario->tipoUsuario === 'secretaria') {
                return redirect(route('secretaria'));
            }
        } 
        // Si llega aquí, las credenciales no son válidas
        return redirect(route('login'));

        /*return redirect(route('login'))->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);*/
    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken(); 

        return redirect(route('login'));
    } 
}
