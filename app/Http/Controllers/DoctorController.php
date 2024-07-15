<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class MedicoController extends Controller
{
    public function showPacientes() {
        $pacientes = Paciente::all(); 
        return view('doctor', compact('pacientes')); 
    }
}
