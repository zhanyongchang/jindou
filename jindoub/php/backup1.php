<?php
// ignore_user_abort(true);//关掉浏览器，PHP脚本也可以继续执行.
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
		$time_hour=date('H',time());
		$time_min=date('i',time());
		$time_sec=date('s',time());
		if($time_sec==0){
			if($time_hour==8 && $time_min>=56){
				$new_t=date("YmdHi",time()+240);
				$win_t=date("m-d H:i",time()+240);
				$sql_a="INSERT v9_download_data (termnum,win_time) VALUES ('$new_t','$win_t')";
				mysqli_query($con, "set names utf8");
				$result_a = mysqli_query($con, $sql_a);

				if($time_hour==8 && $time_min==59){
					$sql_abc="SELECT min(uptime) FROM v9_member order by userid asc";
					mysqli_query($con, "set names utf8");
					$result_abc = mysqli_query($con, $sql_abc);
					$rs_abc = mysqli_fetch_assoc($result_abc);

					$sql_bb="SELECT * FROM v9_member order by userid asc";
					mysqli_query($con, "set names utf8");
					$result_bb = mysqli_query($con, $sql_bb);
					$data = array();
					$kk = 0;
					$nowtime_d=date('ymd',time());
					$uptime_d=date('ymd',$rs_abc['min(uptime)']);
					if($uptime_d<$nowtime_d){
						while ($list = mysqli_fetch_assoc($result_bb)) {
							$data[$kk] = $list;

							$get_yd = $data[$kk]['get_today'];
							$userid = $data[$kk]['userid'];
							$sql_ee="UPDATE v9_member SET get_yd=".$data[$kk]['get_today']." WHERE userid=".$userid;
							mysqli_query($con, "set names utf8");
							$result_ee = mysqli_query($con, $sql_ee);

							$now=time();
							$sql_dd="UPDATE v9_member SET get_today=0,uptime='$now'";
							mysqli_query($con, "set names utf8");
							$result_dd = mysqli_query($con, $sql_dd);

							$kk = $kk + 1;
						}
					}
				}

				sleep($interval);// 等待

			}elseif($time_hour>8 && $time_hour<21){

				$termnum=date('YmdHi',time());
				$bingo_one=rand(0,9);
				$bingo_two=rand(0,9);
				$bingo_three=rand(0,9);
				// $bingo_four=14;
				$bingo_four=$bingo_one+$bingo_two+$bingo_three;
				//开奖
				$sql_b="UPDATE v9_download_data SET bingo_one='$bingo_one', bingo_two='$bingo_two', bingo_three='$bingo_three', bingo_four='$bingo_four' where termnum='$termnum'";
				mysqli_query($con, "set names utf8");
				$result_b = mysqli_query($con, $sql_b);

				//更新中奖人数
				$sql_c="SELECT bingo_four FROM v9_download_data WHERE termnum='$termnum'";
				mysqli_query($con, "set names utf8");
				$result_c = mysqli_query($con, $sql_c);
				$rs_c = mysqli_fetch_assoc($result_c);
				$money_n_personal="money_".$rs_c['bingo_four']."_personal";
				$sql_d="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and $money_n_personal!=0";
				mysqli_query($con, "set names utf8");
				$result_d = mysqli_query($con, $sql_d);
				$rs_d = mysqli_fetch_assoc($result_d);
				$man_bingo=$rs_d['count(*)'];
				$sql_e="UPDATE v9_download_data SET man_bingo='$man_bingo' where termnum='$termnum'";
				mysqli_query($con, "set names utf8");
				$result_e = mysqli_query($con, $sql_e);

				//按赔率发放金豆
				$sql_q="SELECT * FROM v9_download_data WHERE termnum='$termnum'";
				mysqli_query($con, "set names utf8");
				$result_q = mysqli_query($con, $sql_q);
				$rs_q = mysqli_fetch_assoc($result_q);
				

				if($rs_q['bingo_four']==0){
					$money_i=$rs_q['money_0'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_0_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_0_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);
					
					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_0_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
					
				}elseif ($rs_q['bingo_four']==1) {
					$money_i=$rs_q['money_1'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_1_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_1_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_1_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==2) {
					$money_i=$rs_q['money_2'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_2_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_2_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_2_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==3) {
					$money_i=$rs_q['money_3'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_3_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_3_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_3_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==4) {
					$money_i=$rs_q['money_4'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_4_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_4_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_4_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==5) {
					$money_i=$rs_q['money_5'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_5_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_5_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_5_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==6) {
					$money_i=$rs_q['money_6'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_6_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_6_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_6_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==7) {
					$money_i=$rs_q['money_7'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_7_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_7_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_7_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==8) {
					$money_i=$rs_q['money_8'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_8_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_8_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_8_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==9) {
					$money_i=$rs_q['money_9'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_9_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_9_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_9_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==10) {
					$money_i=$rs_q['money_10'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_10_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_10_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_10_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==11) {
					$money_i=$rs_q['money_11'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_11_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_11_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_11_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==12) {
					$money_i=$rs_q['money_12'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_12_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_12_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_12_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==13) {
					$money_i=$rs_q['money_13'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_13_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_13_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_13_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==14) {
					$money_i=$rs_q['money_14'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_14_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_14_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_14_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==15) {
					$money_i=$rs_q['money_15'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_15_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_15_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_15_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==16) {
					$money_i=$rs_q['money_16'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_16_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_16_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_16_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==17) {
					$money_i=$rs_q['money_17'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_17_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_17_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_17_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==18) {
					$money_i=$rs_q['money_18'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_18_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_18_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_18_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==19) {
					$money_i=$rs_q['money_19'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_19_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_19_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_19_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==20) {
					$money_i=$rs_q['money_20'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_20_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_20_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_20_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==21) {
					$money_i=$rs_q['money_21'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_21_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_21_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_21_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==22) {
					$money_i=$rs_q['money_22'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_22_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_22_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_22_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==23) {
					$money_i=$rs_q['money_23'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_23_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_23_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_23_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==24) {
					$money_i=$rs_q['money_24'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_24_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_24_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_24_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==25) {
					$money_i=$rs_q['money_25'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_25_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_25_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_25_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==26) {
					$money_i=$rs_q['money_26'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_26_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_26_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_26_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}elseif ($rs_q['bingo_four']==27) {
					$money_i=$rs_q['money_27'];
					$money_all=$rs_q['money_all']*0.98;    //每期总金豆数抽走2%
					if($money_i==0){
						$peilv=$money_all;
					}else{
						$peilv=floor($money_all/$money_i);
					}
					//更新中奖状态
					$sql_f="UPDATE v9_touzhu_personal SET flag=1 WHERE money_27_personal>0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_f = mysqli_query($con, $sql_f);
					$sql_g="UPDATE v9_touzhu_personal SET flag=0 WHERE money_27_personal=0 and termnum='$termnum'";
					mysqli_query($con, "set names utf8");
					$result_g = mysqli_query($con, $sql_g);

					//按赔率加金豆
					$sql_r="SELECT count(*) FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_r = mysqli_query($con, $sql_r);
					$rs_r = mysqli_fetch_assoc($result_r);
					$n=$rs_r['count(*)'];

					$sql_rr="SELECT * FROM v9_touzhu_personal WHERE termnum='$termnum' and flag=1";
					mysqli_query($con, "set names utf8");
					$result_rr = mysqli_query($con, $sql_rr);
					$array=array();
					
					$ii=0;
					while($row=mysqli_fetch_assoc($result_rr)){
							$array[$ii]=$row;

							$sql_t="SELECT * FROM v9_member WHERE userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_t = mysqli_query($con, $sql_t);
							$rs_t = mysqli_fetch_assoc($result_t);
							
							$get_today=$rs_t['get_today'];
							$getmoney=floor($array[$ii]['money_27_personal']*$peilv);
							$winord=$getmoney-$array[$ii]['money_all_man'];

							if($winord>0){
								if($rs_t['groupid']==10){
									$reward=floor($winord*0.01);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==11) {
									$reward=floor($winord*0.02);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==12) {
									$reward=floor($winord*0.03);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==13) {
									$reward=floor($winord*0.05);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==14) {
									$reward=floor($winord*0.1);
									$get_all_money=$getmoney+$reward;
								}elseif ($rs_t['groupid']==15) {
									$reward=floor($winord*0.2);
									$get_all_money=$getmoney+$reward;
								}else{
									$reward=0;
									$get_all_money=$getmoney+$reward;
								}
								//更新排行榜
								$get_today=$get_today+$winord+$reward;
								$sql_k="UPDATE v9_member SET get_today='$get_today' where userid=".$array[$ii]['userid'];
								mysqli_query($con, "set names utf8");
								$result_k = mysqli_query($con, $sql_k);
							}else{
								$reward=0;
								$get_all_money=$getmoney+$reward;
							}
							//更新个人投注信息
							$sql_s="UPDATE v9_touzhu_personal SET getmoney='$getmoney', reward='$reward', get_all_money='$get_all_money' where termnum='$termnum' and flag=1 and userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_s = mysqli_query($con, $sql_s);
							
							//更新金豆数
							$point_tt=$get_all_money+$rs_t['point'];
							$wode="point";
							$sql_u="UPDATE v9_member SET ".$wode."='$point_tt' Where userid=".$array[$ii]['userid'];
							mysqli_query($con, "set names utf8");
							$result_u = mysqli_query($con, $sql_u);

							// $sql_aaa="UPDATE v9_touzhu_personal SET test=".$n." WHERE termnum='$termnum' and userid=".$array[$ii]['userid'];
							// mysqli_query($con, "set names utf8");
							// $result_aaa = mysqli_query($con, $sql_aaa);
						$ii=$ii+1;
					}
				}
				if($time_hour==20 && $time_min>=56){
					continue;
				}else{
					//每次开奖后插入一条4分钟后开奖的新数据
					$new_termnum=date("YmdHi",time()+240);
					$win_time=date("m-d H:i",time()+240);
					$sql_z="INSERT v9_download_data (termnum,win_time) VALUES ('$new_termnum','$win_time')";
					mysqli_query($con, "set names utf8");
					$result_z = mysqli_query($con, $sql_z);
				}
				
				sleep($interval);// 等待
			}else{
				sleep($interval);// 等待
			}
		}
	}while(1);




?>
