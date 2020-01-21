<?php

namespace App\Http\Controllers\coc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Save.php extends Controller
{
    public function __construct(){
		//ログインチェック
		$this->middleware('auth');
	}
	//基本ログインが必要なキャラシ操作はここでやることにする
}
