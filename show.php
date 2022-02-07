<?php

require_once('dbc.php');

$result = getPost($_GET['id']);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>詳細画面</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>
<body>
  <header>
    <?php include('navbar.php'); ?>
  </header>
  <h2>詳細画面</h2>
  <p>タイトル：</p>
  <p>投稿日時：</p>
  <p>カテゴリー：</p>
  <hr>
  <p></p>
</body>
</html>