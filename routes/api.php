<?php

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



Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);




    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
        Route::get('/me', [\App\Http\Controllers\Api\AuthController::class, 'user']);
        Route::get('/materi', [\App\Http\Controllers\Api\MateriController::class, 'index']);
        Route::get('/materi/{materi}', [\App\Http\Controllers\Api\MateriController::class, 'show']);
        Route::get('/quiz', [\App\Http\Controllers\Api\QuizController::class, 'index']);
        Route::get('/quiz/{quiz}', [\App\Http\Controllers\Api\QuizController::class, 'show']);
        Route::get('/tugas', [\App\Http\Controllers\Api\TugasController::class, 'index']);
        Route::get('/tugas/{tuga}', [\App\Http\Controllers\Api\TugasController::class, 'show']);

        Route::resource('/post', \App\Http\Controllers\Api\PostController::class); // tambahkan ini
    });

