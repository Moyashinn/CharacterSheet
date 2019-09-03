@extends('layout.layout_default')
@section('title', 'ログイン')
@section('content')
    <h1>ログインページ</h1>
        <form action="/mockup/toppage">
            email:<input name="email"><br>
            password:<input name="password" type="password">
            <br>
            <button>ログイン</button>
        </form>
<a href="/mockup/register">アカウント作成</a>
@endsection