<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Citas;
use Illuminate\Support\Facades\Hash;

class CitasController extends Controller
{
    function registrarCita (Request $request) {
        // validar datos 
        $cita = new Citas();

        $cita->nombre = $request->nombre;
        $cita->motivos = $request->motivos;
        $cita->doctor = $request->doctor;
        $cita->fechaHora = $request->fechaHora;
        $cita->servicio = NULL;

        if (!empty($request->servicio)) {
            $cita->servicio = $request->servicio;
        }

        $cita->save();

        return redirect(route('registrarCita'));
    }
}
