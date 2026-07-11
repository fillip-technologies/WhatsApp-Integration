<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Templates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class WhatsappApiController extends Controller
{
     public function createTemplate(){
            return view('users.create_template');
        }

  public function MessageTemplate(Request $request)
{
    $request->validate([
        'user_id'          => 'required|integer|exists:users,id',
        'name'             => 'required|string|max:255',
        'category'         => 'required|string|max:100',
        'language'         => 'required|string|max:50',
        'body'             => 'required|string',
        'status'           => 'nullable|string|in:Draft,Pending,Approved,Rejected',
        'meta_template_id' => 'nullable|string|max:255',
        'button_type'      => 'nullable|array',
        'button_type.*'    => 'nullable|string',
        'header_type'      => 'nullable|string|max:100',
        'header_text'      => 'nullable|string',
        'footer'           => 'nullable|string',
    ]);

    $components = [];

    if ($request->header_type === 'TEXT' && $request->header_text) {
        $components[] = [
            'type'   => 'HEADER',
            'format' => 'TEXT',
            'text'   => $request->header_text,
        ];
    }

    $components[] = [
        'type' => 'BODY',
        'text' => $request->body,
    ];


    if ($request->footer) {
        $components[] = [
            'type' => 'FOOTER',
            'text' => $request->footer,
        ];
    }

  if (!empty($request->button_type)) {

    $buttons = [];

    foreach ($request->button_type as $index => $type) {

        if (empty($type)) {
            continue;
        }

        $buttons[] = [
            'type' => strtoupper(trim($type)),
            'text' => 'Button ' . ($index + 1),
        ];
    }

    if (!empty($buttons)) {
        $components[] = [
            'type'    => 'BUTTONS',
            'buttons' => $buttons,
        ];
    }
}

     $access_token = null;
     $business_id  = null;
     $user_id = null;
        if(Auth::check()){
        $user = Auth::user();
        if($user->role == 'user'){
            $config = getUserConfig();
            $access_token = $config->access_token;
            $business_id  = $config->business_id;
            $user_id = $user->id;
        }

    }

    if(!$access_token || !$business_id){

        return response()->json([
            'success'=>false,
            'message'=>'WhatsApp configuration missing'
        ],422);

    }

      $template = Templates::create([
        'user_id'          => $request->user_id,
        'name'             => $request->name,
        'category'         => $request->category,
        'language'         => $request->language,
        'body'             => $request->body,
        'status'           => $request->status ?? 'Draft',
        'meta_template_id' => $request->meta_template_id,
        'button_type'      => $request->button_type,
        'header_type'      => $request->header_type,
        'header_text'      => $request->header_text,
        'footer'           => $request->footer,
    ]);


       $metaResponse = Http::withToken($access_token)
        ->post(
            "https://graph.facebook.com/v25.0/".$business_id."/message_templates",
            [

                'name' => strtolower(
                    str_replace(' ','_',$request->name)
                ),

                'category' => strtoupper($request->category),

                'language' => $request->language,

                'components' => $components,

            ]
        );

    if(!$metaResponse->successful()){
        $template->update([
            'status'=>'Rejected',
            'user_id'=>$user_id
        ]);
        return response()->json([
            'success'=>false,
            'message'=>'Meta template creation failed',
            'errors'=>$metaResponse->json()
        ],422);

    }
     $metaData = $metaResponse->json();
     $template->update([
        'meta_template_id'=>$metaData['id'] ?? null,
        'user_id'=>$user_id,
        'status'=>$metaData['status'] ?? 'Pending',
     ]);
    return back()->with('success','Template created successfully');
}


public function showTemplate($id)
{
    $template = Templates::findOrFail($id);
    return response()->json([
        'success' => true,
        'data' => $template
    ]);
}

public function deleteTemplate($id)
{

    $access_token = null;
     $business_id  = null;

        if(Auth::check()){
        $user = Auth::user();
        if($user->role == 'user'){
            $config = getUserConfig();
            $access_token = $config->access_token;
            $business_id  = $config->business_id;
        }

    }
    $template = Templates::findOrFail($id);
    $response = Http::withToken($access_token)
        ->delete(
            'https://graph.facebook.com/v25.0/'.$business_id.'/message_templates',
            [
                'name' => $template->name
            ]
        );

       if (!$response->successful()) {
       return back()->with('error','Failed to delete template from Meta');
       }
      $template->delete();
      return back()->with('success','Template deleted successfully');

}

 public function metaTemplateList()
{
    $response = Http::withToken(env('WHATSAPP_TOKEN'))
        ->get(
            'https://graph.facebook.com/v25.0/' .
            env('WHATSAPP_PHONE_NUMBER_ID') .
            '/message_templates'
        );

    return response()->json([
        'success' => true,
        'data' => $response->json()['data'] ?? []
    ]);
}
}
