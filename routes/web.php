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
Route::name('eleves.')->prefix('eleves')->group(function(){
    Route::controller(EleveController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create'); 
        Route::get('/{eleve}', 'show')->name('show');  
        Route::post('/', 'store')->name('store');
        Route::get('/{eleve}/edit', 'edit')->name('edit');
        Route::put('/{eleve}', 'update')->name('update');
        Route::delete('/{eleve}', 'destroy')->name('destroy');
    });
});


// Route::resource('eleves', EleveController::class);





Route::get('/search', [EleveController::class, 'search'])->name('search');

Route::get('/login', [EleveController::class, 'login'])->name('login');

Route::get('/logout', [EleveController::class, 'logout'])->name('logout');

Route::post('/loginVerifier', [EleveController::class, 'loginVerifier'])->name('loginVerifier');


