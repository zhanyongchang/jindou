<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<link href="<?php echo CSS_PATH;?>download.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.game_line {
    height: 7px;
    width: 948px;
    margin: 0 auto 6px auto;
    background: url(<?php echo IMG_PATH;?>l_logo/orange-line.gif) repeat-x;
    float: left;
}
.xy2820131227 {
    width: 934px;
    height: 46px;
    border: 1px solid #ffb91f;
    margin: 0 auto;
    margin-top: 0px;
    margin-bottom: 0px;
    margin-bottom: 2px;
}

</style>

<!--main-->
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
    <div class="crumbs"><a href="#">首页</a><span> &gt; </span><?php echo catpos($catid);?></div>
    <div style="border:1px solid #ccc;">
      <div class="content_middle" style="height:auto;">
          <div style="width:948px">
              <div class="title_game" style="float:left; width:740px;">
                  <a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=24">
                  <div style="width: 140px;height: 27px;color:red;background: url(<?php echo IMG_PATH;?>l_logo/ico_6.jpg) no-repeat;line-height: 27px;text-align: center;">幸运28红包争霸赛</div>
                  </a>
              </div>
          </div>
          <div class="game_line"></div>
          <table width="936" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="FCF8DA" style="margin-bottom: 10px;">
              <tr>
                  <?php $_userid = param::get_cookie('_userid');?>
                  <td width="50%" height="24" align="left" valign="middle" style="padding-left:10px">
                  <a href="" target="_parent" class="abt12_1"><strong>我的投注</strong></a><span class="wh12">|</span> <a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=35" target="_parent" class="abt12_2" id="level"><strong>排行榜</strong></a>
                  </td>
              </tr>
          </table>
          <div class="content">
              <div class="content_middle" style="height:auto">
                  <!-- <div class="tzbanner_z" style="margin-bottom:60px;">
                      <div class="tzbanner_fk fk_tb"></div>
                      <div class="tzbanner_fk fk_wz">
                        <table width="378" border="0" cellspacing="0" cellpadding="0" align="center" >
                          <tr>
                            <td width="189" height="50" align="left" style="font-size: 18px;">今日盈亏：<font color="red">-- </font></td>
                            <td width="189" height="50" align="left" style="font-size: 18px;">昨日盈亏：<font color="red">--</font></td>
                          </tr>
                        </table>
                      </div>
                  </div> -->
                  <?php $_userid = param::get_cookie('_userid')?>
                  <table width="936" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFB91F" align="center" style="color:Black;" >
                  <tr align="center">
                      <td width="12%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">期号</td>
                      <td width="10%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">状态</td>
                      <td width="18%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">我的投注额</td>
                      <td width="10%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">盈亏</td>
                      <td width="10%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">奖励金豆</td>
                      <td width="10%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">获得的金豆</td>
                      <td width="10%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">盈亏比例</td>
                      <td width="10%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">详细</td>
                  </tr>
                  <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=9bb817309c2ad198739282e7e09bba2c&sql=select+%2A+from+v9_touzhu_personal+where+userid%3D%27%24_userid%27+order+by+termnum+desc&num=30&page=%24page&return=data1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$pagesize = 30;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$r = $get_db->sql_query("SELECT COUNT(*) as count FROM (select * from v9_touzhu_personal where userid='$_userid' order by termnum desc) T");$s = $get_db->fetch_next();$pages=pages($s['count'], $page, $pagesize, $urlrule);$r = $get_db->sql_query("select * from v9_touzhu_personal where userid='$_userid' order by termnum desc LIMIT $offset,$pagesize");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data1 = $a;unset($a);?>
                  <?php $n=1;if(is_array($data1)) foreach($data1 AS $r) { ?>
                  <tr align="center" bgcolor="#FFFFFF" height="28px">
                      <td bgcolor="#FFFFFF"><?php echo $r['termnum'];?></td>

                      <td bgcolor="#FFFFFF">
                      <?php if($r[flag]!='') { ?>
                      已开奖
                      <?php } else { ?>
                      待开奖
                      <?php } ?>
                      </td>

                      <td bgcolor="#FFFFFF"><?php echo $r['money_all_man'];?></td>

                      <td bgcolor="#FFFFFF">
                      <?php if($r[getmoney]!='') { ?>
                      <?php echo $r[getmoney]-$r[money_all_man];?>
                      <?php } else { ?>
                      --
                      <?php } ?>
                      </td>

                      <td bgcolor="#FFFFFF">
                      <?php if($r[getmoney]!='') { ?>
                      <?php echo $r[reward];?>
                      <?php } else { ?>
                      --
                      <?php } ?>
                      </td>

                      <td bgcolor="#FFFFFF">
                      <?php if($r[get_all_money]!='') { ?>
                      <?php echo $r['get_all_money'];?>
                      <?php } else { ?>
                      --
                      <?php } ?>
                      </td>

                      <td bgcolor="#FFFFFF">
                      <?php if($r[getmoney]!='' && $r[flag]==1) { ?>
                      <?php echo round(($r[getmoney]-$r[money_all_man])/$r[money_all_man],2)*100;?>%
                      <?php } elseif ($r[getmoney]=='' && $r[flag]==0) { ?>
                      -100%
                      <?php } else { ?>
                      --
                      <?php } ?>
                      </td>

                      <td bgcolor="#FFFFFF">
                      <?php if($r[flag]!='') { ?>
                      <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7d21b17a362bba71e189e46dfd71777f&sql=select+%2A+from+v9_download_data+where+termnum%3D%27%24r%5Btermnum%5D%27&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where termnum='$r[termnum]' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
                      <?php $n2=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
                      <a href="http://xiaojindou123.com/index.php?m=content&c=index&a=lists&catid=32&id=<?php echo $v['id'];?>">详情</a>
                      <?php $n2++;}unset($n2); ?>
                      <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                      <?php } else { ?>
                      待开奖
                      <?php } ?>
                      </td>
                  </tr>
                  <?php $n++;}unset($n); ?>
                  </table>
                <div id="pages" class="text-c"><?php echo $pages;?></div>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>
        </div>
      </div>       
    </div> 
</div>
<?php include template("content","footer"); ?>