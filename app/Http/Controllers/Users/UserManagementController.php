<?php

namespace App\Http\Controllers\Users;

use App\Events\SentRegistrationEvent;
use App\Http\Controllers\Controller;
use App\Mail\RegistrationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserManagementController extends Controller
{

   public function user_dashboard(){
    return view('admin.dashboard');
    }
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
        Mail::to($data->email)->send(new RegistrationEmail($data));
        // event(new SentRegistrationEvent($data));
        if($data){
            return redirect()->route('login');
        }else{
            return back()->with('error','Account Creation Failed');
        }

        }

        public function systemLogin(Request $request)
     {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

    if (Auth::attempt(['email' => $request->email,'password' => $request->password])) {
        $user = Auth::user();

        if($user->role == 'user'){
         return redirect()->route('user.dashboard');
        }

    }

    if (Auth::attempt(['email' => $request->email,'password' => $request->password])) {
        $user = Auth::user();
        if($user->role == 'admin'){
         return redirect('admin/dashboard');
        }

    }

        return back()->withErrors([
        'email' => 'Invalid email or password.'
       ])->withInput();
}

       public function UserLogout()
      {
         Auth::guard('user')->logout();
         request()->session()->invalidate();
         request()->session()->regenerateToken();
        return redirect()->route('login');
     }

}
