<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->controller(AdminController::class)->middleware(['admin'])->group(function(){
Route::get('/dashboard','adminDashboard')->name('admin.dashboard');
});
