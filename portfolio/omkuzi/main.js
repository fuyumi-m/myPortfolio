(function() {
  'use strict';  //厳密なエラーチェック

  var btn = document.getElementById('btn'); //要素の取得

  btn.addEventListener('click', function() {  //イベントの追加

   var results = ['大吉', '大吉', '凶'];//確率の変更
    // var results = ['大吉', '吉', '凶'];
    var n = Math.floor(Math.random() * results.length);
    this.textContent = results[n];

    //switch (n) {
    //  case 0:
    //   this.textContent = '大吉';
      // break;
    //  case 1:
    //   this.textContent = '吉';
    //   break;
    //  case 2:
    //   this.textContent = '凶';
    //   break;
  //  }
    // if (n === 0) {
    //this.textContent = '大吉'; //クリックで表示
  //} else if (n === 1) {
  //  this.textContent = '吉';
  //} else {
  //  this.textContent = '凶';
  //}
  });
btn.addEventListener('mousedown', function() { //マウスが押されている時だけ
  this.className = 'pushed';
  });
  btn.addEventListener('mouseup', function() { //マウスが離れたときに元の位置に
    this.className = '';
  });
})();
