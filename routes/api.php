<?php

use App\Http\Controllers\Api\SendMessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('send/greed/message',[SendMessageController::class, 'sendMessage']);
