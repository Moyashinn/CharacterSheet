@extends('layout.default_layout')
@section('title','キャラクターリスト')
@section('content')
<div class="list">
    <h1>キャラクター一覧</h1>
    <table class="coc_list">
        <thead class="thead-light">
            <tr>
                <th>名前</th>
                <th>職業</th>
                <th>年齢</th>
            </tr>
        </thead>
    </table>
</div>
@endsection