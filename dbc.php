<?php

$dsn = 'mysql:host=localhost;dbname=recipes;charset=utf8';
$user = 'recipes_user';
$pass = 'Recipes1234';

try{
    $dbh = new PDO($dsn,$user,$pass,[
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    // echo '接続成功';
    // ①SQLの準備
    $sql = 'SELECT * FROM posts';
    // ②SQL実行
    $stmt = $dbh->query($sql);
    // ③SQLの結果を受け取る
    $result = $stmt->fetchall(pdo::FETCH_ASSOC);
    // var_dump($result);←取得データ確認コード

    $dbh = null;
} catch(PDOException $e) {
    echo '接続失敗'. $e->getMessage();
    exit();
};

?>