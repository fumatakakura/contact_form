
<?php
// 目的：画面にお問い合わせの一覧を出す
// [プロセス]
// 1. 必要な部品を読み込む(functions.php, dbconnect.php)
// 2. 画面に出力するものを取得する(SELECT文)
// 3. 取得したデータを画面に表示

// 必要な部品を読み込む
require_once('functions.php');
require_once('dbconnect.php');

//  画面に出力するものを取得する
// SELECT文の準備
$stmt = $dbh->prepare('SELECT * FROM surveys');
// 準備したものを実行
$stmt->execute();

// 取得した一覧を変数に格納
$results = $stmt->fetchAll();

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ一覧</title>
</head>
<body>
    <h1>一覧</h1>
<?php foreach ($results as $result) {?>
        <p>名前：<?php echo $result['username'];?></p>
        <p>メールアドレス：<?php echo $result['email'];?></p>
        <p>内容：<?php echo $result['content'];?></p>

  <hr>

<?php }?>

</body>
</html>