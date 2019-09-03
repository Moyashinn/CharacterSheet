@extends('layout.layout_default')
@section('title', 'キャラクターリスト')
@section('content')
    <h1>キャラクター一覧</h1>
        <table border="1">
        <tr>
            <th>名前</th>
            <th>職業</th>
            <th>年齢</th>
        </tr>
        <tr>
            <td><a href="/mockup/create">岡島六郎</a></td>
            メモ：本来はデータ保持する
            <td>サラリーマン</td>
            <td>２５</td>
        </tr>
        </table>
        <a href="/mockup/create">キャラクターを作成する</a>
@endsection
