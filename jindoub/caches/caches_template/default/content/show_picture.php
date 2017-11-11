<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<style type="text/css" >
.photo_prev a{cursor:url(<?php echo IMG_PATH;?>v9/prev.cur), auto;}
.photo_next a{cursor:url(<?php echo IMG_PATH;?>v9/next.cur), auto;}

/*商品购买页面*/

		
		/*左侧浏览图*/
		.left{
			width: 500px;
			height: 440px;
			/*border: 1px solid #E4E4E4;*/
			position: relative;
			float: left;
		}
		
		.left .ltop{
			width: 400px;
			height: 400px;
			margin: 20px auto;
			position: relative;
			cursor: crosshair;
			/*background: blue;*/
			border: 1px solid #E4E4E4;
		}
		.left  .ltop .kuai{
			width: 220px;
			height: 200px;
			position: absolute;
			background: white;
			display: none;
			z-index: 10;
			opacity: 0.7;
		}
		.left .ltop .gaizi{
			/*background:red;*/
			width: 400px;
			height: 400px;
			opacity: 0;
			position: absolute;
			z-index: 14;
		}
		.left .ltop .largePhoto{
			width: 400px;
			height: 400px;
			position: absolute;
			z-index: 2;
		}
		
		.left .lbottom{
			height: 100px;
			border: 2px solid #E4E4E4;
		}
		.left .lbottom .smallPhoto{
			width: 60px;
			height: 60px;
			margin-top: 20px;
			margin-left: 10px;
			border: 2px solid transparent;
		}
		.left .lbottom .smallPhoto:hover{
			border: 2px solid #E53E41;
		}
		.center{
			width: 440px;
			height: 400px;
			border: 2px solid #E4E4E4;
			overflow: hidden;
			position: absolute;
			left: 454px;
			top: 20px;
			display: none;
		}
		.center .bigimg{
			position: absolute;
			left: 0;
			top: 0;
		}
		/*左侧浏览图结束*/
		
		
		/*右侧信息栏*/
		.right{
			width: auto;
			float: left;
			margin-right: 40px;
			margin-top: 30px;
		}
		.name{
			font-weight: bold;
			font-size: 16px;
			display: block;
			padding-bottom: 20px;
			width: 370px;
		}
		.top{
			background: url(../../upload/images/diwen.png) no-repeat;
			height: 120px;
		}
		.word{
			color: #999999;
			display: block;
			float: left;
			margin-left: 20px;
			margin-top: 10px;
			font-size: 12px;
		}
		 .yuan{
			color: #C40000;
			display: block;
			float: left;
			font-size: 16px;
			margin-top: 12px;
			margin-left: 30px;
		}
		 .price{
			color: #C40000;
			float: left;
			display: block;
			font-size: 30px;
			margin-left: 5px;
			margin-top: 2px;
			font-weight: 600;
		}
		.color{
			width: 100%;
			height: 70px;
			margin-top: 40px;
			/*background: black;*/
			padding-top: 10px;
			border-top: 2px dashed lightgrey;
		}
		.color .xuanze{
			line-height: 70px;
			float: left;
			margin-right: 20px;
			color: #999999;
		}
		.color .yanse{
			float: left;
			border: 1px solid #CCCCCC;
			margin-right: 10px;
			margin-top: 10px;
		}
		.color .yanse:hover{
			cursor: pointer;
		}
		 .color .yanse.selected{
			border:1px solid #E3393C;
		}
		 .color .yanse .smallPhoto{
			width: 40px;
			height: 40px;
			float: left;
			display: block;
			margin-top: 5px;
		}
		.color  .se{
			width: 30px;
			text-align: center;
			display: block;
			float: left;
			background: #F7F7F7;
			font-size: 12px;
			line-height: 50px;
		}
		/*#box .right .color .blue{
			float: left;
			border: 1px solid #CCCCCC;
			margin-right: 10px;
			margin-top: 10px;
		}
		#box .right .color .blue .smallPhoto{
			width: 40px;
			height: 40px;
			float: left;
			display: block;
			margin-top: 5px;
		}
		#box .right .color .red{
			float: left;
			border: 1px solid #CCCCCC;
			margin-right: 10px;
			margin-top: 10px;
		}
		#box .right .color .red .smallPhoto{
			width: 40px;
			height: 40px;
			float: left;
			display: block;
			margin-top: 5px;
		}*/
		.right .buy{
			width: 100%;
			height: 70px;
			border-top: 2px dashed lightgrey;
			padding-top: 40px;
		}
		.right .buy .anniu{
			float: left;
			margin-top: 10px;
		}
		.right .buy .mai{
			width: 200px;
			height: 40px;
			display: block;
			float: left;
			line-height: 40px;
			font-size: 18px;
			background: #DF3033;
			text-align: center;
			color: white;
			margin-left: 20px;
			font-weight: 600;
			border:none;
		}
		/*右侧信息栏结束*/
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
/*.look{
	width: 310px;
	height: 310px;
}*/
.look_n{
	width: 418px;
	height: 82px;
	margin-top:4px;
}
.look_n ul li{
	width: 100px;
	height: 82px;
	float: left;
	margin-left: 2px;
	border:1px solid black;
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
<?php $userid = param::get_cookie('_userid');?>
<?php $a_id=$_GET['id'];?>
<div class="main photo-channel">
	<div class="crumbs"><a href="<?php echo siteurl($siteid);?>">首页</a><span> > <?php echo catpos($catid);?></div>
    <div id="Article" style="border: none;">
			<div class="left" style="width: 310px;height: 310px;margin: 10px 50px;">	
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=410529946ddcc83d52e2e1d4aa1a2c28&sql=select+%2A+from+v9_picture+where+id%3D%27%24id%27&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_picture where id='$id' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
		        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
		        <div class="look" style="text-align: center; display: table-cell; vertical-align: middle;width: 310px;height: 310px;">
		            <img src="<?php echo $r['thumb'];?>" style="width: auto;height: auto;max-height: 100%; max-width: 100%" />
		        </div>
		        <?php $n++;}unset($n); ?>
		        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</div>
			
			<div class="right">
			
				<div class="name"><?php echo $title;?></div>
				<div class="top">
				<div class="one" style="width: 370px;height: 50px;line-height: 26px;">
					<span class="word">现价</span>
					<span class="yuan">¥</span>
					<span name="money" class="price"><?php echo $money;?></span>
					<div style="float: right;line-height: 25px;">
					<?php if($xg_type==1 && $xg_num>0) { ?>
					限购数量：<span style="font-size: 16px;"><?php echo $xg_num;?></span>
					<?php } elseif ($xg_type==1 && $xg_num<=0) { ?>
					商品已被抢空
					<?php } elseif ($xg_type==0) { ?>
					商品不限购
					<?php } ?>
					</div>
				</div>
				<div class="two" style="line-height: 26px;width: 370px;height: 50px;">
					<span class="word">原价</span>
					<span class="word" style="text-decoration:line-through;">¥<?php echo $cost;?></span>
					<span style="margin-top:10px;background: #68b93a;color: #fff;float: right;">返还:
					<?php if($r[jd_num]>10000) { ?>
						<?php $num=$r[jd_num]/10000;?>
						<?php echo $num.'万';?>
					<?php } ?>
					金豆</span>
				</div>	
				</div>
				<?php if($keywords[0]=="电子商品") { ?>
				<form id="formcar" name="formcar" method="post" action="<?php echo APP_PATH;?>index.php?m=order&c=cart_pay&a=add&a_id=<?php echo $id;?>&a_catid=<?php echo $catid;?>" target="_blank">	
					<div class="buy">
						<div class="anniu" >
							<input id="min" name="" type="button" value="-" style="width:16px;"/>  
							<input id="text_box" name="quantity" type="text" value="1" style="width:30px;margin-left: 4px;"/>  
							<input id="add" name="" type="button" value="+" style="width:16px;margin-left: 4px;"/> 
						</div>
						<input type="hidden" name="a_title" id="a_title" value="<?php echo $title;?>" />
						<input type="hidden" name="money" value="<?php echo $money;?>" />
						<input type="hidden" name="xg_num" id="xg_num" value="<?php echo $xg_num;?>">
						<input type="hidden" name="userid" id="userid" value="<?php echo $userid;?>">
						<input type="hidden" name="a_id" id="a_id" value="<?php echo $a_id;?>">
						<input type="hidden" name="el_type" id="el_type" value="<?php echo $el_type;?>">
						<input class="mai" type="button" name="button" id="btn_buy" value="立即支付" />
					</div>
				</form>
				<?php } else { ?>
				<form id="formcar" name="formcar" method="post" action="<?php echo APP_PATH;?>index.php?m=order&c=cart&a=add&a_id=<?php echo $id;?>&a_catid=<?php echo $catid;?>" target="_blank">	
					<div class="buy">
						<div class="anniu" >
							
							<input id="min" name="" type="button" value="-" style="width:16px;"/>  
							<input id="text_box" name="quantity" type="text" value="1" style="width:30px;margin-left: 4px;"/>  
							<input id="add" name="" type="button" value="+" style="width:16px;margin-left: 4px;"/> 
						</div>
						<input type="hidden" name="a_title" id="a_title" value="<?php echo $title;?>" />
						<input type="hidden" name="money" value="<?php echo $money;?>" />
						<input type="hidden" name="xg_num" id="xg_num" value="<?php echo $xg_num;?>">
						<input type="hidden" name="userid" id="userid" value="<?php echo $userid;?>">
						<input type="hidden" name="a_id" id="a_id" value="<?php echo $a_id;?>">
						<input class="mai" type="button" name="button" id="btn_buy" value="加入购物车" />
						<div style="float: left;height: 40px;line-height: 40px;margin-left:10px;"><a href="<?php echo APP_PATH;?>index.php?m=order&c=cart&a=init" target="_blank">查看购物车</a></div>
						
					</div>
				</form>
				<?php } ?>
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
					//获得文本框对象
		   			var t = $("#text_box");
		   			var t_val =t.val();
					//初始化数量为1,并失效减
					$('#min').attr('disabled',true);
		    		//数量增加操作
		    		$("#add").click(function(){    
		        		t.val(parseInt(t.val())+1);
		        		t_val=parseInt(t.val());
		        		if (parseInt(t.val())!=1){
		            		$('#min').attr('disabled',false);
		        		}
				    }) ;
		    		//数量减少操作
		    		$("#min").click(function(){
		        		t.val(parseInt(t.val())-1);
		        		t_val=parseInt(t.val());
		        		if (parseInt(t.val())==1){
		            		$('#min').attr('disabled',true);
		       			 }
		       			return t_val;
				    });

		    		var xg_num=$("#xg_num").val();
		    		var userid=$("#userid").val();
		    		var a_id=$("#a_id").val();
		    		var el_type=$("#el_type").val();
			    	$("#btn_buy").click(function(){
				    	if(el_type == "充值"){
				    		if(xg_num<=999 && xg_num>0 && t_val!=1){
					    		alert("该商品为限购商品，每人只能购买一件!");
					    	}else if(xg_num==0){
					    		alert("该限购商品已被抢空");
					    	}else{
					    		$.ajax({
						            type: "POST",  
						            url: "http://www.xiaojindou123.com/checksql.php", 
						            data:{"userid":userid,"a_id":a_id},
						            dataType: "text",
						            success: function(data) {
						            	if(data==1){
						            		alert("该商品为限购商品，每月只能购买一次!");
						            	}else if(data==0){
						            		$("#formcar").submit();
						            	}
						            	// alert(data);
						            },
						        });
					    	}
				    	}else if(el_type == "vip"){
				    		$("#formcar").submit();
				    	}else{
				    		$("#formcar").submit();
				    	}
				    });
				});
				
			</script>
  	</div>
  	<div class="under" style="width: 960px;border-top: 1px solid #ccc;">
	  	<div style="width: 170px;float: left;margin-top: 10px;">
			<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=6e5c1e1cc0db05aca96634d8d7a80179&sql=select+%2A+from+v9_picture+order+by+listorder+desc&num=6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_picture order by listorder desc LIMIT 6");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
	        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
	        <div class="tb_bbs_zs tb_bbs_zsss">
	            <div class="tb_bbs_img">
	                <div class="jyg_lj" style="font-size: 18px;margin-left: 4px;"><a href="<?php echo $r['url'];?>" target="_blank"><?php echo $r['title'];?></a></div>
	                <div><a href="<?php echo $r['url'];?>" target="_blank" ><img src="<?php echo thumb($r[thumb],160,160);?>"/></a></div>
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
	  	<div style="width: 790px;float: left; overflow: hidden;">
			<div class="info" style="margin-top:10px;border: 1px solid #ccc;width: 766px;padding-left:10px;margin-left: 12px;"><?php echo $content;?></div>
			<div class="pic" style="margin-top: 10px;">

				<div style="width: 790px;float: left;margin-left: 12px;">
					<ul>
					<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=d4f70ab5498bdf5797868f0d5198e930&sql=select+%2A+from+v9_picture_data+where+id+%3D+%27%24id%27\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_picture_data where id = '$id' LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>  
					    <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>  
					        <?php $n=1; if(is_array(string2array($r['pictureurls']))) foreach(string2array($r['pictureurls']) AS $pic_k => $v) { ?>  
					            <li style="margin-bottom: 6px;"><img src="<?php echo $v['url'];?>"></li> 
					        <?php $n++;}unset($n); ?>  
					    <?php $n++;}unset($n); ?>  
					<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
					</ul>
				</div>	
			</div>
		</div>
  	</div>

  <?php if($allow_comment && module_exists('comment')) { ?>
  <iframe src="<?php echo APP_PATH;?>index.php?m=comment&c=index&a=init&commentid=<?php echo id_encode("content_$catid",$id,$siteid);?>&iframe=1" width="100%" height="100%" id="comment_iframe" frameborder="0" scrolling="no"></iframe>
  <?php } ?>
 </div>
<div id="load_pic" style="display:none;" rel="<?php echo IMG_PATH;?>msg_img/loading_d.gif">
</div>
<script language="JavaScript">
<!--
	function add_favorite(title) {
		$.getJSON('<?php echo APP_PATH;?>api.php?op=add_favorite&title='+encodeURIComponent(title)+'&url='+encodeURIComponent(location.href)+'&'+Math.random()+'&callback=?', function(data){
			if(data.status==1)	{
				$("#favorite").html('收藏成功');
			} else {
				alert('请登录');
			}
		});
	}
//-->
</script>
<script type="text/javascript" src="<?php echo JS_PATH;?>show_picture.js"></script>
<script type="text/javascript" src="<?php echo APP_PATH;?>api.php?op=count&id=<?php echo $id;?>&modelid=<?php echo $modelid;?>"></script>
<?php include template("content","footer"); ?>