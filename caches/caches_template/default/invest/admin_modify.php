<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("member", "header"); ?>
<div id="memberArea">
    <?php include template("member", "left"); ?>
    <div class="col-auto">
        <div class="col-1">
        <h6 class="title"><?php echo $title;?></h6>
            <div class="content">
                <form action="?m=invest&c=admin&a=update" method="post">
                    <table class="table_form" cellspacing="0" width="100%">
                        <tr>
                            <th width="150">姓名：</th>
                            <td><input class="input-text" name="name" size="10" value="<?php echo $row['name'];?>"></td>
                        </tr>
                        <tr>
                            <th width="150">身份证号：</th>
                            <td><input class="input-text" name="identity" size="30" value="<?php echo $row['identify'];?>"></td>
                        </tr>
                        <tr>
                            <th width="150">现任（原任）职务：</th>
                            <td><input class="input-text" name="office" size="30" value="<?php echo $row['office'];?>"></td>
                        </tr>
                        <tr>
                            <th width="150">性别：</th>
                            <td>
                                <?php echo form::select(array('男' => '男', '女' => '女'), $row[sex], 'name="sex"', '请选择');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">民族：</th>
                            <td>
                                <?php echo form::select(array('汉族' => '汉族', '回族' => '回族', '满族' => '满族', '蒙古族' => '蒙古族',
                                '壮族' => '壮族', '其他少数民族' => '其他少数民族'),
                                $row[nation], 'name="nation"', '请选择');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">出生年月：</th>
                            <td>
                                <?php echo form::date('birth', $row[birth]);?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">入党时间：</th>
                            <td>
                                <?php echo form::date('party', $row[party]);?>
                            </td>
                        </tr>
                        <?php if($type == 10 ) { ?>
                        <tr>
                            <th width="150">处政处罚原因：</th>
                            <td>
                                <?php echo form::select(array('因涉黄受行政处罚' => '因涉黄受行政处罚',
                                '因涉赌受行政处罚' => '因涉赌受行政处罚',
                                '因涉毒受行政处罚' => '因涉毒受行政处罚',
                                '其他原因' => '其他原因'), $row[admin_penalty_reason], 'name="admin_penalty_reason"');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">行政处罚情况：</th>
                            <td>
                                <textarea name="admin_penalty_detail" rows="2" cols="50"><?php echo $row['admin_penalty_detail'];?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">行政处罚时间：</th>
                            <td>
                                <?php echo form::date('admin_penalty_time', $row[admin_penalty_time]);?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">给予党纪处分情况：</th>
                            <td>
                                <textarea name="discip_measure" rows="2" cols="50"><?php echo $row['discip_measure'];?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">给予党纪处分时间：</th>
                            <td>
                                <?php echo form::date('measure_time', $row[measure_time]);?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">给予组织处理情况：</th>
                            <td>
                                <textarea name="orga_sanction" rows="2" cols="50"><?php echo $row['orga_sanction'];?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">给予组织处理时间：</th>
                            <td>
                                <?php echo form::date('sanction_time', $row[sanction_time]);?>
                            </td>
                        </tr>
                        <?php } else { ?>
                        <h1>无效的刑事责任追究党员类型';</h1>
                        <?php } ?>

                        <tr>
                            <td></td>
                            <td>
                                <input type="hidden" value="<?php echo $row['id'];?>" name="id">
                                <input type="submit" name="dosubmit" value="<?php echo $title;?>">
                            </td>
                        </tr>
                    </table>
                </form>

            </div>

        </div>
    </div>

</div>
<?php include template("member", "footer"); ?>