<?php

use Illuminate\Database\Seeder;

class IntialData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #初期化するためにDBの中を一回削除させる
        #DB::table('professions')->truncate();
        #DB::table('jobs')->truncate();
        #職種ＤＢの初期データ
        #職業
        #今はテストデータなので医師系だけ

        #職種
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
        $job_data_1 =['アニマルセラピスト','看護師', '救急救命士', '形成外科医', '外科医、歯科医', '精神科医', '闇医者'];
        $job_data_2 = ['海上保安官', '科学捜査研究員', '山岳救助隊員', '消防士'];
        $job_data_3 = ['芸術家', 'ダンサー', 'デザイナー', 'ファッション系芸術家'];
        $job_data_4 = ['陸上自衛隊', '海上自衛隊員', '自衛隊パイロット', '民事軍事会社メンバー'];
        $job_data_5 = ['DEX系アスリート', 'STR系アスリート', 'CON系アスリート'];
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
        
    }
}
