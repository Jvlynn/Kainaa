<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function (){
    Route::get('/login', [AuthController::class,'index'])->name('login');
    Route::post('/login', [AuthController::class,'login']);
    Route::get('/register', [AuthController::class, 'create'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);
});

Route::middleware('auth')->group(function(){
    Route::get('/home', [DataController::class, 'home'])->name('home');
    Route::get('/user',[AuthController::class,'index']);
    Route::redirect('/logout','/home');
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
    Route::get('/tambah', [DataController::class,'create'])->name('tambah');
    Route::post('/tambah/store', [DataController::class,'store'])->name('tambah.store');
    Route::delete('/delete/{id}', [DataController::class,'destroy']);
    Route::get('/edit/{id}', [DataController::class,'edit'])->name('edit');
    Route::put('/edit/{id}', [DataController::class,'update'])->name('update');
});


Route::fallback(function(){
    return view('error.notfound');
});