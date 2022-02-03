<?php $info = file_get_contents("info.txt"); ?>
<!doctype html>
<html lang="ja">
  <head>
    <title>arch_blog</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>
  <body>
    <header>
      　<?php include('navbar.php'); ?>
    </header>
    <main role="main" class="container" style="padding:60px 15px 0">
      <div class=info>
        <h1>ARCH_BLOG</h1>
        <p><?php echo $info; ?></p>
      </div>
      <div class=index>

      </div>
    </main>
  </body>
</html>