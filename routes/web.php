<?php

use App\Http\Controllers\{EixoComumController,EixoController};
use Illuminate\Support\Facades\Route;

Route::get('/eixo-comum', [EixoComumController::class, 'index'])->name('home');

Route::get('/eixos', [EixoController::class, 'index'])->name('eixos');
Route::get('/eixos/criar', [EixoController::class, 'create'])->name('form-criar-eixo');
Route::post('/eixos/criar', [EixoController::class, 'store']);
Route::get('/eixos/{id}', [EixoController::class, 'verEixo']);
Route::patch('/eixos/{id}', [EixoController::class, 'update']);
