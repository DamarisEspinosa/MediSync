<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Secretarias;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SecretariasController extends Controller
{
    public function registrarSecretaria(Request $request) {
        // Validar datos 

        $secretaria = new Secretarias();

        $secretaria->nombre = $request->nombre;
        $secretaria->fechaNacimiento = $request->fechaNacimiento;
        $secretaria->telefono = $request->telefono;
        $secretaria->email = $request->email;
        $secretaria->password = $request->password;
        $secretaria->area = $request->area;
        $secretaria->id_admin = "1"; // tengo que cambiarlo 
        $secretaria->tipoUsuario = "Secretaria";

        $secretaria->save();

        //return $secretaria;
        return redirect(route('administrador'))->with('success', 'Registro exitoso. Por favor, inicia sesión.');
    }
}
