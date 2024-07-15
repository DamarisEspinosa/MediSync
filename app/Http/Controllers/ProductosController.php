<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Productos;

class ProductosController extends Controller
{
    public function registrarProducto (Request $request) {
        $producto = new Productos();

        $producto->nombreProducto = $request->nombreProducto;
        $producto->cantidad = $request->cantidad;
        $producto->precio = $request->precio;

        $producto->save();

        return redirect(route('productos'));
    }

    public function index () {
        $productos = Productos::all(); 
        return view('productos', compact('productos')); 
    }
}
