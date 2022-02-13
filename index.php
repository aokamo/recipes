<?php
  // 処理を一度だけ行う
  require_once('dbc.php');

  // Dbcクラスをインスタンス化
  $dbc = new Dbc;
  // 取得したpostsデータを表示
  $postsData = $dbc->getAllPosts();

?>

<!-- 記事 -->
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
        <p><?php echo $info; ?></p>
      </div>
      <div class="new">
        <p><a href="/recipes/form.html">新規投稿</a></p>
      </div>
      <div class="index">
      <h1>記事一覧</h1>
        <table>
          <tr>
            <th>NO</th>
            <th>title</th>
            <th>カテゴリー</th>
            <th></th>
          </tr>
          <?php foreach($postsData as $column): ?>
            <!-- ＊foreachにはコロン -->
          <tr>
            <td><?php echo $column['id']; ?></td>
            <td><?php echo $column['title']; ?></td>
            <td><?php echo $column['category_id']; ?></td>
            <td><a href="/recipes/show.php?id=<?php echo $column['id']; ?>">詳細</a></td>
          </tr>
          <?php endforeach; ?>
          <!-- endforeachにはセミコロン -->
        </table>
      </div>
    </main>
  </body>
</html>