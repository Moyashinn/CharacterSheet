	$(function(){
		$('.parameter').on('change',  function(){
			//パラメータの合計を出す
			var parameter =[
				Number($('#str').val()),
				Number($('#con').val()),
				Number($('#siz').val()),
				Number($('#dex').val()),
				Number($('#app').val()),
				Number($('#int').val()),
				Number($('#pow').val()),
				Number($('#edu').val()),
			];
			var parameter_tmp=[
				Number($('#str_tmp').val()),
				Number($('#con_tmp').val()),
				Number($('#siz_tmp').val()),
				Number($('#dex_tmp').val()),
				Number($('#app_tmp').val()),
				Number($('#int_tmp').val()),
				Number($('#pow_tmp').val()),
				Number($('#edu_tmp').val()),
			];
			var parameter_enta=[
				Number($('#str_enta').val()),
				Number($('#con_enta').val()),
				Number($('#siz_enta').val()),
				Number($('#dex_enta').val()),
				Number($('#app_enta').val()),
				Number($('#int_enta').val()),
				Number($('#pow_enta').val()),
				Number($('#edu_enta').val()),
			];
			$.each(parameter, function(k, v){
				parameter[k] += parameter_tmp[k];
				parameter[k] += parameter_enta[k];
			})
			//パラメータが変更されたら、スキルの回避と母国語の初期値を変更する
			var avoid = ($('#dex').val());
			var lang = ($('#edu').val());
			avoid *= 2;
			lang *= 5;

			//変更した内容を出力する
			($('#str_sum').html(parameter[0]));
			($('#con_sum').html(parameter[1]));
			($('#siz_sum').html(parameter[2]));
			($('#dex_sum').html(parameter[3]));
			($('#app_sum').html(parameter[4]));
			($('#int_sum').html(parameter[5]));
			($('#pow_sum').html(parameter[6]));
			($('#edu_sum').html(parameter[7]));
			($('#skill_1').html(avoid));		
			($('#skill_34').html(lang));		
		});
		//スキルポイントを割り振ったら、合計に加算する
		//持ってるスキルポイントを超過したらエラーっぽい処理をする
		$('.skill_value').on('change', function(){
			$('.skill_value').each(function(){
				
			}			
		});
	});
	//ここから下はajax通信
    $(function(){
      //セレクトが変更されたら実行
        $('.profession').on('change', function () {
            var profession_val = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/job",
                type: "POST",
                data: {
                    profession_id: profession_val
           		 },
        	})
            //リクエスト成功時の処理
            .done(function (data) {
                //職業プルダウンの表示が職種プルダウンの結果によって変わる
                $('.job option').remove();
                $.each(data, function (job_id, job) {
                    $('.job').append($('<option>').val(job.job_id).text(job.job));
                });
            })
            //リクエスト失敗時の処理
            .fail(function (jqXHR, textStatus, errorThrown) {
                //ログに残す（でバック用）
                alert('ファイルの取得に失敗しました。');
                console.log("ajax通信に失敗しました");
                console.log("jqXHR          : " + jqXHR.status); // HTTPステータスが取得
                console.log("textStatus     : " + textStatus); // タイムアウト、パースエラー
                console.log("errorThrown    : " + errorThrown.message); // 例外情報
                console.log('job');
            });
        });

        $('.parameter, .job, .profession').on('change', function(){
            //パラメーターの情報を配列にプッシュしていく(0は計算結果に使うので初期化のみ)
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/parameter_math",
                dataType: "json",
                ContentType: 'application/json',
                type: 'POST',
                data: {
                    str:Number($('#str').val()),
                    con:Number($('#con').val()),
                    siz:Number($('#siz').val()),
                    dex:Number($('#dex').val()),
                    app:Number($('#app.parameter').val()),
                    int:Number($('#int').val()),
                    pow:Number($('#pow').val()),
                    edu:Number($('#edu').val()),
                    hp:0,
                    mp:0,
                    max_san:0,
                    idea:0,
                    luck:0,
                    intial:0,
                    job_id:$('.job').val(),
                    jsp:0,
                    hsp:0,
                },
            })
            .done(function(data, textstatus, jqXHR){
				$('#hp').html(data.hp);
                $('#mp').html(data.mp);
                $('#max_san').html(data.max_san);
                $('#idea').html(data.idea);
                $('#luck').html(data.luck);
                $('#intial').html(data.intial);
				$('#jsp').html(data.jsp);
				$('#hsp').html(data.hsp);
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                alert('ファイルの取得に失敗しました。');
                console.log("ajax通信に失敗しました");
                console.log("jqXHR          : " + jqXHR.status); // HTTPステータスが取得
                console.log("textStatus     : " + textStatus); // タイムアウト、パースエラー
                console.log("errorThrown    : " + errorThrown.message); // 例外情報
                console.log('parameter');
            });
        });
    });
