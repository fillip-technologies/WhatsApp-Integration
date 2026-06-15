<?php

use App\Http\Controllers\Users\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->middleware(['user'])->controller(UserManagementController::class)->group(function(){
Route::get('/dashboard','user_dashboard')->name('user.dashboard');
Route::post('/logout','UserLogout')->name('user.logout');
});
