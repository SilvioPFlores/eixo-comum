<?php

use App\Http\Controllers\EixoComumController;
use Illuminate\Support\Facades\Route;

Route::get('/eixo-comum', [EixoComumController::class, 'index'])->name('home');
