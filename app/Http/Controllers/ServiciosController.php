<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServiciosController extends Controller
{
    public function registrarServicio (Request $request) {
        $servicio = new Servicio();

        $servicio->nombreServicio = $request->nombreServicio;
        $servicio->precio = $request->precio;

        $servicio->sabe();

        return redirect(route('registrarServicio'));
    }
}
