<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PlanManageController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->controller(AdminController::class)->middleware(['admin'])->group(function(){
Route::get('/dashboard','adminDashboard')->name('admin.dashboard');
Route::post('/logout','LogoutAdmin')->name('admin.logout');

//Plans Created By Abhishek

Route::controller(PlanManageController::class)->group(function(){
Route::get('/plan/list','listPlan')->name('plan.list');
Route::get('/create/plan','CreatePlan')->name('create.plan');
Route::get('/plan/edit/{id}','EditPlan')->name('edit.plan');
Route::post('/store/plan','storePlan')->name('store.plan');
Route::delete('/delete/plan','deletePlan')->name('delete.plan');
Route::post('/plan/update/{id}','updatePlan')->name('update.plan');
});





});
