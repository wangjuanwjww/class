<?php

$id=$_GET['id'];
//var_dump($id);

$dsn='mysql:host=localhost;dbname=shop;charset=utf8';

$pdo=new PDO($dsn,'root','');

$stmt=$pdo->prepare("delete from user where id=$id");

$result=$stmt->execute();
if($result){
   echo '删除成功<br />';
   echo '<a href="user.php">回到首页</a>';
}