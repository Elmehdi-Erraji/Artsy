<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/admin',function(){
    return view('admin.index');
})->middleware(['auth','role:admin'])->name('admin.index');


Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);
Route::resource('partners', \App\Http\Controllers\Admin\PartnerController::class);
require __DIR__.'/auth.php';
















Route::get('/test', function () {
    return view('test');
});
Route::get('/test1', function () {
    return view('test1');
});
Route::get('/test2', function () {
    return view('test2');
});

Route::get('/dash', function () {
    return view('dash');
});
Route::get('/create', function () {
    return view('create');
});

Route::get('/forms', function () {
    return view('forms');
});


