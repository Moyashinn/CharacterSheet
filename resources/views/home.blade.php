@extends('layouts.app')
@section('content')
<script type="text/javascript"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="character_body">
              <div class="title">�N�g�D���t�_�b�L�����N�^�[�V�[�g(2015�Ή�)</div>
              <div class="job_title">
                <details>
                  <summary>�E��</summary>
                  <div class="character_profession">
                    {{Form::select('profession',$profession_value, null, ['class' => 'profession', 'placeholder' => '�E��'])}}
                    <div class="character_job">
                      {{Form::select('job', [], null,['class' => 'job', 'placeholder' => '�E��'])}}<br>
                    </div>
                  </div>
                </details>
              </div>
                <div class="character_parameter">
                    <details>
                  <summary>�\�͒l</summary>
                  <table class="table table-bordered">
                    <tr>
                        <th>����</th>
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
                        <th>�ő�SAN</th>
                        <th>�A�C�f�A</th>
                        <th>�K�^</th>
                        <th>�m��</th>
                    </tr>
                    <tr>
                        <th>��{�\�͒l</th>
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
                            <summary>�X�L��</summary>
                            <table class="skill_point table-bordered">
                                <tr>
                                    <th>�E�ƃ|�C���g</th>
                                    <th>��|�C���g</th>
                                </tr>
                                <tr>
                                    <th id="jsp">0</th>
                                    <th id="hsp">0</th>
                                </tr>
                            </table >
								�X�L���U�蕪��<br>
							<table class='table-bordered'>
								@foreach($skill_type_value as $k=>$v)
									<tr>
										<th class='skill_type' colspan=4 align='center';>
											{{$v}}
										</th>
									</tr>
									<tr>
										<th>
											���O
										</th>
										<th>
											�����l
										</th>
										<th>
											�E��
										</th>
										<th>
											�
										</th>
									@foreach($skill_value as $key=>$val)
										@if($k === $val->skill_type_id)
											<tr class='skill_value'>
												<td>
													{{$val->skill_name}}
													@if($val->skill_input_flg == 1)
														<input type='text'>
													@endif
												</td>
												<td id='skill_{{$val->skill_id}}'>
													{{$val->skill_value}}
												</td>
												<td>
													<input type='number'>
												</td>
												<td>
													<input type='number'>
												</td>
											</tr>
										@endif
									@endforeach
								@endforeach
							</table>
								
                        </details>
                    </div>
                </div>
                <div class="character_item">
                    <details>
                        <summary>�����i</summary>
                        <table class="item table-bordered">
                            <tr>
                                <th class="name">����</th>
                                <th class="unitprice">�P��</th>
                                <th class="quantity">����</th>
                                <th class="price">���v</th>
                                <th class="info">����</th>
                            </tr>
                        </table>
                    </details>
                </div>
                <div class="character_artifact">
                    <details>
                        <summary>�A�[�e�B�t�@�N�g</summary>
                    </details>
                </div>
                <div class="character_mafgic">
                    <details>
                        <summary>�A�[�e�B�t�@�N�g</summary>
                    </details>
                </div>
                <div class="character_artifact">
                    <details>
                        <summary>�A�[�e�B�t�@�N�g</summary>
                    </details>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
