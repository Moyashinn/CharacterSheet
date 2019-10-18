@extends('layouts.app')
@section('content')
@include('scripts.job_script')
<script type="text/javascript"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="character_body">
              <div class="title">クトゥルフ神話キャラクターシート(2015対応)</div>
              <div class="job_title">
                <details>
                  <summary>職業</summary>
                  <div class="character_profession">
                    {{Form::select('profession',$profession_value, null, ['class' => 'profession', 'placeholder' => '職種'])}}
                    <div class="character_job">
                      {{Form::select('job', [], null,['class' => 'job', 'placeholder' => '職業'])}}
                    </div>
                  </div>
                </details>
              </div>
                <div class="character_parameter">
                    <details>
                  <summary>能力値</summary>
                  <table class="table table-bordered">
                    <tr>
                        <th>名称</th>
                        <th>STR</th>
                        <th>CON</th>
                        <th>SIZ</th>
                        <th>DEX</th>
                        <th>APP</th>
                        <th>INT</th>
                        <th>POW</th>
                        <th>EDU</th>
                        <th>HP</th>
                        <th>MP</th>
                        <th>最大SAN</th>
                        <th>アイデア</th>
                        <th>幸運</th>
                        <th>知識</th>
                    </tr>
                    <tr>
                        <th>基本能力値</th>
                        <th>    {{Form::select('STR', [0, 3 => 3, 4, 5, 6, 7, 8, 9, 10, 11, 12], null, ['class' => 'parameter', 'id' => 'str'])}}
                        </th>
                        <th>
                            {{Form::select('CON', [0, 3 => 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18], null, ['class' => 'parameter','id' => 'con'])}}
                        </th>
                        <th>
                        {{Form::select('SIZ', [0, 3 => 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18], null, ['class' => 'parameter', 'id' => 'siz'])}}
                        </th>
                        <th>
                        {{Form::select('DEX', [0, 8 => 8 ,9 ,10 ,11 ,12 ,13 ,14 ,15 ,16 ,17 ,18], null, ['class' => 'parameter', 'id' => 'dex'])}}
                        </th>
                        <th>
                        {{Form::select('APP', [0, 3 => 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18], null, ['class' => 'parameter', 'id' => 'app'])}}
                        </th>
                        <th>
                        {{Form::select('INT', [0, 8 => 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18], null, ['class' => 'parameter', 'id' => 'int'])}}
                        </th>
                        <th>
                        {{Form::select('POW', [0, 3 => 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18], null, ['class' => 'parameter', 'id' => 'pow'])}}
                        </th>
                        <th>
                        {{Form::select('EDU', [0, 6 => 6, 7, 8, 9, 10, 11, 12, 13 ,14, 15, 16, 17, 18, 19, 20, 21], null, ['class' => 'parameter', 'id' => 'edu'])}}
                        </th>
                        <th id = hp>0</th>
                        <th id = mp>0</th>
                        <th id = max_san>0</th>
                        <th id = idea>0</th>
                        <th id = luck>0</th>
                        <th id = intial>0</th>
                    </tr>
                  </table>
                </details>
                </div>
                <div class="character_skill">
                    <div class="skill_point">
                        <details>
                            <summary>スキル</summary>
                            <table class="skill_point table-bordered">
                                <tr>
                                    <th>職業ポイント</th>
                                    <th>趣味ポイント</th>
                                </tr>
                                <tr>
                                    <th id="jsp">0</th>
                                    <th id="hsp">0</th>
                                </tr>
                            </table>
                        </details>
                    </div>
                </div>
                <div class="character_item">
                    <details>
                        <summary>所持品</summary>
                        <table class="item table-bordered">
                            <tr>
                                <th class="name">名称</th>
                                <th class="unitprice">単価</th>
                                <th class="quantity">数量</th>
                                <th class="price">総計</th>
                                <th class="info">説明</th>
                            </tr>
                        </table>
                    </details>
                </div>
                <div class="character_artifact">
                    <details>
                        <summary>アーティファクト</summary>
                    </details>
                </div>
                <div class="character_mafgic">
                    <details>
                        <summary>アーティファクト</summary>
                    </details>
                </div>
                <div class="character_artifact">
                    <details>
                        <summary>アーティファクト</summary>
                    </details>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
