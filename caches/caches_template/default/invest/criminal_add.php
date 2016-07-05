<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("member", "header"); ?>
<div id="memberArea">
    <?php include template("member", "left"); ?>
    <div class="col-auto">
        <div class="col-1">
        <h6 class="title"><?php echo $title;?></h6>
            <div class="content">
                <form action="?m=invest&c=criminal&a=insert" method="post">
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
                        <?php if($type == 8 ) { ?>
                        <tr>
                            <th width="150">刑责追究原因：</th>
                            <td>
                                <?php echo form::select(array('司法机关的生效判决' => '司法机关的生效判决',
                                '司法机关的裁定' => '司法机关的裁定',
                                '司法机关的决定' => '司法机关的决定',
                                '其他原因' => '其他原因'), '', 'name="criminal_penalty_reason"');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">刑责追究情况：</th>
                            <td>
                                <textarea name="criminal_penalty_detail" rows="2" cols="50"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">刑责追究时间：</th>
                            <td>
                                <?php echo form::date('criminal_penalty_time');?>
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

                        <?php } elseif (($type == 9)) { ?>
                        <tr>
                            <th width="150">刑责追究原因：</th>
                            <td>
                                <?php echo form::select(array('犯罪情节轻微' => '犯罪情节轻微',
                                '依法不需判处刑罚' => '依法不需判处刑罚',
                                '依法免除刑罚' => '依法免除刑罚',
                                '其他原因' => '其他原因'), '', 'name="criminal_penalty_reason"');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">刑责追究情况：</th>
                            <td>
                                <textarea name="criminal_penalty_detail" rows="2" cols="50"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">刑责追究时间：</th>
                            <td>
                                <?php echo form::date('criminal_penalty_time');?>
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
                        <h1>无效的刑事责任追究党员类型';</h1>
                        <?php } ?>

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