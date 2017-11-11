<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
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
.tb_bbs_img{width:160px; height:auto; border:1px solid #eeeeee; padding:5px; background-color:#fff; margin-top:4px;}
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
</style>
<!-- <div class="fu">
    <div class="ewm"><img src="<?php echo IMG_PATH;?>logo/kefu.jpg"></div>
    <div class="fu_zi">联&nbsp;&nbsp;系&nbsp;&nbsp;客&nbsp;&nbsp;服</div>
</div> -->
<div class="main">
	<div class="col-left">
    	<div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> &gt; </span><?php echo catpos($catid);?> 正文</div>
        <div id="Article">
        	<h1><?php echo $title;?><br />
<span><?php echo $inputtime;?>&nbsp;&nbsp;&nbsp;来源：<?php echo $copyfrom;?>&nbsp;&nbsp;&nbsp; 点击：</span><span id="hits"></span></h1>

			<div class="content">
			<?php if($allow_visitor==1) { ?>
				<?php echo $content;?>
				<!--内容关联投票-->
				<?php if($voteid) { ?><script language="javascript" src="<?php echo APP_PATH;?>index.php?m=vote&c=index&a=show&action=js&subjectid=<?php echo $voteid;?>&type=2"></script><?php } ?>
                
			<?php } else { ?>
				<CENTER><a href="<?php echo APP_PATH;?>index.php?m=content&c=readpoint&allow_visitor=<?php echo $allow_visitor;?>"><font color="red">阅读此信息需要您支付 <B><I><?php echo $readpoint;?> <?php if($paytype) { ?>元<?php } else { ?>点<?php } ?></I></B>，点击这里支付</font></a></CENTER>
			<?php } ?>
			</div>
<?php if($titles) { ?>
<fieldset>
	<legend class="f14">本文导航</legend><ul class="list blue row-2">
<?php $n=1;if(is_array($titles)) foreach($titles AS $r) { ?>
	<li><?php echo $n;?>、<a href="<?php echo $r['url'];?>"><?php echo $r['title'];?></a></li>
<?php $n++;}unset($n); ?>
</ul>
</fieldset>
<?php } ?>
			<div id="pages" class="text-c"><?php echo $pages;?></div>
            <p style="margin-bottom:10px">
            <strong>相关热词搜索：</strong><?php $n=1;if(is_array($keywords)) foreach($keywords AS $keyword) { ?><a href="<?php echo APP_PATH;?>index.php?m=content&c=tag&a=lists&tag=<?php echo urlencode($keyword);?>" class="blue"><?php echo $keyword;?></a> 	<?php $n++;}unset($n); ?>
            </p>
            <p class="f14">
                <strong>上一篇：</strong><a href="<?php echo $previous_page['url'];?>"><?php echo $previous_page['title'];?></a><br />
                <strong>下一篇：</strong><a href="<?php echo $next_page['url'];?>"><?php echo $next_page['title'];?></a>
            </p>
          <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=59d3146c936b0bbb61d83c4d89437c20&action=relation&relation=%24relation&id=%24id&catid=%24catid&num=5&keywords=%24rs%5Bkeywords%5D\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'relation')) {$data = $content_tag->relation(array('relation'=>$relation,'id'=>$id,'catid'=>$catid,'keywords'=>$rs[keywords],'limit'=>'5',));}?>
              <?php if($data) { ?>
                <div class="related">
                    <h5 class="blue">延伸阅读：</h5>
                    <ul class="list blue lh24 f14">
                        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                            <li>·<a href="<?php echo $r['url'];?>" target="_blank"><?php echo $r['title'];?></a><span>(<?php echo date('Y-m-d',$r[inputtime]);?>)</span></li>
                        <?php $n++;}unset($n); ?>
                    </ul>
                </div>
              <?php } ?>
          <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
          <div class="bk15"></div>
            <?php if(module_exists('mood')) { ?><script type="text/javascript" src="<?php echo APP_PATH;?>index.php?m=mood&c=index&a=init&id=<?php echo id_encode($catid,$id,$siteid);?>"></script><?php } ?>
      </div>
      <div class="Article-Tool">
          分享到：
		  
          <script type="text/javascript">document.write('<a href="http://v.t.sina.com.cn/share/share.php?url='+encodeURIComponent(location.href)+'&appkey=3172366919&title='+encodeURIComponent('<?php echo new_addslashes($title);?>')+'" title="分享到新浪微博" class="t1" target="_blank">&nbsp;</a>');</script>
		  <script type="text/javascript">document.write('<a href="http://www.douban.com/recommend/?url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent('<?php echo new_addslashes($title);?>')+'" title="分享到豆瓣" class="t2" target="_blank">&nbsp;</a>');</script>
		  <script type="text/javascript">document.write('<a href="http://share.renren.com/share/buttonshare.do?link='+encodeURIComponent(location.href)+'&title='+encodeURIComponent('<?php echo new_addslashes($title);?>')+'" title="分享到人人" class="t3" target="_blank">&nbsp;</a>');</script>
		  <script type="text/javascript">document.write('<a href="http://www.kaixin001.com/repaste/share.php?rtitle='+encodeURIComponent('<?php echo new_addslashes($title);?>')+'&rurl='+encodeURIComponent(location.href)+'&rcontent=" title="分享到开心网" class="t4" target="_blank">&nbsp;</a>');</script>
		  <script type="text/javascript">document.write('<a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+encodeURIComponent(location.href)+'" title="分享到QQ空间" class="t5" target="_blank">&nbsp;</a>');</script>
      
	  <span id='favorite'>
		<a href="javascript:;" onclick="add_favorite('<?php echo addslashes($title);?>');" class="t6">收藏</a>
	  </span>

	  </div>
      <div class="bk10"></div>
      <?php if($allow_comment && module_exists('comment')) { ?>
      <iframe src="<?php echo APP_PATH;?>index.php?m=comment&c=index&a=init&commentid=<?php echo id_encode("content_$catid",$id,$siteid);?>&iframe=1" width="100%" height="100%" id="comment_iframe" frameborder="0" scrolling="no"></iframe>
      <div class="box">
        		<h5>评论排行</h5>
				 <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"comment\" data=\"op=comment&tag_md5=9eeaba0a57bcf88c1b4779f4dc232d7a&action=bang&siteid=%24siteid&cache=3600\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$tag_cache_name = md5(implode('&',array('siteid'=>$siteid,)).'9eeaba0a57bcf88c1b4779f4dc232d7a');if(!$data = tpl_cache($tag_cache_name,3600)){if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>
            	<ul class="content list blue f14 row-2">
				<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                	<li>·<a href="<?php echo $r['url'];?>" target="_blank"><?php echo str_cut($r[title], 40);?></a><span>(<?php echo $r['total'];?>)</span></li>
					<?php $n++;}unset($n); ?>
                </ul>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </div>
        <?php } ?>
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
    </div>
</div>
<script type="text/javascript">
<!--
	function show_ajax(obj) {
		var keywords = $(obj).text();
		var offset = $(obj).offset();
		var jsonitem = '';
		$.getJSON("<?php echo APP_PATH;?>index.php?m=content&c=index&a=json_list&type=keyword&modelid=<?php echo $modelid;?>&id=<?php echo $id;?>&keywords="+encodeURIComponent(keywords),
				function(data){
				var j = 1;
				var string = "<div class='point key-float'><div style='position:relative'><div class='arro'></div>";
				string += "<a href='JavaScript:;' onclick='$(this).parent().parent().remove();' hidefocus='true' class='close'><span>关闭</span></a><div class='contents f12'>";
				if(data!=0) {
				  $.each(data, function(i,item){
					j = i+1;
					jsonitem += "<a href='"+item.url+"' target='_blank'>"+j+"、"+item.title+"</a><BR>";
					
				  });
					string += jsonitem;
				} else {
					string += '没有找到相关的信息！';
				}
					string += "</div><span class='o1'></span><span class='o2'></span><span class='o3'></span><span class='o4'></span></div></div>";		
					$(obj).after(string);
					$('.key-float').mouseover(
						function (){
							$(this).siblings().css({"z-index":0})
							$(this).css({"z-index":1001});
						}
					)
					$(obj).next().css({ "left": +offset.left-100, "top": +offset.top+$(obj).height()+12});
				});
	}

	function add_favorite(title) {
		$.getJSON('<?php echo APP_PATH;?>api.php?op=add_favorite&title='+encodeURIComponent(title)+'&url='+encodeURIComponent(location.href)+'&'+Math.random()+'&callback=?', function(data){
			if(data.status==1)	{
				$("#favorite").html('收藏成功');
			} else {
				alert('请登录');
			}
		});
	}

$(function(){
  $('#Article .content img').LoadImage(true, 660, 660,'<?php echo IMG_PATH;?>s_nopic.gif');    
})
//-->
</script>

<script language="JavaScript" src="<?php echo APP_PATH;?>api.php?op=count&id=<?php echo $id;?>&modelid=<?php echo $modelid;?>"></script>
<?php include template("content","footer"); ?>