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
Route::get('/plans/view',[HomeController::class, 'plansView'])->name('plansView');


Route::get('check-templates', function () {
    $wabaId = env('WHATSAPP_BUSINESS_ACCOUNT_ID');
    $response = Http::withToken(env('WHATSAPP_TOKEN'))
        ->get("https://graph.facebook.com/v25.0/" . $wabaId . "/message_templates");

    dd($response->json());
});


   Route::get('create-template', function () {
    $wabaId = env('WHATSAPP_BUSINESS_ACCOUNT_ID');
    $response = Http::withToken(env('WHATSAPP_TOKEN'))
        ->post(
            "https://graph.facebook.com/v25.0/" . $wabaId . "/message_templates",
            [
                'name' => 'course_enrollment_v2',
                'category' => 'MARKETING',
                'language' => 'en_US',
                'components' => [
                    [
                        'type' => 'BODY',
                        'text' => 'Hello {{1}}, congratulations! Your enrollment in the {{2}} training program has been confirmed successfully. Thank you for choosing us. We wish you a successful learning journey.',
                        'example' => [
                            'body_text' => [
                                [
                                    'Rahul Kumar',
                                    'Laravel Development'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        );

    dd($response->status(), $response->json());
});

//get single template
Route::get('/single/tempalte',function(){
$response = Http::withToken(env('WHATSAPP_TOKEN'))
    ->get("https://graph.facebook.com/v25.0/1343180371257012");
dd($response->json());
});

Route::get('send-template', function () {

    $studentName = 'Abhishek Prajapati';
    $courseName = 'Laravel Development';

    $response = Http::withToken(env('WHATSAPP_TOKEN'))
        ->post(
            "https://graph.facebook.com/v25.0/" .
            env('WHATSAPP_PHONE_NUMBER_ID') .
            "/messages",
            [
                "messaging_product" => "whatsapp",
                "to" => "916280381723", // Student Number
                "type" => "template",
                "template" => [
                    "name" => "course_enrollment_v1",
                    "language" => [
                        "code" => "en_US"
                    ],
                    "components" => [
                        [
                            "type" => "body",
                            "parameters" => [
                                [
                                    "type" => "text",
                                    "text" => $studentName
                                ],
                                [
                                    "type" => "text",
                                    "text" => $courseName
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        );

    dd($response->status(), $response->json());
});


Route::get('send-hello', function () {

    $response = Http::withToken(env('WHATSAPP_TOKEN'))
        ->post(
            "https://graph.facebook.com/v25.0/" .
            env('WHATSAPP_PHONE_NUMBER_ID') .
            "/messages",
            [
                'messaging_product' => 'whatsapp',
                'to' => '919235279546',
                'type' => 'template',
                'template' => [
                    'name' => 'hello_world',
                    'language' => [
                        'code' => 'en_US'
                    ]
                ]
            ]
        );

    dd($response->status(), $response->json());
});

Route::get('delete-template', function () {
    $response = Http::withToken(env('WHATSAPP_TOKEN'))
        ->delete(
            "https://graph.facebook.com/v25.0/" .
            env('WHATSAPP_BUSINESS_ACCOUNT_ID') . "/message_templates",
            [
                'name' => 'testing_tamp'
            ]
        );

    return response()->json([
        'status' => $response->status(),
        'data' => $response->json()
    ]);
});
