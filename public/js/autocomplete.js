"use strict";
$(function () {
    // 検索ボックスを入力した時に
    $("#items_name").on("keyup", function () {
      const token = $("input[name=_token]")[0].value;
      $.ajax({
        url: "http://127.0.0.1:8000/showIndex",
        type: "POST",
        dataType: "json",
        data: {
          items: $("#items_name").val(),//ここが謎
          '_token':token,
        },
        async: true,//非同期処理
      })
        .done(function (data) {
          // let names = "[";
          // let itemArr = [];

          // for(let i = 0; i < data.length; i++){
          //   let item = data[i];
          //   itemArr.push[item.item_name];

          //   if(i == data.length -1){
          //     names =  names +"\""+ item.item_name +"\"";
          //   }else{
          //     names =  names +"\""+ item.item_name +"\"" + ",";
          //   }
          // }
          // names = names + "]";

          jQuery('#items_name').autocomplete({
            source: ["ジョン","ポチ","タロウ","トム","ブラウン","コタロウ","クロ","デップ","スー","デルタ"],
            autoFocus: true,
            delay: 300,
            minLength: 1
          });
          // レスポンスデータがdataに入る
          // 検索成功時にはページに結果を反映
          // コンソールに取得データを表示
          // console.log(data);
          // console.dir(JSON.stringify(data));
          // $("#items_name").val(data.);
          //箱を表示させるdiv display
          //候補を表示させる
          //候補がクリックされたときテキストボックスに文字列を入れる

        })
        .fail(function (XMLHttpRequest, textStatus, errorThrown) {
          // 検索失敗時には、その旨をダイアログ表示
          // alert("正しい結果を得られませんでした。");
          console.log("XMLHttpRequest : " + XMLHttpRequest.status);
          console.log("textStatus     : " + textStatus);
          console.log("errorThrown    : " + errorThrown.message);
        });
    });

    $("#items_name").on("click", function () {
      
    });
  });