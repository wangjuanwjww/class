<?php
$id=$_GET['id'];
//echo $id;
$dsn='mysql:host=localhost;dbname=shop;charset=utf8';
$pdo=new PDO($dsn,'root','');
$stmt=$pdo->prepare("select * from user where id=$id");
$stmt->execute();
//var_dump($result);

$rows=$stmt->fetch(PDO::FETCH_ASSOC);
//var_dump($rows);

?>

<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <form action="do_update.php" method="post">
            <input type="hidden" name="id" value="<?=$rows['id'];?>" />
            用户名:<input type="text" name="username" value="<?=$rows['username'];?>" /><br />
            密码:<input type="password" name="password" value="<?=$rows['password'];?>" /><br />
            物品编号:<input type="text" name="gid" value="<?=$rows['gid'];?>" /><br />
            <input type="submit" value="修改" />
        
        </form>
    </body>
</html>