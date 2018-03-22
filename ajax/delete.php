<?php

   $link=mysqli_connect('localhost','root','');
	if(!$link){
	   exit('数据库连接失败');
	}

	mysqli_set_charset($link,'utf8');
	mysqli_select_db($link,'wj');
	
	$id=$_POST['id'];
	// echo $id;die;

	$sql="delete from user where id=$id";
	$res=mysqli_query($link,$sql);

	if($res){
        $status = ['error'=>1,'msg'=>'删除成功'];
	}
	else{
		$status = ['error'=>0,'msg'=>'删除失败'];
	}
	echo json_encode($status);
	die;