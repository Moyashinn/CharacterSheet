$(function(){ 
	$('.parameter, .profile, .skill').on('change', function(){
		//パラメーター計算
		var parameter_id = [
			'STR',
			'CON',
			'SIZ',
			'DEX',
			'APP',
			'POW',
			'INT',
			'EDU',
			'LUCK',
		];
		parameter = [];
		$.each(parameter_id, function(k,v){
			var para_tmp = Number($('#' + v).val());
			if(v == 'EDU' || v == 'INT' || v == 'SIZ'){
				para_tmp += 6;
			}
			para_tmp *= 5;
			if(v !== 'LUCK'){
				var add_para = Number($('#temp_' + v).val());
				var another_para = Number($('#another_' + v).val());
			}
			if($('#add_' + v).val() === 0){ 
			}else{
				para_tmp += add_para;
			}
			if($('#another_' + v).val() === 0){
			}else{
			para_tmp += another_para;
			}
			if($('#age').val() == ''){
				parameter[k] = para_tmp;
				out_para(para_tmp, v);
			}else{
				var age = $('#age').val();
				if(age => 15 && age <= 19){
					if(v === 'STR' || v === 'CON' || v === 'EDU'){
						para_tmp -= 5;
					}
					parameter[k] = para_tmp;
					out_para(para_tmp, v);
				}else if(age => 20 && age <= 39){
					if(v === 'APP'){
						parameter[k] = para_tmp;
						para_tmp -= 5;
					}
					out_para(para_tmp, v);
				}else if(age => 40 && age <= 49){
					if(v === 'APP'){
						para_tmp -= 5;
					}
					out_para(para_tmp, v);
				}else if(age => 50 && age <= 59){
					if(v === 'APP'){
						para_tmp -= 10;
					}
					out_para(para_tmp, v);
				}else if(age => 60 && age <= 69){
					if(v === 'APP'){
						para_tmp -= 15;
					}
					out_para(para_tmp, v);
				}else if(age => 70 && age <= 79){
					if(v === 'APP'){
						para_tmp -= 20;
					}
					out_para(para_tmp, v);
				}else if(age => 80 && age <= 89){
					if(v === 'APP'){
						para_tmp -= 25;
					}
					out_para(para_tmp, v);
				}
			}
		});
		hp = parameter[1] + parameter[2];
		hp = Math.ceil(hp / 10);
		($('#hp').html(hp));
		mp = Math.ceil(parameter[5] / 5);
		($('#mp').html(mp));
		db = parameter[0] + parameter[2];
		if(db >= 2 && db <= 64){
			dabo = '-2';
			build = '-2';
			($('#dabo').html(dabo));
			($('#build').html(build));
		}else if(db >= 65 && db <= 84){
			dabo = '-1';
			build = '-1';
			($('#dabo').html(dabo));
			($('#build').html(build));
		}else if(db >= 85 && db <= 124){
			dabo = '0';
			build = '0';
			($('#dabo').html(dabo));
			($('#build').html(build));
		}else if(db >= 125 && db <= 164){
			dabo = '1D4';
			build = '1';
			($('#dabo').html(dabo));
			($('#build').html(build));
		}else if(db >= 165 && db <= 204){
			dabo = '1D6';
			build = '2';
			($('#dabo').html(dabo));
			($('#build').html(build));
		}else if(db >= 205 && db <= 284){
			dabo = '2D6';
			build = '3';
			($('#dabo').html(dabo));
			($('#build').html(build));
		}
		//sun = parameter[5];
		if(parameter[0] < parameter[2] && parameter[3] < parameter[2]){
			mov = 7;
		}else if(parameter[0] > parameter[2] || parameter[3] > parameter[2] ||
		parameter[0] == parameter[2] && parameter[3] == parameter[2]){
			mov = 8;
		}else{
			mov = 9;
		}
		if(age=>80){
			mov -= 5;
		}else if(age => 70){
			mov -= 4;
		}else if(age => 60){
			mov -= 3;
		}else if(age => 50){
			mov -= 2;
		}else if(age => 40){
			mov -= 1;
		}else{
		}
		var skill_math = $('.skill_pull option:selected').text();
		if(skill_math === '選択してください'){
		}else{
			var skill_math_tmp = skill_math.split('+');
			$.each(skill_math_tmp, function(k, v){
				v_tmp = v.split('*');
				
				if(v_tmp[0] == 'EDU' || v_tmp[0] == 'SIZ'){
					skill_math_tmp[k] = Number($('#' + v_tmp[0]).val()) + 6;
					skill_math_tmp[k] *= 5;
					skill_math_tmp[k] *= Number(v_tmp[1]);
				}else{
					skill_math_tmp[k] = Number($('#' + v_tmp[0]).val()) * 5;
					skill_math_tmp[k] *= Number(v_tmp[1]);
				}
			});
			var skill_point = skill_math_tmp.reduce(function(p, c){
				return p + c;
			});
			($('#job_point').html(skill_point));
		}
			var hobby_point = Number($('#INT').val()) + 6;
			hobby_point *= 5;
			hobby_point *= 2;
			($('#hobby_point').html(hobby_point));
	});
	//スキルポイントの計算
	$('.skill').on('change', function(){
		sum_skill = [0,0];
		$('td[id^="skill_intial_"]').each(function(k, v){
			var skill_id = k + 1;
			var skill_value = Number($('#job_value_input_' + skill_id).val()) + Number($('#hobby_value_input_' + skill_id).val());
			skill_value += Number($('#skill_value_another_' + skill_id).val());
			skill_value += Number($('#skill_intial_' + skill_id).val());
			
			if(skill_value !== 0){
				var skill_reg = skill_value;
				var skill_hard = Math.floor(difficulty(skill_value, 'hard'));
				var skill_ex = Math.floor(difficulty(skill_value, 'extream'));
				($('#skill_value_select_' +skill_id + '_reg').html(skill_reg));
				($('#skill_value_select_' +skill_id + '_hard').html(skill_hard));
				($('#skill_value_select_' +skill_id + '_ex').html(skill_ex));
			}else{
				($('#skill_value_select_' +skill_id + '_reg').html(0));
				($('#skill_value_select_' +skill_id + '_hard').html(0));
				($('#skill_value_select_' +skill_id + '_ex').html(0));
			}
			sum_skill[0] += Number($('#job_value_input_' + skill_id).val());
			sum_skill[1] += Number($('#hobby_value_input_' + skill_id).val());
		});
		($('#job_cons').html(sum_skill[0]));
		($('#hobby_cons').html(sum_skill[1]));
		/*if(Number($('#job_point').text()) < sum_skill[0] || Number($('#hobby_point').text()) < sum_skill[1] ){
			alert('技能値がオーバーしてます');
		}*/
	});
	$('.skill').on('click', '.add_skill', function(){
		if($('tr[id^="skill_custom_id_"]').length){
			var id = $('tr[id^=skill_custom_id_]:last').attr('id');
			id = get_id(id);
			$(this).closest('tr').prev().after('<tr id="'+id+'"><td><input type="text"></td><td>1</td><td><input type="number" class="add"></td><td><input type="number" class="another"></td><td><buton type="button" id="drop_button">スキル削除</buton></td></tr>');
		}
		else{
			$(this).closest('tr').prev().after('<tr id="skill_custom_id_1"><td><input type="text"></td><td>1</td><td><input type="number" class="add"></td><td><input type="number" class="another"></td><td><buton type="button" id="drop_button">スキル削除</buton></td></tr>');
		}
	});
	$('.skill, .item, .wepon, .artifact, .magic').on('click', '#drop_button', function(){
		$(this).closest('tr').remove();
	});
	$(".item").on('click', '#add_item', function(){
		var id = $('tr[id^=item_id_]:last').attr('id');
		id = get_id(id);
		$(this).closest('tr').prev().after('<tr><td><input type="text"</td><td><input type="number"></td><td><button type="button" id="drop_button">削除	</button></td></tr>');
	});
	$('.wepon').on('click', '#add_wepon', function(){
		var id = $('tr[id^=wepon_id_]:last').attr('id');
		id = get_id(id);
		$(this).closest('tr').prev().after('<tr id="'+id+'"><td><input type="text"></td><td><input type="number>"</td><td>0</td><td>0</td><td><input type="number"</td><td><input type="number"</td><td><input type="number"</td><td><input type="number"</td><td><input type="number"</td><td><button type="button" id="drop_button">削除</button></td></tr>');
	});
	$('.artifact').on('click', '#add_artifact', function(){
		var id = $('tr[id^=artifact_id_]:last').attr('id');
		id = get_id(id);
		$(this).closest('tr').prev().after('<tr id="'+id+'"><td><input type="text"</td><td>    <input type="text"></td><td><button type="button" id="drop_button">削除 </button></td></tr>');
	});
	$('.magic').on('click', '#add_magic', function(){
		var id = $('tr[id^=magic_id_]:last').attr('id');
		id = get_id(id);
		$(this).closest('tr').prev().after('<tr id="'+id+'"><td><input type="text"</td><td><input type="number"></td><td><input type="text"></td><td><button type="button" id="drop_button">削除 </button></td></tr>')
	});
	$('.sidebar').on('click', '#coc_save', function(){
		var data = {
			"parameter":{"para":{}, "temp":{}, "another":{}},
			"skill":{"job":{}, "hobby":{}, "another":{}},
			"item":{"name":{}, "seq":{}},
			"wepon":{"name":{}, "reg":{}, "damage":{},"lenge":{}, "number":{}, "capacity":{}, "malf":{}},
			"artifact":{"name":{}, "info":{}},
			"magic":{"name":{}. "MP":{}, "info"{}},
			"profile":{"name":{}, "job":{}, "sex":{}, "age":{}, "info":{}},
		}
	});
	function get_id(id){
		id_ar = id.split('_');
		id_last = id_ar[id_ar.length - 1]++;
		id = id_ar.join('_');
		return id;
	}
	function out_para(para_tmp, v){
		var para_hard = Math.floor(difficulty(para_tmp, 'hard'));
		var para_ex = Math.floor(difficulty(para_tmp, 'extream'));
		var para_reg_id = '#' + v + '_reg';
		var para_hard_id = '#' + v + '_hard';
		var para_ex_id = '#' + v + '_ex';
		($(para_reg_id).html(para_tmp));
		($(para_hard_id).html(para_hard));
		($(para_ex_id).html(para_ex));	
	}
	function difficulty(data, dif){
		switch(dif){
			case 'hard':
				data /= 2;
				return data;
				break;
			case 'extream':
				data /= 5;
				return data;
				break;
			default:
				break;
		}
	}
});	
