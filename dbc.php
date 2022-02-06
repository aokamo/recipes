<?php

// 関数
// 1関数1機能にする　←　可読性・テストのしやすさ

// 関数（データベース接続）
// 引数：なし
// 返り値：接続結果を返す
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
    ]);
  // 接続に失敗した場合
  } catch(PDOException $e) {
    echo '接続失敗'. $e->getMessage();
    exit();
  };
  // 関数実行
  return $dbh;
}

// 関数（データ取得）
// 引数：なし
// 返り値：取得したデータ
function getAllPosts(){
  // db接続
  $dbh = dbConnect();
  // ①SQLの準備
  $sql = 'SELECT * FROM posts';
  // ②SQL実行
  $stmt = $dbh->query($sql);
  // ③SQLの結果を受け取る
  $result = $stmt->fetchall(pdo::FETCH_ASSOC);
  // var_dump($result);←取得データ確認コード
  // 関数実行
  return $result;
  // db接続終了
  $dbh = null;
}

?>