<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bioController;
use App\Http\Controllers\regController;
use App\Http\Controllers\logController;
use App\Http\Controllers\profileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Login */
Route::get('/', function () {
    return view('login.login');
})->name('login');

Route::post('/logAuth', [logController::class,'Login']);

/* Logout */
Route::get('/logOut', function(){
    Auth::logout();
    return redirect('/');
});


/* Register */
Route::get('/formulirReg', function () {
    return view('register.rgform');
});
Route::post('/simpanDataReg', [regController::class,'simpanDataReg']);

Route::middleware(['auth'])->group(function(){
    /* Biodata */
    Route::get('/formulir', function () {
        return view('pages.form');
    });
    Route::post('/simpanData', [bioController::class,'simpanData']);
    Route::get('/data', [bioController::class,'index']);
    Route::get('/ubah/{id}', [bioController::class,'ubah']);
    Route::PUT('/ubahdata/{id}', [bioController::class, 'ubahData']);
    Route::delete('/hapus/{id}', [bioController::class, 'hapusData'])->name('hapus');
    Route::get('/search', [bioController::class, 'search']);
    /* Register */
    Route::get('/dataReg', [regController::class,'indexReg']);
    Route::get('/ubahReg/{id}', [regController::class,'ubahReg']);
    Route::PUT('/ubahDataReg/{id}', [regController::class, 'ubahDataReg']);
    Route::delete('/hapusReg/{id}', [regController::class, 'hapusDataReg'])->name('hapusReg');
    Route::get('/searchReg', [regController::class, 'searchReg']);
    /* Profile */
    Route::get('/profile', [profileController::class, 'profile']);
});

