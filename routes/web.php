<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("obras.index");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/obras', [App\Http\Controllers\ObraController::class, 'index'])->name('obras.index');
Route::get('/obras/create/{id?}', [App\Http\Controllers\ObraController::class, 'create'])->name('obras.create');
Route::post('/obras/store', [App\Http\Controllers\ObraController::class, 'store'])->name('obras.store');
Route::get('/obras/show/{id}', [App\Http\Controllers\ObraController::class, 'show'])->name('obras.show');
Route::post('/obras/delete', [App\Http\Controllers\ObraController::class, 'delete'])->name('obras.delete');

