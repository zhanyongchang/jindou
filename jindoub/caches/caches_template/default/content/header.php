<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>小金豆_游戏试玩平台|玩游戏|购物返利</title>
<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
<meta name="description" content="<?php echo $SEO['description'];?>">
<link href="<?php echo CSS_PATH;?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH;?>default_blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.sgallery.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>search_common.js"></script>

<link href="<?php echo CSS_PATH;?>jd_css/base.v20150930.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH;?>jd_css/daohang.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH;?>jd_css/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH;?>jd_css/tm_fc.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH;?>jd_css/pceggs3beta.v1307017.css" rel="stylesheet" type="text/css" />
<!-- <link href="<?php echo CSS_PATH;?>jd_css/PCShowlogin_20140623.css" rel="stylesheet" type="text/css" /> -->
<link href="<?php echo CSS_PATH;?>jd_css/pcdd_num.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH;?>jd_css/totop.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo JS_PATH;?>jd_js/PCShowlogin_20140623.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>jd_js/makeconform.js"></script>

<script type="text/javascript" src="<?php echo JS_PATH;?>jd_js/Head.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>jd_js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>jd_js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>jd_js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>jd_js/index.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>jd_js/scroll.v.1.2.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>jd_js/pcdd_num.js"></script>

</head>
<body>
<div class="body-top">
    <div class="content">
    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=2e3bec5eab254972ef7678fb28fb15b9&action=position&posid=9&order=id&num=10&cache=3600\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$tag_cache_name = md5(implode('&',array('posid'=>'9','order'=>'id',)).'2e3bec5eab254972ef7678fb28fb15b9');if(!$data = tpl_cache($tag_cache_name,3600)){$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'9','order'=>'id','limit'=>'10',));}if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>

            <div class="login lh24 blue"><span class="rt"><script type="text/javascript">document.write('<iframe src="<?php echo APP_PATH;?>index.php?m=member&c=index&a=mini&forward='+encodeURIComponent(location.href)+'&siteid=<?php echo get_siteid();?>" allowTransparency="true"  width="500" height="24" frameborder="0" scrolling="no"></iframe>')</script></span></div>
    </div>
</div>
<div class="header">
    <div class="header3beta_con">
        <!-- logo -->
        <div class="header3beta_logo">
            <a href="<?php echo siteurl($siteid);?>"><img src="<?php echo IMG_PATH;?>logo/logo2.png" border="0" /></a>
        </div>
        <!-- 访问人次 -->
        <div class="header3beta_ggy" style="width: 302px;">
            <div class="pcdd_number">
                <input name="Head2$WithdrawCount" type="hidden" id="Head2_WithdrawCount" value="6179659" />
                <b>累计访问人次</b>
                <ul id="ulTotalBuy">
                    <li class="pcdd_num">0</li>
                    <li class="pcdd_nobor">,</li>
                    <li class="pcdd_num">0</li>
                    <li class="pcdd_num">0</li>
                    <li class="pcdd_num">0</li>
                    <li class="pcdd_nobor">,</li>
                    <li class="pcdd_num">0</li>
                    <li class="pcdd_num">0</li>
                    <li class="pcdd_num">0</li>
                </ul>
            </div>
        </div>
        <!-- 右边空白位 -->
        <div style="width: 480px;" class="header3beta_banner" id="header3beta_banner"></div>
    </div>

    <div class="banner"><script language="javascript" src="<?php echo APP_PATH;?>index.php?m=poster&c=index&a=show_poster&id=1"></script></div>
    <div class="bk3"></div>
    <div class="nav-bar">
    	<map>
    	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
        	<ul class="nav-site">
			<li><a href="<?php echo siteurl($siteid);?>"><span>首页</span></a></li>
			<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
			<li class="line">|</li>
			<li><a href="<?php echo $r['url'];?>"><span><?php echo $r['catname'];?></span></a></li>
			<?php $n++;}unset($n); ?>
            </ul>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		<?php echo runhook('glogal_menu')?>
        </map>
    </div> 
</div>