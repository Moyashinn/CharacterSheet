<?php

namespace App\Http\Controllers\coc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profession;
use App\job;
use App\skill_type_master;
use App\skill_master;
use App\character_list;

class Create extends Controller
{
	private function c_get_data(){
		//職種リストを出すためにDBからデータを取り出して配列にする。
		$profession = new Profession();
		$profession_value = Profession::select(
			'profession_id',
			'profession'
		)->pluck('profession', 'profession_id');
		$skill_type_master = new skill_type_master();
		$skill_type_value = skill_type_master::get()
			->pluck('skill_type_name', 'skill_type_id');
		$skill_master = new skill_master();
		$skill_value = skill_master::get();
		return [$skill_type_value, $skill_value, $profession_value];
	}
	public function create(Request $request){
		//HTTPステータスを判断して表示させる。
		//XXX		POST通信するためのセーブコントローラが動いていないため、GETになってしまうため。まだ効果はない
		if($_SERVER["REQUEST_METHOD"] == "GET"){
			list($skill_type_value, $skill_value, $profession_value) = $this->c_get_data();
			$professeion_value_d = $request->get('profession_value');
			return view('coc.create')->with([
				'profession_value' => $profession_value,
				'skill_type_value' => $skill_type_value,
				'skill_value' => $skill_value,
			]);
		}else if($SERVER["REQUEST_METHOD"] == "POST"){
			list($skill_type_value, $skill_value, $profession_value) = $this->c_get_data();
			$professeion_value_d = $request->get('profession_value');
			return view('coc.create')->with([
				'profession_value' => $profession_value,
				'skill_type_value' => $skill_type_value,
				'skill_value' => $skill_value,
			]);

		}else{
			return redirect('/');
		}
	}
}
