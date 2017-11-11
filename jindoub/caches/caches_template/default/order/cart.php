<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>admin_common.js"></script> 
<link href="<?php echo CSS_PATH;?>dialog.css" rel="stylesheet" type="text/css" /> 
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>dialog.js"></script>
<div id="memberArea">
<?php include template('member', 'left'); ?>
<div class="col-auto">
<div class="col-1 ">
<h6 class="title">购物车</h6>
<div class="content"> 
<form name="myform" id="myform" action="?m=order&c=cart&a=edit" method="post" >
<input type="hidden" name="buttontype" id="buttontype" value="edit" />
<table width="100%" cellspacing="0"  class="table-list">
    <thead>
        <tr>
	        <th width="5%"><input type="checkbox" value="" id="check_box" onclick="selectall('selectid[]');"></th>
	        <th width="10%">序 号</th>
	        <th width="30%">名 称</th>
	        <th width="10%">数 量</th>
	        <th>单价(元)</th>
	        <th>操作</th>
        </tr>
    </thead>
    <tbody>
	<?php $n=1;if(is_array($infos)) foreach($infos AS $info) { ?> 
	<tr>
		<td align="center"><input type="checkbox" name="selectid[]" value="<?php echo $info['id'];?>"></td>
		<td align="center"><?php echo $n;?></td>
		<td align="center"><a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=show&catid=<?php echo $info['a_catid'];?>&id=<?php echo $info['a_id'];?>" target="_blank"><?php echo $info['a_title'];?></a></td>
		<td align="center">
			<input type="hidden" name="id[]" value="<?php echo $info['id'];?>" />
			<input type="text" name="quantity[]" value="<?php echo $info['quantity'];?>" size="4" />
		</td>
		<td align="center"><?php echo $info['money'];?></td>
		<td align="center"><a href="<?php echo APP_PATH;?>index.php?m=order&c=cart&a=delete&id=<?php echo $info['id'];?>">删除</a></td>
	</tr>
	<?php $n++;}unset($n); ?>
    </tbody>
</table>
<div class="btn">
	<a href="#" onClick="javascript:$('input[type=checkbox]').attr('checked', true)">全选</a>/<a href="#" onClick="javascript:$('input[type=checkbox]').attr('checked', false)">取消</a> 

	<input name="upbut" type="button" class="button" value="更新购物车" onClick="$('#buttontype').val('edit');$('#myform').submit();">&nbsp;
	<input name="delbut" type="button" class="button" value="删除选中" onClick="but_del()">&nbsp;
	<input name="clebut" type="button" class="button" value="清空购物车" onClick="redirect('<?php echo APP_PATH;?>index.php?m=order&c=cart&a=clear')">&nbsp;
    <input name="nxtbut" type="button" class="button" value="下一步" onClick="redirect('<?php echo APP_PATH;?>index.php?m=order&c=cart&a=pay')">&nbsp;

共件<font color=#FF0000><?php echo $total_quantity;?></font> 商品,合计<font color=#FF0000><?php echo $total_money;?></font> 元

</div> 
</form>   

 <div id="pages"><?php echo $pages;?></div>
</div>
<span class="o1"></span><span class="o2"></span><span class="o3"></span><span class="o4"></span>
</div>

</div>
</div>
<script type="text/javascript">
function but_del() {
	$('#buttontype').val('del');
	var ids='';
	$("input[name='selectid[]']:checked").each(function(i, n){
		ids += $(n).val() + ',';
	});
	if(ids=='') {
		window.top.art.dialog({content:'请选择再执行操作',lock:true,width:'200',height:'50',time:1.5},function(){});
	} else {
		$('#myform').submit();
	}
}
</script>
<?php include template('member', 'footer'); ?>

