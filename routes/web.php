<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\FonctionController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\BulletinPaieController;

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
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/utilisateurs',[UserController::class,'index'])->name('drh.liste');
    Route::get('/utilisateurs/ajout',[UserController::class,'create'])->name('drh.ajout');
    Route::post('/utilisateurs/ajout',[UserController::class,'store'])->name('drh.store');
    Route::get('/utilisateurs/{id}',[UserController::class,'show'])->name('drh.edit');
    Route::put('/utilisateurs/{id}',[UserController::class,'update'])->name('drh.update');
    Route::delete('/utilisateurs/{id}',[UserController::class,'destroy'])->name('drh.delete');
});

// Route pour le RH
Route::middleware(['auth', 'user-access:rh'])->group(function () {
    Route::get('/rh',[HomeController::class,'rhHome'])->name('rh.home');
});

// Route pour le DG
Route::middleware(['auth', 'user-access:dg'])->group(function () {
    Route::get('/dg',[HomeController::class,'dgHome'])->name('dg.home');
});
// Route pour le DAF
Route::middleware(['auth', 'user-access:daf'])->group(function () {
    Route::get('/daf',[HomeController::class,'dafHome'])->name('daf.home');
});

Route::middleware('auth')->prefix('departement')->controller(DepartementController::class)->group(function(){
    Route::get('/liste','index')->name('departement.index');
    Route::get('/ajout','create')->name('departement.ajout');
    Route::post('/ajout','store')->name('departement.store');
    Route::get('/{id}','show')->name('departement.edit');
    Route::put('/{id}','update')->name('departement.update');
    Route::delete('/{id}','destroy')->name('departement.delete');
    Route::post('/fonction','getFonction');
});
Route::middleware('auth')->prefix('fonction')->controller(FonctionController::class)->group(function(){
    Route::get('/liste','index')->name('fonction.index');
    Route::get('/ajout','create')->name('fonction.ajout');
    Route::post('/ajout','store')->name('fonction.store');
    Route::get('/{fonction}','show')->name('fonction.edit');
    Route::put('/{fonction}','update')->name('fonction.update');
    Route::delete('/{fonction}','destroy')->name('fonction.delete');
});
Route::middleware('auth')->prefix('employer')->controller(EmployeController::class)->group(function(){
    Route::get('/liste','index')->name('employer.index');
    Route::get('/ajout','create')->name('employer.ajout');
    Route::post('/ajout','store')->name('employer.store');
    Route::get('/{id}','show')->name('employer.edit');
    Route::put('/{employer}','update')->name('employer.update');
    Route::delete('/{id}','destroy')->name('employer.delete');
    Route::get('/{id}/bulletin_de_paie','getBulletins')->name('employer.bulletin');
});
Route::middleware('auth')->prefix('bulletin')->controller(BulletinPaieController::class)->group(function(){
    // Route::get('/{employer}','index')->name('bulletin.index');
    Route::get('/ajout/{id}','create')->name('bulletin.ajout');
    Route::post('/ajout/{id}','store')->name('bulletin.store');
    Route::get('/download/{id}','download')->name('bulletin.download');
    // Route::get('/{id}','show')->name('employer.edit');
    // Route::put('/{employer}','update')->name('employer.update');
    // Route::delete('/{id}','destroy')->name('employer.delete');
});
// Route::get('/home', [HomeController::class, 'index'])->name('home');
