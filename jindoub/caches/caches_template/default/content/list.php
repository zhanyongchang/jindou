<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--main-->
<style type="text/css">
.main .tab_bbs_tl{
    width: 950px;
    height: 33px;
}
.main .tab_bbs_tl ul li{
    float: left;
    font-size: 14px;
    margin-right: 10px;
}
.tb_bbs_img{width:180px; height:auto; border:1px solid #eeeeee; padding:5px; background-color:#fff; margin-top:6px;margin-bottom: 4px;}
.tb_bbs_word_m{width:172px; margin:0 auto; text-align:left; color:#515151; line-height:22px; margin-top:4px; height:90px;}
.tb_bbs_zs{width:172px; margin:0 auto;}
.jyg_xx{height:30px; padding-top:8px;}
.jyg_xx_jg{float:left;font:22px arial; color:#c60100;}
.jyg_xx_jg small{font-size:16px}
.jyg_xx_an{float:right;}
.jyg_xx_jgsc_top {
    background-color: #fedd00;
    font-size: 12px;
    line-height: 14px;
    height: 14px;
    font-family: Arial;
    color: #ff2d00;
    display: inline-block;
    padding: 0 2px;
}
.menu_a{
    background: blue;
    color: #fff;
}
.selected{ background: #0093db; padding: 0 10px; color: #fff }
.selected a{ color: #fff }
.li_lianxi{position: relative;}
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
</style>
<!-- <div class="fu">
    <div class="ewm"><img src="<?php echo IMG_PATH;?>logo/kefu.jpg"></div>
    <div class="fu_zi">联&nbsp;&nbsp;系&nbsp;&nbsp;客&nbsp;&nbsp;服</div>
</div> -->
<div class="main">
    <div class="tab_bbs_tl">
        <ul id="menu"> 
          <li style="margin-left:6px;" id="li_all"><a href="<?php echo $url;?>&type=all" >全部</a></li>
          <li><img class="topmargin" src="<?php echo IMG_PATH;?>l_logo/sline_h.png"></li>
          <!-- <li id="li_duobao"><a href="<?php echo $url;?>&type=duobao">夺宝</a></li>
          <li><img class="topmargin" src="<?php echo IMG_PATH;?>l_logo/sline_h.png"></li> -->
          <li id="li_jingcai"><a href="<?php echo $url;?>&type=jingcai">竞猜</a></li>
          <li><img class="topmargin" src="<?php echo IMG_PATH;?>l_logo/sline_h.png"></li>
          <li id="li_duijiang"><a href="<?php echo $url;?>&type=duijiang">兑奖</a></li>
          <li><img class="topmargin" src="<?php echo IMG_PATH;?>l_logo/sline_h.png"></li>
          <li id="li_huodong"><a href="<?php echo $url;?>&type=huodong">活动</a></li>
          <li><img class="topmargin" src="<?php echo IMG_PATH;?>l_logo/sline_h.png"></li>
          <li id="li_gonggao"><a href="<?php echo $url;?>&type=gonggao">公告</a></li>
          <li><img class="topmargin" src="<?php echo IMG_PATH;?>l_logo/sline_h.png"></li>
          <li id="li_fuwu"><a href="<?php echo $url;?>&type=fuwu">疑难解答</a></li>
          <li><img class="topmargin" src="<?php echo IMG_PATH;?>l_logo/sline_h.png"></li>
          <!-- <li id="li_lianxi"><a href="<?php echo $url;?>&type=lianxi">联系客服</a>
                <div class="ewm"><img src="<?php echo IMG_PATH;?>logo/kefu.jpg"></div>
          </li> -->
        </ul>
    </div>

<script type="text/javascript">
 $("#li_lianxi").mouseover(function(){
              $(".ewm").show();

            }).mouseout(function(){
                 $(".ewm").hide();


            });

</script>


    <script type="text/javascript"> 
        $(function () {
           


        (function ($) {
            $.getUrlParam = function (name) {  
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");   
            var r = window.location.search.substr(1).match(reg);   
            if (r != null) return unescape(r[2]); return null;   
            }
        })(jQuery);  
        var xx = $.getUrlParam('type'); 
        if(xx=="all"){
            $("#li_all").css("background-color","#5187C3");
            $("#li_all").css("padding","0 10px");
            $("#li_all").css("border-radius","2px");
            $("#li_all a").css("color","#fff");
        }else if(xx=="duobao"){
            $("#li_duobao").css("background-color","#5187C3");
            $("#li_duobao").css("padding","0 10px");
            $("#li_duobao").css("border-radius","2px");
            $("#li_duobao a").css("color","#fff");
        }else if(xx=="jingcai"){
            $("#li_jingcai").css("background-color","#5187C3");
            $("#li_jingcai").css("padding","0 10px");
            $("#li_jingcai").css("border-radius","2px");
            $("#li_jingcai a").css("color","#fff");
        }else if(xx=="duijiang"){
            $("#li_duijiang").css("background-color","#5187C3");
            $("#li_duijiang").css("padding","0 10px");
            $("#li_duijiang").css("border-radius","2px");
            $("#li_duijiang a").css("color","#fff");
        }else if(xx=="huodong"){
            $("#li_huodong").css("background-color","#5187C3");
            $("#li_huodong").css("padding","0 10px");
            $("#li_huodong").css("border-radius","2px");
            $("#li_huodong a").css("color","#fff");
        }else if(xx=="gonggao"){
            $("#li_gonggao").css("background-color","#5187C3");
            $("#li_gonggao").css("padding","0 10px");
            $("#li_gonggao").css("border-radius","2px");
            $("#li_gonggao a").css("color","#fff");
        }else if(xx=="fuwu"){
            $("#li_fuwu").css("background-color","#5187C3");
            $("#li_fuwu").css("padding","0 10px");
            $("#li_fuwu").css("border-radius","2px");
            $("#li_fuwu a").css("color","#fff");
        }else if(xx=="lianxi"){
            $("#li_lianxi").css("background-color","#5187C3");
            $("#li_lianxi").css("padding","0 10px");
            $("#li_lianxi").css("border-radius","2px");
            $("#li_lianxi a").css("color","#fff");
        }else{
            $("#li_all").css("background-color","#5187C3");
            $("#li_all").css("padding","0 10px");
            $("#li_all").css("border-radius","2px");
            $("#li_all a").css("color","#fff");
        }
        });
    </script>
	<div class="col-left">
    	<!-- <div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> > </span><?php echo catpos($catid);?> 列表</div> -->
        <?php $type=$_GET['type']?>
        <?php if($type==all) { ?>
            <div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> > </span><?php echo catpos($catid);?> 列表<span> > </span>全部</div>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=5ab4b05e97fd14c3ed386604ee1a9399&action=lists&catid=%24catid&num=25&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 25;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
        <?php } elseif ($type==jingcai) { ?>
            <div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> > </span><?php echo catpos($catid);?> 列表<span> > </span>竞猜</div>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=9a1dbff0d699e4a220a303f3d365446d&action=lists&catid=%24catid&where=keywords+%3D+%27%E7%AB%9E%E7%8C%9C%27&num=25&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 25;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'where'=>'keywords = \'竞猜\'','order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'where'=>'keywords = \'竞猜\'','order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
        <?php } elseif ($type==duijiang) { ?>
            <div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> > </span><?php echo catpos($catid);?> 列表<span> > </span>兑奖</div>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b84ab1ad051ba6b8865c71d0f463f5ed&action=lists&catid=%24catid&where=keywords+%3D+%27%E5%85%91%E5%A5%96%27&num=25&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 25;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'where'=>'keywords = \'兑奖\'','order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'where'=>'keywords = \'兑奖\'','order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
        <?php } elseif ($type==huodong) { ?>
            <div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> > </span><?php echo catpos($catid);?> 列表<span> > </span>活动</div>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=f1f97a285e7483b31437e2b88cb66146&action=lists&catid=%24catid&where=keywords+%3D+%27%E6%B4%BB%E5%8A%A8%27&num=25&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 25;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'where'=>'keywords = \'活动\'','order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'where'=>'keywords = \'活动\'','order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
        <?php } elseif ($type==gonggao) { ?>
            <div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> > </span><?php echo catpos($catid);?> 列表<span> > </span>公告</div>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=504b6d950ed02caf3fa7162bd92c3d45&action=lists&catid=%24catid&where=keywords+%3D+%27%E5%85%AC%E5%91%8A%27&num=25&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 25;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'where'=>'keywords = \'公告\'','order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'where'=>'keywords = \'公告\'','order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
        <?php } elseif ($type==fuwu) { ?>
            <div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> > </span><?php echo catpos($catid);?> 列表<span> > </span>疑难解答</div>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=57e10076ff30e8fe9bf66179f5d90031&action=lists&catid=%24catid&where=keywords+%3D+%27%E7%96%91%E9%9A%BE%E8%A7%A3%E7%AD%94%27&num=25&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 25;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'where'=>'keywords = \'疑难解答\'','order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'where'=>'keywords = \'疑难解答\'','order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
        <?php } elseif ($type==lianxi) { ?>
            <div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> > </span><?php echo catpos($catid);?> 列表<span> > </span>联系客服</div>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=ba6ae8f1ac90a47df21172f9c5176d65&action=lists&catid=%24catid&where=keywords+%3D+%27%E8%81%94%E7%B3%BB%E5%AE%A2%E6%9C%8D%27&num=25&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 25;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'where'=>'keywords = \'联系客服\'','order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'where'=>'keywords = \'联系客服\'','order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
        <?php } else { ?>
            <div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> > </span><?php echo catpos($catid);?> 列表</div>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=5ab4b05e97fd14c3ed386604ee1a9399&action=lists&catid=%24catid&num=25&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 25;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
        <?php } ?>
        <ul class="list lh24 f14">
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        	<li><span class="rt"><?php echo date('Y-m-d H:i:s',$r[inputtime]);?></span><a href="<?php echo $r['url'];?>" target="_blank"<?php echo title_style($r[style]);?>><?php echo $r['title'];?></a></li>
        	
        <?php $n++;}unset($n); ?>
        </ul>
        <div id="pages" class="text-c"><?php echo $pages;?></div>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        
    </div>
    <div class="col-auto" style="background: #f4f4f4;">
        <h3 class="list-side-hd" style="border-bottom:1px solid #E0E0E0;background: #fff;text-align: center;font-size: 16px;">购物返利低价特卖</h3>
        <div id="show" style="width: 250px;height: 777px;overflow: hidden;">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=8f2322386472449a59ecbb76523d0d86&sql=select+%2A+from+v9_picture+order+by+listorder+desc&num=12\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_picture order by listorder desc LIMIT 12");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <div class="tb_bbs_zs tb_bbs_zsss">
            <div class="tb_bbs_img">
                <div class="jyg_lj" style="font-size: 18px;margin-left: 4px;font-weight: 600;"><a href="<?php echo $r['url'];?>" target="_blank"><?php echo $r['title'];?></a></div>
                <div><a href="<?php echo $r['url'];?>" target="_blank" ><img src="<?php echo thumb($r[thumb],150,150);?>" width="178"/></a></div>
                <div class="jyg_xx">
                    <div class="jyg_xx_jg">¥<strong><?php echo $r['money'];?></strong></div>
                    <div class="jyg_xx_jgsc" style="float: left;margin-left: 6px;">
                        <div class="jyg_xx_jgsc_top"><?php echo $r['discount'];?>折</div>
                        <div class="jyg_xx_jgsc_bt" style="width: auto;text-decoration: line-through;">原价¥<?php echo $r['cost'];?></div>
                    </div>
                    <div class="jyg_xx_an" style="padding-top:6px;*padding-top:4px;"><span style="width:44px; height:18px;line-height:18px; background-color:#68b93a; padding:3px 4px;color:White;  margin-top:10px; _margin-top:12px;  font-size:12px; vertical-align:bottom;">有返利</span></div>
                    
                </div>
            </div>
        </div>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </div>
  
<!-- 轮播 -->
<script type="text/javascript">
    function startmarquee(lh, speed1, delay) {
        var t;
        var oHeight = 777; /**//** div的高度 **/
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
    startmarquee(260, 6, 2000);
    /**//**startmarquee(一次滚动高度,速度,停留时间);**/
</script>
        <!-- <div class="box">
            <h5 class="title-2">频道总排行</h5>
             <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=0ad40a45ad075d8f47798a231e25aec2&action=hits&catid=%24catid&num=10&order=views+DESC&cache=3600\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$tag_cache_name = md5(implode('&',array('catid'=>$catid,'order'=>'views DESC',)).'0ad40a45ad075d8f47798a231e25aec2');if(!$data = tpl_cache($tag_cache_name,3600)){$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'hits')) {$data = $content_tag->hits(array('catid'=>$catid,'order'=>'views DESC','limit'=>'10',));}if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>
            <ul class="content digg">
				<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
					<li><a href="<?php echo $r['url'];?>" target="_blank"><?php echo $r['title'];?></a></li>
				<?php $n++;}unset($n); ?>
            </ul>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </div>
        <div class="bk10"></div>
        <div class="box">
            <h5 class="title-2">频道本月排行</h5>
             <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=2caa10e576ba663010144233732308cd&action=hits&catid=%24catid&num=8&order=monthviews+DESC&cache=3600\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$tag_cache_name = md5(implode('&',array('catid'=>$catid,'order'=>'monthviews DESC',)).'2caa10e576ba663010144233732308cd');if(!$data = tpl_cache($tag_cache_name,3600)){$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'hits')) {$data = $content_tag->hits(array('catid'=>$catid,'order'=>'monthviews DESC','limit'=>'8',));}if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>
            <ul class="content rank">
				<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
				<li><span><?php echo number_format($r[monthviews]);?></span><a href="<?php echo $r['url'];?>"<?php echo title_style($r[style]);?> class="title" title="<?php echo $r['title'];?>"><?php echo str_cut($r[title],56,'...');?></a></li>
				<?php $n++;}unset($n); ?>
            </ul>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </div> -->
    </div>
</div>
<?php include template("content","footer"); ?>