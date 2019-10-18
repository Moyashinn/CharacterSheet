<script type="text/javascript">
(function($){
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
            }
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
    });
  })(window.jQuery);
(function($){
    $(function(){
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
                console.log(data.str);
                console.log(data.jsp);
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
})(window.jQuery);
</script>
