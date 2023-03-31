<?php

use App\Http\Controllers\Chat\IndexController;
use App\Http\Controllers\Chat\MessagesController;
use App\Http\Controllers\Chat\SendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['namespace'=>'App\Http\Controllers\Chat'], function(){
    Route::get('/', IndexController::class);
    Route::get('/messages', MessagesController::class);
    Route::post('/send', SendController::class);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
