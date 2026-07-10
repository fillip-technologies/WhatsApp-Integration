<?php

use App\Models\Payment;
use App\Models\WhatsappAccount;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;


if(!function_exists('AdminLogin')){
    function AdminLogin(){
        if(Auth::check()){
        $users = Auth::user();
        if($users->role == 'admin'){
        return $users;
        }
       }else{
        return redirect()->route('login');
       }
    }
}

if(!function_exists('UserLogin')){
    function UserLogin(){
     if(Auth::check()){
    $users = Auth::user();
    if($users->role == 'user'){
     return $users;
    }
    }else{
    return redirect()->route('login');
    }

    }
}

if(!function_exists('getUserConfig')){
    function getUserConfig(){
            $users = Auth::user();
            if($users->role == 'user'){
            $getdata = WhatsappAccount::where('user_id',$users->id)->first();
            return $getdata;
            }
        
    }
}

if(!function_exists('PaymentInvoice')){

    function PaymentInvoice($id){
        $payments = Payment::with(['user', 'plan'])->findOrFail($id);
        $pdf = Pdf::loadView('payments.payment_pdf', compact('payments'))
        ->setPaper('A4', 'landscape');
         return $pdf->download('payment-report.pdf');
    }
}
