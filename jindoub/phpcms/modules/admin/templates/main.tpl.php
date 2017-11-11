<?php
defined('IN_ADMIN') or exit('No permission resources.');
include PC_PATH.'modules'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.tpl.php';
?>
<div id="main_frameid" class="pad-10 display" style="_margin-right:-12px;_width:98.9%;">
<script type="text/javascript">
$(function(){if ($.browser.msie && parseInt($.browser.version) < 7) $('#browserVersionAlert').show();}); 
</script>
<div class="explain-col mb10" style="display:none" id="browserVersionAlert">
<?php echo L('ie8_tip')?></div>
<div class="col-2 lf mr10" style="width:48%">
	<h6><?php echo L('personal_information')?></h6>
	<div class="content">
	<?php echo L('main_hello')?><?php echo $admin_username?><br />
	<?php echo L('main_role')?><?php echo $rolename?> <br />
	<div class="bk20 hr"><hr /></div>
	<?php echo L('main_last_logintime')?><?php echo date('Y-m-d H:i:s',$logintime)?><br />
	<?php echo L('main_last_loginip')?><?php echo $loginip?> <br />
	</div>
</div>
<div class="col-2 col-auto">
	<h6><?php echo L('main_safety_tips')?></h6>
	<div class="content" style="color:#ff0000;">
<?php if($pc_writeable) {?>	
<?php echo L('main_safety_permissions')?><br />
<?php } ?>
<?php if(pc_base::load_config('system','debug')) {?>
<?php echo L('main_safety_debug')?><br />
<?php } ?>
<?php if(!pc_base::load_config('system','errorlog')) {?>
<?php echo L('main_safety_errlog')?><br />
<?php } ?>
	<div class="bk20 hr"><hr /></div>	
<?php if(pc_base::load_config('system','execution_sql')) {?>	
<?php echo L('main_safety_sql')?> <br />
<?php } ?>
<?php if($logsize_warning) {?>	
<?php echo L('main_safety_log',array('size'=>$common_cache['errorlog_size'].'MB'))?>
 <br />
<?php } ?>
<?php 
$tpl_edit = pc_base::load_config('system','tpl_edit');
if($tpl_edit=='1') {?>
<?php echo L('main_safety_tpledit')?><br />
<?php } ?>
	</div>
</div>
<div class="bk10"></div>
<div class="col-2 lf mr10" style="width:48%">
<?php
$ccache = getcache('category_content_1','commons');

if(module_exists('member') && is_array($ccache)) { ?>
	<h6><?php echo L('main_shortcut')?></h6>
	<div class="content" id="admin_panel">
	<?php foreach($adminpanel as $v) {?>
		<span>
			[<a target="right" href="<?php echo $v['url'].'&menuid='.$v['menuid'];?>&pc_hash=<?php echo $_SESSION['pc_hash'];?>"><?php echo L($v['name'])?></a>]   
		</span>
	<?php }?>
	</div>
<?php } else { ?>
	<h6>Update Caches</h6>
	<div class="content" id="update_tips" style="height:90px; overflow:auto;"><ul id="file" class="sbul">
<div class="pad-10">
<form action="?m=admin&c=cache_all&a=init&pc_hash=<?php echo $_SESSION['pc_hash'];?>" target="cache_if" method="post" id="myform" name="myform">
  <input type="hidden" name="dosubmit" value="1">
</form>
<iframe id="cache_if" name="cache_if" class="ifm" width="0" height="0"></iframe>
</div>
<script type="text/javascript">
document.myform.submit();
function addtext(data) {
	$('#file').append(data);
	document.getElementById('update_tips').scrollTop = document.getElementById('update_tips').scrollHeight;
}
</script>
	</div>
<?php }?>
</div>
<div class="col-2 col-auto">
	<h6><?php echo L('main_sysinfo')?></h6>
	<div class="content">
	<?php echo L('main_version')?>Phpcms <?php echo PC_VERSION?>  Release <?php echo PC_RELEASE?> [<a href="http://download.phpcms.cn/v9/" target="_blank"><?php echo L('main_latest_version')?></a>]<br />
	<?php echo L('main_os')?><?php echo $sysinfo['os']?> <br />
	<?php echo L('main_web_server')?><?php echo $sysinfo['web_server']?> <br />
	<?php echo L('main_sql_version')?><?php echo $sysinfo['mysqlv']?><br />
	<?php echo L('main_upload_limit')?><?php echo $sysinfo['fileupload']?><br />	
	</div>
</div>
<!-- <div class="bk10"></div>
<div class="col-2 lf mr10" style="width:48%">
	<h6><?php echo L('main_product_team')?></h6>
	<div class="content">
	<?php echo L('main_copyright')?><?php echo $product_copyright?><br />
	<?php echo L('main_product_dev')?><?php echo $programmer;?><br />
	<?php echo L('main_product_ui')?><?php echo $designer;?><br />
	<?php echo L('main_product_site')?><a href="http://www.phpcms.cn/" target="_blank">http://www.phpcms.cn/</a> <br />
	<?php echo L('main_product_bbs')?><a href="http://bbs.phpcms.cn/" target="_blank">http://bbs.phpcms.cn/</a> <br />
	<?php echo L('main_product_qq')?>7634000 <br />
	<?php echo L('main_product_sales')?>1561683312
	</div>
</div> -->

<!-- <div class="col-2 col-auto">
	<h6><?php echo L('main_license')?></h6>
	<div class="content">
	<?php echo L('main_version')?>Phpcms <?php echo PC_VERSION?>  Release <?php echo PC_RELEASE?> [<a href="http://buy.phpcms.cn" target="_blank"><?php echo L('main_support')?></a>]<br />
	<?php echo L('main_license_type')?><span id="phpcms_license"></span> <br />
	<?php echo L('main_serial_number')?><span id="phpcms_sn"></span> <br />
	</div>
</div> -->
    <div class="bk10"></div>
<div class="col-2 col-auto">
	<h6>后台启动</h6>
	<div class="content">
		<div style="width: 100%;height: 26px;">
			<a href="http://www.xiaojindou123.com/php/backup1.php"><button id="btn1" style="height: 26px;width:90px;border:1px solid #666;background: #ddd;"><span style="font-size: 14px;">倒计时开启</span></button></a>
			<!-- <span>此按钮需要每天08:55前点击开启倒计时（注意：只需要点击一下，请勿多次点击），如果9:00-21:00时服务器重启，需要重新点击一次</span> -->
			<span>此按钮为点击开启倒计时（注意：只需要点击一下，请勿多次点击），如果服务器重启，需要重新点击一次</span>
		</div>
		<div style="width: 100%;height: 10px;"></div>
		<div style="width: 100%;height: 26px;">
			<button id="btn2" style="height: 26px;width:90px;border:1px solid #666;background: #ddd;"><span style="font-size: 14px;">清除开奖记录</span></button>
			<span>此按钮为清除开奖记录，清除的记录为点击按钮的两天前的数据</span>
		</div>
		<div style="width: 100%;height: 10px;"></div>
		<div style="width: 100%;height: 26px;">
			<button id="btn3" style="height: 26px;width:90px;border:1px solid #666;background: #ddd;"><span style="font-size: 14px;">刷数据</span></button>
			<!-- <span>此按钮为刷开奖数据，每天8：59前点击开启，从8：59开始每期投注100万总投注额，投注人数+10人,每天21：00停止</span> -->
			<span>此按钮为刷开奖数据，从8：59开始每期投注100万总投注额，投注人数+10人。（注意：只需要点击一下，请勿多次点击），如果服务器重启，需要重新点击一次</span>
		</div>
		<div style="width: 100%;height: 10px;"></div>
		<div style="width: 100%;height: 26px;">
			<button id="btn4" style="height: 26px;width:90px;border:1px solid #666;background: #ddd;"><span style="font-size: 14px;">刷新排行榜</span></button>
			<!-- <span>此按钮为刷开奖数据，每天8：59前点击开启，从8：59开始每期投注100万总投注额，投注人数+10人,每天21：00停止</span> -->
			<span>此按钮为刷新排行榜，手动将前一天的排行榜数据放到昨天排行榜，今天排行榜数据重置。</span>
		</div>
	</div>
</div>
    <div class="bk10"></div>
</div>
<script type="text/javascript">
    $("#btn1").click(function(){
        // $.ajax({
        //     type: "POST",  
        //     url: "http://www.xiaojindou123.com/backup1.php", 
        //     data:{},
        //     dataType: "json",
        //     success: function(data) {
        //       // if (data.success) { 
        //       //   alert(data.msg);
        //       // } else {
        //       //   alert("出现错误：" + data.msg);
        //       // }
        //         alert("今天的开奖结束！");
        //     },
        // });
        alert("倒计时开启成功！");
    });
    $("#btn2").click(function(){
        $.ajax({
            type: "POST",  
            url: "http://www.xiaojindou123.com/deldata.php", 
            data:{},
            dataType: "json",
            success: function(data) {
              // if (data.success) { 
              //   alert(data.msg);
              // } else {
              //   alert("出现错误：" + data.msg);
              // }
            },
        });
        alert("数据已清理完成！");
    });
     $("#btn3").click(function(){
        $.ajax({
            type: "POST",  
            url: "http://www.xiaojindou123.com/shua.php", 
            data:{},
            dataType: "json",
            success: function(data) {
              // if (data.success) { 
              //   alert(data.msg);
              // } else {
              //   alert("出现错误：" + data.msg);
              // }
                alert("今天的刷数据结束！");
            },
        });
        alert("刷数据开启成功！");
    });
      $("#btn4").click(function(){
        $.ajax({
            type: "POST",  
            url: "http://www.xiaojindou123.com/shualevel.php", 
            data:{},
            dataType: "json",
            success: function(data) {
              // if (data.success) { 
              //   alert(data.msg);
              // } else {
              //   alert("出现错误：" + data.msg);
              // }
                alert(data);
            },
        });
    });
</script>
</body></html>