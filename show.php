<?php

  $id = $_GET['id'];
  // 値の判定をして、空の値や不正な値への処理を追加
  if(empty($id)){
    exit('IDが不正です。');
  }

  function dbConnect(){
    // db接続にDSN（data source name）ユーザー、パスワードを定義
    $dsn = 'mysql:host=localhost;dbname=recipes;charset=utf8';
    $user = 'recipes_user';
    $pass = 'Recipes1234';

    // 接続に成功した場合
    try{
      $dbh = new PDO($dsn,$user,$pass,[
        // 例外を出力
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        // デフォルトではtrueになっており、プレースホルダを使用する場合はfalseに
        PDO::ATTR_EMULATE_PREPARES => false,
      ]);
    // 接続に失敗した場合
    } catch(PDOException $e) {
      echo '接続失敗'. $e->getMessage();
      exit();
    };
    // 関数実行
    return $dbh;
  }

  $dbh = dbConnect();

  // SQL準備
  $stmt = $dbh->prepare('SELECT * FROM posts Where id = :id');
    // id = （直書きしない）
  $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    // ↑↑プレースホルダで後から定義
  // SQL実行
  $stmt->execute();
    // ↑↑prepare statementを実行するとき
  // 結果を取得
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  // var_dump($result);

  // 値がデータベースにない場合の処理
  if(!$result){
    exit('記事がありません。');
  }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>詳細画面</title>
</head>
<body>
  <h2>詳細画面</h2>
  <h3>タイトル：</h3>
  <p>投稿日時：</p>
  <p>カテゴリー：</p>
  <hr>
  <p></p>
</body>
</html>