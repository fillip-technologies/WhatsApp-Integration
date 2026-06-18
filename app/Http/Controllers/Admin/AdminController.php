<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConfigData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    public function adminDashboard(){
       return view('admin.dashboard');
    }

    public function LogoutAdmin(){
       Auth::guard('admin')->logout();
        request()->session()->invalidate();
         request()->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function ConfigIndex(){
        return view('admin.settings.config');
    }

    public function storeConfig(Request $request){
        $request->validate([
            'WHATSAPP_PHONE_NUMBER_ID'=>'required|numeric',
            'WHATSAPP_BUSINESS_ACCOUNT_ID'=>'required|numeric',
            'WHATSAPP_TOKEN'=>'required|string'
        ]);

        $data = ConfigData::create([
            'WHATSAPP_PHONE_NUMBER_ID'=>$request->WHATSAPP_PHONE_NUMBER_ID,
            'WHATSAPP_BUSINESS_ACCOUNT_ID'=>$request->WHATSAPP_BUSINESS_ACCOUNT_ID,
            'WHATSAPP_TOKEN'=>$request->WHATSAPP_TOKEN
        ]);

        if($data){
            return back()->with('success','Created Config data successFull');
        }else{
            return back()->with('error','Something went wrong');
        }
    }

    public function configList(){
        $data = ConfigData::select('WHATSAPP_PHONE_NUMBER_ID','WHATSAPP_BUSINESS_ACCOUNT_ID','WHATSAPP_TOKEN')->get();
        if($data){
            return response()->json([
                'message'=>'config data',
                'data'=>$data
            ],200);
        }else{
             return response()->json([
                'message'=>'Data Not Found',
                'data'=>[]
            ],400);
        }
    }


  public function saveWhatsappConfig(Request $request)
{
    $request->validate([
        'WHATSAPP_PHONE_NUMBER_ID' => 'required',
        'WHATSAPP_BUSINESS_ACCOUNT_ID' => 'required',
        'WHATSAPP_TOKEN' => 'required',
    ]);

    $this->updateEnv('WHATSAPP_PHONE_NUMBER_ID', $request->WHATSAPP_PHONE_NUMBER_ID);
    $this->updateEnv('WHATSAPP_BUSINESS_ACCOUNT_ID', $request->WHATSAPP_BUSINESS_ACCOUNT_ID);
    $this->updateEnv('WHATSAPP_TOKEN', $request->WHATSAPP_TOKEN);

    Artisan::call('config:clear');
    return response()->json([
        'status' => true,
        'message' => 'WhatsApp configuration saved successfully.'
    ]);
}
private function updateEnv($key, $value)
{
    $path = base_path('.env');
    $content = file_get_contents($path);
    if (preg_match("/^{$key}=.*/m", $content)) {
        $content = preg_replace(
            "/^{$key}=.*/m",
            $key . '=' . $value,
            $content
        );
    } else {
        $content .= "\n{$key}=\"" . $value . "\"";
    }
    file_put_contents($path, $content);
}
}
