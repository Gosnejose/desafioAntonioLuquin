<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    //Producto
    Route::get('/producto', [ProductoController::class, 'index'])->name('producto.index');
    Route::post('/producto', [ProductoController::class, 'store'])->name('producto.store');
    Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('producto.show');
    Route::put('/producto/{producto}', [ProductoController::class, 'update'])->name('producto.update');
    Route::delete('/producto/{producto}', [ProductoController::class, 'destroy'])->name('producto.destroy');

    //Usuario
    Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario.index');
    Route::post('/usuario', [UsuarioController::class, 'store'])->name('usuario.store');
    Route::get('/usuario/{usuario}', [UsuarioController::class, 'show'])->name('usuario.show');
    Route::put('/usuario/{usuario}', [UsuarioController::class, 'update'])->name('usuario.update');
    Route::delete('/usuario/{usuario}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');
});