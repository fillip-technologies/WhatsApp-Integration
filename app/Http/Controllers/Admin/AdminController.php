<?php

namespace App\Http\Controllers\Admin;

use App\Events\InvoiceEvent;
use App\Exports\PaymentDataExport;
use App\Http\Controllers\Controller;
use App\Models\ConfigData;
use App\Models\Payment;
use App\Models\User;
use App\Models\WhatsappAccount;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Browsershot\Browsershot;

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

public function userList(){
    $users = User::with(['subscription'])->paginate(10);
    return view('admin.users.index',compact('users'));
}

public function viewUserDetails($id){
   $viewdata = Payment::with(['user','plan'])->where('user_id',$id)->first();;
   return view('admin.users.viewUser',compact('viewdata'));
}


public function invoicedata($id)
{
    $viewdata = Payment::with(['user','plan'])->where('user_id',$id)->first();;
    $pdf = Pdf::loadView('pdf.invoice', compact('viewdata'));
    return $pdf->download('report.pdf');
}

    public function deleteUser($id){
            $user = User::findOrFail($id);

            if($user){
                $user->delete();
                return back()->with('success','User Deleted SuccessFul');
            }else{
                return back()->with('error','User Deletion Failed');
            }
    }
        public function SearchUser(Request $request)
    {
            $getdata = $request->data;
            $users = User::where('first_name', 'LIKE', '%' . $getdata . '%')
                ->orWhere('email', 'LIKE', '%' . $getdata . '%')
                ->orWhere('company_name', 'LIKE', '%' . $getdata . '%')
                ->paginate(10);

            return view('admin.users.index', compact('users'));
    }

    public function whatsappsetupView(){
        return view('admin.settings.whatsappsetupt');
    }
    public function storewhatsappsetupView(Request $request){

        $request->validate([
            'user_id'=>'required',
            'phone_number'=>'required|integer',
            'business_id'=>'required|integer',
            'access_token'=>'required|string'
        ]);
        $data = WhatsappAccount::create($request->all());
        if($data){
            return back()->with('success','Whatsapp Data Configured');
        }else{
            return back()->with('error','Something went wrong');
        }
    }

        public function exportPaymentdata(){
            return Excel::download(new PaymentDataExport,'paymentslist.xlsx');
        }

        public function adminprofile(){
             $user= [];
             if(Auth::check()){
                $users = Auth::user();
                  if($users->role == 'admin'){
                    $user = $users;
                    }
             }
            return view('profiles.profile',compact('user'));
        }

        public function AdminProfileEdit($id){
            $user = User::findOrFail($id);
            return view('profiles.edit_profile',compact('user'));
        }

         public function AdminUpdate(Request $request,$id){
            $request->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'required|email|exists:users,email',
                'company_name'=>'required',
                'phone'=>'required|min:10',
                'business_type'=>'required',
            ]);

            $editdata = User::findOrFail($id);
            $editdata->update([
               'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'company_name'=>$request->company_name,
                'business_type'=>$request->business_type,
            ]);

            return back()->with('success','Profile Updated SuccessFully'." ". $editdata->first_name ." ". $editdata->last_name);
        }
}
