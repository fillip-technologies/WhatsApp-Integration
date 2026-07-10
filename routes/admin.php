<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PlanManageController;
use App\Http\Controllers\Admin\TemplateController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->controller(AdminController::class)->middleware(['admin'])->group(function(){

Route::get('/dashboard','adminDashboard')->name('admin.dashboard');
Route::post('/logout','LogoutAdmin')->name('admin.logout');
Route::get('/config/index','ConfigIndex')->name('config.index');
Route::post('store/config','storeConfig')->name('admin.storeConfig');
Route::get('config/list','configList')->name('config.list');
Route::post('save/whatsapp/config','saveWhatsappConfig')->name('save.env');
Route::get('/users/list','userList')->name('user.list');
Route::get('/usre/view/{id}/data','viewUserDetails')->name('user.view');
Route::delete('/delete/uers/{id}','deleteUser')->name('user.delete');
Route::get('/invoice/generate/{id}','invoicedata')->name('invoicedata');
Route::get('/serach/user','SearchUser')->name('search.users');
Route::get('/whatsappsetup/view','whatsappsetupView')->name('whatsappsetupView');
Route::post('/storewhatsappsetup','storewhatsappsetupView')->name('storewhatsappsetup');

// Template Management

Route::controller(TemplateController::class)->group(function(){

Route::get('/template','indexTempalte')->name('index.template');
Route::get('/ceate/template','CreateTempalte')->name('create.template');
Route::post('store/template','storeTemplate')->name('store.template');
Route::get('/template/edit/{id}','editTemplate')->name('edit.template');
Route::post('/update/template/{id}','updateTemplate')->name('update.template');
Route::delete('/delete/{id}/template','deleteTemplate')->name('delete.template');

});

Route::controller(PlanManageController::class)->group(function(){
Route::get('/paymentStatus','paymentStatus')->name('paymentStatus');
Route::get('/plan/list','listPlan')->name('plan.list');
Route::get('/create/plan','CreatePlan')->name('create.plan');
Route::get('/plan/edit/{id}','EditPlan')->name('edit.plan');
Route::post('/store/plan','storePlan')->name('store.plan');
Route::delete('/delete/plan','deletePlan')->name('delete.plan');
Route::post('/plan/update/{id}','updatePlan')->name('update.plan');

});

});
