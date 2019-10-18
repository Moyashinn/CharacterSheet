@extends('layouts.app')
@section('title', 'アカウント作成')
@section('content')
    <h1>アカウント登録</h1>
    <form action='/mockup/register_fin'>
        ニックネーム:<input type="text" name="nick_name"><br>
        email:<input type="email" name="email"><br>
        パスワード<input type="password" name="password"><br>
        パスワード確認 :<input type="password" name="password"><br>
        <button>登録</button>
    </form>
@endsection
