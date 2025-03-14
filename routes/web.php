<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarrosController;

/*Route::get('/', function () {
    return view('home');
})->middleware('auth');*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('carros')->middleware(['auth', 'activo'])->group(function () {
    Route::get('/', [CarrosController::class, 'index'])->name('carros.index');
    Route::get('/crear', [CarrosController::class, 'crear'])->name('carros.crear');
    Route::get('/editar/{id}', [CarrosController::class, 'editar'])->name('carros.editar');
});
