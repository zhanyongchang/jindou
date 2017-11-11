<?php
set_time_limit(0);
date_default_timezone_set('Asia/Shanghai');
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

$interval=59;
	do{

		//每次开奖后插入一条4分钟后开奖的新数据
		$new_termnum=date("YmdHi",time()+240);
		$win_time=date("m-d H:i",time()+240);
		$sql_z="INSERT v9_download_data (termnum,win_time) VALUES ('$new_termnum','$win_time')";
		mysqli_query($con, "set names utf8");
		$result_z = mysqli_query($con, $sql_z);
		if($result_z){
			echo "666";
		}
		sleep($interval);// 等待
		
	}while(1);




?>
