<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Users\UserManagementController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('login');
Route::get('/dashboard',[HomeController::class, 'dashboard']);
Route::get('/sms-panel',[HomeController::class, 'chatapp'])->name('chat.app');
Route::get('/register',[HomeController::class, 'register'])->name('register');
Route::post('/user/create',[UserManagementController::class, 'CreateUser'])->name('user.create');
Route::get('/send-whatsapp', function () {

    $token = env('WHATSAPP_TOKEN');
    $phoneNumberId = env('WHATSAPP_PHONE_NUMBER_ID');
    $version = env('WHATSAPP_VERSION', 'v25.0');

    $response = Http::withToken($token)
        ->post("https://graph.facebook.com/{$version}/{$phoneNumberId}/messages", [
            "messaging_product" => "whatsapp",
            "to" => "919235279546",
            "type" => "template",
            "template" => [
                "name" => "training_application_received",
                "language" => [
                    "code" => "en_US"
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
