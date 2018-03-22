<?php

$dsn='mysql:host=localhost;dbname=shop;charset=utf8';
$pdo=new PDO($dsn,'root','');

$stmt=$pdo->prepare('insert into user(username,password) values(:username,:password)');

$username=$_POST['username'];
$password=$_POST['password'];

$stmt->bindParam(':username',$username);
$stmt->bindParam(':password',$password);

$result=$stmt->execute();
if($result){
   echo '添加成功<br />';
   echo '<a href="user.php">回到首页</a>';
}