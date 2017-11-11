<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<style type="text/css">
.search {
	 width:960px;
	 margin:0 auto;
	 border:1px solid #e5e5e5;
	 height:154px;
	 font-size:12px;
}
.search_in{
	margin-top:50px;
	margin-left: 160px;
}
.keyword{
	width: 480px;
	height: 27px;
	top: 0;
	font-size: 14px;
	margin-left: 6px;
	border: 0;
	padding: 10px 10px;
	background: none;
	outline: none;
	border: 3px solid #fa6e18;
	border-radius: 2px;
}
.KeySearchBtn{
	height: 56px;
	width: 140px;
	border: 3px solid #fa6e18;
	background: #fa6e18;
	color: #fff;
	border-radius: 2px;
	font-size: 20px;
	font-weight: 800;
}
.tbfl_v3_fgx{ width:960px; height:52px; border-bottom:1px solid #eaeaea; line-height:52px; color:#505050; font-size:14px;}
.shop-cat i{display:block; float:left; margin:0 auto; margin-top:20px; margin-left:44px; margin-right:8px;width:34px;height:34px;background:url(<?php echo IMG_PATH;?>/l_logo/i-sprite3.png) 0 0 no-repeat;border-radius:17px}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>/jd_css/taobaoindex_20160525.css">
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
</style>
<!-- <div class="fu">
    <div class="ewm"><img src="<?php echo IMG_PATH;?>logo/kefu.jpg"></div>
    <div class="fu_zi">联&nbsp;&nbsp;系&nbsp;&nbsp;客&nbsp;&nbsp;服</div>
</div> -->
<div class="main photo-channel">
	<div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> > <?php echo catpos($catid);?></div>
		<!-- <div class="search">
		    <div class="search_in">
		    <form method="post" action="">
		        <input type="text" name="keyword" placeholder="请输入宝贝名称~" id="keyword" class="keyword" maxlength="255" value="" />
		        <input type="submit" id="KeySearchBtn"  class="KeySearchBtn"   value="搜宝贝" />
		    </form>    
		    </div>
		</div> -->
		<!-- <div class="tbfl_v3_fgx" name="cjfl" id="cjfl">
		    <ul>
		        <li _hover-ignore="1" class="tbfl_v3_fgx_l">超级返利&nbsp;|&nbsp;最高返<span style=" color:#F00">50%</span> <img src="../install_package/statics/images/l_logo/new1.gif" /></li>
		    </ul>
		</div> -->
		<!-- <div class="dyrm_2013_conn" style="margin-top:12px;">
		    <div class="tabs-con" >
		        <ul class="hear">
		            <li class="shop-cat shop-cat-command" id="li_buy_all"><a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=18&type=all" class="current" id="c-1"><i></i><strong>全部商品</strong></a></li>
		            <li class="shop-cat shop-cat-composite" id="li_fushi"><a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=18&type=fushi" id="c1_4"><i></i><strong>服饰鞋包</strong></a></li>
		            <li class="shop-cat shop-cat-acc" id="li_jujia"><a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=18&type=jujia" id="c2_7"><i></i><strong>居家零嘴</strong></a></li>
		            <li class="shop-cat shop-cat-foods" id="li_shuma"><a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=18&type=shuma" id="c3_8"><i></i><strong>数码家电</strong></a></li>
		            <li class="shop-cat shop-cat-mz" id="li_meizhuang"><a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=18&type=meizhuang" id="c5_6"><i></i><strong>美妆配饰</strong></a></li>
		        </ul>
		    </div>
		</div> -->
		<!--  <script type="text/javascript"> 
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
            $("#li_buy_all").css("background-color","#5187c3");
            $("#li_buy_all strong").css("color","#fff");
            // $("#li_buy_all i").css("background-color","#fff");
            // $("#li_buy_all i").css("background","url(<?php echo IMG_PATH;?>/l_logo/i-sprite3.png) 0 0 no-repeat");
        }else if(xx=="fushi"){
            $("#li_fushi").css("background-color","#5187c3");
            $("#li_fushi strong").css("color","#fff");
        }else if(xx=="jujia"){
            $("#li_jujia").css("background-color","#5187c3");
            $("#li_jujia strong").css("color","#fff");
        }else if(xx=="shuma"){
            $("#li_shuma").css("background-color","#5187c3");
            $("#li_shuma strong").css("color","#fff");
        }else if(xx=="meizhuang"){
            $("#li_meizhuang").css("background-color","#5187c3");
            $("#li_meizhuang strong").css("color","#fff");
        }else{
            $("#li_buy_all").css("background-color","#5187c3");
            $("#li_buy_all strong").css("color","#fff");
        }
        });
    </script> -->
		<div class="bk10"></div>
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=08b73d4107335c862f85c0d7ca03a052&action=lists&catid=%24catid&num=15&order=listorder+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 15;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'order'=>'listorder DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'order'=>'listorder DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
			<ul id="contentop">
				<li>
				<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
				<div style="float: left;width: 188px;border:1px solid #ccc;margin-left: 2px;margin-bottom: 2px;">
					<div class="img_wrap" style="width: 188px;height: 160px;">
					<a href="<?php echo $r['url'];?>" style="display: block;height: 160px; text-align: center; padding: 2px 0 0 0;">
					<img src="<?php echo $r['thumb'];?>" style="width: 170px;height: auto;max-height: 100%; max-width: 100%;" />
					</a>
					</div>
					<div style="width:160px;margin-left:14px;overflow: hidden;font-size: 18px;"><?php echo $r['title'];?></div>
					<div style="width:100%;margin-left:14px;">
						<span style="color: red;font-size: 18px;margin-right:4px;">¥<?php echo $r['money'];?></span>
						<span style="text-decoration: line-through;font-size: 10px;margin-right:10px;">原价:¥<?php echo $r['cost'];?></span>
						<span style="background-color: #fedd00;color: #ff2d00;"><?php echo $r['discount'];?>折</span>
					</div>
					<div style="width:160px;margin-left:14px;overflow: hidden;">
						返利:<span style="font-size: 10px;background: #68b93a;color: #fff;">
						<?php if($r[jd_num]>10000) { ?>
						<?php $num=$r[jd_num]/10000;?>
						<?php echo $num.'万';?>
						<?php } ?>
						金豆</span>
					</div>
				</div>
				<?php $n++;}unset($n); ?>
					
				</li>
			</ul>
			<div id="pages" class="text-c"><?php echo $pages;?></div>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
	</div>
</div>
<?php include template("content","footer"); ?>