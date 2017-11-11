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

<!-- <script type="text/javascript">  
var timeDiff=new Date().valueOf()-<?php echo time()*1000;?>;  
function serverTime(){  
        this.date = new Date();  
        date.setTime(new Date().valueOf()-timeDiff);  
        this.year        =date.getFullYear();  
        this.month        =date.getMonth()+1;  
        this.day        =date.getDate();  
        this.hour        =date.getHours() < 10 ? "0" + date.getHours() : date.getHours();  
        this.minute =date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();  
        this.second =date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();  
        var s=year+'年'+month+'月'+day+'日 '+hour+':'+minute+':'+second;  
        document.getElementById("serverTime").innerHTML=s;  
}  
function localTime(){  
        this.date = new Date();  
        this.year        =date.getFullYear();  
        this.month        =date.getMonth()+1;  
        this.day        =date.getDate();  
        this.hour        =date.getHours() < 10 ? "0" + date.getHours() : date.getHours();  
        this.minute =date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();  
        this.second =date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();  
        var s=year+'年'+month+'月'+day+'日 '+hour+':'+minute+':'+second;  
        document.getElementById("localTime").innerHTML=s;  
}  
window.onload=function(){  
        serverTime();  
        localTime();          
        setInterval(function(){  
                serverTime();  
                localTime();  
        }, 1000);  
}  
</script>   -->
<!--main-->

<!-- <table width="100%" border="0">  
  <tr>  
    <td width="110" align="right">服务器时间：</td>  
    <td><span id="serverTime"></span> </td>  
  </tr>  
  <tr>  
    <td align="right">本地时间：</td>  
    <td><span id="localTime"></span> </td>  
  </tr>  
</table>  --> 
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
                  <a href="">
                  <div style="width: 140px;height: 27px;color:red;background: url(<?php echo IMG_PATH;?>l_logo/ico_6.jpg) no-repeat;line-height: 27px;text-align: center;">幸运28红包争霸赛</div>
                  <!-- <img src="<?php echo IMG_PATH;?>l_logo/ico_6.gif" width="98" height="27" border="0" /> -->
                  </a>
              </div>
          </div>
          <div class="game_line"></div>  
          <table width="936" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="FCF8DA">
              <tr>
                  <?php $_userid = param::get_cookie('_userid');?>
                  <td width="50%" height="24" align="left" valign="middle" style="padding-left:10px">
                  <a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=33&id=<?php echo $_userid;?>" target="_parent" class="abt12_1"><strong>我的投注</strong></a><span class="wh12">|</span> <a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=35" target="_parent" class="abt12_2" id="level"><strong>排行榜</strong></a>
                  <div id='time1'></div>
                  </td>
              </tr>
          </table>
      </div>
      <table width="936" border="0" cellspacing="0" cellpadding="0" align="center"> 
          <tr valign="top">
              <td align="center" height='30' width="936" valign="middle" >
                  <div class="xy2820131227" style=" height:90px;  margin-top:8px; margin-bottom:8px;" >
                      <div class="xy2820131227_l"  style=" height:90px;  width:623px">
                          <div style="text-align:center; height:50px;line-height:60px;">
                              <span id="LReload" class="form_game"></span> 
                              <span id="LSound" class="form_game"></span>
                              <span id="Sound" ></span>
                              <span id="RemainTitle" ></span>
                              <span id="RemainS" ></span>
                              &nbsp;&nbsp;&nbsp;
                          </div>
                          <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=580d7953ffe365df60ea31809434e630&sql=select+%2A+from+v9_download_data+where+bingo_four%21%3D%27%27+order+by+id+desc&num=1&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where bingo_four!='' order by id desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
                          <?php $n=1;if(is_array($data2)) foreach($data2 AS $v) { ?>
                          <div style="text-align:center; height:40px; line-height:30px;">
                                幸运28第<strong style="color:#ff0000;"></strong><span style="color: red;font-size:12px;font-weight:600;"><?php echo $v['termnum'];?></span>期开奖结果：<?php echo $v['bingo_one'];?> + <?php echo $v['bingo_two'];?> + <?php echo $v['bingo_three'];?> =<img src="<?php echo IMG_PATH;?>l_logo/number_<?php echo $v['bingo_four'];?>.gif" width="25" height="25" align="absmiddle" /> 
                          </div>
                          <?php $n++;}unset($n); ?>
                          <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                      </div>
                  </div>
              </td>
          </tr>
      </table>

      <table width="936" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFB91F" align="center" style="color:Black;margin-bottom:4px;" id="panel" >
          <tr align="center">
              <td width="9%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">期号</td>
              <td width="12%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">开奖时间</td>
              <td width="20%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">开奖结果</td>
              <td width="10%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">已投注数</td>
              <td width="16%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">金豆总数</td>
              <td width="11%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">中奖人数</td>
              <td width="12%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">金豆盈亏</td>
              <td width="10%" background="<?php echo IMG_PATH;?>l_logo/xy28_bg.gif" style="height: 28px">参与</td>
          </tr>
          <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=cd339d6b00f5b8dc58d6384db5bb67e3&sql=select+%2A+from+v9_download_data+order+by+id+desc&num=30&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$pagesize = 30;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$r = $get_db->sql_query("SELECT COUNT(*) as count FROM (select * from v9_download_data order by id desc) T");$s = $get_db->fetch_next();$pages=pages($s['count'], $page, $pagesize, $urlrule);$r = $get_db->sql_query("select * from v9_download_data order by id desc LIMIT $offset,$pagesize");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
          <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
          <tr align="center" bgcolor="#FFFFFF">
          
              <td height="32" bgcolor="#FFFaC7"><?php echo $r['termnum'];?></td>
              <td height="28" bgcolor="#FFFFFF"><?php echo $r['win_time'];?></td>
              <td bgcolor="#FFFFFF">
              <?php if($r[bingo_four]!="") { ?>
              <img src="<?php echo IMG_PATH;?>l_logo/number_<?php echo $r['bingo_four'];?>.gif" width="25" height="25" align="absmiddle" /> 
              <?php } else { ?>
              -
              <?php } ?>
              </td>
              <td bgcolor="#FFFFFF"><?php echo $r['man_all'];?></td>
              <td bgcolor="#FFFFFF"><?php echo $r['money_all'];?><img src="<?php echo IMG_PATH;?>l_logo/egg.gif"/></td>
              <td height="28" bgcolor="#FFFFFF"><?php echo $r['man_bingo'];?></td>
              <td bgcolor="#FFFFFF">
              <?php if($r[bingo_four]!="") { ?>
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
                  $sql_a="SELECT * FROM v9_touzhu_personal where termnum=".$r[termnum]." and userid='$_userid'";
                  mysqli_query($con, "set names utf8");
                  $result_a = mysqli_query($con, $sql_a);
                  $rs_a = mysqli_fetch_assoc($result_a);
                  echo $rs_a['getmoney']-$rs_a['money_all_man'];
              ?>
              <?php } else { ?>
              -
              <?php } ?>
              </td>
              <td bgcolor="#FFFFFF">
              <?php if($r[bingo_four]=="") { ?>
              <a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=31&id=<?php echo $r['id'];?>" style="color: red;" class="buy">投注</a>
              <?php } else { ?>
              <a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=32&id=<?php echo $r['id'];?>" style="color: #333333;">已开奖</a>
              <?php } ?>
              </td>
          </tr>   
          <?php $n++;}unset($n); ?>
          
      </table>
      <div id="pages" class="text-c"><?php echo $pages;?></div>
      <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?> 
    </div> 
    
</div>
<div class="bk10"></div>
<input type="hidden" name="checkvip" id="checkvip" value="<?php echo $_userid;?>">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=9e2a906ad809244aaa919f5351d94db6&sql=select+%2A+from+v9_download_data+where+bingo_four+%21%3D%27%27+order+by+id+desc&num=1&return=data8\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_download_data where bingo_four !='' order by id desc LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data8 = $a;unset($a);?>
<?php $n=1;if(is_array($data8)) foreach($data8 AS $x) { ?>
<input type="hidden" name="" id="hid_input" value="<?php echo $x[termnum]+1;?>">
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
<script type="text/javascript">
$(window).ready(function() {
    getMyTime();
    interval=setInterval('getMyTime()',1000);

    var checkvip=document.getElementById('checkvip').value;
    $.ajax({
        type: "POST",  
        url: "http://www.xiaojindou123.com/checkvip.php", 
        data:{checkvip:checkvip},
        dataType: "json",
        success: function(data) {
          // if (data.success) { 
          //   alert(data.msg);
          // } else {
          //   alert("出现错误：" + data.msg);
          // }
          if(data!=1){
            alert(data);
          }
        },
    });
});
//0.时间前面补0
function p(n){
  return n<10?'0'+n:n;
}
var timeDiff=new Date().valueOf()-<?php echo time()*1000;?>;
//1.当前时间
function getMyTime(){
    
    var myDate=new Date();
    myDate.setTime(new Date().valueOf()-timeDiff);
          var year=myDate.getFullYear();
          var month=myDate.getMonth()+1;
          var day=myDate.getDate();
          var hour=myDate.getHours();
          var minute=myDate.getMinutes();
          var second=myDate.getSeconds();

          if(hour>=8 && hour<=21){
              var startDate=myDate;
              var endDate=new Date(startDate.getTime()+1000*60);
              var maxs=60-endDate.getSeconds();
              var maxtime=maxs;
              var termnum=document.getElementById('hid_input').value;
              if(maxtime>0 && maxtime<58){
                  var stopSencond=maxtime-10;

                  document.getElementById("RemainTitle").innerHTML="第<strong>"+termnum+"</strong>期"; 
                    if(stopSencond<=0){
                        document.getElementById("RemainS").innerHTML="已经停止投注，还有<strong style='color:#ff0000;'>"+maxtime+"</strong>秒开奖 ";
                        $(".buy").click(function(){
                          $(this).removeAttr('href');
                        });
                    }else{
                        document.getElementById("RemainS").innerHTML="还有<strong style='color:#ff0000;'>"+stopSencond+"</strong>秒停止投注，<strong style='color:#ff0000;'>"+maxtime+"</strong>秒开奖 "; 
                    }
                  maxtime=maxtime-1;
                  stopSencond=stopSencond-1;
              }else{
                  
                  document.getElementById("RemainTitle").innerHTML="<strong>第"+termnum+"期</strong>"; 
                  // document.getElementById("RemainS").innerHTML= "已开奖 <a href='' style='color:red; font-size:12px;' id='replay'>请刷新</a>";
                  document.getElementById("RemainS").innerHTML= "开奖中";
                  
                  if(second==2){
                      // document.getElementById("RemainTitle").innerHTML="<strong>第"+termnum+"期</strong>"; 
                      // document.getElementById("RemainS").innerHTML= "已开奖 <a href='' style='color:red; font-size:12px;' id='replay'>请刷新</a>";
                      // clearInterval(interval); 
                      history.go(0);
                  }
              }
          }
          document.getElementById('time1').innerHTML=year+'年'+p(month)+'月'+p(day)+'日'+'&nbsp;'+p(hour)+':'+p(minute)+':'+p(second);
          // var t=setInterval(function(){
          //   getMyTime()},1000);
    
}

</script>

<?php include template("content","footer"); ?>