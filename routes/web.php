<?php

use App\Http\Controllers\Chat\IndexController;
use App\Http\Controllers\Chat\MessagesController;
use App\Http\Controllers\Chat\SendController;
use App\Http\Controllers\OnlineUsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Chat', 'middleware' => ['auth']], function () {
    Route::get('/', IndexController::class);
    Route::get('/messages', MessagesController::class);
    Route::post('/send', SendController::class);


});
Route::group(['middleware' => ['auth', \App\Http\Middleware\OnlineUser::class]], function () {
    Route::get('/lastAct', OnlineUsersController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
