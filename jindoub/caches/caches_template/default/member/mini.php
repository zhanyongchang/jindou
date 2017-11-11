<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><style>
body,html{background:none; padding:0; margin:0}
.log{line-height:24px;*line-height:27px; height:24px;float:right; font-size:12px}
.log span{color:#ced9e7}
.log a{color:#049;text-decoration: none;}
.log a:hover{text-decoration: underline;}
.log .snda{ position:relative; bottom:-3px}
.log .upv_btn{height: 24px; padding-left: 14px; position: relative; background:url(<?php echo IMG_PATH;?>up_btn.gif) no-repeat 0px 0px; margin-left:0px; margin-right:10px; *background-position:0px 5px;}
.log .r{float:right;}
.log .w27{* width:320px;}
</style>
<body style="background-color:transparent">
<div class="log w27"><?php if($_username) { ?><?php echo L('hellow');?>

<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=ca8c4ee98f6cf84137cafd89c08eb7cb&sql=SELECT+%2A+FROM+v9_member+where+username%3D%27%24_username%27&num=1&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM v9_member where username='$_username' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
<?php if($r[vip]) { ?>
    <img src="<?php echo IMG_PATH;?>icon/vip.gif">
	    <?php if($r[groupid]==10) { ?>
	    <span style="color: #ff860f;">1</span>
	    <?php } elseif ($r[groupid]==11) { ?>
	    <span style="color: #ff860f;">2</span>
	    <?php } elseif ($r[groupid]==12) { ?>
	    <span style="color: #ff860f;">3</span>
	    <?php } elseif ($r[groupid]==13) { ?>
	    <span style="color: #ff860f;">4</span>
	    <?php } elseif ($r[groupid]==14) { ?>
	    <span style="color: #ff860f;">5</span>
	    <?php } elseif ($r[groupid]==15) { ?>
	    <span style="color: #ff860f;">6</span>
	    <?php } ?>
	<?php } else { ?>
    <img src="<?php echo IMG_PATH;?>icon/vip-expired.gif" title="<?php echo L('overdue');?>，<?php echo L('overduedate');?>：<?php echo format::date($memberinfo['overduedate'],1);?>">
<?php } ?>
<span style="font-size: 14px;color: black;"><?php echo $_username;?></span>
&nbsp;金豆: <span style="color: red;"><?php echo $r['point'];?></span><?php $n++;}unset($n); ?><img src="<?php echo IMG_PATH;?>l_logo/egg.gif">&nbsp;&nbsp;<a href="<?php echo APP_PATH;?>index.php?m=member&siteid=<?php echo $siteid;?>" target="_blank"><?php echo L('member_center');?></a> <a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=logout&forward=<?php echo urlencode($_GET['forward']);?>&siteid=<?php echo $siteid;?>" target="_top"><?php echo L('logout');?></a>&nbsp;&nbsp;<!-- <a href="<?php echo APP_PATH;?>index.php?m=member&c=content&a=upload_video" target="_top" class="upv_btn">上传视频</a> -->

<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
<?php } else { ?> <span class="r"><a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=register&siteid=<?php echo $siteid;?>" target="_blank"><?php echo L('register');?></a> <span>|</span> <a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=login&forward=<?php echo urlencode($_GET['forward']);?>&siteid=<?php echo $siteid;?>" target="_top"><?php echo L('login');?></a>&nbsp;&nbsp;<!-- <a href="<?php echo APP_PATH;?>index.php?m=member&c=content&a=upload_video" target="_top" class="upv_btn">上传视频</a> --></span>
<?php } ?></div>
</body>