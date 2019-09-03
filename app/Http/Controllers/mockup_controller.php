<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mockup_controller extends Controller
{
    public function top(){
        return view("mockup.toppage");
    }
    public function create(){
        return view("mockup.create");
    }
    public function register(){
        return view("mockup.register");
    }
    public function register_fin(){
        return view("mockup.register_fin");
    }
    public function login(){
        return view("mockup.login");
    }
    
}
