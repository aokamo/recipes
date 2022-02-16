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

$dbc = new Dbc();
$dbc->postCreate($post);

?>