<?php
$id=$_POST['id'];
$username=$_POST['username'];
$password=$_POST['password'];
$gid=$_POST['gid'];

$dsn='mysql:host=localhost;dbname=shop;charset=utf8';
$pdo=new PDO($dsn,'root','');
$stmt=$pdo->prepare("update user set username='$username',password='$password',gid=$gid where id=$id");
$result=$stmt->execute();

if($result){
    echo '修改成功<br />';
    echo '<a href="user.php">回到首页</a>';
}else{
	echo '修改失败<br />';
    echo '<a href="user.php">回到首页</a>';
}