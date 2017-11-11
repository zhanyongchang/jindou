<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<link href="<?php echo CSS_PATH;?>download.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>jd_css/main.css">
<link href="<?php echo CSS_PATH;?>jd_css/tm_fc.css" rel="stylesheet" type="text/css" />
<!-- <script type="text/javascript" src="<?php echo JS_PATH;?>play28.js"></script> -->

<style type="text/css">
.div_ad{
    z-index:102;
    position:absolute;
}
.input3{
    border: solid 1px #aaa;
    background: #fff;
    color: #000;
    height: 20px;
    width:22px;
    cursor:pointer
}
.popup{width:340px;height:auto;background:#fff;border:1px solid #C40000;}
.popup .titleclose {padding:1px 0 0 10px;height:44px; background:url(/img/pg28/xy28tz_fcbg.gif) no-repeat; }
.popup .title {font-size:12px;font-weight:bold;color:#FFF;line-height:23px;border:0px;}
.popup .close {position:absolute;right:4px;top:1px;width:55px;height:23px;cursor:pointer}
.popup .close span {display:none;}
.popup .content1 {padding:20px; padding-top:10px;min-height:26px;_height:26px;text-align:center;line-height:26px; font-size:12px;}
.popup .btnpane { margin:0 auto;width:168px;margin-bottom:15px;height:22px; margin-left:100px;}
.popup .content2 {padding-left:15px; padding-right:0px;padding-bottom:8px;padding-top:0px;min-height:26px;_height:26px;text-align:center;line-height:26px; font-size:12px;}
.popup .btnpane_fx {margin:0 auto;width:340px;padding-bottom:8px;height:22px; font-size:12px;height:32px;}
.popup .btnpane_fx ul li{ list-style:none; float:left; width:98px;}
.popup .btnpane_zcwz {margin:0 auto;width:226px;padding-bottom:10px;height:22px; margin-left:120px; font-size:12px;height:32px;}
.help_show{ position:absolute;top:500px;left:900px;}
.show_kj{border:4px #FB0301 solid;}
.kjauto1{ width:100px; height:50px;}

.hand{
    position:relative;
    width:59px;
    height:54px;
    background: url(../img/fc_hand/hand.gif) no-repeat;
    cursor:pointer;
    top:-10px;
    left:30px;
}
.show_tips{position:absolute;border:1px solid #EBA100;background: url(../img/fc_hand/help_fc_bg.gif) no-repeat left top;width:437px; font-size:12px;z-index:9999;}
.show_tips .t_zone{padding:10px;line-height:21px;}
.tips1{left:70px;top:50px;width:120px;}

.blue_load_l:link {
    color:#3B5888;
    text-decoration:underline;
}
.blue_load_l:visited {
    text-decoration:underline;
    color:#3B5888;
}
.blue_load_l:hover {
    text-decoration:underline;
    color:#3B5888;
}
.blue_load_l:active {
    text-decoration:underline;
    color:#3B5888;
}
/*new0504*/
.tips2{left:65px;top:75px;*left:70px;*top:80px;width:300px;}
.gb_an{float:right; margin-top:3px; margin-right:2px;}

</style>

<style type="text/css">
.game_line {
    height: 7px;
    width: 948px;
    margin: 0 auto 6px auto;
    background: url(<?php echo IMG_PATH;?>l_logo/orange-line.gif) repeat-x;
    float: left;
}
.img_bt1 {
    background-image: url(/phpcms_v9_UTF8/install_package/statics/images/l_logo/img_bt1.gif);
    background-repeat: no-repeat;
    width: 51px;
    height: 23px;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
}
.border_out {
    width: 936px;
    height: 46px;
    margin: auto;
}
.border_out1_l{background-image:url(<?php echo IMG_PATH;?>l_logo/beilv.gif); background-repeat:no-repeat;width:388px; height:33px; float:left; color:#515151;line-height:33px;}
.conform_btn{background-image:url(<?php echo IMG_PATH;?>l_logo/bg_h.gif); background-repeat:repeat-x;width:80px;height:27px;float:right; color:#FFFFFF; font-size:14px; font-weight:bold;line-height:25px; text-align:center;border:1px solid #ffb91f; cursor:pointer;}
.touzhu1{background-image:url(<?php echo IMG_PATH;?>l_logo/touzhu1.gif); background-repeat:no-repeat;width:80px;height:33px;float:left;line-height:33px; text-align:center; color:#8d5000;margin-left:4px;; cursor:pointer;}
.touzhu2{background-image:url(<?php echo IMG_PATH;?>l_logo/touzhu2.gif); background-repeat:no-repeat;width:47px;height:33px;float:left;line-height:33px; text-align:center; color:#8d5000;margin-left:4px;; cursor:pointer;}
</style>
<style type="text/css">
.fu{
    position: fixed;
    z-index: 999;
    left: 10%;
    top: 70%;
}
.ewm{ 
    
    width: 130px;
    height: 130px;
    
}
.ewm img{ width: 100% }
.fu_zi{
    width: 130px;
    height: 20px;
    text-align: center;
    line-height: 20px;
    font-family:Microsoft Yahei;
    font-size: 16px;
    font-weight: 600;
}
.qun{
    position: fixed;
    z-index: 999;
    left: 82%;
    top: 50%;
}
</style>
<!-- <div class="fu">
    <div class="ewm"><img src="<?php echo IMG_PATH;?>logo/kefu.jpg"></div>
    <div class="fu_zi">联&nbsp;&nbsp;系&nbsp;&nbsp;客&nbsp;&nbsp;服</div>
</div> -->
<!-- <div class="qun">
    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=b76fc8faf27249fbd4e8d989dc00afcf&sql=select+%2A+from+v9_page+where+keywords+%3D+%27%E4%BA%8C%E7%BB%B4%E7%A0%81%27+order+by+catid+desc&num=2&return=data99\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_page where keywords = '二维码' order by catid desc LIMIT 2");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data99 = $a;unset($a);?>
    <?php $n=1;if(is_array($data99)) foreach($data99 AS $ab) { ?>
    <div class="fu_zi"><?php echo $ab['title'];?></div>
    <div class="ewm"><?php echo $ab['content'];?></div>
    <?php $n++;}unset($n); ?>
    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
</div> -->
<?php $_userid = param::get_cookie('_userid')?>
<div class="main">
<div class="crumbs"><a href="#">首页</a><span> &gt; </span><?php echo catpos($catid);?></div>
<div class="content">
<div class="content_top" >&nbsp;</div>
<div class="content_middle" style="height:auto">
<div style="width:948px">
	<div class="title_game" style="float:left; width:740px;">
	    <a href="?m=content&c=index&a=lists&catid=24">
      <div style="width: 140px;height: 27px;color:red;background: url(<?php echo IMG_PATH;?>l_logo/ico_6.jpg) no-repeat;line-height: 27px;text-align: center;">幸运28红包争霸赛</div>
      </a>
	</div>
</div>
<div class="game_line"></div>
<table width="936" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#FCF8DA"  style="clear:both;">
  <tr>
    <td width="50%" height="24" align="left" valign="middle" style="padding-left:10px">
    <a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=33&id=<?php echo $_userid;?>" target="_parent" class="abt12_1"><strong>我的投注</strong></a><span class="wh12">|</span> <a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=35" target="_parent" class="abt12_2" id="level"><strong>排行榜</strong></a>
    </td>
  </tr>
</table>
<div class="tzbanner touzhutop">
	<div class="tzbanner_z touzhutop_n">
		<div class="tzbanner_fk fk_wz touzhutop_t">
			<table width="920" border="0" cellspacing="0" cellpadding="0" align="center" >
			<tr>
				<td height="9" colspan="4" align="left"></td>
			</tr>
            <?php $id=$_GET['id'];?>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=eea8c916697e5e5c37c040c11379f809&sql=select+%2A+from+v9_download_data+where+id%3D%27%24id%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id='$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
            <?php $n=1;if(is_array($data2)) foreach($data2 AS $r) { ?>
			<tr>
				<td width="235" height="30" align="left">&nbsp;&nbsp;&nbsp;&nbsp;期号：<font color="red"><?php echo $r['termnum'];?></font></td>
				<td width="230" align="left">开奖状态：已开奖</td>
				<td width="230" height="30" align="left">开奖时间：<?php echo $r['win_time'];?></td>
				<td width="225" align="left">开奖结果：<img src="<?php echo IMG_PATH;?>l_logo/number_<?php echo $r['bingo_four'];?>.gif" width="25" height="25" align="absmiddle" /></td>
			</tr>
            <?php $bingo_four=$r[bingo_four]?>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			<tr>
                <?php $termnum=$r[termnum];?>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=35b2672a60226d7de2e21d5dfc36805c&sql=select+%2A+from+v9_touzhu_personal+where+termnum%3D%27%24termnum%27+and+userid%3D%27%24_userid%27&num=1&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where termnum='$termnum' and userid='$_userid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
                <?php $n=1;if(is_array($data)) foreach($data AS $g) { ?>
				<td width="235" height="30" align="left">&nbsp;&nbsp;&nbsp;&nbsp;我的投注额：<?php echo $g['money_all_man'];?><img src="<?php echo IMG_PATH;?>l_logo/egg.gif"/></td>
				<td width="230" height="30" align="left">获得金蛋：<?php echo $g['getmoney'];?><img src="<?php echo IMG_PATH;?>l_logo/egg.gif"/></td>
                <td width="225" height="30" align="left">我的盈亏：
                <font color="red"><?php echo $g[getmoney]-$g[money_all_man];?></font>
                <img src="<?php echo IMG_PATH;?>l_logo/egg.gif"/>
                </td>
				<td width="225" height="30" align="left">盈亏比例：<font color="red">
                
                <?php if($g[getmoney]!='' && $g[flag]==1) { ?>
                <?php echo round(($g[getmoney]-$g[money_all_man])/$g[money_all_man],2)*100;?>%
                <?php } elseif ($g[getmoney]=='' && $g[flag]==0) { ?>
                -100%
                <?php } else { ?>
                --
                <?php } ?>
                </font></td>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</tr>
			</table>
		</div>
	</div>
</div>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=de5cd19b0f1b63a8d3e29beb03bfaf5a&sql=select+%2A+from+v9_download_data+where+id%3D%27%24id%27&num=1&return=data3\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id='$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data3 = $a;unset($a);?>
<?php $n=1;if(is_array($data3)) foreach($data3 AS $v) { ?>
<table width="930" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="auto" height="40" valign="middle">第<?php echo $v['termnum'];?>期明细</td>
    <td valign="middle">&nbsp;</td>
  </tr>
</table>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

<table width="936" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFB91F" align="center" style="color:black;" >
     <tr align="center">
      <td width="15%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">号码</td>
      <td width="24%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">赔率</td>
      <td width="30%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">我的投注额 </td>
      <td width="31%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">获得金豆</td>
      </tr>
    <?php for($i=0;$i<28;$i++){ ?> 
    <tr align="center" bgcolor="#FFFFFF">
		<td height="32" bgcolor="#FFFaC7"><img src="<?php echo IMG_PATH;?>l_logo/number_<?php echo $i;?>.gif" width="25" height="25" /></td>
		<td>
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7fae9c36d27196b856c574d96bff8439&sql=select+%2A+from+v9_download_data+where+id%3D%27%24id%27&num=1&return=data5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id='$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data5 = $a;unset($a);?>
		<?php $n=1;if(is_array($data5)) foreach($data5 AS $q) { ?>
		<?php echo floor($q[money_all]*0.98/$q["money_".$i]);?>
		<?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		</td>
		<td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=4c692467dd2a0cacce584e5957627a35&sql=select+%2A+from+v9_touzhu_personal+where+termnum%3D%27%24termnum%27+and+userid%3D%27%24_userid%27&num=1&return=data6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where termnum='$termnum' and userid='$_userid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data6 = $a;unset($a);?>
        <?php $n=1;if(is_array($data6)) foreach($data6 AS $p) { ?>
        <?php echo $p["money_".$i."_personal"];?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
		<td bgcolor="#FFFFFF">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=2553892fcd518e54a0ef07c01e00ee3e&sql=select+%2A+from+v9_touzhu_personal+where+termnum%3D%27%24termnum%27+and+userid%3D%27%24_userid%27&num=1&return=data7\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where termnum='$termnum' and userid='$_userid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data7 = $a;unset($a);?>
        <?php $n=1;if(is_array($data7)) foreach($data7 AS $w) { ?>
            <?php if($i==$bingo_four && $w[get_all_money]!='') { ?>
            <?php echo $w['get_all_money'];?>
            <?php } else { ?>
            -
            <?php } ?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        
        </td>
    </tr>
    <?php } ?>
</table>

</div>
<div class="content_bottom">&nbsp;</div>
</div>
</div>
<div class="bk10"></div>
<script language="JavaScript" src="<?php echo APP_PATH;?>api.php?op=count&id=<?php echo $id;?>&modelid=<?php echo $modelid;?>"></script>
<?php include template("content","footer"); ?>