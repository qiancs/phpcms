<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('member', 'header'); ?>
<div id="memberArea">
    <?php include template('member', 'left'); ?>
   <!-- <link type="text/css" rel="stylesheet" href="<?php echo BS_PATH; ?>css/bootstrap.min.css" />

    <script href="<?php echo JS_PATH; ?>jquery.min.js"></script>
    <script href="<?php echo BS_PATH; ?>js/bootstrap.min.js"></script>-->
    <?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/16
 * Time: 11:45
 */
?>
    <div class="col-auto">
        <div class="col-1">
            <h6 class="title">政协委员排查</h6>
            <div class="content">
                <table cellpadding="0" width="100%" class="table-list">
                    <thead>
                    <tr>
                        <th>姓名</th>
                        <th>现任（原任职务）</th>
                        <th>排查类型</th>
                        <th>单位</th>
                        <th colspan="2">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $n=1;if(is_array($rows)) foreach($rows AS $val) { ?>
                    <tr>
                        <td ><a href="?m=invest&c=consul&a=show&id=<?php echo $val['id'];?>"><?php echo $val["name"];?></a> </td>
                        <td><?php echo $val["office"];?></td>
                        <td><?php echo translate_invest_type($val["type"]);?></td>
                        <td><?php echo $val["organization"];?></td>
                        <td><a href="?m=invest&c=consul&a=modify&id=<?php echo $val['id'];?>">修改</a> </td>
                        <td><a href="?m=invest&c=consul&a=delete&id=<?php echo $val['id'];?>" onclick="if (!confirm('确认要删除？')) window.event.returnValue = false; ">删除</a> </td>
                    </tr>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

                    </tbody>
                </table>
            </div>
            <div class="pages"><?php echo $pages;?></div>
        </div>
        <div class="col-lg-1">
            <button class="button" onclick="location.href='?m=invest&c=consul&a=add&type=6'">添加撤销资格政协委员</button>
            <button class="button" onclick="location.href='?m=invest&c=consul&a=add&type=7'">添加责令辞去政协委员</button>
        </div>
    </div>
</div>
<?php include template('member', 'footer'); ?>