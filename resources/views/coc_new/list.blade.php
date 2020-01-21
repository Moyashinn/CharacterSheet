@extends('layouts.app')
@section('content')
<div class = "container">
        <div class = "row justify-content-center">
                <div class = "row align-items-start">
                        <h2>キャラクター一覧</h2>
                </div>
        </div>
        <div = "row justify-content-center">
                <div = "col-md-8">
                        <table class="table table-bordered">
                                <tr>
                                        <th>名前</th>
                                        <th>職業</th>
                                        <th>削除</th>
                                </tr>
                                <tr>
                                        <td><a href="#">大谷　まどか</a></td>
                                        <td>探偵</td>
                                        <td><button type="button">削除</button></td>
                                </tr>
                                <tr>
                                        <td><a href="#">飯田　徹</a></td>
                                        <td>警察</td>
                                        <td><button type="button">削除</button></td>
                                </tr>
                        </table>
                </div>
        </div>
</div>

@endsection
