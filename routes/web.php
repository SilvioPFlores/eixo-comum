<?php

use App\Http\Controllers\EixoComumController;
use App\Http\Controllers\Opcoes\{EixoController,TurnoController,CursoController, TermoController, UcController};
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

Route::get('/cursos', [CursoController::class, 'index'])->name('cursos');
Route::get('/cursos/criar', [CursoController::class, 'create'])->name('form-criar-curso');
Route::post('/cursos/criar', [CursoController::class, 'store']);
Route::get('/cursos/{id}', [CursoController::class, 'verCurso']);
Route::patch('/cursos/{id}', [CursoController::class, 'update']);
Route::post('/cursos/buscarCursos', [CursoController::class, 'buscarCursos']);

Route::get('/ucs', [UcController::class, 'index'])->name('ucs');
Route::get('/ucs/criar', [UcController::class, 'create'])->name('form-criar-uc');
Route::post('/ucs/burcarTermo', [UcController::class, 'burcarTermo']);
