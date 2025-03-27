<?php

use App\Http\Controllers\BelajarController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BelajarController::class, 'index']);
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('action-login', [LoginController::class, 'actionLogin']);

Route::get('belajar', [BelajarController::class, 'index']);
Route::get('tambah', [BelajarController::class, 'tambah']);
Route::get('kurang', [BelajarController::class, 'kurang']);
Route::get('bagi', [BelajarController::class, 'bagi']);
Route::get('kali', [BelajarController::class, 'kali']);
Route::get('modulo', [BelajarController::class, 'modulo']);
Route::get('pangkat', [BelajarController::class, 'pangkat']);
Route::get('logaritma-basis-10', [BelajarController::class, 'logaritma10']);
Route::get('logaritma-natural', [BelajarController::class, 'logaritma']);

Route::post('action-tambah', [BelajarController::class, 'actionTambah']);
Route::post('action-kurang', [BelajarController::class, 'actionKurang']);
Route::post('action-kali', [BelajarController::class, 'actionKali']);
Route::post('action-bagi', [BelajarController::class, 'actionBagi']);
Route::post('action-modulo', [BelajarController::class, 'actionModulo']);
Route::post('action-pangkat', [BelajarController::class, 'actionPangkat']);
Route::post('action-logaritma-basis-10', [BelajarController::class, 'actionLog10']);
Route::post('action-logaritma-natural', [BelajarController::class, 'actionLog']);

Route::group(['middleware' =>'auth'], function(){
    Route::resource('dashboard', DashboardController::class);
    Route::resource('categories', CategoriesController::class);
});
Route::resource('users', UserController::class);



// tambah

