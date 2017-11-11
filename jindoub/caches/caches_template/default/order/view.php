<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>
<div id="memberArea">
<?php include template('member', 'left'); ?>
<div class="col-auto">

<div class="col-1 ">
<h6 class="title">订单查看</h6>
<div class="content">
<table width="100%" cellspacing="0" class="table_form">
<tr>
	<th  width="100">订单号：</th>
	<td><?php echo $trade_sn;?></td>
</tr>
<tr>
	<th>商品价格：</th>
	<td><?php echo $account_data['money'];?></td>
</tr>
<tr>
	<th>商品总数：</th>
	<td><?php echo $account_data['quantity'];?>件</td>
</tr>
<?php if($account_data['discount']) { ?>
<tr>
	<th>折扣/涨价：</th>
	<td><?php echo $account_data['discount'];?> 元</td>
</tr>
<?php } ?>
<?php if($account_data['logistics_id']) { ?>
 <tr>
   <th>配送方式：</th>
   <td> <?php echo $logistics_data['name'];?> 手续费:<?php echo $logistics_data['fee'];?>元 </td>
 </tr>
<?php } ?>
<tr>
	<th>支付方式：</th>
	<td><?php echo $account_data['payment'];?> 手续费:<?php echo $pay_fee;?>元</td>
</tr>

     <tr>
       <th>收货人：</th>
       <td><?php echo $account_data['contactname'];?></td>
     </tr>
     <tr>
       <th>收货地址：</th>
       <td><?php echo $account_data['address'];?></td>
     </tr>
     <tr>
       <th>电 话：</th>
       <td><?php echo $account_data['telephone'];?></td>
     </tr>
	 <tr>		
		<th>E-mail：</th>
		<td><?php echo $account_data['email'];?></td>
	 </tr>
	 
     <tr>
       <th>备  注：</th>
       <td><?php echo $account_data['usernote'];?></td>
     </tr>

	<tr>
		<th>总计：</th>
		<td><font style="color:#F00; font-size:22px;font-family:Georgia,Arial; font-weight:700"><?php echo $price;?></font>  元</td>
	</tr>

     <tr>
       <td></td>
       <td colspan="2"><label>
         <input type="button" name="dosubmit" id="dosubmit" value="返 回" class="button" onclick="redirect('<?php echo APP_PATH;?>index.php?m=pay&c=order&a=init')"/>
         </label></td>
     </tr>
   </table>

<br>

<table width="100%" cellspacing="0"  class="table-list">
    <thead>
        <tr>
	        <th width="10%">序 号</th>
	        <th width="30%">名 称</th>
	        <th width="10%">数 量</th>
	        <th>单价(元)</th>
        </tr>
    </thead>
    <tbody>
	<?php $n=1;if(is_array($infos)) foreach($infos AS $info) { ?> 
	<tr>
		<td align="center"><?php echo $n;?></td>
		<td align="center"><a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=show&catid=<?php echo $info['a_catid'];?>&id=<?php echo $info['a_id'];?>" target="_blank"><?php echo $info['a_title'];?></a></td>
		<td align="center"><?php echo $info['quantity'];?></td>
		<td align="center"><?php echo $info['money'];?></td>
	</tr>
	<?php $n++;}unset($n); ?>
    </tbody>
</table>


   </div>
   <span class="o1"></span><span class="o2"></span><span class="o3"></span><span class="o4"></span>
   </div>
   </div>
</div>
<?php include template('member', 'footer'); ?>