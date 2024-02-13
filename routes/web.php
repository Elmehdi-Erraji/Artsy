<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Artist\projectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::middleware('auth')->group(function () {

    Route::resource('profile',\App\Http\Controllers\ProfileController::class);
});


//Artist routes
Route::group(['middleware' => 'artist'], function () {
    Route::resource('artist', \App\Http\Controllers\Artist\ProjectController::class);
});

//Admin Routes

Route::group(['middleware' => 'admin'], function () {
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);
    Route::resource('partners', \App\Http\Controllers\Admin\PartnerController::class);
    Route::resource('requests', \App\Http\Controllers\Admin\ProjectUserController::class);
    Route::post('/requests/{id}/assign', [\App\Http\Controllers\Admin\ProjectUserController::class, 'store']);
    Route::get('/dashboard', function () {return view('dashboard');});
    Route::post('/update-request-status/{user}/{project}', [\App\Http\Controllers\Admin\ProjectUserController::class, 'updateRequestStatus'])->name('update.request.status');
});

require __DIR__.'/auth.php';



Route::get('/home',function(){
    return view('welcome');
});











Route::get('/test', function () {
    return view('test');
});


