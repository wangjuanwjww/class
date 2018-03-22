<?php
$username=$_POST['username'];
// $sex=$_POST['sex'];
$id=$_POST['id'];

 $link=mysqli_connect('localhost','root','');
	if(!$link){
	   exit('数据库连接失败');
	}

	mysqli_set_charset($link,'utf8');
	mysqli_select_db($link,'wj');
	$sql="update user set username='$username' where id=$id";
	
	$res=mysqli_query($link,$sql);

	if($res){
		// echo 111;
		//  echo json_encode('error'=>1,'msg'=>'修改成功','url'=>'user.php');
		 $status = ['error'=>1,'msg'=>'修改成功','redirect_url'=>'user.php'];
	        
	}
	else{
		// echo 222;
		// echo json_encode('error'=>0,'msg'=>'修改失败','url'=>'user.php');
		$status = ['error'=>0,'msg'=>'修改失败'];
	        
	}
	echo json_encode($status);
	die;