<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Templates;
use Illuminate\Http\Request;
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

    public function storeTemplate(Request $request){
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

            $template = Templates::create([
                // 'user_id'          => $request->user_id,
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

            $access_token = getUserConfig()->access_token ? getUserConfig()->access_token : env('WHATSAPP_TOKEN'); 
            $business_id = getUserConfig()->business_id ? getUserConfig()->business_id : env('WHATSAPP_BUSINESS_ACCOUNT_ID');
             $response = Http::withToken($access_token)
                ->post(
                    "https://graph.facebook.com/v25.0/".$business_id."/message_templates",
                    [
                        'name'       => strtolower(str_replace(' ', '_', $request->name)),
                        'category'   => strtoupper($request->category),
                        'language'   => $request->language,
                        'components' => $components,
                    ]
                );

            if (!$response->successful()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Meta template creation failed',
                    'errors'  => $response->json(),
                ], 422);
            }

            $template->update([
                'meta_template_id' => $response->json()['id'] ?? null,
                'status'           => 'Pending',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Template created successfully',
                'data' => [
                    'template' => $template,
                    'meta'     => $response->json(),
                ]
            ]);
    }

    public function editTemplate($id){
    return view('admin.templates.edit');
    }

    public function updateTemplate(Request $request,$id){

    }

    public function deleteTemplate($id){

    }
}
