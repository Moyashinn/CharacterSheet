<?php

use Illuminate\Database\Seeder;

class IntialDataNewSkill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //データベースにスキルの種類とスキルを入れる
		$skill_type_d = ['戦闘', '探索', '行動', '交渉', '知識',];
		$skill_master_d_1 = ['回避' => 0,'近接戦闘(格闘)' => 25, '射撃(拳銃)' => 20, '射撃(ライフル/ショットガン)' => 25, '投擲' =>20,];
		$skill_master_d_2 = ['聞き耳' =>20, '隠密' => 20, '鍵開け' => 1, '手さばき' =>10, '精神分析' => 1, '追跡' => 10, '登攀' =>20,  '図書館' => 20, '目星' => 20,];
		$skill_master_d_3 = ['運転(自動車)' => 20, '応急手当' => 30,  '機械修理' => 10, '芸術/製作' => 5, 'サバイバル' => 10, '重機械操作' =>1, '水泳' => 20, '操縦' => 1, '跳躍' => 20, '電気修理' => 10, 'ナビゲート' => 10, '変装' => 5, ];
		$skill_master_d_4 = ['威圧' => 15, '言いくるめ' => 5, '信用' => 0, '説得' => 10,'母国語' => 0,'魅惑' => 15,'ほかの言語' =>1];
		$skill_master_d_5 = ['医学' => 1, 'オカルト' => 5, 'クトゥルフ神話' => 0, '科学' => 1, '経理' => 5, '考古学' => 1, 'コンピュータ' => 5, '自然' => 10, '心理学' => 10, '人類学' => 1, '電子工学' => 1, '法律' => 5, '歴史' =>5,];
		//inputflg
		$skill_input = ['母国語', '製作', '運転', '操縦', '芸術', 'サバイバル', '近接戦闘', 'ほかの言語', '科学',];
		foreach($skill_type_d as $key => $val){
			DB::table('skill_type_masters')->insert([
				'skill_type_name' => $val,
			]);
		}
		foreach($skill_master_d_1 as $key => $val){
			DB::table('skill_masters')->insert([
				'skill_type_id' => 1,
				'skill_name' => $key,
				'skill_value' => $val,
			]);
		}
		foreach($skill_master_d_2 as $key => $val){
			DB::table('skill_masters')->insert([
				'skill_type_id' => 2,
				'skill_name' => $key,
				'skill_value' => $val,
			]);
		}
		foreach($skill_master_d_3 as $key => $val){
			DB::table('skill_masters')->insert([
				'skill_type_id' => 3,
				'skill_name' => $key,
				'skill_value' => $val,
			]);
		}
		foreach($skill_master_d_4 as $key => $val){
			DB::table('skill_masters')->insert([
				'skill_type_id' => 4,
				'skill_name' => $key,
				'skill_value' => $val,
			]);
		}
		foreach($skill_master_d_5 as $key => $val){
			DB::table('skill_masters')->insert([
				'skill_type_id' => 5,
				'skill_name' => $key,
				'skill_value' => $val,
			]);
		}
		foreach($skill_input as $key => $val){
			DB::table('skill_masters')
				->where('skill_name', $val)
				->update(['skill_input_flg' => 1]);
		}
    }
}
