<?php

namespace App\Http\Controllers;

use App\Models\Plan;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.include.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function chatapp(){
        return view('frontend.chatapp');
    }

   public function homeindex(){
    $plans = Plan::latest()->limit(3)->get();
    return view('frontend.home',compact('plans'));
   }

    public function plansView(){
    $plans = Plan::all();
    return view('frontend.plan',compact('plans'));
   }


}
