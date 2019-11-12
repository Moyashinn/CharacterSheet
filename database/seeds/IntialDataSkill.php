<?php

use Illuminate\Database\Seeder;

class IntialDataSkill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//データクリア

    	//スキルタイプ初期化配列
	    $skill_type_d = ['戦闘','探索','行動','交渉','知識',];
		//スキルタイプDB挿入
	   	foreach ($skill_type_d as $k => $skill_t){
			DB::table('skill_type_masters')->insert([
				'skill_type_name' => $skill_t,
			]);
		}
		//技能名初期化配列
		$skill_master_d_1 = ['回避', 'こぶし', 'キック', '組付き', '頭突き', '武道', '居合',];
		$skill_master_d_2 = ['応急手当', '鍵開け', '隠す', '隠れる', '聞き耳', '忍び歩き', '写真術', '精神分析', '追跡', '登攀', '図書館', '目星',];
		$skill_master_d_3 = ['運転', '機械修理', '重機械操作', '乗馬', '水泳', '製作', '操縦', '跳躍', '電気修理', 'ナビゲート', '変装',];
		$skill_master_d_4 = ['言いくるめ', '信用', '説得', '母国語','その他の言語',];
		$skill_master_d_5 = ['医学', 'オカルト', '化学', 'クトゥルフ神話', '芸術', '経理', '考古学', 'コンピューター', '心理学', '生物学', '地質学', '電子工学', '天文学', '博物学', '物理学', '法律', '薬学', '歴史', 'サバイバル',];
		//技能値初期化配列
		$skill_master_v_1 = [0, 50, 25, 25, 10, 1, 1,];
		$skill_master_v_2 = [30, 1, 15, 10, 25, 10, 10, 1, 10, 40, 25, 25,];
		$skill_master_v_3 = [20, 20, 1, 5, 25, 5, 1, 25, 10, 10, 1,];
		$skill_master_v_4 = [5, 15, 15, 0, 1];
		$skill_master_v_5 = [5, 5, 1, 0, 5, 10, 1, 1, 5, 1, 1, 1, 1, 10, 1, 5, 1, 20, 10];
		//inputタグを入れるデータ配列
		$skill_master_input = ['母国語', '製作', '運転', '操縦', '芸術', 'サバイバル'];
		//スキル名DB挿入
		foreach($skill_master_d_1 as $index => $skill_d){
			DB::table('skill_masters')->insert([
				'skill_type_id' => 1,
				'skill_name' => $skill_d,
				'skill_value' => $skill_master_v_1[$index],
			]);
		}
		foreach($skill_master_d_2 as $index => $skill_d){
			DB::table('skill_masters')->insert([
				'skill_type_id' => 2,
				'skill_name' => $skill_d,
				'skill_value' => $skill_master_v_2[$index],
			]);
		}
		foreach($skill_master_d_3 as $index => $skill_d){
			DB::table('skill_masters')->insert([
				'skill_type_id' => 3,
				'skill_name' => $skill_d,
				'skill_value' => $skill_master_v_3[$index],
			]);
		}
		foreach($skill_master_d_4 as $index => $skill_d){
			DB::table('skill_masters')->insert([
				'skill_type_id' => 4,
				'skill_name' => $skill_d,
				'skill_value' => $skill_master_v_4[$index],
			]);
		}
		foreach($skill_master_d_5 as $index => $skill_d){
			DB::table('skill_masters')->insert([
				'skill_type_id' => 5,
				'skill_name' => $skill_d,
				'skill_value' => $skill_master_v_5[$index],
			]);
		}
		foreach($skill_master_input as $index => $skill_input){
			DB::table('skill_masters')
				->where('skill_name', $skill_input)
				->update(['skill_input_flg'=>1]);
		}
    }
}
