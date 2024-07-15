<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios;

class ServiciosController extends Controller
{
    public function registrarServicio (Request $request) {
        $servicio = new Servicios();

        $servicio->nombreServicio = $request->nombreServicio;
        $servicio->precio = $request->precio;

        $servicio->save();

        return redirect(route('servicios'));
    }
}
