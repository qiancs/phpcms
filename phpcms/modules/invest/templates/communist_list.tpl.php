<?php
defined('IN_ADMIN') or exit('No permission resources.');
$show_dialog = 1;
include $this->admin_tpl('header','admin');
?>
<div class="pad-lr-10">
    <form name="searchform" action="?m=message&c=message&a=search_message&menuid=<?php echo $_GET['menuid'];?>" method="post" >
        <table width="100%" cellspacing="0" class="search-form">
            <tbody>
            <tr>
                <td><div class="explain-col"><?php echo L('invest_type')?>:<?php echo form::select($invest_type,'','name="search[status]"', L('please_select'))?>      <?php echo L('username')?>:  <input type="text" value="" class="input-text" name="search[username]">  <?php echo L('time')?>:  <?php echo form::date('search[start_time]','','')?> <?php echo L('to')?>   <?php echo form::date('search[end_time]','','')?>    <input type="submit" value="<?php echo L('search')?>" class="button" name="dosubmit">
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
    <table width="100%" cellspacing="0">
        <thead>
        <tr>
            <th width="35" align="center"><input type="checkbox" value="" id="check_box" onclick="selectall('messageid[]');"></th>
            <th>姓名</th>
            <th width="10%" align="center">性别</th>
            <th width="35%" align="center">单位</th>
            <th width='10%' align="center">排查类型</th>
            <th width="15%" align="center">职务</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($infos as $info) { ?>
            <tr>
                <td align="center"><?php echo $info[id] ?></td>
                <td align="center"><?php echo $info[name] ?></td>
                <td align="center"><?php echo $info[sex] ?></td>
                <td align="center"><?php echo $info[organization] ?></td>
                <td align="center"><?php echo $info[type] ?></td>
                <td align="center"><?php echo $info[office] ?></td>
            </tr>
        <?php
        } ?>
        </tbody>
    </table>
