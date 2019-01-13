<?php
$keiziban = './keiziban_log.txt';
$comment = '';
$name_box = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['comment']) === TRUE) {
    $comment = $_POST['comment'];
  }

  if (isset($_POST['name_box']) === TRUE ) {
    $neme_box = $_POST['name_box'];
  }

  $log = date('y-m-d H:i:s') . $name_box . "\t" . $comment . "\n";

  if (($fp = fopen($keiziban, 'a')) !== FALSE) {
    if (fwrite ($fp, $log) === false) {
      echo 'ファイル書き込み失敗';
    }
    fclose($fp);
  }
}

$data = array();
  if(is_readable($keiziban) === TRUE) {
    if (($fp = fopen($keiziban, 'r')) !== FALSE) {
      while (($tmp = fgets($fp)) !== FALSE) {
        $data = htmlspecialchars($tmp, ENT_QUOTES, 'utf-8');
      }
      fclose($fp);
    }
  } else {
    $data[] = 'ファイルがありません';
  }
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
     <meta charset="utf-8">
     <title>form||choco練習帳</title>
     <link rel="shortcut icon" href="image/myimg/favicon-1.ico" type="image/vnd.microsoft.icon">
     <link rel="stylesheet" href="style.css/my.css" media="screen"/>

  </head>
  <body id="form">
   <div class="content">
     <header>
           <h1 id="logo"><a href="index.html">Choco*PG練習帳</a></h1>
          <div id="nav">
             <ul>
               <li><a href="index.html">TOP</a></li>
               <li><a href="zikosyoukai.html">info</a></li>
               <li><a href="sample.html">Sample</a></li>
               <a href="my-photo.html"><li>画像集＊</li></a>
               <li><a href="form.php">Contact</a></li>
             </ul>
           </div>
           <img src="image/myimg/pre_header.jpg" alt="info-header" width="1100px">
     </header>
     <div class="form">
      <section>
        <p>なにかご意見、アドバイス頂けたら幸いです。</p>
        <p>今はこちらのフォーム作成しかできませんが、環境整えて、<br/>掲示板仕様にしたいと企んでおります。
        </p>
        <p>勉強中なので、WordPressのコメントに書き込み頂けると幸いです。</p>
          <h2><a href="https://chocomaron1206.com/">WordPress<br/><span>◆https://chocomaron1206.com/◆</span></a></h2><br/>
        <form method="POST" >
          <label>お名前（ハンドルネーム）：<input type="text" id="name_box" name="name_box" ></label><br/>
          <label>男性<input type="radio" name="gender" id="gender" value="男">
            女性<input type="radio" name="gender" id="gender" value="女"></label><br/>

            <label>ご年齢：<select name="age" id="age">
              <option value="10代">10代</option>
              <option value="秘密">秘密</option>
              <option value="20代前半">20代前半</option>
              <option value="20代後半">20代後半</option>
                <option value="30代前半">30代前半</option>
              <option value="30代後半">30代後半</option>
              <option value="40代前半">40代前半</option>
              <option value="40代後半以上">40代後半以上</option>
            </select><br/>
              <label>ご意見・アドバイスなど：<br/>

            <textarea name="comment" id="comment" value=""rows="8" cols="50"><?php echo $data; ?>
                </textarea>
                <br/>
                <input type="submit" name="btn" value="送信する" id="btn">
        </form>
      </section>


     </div>
    <footer>
      <small>Copy 2019-choco練習帳*</small>
    </footer>
    </div>
    <script>
        (function() {
          "use strict";

          var btn = document.getElementById('btn');
          // var name_box = document.getElementById('name_box');
          // var comment = document.getElementById('comment');



          btn.addEventListener('click', function() {
                  confirm('コメントを投稿してよろしいですか？');
          });

        })();
    </script>
  </body>
</html>
