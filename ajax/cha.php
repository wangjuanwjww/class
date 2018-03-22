<?php
include 'Page.php';
$link=mysqli_connect('localhost','root','');
if(!$link){
	exit('数据库连接失败');
}
mysqli_set_charset($link,'utf8');
mysqli_select_db($link,'wj');
$sql="select count(id) as c from user";
$res=mysqli_query($link,$sql);
// var_dump($res);die;
if($res){
	while($rows=mysqli_fetch_assoc($res)){
		$data[]=$rows;
	}
}
// var_dump($data);
$total=$data[0]['c'];

$page=new Page(5,$total);
$sql2="select * from user limit ".$page->limit();
$res2=mysqli_query($link,$sql2);
// var_dump($res2);die;
if($res2){
	while($rows2=mysqli_fetch_assoc($res2)){
		$data2[]=$rows2;
	}
}
// var_dump($data2);die;
$value['data2']=$data2;
$value['allPage']=$page->allPage();
//var_dump($value);die;
echo json_encode($value);
