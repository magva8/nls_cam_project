<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CameraController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTypeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('cameras')->group(function () {
    Route::get('/', [CameraController::class, 'index']); // Список всех камер
    Route::post('/', [CameraController::class, 'store']); // Создание камеры
    Route::get('{camera}', [CameraController::class, 'show']); // Просмотр камеры по ID
    Route::put('{camera}', [CameraController::class, 'update']); // Обновление камеры по ID
    Route::delete('{camera}', [CameraController::class, 'destroy']); // Удаление камеры по ID
});

Route::prefix('events')->group(function () {
    Route::get('/', [EventController::class, 'index']); // Список всех событий
    Route::post('/', [EventController::class, 'store']); // Создание события
    Route::get('{event}', [EventController::class, 'show']); // Просмотр события по ID
    Route::put('{event}', [EventController::class, 'update']); // Обновление события по ID
    Route::delete('{event}', [EventController::class, 'destroy']); // Удаление события по ID
});

Route::prefix('event-types')->group(function () {
    Route::get('/', [EventTypeController::class, 'index']); // Список всех типов событий
    Route::post('/', [EventTypeController::class, 'store']); // Создание типа события
    Route::get('{eventType}', [EventTypeController::class, 'show']); // Просмотр типа события по ID
    Route::put('{eventType}', [EventTypeController::class, 'update']); // Обновление типа события по ID
    Route::delete('{eventType}', [EventTypeController::class, 'destroy']); // Удаление типа события по ID
});

