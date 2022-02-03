<?php
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
    // echo '接続成功';
    // ①SQLの準備
    $sql = 'SELECT * FROM posts';
    // ②SQL実行
    $stmt = $dbh->query($sql);
    // ③SQLの結果を受け取る
    $result = $stmt->fetchall(pdo::FETCH_ASSOC);
    // var_dump($result);←取得データ確認コード

    // db接続終了
    $dbh = null;

// 接続に失敗した場合
} catch(PDOException $e) {
    echo '接続失敗'. $e->getMessage();
    exit();
};

?>

<?php $info = file_get_contents("info.txt"); ?>
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recipes</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>
  <body>
    <header>
      <?php include('navbar.php'); ?>
    </header>
    <main role="main" class="container" style="padding:60px 15px 0">
      <div class=info>
        <h1>RECIPES</h1>
        <p><?php echo $info; ?></p>
      </div>
      <div class=index>
        <table>
          <tr>
            <th>NO</th>
            <th>title</th>
            <th>body</th>
          </tr>
          <?php foreach($result as $column); ?>
          <tr>
            <td><?php echo $column['id']; ?></td>
            <td><?php echo $column['title']; ?></td>
            <td><?php echo $column['body']; ?></td>
          </tr>
        </table>
      </div>
    </main>
  </body>
</html>