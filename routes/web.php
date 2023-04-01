<?php

use App\Http\Controllers\Chat\IndexController;
use App\Http\Controllers\Chat\MessagesController;
use App\Http\Controllers\Chat\SendController;
use App\Http\Controllers\OnlineUsersController;
use App\Http\Controllers\User\ShowController;
use App\Http\Controllers\User\UpdateNameEmailController;
use App\Http\Controllers\User\UpdatePasswordController;
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

Route::group(['namespace' => 'App\Http\Controllers\User', 'middleware' => ['auth'], 'prefix'=>'user'],function(){
    Route::get('/{user}', ShowController::class)->name('user.show');
    Route::patch('/{user}', UpdateNameEmailController::class)->name('user.update.name-pass');
    Route::patch('/password/{user}', UpdatePasswordController::class)->name('user.update.pass');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
