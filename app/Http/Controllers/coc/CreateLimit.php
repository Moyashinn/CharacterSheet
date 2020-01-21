<?php

namespace App\Http\Controllers\coc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\job;
use App\Profession;
use App\jobpoint;

class CreateLimit extends Controller
{
    public function job(Request $request){
		//職種のデータを受け取って、詳しいジョブデータを取り出す。
		
		$profession_id = $request->only('profession_id');
		//model呼び出し
		$jobs = new job();
		//職業データを取り出す
		$job_value = job::where('profession_id', $profession_id)->get();
		return $job_value;
	}
	private function get_jsp($s,$p){
		//文字列を分離して、計算する。
		$awk = explode('+', $s);
		$jsp = 0;
		foreach($awk as $i){
			list($a, $b) = array_pad(explode('*', $i), 2, 1 );
			$jsp += (int)$p[$a] * (int)$b;
		}
		return $jsp;
	}
	public function parameter(Request $request){
		//パラメータのデータを受け取る
		$parameter = $request->all();
		//各種計算
		//hp
		$hp_tmp = array($parameter['con'], $parameter['siz']);
		$hp_total = array_sum($hp_tmp);
		$parameter['hp'] = floor($hp_total/count($hp_tmp));
		//mp
		$parameter['mp'] = $parameter['pow'];
		//san
		$san_tmp = $parameter['pow'];
		$san_tmp *= 5;
		$parameter['max_san'] = $san_tmp;
		//アイデア
		$idea_tmp = $parameter['int'];
		$idea_tmp *= 5;
		$parameter['idea'] = $idea_tmp;
		//幸運
		$parameter['lick'] = $san_tmp;
		//知識
		$intial_tmp = $parameter['edu'];
		$intial_tmp *= 5;
		$parameter['intial'] = $intial_tmp;
		
		//職業
		$jobpoint = new jobpoint();
		if(!empty($parameter['job_id'])){
			$jsp_s = jobpoint::where('job_id', $parameter['job_id'])
				->pluck('job_formula');
			$awk = explode(',', $jsp_s[0]);
			$select = [];
			foreach($awk as $a){
				$select[] = $this->get_jsp($a, $parameter);
			}
			$jsp = max($select);
			$parameter['jsp'] = $jsp;
		}
		//趣味
		$hsp_tmp = $parameter['int'];
		$hsp_tmp *= 10;
		$parameter['hsp'] = $hsp_tmp;
		
		return $parameter;
	}
}
