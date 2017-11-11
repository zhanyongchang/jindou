<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>
<div id="memberArea">
<?php include template('member', 'left'); ?>
<style type="text/css">
.top_u{
    width: 100%;
    height: 28px;
}
.top_u ul li{
    width: 25%;
    height: 28px;
    line-height: 28px;
    text-align: center;
    float: left;
    display: block;
}
.box_u{
    width: 100%;
    margin-top: 6px;
}
.box_u ul li{
    width: 100%;
}
.top_u ul li a{
    text-decoration: none;
}
</style>
<?php $userid = param::get_cookie('_userid');?>
<div class="col-auto">
    <div class="col-1 ">
    <h6 class="title">奖励记录</h6>
        <div class="content">
            <div class="top_u">
                <ul id="hear">
                    <li><a href="index.php?m=member&c=index&a=log">登录奖励记录</a></li>
                    <li><a href="index.php?m=member&c=index&a=log_buy">购物返利奖励记录</a></li>
                    <li><a href="index.php?m=member&c=index&a=log_tui">推广奖励记录</a></li>
                    <li style="border-bottom: 2px solid #3aaafe;"><a href="index.php?m=member&c=index&a=log_ba">争霸奖励记录</a></li>
                </ul>
            </div>
            <div class="box_u">
                <ul id="contentop">
                    <li style="display: none;">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=c61a4cbfcc1ee7756f04f956d6a4e548&sql=SELECT+%2A+FROM+v9_addtype+WHERE+userid%3D%27%24userid%27+and+addtype%3D3+order+by+addtime+desc&num=20&page=%24page&return=data1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$pagesize = 20;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$r = $get_db->sql_query("SELECT COUNT(*) as count FROM (SELECT * FROM v9_addtype WHERE userid='$userid' and addtype=3 order by addtime desc) T");$s = $get_db->fetch_next();$pages=pages($s['count'], $page, $pagesize, $urlrule);$r = $get_db->sql_query("SELECT * FROM v9_addtype WHERE userid='$userid' and addtype=3 order by addtime desc LIMIT $offset,$pagesize");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data1 = $a;unset($a);?>
                        <table width="100%" border="0" cellpadding="0" align="center" color="black">
                            <tr align="center">
                                <td width="10%" style="height: 28px">用户id</td>
                                <td width="16%" style="height: 28px">用户名</td>
                                <td width="20%" style="height: 28px">奖励金豆数</td>
                                <td width="20%" style="height: 28px">奖励时间</td>
                                <td width="10%" style="height: 28px">类型</td>
                            </tr>
                            <?php $n=1;if(is_array($data1)) foreach($data1 AS $a) { ?>
                            <tr align="center">    
                                <td width="10%" style="height: 28px"><?php echo $a['userid'];?></td>
                                <td width="20%" style="height: 28px"><?php echo $a['username'];?></td>
                                <td width="30%" style="height: 28px"><?php echo $a['jindounum'];?></td>
                                <td width="30%" style="height: 28px"><?php echo date('Y-m-d H:i',$a[addtime]);?></td>
                                <td width="10%" style="height: 28px">登录奖励</td>
                            </tr>    
                            <?php $n++;}unset($n); ?>
                            
                        </table>
                        <div id="pages" class="text-c"><?php echo $pages;?></div>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    </li>

                    <li style="display: none;">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=a4ee5eefe526fc690bc7446eaca9cac8&sql=SELECT+%2A+FROM+v9_addtype+WHERE+userid%3D%27%24userid%27+and+addtype%3D4+order+by+addtime+desc&num=20&page=%24page&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$pagesize = 20;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$r = $get_db->sql_query("SELECT COUNT(*) as count FROM (SELECT * FROM v9_addtype WHERE userid='$userid' and addtype=4 order by addtime desc) T");$s = $get_db->fetch_next();$pages=pages($s['count'], $page, $pagesize, $urlrule);$r = $get_db->sql_query("SELECT * FROM v9_addtype WHERE userid='$userid' and addtype=4 order by addtime desc LIMIT $offset,$pagesize");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data2 = $a;unset($a);?>
                        <table width="100%" border="0" cellpadding="0" align="center" color="black">
                            <tr align="center">
                                <td width="10%" style="height: 28px">用户id</td>
                                <td width="16%" style="height: 28px">用户名</td>
                                <td width="20%" style="height: 28px">奖励金豆数</td>
                                <td width="20%" style="height: 28px">奖励时间</td>
                                <td width="10%" style="height: 28px">类型</td>
                            </tr>
                            <?php $n=1;if(is_array($data2)) foreach($data2 AS $b) { ?>
                            <tr align="center">
                                <td width="10%" style="height: 28px"><?php echo $b['userid'];?></td>
                                <td width="20%" style="height: 28px"><?php echo $b['username'];?></td>
                                <td width="30%" style="height: 28px"><?php echo $b['jindounum'];?></td>
                                <td width="30%" style="height: 28px"><?php echo date('Y-m-d H:i',$b[addtime]);?></td>
                                <td width="10%" style="height: 28px">购物奖励</td>
                            </tr>    
                            <?php $n++;}unset($n); ?>
                        </table>
                        <div id="pages" class="text-c"><?php echo $pages;?></div>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>    
                    </li>

                    <li style="display: none;">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=5cb4f12e4fb80dee9340c65af0ebe635&sql=SELECT+%2A+FROM+v9_addtype+WHERE+userid%3D%27%24userid%27+and+addtype%3D1+order+by+addtime+desc&num=20&page=%24page&return=data3\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$pagesize = 20;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$r = $get_db->sql_query("SELECT COUNT(*) as count FROM (SELECT * FROM v9_addtype WHERE userid='$userid' and addtype=1 order by addtime desc) T");$s = $get_db->fetch_next();$pages=pages($s['count'], $page, $pagesize, $urlrule);$r = $get_db->sql_query("SELECT * FROM v9_addtype WHERE userid='$userid' and addtype=1 order by addtime desc LIMIT $offset,$pagesize");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data3 = $a;unset($a);?>
                        <table width="100%" border="0" cellpadding="0" align="center" color="black">
                            <tr align="center">
                                <td width="10%" style="height: 28px">用户id</td>
                                <td width="16%" style="height: 28px">用户名</td>
                                <td width="20%" style="height: 28px">奖励金豆数</td>
                                <td width="20%" style="height: 28px">奖励时间</td>
                                <td width="10%" style="height: 28px">类型</td>
                            </tr>
                            <?php $n=1;if(is_array($data3)) foreach($data3 AS $c) { ?>
                            <tr align="center">
                                <td width="10%" style="height: 28px"><?php echo $c['userid'];?></td>
                                <td width="20%" style="height: 28px"><?php echo $c['username'];?></td>
                                <td width="30%" style="height: 28px"><?php echo $c['jindounum'];?></td>
                                <td width="30%" style="height: 28px"><?php echo date('Y-m-d H:i',$c[addtime]);?></td>
                                <td width="10%" style="height: 28px">推广奖励</td>
                            </tr>
                            <?php $n++;}unset($n); ?>
                        </table>
                        <div id="pages" class="text-c"><?php echo $pages;?></div>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>    
                    </li>
                    <li>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=6ad9ad7285678589d3f783df4a6dd43a&sql=SELECT+%2A+FROM+v9_addtype+WHERE+userid%3D%27%24userid%27+and+addtype%3D2+order+by+addtime+desc&num=20&page=%24page&return=data4\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$pagesize = 20;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$r = $get_db->sql_query("SELECT COUNT(*) as count FROM (SELECT * FROM v9_addtype WHERE userid='$userid' and addtype=2 order by addtime desc) T");$s = $get_db->fetch_next();$pages=pages($s['count'], $page, $pagesize, $urlrule);$r = $get_db->sql_query("SELECT * FROM v9_addtype WHERE userid='$userid' and addtype=2 order by addtime desc LIMIT $offset,$pagesize");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data4 = $a;unset($a);?>
                         <table width="100%" border="0" cellpadding="0" align="center" color="black">
                            <tr align="center">
                                <td width="10%" style="height: 28px">用户id</td>
                                <td width="16%" style="height: 28px">用户名</td>
                                <td width="20%" style="height: 28px">奖励金豆数</td>
                                <td width="20%" style="height: 28px">奖励时间</td>
                                <td width="10%" style="height: 28px">类型</td>
                            </tr>
                            <?php $n=1;if(is_array($data4)) foreach($data4 AS $d) { ?>
                            <tr align="center">    
                                <td width="10%" style="height: 28px"><?php echo $d['userid'];?></td>
                                <td width="20%" style="height: 28px"><?php echo $d['username'];?></td>
                                <td width="30%" style="height: 28px"><?php echo $d['jindounum'];?></td>
                                <td width="30%" style="height: 28px"><?php echo date('Y-m-d H:i',$d[addtime]);?></td>
                                <td width="10%" style="height: 28px">争霸奖励</td>
                            </tr>    
                            <?php $n++;}unset($n); ?>
                        </table>
                        <div id="pages" class="text-c"><?php echo $pages;?></div>
                        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<?php include template('member', 'footer'); ?>