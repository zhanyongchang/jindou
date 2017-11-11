<?php
header("Content-Type: text/html;charset=utf-8");
$database = "jindou";
$root = "root";
$password = "root";
$con = mysqli_connect("127.0.0.1",$root,$password,$database);
if(mysqli_connect_errno()){
    echo "连接数据库失败：".mysqli_connect_error();
    $con=null;
    exit;
}
$checkvip=$_POST['checkvip'];
if ($checkvip=='') {
	echo json_encode("请登录！");
}else{
	$sql_a="SELECT * FROM v9_member WHERE userid='$checkvip'";
	mysqli_query($con, "set names utf8");
	$result_a = mysqli_query($con, $sql_a);
	$rs_a = mysqli_fetch_assoc($result_a);
	$overduedate=$rs_a['overduedate'];
	$time=time();
	if($overduedate<$time){
		$sql_b="UPDATE v9_member SET groupid=9, vip=0 where userid='$checkvip'";
		mysqli_query($con, "set names utf8");
		$result_b = mysqli_query($con, $sql_b);
	}
	echo json_encode(1);
}
?>