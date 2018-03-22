<!DOCTYPE html>
<html>
   <head>
       <meta charset="utf-8">
       <style>
           th{height:40px;}
           tr{height:40px;}
           td{width:100px;}
       </style>
   </head>

    <?php

       $page = isset($_GET['page']) ? $_GET['page'] : 1;
       if ($page < 1) {
          $page = 1;
      }

       $dsn='mysql:host=localhost;dbname=shop;charset=utf8';
       $pdo=new PDO($dsn,'root','');
       $stmt=$pdo->prepare('select * from user');
       $stmt->execute();
       //获取总条数
       $count=$stmt->rowCount();
       //每页显示数
       $num=5;
       //求出总页数
       $pageCount=ceil($count/$num);
       if ($page >= $pageCount) {
           $page = $pageCount;
        }
       //求出来偏移量
       $offset = ($page-1) * $num; 
   
       $stmt1=$pdo->prepare("select * from user limit $offset,$num");
       if($stmt1->execute()){
          while($rows=$stmt1->fetch(PDO::FETCH_ASSOC)){
             $data[]=$rows;
          }

          //var_dump($data);
       }
    ?>
    <center><a href="tianjia.html">添加</a></center>

    <table border="1" align="center" style="margin-top:10px;border-color:pink;">
    	<th align="center">id</th>
        <th align="center">姓名</th>
        <th align="center">密码</th>
        <th align="center">物品编号</th>
        <th align="center">操作</th>

        <?php
            foreach($data as $key=>$val){ ?>
               <tr align="center">
                  <td><?=$val['id']?></td>
                  <td><?=$val['username']?></td>
                  <td><?=$val['password']?></td>
                  <td><?=$val['gid']?></td>
                  <td>
                    <a href="delete.php?id=<?=$val['id']?>">删除</a>
                  	<a href="update.php?id=<?=$val['id']?>">修改</a>
                  </td>
               </tr>

        <?php 

          } 
            $prev = $page - 1;
            $next = $page + 1;

            if ($prev < 1) {
              $prev = 1;
            }
            if ($next > $pageCount) {
              $next = $pageCount;
            }
        ?>

    </table>

    <center style="margin-top:10px;">
    	<a href="user.php?page=1">首页</a>&nbsp;&nbsp;
    	<a href="user.php?page=<?=$prev?>">上一页</a>&nbsp;&nbsp;
    	<a href="user.php?page=<?=$next?>">下一页</a>&nbsp;&nbsp;
    	<a href="user.php?page=<?=$pageCount?>">尾页</a>&nbsp;&nbsp;
    </center>
</html>
