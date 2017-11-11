<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>
<div id="memberArea">
<?php include template('member', 'left'); ?>
<style type="text/css">
.box_a{
	width: 50%;
	height: 260px;
	float: left;
}
.box_b{
	width: 50%;
	height: 260px;
	float: left;
}
.box_a .weixin{
	height:200px;
	width:200px;
	margin: 0 auto;
	margin-top: 10px;
}
.box_a .weixin img{
	height: 100%;
	width: 100%;
}
.box_a .weixin_title{
	width: 100%;
	height:40px;
	float: left;
}
.box_a .weixin_title .weixin_log{
	width: 50%;
	height:40px;
	background: #22ab38;
	margin: 0 auto;
	color: #fff;
	line-height: 40px;
	text-align: center;
	font-size: 20px;
	font-weight: 800;
	font-family: Microsoft YaHei;
}
.box_b .zhifubao{
	height:200px;
	width:200px;
	margin: 0 auto;
	margin-top: 10px;
}
.box_b .zhifubao img{
	height: 100%;
	width: 100%;
}
.box_b .zhifubao_title{
	width: 100%;
	height:40px;
	float: left;
}
.box_b .zhifubao_title .zhifubao_log{
	width: 50%;
	height:40px;
	background: #1b82d1;
	margin: 0 auto;
	color: #fff;
	line-height: 40px;
	text-align: center;
	font-size: 20px;
	font-weight: 800;
	font-family: Microsoft YaHei;
}
.box_c{
	width: 100%;
	height: 120px;
	float: left;
}
.box_c .t_btn{
	width: 100%;
	height: 120px;
}
.box_c .t_btn .t_btn_one{
	width: 100%;
	height: 60px;
	float: left;
}
.box_c .t_btn .t_btn_two{
	width: 100%;
	height: 60px;
	float: left;
}
.box_c .t_btn .t_btn_one .btn_one{
	height: 40px;
    width: 180px;
    border: none;
    background: #3B73AC;
    color: #fff;
    font-weight: 800;
    font-size: 18px;
    line-height: 40px;
    border-radius: 4px;
    display: block;
    margin:0 auto;
}
.box_c .t_btn .t_btn_two .btn_two{
	height: 40px;
    width: 140px;
    border: none;
    background: #3B73AC;
    color: #fff;
    font-weight: 800;
    font-size: 18px;
    line-height: 40px;
    border-radius: 4px;
    display: block;
    margin:0 auto;
}
.box_d{
	width: 100%;
	height: auto;
	float: left;
	line-height: 40px;
	font-size: 18px;
	font-weight: 600;
	font-family: Microsoft YaHei;
}
.top_title{
	width: 100%;
	height: 60px;
	font-family: Microsoft YaHei;
	font-size: 14px;
    font-weight: 600;
}
.top_one{
	width: 100%;
	height: 30px;
	float: left;
	line-height: 30px;
}
.top_two{
	width: 50%;
	height: 30px;
	float: left;
	line-height: 30px;
}
.top_three{
	width: 50%;
	height: 30px;
	float: left;
	line-height: 30px;
}
</style>
<div class="col-auto">
<div class="col-1 ">
<h5 class="title">支付扫码</h5>
<?php $userid = param::get_cookie('_userid');?>
<?php $trade_sn = param::get_cookie('trade_sn');?>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=dca431997cea1ebee4e326d0932e7cab&sql=SELECT+%2A+FROM+v9_pay_account+WHERE+userid%3D%27%24userid%27+and+trade_sn%3D%27%24trade_sn%27&num=1&return=data88\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM v9_pay_account WHERE userid='$userid' and trade_sn='$trade_sn' LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data88 = $a;unset($a);?>
<?php $n=1;if(is_array($data88)) foreach($data88 AS $dd) { ?>
	<div class="top_title">
		<div class="top_one">
			<span style="padding-left: 30px;">订单号：</span>
			<?php echo $dd['trade_sn'];?>
		</div>
		<div class="top_two">
			<span style="padding-left: 30px;">订单价格：</span>
			<?php echo $dd['money'];?>
		</div>
		<div class="top_three">
			<span>商品总数：</span>
			<?php echo $dd['quantity'];?>&nbsp;件
		</div>
	</div>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
	<div class="content">

			<div class="box_a">
				<div class="weixin">
					<img src="<?php echo IMG_PATH;?>logo/weixinpay.png">
				</div>
				<div class="weixin_title">
					<div class="weixin_log">微&nbsp;信&nbsp;支&nbsp;付</div>
				</div>
			</div>	

			<div class="box_b">
				<div class="zhifubao">
					<img src="<?php echo IMG_PATH;?>logo/zhifubaopay.png">
				</div>
				<div class="zhifubao_title">
					<div class="zhifubao_log">支&nbsp;付&nbsp;宝&nbsp;支&nbsp;付</div>
				</div>
			</div>
			<div class="box_c">
				<div class="t_btn">
					<div class="t_btn_one">
						<button class="btn_one">成功支付，点击确认</button>
					</div>
					<div class="t_btn_two">
						<button class="btn_two">取消交易</button>
					</div>	
				</div>
			</div>
			<div class="box_d">【注意】请在扫码后的支付界面留言或备注留下本页面上的订单号,且在扫码支付成功后点击上面的“成功支付，点击确认”按钮。</div>
		<div class="bk10"></div>
	</div>
</div>
</div>
</div>

<input type="hidden" name="userid" id="userid" value="<?php echo $userid;?>">
<input type="hidden" name="trade_sn" id="trade_sn" value="<?php echo $trade_sn;?>">
<script type="text/javascript">
$(function(){
	var userid=$("#userid").val();
	var trade_sn=$("#trade_sn").val();
	$(".btn_one").click(function(){
		$.ajax({
            type: "POST",  
            url: "http://www.xiaojindou123.com/hadpay.php", 
            data:{userid:userid,trade_sn:trade_sn},
            dataType: "text",
            success: function(data) {
              // if (data.success) { 
              //   alert(data.msg);
              // } else {
              //   alert("出现错误：" + data.msg);
              // }
                // alert(data);
                alert("订单确认支付，请等待后台管理员确认！");
            	window.location.href="index.php?m=pay&c=order&a=init";
            },
        });
	});
	$(".btn_two").click(function(){
		$.ajax({
            type: "POST",  
            url: "http://www.xiaojindou123.com/unpay.php", 
            data:{userid:userid,trade_sn:trade_sn},
            dataType: "text",
            success: function(data) {
              // if (data.success) { 
              //   alert(data.msg);
              // } else {
              //   alert("出现错误：" + data.msg);
              // }
                // alert(data);
                alert("交易取消！");
            	window.location.href="index.php?m=pay&c=order&a=init";
            },
        });
	});
});
</script>
<?php include template('member', 'footer'); ?>