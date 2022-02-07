<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>form</title>
</head>
<body>
  <h2>フォーム</h2>
  <form action="index.php" method="POST"></form>
    <p><label for="title-id">タイトル：</label></p>
    <input type="text" name="title" id="title-id">
    <p><label for="body-id">本文：</label></p>
    <textarea name="body" id="body-id"></textarea>
    <input type="submit" value="送信">
</body>
</html>