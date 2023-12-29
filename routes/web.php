<?php

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


Route::get('/', \App\Http\Controllers\IndexController::class)->name('index');

Route::controller(\App\Http\Controllers\Auth\AuthController::class)->middleware('guest')->group(function (){
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'register_process')->name('register_process');
    Route::post('/login', 'login_process')->name('login_process');
});

Route::middleware('auth')->group(function () {

    Route::controller(\App\Http\Controllers\Auth\AuthController::class)->group(function (){
        Route::get('/logout', 'logout')->name('logout');
    });


    Route::controller(\App\Http\Controllers\Main\MainController::class)->group(function (){
        Route::get('/main', 'index')->name('main');
        Route::post('/main', 'addYear')->name('addYear');
        Route::delete('/main/{year}', 'deleteYear')->name('deleteYear');
    });

    Route::controller(\App\Http\Controllers\Year\YearController::class)->group(function (){
       Route::get('/year/{year}', 'index')->name('year');
       Route::post('/year/{year}', 'addMonth')->name('addMonth');
       Route::delete('/year/{year}/{month}', 'deleteMonth')->name('deleteMonth');
    });

    Route::controller(\App\Http\Controllers\Month\MonthController::class)->group(function (){
       Route::get('/month/{month}', 'index')->name('month');
    });


});
