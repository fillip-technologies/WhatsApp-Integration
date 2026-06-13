<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class WhatsAppController extends Controller
{
    // public function send()
    // {
    //     $token = env('WHATSAPP_TOKEN');
    //     $phoneNumberId = env('WHATSAPP_PHONE_NUMBER_ID');
    //     $response = Http::withToken($token)
    //         ->post("https://graph.facebook.com/" . env('WHATSAPP_VERSION') . "/$phoneNumberId/messages", [
    //             'messaging_product' => 'whatsapp',
    //             'to' => '918210369640',
    //             'type' => 'template',
    //             'template' => [
    //                 'name' => 'hello_world',
    //                 'language' => [
    //                     'code' => 'en_US',
    //                 ],
    //             ],
    //         ]);
    //     return $response->json();
    // }

    // public function send()
    // {
    //     $token = env('WHATSAPP_TOKEN');
    //     $phoneNumberId = env('WHATSAPP_PHONE_NUMBER_ID');
    //     $message = 'Hello Sir, Laravel se custom WhatsApp message send ho raha hai.';
    //     $response = Http::withToken($token)
    //         ->post('https://graph.facebook.com/'.env('WHATSAPP_VERSION')."/$phoneNumberId/messages", [
    //             'messaging_product' => 'whatsapp',
    //             'to' => '919235279546',
    //             'type' => 'text',
    //             'text' => [
    //                 'body' => $message,
    //             ],
    //         ]);

    //     return $response->json();
    // }

    
}
