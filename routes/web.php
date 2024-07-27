<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('auth.login');
});

Auth::routes();

// Route pour le DRH
Route::middleware(['auth', 'user-access:drh'])->group(function () {
    Route::get('/home',[HomeController::class,'index'])->name('home');
});

// Route pour le RH
Route::middleware(['auth', 'user-access:rh'])->group(function () {
    Route::get('/rh/home',[HomeController::class,'rhHome'])->name('rh.home');
});

// Route pour le DG
Route::middleware(['auth', 'user-access:dg'])->group(function () {
    Route::get('/dg/home',[HomeController::class,'dgHome'])->name('dg.home');
});

// Route pour le DAF
Route::middleware(['auth', 'user-access:daf'])->group(function () {
    Route::get('/daf/home',[HomeController::class,'dafHome'])->name('daf.home');
});

// Route::get('/home', [HomeController::class, 'index'])->name('home');
