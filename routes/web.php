<?php

// Controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\SecretariasController;
use App\Http\Controllers\CitasController;

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

Route::get('/do-logout',[AdminController::class,'logout'])->name('do-logout');


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
    return view('doctor');
})->name('doctor');

Route::get('/registrarPacientes', function () {
    return view('registrarPacientes');
})->name('registrarPacientes');

Route::get('/registrarCita', function () {
    return view('registrarCita');
})->name('registrarCita');

Route::get('/agenda', function () {
    return view('agenda');
})->name('agenda');

Route::get('/productos', function () {
    return view('productos');
})->name('productos');

Route::get('/registrarProductos', function () {
    return view('registrarProductos');
})->name('registrarProductos');

Route::get('/servicios', function () {
    return view('servicios');
})->name('servicios');

Route::get('/registrarServicio', function () {
    return view('registrarServicio');
})->name('registrarServicio');

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

