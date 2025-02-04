<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\CampeonatoController;

Route::apiResource('times', TimeController::class);
Route::post('/campeonatos/simular', [CampeonatoController::class, 'simular']);
Route::get('/campeonatos', [CampeonatoController::class, 'index']);
Route::get('/campeonatos/{id}', [CampeonatoController::class, 'show']);
