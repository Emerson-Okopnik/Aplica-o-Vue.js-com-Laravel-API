<?php

use App\Http\Middleware\Cors;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;




Route::get('/', function () {
    return view('welcome');
});
