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

    public function infoCitas () {
        // Obtener solo los campos necesarios
        $citas = Citas::all(['nombre', 'motivos', 'fechaHora']);
        // Formatear los datos para que FullCalendar los entienda
        $events = $citas->map(function ($cita) {
            return [
                'title' => $cita->nombre . ' - ' . $cita->motivos,
                'start' => \Carbon\Carbon::parse($cita->fechaHora)->format('Y-m-d\TH:i:s'),
                'description' => $cita->motivos,
                'backgroundColor' => '#28a745', // Color verde para los eventos
                'borderColor' => '#28a745'
            ];
        });
        return response()->json($events);
    }
}
