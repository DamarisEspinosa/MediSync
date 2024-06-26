<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Paciente;
use Illuminate\Support\Facades\Hash;

class PacienteController extends Controller {
    
    public function registrarPaciente(Request $request){
        $paciente = new Paciente();

        $paciente->nombre = $request->nombre;
        $paciente->email = $request->email;
        $paciente->telefono = $request->telefono;
        $paciente->fechaNacimiento = $request->fechaNacimiento;
        $paciente->altura = $request->altura;
        $paciente->peso = $request->peso;
        $paciente->genero = $request->genero;
        $paciente->alergias = $request->alergias;
        $paciente->id_secretaria = "1";

        $paciente->save();

        return redirect(route('secretaria'));
    }
    
}