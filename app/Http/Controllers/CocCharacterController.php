<?php

	  namespace App\Http\Controllers;

	  use Illuminate\Http\Request;
	  use App\Profession;
	  use App\job;
	  use App\skill_type_master;
	  use App\skill_master;
	  use App\character_list;
	  class CocCharacterController extends Controller
	  {
		  #キャラクター作成画面管理用コントローラー
		  public function __construct(){
			  #ログインチェック
			  $this->middleware('auth');
		  }
			private function c_data(){
				#職種リストを出すためにＤＢから取り出して配列にする
				$profession = new Profession();
				$profession_value = Profession::select(
					'profession_id', 
					'profession'
				)->pluck('profession','profession_id');
				$skill_type_master = new skill_type_master();
				$skill_type_value = skill_type_master::get()
					->pluck('skill_type_name');
				$skill_master = new skill_master();
				$skill_value = skill_master::get();
				return [$skill_type_value, $skill_value, $profession_value];
			}
		  #新規キャラクター用IDを作って出力する
		  public function create(Request $request){
			if($_SERVER["REQUEST_METHOD"] == "GET"){
				list($skill_type_value, $skill_value, $profession_value) = $this->c_data();
				return view('coc.create')->with([
					'profession_value' => $profession_value,
					'skill_type_value' => $skill_type_value,
					'skill_value' => $skill_value,
				]);
			}else if($SERVER["REQUEST_METHOD"] == "POST"){
				list($skill_type_value, $skill_value, $profession_value) = $this->c_data();
				$profession_value_d = $request->get('profession_value');
				return view('coc.create')->with([
					'profession_value' => $profession_value,
					'skill_type_value' => $skill_type_value,
					'skill_value' => $skill_value,
				]);
			}else{
				return redirect('/');
			}
		  }
		  public function job(Request $request){
			#リクエストデータ取り出し
			$profession_id = $request->only('profession_id');
			#モデル呼び出し
			$jobs = new job();
			#データベースからformで受け取ったvalueデータをもとにjobを取り出す。
			$job_value = job::where('profession_id', $profession_id)->get();
			return $job_value;
		  }
		  public function parameter(Request $request){
			  #リクエストから配列を受け取る
			  $parameter = $request->all();
			  #hp計算
			  $hp_tmp = array($parameter['con'], $parameter['siz']);
			  $hp_total = array_sum($hp_tmp);
			  $parameter['hp'] = floor($hp_total/count($hp_tmp));
			  #mp計算+
			  $parameter['mp'] = $parameter['pow'];
			  #最大san計算
			  $san_tmp = $parameter['pow'];
			  $san_tmp *= 5;
			  $parameter['max_san'] = $san_tmp;
			  #アイデア計算
			  $idea_tmp = $parameter['int'];
			  $idea_tmp *= 5;
			  $parameter['idea'] = $idea_tmp;
			  #幸運計算
			  $parameter['luck'] = $san_tmp;
			  #知識計算
			  $idea_tmp = $parameter['edu'];
			  $idea_tmp *= 5;
			  $parameter['intial'] = $idea_tmp;
			  #職業ポイント計算
			  
			  #趣味ポイント計算
			  /*$hsp_tmp = $parameter['int'];
			  $hsp_tmp *= 10
			  $parameter['hsp'] = $hsp_tmp;*/
			  return $parameter;
		  }
		  #作ったキャラクターをデータベースに格納する
		  #※新規と上書きを区別させる
		  public function save(Request $request){
			  $data = $request->all();
			  var_dump($data);
			  return redirect('home2');
		  }
		  public function list(){
			  //$chara_list = new character_list();
		  }
	  }
