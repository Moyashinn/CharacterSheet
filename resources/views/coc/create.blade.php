@extends('layouts.app')
@section('content')
<div class='container'>
	<div class='row justify-content-start'>
		<div class='row align-items-start'><h2>クトゥルフ神話キャラクターシート(2015対応)</h2></div>
		<div class='col-md-2'>
		</div>
	</div>
	<div class='row justify-content-center'>
		<div class='col-md-8'>
			<div class='coc_form'>
				<form action="{{url('/save')}}" method='post'>
					@csrf
					<div class='coc_job'>
						<details>
							<summary>職業</summary>
							<div class='coc_profession'>
								{{Form::select('profession',$profession_value, null, ['class' => 'profession', 'placeholder' => '職種'])}}
							</div>
							<div class='coc_job'>
								{{Form::select('job', [], null,['class' => 'job', 'placeholder' => '職業'])}}
							</div>
						</details>
					</div>
					<div class='coc_parameter'>
						<details>
							<summary>パラメーター</summary>
							<div class='parameter_table'>
								<table class='table table-bordered'>
									<tr class='parameter_top'>
										<th>名称</th>
										<th>STR</th>
										<th>CON</th>
										<th>SIZ</th>
										<th>DEX</th>
										<th>APP</th>
										<th>INT</th>
										<th>POW</th>
										<th>EDU</th>
									</tr>
									<tr>
										<th>基本能力値</th>
										<th>
											{{Form::select('STR', [0, 3 => 3, 4, 5, 6, 7, 8, 9, 10, 11, 12], null, ['class' => 'parameter', 'id' => 'str'])}}
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
											{{Form::select('APP', [0, 3 => 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18],  null, ['class' => 'parameter', 'id' => 'app'])}}
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
									</tr>
									<tr>
										<th>
											<p>一時的増減</p>
										</th>
										<th>
											<input class='parameter' id='str_tmp' type='number' style='width:40px'>
										</th>	
										<th>
											<input  class='parameter' id='con_tmp' type='number' style='width:40px'>
										</th>	
										<th>
											<input class='parameter' id='siz_tmp' type='number' style='width:40px'>
										</th>	
										<th>
											<input class='parameter' id='dex_tmp' type='number' style='width:40px'>
										</th>	
										<th>
											<input class='parameter' id='app_tmp' type='number' style='width:40px'>
										</th>	
										<th>
											<input class='parameter' id='int_tmp' type='number' style='width:40px'>
										</th>	
										<th>
											<input class='parameter' id='pow_tmp' type='number' style='width:40px'>
										</th>	
										<th>
											<input class='parameter' id='edu_tmp' type='number' style='width:40px'>
										</th>	
									</tr>
									<tr>
										<th>
											<p>永久的増減</p>
										</th>
										<th>
											<input class='parameter' id='str_enta' type='number' style='width:40px'>
										</th>	
										<th>
											<input class='parameter' id='con_enta' type='number' style='width:40px'>
										</th>	
										<th>
											<input class='parameter' id='siz_enta' type='number' style='width:40px'>
										</th>	
										<th>
											<input class='parameter' id='dex_enta' type='number' style='width:40px'>
										</th>	
										<th>
											<input class='parameter' id='app_enta' type='number' style='width:40px'>
										</th>	
										<th>
											<input class='parameter' id='int_enta' type='number' style='width:40px'>
										</th>	
										<th>
											<input class='parameter' id='pow_enta' type='number' style='width:40px'>
										</th>	
										<th>
											<input class='parameter' id='edu_enta' type='number' style='width:40px'>
										</th>	
									</tr>
									<tr>
										<th>
											<p>合計能力値</p>
										</th>
										<th id='str_sum'>
											0
										</th>
										<th id='con_sum'>
											0
										</th>
										<th id='siz_sum'>
											0
										</th>
										<th id='dex_sum'>
											0
										</th>
										<th id='app_sum'>
											0
										</th>
										<th id='int_sum'>
											0
										</th>
										<th id='pow_sum'>
											0
										</th>
										<th id='edu_sum'>
											0
										</th>
									</tr>
								</table>
								<table class='math_parameter table-bordered'>
									<tr class='parameter_top'>
										<th>HP</th>
										<th>MP</th>
										<th>最大SAN</th>
										<th>アイデア</th>
										<th>幸運</th>
										<th>知識</th>
									</tr>
									<tr>
										<th id='hp'>0</th>
										<th id='mp'>0</th>
										<th id='max_san'>0</th>
										<th id='idea'>0</th>
										<th id='luck'>0</th>
										<th id='intial'>0</th>
									</tr>
								</table>
							</div>
						</details>
					</div>
					<div class='coc_skill'>
							<details>
								<summary>スキル</summary>
								<table class='skill_point table-bordered'>
									<tr>
										<th>職業ポイント</th>
										<th>趣味ポイント</th>
									</tr>
									<tr>
										<th id='jsp'>0</th>
										<th id='hsp'>0</th>
									</tr>
								</table>
								<p>スキル分け<p>
								<table class='table-bordered'>
									@foreach($skill_type_value as $k=>$v)
										<tr>
											<th class='skill_type' colspan=5 align'center'>
												{{$v}}
											</th>
										</tr>
										<tr>
											<th>
											<p>名前</p>
											</th>
											<th>
											<p>初期値</p>
											</th>
											<th>
											<p>職業</p>
											</th>
											<th>
											<p>趣味</p>
											</th>
											<th>
											<p>合計</p>
											</th>
										</tr>
										@foreach($skill_value as $key=>$val)
											@if($k === $val->skill_type_id)
												<tr class='skill_value'>	
													<td>
														{{$val->skill_name}}
														@if($val->skill_input_flg == 1)
															<input type='text'>
														@endif
													</td>
													<td name='1'>
														{{$val->skill_value}}
													</td>
													<td>
														<input name='2' type='number' style='width:40px'>
													</td>
													<td>
														<input name='3' type='number' style='width:40px'>
													</td>
													<td name='{{$val->skill_id}}'>0</td>
												</tr>
											@endif
										@endforeach
									@endforeach
								</table>
							</details>
						</div>
					<div class ='item'>
						<div class='item_list'>
							<details>
								<summary>アイテム</summary>
								<table class='item table-bordered'>
									<tr>
										<th>
											<p>名称</p>
										</th>
										<th>
											<p>単価</p>
										</th>
										<th>
											<p>個数</p>
										</th>
										<th>
											<p>小計</p>
										</th>
										<th>
											<p>説明</p>
										</th>
									</tr>
									<tr>
										<th>
											<input id='item_name'  type='text'>
										</th>
										<th>
											<input id='item_unit' type='number'>
										</th>
										<th>
											<input id='item_que' type='number'>
										</th>
										<th>
											<input id='item_price' type='number'>
										</th>
										<th>
											<textarea id='item_info' type='text'>
											</textarea>
										</th>
									</tr>
								</table>
							</details>
						</div>
					</div>
					<div class='artifuct'>
						<details>
							<summary>アーティファクト</summary>
							<table class='artifact table-bordered'>
								<tr>
									<th>
										名称
									</th>
									<th>
										説明・効果
									</th>
								</tr>
								<tr>
									<th>
										<input type='text'>
									</th>
									<th>
										<textarea type='text'>
										</textarea>
									</th>
								</tr>
							</table>
						</details>
					</div>
					<div class='magic'>
						<details>
							<summary>魔法</summary>
							<table class='magic table-bordered'>
								<tr>
									<th>
										<p>名前</p>
									</th>
									<th>
										<p>使用MP<p>
									</th>
									<th>
										<p>説明・効果</p>
									</th>
								</tr>
								<tr>
									<th>
										<input type='text'>
									</th>
									<th>
										<input type='number'>
									</th>
									<th>
										<textarea type='text'>
										</textarea>
									</th>
								</tr>
							</table>
						</details>
					</div>
					<div class='profile'>
						<details>
							<summary>キャラクター情報</summary>
							<table class='profile table-bordered'>
								<tr>
									<th>
										<p>名前</p>
									</th>
									<th>
										<input id='coc_name'>
									</th>
								</tr>
								<tr>
									<th>
										<p>年齢</p>
									</th>
									<th>
										<input id='coc_name'>
									</th>
								</tr>
								<tr>
									<th>
										<p>肉体的障害</p>
									</th>
									<th>
										<input id='coc_name'>
									</th>
								</tr>
								<tr>
									<th>
										<p>精神的障害</p>
									</th>
									<th>
										<input id='coc_name'>
									</th>
								</tr>
								<tr>
									<th>
										<p>ポケットマネー</p>
									</th>
									<th>
										<input id='coc_name'>
									</th>
								</tr>
								<tr>
									<th>
										<p>総資産</p>
									</th>
									<th>
										<input id='coc_name'>
									</th>
								</tr>
								<tr>
									<th>
										<p>その他の情報、設定</p>
									</th>
									<th>
										<textarea id='coc_name'>
										</textarea>
									</th>
								</tr>
							</table>
						</details>
					</div>
					<button type="button" class="save">キャラクター保存</button>
				</form>
			</div>
		</div>
	</div>
@endsection
