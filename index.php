<?php $info = file_get_contents("info.txt"); ?>
<!doctype html>
<html lang="ja">
  <head>
    <title>arch_blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <body>
    <?php include('navbar.php'); ?>
    <main role="main" class="container" style="padding:50px 10px 0">
      <div>
        <h1>ARCH_BLOG</h1>
        <p><?php echo $info; ?></p>
      </div>
    </main>
  </body>
</html>