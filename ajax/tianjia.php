<?php

   $link=mysqli_connect('localhost','root','');
	if(!$link){
	   exit('数据库连接失败');
	}

	mysqli_set_charset($link,'utf8');
	mysqli_select_db($link,'wj');
	
	$username=$_POST['username'];
	$password=$_POST['pwd'];
	$sex=$_POST['sex'];
	// echo($username);die;
	$sql="insert into user(username,pwd,sex) values('$username','$password',$sex)";
	$res=mysqli_query($link,$sql);

	if($res){
		//echo 11;die;
        $status = ['error'=>1,'msg'=>'添加成功','redirect_url'=>'shouye.php'];
	}
	else{
		$status = ['error'=>0,'msg'=>'添加失败'];
	}
	echo json_encode($status);
	die;