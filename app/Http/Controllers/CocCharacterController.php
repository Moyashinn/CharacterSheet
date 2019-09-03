<?php

      namespace App\Http\Controllers;

      use Illuminate\Http\Request;
      use App\Profession;
      use App\job;
      class CocCharacterController extends Controller
      {
          #キャラクター作成画面管理用コントローラー
          public function __construct(){
              #ログインチェック
              $this->middleware('auth');
          }
          #新規キャラクター用IDを作って出力する
          public function create(Request $request){
            #職種リストを出すためにＤＢから取り出して配列にする
            $profession = new Profession();
            $profession_value = Profession::select('profession_id', 'profession')->pluck('profession','profession_id');

            return view('coc.chara_create')->with([
              'profession_value' => $profession_value
            ]);
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
          #public function save(){
          #}
          #public function list(){
          #}
      }
