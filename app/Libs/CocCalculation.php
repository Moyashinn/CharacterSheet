<?php
namespace App\Libs;

class CocCalculation{
    #念のために生成しやすい静的メソッドで呼び出す
    static public function ($job_str){
        #もしコロンがあったらここで分割して配列に保存しておく
        $awk = explode(',', $job_str);
        #選択する配列の変数を作る
        $choice = [];
        #配列にある中身を計算するためにメソッドを呼び出す
        foreach($awk as $a){
            $choice[] = get_point($a);
        }
        #計算した結果の値が大きい方を職業ポイントとする
        $job_point = max($choice);
    }
    #ここは計算するメソッド
    function get_point($s){
        #まず足し算を分解する
        $awk = explode('+', $s);
        #値の初期化
        $point = 0;
        #掛け算を分割し計算結果をポイントに加算していく
        foreach($awk as $a){
            list($a, $b) = explode('*', $a);
            $point += get($a) * $b;
        }
    }
    
}