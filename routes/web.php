<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

Route::get('/', function () {
    return view('welcome');
});

Route ::get('/prueba2', function () {
    return view('welcome2');
});

Route::resource('tareas',TareaController::class);
