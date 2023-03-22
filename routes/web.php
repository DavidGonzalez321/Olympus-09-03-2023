<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\CitaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::get('/', function () {
    return view('home');
})->middleware('auth')->name('./.');

Route::get('home2', function () {
    return view('home2');
})->middleware('auth')->name('home2');

Route::get('denegado', function () {
    return view('denegado');
})->middleware('auth')->name('denegado');




Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');


Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');


Route::resource('empleado', EmpleadoController::class)->middleware('auth');

// // Auth::routes(['register'=>true,'reset'=>true]);

Route::get('/home', [EmpleadoController::class, 'index2'])->name('home');


Route::resource('cliente', ClienteController::class)->middleware('auth');

// // Auth::routes(['register'=>true,'reset'=>true]);

Route::get('/home', [ClienteController::class, 'index3'])->name('home');


Route::resource('servicio', ServicioController::class)->middleware('auth');

// // Auth::routes(['register'=>true,'reset'=>true]);

Route::get('/home', [ServicioController::class, 'index4'])->name('home');


Route::resource('pago', PagoController::class)->middleware('auth');

// // Auth::routes(['register'=>true,'reset'=>true]);

Route::get('/home', [PagoController::class, 'index5'])->name('home');


Route::resource('horario', HorarioController::class)->middleware('auth');

// // Auth::routes(['register'=>true,'reset'=>true]);

Route::get('/home', [HorarioController::class, 'index6'])->name('home');


Route::resource('cita', CitaController::class)->middleware('auth');

// // Auth::routes(['register'=>true,'reset'=>true]);

Route::get('/home', [CitaController::class, 'index7'])->name('home');
