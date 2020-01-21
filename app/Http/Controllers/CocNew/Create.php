<?php

namespace App\Http\Controllers\CocNew;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\skill_type_master;
use App\skill_master;

class Create extends Controller
{
    public function create(Request $r){
		//パラメーターの定数呼び出し
		$parameter_k = config('const.Chara.PARAMETER_KEY');
		$parameter_3d6 = config('const.Chara.3D6');
		$parameter_2d6 = config('const.Chara.2D6');
		$skill_math = config('const.Chara.SKILL_MATH');

		$skill_type_master = new skill_type_master();
		$skill_type_value = skill_type_master::get()
			->pluck('skill_type_name', 'skill_type_id');
		$skill_master = new skill_master();
		$skill_value = skill_master::get();		
		//var_dump($skill_value);exit;
		//viewで表示
		return view('coc_new.create')->with([
			'parameter_k' => $parameter_k,
			'parameter_3d6' => $parameter_3d6,
			'parameter_2d6' => $parameter_2d6,
			'skill_type_value' => $skill_type_value,
			'skill_value' => $skill_value,
			'skill_math' => $skill_math,
		]);
	}
}
