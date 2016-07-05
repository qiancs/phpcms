<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("member", "header"); ?>
<div id="memberArea">
    <?php include template("member", "left"); ?>
    <div class="col-auto">
        <div class="col-1">
        <h6 class="title"><?php echo $title;?></h6>
            <div class="content">
                <form action="?m=invest&c=congress&a=insert" method="post">
                    <table class="table_form" cellspacing="0" width="100%">
                        <tr>
                            <th width="150">姓名：</th>
                            <td><input class="input-text" name="name" size="10"></td>
                        </tr>
                        <tr>
                            <th width="150">身份证号：</th>
                            <td><input class="input-text" name="identity" size="30"></td>
                        </tr>
                        <tr>
                            <th width="150">所在单位党委名称：</th>
                            <td><input class="input-text" name="organization" size="30"></td>
                        </tr>
                        <tr>
                            <th width="150">现任（原任）职务：</th>
                            <td><input class="input-text" name="office" size="30"></td>
                        </tr>
                        <tr>
                            <th width="150">性别：</th>
                            <td>
                                <?php echo form::select(array('男' => '男', '女' => '女'), '', 'class="sex"', '请选择');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">民族：</th>
                            <td>
                                <?php echo form::select(array('汉族' => '汉族', '回族' => '回族', '满族' => '满族', '蒙古族' => '蒙古族',
                                '壮族' => '壮族', '其他少数民族' => '其他少数民族'),
                                '', 'name="nation"', '请选择');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">出生年月：</th>
                            <td>
                                <?php echo form::date('birth');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">入党时间：</th>
                            <td>
                                <?php echo form::date('party');?>
                            </td>
                        </tr>
                        <?php if($type == 3 ) { ?>
                        <tr>
                            <th width="150">终止资格时间：</th>
                            <td>
                                <?php echo form::date('abort_cong_time');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">终止人大代表职务原因：</th>
                            <td>
                                <?php echo form::select(array('因涉嫌违纪被罢免' => '因涉嫌违纪被罢免',
                                '因涉嫌违纪被责令辞职' => '因涉嫌违纪被责令辞职',
                                '因违反社会道德被责令辞职' => '因违反社会道德被责令辞职',
                                '丧失国籍' => '丧失国籍',
                                '其他原因' => '其他原因'), '', 'name="abort_cong_reason"');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">给予党纪处分情况：</th>
                            <td>
                                <textarea name="discip_measure" rows="2" cols="50"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">给予党纪处分时间：</th>
                            <td>
                                <?php echo form::date('measure_time');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">给予组织处理情况：</th>
                            <td>
                                <textarea name="orga_sanction" rows="2" cols="50"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">给予组织处理时间：</th>
                            <td>
                                <?php echo form::date('sanction_time');?>
                            </td>
                        </tr>

                        <?php } elseif (($type == 4)) { ?>
                        <tr>
                            <th width="150">暂停职务时间：</th>
                            <td>
                                <?php echo form::date('stop_cong_time');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">给予党纪处分情况：</th>
                            <td>
                                <textarea name="discip_measure" rows="2" cols="50"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">给予党纪处分时间：</th>
                            <td>
                                <?php echo form::date('measure_time');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">给予组织处理情况：</th>
                            <td>
                                <textarea name="orga_sanction" rows="2" cols="50"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">给予组织处理时间：</th>
                            <td>
                                <?php echo form::date('sanction_time');?>
                            </td>
                        </tr>
                        <?php } elseif (($type == 5)) { ?>
                        <tr>
                            <th width="150">当选无效时间：</th>
                            <td>
                                <?php echo form::date('invalid_elect_time');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">给予党纪处分情况：</th>
                            <td>
                                <textarea name="discip_measure" rows="2" cols="50"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">给予党纪处分时间：</th>
                            <td>
                                <?php echo form::date('measure_time');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">给予组织处理情况：</th>
                            <td>
                                <textarea name="orga_sanction" rows="2" cols="50"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">给予组织处理时间：</th>
                            <td>
                                <?php echo form::date('sanction_time');?>
                            </td>
                        </tr>
                        <?php } else { ?>
                        <h1>无效的人大类型';</h1>
                        <?php } ?>

                        <tr>
                            <th width="150">担任本届哪一级代表职务：</th>
                            <td>
                                <?php echo form::select(array('全国' => '全国', '省级' => '省级', '市级' => '市级', '县级' => '县级'), '', 'name="level"');?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="hidden" value="<?php echo $type;?>" name="type">
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