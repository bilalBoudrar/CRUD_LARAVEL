<?php

use App\Http\Controllers\EleveController;
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

Route::get('/home', [EleveController::class, 'index'])->name('index');

Route::get('/detaile/{eleve}', [EleveController::class, 'show'])->name('show');

Route::get('/Form/create', [EleveController::class, 'create'])->name('create'); 

Route::delete('/delete/{id}', [EleveController::class, 'destroy'])->name('destroy');

Route::post('/Form/store', [EleveController::class, 'store'])->name('store');

Route::get('/Form/edit/{id}', [EleveController::class, 'edit'])->name('edit');

Route::put('/Form/update/{id}', [EleveController::class, 'update'])->name('update');

Route::get('/search', [EleveController::class, 'search'])->name('search');

Route::get('/login', [EleveController::class, 'login'])->name('login');

Route::get('/logout', [EleveController::class, 'logout'])->name('logout');

Route::post('/login', [EleveController::class, 'loginVerifier'])->name('loginVerifier');

// Route::resource('eleves', EleveController::class);

