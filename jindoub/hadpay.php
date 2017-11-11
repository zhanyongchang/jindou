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

$userid=$_POST['userid'];
$trade_sn=$_POST['trade_sn'];
$sql_a="UPDATE v9_pay_account SET status='progress' WHERE userid='$userid' and trade_sn='$trade_sn'";
mysqli_query($con, "set names utf8");
$result_a = mysqli_query($con, $sql_a);


?>