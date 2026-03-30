<?php

use Illuminate\Support\Facades\Route;

//calls the file location
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;

//calls the index function in HomeController
Route::get('/', [HomeController::class, 'index']);

//route to return the page of every activity
Route::get('/museum/{id}', [ActivityController::class, 'activity'])->name('museum.activity');

//to return the virtual tour page
Route::get('/virtual-tour', function () {
    return view('virtual-tour');
});

Route::get('/virtual-tour', function () {
    return view('virtual-tour');
})->name('virtual-tour');

Route::get('/collections', [CollectionController::class, 'index'])->name('collections');

Route::get('/artifact/{id}', [CollectionController::class, 'show'])->name('artifact.show');

/* ADMIN DASHBOARD */
Route::get('/admin',function(){

if(!session('admin_logged_in')){
return redirect('/login');
}

return app()->call('App\Http\Controllers\AdminController@index');

});


/* ACTIVITIES */
Route::post('/admin/activity/store',[AdminController::class,'storeActivity']);
Route::post('/admin/activity/update/{id}',[AdminController::class,'updateActivity']);
Route::get('/admin/activity/delete/{id}',[AdminController::class,'deleteActivity']);

/* ARTIFACT MANAGEMENT */
Route::get('/admin/artifact/create',[AdminController::class,'createArtifact']);
Route::post('/admin/artifact/store',[AdminController::class,'storeArtifact']);

Route::get('/admin/artifact/edit/{id}',[AdminController::class,'editArtifact']);
Route::post('/admin/artifact/update/{id}',[AdminController::class,'updateArtifact']);

Route::get('/admin/artifact/delete/{id}',[AdminController::class,'deleteArtifact']);


Route::get('/login',[AdminAuthController::class,'showLogin']);

Route::post('/admin-login',[AdminAuthController::class,'login']);

Route::get('/verify-otp',[AdminAuthController::class,'showOtp']);

Route::post('/verify-otp',[AdminAuthController::class,'verifyOtp']);

Route::get('/logout',[AdminAuthController::class,'logout']);

Route::get('/usip', function () {
    return view('museum.gallery.usip');
})->name('usip');

Route::get('/uma', function () {
    return view('museum.gallery.uma');
})->name('uma');