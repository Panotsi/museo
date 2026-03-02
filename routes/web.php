<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActivityController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/virtual-tour', function () {
    return view('virtual-tour');
});

Route::get('/museum/{id}', [ActivityController::class, 'show'])->name('museum.show');