<?php

// Controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SecretariasController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\DoctorController;

// modelos para regresar los datos en las vistas 
use App\Models\Paciente;
use App\Models\Productos;
use App\Models\Servicios;
use App\Models\Medico;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

// POST para los formularios 
Route::post('/registrar-pacientes', [PacienteController::class, 'registrarPaciente'])->name('registrar-pacientes');
Route::post('/registrar-empleado', [AdminController::class, 'registrarEmpleado'])->name('registrar-empleado');
Route::post('/do-login', [AdminController::class, 'doLogin'])->name('do-login');
Route::post('/registrar-admin', [AdminController::class, 'registrarAdmin'])->name('registrar-admin');
Route::post('/registrar-cita', [CitasController::class, 'registrarCita'])->name('registrar-cita');
Route::post('/registrar-producto', [ProductosController::class, 'registrarProducto'])->name('registrar-producto');
Route::post('/registrar-servicio', [ServiciosController::class, 'registrarServicio'])->name('registrar-servicio');

Route::get('/do-logout',[AdminController::class,'logout'])->name('do-logout');
Route::get('/info-citas', [CitasController::class, 'infoCitas'])->name('info-citas');
Route::get('/productos', [ProductosController::class, 'index'])->name('productos');


// Vistas para navegación entre ventanas 
Route::get('/registrarEmpleado', function () {
    return view('registrarEmpleado');
})->name('registrarEmpleado');

Route::get('/administrador', function(){
    return view('administrador');
})->name('administrador');

Route::get('/registrarAdmin', function () {
    return view('registrarAdmin');
})->name('registrarAdmin');

Route::get('/secretaria', function () {
    return view('secretaria');
})->name('secretaria');

Route::get('/doctor', function () {
    $pacientes = Paciente::all(); 
    return view('doctor', compact('pacientes')); 
})->name('doctor');

Route::get('/registrarPacientes', function () {
    return view('registrarPacientes');
})->name('registrarPacientes');

Route::get('/registrarCita', function () {
    $servicios = Servicios::all();
    return view('registrarCita', compact('servicios'));
})->name('registrarCita');

Route::get('/agenda', function () {
    return view('agenda');
})->name('agenda');

Route::get('/productos', function () {
    $productos = Productos::all();
    return view('productos', compact('productos'));
})->name('productos');

Route::get('/registrarProductos', function () {
    return view('registrarProductos');
})->name('registrarProductos');

Route::get('/servicios', function () {
    $servicios = Servicios::all();
    return view('servicios', compact('servicios'));
})->name('servicios');

Route::get('/registrarServicio', function () {
    return view('registrarServicio');
})->name('registrarServicio');

Route::get('/ventas', function() {
    return view('ventas');
})->name('ventas');

Route::get('/venderProducto', function() {
    $productos = Productos::all();
    return view('venderProducto', compact('productos'));
})->name('venderProducto');

///////////




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//require __DIR__.'/auth.php';

