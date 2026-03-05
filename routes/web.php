<?php

use Illuminate\Support\Facades\Route;

//calls the file location
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActivityController;

//calls the index function in HomeController
Route::get('/', [HomeController::class, 'index']);

//route to return the page of every activity
Route::get('/museum/{id}', [ActivityController::class, 'activity'])->name('museum.activity');

//to return the virtual tour page
Route::get('/virtual-tour', function () {
    return view('virtual-tour');
});