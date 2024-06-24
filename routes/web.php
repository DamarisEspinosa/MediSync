<?php

// Controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\SecretariasController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

// POST para los formularios 
Route::post('/registrar-pacientes', [PacienteController::class, 'registerPatient'])->name('registrar-pacientes');
Route::post('/registrar-admin', [AdminController::class, 'registrarAdmin'])->name('registrar-admin');
Route::post('/do-login', [AdminController::class, 'doLogin'])->name('do-login');
Route::post('/registrar-medico', [MedicoController::class, 'registrarMedico'])->name('registrar-medico');
Route::post('/registrar-secretaria', [SecretariasController::class,'registrarSecretaria'])->name('registrar-secretaria');
Route::get('/do-logout',[AdminController::class,'logout'])->name('do-logout');

// Vistas para navegación entre ventanas 
Route::get('/registrarAdmin', function () {
    return view('registrarAdmin');
})->name('registrarAdmin');

Route::get('/administrador', function(){
    return view('administrador');
})->name('administrador');

Route::get('/registroMedicos', function () {
    return view('registroMedicos');
})->name('registroMedicos');

Route::get('/registroSecretarias', function(){
    return view('registroSecretarias');
})->name('registroSecretarias');



///////////
Route::get('/recepcionista', function () {
    return view('recepcionista');
})->name('recepcionista');

Route::get('/doctor', function () {
    return view('doctor');
})->name('doctor');

Route::get('/citas', function () {
    return view('citas');
});

Route::get('/servicios', function () {
    return view('servicios');
});

Route::get('/pago', function () {
    return view('pago');
});

Route::get('/detallesCita', function () {
    return view('detallesCita');
});

Route::get('/detallesPacientes', function () {
    return view('detallesPacientes');
});

Route::get('/expediente', function () {
    return view('expediente');
});

Route::get('/registroPacientes', function () {
    return view('registroPacientes');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//require __DIR__.'/auth.php';

