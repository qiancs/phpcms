<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("member", "header"); ?>
<div id="memberArea">
    <?php include template("member", "left"); ?>
    <div class="col-auto">
        <div class="col-1">
        <h6 class="title"><?php echo $title;?></h6>
            <div class="content">
                <form action="?m=invest&c=representative&a=update" method="post">
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
                            <th width="150">所在单位党委名称：</th>
                            <td><input class="input-text" name="organization" size="30" value="<?php echo $row['organization'];?>"></td>
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
                        <?php if($type == 1 ) { ?>
                        <tr>
                            <th width="150">终止资格原因：</th>
                            <td>
                                <?php echo form::select(array('受到留党察看及以上处分' => '受到留党察看及以上处分',
                                '因出国（境）定居等原因被停止党籍或者丧失中国籍' => '因出国（境）定居等原因被停止党籍或者丧失中国籍',
                                '辞去代表职务被接受' => '辞去代表职务被接受', '其他原因' => '其他原因'), $row[abort_repre_reason], 'name="abort_repre_reason"');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">是否终止资格：</th>
                            <td>
                                <?php echo form::radio(array('1' => '是', '0' => '否'), $row[is_abort], 'name="is_abort"');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">终止资格时间：</th>
                            <td>
                                <?php echo form::date('abort_repre_time', $row[abort_repre_time]);?>
                            </td>
                        </tr>
                        <?php } else { ?>
                        <tr>
                            <th width="150">停止职务原因：</th>
                            <td>
                                <?php echo form::select(array('涉嫌违纪违法被免去党政领导职务' => '涉嫌违纪违法被免去党政领导职务', '其他原因' => '其他原因'), $row[stop_repre_reason], 'name="stop_repre_reason"');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">是否停止职务：</th>
                            <td>
                                <?php echo form::radio(array('1' => '是', '0' => '否'), $row[is_stop], 'name="is_stop"');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">停止职务时间：</th>
                            <td>
                                <?php echo form::date('stop_repre_time', $row[stop_repre_time]);?>
                            </td>
                        </tr>
                        <?php } ?>

                        <tr>
                            <th width="150">担任本届哪一级代表职务：</th>
                            <td>
                                <?php echo form::select(array('1' => '全国', '2' => '省级', '3' => '市', '4' => '县'), '', 'name="level"');?>
                            </td>
                        </tr>
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