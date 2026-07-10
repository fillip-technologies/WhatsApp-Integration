<?php

use App\Http\Controllers\Users\UserManagementController;
use App\Http\Controllers\Users\WhatsappApiController;
use Illuminate\Support\Facades\Route;


Route::prefix('user')->middleware(['user'])->controller(UserManagementController::class)->group(function(){
Route::get('/dashboard','user_dashboard')->name('user.dashboard');
Route::post('/logout','UserLogout')->name('user.logout');
Route::get('/list/Template','listTemplate')->name('listTemplate');
Route::get('/list/userpayment','userpayment')->name('userpayment');
Route::get('/settingUser','settingUser')->name('settingUser');
Route::controller(WhatsappApiController::class)->group(function(){
Route::get('/create/template','createTemplate')->name('createTemplate');
Route::post('/message/tempalate/create','MessageTemplate')->name('template.create');

});




});
