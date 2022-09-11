<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PusherNotificationController;


Route::get('/', function () {
    return view('welcome');
});
// Start notifications
Route::get('/notifications', [PusherNotificationController::class, 'index']);
Route::get('send',[PusherNotificationController::class, 'notification']);
// End notifications

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
