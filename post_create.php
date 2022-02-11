<?php

// 処理を一度だけ行う
require_once('dbc.php');

$post = $_POST;

// バリデーション
if (empty($post['title'])){
  exit('タイトルを入力してください');
}

// 文字の長さを得る
if (mb_strlen($post['title']) > 191){
  exit('191文字以下で入力してください');
}

if (empty($post['body'])){
  exit('本文を入力してください');
}

// データベースへデータ登録
$sql = 'INSERT INTO
          post(user_id, category_id, post_tag_id, title, body, post_status)
        VALUES
          (:user_id, :category_id, :post_tag_id, :title, :body, :post_status)';

// データベース接続
$dbh = dbConnect();
$dbh->beginTransaction();
try{
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue('user_id',$post['user_id'], PDO::PARAM_INT);
    $stmt->bindValue('category_id',$post['category_id'], PDO::PARAM_INT);
    $stmt->bindValue('post_tag_id',$post['post_tag_id'], PDO::PARAM_INT);
    $stmt->bindValue('title',$post['title'], PDO::PARAM_STR);
    $stmt->bindValue('body',$post['body'], PDO::PARAM_STR);
    $stmt->bindValue('post_status',$post['post_status'], PDO::PARAM_INT);
    $stmt->execute();
    $dbh->commit();
    echo '投稿が完了しました。';
} catch(PDOException $e){
    $dbh->rollBack();
    exit($e);
};


?>