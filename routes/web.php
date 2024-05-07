<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('karyawans',KaryawanController::class);