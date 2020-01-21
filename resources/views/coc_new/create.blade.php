@extends('layouts.app')
@section('content')
<div class='container'>
	<div class='row justify-content-center'>
		<div class='row align-items-start'>
			<h2>新クトゥルフ神話キャラクターシート</h2>
		</div>
	</div>
	<div class='row justify-content-left'>
		<div class="col-md-1">
			<div class="card">
				<div class='sidebar'>
					<div class="card-header">
						その他の操作
					</div>
					<div class="card-body">
						<p class="card-text">キャラクター情報を保存する</p>
						<button type="submit" id="coc_save">保存</button>
						<a href="#top" class="card-link">トップへ↑</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class='row justify-content-center'>
		<div class='col-md-8'>
			<div class='coc_form'>
				<div class='parameter'>
					<details open>
						<summary>パラメーター</summary>
						<div class="parameter_table">
							<table class="table table-bordered">
								<tr>
									<th>名前</th>
									@foreach ($parameter_k as $k)
										<th>{{$k}}</th>
									@endforeach
									<th>幸運</th>
								</tr>
								<tr>
									<th>基礎データ</th>
									@foreach($parameter_k as $k)
										<td>
										@if($k === "SIZ" || $k === "INT" || $k === "EDU")
										{{Form::select('parameter',$parameter_2d6, null,['class' => 'parameter', 'id' => $k, 'placeholder' => 0])}}
										@else
										
										{{Form::select('parameter',$parameter_3d6, null,['class' => 'parameter', 'id' => $k, 'placeholder' => 0])}}
										@endif
										</td>
									@endforeach
									<td>{{Form::select('luck', $parameter_3d6, null,['class' => 'luck', 'id' => 'LUCK', 'placeholder' => 0])}}</td>
								</tr>
								<tr>
									<th>一時増減値</th>
									@foreach($parameter_k as $k)
									<td><input type='number' id='temp_{{$k}}' class='add'></td>
									@endforeach
									<td>&nbsp</td>
								</tr>
								<tr>
									<th>永久増減値</th>
									@foreach($parameter_k as $k)
									<td><input type='number' id='another_{{$k}}' class='another'></td>
									@endforeach
									<td>&nbsp</td>
								</tr>
								<tr>
									<th>レギュラー</th>
									@foreach($parameter_k as $k)
									<td id="{{$k}}_reg">0</td>
									@endforeach
									<td id="LUCK_reg">0</td>
								</tr>
								<tr>
									<th>ハード</th>
									@foreach($parameter_k as $k)
									<td id="{{$k}}_hard">0</td>
									@endforeach
									<td id="LUCK_hard">0</td>
								</tr>
								<tr>
									<th>エクストリーム</th>
									@foreach($parameter_k as $k)
									<td id="{{$k}}_ex">0</td>
									@endforeach
									<td id="LUCK_ex">0</td>
								</tr>
							</table>
							<p>※年齢による任意減少は永久増減値に記入してください。</p>
						</div>
						<table class="table table-bordered">
							<tr>
								<th>HP</th>
								<th>MP</th>
								<th>移動率</th>
								<th>初期SAN</th>
							</tr>
							<tr>
								<td id='hp'>0</td>
								<td id='mp'>0</td>
								<td id='mov'>8</td>
								<td id='intial_san'>0</td>
							</tr>
						</table>
						<table class="table table-bordered">
							<th>SAN</th>
							<td><input type='num' id='san'></td>
						</table>
					</details>
				</div>
				<div class="skill">
					<details open>
						{{-- ccb使わせる --}}
						<summary>技能</summary>
						<table class="table table-bordered">
							<tr>
								<th>職業ポイント計算式</th>
								<td>{{Form::select('skill_pull', $skill_math, null,['class' => 'skill_pull', 'id' => '    LUCK', 'placeholder' => '選択してください'])}}</td>
							</tr>
							<tr>
								<th>職業ポイント</th>
								<th>趣味ポイント</th>
							</tr>
							<tr>
								<td id='job_point'>0</td>
								<td id='hobby_point'>0</td>
							</tr>
							<tr>
								<th>職業消費</th>
								<th>趣味消費</th>
							</tr>
							<tr>
								<td id='job_cons'>0</td>
								<td id='hobby_cons'>0</td>
							</tr>
						</table>
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a href="#skill_v_0" class="nav-link active" data-toggle="tab">入力</a>
							</li>
							<li>
								<a href="#skill_v_1" class="nav-link" data-toggle="tab">レギュラー</a>
							</li>
							<li>
								<a href="#skill_v_2" class="nav-link" data-toggle="tab">ハード</a>
							</li>
							<li>
								<a href="#skill_v_3" class="nav-link" data-toggle="tab">エクストリーム</a>
							</li>
						</ul>
						<div class="tab-content">
							<div id="skill_v_0" class="tab-pane active">
								@foreach($skill_type_value as $key => $value)
									<details open>
										<summary>{{$value}}</summary>
										<table class="table table-bordered" id ="skill_{{$key}}">
											<tr>
												<th>名称</th>
												<th>初期値</th>
												<th>職業技能値</th>
												<th>趣味技能値</th>
												<th>成長値他</th>
												<th>スキル削除ボタン</th>
											</tr>
											@foreach($skill_value as $k => $v)
												@if($key === $v->skill_type_id)
													<tr id="skill_id_{{$v->skill_id}}">
														<td>
															{{$v->skill_name}}
															@if($v->skill_input_flg == 1)
																<input type = 'text'>
															@endif
														</td>
														<td id='skill_intial_{{$v->skill_id}}'>
															{{$v->skill_value}}
														</td>
														<td id='skill_value_{{$v->skill_id}}'>
															<input type="number" id="job_value_input_{{$v->skill_id}}" class="add">
														</td>
														<td>
															<input type="number" id="hobby_value_input_{{$v->skill_id}}" class="add">
														</td>
														<td>
															<input type="number" id="skill_value_another_{{$v->skill_id}}" class="another">
														</td>
														<td>
															@if($v->skill_custom_flg === 1)
																<button type="button" id="drop_skill">スキル削除</td>
															@endif
														</td>
													</tr>
												@endif
											@endforeach
											<tr>
												<td><button class="add_skill">スキル追加</button></td>
											</tr>
										</table>
									</details>
								@endforeach
							</div>
							<div id="skill_v_1" class="tab-pane">
								@foreach($skill_type_value as $key => $value)
									<details open>
										<summary>{{$value}}</summary>
										<table class="table table-bordered">
											<tr>
												<th>名称</th>
												<th>初期値</th>
												<th>技能値</th>
											</tr>
											@foreach($skill_value as $k => $v)
												@if($key === $v->skill_type_id)
													<tr>
														<td>
															{{$v->skill_name}}
														</td>
														<td id='skill_{{$v->skill_id}}'>
															{{$v->skill_value}}
														</td>
														<td id='skill_value_select_{{$v->skill_id}}_reg'>0</td>
													</tr>
												@endif	
											@endforeach
										</table>
									</details>
								@endforeach
							</div>
							<div id="skill_v_2" class="tab-pane">
								@foreach($skill_type_value as $key => $value)
									<details open>
										<summary>{{$value}}</summary>
										<table class="table table-bordered">
											<tr>
												<th>名称</th>
												<th>初期値</th>
												<th>技能値</th>
											</tr>
											@foreach($skill_value as $k => $v)
												@if($key === $v->skill_type_id)
													<tr>
														<td>
															{{$v->skill_name}}
														</td>
														<td id='skill_{{$v->skill_id}}'>
															{{$v->skill_value}}
														</td>
														<td id='skill_value_select_{{$v->skill_id}}_hard'>0</td>
													</tr>
												@endif	
											@endforeach
										</table>
									</details>
								@endforeach
							</div>
							<div id="skill_v_3" class="tab-pane">
								@foreach($skill_type_value as $key => $value)
									<details open>
										<summary>{{$value}}</summary>
										<table class="table table-bordered">
											<tr>
												<th>名称</th>
												<th>初期値</th>
												<th>技能値</th>
											</tr>
											@foreach($skill_value as $k => $v)
												@if($key === $v->skill_type_id)
													<tr>
														<td>
															{{$v->skill_name}}
														</td>
														<td id='skill_{{$v->skill_id}}'>
															{{$v->skill_value}}
														</td>
														<td id='skill_value_select_{{$v->skill_id}}_ex'>0</td>
													</tr>
												@endif	
											@endforeach
										</table>
									</details>
								@endforeach
							</div>
						</div>
					</details>
				</div>
				<div class="item">
					<details>
						<summary>アイテム</summary>
						<table class="table table-bordered">
							<tr>
								<th>名前</th>
								<th>個数</th>
							</tr>
							<tr id="item_id_1">
								<td><input type="text"></td>
								<td><input type="number"></td>
								<td>
								</td>
							</tr>
							<tr>
								<td>
								<button type="button" id= "add_item">追加</button>
								</td>
							</tr>
						</table>
					</details>
				</div>
				<div class="wepon">
					<details>
						<summary>武器</summary>
						<table class="table table-bordered">
							<tr>
								<th>ダメージボーナス</th>
								<td id="dabo">0</td>
							</tr>
							<tr>
								<th>ビルド</th>
								<td id="build">0</td>
							</tr>
						</table>
						<table class="table table-bordered">
							<tr>
								<th>名前</th>
								<th>レギュラー</th>
								<th>ハード</th>
								<th>エクストリーム</th>
								<th>ダメージ</th>
								<th>射程</th>
								<th>攻撃回数</th>
								<th>装弾数</th>
								<th>故障</th>
							</tr>
							<tr id="wepon_id_1">
								<td><input type="text"></td>
								<td><input type="number"></td>
								<td id="wepon_hard_1">0</td>
								<td id="wepon_ex_1">0</td>
								<td><input type="number"></td>
								<td><input type="number"></td>
								<td><input type="number"></td>
								<td><input type="number"></td>
								<td><input type="number"></td>
							</tr>
							<tr>
								<td><button type="button" id="add_wepon">追加</button>
							</tr>
						</table>
					</details>
				</div>
				<div class ="artifact">
					<details>
						<summary>アーティファクト</summary>
						<table class="table table-bordered">
							<tr>
								<th>名前</th>
								<th>効果・説明</th>
							</tr>
							<tr id="artifact_id_1">
								<td><input type="text"></td>
								<td><textarea></textarea></td>
							</tr>
							<tr>
								<td><button type="button" id="add_artifact">追加</button>
							</tr>
						</table>
					</details>
				</div>
				<div class="magic">
					<details>
						<summary>呪文</summary>
							<table class="table table-bordered">
								<tr id="magic_id_1">
									<th>名前</th>
									<th>消費MPorPOW</th>
									<th>効果</th>
								</tr>
								<tr>
								<td><input type="text"></td>
								<td><input type="number"></td>
								<td><textarea></textarea></td>
								</tr>
							<tr>
								<td><button type="button" id="add_magic">追加</button>
							</tr>
							</table>
					</details>
				</div>
				<div class="profile">
					<details open>
						<summary>キャラクター情報</summary>
						<table class="table table-bordered">
							<tr>
								<th>キャラクターネーム</th>
								<td><input type="text"></td>
								<th>職業</th>
								<td><input type="text"></td>
							</tr>
							<tr>
								<th>性別</th>
								<td><input type="text"></td>
								<th>年齢</th>
								<td><input type="number" id="age"></td>
							</tr>
							<tr>
							<th>キャラクター設定</th>
							<th colspan="3"><textarea></textarea></th>
							</tr>
						</table>
					</details>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
