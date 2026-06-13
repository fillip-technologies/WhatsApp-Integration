<?php

namespace App\Http\Controllers;

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

    public function register(){
        return view('frontend.userRegistretion');
    }
}
