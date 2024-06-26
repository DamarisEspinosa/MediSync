<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medico;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MedicoController extends Controller
{
    public function registrarMedico(Request $request) {
        // Validar datos 

        $medico = new Medico();

        $medico->nombre = $request->nombre;
        $medico->fechaNacimiento = $request->fechaNacimiento;
        $medico->telefono = $request->telefono;
        $medico->email = $request->email;
        $medico->password = $request->password;
        $medico->especialidad = $request->especialidad;
        $medico->id_admin = "1";
        $medico->tipoUsuario = "Médico";

        $medico->save();

        //return $medico;
        return redirect(route('administrador'))->with('success', 'Registro exitoso. Por favor, inicia sesión.');
    }
}
