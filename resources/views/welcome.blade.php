@extends('layouts.app')
@section('content')
        <div class="content">
            
            <div class ="contentlist">
                <h1 class="navbar-brand text-nomal">キャラクターシート一覧</h1><br>
                <a href="{{url('/home')}}">クトゥルフ神話TRPG</a>
            </div>
            <div class="attention text-center">
                当サイトはキャラクター作成の補助をするものであり、当サイトだけでは遊ぶことができません。<br>
                そのため、ルールブックを購入の上で使用することを固くおすすめします。<br>
            </div>
        </div>
@endsection
