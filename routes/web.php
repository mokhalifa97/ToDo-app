<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile',[ProfileController::class,'index'])->name('profile');
    Route::get('/profile/delete/{id}',[ProfileController::class,'delete'])->name('delete');
    Route::get('/profile/edit/{id}',[ProfileController::class,'edit'])->name('edit');
    Route::post('/profile/save',[ProfileController::class,'add'])->name('profile.add');
    Route::post('/edit/save/{id}',[ProfileController::class,'save'])->name('save.edit');
});