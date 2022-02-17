<?php

// クラス定義
Class Dbc
{

  // 関数
  // 1関数1機能にする　←　可読性・テストのしやすさ

  // 関数（データベース接続）
  // 引数：なし
  // 返り値：接続結果を返す
  private function dbConnect(){
    // db接続にDSN（data source name）ユーザー、パスワードを定義
    $dsn = 'mysql:host=localhost;dbname=recipes;charset=utf8';
    $user = 'recipes_user';
    $pass = 'Recipes1234';

    // 接続に成功した場合
    try{
      $dbh = new PDO($dsn,$user,$pass,[
        // 例外を出力
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        // デフォルトではtrueになっており、プレースホルダを使用する場合はfalseに
        PDO::ATTR_EMULATE_PREPARES => false,
      ]);
    // 接続に失敗した場合
    } catch(PDOException $e) {
      echo '接続失敗'. $e->getMessage();
      exit();
    };
    // 関数実行
    return $dbh;
  }

  // 関数（データ取得）
  // 引数：なし
  // 返り値：取得したデータ
  public function getAllPosts(){
    // db接続
    $dbh = $this->dbConnect();
    // ①SQLの準備
    $sql = 'SELECT * FROM posts';
    // ②SQL実行
    $stmt = $dbh->query($sql);
    // ③SQLの結果を受け取る
    $result = $stmt->fetchall(pdo::FETCH_ASSOC);
    // var_dump($result);←取得データ確認コード
    // 関数実行
    return $result;
    // db接続終了
    $dbh = null;
  }

  // 引数：$id
  // 返り値：$result
  public function getPost($id){
    // 値の判定をして、空の値や不正な値への処理を追加
    if(empty($id)){
      exit('IDが不正です。');
    }

    $dbh = $this->dbConnect();

    // SQL準備
    $stmt = $dbh->prepare('SELECT * FROM posts Where id = :id');
      // id = （直書きしない）
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
      // ↑↑プレースホルダで後から定義
    // SQL実行
    $stmt->execute();
      // ↑↑prepare statementを実行するとき
    // 結果を取得
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // var_dump($result);

    // 値がデータベースにない場合の処理
    if(!$result){
      exit('記事がありません。');
    }
    return $result;
  }

  public function postCreate($post){
    // データベースへデータ登録
    $sql = 'INSERT INTO
      posts(title, body)
    VALUES
      (:title, :body)';

    // データベース接続
    $dbh = $this->dbConnect();
    // トランザクション
    $dbh->beginTransaction();
    try{
    $stmt = $dbh->prepare($sql);
      // $stmt->bindValue('user_id',$post['user_id'], PDO::PARAM_INT);
      // $stmt->bindValue('category_id',$post['category_id'], PDO::PARAM_INT);
      // $stmt->bindValue('post_tag_id',$post['post_tag_id'], PDO::PARAM_INT);
      $stmt->bindValue('title',$post['title'], PDO::PARAM_STR);
      $stmt->bindValue('body',$post['body'], PDO::PARAM_STR);
      // $stmt->bindValue('post_status',$post['post_status'], PDO::PARAM_INT);
      $stmt->execute();
      $dbh->commit();
      echo '投稿が完了しました。';
    } catch(PDOException $e){
      $dbh->rollBack();
      exit($e);
    };
  }
}
?>