# recipes

環境<br>
パッケージ:MAMP<br>
web server:Apache<br>
DB:MySQL<br>
言語:PHP8.0.8<br>
テキストエディタ:VSCODE<br>
データベース接続:PDO（PHP Data Object）<br>

ER 図（https://drive.google.com/file/d/1r7y3NIekLuFosuHBM2O0Ld6ziJvUQbNi/view?usp=sharing）<br>

テーブル定義書（https://docs.google.com/spreadsheets/d/1hhHSaG1-pXmvDKAnMXhdOhqusZO-Bzug5VdkGUX67c0/edit#gid=1373217982）<br>

実装予定機能<br>
・CRUD<br>
・タグ<br>
・ユーザー認証<br>
・（画像複数投稿）保存先をどうするか。AWS S3? お試しみたいなの探す<br>
<br>
セキュリティ<br>
・SQL インジェクション対策どうするか → プレースホルダ<br>
・クロスサイトスクリプティング（XSS）<br>
・クロスサイトリクエストフォージュエル（CSRF） → フォーム入力画面にアクセスした時にトークンを作成し、セッション変数にトークンを保存。トークンを含めてデータを送信して確認。<br>
・セッションハイジャック → ログイン直後にセッション ID を再発行<br>
