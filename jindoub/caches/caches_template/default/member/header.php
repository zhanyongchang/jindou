<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>phpcmsV9 - <?php echo L('member','','member').L('manage_center');?></title>
<link href="<?php echo CSS_PATH;?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH;?>member.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH;?>table_form.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>member_common.js"></script>
<?php if(isset($show_validator)) { ?>
<script type="text/javascript" src="<?php echo JS_PATH;?>formvalidator.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>formvalidatorregex.js" charset="UTF-8"></script>
<?php } ?>
</head>
<body>
<div id="header">
	<?php $username = param::get_cookie('_username');?>
	<?php $userid = param::get_cookie('_userid');?>
	<div class="logo"><a href="http://xiaojindou123.com/"><img src="<?php echo IMG_PATH;?>logo/logo2.png" height="60" /></a><h3><?php echo L('member_center');?></h3></div>
	<?php $siteinfo = siteinfo($this->memberinfo['siteid']);?>
	<?php $this->menu_db = pc_base::load_model('member_menu_model');?>
	<?php $menu = $this->menu_db->select(array('display'=>1, 'parentid'=>0), '*', 20 , 'listorder');?>
    <div class="link"><?php echo L('hellow');?> 


	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=3b2889f5d6ab51b0a974f029820be98c&sql=SELECT+%2A+FROM+v9_member+where+userid%3D%27%24userid%27&num=1&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM v9_member where userid='$userid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
	<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
	<span style="font-size: 14px;color: black;"><?php echo $r['username'];?></span>
	<?php $vip=$r[vip];?>
	<?php $groupid=$r[groupid];?>
	<?php if($vip==1) { ?>
		<img src="<?php echo IMG_PATH;?>icon/vip.gif">
		<?php if($groupid==10) { ?>
			<span style="color: #ff860f;">1</span>
		<?php } elseif ($groupid==11) { ?>
			<span style="color: #ff860f;">2</span>
		<?php } elseif ($groupid==12) { ?>
			<span style="color: #ff860f;">3</span>
		<?php } elseif ($groupid==13) { ?>
			<span style="color: #ff860f;">4</span>
		<?php } elseif ($groupid==14) { ?>
			<span style="color: #ff860f;">5</span>
		<?php } elseif ($groupid==15) { ?>
			<span style="color: #ff860f;">6</span>
		<?php } ?>
	<?php } else { ?>
		<img src="<?php echo IMG_PATH;?>icon/vip-expired.gif">
	<?php } ?>
	<span> | </span>金豆:
	<span style="color: red;"><?php echo $r['point'];?></span>
	<?php $n++;}unset($n); ?>
	<img src="<?php echo IMG_PATH;?>l_logo/egg.gif">
    <span> | </span>
    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
	<a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=logout"><?php echo L('logout');?></a>
	<span> | </span><a href="<?php echo $siteinfo['domain'];?>"><?php echo L('index');?></a> </div>
	<div class="nav-bar">
    	<map>
        	<ul class="nav-site cu-span">
				<?php $n=1; if(is_array($menu)) foreach($menu AS $k => $v) { ?>
				<li>
				<?php echo $v['isurl'];?>
					<?php if($v['isurl']) { ?>
						<a href="<?php echo $v['url'];?>" target="_blank"><span><?php echo L($v['name'], '', 'member_menu');?></span></a>
					<?php } else { ?>
						<a href="index.php?m=<?php echo $v['m'];?>&c=<?php echo $v['c'];?>&a=<?php echo $v['a'];?>&<?php echo $v['data'];?>" <?php if($k==$_GET['t']) { ?>class="on"<?php } ?>><span><?php echo L($v['name'], '', 'member_menu');?></span></a>
					<?php } ?>
				</li>
				<li class="line">|</li>
				<?php $n++;}unset($n); ?>
            </ul>
        </map>
    </div>
</div>