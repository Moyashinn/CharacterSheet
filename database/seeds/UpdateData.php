<?php

use Illuminate\Database\Seeder;

class UpdateData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #スキルにinputを入れる場合のフラグ
		$input_flg = [20, 40, 25, 26, 34, 35, 54, 6,];
		 foreach($input_flg as $input_flg){
		 	DB::table('skill_masters')
		        ->where('skill_id', $input_flg)
		    	->update(['skill_input_flg' => true]);
         }
    }
}
