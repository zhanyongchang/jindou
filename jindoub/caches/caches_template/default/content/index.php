<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--main-->
<style type="text/css">
.fu{
    position: fixed;
    z-index: 999;
    left: 10%;
    top: 50%;
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
    top: 40%;
}
</style>
<div class="fu">
    <div class="ewm"><img src="<?php echo IMG_PATH;?>logo/kefu.jpg"></div>
    <div class="fu_zi">联&nbsp;&nbsp;系&nbsp;&nbsp;客&nbsp;&nbsp;服</div>
</div>
<div class="qun">
    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=b76fc8faf27249fbd4e8d989dc00afcf&sql=select+%2A+from+v9_page+where+keywords+%3D+%27%E4%BA%8C%E7%BB%B4%E7%A0%81%27+order+by+catid+desc&num=2&return=data99\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_page where keywords = '二维码' order by catid desc LIMIT 2");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data99 = $a;unset($a);?>
    <?php $n=1;if(is_array($data99)) foreach($data99 AS $ab) { ?>
    <div class="ewm"><?php echo $ab['content'];?></div>
    <div class="fu_zi"><?php echo $ab['title'];?></div>
    <div style="width: 100%;height: 20px;"></div>
    <?php $n++;}unset($n); ?>
    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
</div>
<div class="main">
    <div class="col-auto-ex" style="margin-left: 0">
    <div class="box">
        <div class="index_tips">
            <h5 class="title-2">登录奖励动态</h5>
        </div>
    <!--返利滚动开始-->
    <div class="index3beta_txdt" >
        <div style="height:275px; overflow:hidden;clear:both;" id="show">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=9729bc9e21e511d5e68c93015b31f3ba&sql=select+%2A+from+v9_addtype+where+jindounum+%3E+0+and+addtype+%3D3+order+by+addtime+desc&num=30&return=data8\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_addtype where jindounum > 0 and addtype =3 order by addtime desc LIMIT 30");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data8 = $a;unset($a);?>
        <?php $n=1;if(is_array($data8)) foreach($data8 AS $z) { ?>
            <div class='index3beta_txdtmain'>
            <ul>
            <li class='txdtnam'><a href='/pgComUserInfo.aspx?userid=18671298' target='_blank' class='blue_tx'><?php echo $z['username'];?></a></li>
            <li class='txdtmony'  style='color:#3B5888;'><?php echo $z['jindounum'];?>金豆</li>
            <li class='txdttim'>奖励了</li>
            </ul>
            </div>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

        </div>
    </div>
    <!--返利结束-->
    <!-- 返利轮播 -->
    </div>
<script type="text/javascript">
    var scroll_84 = new ifeng_Scroll("photolist_84", "pre_84", "next_84");
    scroll_84.IsAutoScroll = false;
    scroll_84.Speed = 20;
    scroll_84.IsSmoothScroll = false;
    scroll_84.PauseTime = 5000;
    scroll_84.Direction = "E";
    scroll_84.Step = 22;
    scroll_84.ControllerType = "click";
    scroll_84.BackCall = null;
    scroll_84.Init();
    scroll_84.Start();
</script>
<!-- 返利轮播 -->
<script type="text/javascript">
    function startmarquee(lh, speed1, delay) {
        var t;
        var oHeight = 251; /**//** div的高度 **/
        var p = false;
        var o = document.getElementById("show");
        var preTop = 0;
        o.scrollTop = 0;
        function start() {
            t = setInterval(scrolling, speed1);

            o.scrollTop += 1;

        }
        function scrolling() {
            if (o.scrollTop % lh != 0 && o.scrollTop % (o.scrollHeight - oHeight - 1) != 0) {
                preTop = o.scrollTop;
                o.scrollTop += 1;
                if (preTop >= o.scrollHeight || preTop == o.scrollTop) {
                    o.scrollTop = 0;
                }
            } else {
                clearInterval(t);
                setTimeout(start, delay);
            }
        }
        setTimeout(start, delay);
    }
    startmarquee(30, 20, 1000);
    /**//**startmarquee(一次滚动高度,速度,停留时间);**/
</script>
    </div>
    <div class="col-auto-ex">
    <div class="box">
        <div class="index_tips">
            <h5 class="title-2">推广奖励动态</h5>
        </div>
    <!--返利滚动开始-->
    <div class="index3beta_txdt" >
        <div style="height:275px; overflow:hidden;clear:both;" id="show_1">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=0c3add48e8d06e27d6263179e7348685&sql=select+%2A+from+v9_addtype+where+jindounum+%3E+0+and+addtype+%3D1+order+by+addtime+desc&num=30&return=data8\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_addtype where jindounum > 0 and addtype =1 order by addtime desc LIMIT 30");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data8 = $a;unset($a);?>
        <?php $n=1;if(is_array($data8)) foreach($data8 AS $z) { ?>
            <div class='index3beta_txdtmain'>
            <ul>
            <li class='txdtnam'><a href='/pgComUserInfo.aspx?userid=18671298' target='_blank' class='blue_tx'><?php echo $z['username'];?></a></li>
            <li class='txdtmony'  style='color:#3B5888;'><?php echo $z['jindounum'];?>金豆</li>
            <li class='txdttim'>奖励了</li>
            </ul>
            </div>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

        </div>
    </div>
    <!--返利结束-->
    <!-- 返利轮播 -->
    </div>
<script type="text/javascript">
    var scroll_84 = new ifeng_Scroll("photolist_84", "pre_84", "next_84");
    scroll_84.IsAutoScroll = false;
    scroll_84.Speed = 20;
    scroll_84.IsSmoothScroll = false;
    scroll_84.PauseTime = 5000;
    scroll_84.Direction = "E";
    scroll_84.Step = 22;
    scroll_84.ControllerType = "click";
    scroll_84.BackCall = null;
    scroll_84.Init();
    scroll_84.Start();
</script>
<!-- 返利轮播 -->
<script type="text/javascript">
    function startmarquee(lh, speed1, delay) {
        var t;
        var oHeight = 251; /**//** div的高度 **/
        var p = false;
        var o = document.getElementById("show_1");
        var preTop = 0;
        o.scrollTop = 0;
        function start() {
            t = setInterval(scrolling, speed1);

            o.scrollTop += 1;

        }
        function scrolling() {
            if (o.scrollTop % lh != 0 && o.scrollTop % (o.scrollHeight - oHeight - 1) != 0) {
                preTop = o.scrollTop;
                o.scrollTop += 1;
                if (preTop >= o.scrollHeight || preTop == o.scrollTop) {
                    o.scrollTop = 0;
                }
            } else {
                clearInterval(t);
                setTimeout(start, delay);
            }
        }
        setTimeout(start, delay);
    }
    startmarquee(30, 20, 1000);
    /**//**startmarquee(一次滚动高度,速度,停留时间);**/
</script>
    </div>
    <div class="col-auto-ex">
    <div class="box">
        <div class="index_tips">
            <h5 class="title-2">争霸奖励动态</h5>
        </div>
    <!--返利滚动开始-->
    <div class="index3beta_txdt" >
        <div style="height:275px; overflow:hidden;clear:both;" id="show_2">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7096c3f500fa08b3b2a2185b03f99537&sql=select+%2A+from+v9_addtype+where+jindounum+%3E+0+and+addtype+%3D2+order+by+addtime+desc&num=30&return=data8\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_addtype where jindounum > 0 and addtype =2 order by addtime desc LIMIT 30");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data8 = $a;unset($a);?>
        <?php $n=1;if(is_array($data8)) foreach($data8 AS $z) { ?>
            <div class='index3beta_txdtmain'>
            <ul>
            <li class='txdtnam'><a href='/pgComUserInfo.aspx?userid=18671298' target='_blank' class='blue_tx'><?php echo $z['username'];?></a></li>
            <li class='txdtmony'  style='color:#3B5888;'><?php echo $z['jindounum'];?>金豆</li>
            <li class='txdttim'>奖励了</li>
            </ul>
            </div>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

        </div>
    </div>
    <!--返利结束-->
    <!-- 返利轮播 -->
    </div>
<script type="text/javascript">
    var scroll_84 = new ifeng_Scroll("photolist_84", "pre_84", "next_84");
    scroll_84.IsAutoScroll = false;
    scroll_84.Speed = 20;
    scroll_84.IsSmoothScroll = false;
    scroll_84.PauseTime = 5000;
    scroll_84.Direction = "E";
    scroll_84.Step = 22;
    scroll_84.ControllerType = "click";
    scroll_84.BackCall = null;
    scroll_84.Init();
    scroll_84.Start();
</script>
<!-- 返利轮播 -->
<script type="text/javascript">
    function startmarquee(lh, speed1, delay) {
        var t;
        var oHeight = 251; /**//** div的高度 **/
        var p = false;
        var o = document.getElementById("show_2");
        var preTop = 0;
        o.scrollTop = 0;
        function start() {
            t = setInterval(scrolling, speed1);

            o.scrollTop += 1;

        }
        function scrolling() {
            if (o.scrollTop % lh != 0 && o.scrollTop % (o.scrollHeight - oHeight - 1) != 0) {
                preTop = o.scrollTop;
                o.scrollTop += 1;
                if (preTop >= o.scrollHeight || preTop == o.scrollTop) {
                    o.scrollTop = 0;
                }
            } else {
                clearInterval(t);
                setTimeout(start, delay);
            }
        }
        setTimeout(start, delay);
    }
    startmarquee(30, 20, 1000);
    /**//**startmarquee(一次滚动高度,速度,停留时间);**/
</script>
    </div>
    <div class="col-auto-ex">
    <div class="box">
        <div class="index_tips">
            <h5 class="title-2">购物返利动态</h5>
        </div>
    <!--返利滚动开始-->
    <div class="index3beta_txdt" >
        <div style="height:275px; overflow:hidden;clear:both;" id="show_3">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7fd151b334c0d22ccad23de475d0b248&sql=select+%2A+from+v9_addtype+where+jindounum+%3E+0+and+addtype+%3D4+order+by+addtime+desc&num=30&return=data8\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_addtype where jindounum > 0 and addtype =4 order by addtime desc LIMIT 30");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data8 = $a;unset($a);?>
        <?php $n=1;if(is_array($data8)) foreach($data8 AS $z) { ?>
            <div class='index3beta_txdtmain'>
            <ul>
            <li class='txdtnam'><a href='/pgComUserInfo.aspx?userid=18671298' target='_blank' class='blue_tx'><?php echo $z['username'];?></a></li>
            <li class='txdtmony'  style='color:#3B5888;'><?php echo $z['jindounum'];?>金豆</li>
            <li class='txdttim'>返利了</li>
            </ul>
            </div>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

        </div>
    </div>
    <!--返利结束-->
    <!-- 返利轮播 -->
    </div>
<script type="text/javascript">
    var scroll_84 = new ifeng_Scroll("photolist_84", "pre_84", "next_84");
    scroll_84.IsAutoScroll = false;
    scroll_84.Speed = 20;
    scroll_84.IsSmoothScroll = false;
    scroll_84.PauseTime = 5000;
    scroll_84.Direction = "E";
    scroll_84.Step = 22;
    scroll_84.ControllerType = "click";
    scroll_84.BackCall = null;
    scroll_84.Init();
    scroll_84.Start();
</script>
<!-- 返利轮播 -->
<script type="text/javascript">
    function startmarquee(lh, speed1, delay) {
        var t;
        var oHeight = 251; /**//** div的高度 **/
        var p = false;
        var o = document.getElementById("show_3");
        var preTop = 0;
        o.scrollTop = 0;
        function start() {
            t = setInterval(scrolling, speed1);

            o.scrollTop += 1;

        }
        function scrolling() {
            if (o.scrollTop % lh != 0 && o.scrollTop % (o.scrollHeight - oHeight - 1) != 0) {
                preTop = o.scrollTop;
                o.scrollTop += 1;
                if (preTop >= o.scrollHeight || preTop == o.scrollTop) {
                    o.scrollTop = 0;
                }
            } else {
                clearInterval(t);
                setTimeout(start, delay);
            }
        }
        setTimeout(start, delay);
    }
    startmarquee(30, 20, 1000);
    /**//**startmarquee(一次滚动高度,速度,停留时间);**/
</script>
    </div>
    <div class="bk10"></div>
	
	<div class="box blogroll ylink">
    	<h5><a href="<?php echo APP_PATH;?>index.php?m=link&siteid=<?php echo $siteid;?>" hidefocus="true" class="rt">更多>></a>友情链接</h5>
        <div class="bk10"></div>
	<ul class="colli imgul">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"link\" data=\"op=link&tag_md5=80574ec69aa2a6c10ed30f7c49e0eda7&action=type_list&siteid=%24siteid&linktype=1&order=listorder+DESC&num=8&return=pic_link\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$link_tag = pc_base::load_app_class("link_tag", "link");if (method_exists($link_tag, 'type_list')) {$pic_link = $link_tag->type_list(array('siteid'=>$siteid,'linktype'=>'1','order'=>'listorder DESC','limit'=>'8',));}?>
        <?php $n=1;if(is_array($pic_link)) foreach($pic_link AS $v) { ?>
        <li><a href="<?php echo $v['url'];?>" title="<?php echo $v['name'];?>" target="_blank"><img src="<?php echo $v['logo'];?>" width="88" height="31" /></a></li>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </ul>
     <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"link\" data=\"op=link&tag_md5=99c32cd273c57223c20074bf5196e97a&action=type_list&siteid=%24siteid&order=listorder+DESC&num=10&return=dat\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$link_tag = pc_base::load_app_class("link_tag", "link");if (method_exists($link_tag, 'type_list')) {$dat = $link_tag->type_list(array('siteid'=>$siteid,'order'=>'listorder DESC','limit'=>'10',));}?>
     <div class="bk10"></div>
	<div class="linka">
		<?php $n=1;if(is_array($dat)) foreach($dat AS $v) { ?>
              <?php if($type==0) { ?>
              <a href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['name'];?></a> |
              <?php } else { ?>
              <a href="<?php echo $v['url'];?>" target="_blank"><img src="<?php echo $v['logo'];?>" width="88" height="31" style="border: 1px solid #FFBE7A;"></a> 
              <?php } ?>
		<?php $n++;}unset($n); ?>
 	</div>
	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
</div>
</div>
<?php include template("content","footer"); ?>