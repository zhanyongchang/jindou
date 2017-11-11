<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>
<div id="memberArea">
<?php include template('member', 'left'); ?>
<div class="col-auto">
<div class="col-1 ">
<h6 class="title">商品订单</h6>
<div class="content">
<form name="searchform" action="<?php echo APP_PATH;?>index.php?m=pay&c=deposit" method="get" >
<input type="hidden" value="pay" name="m">
<input type="hidden" value="deposit" name="c">
<input type="hidden" value="init" name="a">
		<div class="search">
		订单时间  <?php echo form::date('info[start_addtime]',$start_addtime);?> 到   <?php echo form::date('info[end_addtime]',$end_addtime);?>
		<?php echo form::select($trade_status,$status,'name="info[status]"', L('all_status'));?>  
		<input type="submit" value="查询" class="button" name="dosubmit">
		</div>
</form>
<table width="100%" cellspacing="0"  class="table-list">
        <thead>
            <tr>
            <th width="30%">支付单号</th>
            <th width="30%">时间</th>
            <th width="10%">金额</th>
            <th width="15%">支付状态</th>
			<th width="15%">查看</th>
            </tr>
        </thead>
    <tbody>
	<?php $n=1;if(is_array($infos)) foreach($infos AS $info) { ?> 
	<tr>
		<td  align="center"><a href='<?php echo APP_PATH;?>index.php?m=pay&c=order&a=view&trade_sn=<?php echo $info['trade_sn'];?>'><?php echo $info['trade_sn'];?></a></td>
		<td  align="center"><?php echo date('Y-m-d H:i:s',$info['addtime']);?></td>
		<td  align="center"><!-- <?php echo $info['money'];?> --><?php echo $info['price'];?> 元</td>
		<td  align="center"><?php echo L($info['status']);?> </a>
		<td  align="center"><a href='<?php echo APP_PATH;?>index.php?m=pay&c=order&a=view&trade_sn=<?php echo $info['trade_sn'];?>'>[查看订单]</a></td>
	</tr>
	<?php $n++;}unset($n); ?>
    </tbody>
</table>

 <div id="pages"> <?php echo $pages;?></div>
</div>
<span class="o1"></span><span class="o2"></span><span class="o3"></span><span class="o4"></span>
</div>

</div>
</div>
<?php include template('member', 'footer'); ?>
