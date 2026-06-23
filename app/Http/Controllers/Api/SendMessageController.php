<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SendMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sendMessage(Request $request)
{
    try {
        $response = Http::withToken(env('WHATSAPP_TOKEN'))
        ->post("https://graph.facebook.com/v25.0/" .
            env('WHATSAPP_PHONE_NUMBER_ID') .
            "/messages",
            [
                "messaging_product" => "whatsapp",
                "to" =>$request->mobile,
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
                                    "text" => $request->student_name
                                ],
                                [
                                    "type" => "text",
                                    "text" => $request->course_name
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        );

        return response()->json([
            'success' => true,
            'status' => $response->status(),
            'response' => $response->json()
        ]);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
