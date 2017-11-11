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
// $a_id=$_POST['a_id'];
$sql_a="SELECT id FROM v9_picture WHERE el_type='充值'";
mysqli_query($con, "set names utf8");
$result_a = mysqli_query($con, $sql_a);
while(list($n) = mysqli_fetch_row($result_a)){
	$id[]=$n;
}
$sql_b="SELECT count(*) FROM v9_picture WHERE el_type='充值'";
mysqli_query($con, "set names utf8");
$result_b = mysqli_query($con, $sql_b);
$rs_b=mysqli_fetch_assoc($result_b);
$numid=$rs_b['count(*)'];
$result=0;
for($i=0;$i<$numid;$i++){
	$sql_c="SELECT * FROM v9_pay_account WHERE userid='$userid' and a_id='".$id[$i]."' order by id desc";
	mysqli_query($con, "set names utf8");
	$result_c = mysqli_query($con, $sql_c);
	$rs_c = mysqli_fetch_assoc($result_c);
	$status=$rs_c['status'];
	$addtime=$rs_c['addtime'];
	$date_m=date('m',$addtime);
	if($status=='succ' || $status=='progress'){
		$now_m=date('m',time());
		if($date_m==$now_m){
			$flag[$i]=1;
		}else{
			$flag[$i]=0;
		}
	}else{
		$flag[$i]=0;
	}
	
	$result=$result+$flag[$i];
}
echo $result;
// $sql_b="SELECT * FROM v9_pay_account WHERE userid='$userid' and a_id='$a_id' order by id desc";
// mysqli_query($con, "set names utf8");
// $result_b = mysqli_query($con, $sql_b);
// $rs_b = mysqli_fetch_assoc($result_b);
// $status=$rs_b['status'];
// $addtime=$rs_b['addtime'];
// $date_m=date('m',$addtime);
// if($status=='succ' || $status=='progress'){
// 	$now_m=date('m',time());
// 	if($date_m==$now_m){
// 		echo "1";
// 	}else{
// 		echo "0";
// 	}
// }else{
// 	echo "0";
// }
