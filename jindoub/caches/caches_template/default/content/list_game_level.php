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
    <div style="border:1px solid #ccc;width: 960px;height: auto;float: left;">
        <div style="width:948px;height: 27px;">
            <div class="title_game" style="float:left; width:740px;">
                <a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=24">
                <div style="width: 140px;height: 27px;color:red;background: url(<?php echo IMG_PATH;?>l_logo/ico_6.jpg) no-repeat;line-height: 27px;text-align: center;">幸运28红包争霸赛</div>
                </a>
            </div>
        </div>
        <div class="game_line"></div>
        <div style="height: 50px;width: 936px;">
            <table width="936" height="24" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="FCF8DA">
                <tr>
                    <?php $_userid = param::get_cookie('_userid');?>
                    <td width="50%" height="24" align="left" valign="middle" style="padding-left:10px">
                    <a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=33&id=<?php echo $_userid;?>" target="_parent" class="abt12_1"><strong>我的投注</strong></a><span class="wh12">|</span> <a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=35" target="_parent" class="abt12_2" id="level"><strong>排行榜</strong></a>
                    </td>
                </tr>
            </table>
        </div>
          <div class="content" style="float: left;width: 960px;padding-bottom: 20px;">
                  <!-- 今日  -->
                  <div style=" width:304px; border:1px solid #FFB91F; margin-left:78px; float:left; margin-top:8px;">
                      <table width="304" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFB91F" align="center" style="color:black;" >
                          <tr align="center">
                              <td colspan="3" background="<?php echo IMG_PATH;?>l_logo/jr28.gif" style="height: 57px">&nbsp;</td>
                          </tr>
                          <tr align="center" bgcolor="#FFFFFF">
                              <td width="12%" height="28" bgcolor="#F8F8F8"><span style="height: 28px"><strong>排名</strong></span></td>
                              <td width="35%" height="28" bgcolor="#FFFFFF"><strong>用户名</strong></td>
                              <td width="53%" height="28" bgcolor="#F8F8F8"><span style="height: 28px"><strong>赢豆总数</strong></span></td>
                          </tr>
                          <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=a431694efa8399c93a7793179916e06c&sql=select+username%2Cget_today+from+v9_member+where+get_today+%3E0+order+by+get_today+desc&num=100&return=data1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select username,get_today from v9_member where get_today >0 order by get_today desc LIMIT 100");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data1 = $a;unset($a);?>
                          <?php $i=1;?>
                          <?php $n=1;if(is_array($data1)) foreach($data1 AS $a) { ?>
                          <?php if($i==1) { ?>
                          <tr align="center" bgcolor="#FFFFFF">
                              <td height="1" colspan="3" bgcolor="#FFB91F" style="line-height:0px;"></td>
                          </tr>
                          <tr align="center" bgcolor="#FFFFFF">
                              <td height="34" bgcolor="#FFFaC7"><img src='<?php echo IMG_PATH;?>l_logo/n1.gif'/></td>
                              <td height="32"><?php echo $a['username'];?><img src="<?php echo IMG_PATH;?>l_logo/nb1.gif" width="18" height="18" align="absmiddle"/></td>
                              <td height="32" bgcolor="#FFFaC7"><?php echo $a['get_today'];?><img src="<?php echo IMG_PATH;?>l_logo/egg.gif"/></td>
                          </tr>
                          <?php } elseif ($i==2) { ?>
                          <tr align="center" bgcolor="#FFFFFF">
                              <td height="1" colspan="3" bgcolor="#FFB91F" style="line-height:0px;"></td>
                          </tr>
                          <tr align="center" bgcolor="#FFFFFF">
                              <td height="34" bgcolor="#FFFaC7"><img src='<?php echo IMG_PATH;?>l_logo/n2.gif'/></td>
                              <td height="32"><?php echo $a['username'];?><img src="<?php echo IMG_PATH;?>l_logo/nb2.gif" width="18" height="18" align="absmiddle"/></td>
                              <td height="32" bgcolor="#FFFaC7"><?php echo $a['get_today'];?><img src="<?php echo IMG_PATH;?>l_logo/egg.gif"/></td>
                          </tr>
                          <?php } elseif ($i==3) { ?>
                          <tr align="center" bgcolor="#FFFFFF">
                              <td height="1" colspan="3" bgcolor="#FFB91F" style="line-height:0px;"></td>
                          </tr>
                          <tr align="center" bgcolor="#FFFFFF">
                              <td height="34" bgcolor="#FFFaC7"><img src='<?php echo IMG_PATH;?>l_logo/n3.gif'/></td>
                              <td height="32"><?php echo $a['username'];?><img src="<?php echo IMG_PATH;?>l_logo/nb3.gif" width="18" height="18" align="absmiddle"/></td>
                              <td height="32" bgcolor="#FFFaC7"><?php echo $a['get_today'];?><img src="<?php echo IMG_PATH;?>l_logo/egg.gif"/></td>
                          </tr>
                          <?php } elseif ($i>3) { ?>
                          <tr align="center" bgcolor="#FFFFFF">
                              <td height="1" colspan="3" bgcolor="#FFB91F" style="line-height:0px;"></td>
                          </tr>
                          <tr align="center" bgcolor="#FFFFFF">
                              <td height="25" bgcolor="#FFFaC7"><?php echo $i;?></td>
                              <td height="24" bgcolor="#FFFFFF"><?php echo $a['username'];?></td>
                              <td height="24" bgcolor="#FFFaC7"><?php echo $a['get_today'];?><img src="<?php echo IMG_PATH;?>l_logo/egg.gif"/></td>
                          </tr>
                          <?php } ?>
                          <?php $i++;?>
                          <?php $n++;}unset($n); ?>
                          <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                      </table>  
                  </div>
                  <!-- 昨日  -->
                  <div style=" width:304px; border:1px solid #FFB91F; margin-left:200px; float:left; margin-top:8px;">
                      <table width="304" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFB91F" align="center" style="color:black;" >
                          <tr align="center">
                              <td colspan="3" background="<?php echo IMG_PATH;?>l_logo/zr28.gif" style="height: 57px">&nbsp;</td>
                          </tr>
                          <tr align="center" bgcolor="#FFFFFF">
                              <td width="12%" height="28" bgcolor="#F8F8F8"><span style="height: 28px"><strong>排名</strong></span></td>
                              <td width="35%" height="28" bgcolor="#FFFFFF"><strong>用户名</strong></td>
                              <td width="53%" height="28" bgcolor="#F8F8F8"><span style="height: 28px"><strong>赢豆总数</strong></span></td>
                          </tr>
                          <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=2c57ed0fa90445d359e41ab58453f295&sql=select+username%2Cget_yd+from+v9_member+where+get_yd+%3E0+order+by+get_yd+desc&num=100&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select username,get_yd from v9_member where get_yd >0 order by get_yd desc LIMIT 100");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
                          <?php $k=1;?>
                              <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=953dd2d57a0038660bc04967a4b6930e&sql=select+username%2Cget_yd+from+v9_member+where+get_yd+%3E0+order+by+get_yd+desc&num=100&return=data3\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select username,get_yd from v9_member where get_yd >0 order by get_yd desc LIMIT 100");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data3 = $a;unset($a);?>
                          
                          <?php $n=1;if(is_array($data3)) foreach($data3 AS $b) { ?>
                          <?php if($k==1) { ?>
                          <tr align="center" bgcolor="#FFFFFF">
                              <td height="1" colspan="3" bgcolor="#FFB91F" style="line-height:0px;"></td>
                          </tr>
                          <tr align="center" bgcolor="#FFFFFF">
                              <td height="34" bgcolor="#FFFaC7"><img src='<?php echo IMG_PATH;?>l_logo/n1.gif'/></td>
                              <td height="32"><?php echo $b['username'];?><img src="<?php echo IMG_PATH;?>l_logo/nb1.gif" width="18" height="18" align="absmiddle"/></td>
                              <td height="32" bgcolor="#FFFaC7"><?php echo $b['get_yd'];?><img src="<?php echo IMG_PATH;?>l_logo/egg.gif"/></td>
                          </tr>
                          <?php } elseif ($k==2) { ?>
                          <tr align="center" bgcolor="#FFFFFF">
                              <td height="1" colspan="3" bgcolor="#FFB91F" style="line-height:0px;"></td>
                          </tr>
                          <tr align="center" bgcolor="#FFFFFF">
                              <td height="34" bgcolor="#FFFaC7"><img src='<?php echo IMG_PATH;?>l_logo/n2.gif'/></td>
                              <td height="32"><?php echo $b['username'];?><img src="<?php echo IMG_PATH;?>l_logo/nb2.gif" width="18" height="18" align="absmiddle"/></td>
                              <td height="32" bgcolor="#FFFaC7"><?php echo $b['get_yd'];?><img src="<?php echo IMG_PATH;?>l_logo/egg.gif"/></td>
                          </tr>
                          <?php } elseif ($k==3) { ?>
                          <tr align="center" bgcolor="#FFFFFF">
                              <td height="1" colspan="3" bgcolor="#FFB91F" style="line-height:0px;"></td>
                          </tr>
                          <tr align="center" bgcolor="#FFFFFF">
                              <td height="34" bgcolor="#FFFaC7"><img src='<?php echo IMG_PATH;?>l_logo/n3.gif'/></td>
                              <td height="32"><?php echo $b['username'];?><img src="<?php echo IMG_PATH;?>l_logo/nb3.gif" width="18" height="18" align="absmiddle"/></td>
                              <td height="32" bgcolor="#FFFaC7"><?php echo $b['get_yd'];?><img src="<?php echo IMG_PATH;?>l_logo/egg.gif"/></td>
                          </tr>
                          <?php } elseif ($k>3) { ?>
                          <tr align="center" bgcolor="#FFFFFF">
                              <td height="1" colspan="3" bgcolor="#FFB91F" style="line-height:0px;"></td>
                          </tr>
                          <tr align="center" bgcolor="#FFFFFF">
                              <td height="25" bgcolor="#FFFaC7"><?php echo $k;?></td>
                              <td height="24" bgcolor="#FFFFFF"><?php echo $b['username'];?></td>
                              <td height="24" bgcolor="#FFFaC7"><?php echo $b['get_yd'];?><img src="<?php echo IMG_PATH;?>l_logo/egg.gif"/></td>
                          </tr> 
                          <?php } ?>
                          <?php $k=$k+1;?>
                          <?php $n++;}unset($n); ?>
                              <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                          <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?> 
                      </table>
                  </div>
          </div>
    </div>
</div>
<!-- <script type="text/javascript">
$(document).ready(function(){
    $("#level").click(function(){
        $.ajax({
            type: "POST",  
            url: "<?php echo APP_PATH;?>uplevel.php", 
            data:{},
            dataType: "text",
            success: function(data) {
              // if (data.success) { 
              //   alert(data.msg);
              // } else {
              //   alert("出现错误：" + data.msg);
              // }
                // alert(data);
            },
        });
    });
});
</script> -->
<?php include template("content","footer"); ?>