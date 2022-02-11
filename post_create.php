<?php

$post = $_POST;

if (empty($post['title'])){
  exit('タイトルを入力してください');
}

if (mb_strlen($post['title']) > 191){
  exit('191文字以下で入力してください');
}

if (empty($post['body'])){
  exit('本文を入力してください');
}

?>