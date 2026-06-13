<?php

namespace App\Http\Controllers\Users;

use App\Events\RestrationEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function CreateUser(Request $request){
        $request->validate([
        'first_name'=>'required|string|min:3|max:100',
        'last_name'=>'required|string|min:3|max:100',
        'email'=>'required|email|unique:users',
        'password'=>'required|min:6|max:8|confirmed',
        'business_type'=>'required|string',
        'phone'=>'required|numeric',
        'company_name'=>'required|string'
        ]);

        $data = User::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'company_name'=>$request->company_name,
            'email'=>$request->email,
            'role'=>'user',
            'phone'=>$request->phone,
            'business_type'=>$request->business_type,
            'password'=>Hash::make($request->password),
        ]);
        event(new RestrationEvent($data));
        if($data){
            return redirect()->route('login');
        }else{
            return back()->with('error','Account Creation Failed');
        }

        }

}
