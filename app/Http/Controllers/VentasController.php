<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;

class VentasController extends Controller
{
    public function venderProducto (Request $request) {
        
        $venta = new Ventas();

        $venta->fechaVenta = $request->fechaVenta;
        $venta->producto = $request->producto;
        $venta->cantidadVendida = $request->cantidadVendida;
        $venta->precioUnitario = $request->precioUnitario;
        $venta->total = $request->total;

        $venta->save();

        return redirect(route('ventas'));
    }
}
