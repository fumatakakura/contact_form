<?php

//このページが表示された時の送信方法(GET or POST)の確認
//GET送信の場合は、入力画面に遷移する


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // このページを表示する際の送信がGETの場合
  // index.htmlに遷移する
  header('Location: index.html');
}

// $function.phpを読み込んで
//定義した関数を使えるようにする
require_once('functions.php');



//スーパーグローバル変数
//phpがもともと用意している変数


//送信されてきた値の取得
//エスケープ処理をして
//XSSの対策をとる

//エスケープ処理:htmlspecialchars
// htmlspecialchars(対象の文字,オプション,文字コード)
$username = h($_POST['username']);
$email = h($_POST['email']);
$content = h($_POST['content']);

// ユーザー名が空かチェック

if($username == ''){
    $usernameResult = 'ユーザー名が入力されていません';
} else{
    $usernameResult = $username;
}
if($email == ''){
    $emailResult = 'メールアドレスが入力されていません';
} else{
    $emailResult = $email;
}
if($content == ''){
    $contentResult = 'コンテンツが入力されていません';
} else{
    $contentResult = $content;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>入力内容確認</title>
</head>
<body>
     <h1>入力内容確認</h1>

     <p>名前:<?php echo $usernameResult;?></p>
     <p>メールアドレス:<?php echo $emailResult;?></p>
     <p>お問い合わせ内容:<?php echo $contentResult;?></p>

     <form action="thanks.php" method="POST">
        <input type="hidden" name="username" value= <?php echo $username?> >
        <input type="hidden" name="email" value= <?php echo $email?> >
        <input type="hidden" name="content" value= <?php echo $content?> >
         <button type="button" onclick ="history.back();">戻る</button>
         <input type="submit" value="OK">
     </form>
</body>
</html>