<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Users\UserManagementController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;


Route::get('/login', [HomeController::class, 'index'])->name('login');
Route::get('/sms-panel',[HomeController::class, 'chatapp'])->name('chat.app');
Route::get('/',[HomeController::class, 'register'])->name('register');
Route::post('/user/create',[UserManagementController::class, 'CreateUser'])->name('user.create');
Route::post('/system/login',[UserManagementController::class, 'systemLogin'])->name('system.login');

Route::get('/send-whatsapp', function () {
    $token = env('WHATSAPP_TOKEN');
    $phoneNumberId = env('WHATSAPP_PHONE_NUMBER_ID');
    $version = env('WHATSAPP_VERSION', 'v25.0');
    $response = Http::withToken($token)
        ->post("https://graph.facebook.com/v25.0/112434238621803/messages",[
            "messaging_product" => "whatsapp",
            "to" => "919235279546",
            "type" => "template",
            "template" => [
                "name" => "congratulation_message",
                "language" => [
                    "code" => "en"
                ],
                "components" => [
                    [
                        "type" => "body",
                        "parameters" => [
                            [
                                "type" => "text",
                                "text" => "Abhishek Prajapati"
                            ],
                            [
                                "type" => "text",
                                "text" => "Full Stack Development"
                            ]
                        ]
                    ]
                ]
            ]
        ]);

    return response()->json([
        'status' => $response->status(),
        'response' => $response->json(),
    ]);
});


Route::get('/test-meta', function () {

    $response = Http::withToken(env('WHATSAPP_TOKEN'))
        ->get('https://graph.facebook.com/v25.0/me');

    return [
        'status' => $response->status(),
        'body' => $response->json(),
    ];
});
