<?php

use Illuminate\Database\Seeder;

class IntialDataJob extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //初期化するためにDBの中を一回削除させる
		//ただ今は動かないので要修正
        //DB::table('professions')->truncate();
        //DB::table('jobs')->truncate();
        //DB::table('job_points')->truncate();
        //職種
        //本来なら職種も配列に入れるべきだが、
        //現状問題ないのでとりあえずこのまま
        DB::table('professions')->insert([
          'profession_id' => 1,
          'profession' => '医療系',
        ]);
        DB::table('professions')->insert([
          'profession_id' => 2,
          'profession' => '警察官、消防士',
        ]);
        DB::table('professions')->insert([
          'profession_id' => 3,
          'profession' => '芸術系',
        ]);
        DB::table('professions')->insert([
          'profession_id' => 4,
          'profession' => '軍事',
        ]);
        DB::table('professions')->insert([
          'profession_id' => 5,
          'profession' => '運動関係職業',
        ]);
        DB::table('professions')->insert([
          'profession_id' => 6,
          'profession' => '知識人、研究者',
        ]);
        DB::table('professions')->insert([
          'profession_id' => 7,
          'profession' => 'タレント系',
        ]);
        DB::table('professions')->insert([
          'profession_id' => 8,
          'profession' => '超心理学者、霊感系',
        ]);
        DB::table('professions')->insert([
          'profession_id' => 9,
          'profession' => 'ビジネス、労働系職業',
        ]);
        DB::table('professions')->insert([
          'profession_id' => 10,
          'profession' => 'アウトロー系',
        ]);
        DB::table('professions')->insert([
          'profession_id' => 11,
          'profession' => 'その他の職業',
        ]);
		
        //職業初期データー
        $job_data_1 =['アニマルセラピスト','看護師', '救急救命士', '形成外科医', '外科医、歯科医', '精神科医', '闇医者'];
        $job_data_2 = ['海上保安官', '科学捜査研究員', '山岳救助隊員', '消防士'];
        $job_data_3 = ['芸術家', 'ダンサー', 'デザイナー', 'ファッション系芸術家'];
        $job_data_4 = ['陸上自衛隊', '海上自衛隊員', '自衛隊パイロット', '民事軍事会社メンバー'];
        $job_data_5 = ['dex系アスリート', 'str系アスリート', 'con系アスリート'];
        $job_data_6 = ['冒険家教授', '評論家'];
        $job_data_7 = ['アイドル、音楽タレント', 'アナウンサー', 'コメディアン', 'スポーツタレント', 'テレビコメンテーター', 'ネットタレント', '俳優', 'プロデューサー、マネージャー'];
        $job_data_8 = ['ゴーストハンター', '占い師、スピチュアリスト、霊媒師'];
        $job_data_9 = ['執事、メイド', 'セールスマン', 'ホスト、ホステス', 'メカニック', '料理人'];
        $job_data_10 = ['ギャンブラー', '経済犯罪者', 'ストリートローグ', 'ネット犯罪者'];
        $job_data_11 = ['その他、実装されていない職業'];
            
        foreach ($job_data_1 as $job_data){
          DB::table('jobs')->insert([
            'profession_id' => 1,
            'job' => $job_data,
          ]);
        }

        foreach ($job_data_2 as $job_data){
          DB::table('jobs')->insert([
            'profession_id' => 2,
            'job' => $job_data,
          ]);
        }

        foreach ($job_data_3 as $job_data){
          DB::table('jobs')->insert([
            'profession_id' => 3,
            'job' => $job_data,
          ]);
        }
        foreach ($job_data_4 as $job_data){
          DB::table('jobs')->insert([
            'profession_id' => 4,
            'job' => $job_data,
          ]);
        }
        foreach ($job_data_5 as $job_data){
          DB::table('jobs')->insert([
            'profession_id' => 5,
            'job' => $job_data,
          ]);
        }
        foreach ($job_data_6 as $job_data){
          DB::table('jobs')->insert([
            'profession_id' => 6,
            'job' => $job_data,
          ]);
        }
        foreach ($job_data_7 as $job_data){
          DB::table('jobs')->insert([
            'profession_id' => 7,
            'job' => $job_data,
          ]);
        }
        foreach ($job_data_8 as $job_data){
          DB::table('jobs')->insert([
            'profession_id' => 8,
            'job' => $job_data,
          ]);
        }
        foreach ($job_data_9 as $job_data){
          DB::table('jobs')->insert([
            'profession_id' => 9,
            'job' => $job_data,
          ]);
        }
        foreach ($job_data_10 as $job_data){
          DB::table('jobs')->insert([
            'profession_id' => 10,
            'job' => $job_data,
          ]);
        }
        foreach ($job_data_11 as $job_data){
          DB::table('jobs')->insert([
            'profession_id' => 11,
            'job' => $job_data,
          ]);
        }
		//
		//職業計算の配列
		$job_f=['edu' => 'edu*20','str' => 'edu*10+str*10','con' => 'edu*10+con*10', 'siz' => 'edu*10+siz*10', 'dex' => 'edu*10+dex*10', 'app' =>'edu*10+app*10', 'int' => 'edu*10+int*10', 'pow' => 'edu*10+pow*10'];
        $job_f_tmp_1 = [
			$job_f['app'] . ',' . $job_f['pow'],
			$job_f['edu'],
			$job_f['dex'],
			$job_f['dex'],
			$job_f['dex'],
			$job_f['edu'] . ',' . $job_f['app'],
			$job_f['edu'] . ',' . $job_f['dex'],
        ];
		$job_f_tmp_2 = [
			$job_f['dex'] . ',' . $job_f['str'],
			$job_f['dex'],
			$job_f['dex'] . ',' . $job_f['str'],
			$job_f['dex'] . ',' . $job_f['str'],
		];
		$job_f_tmp_3 = [
			$job_f['dex'] . ',' . $job_f['pow'],
			$job_f['dex'] . ',' . $job_f['pow'],
			$job_f['edu'] . ',' . $job_f['pow'],
			$job_f['dex'] . ',' . $job_f['pow'],
		];
		$job_f_tmp_4 =[
			$job_f['dex'] . ',' . $job_f['str'],
			$job_f['dex'] . ',' . $job_f['str'],
			$job_f['dex'],
			$job_f['dex'] . ',' . $job_f['str'],
		];
		$job_f_tmp_5 = [
			$job_f['dex'],
			$job_f['str'],
			$job_f['con'],
		];
		$job_f_tmp_6 = [
			$job_f['dex'] . ',' .  $job_f['con'],
			$job_f['edu'],
		];
		$job_f_tmp_7 = [
			$job_f['app'],
			$job_f['edu'] . ',' . $job_f['app'],
			$job_f['dex'],
			$job_f['con'] . ',' . $job_f['str'],
			$job_f['edu'] . ',' . $job_f['app'],
			$job_f['dex'],
			$job_f['app'],
			$job_f['pow'],
		];
		$job_f_tmp_8 = [
			$job_f['dex'],
			$job_f['pow'] . ',' . $job_f['app'],
		];
		$job_f_tmp_9 = [
			$job_f['edu'],
			$job_f['app'] . ',' . $job_f['pow'],
			$job_f['pow'] . ',' . $job_f['app'],
			$job_f['edu'],
			$job_f['dex'],
		];
		$job_f_tmp_10 = [
			$job_f['app'] . ',' . $job_f['dex'],
			$job_f['edu'],
			$job_f['dex'] . ',' . $job_f['str'],
			$job_f['edu'],
		];
		
		$cnt = 1;
		foreach($job_f_tmp_1 as $job_tmp){
			DB::table('jobpoints')->insert([
				'job_id' => $cnt,
				'job_formula' => $job_tmp,
			]);
			$cnt++;
		}
		foreach($job_f_tmp_2 as $job_tmp){
			DB::table('jobpoints')->insert([
				'job_id' => $cnt,
				'job_formula' => $job_tmp,
			]);
			$cnt++;
		}
		foreach($job_f_tmp_3 as $job_tmp){
			DB::table('jobpoints')->insert([
				'job_id' => $cnt,
				'job_formula' => $job_tmp,
			]);
			$cnt++;
		}
		foreach($job_f_tmp_4 as $job_tmp){
			DB::table('jobpoints')->insert([
				'job_id' => $cnt,
				'job_formula' => $job_tmp,
			]);
			$cnt++;
		}
		foreach($job_f_tmp_5 as $job_tmp){
			DB::table('jobpoints')->insert([
				'job_id' => $cnt,
				'job_formula' => $job_tmp,
			]);
			$cnt++;
		}
		foreach($job_f_tmp_6 as $job_tmp){
			DB::table('jobpoints')->insert([
				'job_id' => $cnt,
				'job_formula' => $job_tmp,
			]);
			$cnt++;
		}
		foreach($job_f_tmp_7 as $job_tmp){
			DB::table('jobpoints')->insert([
				'job_id' => $cnt,
				'job_formula' => $job_tmp,
			]);
			$cnt++;
		}
		foreach($job_f_tmp_8 as $job_tmp){
			DB::table('jobpoints')->insert([
				'job_id' => $cnt,
				'job_formula' => $job_tmp,
			]);
			$cnt++;
		}
		foreach($job_f_tmp_9 as $job_tmp){
			DB::table('jobpoints')->insert([
				'job_id' => $cnt,
				'job_formula' => $job_tmp,
			]);
			$cnt++;
		}
		foreach($job_f_tmp_10 as $job_tmp){
			DB::table('jobpoints')->insert([
				'job_id' => $cnt,
				'job_formula' => $job_tmp,
			]);
			$cnt++;
		}
    }
}
