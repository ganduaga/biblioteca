<?php

use App\Http\Controllers\AutoresController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LibroUsuarioController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth','verified'])
    ->name('dashboard');

Route::resource('/autor',AutoresController::class)
    ->middleware(['auth','verified']);

Route::post('/autor/buscar', [AutoresController::class, "buscar"])
    ->middleware(['auth','verified'])
    ->name('autor.buscar');

Route::resource('/usuario',UsuarioController::class)
    ->middleware(['auth','verified']);

Route::post('/usuario/buscar', [UsuarioController::class, "buscar"])
    ->middleware(['auth','verified'])
    ->name('usuario.buscar');

Route::resource('/libro',LibroController::class)
    ->middleware(['auth','verified']);

Route::post('/libro/buscar', [LibroController::class, "buscar"])
    ->middleware(['auth','verified'])
    ->name('libro.buscar');

Route::post('/librousuario/prestar/{libro}', [LibroUsuarioController::class, "prestar"])
    ->middleware(['auth','verified'])
    ->name('librousuario.prestamo');

Route::get('/librousuario/devolver/{librousuario}', [LibroUsuarioController::class, "devolver"])
    ->middleware(['auth','verified'])
    ->name('librousuario.devolucion');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
