<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredienteController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Mover al middleware para que se pueda acceder a la ruta en el modo admin o autenticado
Route::apiResource('/ingredientes', IngredienteController::class);


