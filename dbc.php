<?php

$dsn = 'mysql:host=localhost;dbname=recipes;charset=utf8'
$user = 'recipes_user';
$pass = 'Recipes1234';

$dbh = new PDO($dsn,$user,$pass);

var_dump($dbh);

?>