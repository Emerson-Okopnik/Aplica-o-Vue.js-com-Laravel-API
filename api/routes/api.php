<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeopleController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:api')->get('/user', [AuthController::class, 'user']);

Route::middleware('jwt.auth')->group(function () {
    Route::get('/Home', [AuthController::class, 'user']);
    Route::get('/people', [PeopleController::class, 'index']);
    Route::post('/people/create', [PeopleController::class, 'store']);
    Route::get('/people/{id}', [PeopleController::class, 'show']);
    Route::put('/people/edit/{id}', [PeopleController::class, 'update']);
    Route::delete('/people/delete/{id}', [PeopleController::class, 'destroy']);
});

