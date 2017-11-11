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
$old=date('YmdHi',time()-86400*2);
$sql_a="DELETE FROM v9_download_data WHERE termnum<'$old'";
mysqli_query($con, "set names utf8");
$result_a = mysqli_query($con, $sql_a);
?>