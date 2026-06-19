<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Users\UserManagementController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;



Route::get('/login', [HomeController::class, 'index'])->name('login');
Route::get('/sms-panel',[HomeController::class, 'chatapp'])->name('chat.app');
Route::get('/',[HomeController::class, 'homeindex']);
Route::post('/user/create',[UserManagementController::class, 'CreateUser'])->name('user.create');
Route::post('/system/login',[UserManagementController::class, 'systemLogin'])->name('system.login');
Route::post('/payment/success',[UserManagementController::class, 'verifyPayment'])->name('payment.verify');


// Route::get('check-templates', function () {
//     $wabaId = env('WHATSAPP_BUSINESS_ACCOUNT_ID');
//     $response = Http::withToken(env('WHATSAPP_TOKEN'))
//         ->get("https://graph.facebook.com/v25.0/" . $wabaId . "/message_templates");

//     dd($response->json());
// });
