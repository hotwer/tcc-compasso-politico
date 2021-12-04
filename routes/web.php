<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\QuestionarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', IndexController::class);

Route::get('/instrucoes', [QuestionarioController::class, 'instrucoes']);
Route::get('/questionario', [QuestionarioController::class, 'questionario']);
Route::get('/avaliacao', [QuestionarioController::class, 'avaliacao']);
Route::get('/resultados', [QuestionarioController::class, 'resultados']);
