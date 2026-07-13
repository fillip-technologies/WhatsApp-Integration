<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Templates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TemplateController extends Controller
{


    public function indexTempalte(){
      $templates = Templates::paginate(10) ?? [];
       return view('admin.templates.index',compact('templates'));
    }

    public function CreateTempalte(){
    return view('admin.templates.create');
    }



    public function storeTemplate(Request $request)
{
    $request->validate([
        'user_id'          => 'nullable',
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
    if ($request->header_type == 'TEXT' && !empty($request->header_text)) {

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


    if (!empty($request->footer)) {

        $components[] = [
            'type' => 'FOOTER',
            'text' => $request->footer,
        ];
    }

    if (!empty($request->button_type)) {

        $buttons = [];

        foreach ($request->button_type as $index => $type) {

            if(empty($type)){
                continue;
            }

            $buttons[] = [
                'type' => strtoupper($type),
                'text' => 'Button '.($index+1),
            ];
        }


        if(count($buttons)){

            $components[] = [
                'type' => 'BUTTONS',
                'buttons' => $buttons,
            ];
        }
    }


     $access_token = null;
     $business_id  = null;
     $user_id = null;

    if(Auth::check()){
        $user = Auth::user();
        if($user->role == 'admin'){

            $access_token = env('WHATSAPP_TOKEN');
            $business_id  = env('WHATSAPP_BUSINESS_ACCOUNT_ID');
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

        'name'        => $request->name,
        'category'    => $request->category,
        'language'    => $request->language,
        'body'        => $request->body,
        'status'      => 'Pending',
        'button_type' => $request->button_type,
        'header_type' => $request->header_type,
        'header_text' => $request->header_text,
        'footer'      => $request->footer,

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
            'user_id'=> $user_id
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
    // return response()->json([
    //     'success'=>true,
    //     'message'=>'Template created successfully',
    //     'data'=>[
    //         'template'=>$template->fresh(),
    //         'meta'=>$metaData
    //     ]
    // ]);



}
    public function editTemplate($id){
    return view('admin.templates.edit');
    }

    public function updateTemplate(Request $request,$id){

    }

    public function deleteTemplate($id){
        $temp = Templates::findOrFail($id);
        $access_token = null;
       $business_id  = null;
      if(Auth::check()){
        $user = Auth::user();
        if($user->role == 'admin'){
            $access_token = env('WHATSAPP_TOKEN');
            $business_id  = env('WHATSAPP_BUSINESS_ACCOUNT_ID');
        }
        elseif($user->role == 'user'){
            $config = getUserConfig();
            $access_token = $config->access_token;
            $business_id  = $config->business_id;
        }

     }
       Http::withToken($access_token)
        ->delete(
            "https://graph.facebook.com/v25.0/".$business_id."/message_templates",
            [
                'name' => $temp->name
            ]
        );
     $temp->delete();
     return back()->with('success','Deleted Template SuccessFul');
    }
}
