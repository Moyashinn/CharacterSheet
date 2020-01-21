<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public function test(Request $r){
		var_dump($r->all());
		return view('test');
	}
}
