<?php

use App\Http\Controllers\EstadosCidadesController;
use App\Http\Controllers\IdeologiasController;
use App\Http\Controllers\PerguntasController;
use App\Http\Controllers\RespostasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/perguntas", [PerguntasController::class, 'get']);
Route::get("/perguntas/quantidade", [PerguntasController::class, 'quantidade']);
Route::get("/ideologias", [IdeologiasController::class, 'get']);
Route::get("/estados", [EstadosCidadesController::class, 'estados']);
Route::get("/estado/{estadoId}/cidades", [EstadosCidadesController::class, 'cidades']);
Route::post("/resposta/save/{perguntaId}", [RespostasController::class, 'save']);

