<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Citas;
use Illuminate\Support\Facades\Hash;

class CitasController extends Controller{
    public function registrarCita(Request $request){
        $cita = new Citas();

        $cita->motivos = $request->motivos;
        $cita->fechaHora = $request->fechaHora;

        $cita->save();

        return redirect(route('recepcionista'));
    }
}