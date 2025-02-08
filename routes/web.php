<?php

use App\Http\Controllers\{EixoComumController,EixoController, TermoController, TurnoController};
use Illuminate\Support\Facades\Route;

Route::get('/eixo-comum', [EixoComumController::class, 'index'])->name('home');

Route::get('/eixos', [EixoController::class, 'index'])->name('eixos');
Route::get('/eixos/criar', [EixoController::class, 'create'])->name('form-criar-eixo');
Route::post('/eixos/criar', [EixoController::class, 'store']);
Route::get('/eixos/{id}', [EixoController::class, 'verEixo']);
Route::patch('/eixos/{id}', [EixoController::class, 'update']);

Route::get('/turnos', [TurnoController::class, 'index'])->name('turnos');
Route::get('/turnos/criar', [TurnoController::class, 'create'])->name('form-criar-turno');
Route::post('/turnos/criar', [TurnoController::class, 'store']);
Route::post('/turnos/{id}', [TurnoController::class, 'mudaStatus']);

Route::get('/termos', [TermoController::class, 'index'])->name('termos');
Route::get('/termos/criar', [TermoController::class, 'create'])->name('form-criar-termo');
Route::post('/termos/criar', [TermoController::class, 'store']);
Route::post('/termos/{id}', [TermoController::class, 'mudaStatus']);
