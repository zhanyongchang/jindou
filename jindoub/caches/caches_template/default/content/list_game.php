<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<link href="<?php echo CSS_PATH;?>download.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>jd_css/main.css">
<link href="<?php echo CSS_PATH;?>jd_css/tm_fc.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>play28.js"></script>
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
    background-image: url(http://xiaojindou123.com/statics/images/l_logo/img_bt1.gif);
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
.touzhu2{background-image:url(<?php echo IMG_PATH;?>l_logo/touzhu2.gif); background-repeat:no-repeat;width:47px;height:33px;float:left;line-height:33px; text-align:center; color:#8d5000;margin-left:10px;; cursor:pointer;}
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
<div class="main">
<div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> &gt; </span><?php echo catpos($catid-1);?></div>
<div class="content">
<div class="content_top" >&nbsp;</div>
<div class="content_middle" style="height:auto"  >
<?php $_userid = param::get_cookie('_userid');?>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=cb10a992a4036de65dced54d15908875&sql=select+%2A+from+v9_member+where+userid%3D%27%24_userid%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_member where userid='$_userid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
<script language="javascript" type="text/javascript">

    var mypceggs = <?php echo $r['point'];?>; //我的金豆数

</script>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>    
 

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
<?php $id=$_GET['id'];?>
<?php $nid=$id-1;?>
<div style="width:936px;height: 30px;">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=846e848d0a7bf3712f49baee58a1a947&sql=select+%2A+from+v9_download_data+where+bingo_four+%3C%3E+%27%27+order+by+termnum+desc&num=1&return=data3\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where bingo_four <> '' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data3 = $a;unset($a);?>
<?php $n=1;if(is_array($data3)) foreach($data3 AS $q) { ?>
  <div style="width:auto; float:left; line-height:30px; height:30px; padding-left:12px;"><?php echo $q['termnum'];?>期开奖结果:<img src="<?php echo IMG_PATH;?>l_logo/number_<?php echo $q['bingo_four'];?>.gif" width="25" height="25" /></div>
  <div style="width:60%; text-align:center; border:1px; float :left; line-height:30px; height:30px; " id="RemainTitle"></div>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
</div>

<div class="content">
  <div class="border_out_l">
    <div class="border_out_title"><span style="float:left;width:auto;">标准投注模式</span></div> 
    <table  border="0" width="924" align="center">
          <tr>
            <td class="img_bt1" width="46" attr="0">全包</td>
            <td class="img_bt1" width="46" attr="1">单</td>
            <td class="img_bt1" width="46" attr="2">双</td>
            <td class="img_bt1" width="46" attr="3">大</td>
            <td class="img_bt1" width="46" attr="4">小</td>
            <td class="img_bt1" width="46" attr="5">中</td>
            <td class="img_bt1" width="46" attr="6">边</td>
            <td class="img_bt1" width="46" attr="7">大单</td>
            <td class="img_bt1" width="46" attr="8">小单</td>
            <td class="img_bt1" width="46" attr="9">大双</td>
            <td class="img_bt1" width="46" attr="10">小双</td>
            <td class="img_bt1" width="46" attr="11">大边</td>
            <td class="img_bt1" width="46" attr="12">小边</td>
            <td class="img_bt1" width="46" attr="13">单边</td>
            <td class="img_bt1" width="46" attr="14">双边</td>
            <td class="img_bt1" width="46" attr="15">0尾</td>
            <td class="img_bt1" width="46" attr="16">1尾</td>
            <td class="img_bt1" width="46" attr="17">2尾</td>
            <td class="img_bt1" width="46" attr="18">3尾</td>
            <td class="img_bt1" width="46" attr="19">4尾</td>
          </tr>
          <tr>
              <td class="img_bt1" width="46" attr="20">小尾</td>
              <td class="img_bt1" width="46" attr="21">5尾</td>
              <td class="img_bt1" width="46" attr="22">6尾</td>
              <td class="img_bt1" width="46" attr="23">7尾</td>
              <td class="img_bt1" width="46" attr="24">8尾</td>
              <td class="img_bt1" width="46" attr="25">9尾</td>
              <td class="img_bt1" width="46" attr="26">大尾</td>
              <td class="img_bt1" width="46" attr="27">3余0</td>
              <td class="img_bt1" width="46" attr="28">3余1</td>
              <td class="img_bt1" width="46" attr="29">3余2</td>
              <td class="img_bt1" width="46" attr="30">4余0</td>
              <td class="img_bt1" width="46" attr="31">4余1</td>
              <td class="img_bt1" width="46" attr="32">4余2</td>
              <td class="img_bt1" width="46" attr="33">4余3</td>
              <td class="img_bt1" width="46" attr="34">5余0</td>
              <td class="img_bt1" width="46" attr="35">5余1</td>
              <td class="img_bt1" width="46" attr="36">5余2</td>
              <td class="img_bt1" width="46" attr="37">5余3</td>
            <td class="img_bt1" width="46" attr="38">5余4</td>
            <td class="img_bt1" width="46" attr="39">随便</td>
          </tr>
      </table>
  </div>
  <!-- <div class="border_wg" id="stoptip" style="display:none;">
  为了保护您的投注安全，<strong style="color:#ff0000; font-weight:bold;">您的投注已被暂停</strong>！<span id="stopsubtip">您的账号要到<strong style="color:#ff0000; font-weight:bold;">2012-2-14 12:12</strong>才能恢复投注。</span><br/>
  </div> -->
  <form method="post" action="<?php echo APP_PATH;?>touzhu.php" id="formid">
  <?php $_userid = param::get_cookie('_userid');?>
  <input type="hidden" name="userid" value="<?php echo $_userid;?>">
  <?php $id=$_GET['id']?>
  <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=eb4f01b89bd3b4c590d26964ce626c72&sql=select+%2A+from+v9_download_data+where+id%3D%27%24id%27&num=1&return=data12\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id='$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data12 = $a;unset($a);?>
  <?php $n=1;if(is_array($data12)) foreach($data12 AS $z) { ?>
  <input type="hidden" name="termnum" value="<?php echo $z['termnum'];?>">
  <?php $n++;}unset($n); ?>
  <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
  <div class="border_out1">
    <div class="border_out1_l" id="border_out1_l">
      <span>0.1倍</span><span>0.5倍</span><span>0.8倍</span><span>1.2倍</span><span>1.5倍</span><span>2倍</span><span>10倍</span><span>100倍</span><span>梭哈</span>
    </div>
    <div class="border_out1_c" style="width: 304px;margin-left:22px;">
      <div style="float:left;width:76px;padding-left:16px;">总投注金豆：</div>
      <div style="color:#ff0000; font-weight:bold;width:90px;float:left; overflow:hidden" id="totalvalue"></div>
      <input type="hidden" name="totalvalue_put" id="totalvalue_put" value="">
      <div class="conform_btn"  onclick="comform()" id="conform_btn">确认投注</div>
    </div>
    <div class="border_out1_r" style="width: auto;">
      <div class="touzhu1" onclick="location.href=''">刷新赔率</div>
      <div class="touzhu2"> 反选</div>
      <div class="touzhu2"> 清除</div>
    </div>
  </div>

    <div class="content_middle" style="height:auto; width:934px;margin:auto;" id="panel" >
    <input class="input2" id="SMONEYY" name="SMONEYY" type="hidden" value="ALD" /> 
      <table width="467" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFB91F" align="left" style="color:Black;">
      <tr align="center" height="20">
        <td width="50" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" >号码</td>
        <td width="71" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif">上期赔率</td>
        <td width="71" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif">当前赔率</td>
        <td width="53" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif">请选择</td>
        <td width="130" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif">投注</td>
        <td width="80" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif">倍数</td>
      </tr>
      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_0.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_0]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_0]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox0" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY0" style="width:110px;ime-mode:disabled" id="txt0" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_0_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY0" style="width:110px;ime-mode:disabled" id="txt0" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_1.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_1]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_1]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox1" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY1" style="width:110px;ime-mode:disabled" id="txt1" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_1_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY1" style="width:110px;ime-mode:disabled" id="txt1" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_2.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_2]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_2]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox2" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY2" style="width:110px;ime-mode:disabled" id="txt2" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_2_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY2" style="width:110px;ime-mode:disabled" id="txt2" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_3.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_3]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_3]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox3" /></td>
       <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY3" style="width:110px;ime-mode:disabled" id="txt3" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_3_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY3" style="width:110px;ime-mode:disabled" id="txt3" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_4.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_4]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_4]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox4" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY4" style="width:110px;ime-mode:disabled" id="txt4" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_4_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY4" style="width:110px;ime-mode:disabled" id="txt4" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_5.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_5]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_5]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox5" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY5" style="width:110px;ime-mode:disabled" id="txt5" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_5_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY5" style="width:110px;ime-mode:disabled" id="txt5" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_6.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_6]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_6]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox6" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY6" style="width:110px;ime-mode:disabled" id="txt6" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_6_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY6" style="width:110px;ime-mode:disabled" id="txt6" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_7.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_7]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_7]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox7" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY7" style="width:110px;ime-mode:disabled" id="txt7" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_7_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY7" style="width:110px;ime-mode:disabled" id="txt7" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_8.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_8]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_8]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox8" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY8" style="width:110px;ime-mode:disabled" id="txt8" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_8_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY8" style="width:110px;ime-mode:disabled" id="txt8" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_9.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_9]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_9]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox9" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY9" style="width:110px;ime-mode:disabled" id="txt9" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_9_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY9" style="width:110px;ime-mode:disabled" id="txt9" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_10.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_10]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_10]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox10" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY10" style="width:110px;ime-mode:disabled" id="txt10" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_10_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY10" style="width:110px;ime-mode:disabled" id="txt10" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_11.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_11]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_11]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox11" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY11" style="width:110px;ime-mode:disabled" id="txt11" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_11_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY11" style="width:110px;ime-mode:disabled" id="txt11" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_12.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_12]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_12]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox12" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY12" style="width:110px;ime-mode:disabled" id="txt12" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_12_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY12" style="width:110px;ime-mode:disabled" id="txt12" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_13.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_13]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_13]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox13" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY13" style="width:110px;ime-mode:disabled" id="txt13" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_13_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY13" style="width:110px;ime-mode:disabled" id="txt13" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>
      </table>
    <table width="467" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFB91F" align="right" style="color:Black;" >
      <tr align="center" height="20">
        <td width="50"   background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif">号码</td>
        <td  background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif">上期赔率</td>
        <td  background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif">当前赔率</td>
        <td   background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif">请选择</td>
        <td width="130"    background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif">投注</td>
        <td   background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="width: 80px">倍数</td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_27.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_27]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_27]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox27" />        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY27" style="width:110px;ime-mode:disabled" id="txt27" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_27_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY27" style="width:110px;ime-mode:disabled" id="txt27" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td style="width: 80px"><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_26.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_26]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_26]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox26" />        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY26" style="width:110px;ime-mode:disabled" id="txt26" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_26_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY26" style="width:110px;ime-mode:disabled" id="txt26" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td style="width: 80px"><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_25.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_25]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_25]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox25" />        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY25" style="width:110px;ime-mode:disabled" id="txt25" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_25_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY25" style="width:110px;ime-mode:disabled" id="txt25" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td style="width: 80px"><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_24.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_24]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_24]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox24" />        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY24" style="width:110px;ime-mode:disabled" id="txt24" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_24_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY24" style="width:110px;ime-mode:disabled" id="txt24" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td style="width: 80px"><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_23.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_23]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_23]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox23" />        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY23" style="width:110px;ime-mode:disabled" id="txt23" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_23_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY23" style="width:110px;ime-mode:disabled" id="txt23" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td style="width: 80px"><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_22.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_22]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_22]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox22" />        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY22" style="width:110px;ime-mode:disabled" id="txt22" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_22_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY22" style="width:110px;ime-mode:disabled" id="txt22" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td style="width: 80px"><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_21.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_21]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_21]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox21" />        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY21" style="width:110px;ime-mode:disabled" id="txt21" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_21_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY21" style="width:110px;ime-mode:disabled" id="txt21" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td style="width: 80px"><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_20.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_20]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_20]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox20" />        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY20" style="width:110px;ime-mode:disabled" id="txt20" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_20_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY20" style="width:110px;ime-mode:disabled" id="txt20" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td style="width: 80px"><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_19.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_19]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_19]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox19" />        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY19" style="width:110px;ime-mode:disabled" id="txt19" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_19_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY19" style="width:110px;ime-mode:disabled" id="txt19" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td style="width: 80px"><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_18.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_18]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_18]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox18" />        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY18" style="width:110px;ime-mode:disabled" id="txt18" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_18_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY18" style="width:110px;ime-mode:disabled" id="txt18" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td style="width: 80px"><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_17.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_17]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_17]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox17" />        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY17" style="width:110px;ime-mode:disabled" id="txt17" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_17_personal'];?>" />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY17" style="width:110px;ime-mode:disabled" id="txt17" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="" />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td style="width: 80px"><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_16.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_16]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_16]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox16" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY16" style="width:110px;ime-mode:disabled" id="txt16" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_16_personal'];?>"/>
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY16" style="width:110px;ime-mode:disabled" id="txt16" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value=""/>
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td style="width: 80px"><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_15.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_15]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_15]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox15"/>        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY15" style="width:110px;ime-mode:disabled" id="txt15" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_15_personal'];?>"/>
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY15" style="width:110px;ime-mode:disabled" id="txt15" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value=""/>
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td style="width: 80px"><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>

      <tr align="center" bgcolor="#FFFFFF" height="27">
        <td><img src="<?php echo IMG_PATH;?>l_logo/number_14.gif" width="25" height="25" /></td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=47ef715aa8c289a3c29130bc56dfa5a7&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24nid%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$nid' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
        <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
        <?php echo floor($v[money_all]*0.98/$v[money_14]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7e56c4d7eefdd517225e74a72fc60f6a&sql=select+%2A+from+v9_download_data+where+id+%3D+%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where id = '$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php echo floor($r[money_all]*0.98/$r[money_14]);?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td><input type="checkbox" name="checkboxd" value="checkbox" id="checkbox14" />        </td>
        <td>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=91f623e619542cb8033d745ef8b9de0b&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=1&return=data98\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data98 = $a;unset($a);?>
        <?php if($data98!='') { ?>
        <?php $n=1;if(is_array($data98)) foreach($data98 AS $ac) { ?>
        <input type="text"  class="input2"  name="SMONEY14" style="width:110px;ime-mode:disabled" id="txt14" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value="<?php echo $ac['money_14_personal'];?>"  />
        <?php $n++;}unset($n); ?>
        <?php } else { ?>
        <input type="text"  class="input2"  name="SMONEY14" style="width:110px;ime-mode:disabled" id="txt14" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" maxlength="9" value=""  />
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </td>
        <td style="width: 80px"><input class="input3" name="Add" value=".5" type="button"/> <input class="input3" name="Add" value="2" type="button"/> <input class="input3" name="Add" value="10" type="button"/></td>
      </tr>
      </table>
    </div>
    </form>
</div>
</div>
<div class="content_bottom">&nbsp;</div>
</div>
</div>
<script src="http://cdn.static.runoob.com/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  var i;
  var alltou = 0;
  for(i=0;i<28;i++){
    var txt = $("#txt"+i).val();
    if(txt!=0){
      $("#checkbox"+i).prop('checked',true);
    }else{
      $("#checkbox"+i).prop('checked',false);
    }
    alltou = alltou*1+txt*1;
    
  }
  $('#totalvalue_put').val(alltou);
  $('#totalvalue').text(alltou);
});
</script>
<div class="bk10"></div>
<?php include template("content","footer"); ?>