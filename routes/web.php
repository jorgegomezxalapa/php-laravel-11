<?php

use App\Http\Controllers\IncidenteController;
use App\Http\Controllers\ObraController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("obras.index");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('obras')->group(function () {
    Route::get('/', [ObraController::class, 'index'])->name('obras.index');
    Route::get('/create/{id?}', [ObraController::class, 'create'])->name('obras.create');
    Route::post('/store', [ObraController::class, 'store'])->name('obras.store');
    Route::get('/show/{id}', [ObraController::class, 'show'])->name('obras.show');
    Route::post('/delete', [ObraController::class, 'delete'])->name('obras.delete');
    Route::get('/pdf/{id}', [ObraController::class, 'pdf'])->name('obras.pdf');
});

Route::prefix('incidentes')->group(function () {
    Route::get('/', [IncidenteController::class, 'index'])->name('incidentes.index');
    Route::get('/create/{id?}', [IncidenteController::class, 'create'])->name('incidentes.create');
    Route::post('/store', [IncidenteController::class, 'store'])->name('incidentes.store');
    Route::post('/delete', [IncidenteController::class, 'delete'])->name('incidentes.delete');
});

