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
use App\Http\Controllers\RolController;


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


Route::middleware('auth')->group(function () {
    Route::resource('roles', RolController::class)->names('rol');
    Route::resource('cita', CitaController::class)->names('cita');
    Route::resource('horario', HorarioController::class)->names('horario');
    Route::resource('pago', PagoController::class)->names('pago');
    Route::resource('servicio', ServicioController::class)->names('servicio');
    Route::resource('cliente', ClienteController::class)->names('cliente');
    Route::resource('empleado', EmpleadoController::class)->names('empleado');
});

//Route::middleware('auth')->group( function (){
//    Route::resource('david-horarios', HorarioController::class)->names('horarios');
//    Route::resource('cita', CitaController::class);
//});
