<?php

use App\Http\Controllers\IncidenteController;
use App\Http\Controllers\ObraController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("obras.index");
});

Auth::routes();

Route::get('/home', function () {
    return redirect()->route('obras.index');
})->name('home');

Route::prefix('usuarios')->group(function () {
    Route::get('/', [UserController::class, 'index'])->middleware('auth')->name('usuarios.index');
    Route::get('/create/{id?}', [UserController::class, 'create'])->middleware('auth')->name('usuarios.create');
    Route::post('/store', [UserController::class, 'store'])->middleware('auth')->name('usuarios.store');
    Route::post('/delete', [UserController::class, 'delete'])->middleware('auth')->name('usuarios.delete');
    Route::get('/password/reset', [UserController::class, 'showResetForm'])->name('usuarios.password.reset');
});


Route::prefix('obras')->group(function () {
    Route::get('/', [ObraController::class, 'index'])->name('obras.index');
    Route::get('/create/{id?}', [ObraController::class, 'create'])->middleware('auth')->name('obras.create');
    Route::post('/store', [ObraController::class, 'store'])->middleware('auth')->name('obras.store');
    Route::get('/show/{id}', [ObraController::class, 'show'])->name('obras.show');
    Route::post('/delete', [ObraController::class, 'delete'])->middleware('auth')->name('obras.delete');
    Route::get('/pdf/{id}', [ObraController::class, 'pdf'])->middleware('auth')->name('obras.pdf');
});

Route::prefix('incidentes')->group(function () {
    Route::get('/', [IncidenteController::class, 'index'])->name('incidentes.index');
    Route::get('/create/{id?}', [IncidenteController::class, 'create'])->middleware('auth')->name('incidentes.create');
    Route::post('/store', [IncidenteController::class, 'store'])->middleware('auth')->name('incidentes.store');
    Route::post('/delete', [IncidenteController::class, 'delete'])->middleware('auth')->name('incidentes.delete');
});


