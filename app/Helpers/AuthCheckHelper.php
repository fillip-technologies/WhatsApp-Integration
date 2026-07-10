<?php

use App\Models\WhatsappAccount;
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
