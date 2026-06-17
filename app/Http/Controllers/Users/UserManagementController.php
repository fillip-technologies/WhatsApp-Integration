<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Templates;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Razorpay\Api\Api;

class UserManagementController extends Controller
{

   public function user_dashboard(){
    return view('admin.dashboard');
    }
   public function CreateUser(Request $request)
{
    $request->validate([
        'first_name'    => 'required|string|min:3|max:100',
        'last_name'     => 'required|string|min:3|max:100',
        'email'         => 'required|email|unique:users',
        'password'      => 'required|min:6|max:8|confirmed',
        'business_type' => 'required|string',
        'phone'         => 'required|numeric',
        'plan_type'     => 'required|string',
        'company_name'  => 'required|string'
    ]);

    $user = User::create([
        'first_name'    => $request->first_name,
        'last_name'     => $request->last_name,
        'company_name'  => $request->company_name,
        'email'         => $request->email,
        'role'          => 'user',
        'plan_type'     => $request->plan_type,
        'phone'         => $request->phone,
        'business_type' => $request->business_type,
        'password'      => Hash::make($request->password),
    ]);

    $plan = Plan::where('plans', $request->plan_type)->first();

    if (!$plan) {
        return response()->json([
            'success' => false,
            'message' => 'Plan not found'
        ], 404);
    }

    $api = new Api(
        env('RAZORPAY_KEY'),
        env('RAZORPAY_SECRET')
    );

    $order = $api->order->create([
        'receipt'  => 'plan_'.$plan->id.'_'.time(),
        'amount'   => $plan->price * 100,
        'currency' => 'INR'
    ]);

    return response()->json([
        'success' => true,
        'user_id' => $user->id,
        'plan_id' => $plan->id,
        'plan_name' => $plan->name,
        'plan_type' => $plan->plans,
        'amount' => $order['amount'],
        'order_id' => $order['id'],
        'currency' => 'INR',
        'razorpay_key' => env('RAZORPAY_KEY')
    ]);
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

    public function verifyPayment(Request $request)
{
            try {

                $api = new Api(
                    env('RAZORPAY_KEY'),
                    env('RAZORPAY_SECRET')
                );

                $api->utility->verifyPaymentSignature([
                    'razorpay_order_id'   => $request->razorpay_order_id,
                    'razorpay_payment_id' => $request->razorpay_payment_id,
                    'razorpay_signature'  => $request->razorpay_signature,
                ]);

              DB::transaction(function () use ($request) {
                    DB::table('payments')->insert([
                            'user_id'    => $request->user_id,
                            'amount'=>$request->amount,
                            'currency'=>$request->currency,
                            'plan_id'    => $request->plan_id,
                            'razorpay_payment_id' => $request->razorpay_payment_id,
                            'razorpay_signature'  => $request->razorpay_signature,
                            'status'              => 'success',
                            'paid_at'             => now(),
                        ]);

                    $plan = DB::table('plans')
                        ->where('id', $request->plan_id)
                        ->first();

                    DB::table('subscriptions')
                        ->where('user_id', $request->user_id)
                        ->where('status', 'active')
                        ->update([
                            'status' => 'expired'
                        ]);

                    DB::table('subscriptions')->insert([
                        'user_id'    => $request->user_id,
                        'plan_id'    => $request->plan_id,
                        'start_date' => now(),
                        'end_date'   => now()->addDays((int) $plan->validity_day),
                        'status'     => 'active',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                });

                return response()->json([
                    'success' => true,
                    'requestdata'=>$request->all(),
                    'message' => 'Payment verified successfully',
                    'redirect_url' => route('login')
                ]);

            } catch (\Exception $e) {

                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 400);
            }
}

        public function listTemplate(){
            $user = UserLogin() ??  0;
            $templates = Templates::with(['user'])->where('user_id',$user->id)->get() ?? [];
            return view('users.listst',compact('templates'));
        }

        public function createTemplate(){
            return view('users.create_template');
        }


        public function MessageTemplate(Request $request){
            dd($request->all());

        }


}
