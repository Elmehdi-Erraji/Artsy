<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and assigned to the "web"
| middleware group. Now create something great!
|
*/

// Protected routes requiring authentication
Route::middleware('auth')->group(function () {
    Route::resource('profile', \App\Http\Controllers\ProfileController::class);
});

// Artist routes
Route::group(['middleware' => 'artist'], function () {
    Route::resource('artist', \App\Http\Controllers\Artist\projectController::class);
    Route::get('partnerDetails/{id}', [\App\Http\Controllers\Artist\PartnerCOntroller::class, 'show'])->name('partnerDetails.show');
    Route::get('approval-status/{user}/{project}', [\App\Http\Controllers\Artist\ProjectController::class, 'show'])->name('projectDetails.show');
    Route::post('approval-status', [\App\Http\Controllers\Artist\ProjectController::class, 'approvalStatus'])->name('approval.status');

});


Route::post('myRequest', [\App\Http\Controllers\Artist\ProjectController::class, 'requestStatus'])->name('myRequest');

// Admin Routes
Route::group(['middleware' => 'admin'], function () {
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);
    Route::resource('partners', \App\Http\Controllers\Admin\PartnerController::class);
    Route::resource('requests', \App\Http\Controllers\Admin\ProjectUserController::class);
    Route::post('/requests/{id}/assign', [\App\Http\Controllers\Admin\ProjectUserController::class, 'store']);
    Route::get('/dashboard', function () { return view('dashboard'); });
    Route::post('/update-request-status/{user}/{project}', [\App\Http\Controllers\Admin\ProjectUserController::class, 'updateRequestStatus'])->name('update.request.status');
});

// Authentication routes
require __DIR__.'/auth.php';

// Default route
Route::get('/home', function () {
    return view('welcome');
});

// Home route
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
