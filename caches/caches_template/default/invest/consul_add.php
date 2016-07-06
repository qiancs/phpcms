<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("member", "header"); ?>
<script language="JavaScript">
    <!--
    $(function(){
        $.formValidator.initConfig({autotip:true,formid:"adminform",onerror:function(msg){}});

        $("#name").formValidator({onshow:"<?php echo L('input') . L('name');?>",onfocus:"<?php echo L('name') . L('cannot_empty');?>"}).inputValidator({min: 1, onerror:"<?php echo L('name') . L('cannot_empty');?>"});
        $("#identity").formValidator({onshow:"<?php echo L('input') . L('identity');?>",onfocus:"<?php echo L('identity') . L('cannot_empty');?>"}).inputValidator({min: 1, onerror:"<?php echo L('identity') . L('cannot_empty');?>"});
        $("#organization").formValidator({onshow:"<?php echo L('input') . L('organization');?>",onfocus:"<?php echo L('organization') . L('cannot_empty');?>"}).inputValidator({min: 1, onerror:"<?php echo L('organization') . L('cannot_empty');?>"});
        $("#office").formValidator({onshow:"<?php echo L('input') . L('office');?>",onfocus:"<?php echo L('office') . L('cannot_empty');?>"}).inputValidator({min: 1, onerror:"<?php echo L('office') . L('cannot_empty');?>"});
        $("#sex").formValidator({onshow:"<?php echo L('input') . L('sex');?>",onfocus:"<?php echo L('sex') . L('cannot_empty');?>"}).inputValidator({min: 1, onerror:"<?php echo L('sex') . L('cannot_empty');?>"});
        $("#nation").formValidator({onshow:"<?php echo L('input') . L('nation');?>",onfocus:"<?php echo L('nation') . L('cannot_empty');?>"}).inputValidator({min: 1, onerror:"<?php echo L('nation') . L('cannot_empty');?>"});
        $("#birth").formValidator({onshow:"<?php echo L('input') . L('birth');?>",onfocus:"<?php echo L('birth') . L('cannot_empty');?>"}).inputValidator({min: 1, onerror:"<?php echo L('birth') . L('cannot_empty');?>"});
        $("#party").formValidator({onshow:"<?php echo L('input') . L('party');?>",onfocus:"<?php echo L('party') . L('cannot_empty');?>"}).inputValidator({min: 1, onerror:"<?php echo L('party') . L('cannot_empty');?>"});
        $("#dismiss_consul_time").formValidator({onshow:"<?php echo L('input');?>",onfocus:"<?php echo L('cannot_empty');?>"}).inputValidator({min: 1, onerror:"<?php echo L('cannot_empty');?>"});
        $("#dismiss_consul_reason").formValidator({onshow:"<?php echo L('input');?>",onfocus:"<?php echo L('cannot_empty');?>"}).inputValidator({min: 1, onerror:"<?php echo L('cannot_empty');?>"});
        $("#order_resign_time").formValidator({onshow:"<?php echo L('input');?>",onfocus:"<?php echo L('cannot_empty');?>"}).inputValidator({min: 1, onerror:"<?php echo L('cannot_empty');?>"});
        $("#order_resign_reason").formValidator({onshow:"<?php echo L('input');?>",onfocus:"<?php echo L('cannot_empty');?>"}).inputValidator({min: 1, onerror:"<?php echo L('cannot_empty');?>"});
        $("#level").formValidator({onshow:"<?php echo L('input');?>",onfocus:"<?php echo L('cannot_empty');?>"}).inputValidator({min: 1, onerror:"<?php echo L('cannot_empty');?>"});
    });

    //-->
</script>
<div id="memberArea">
    <?php include template("member", "left"); ?>
    <div class="col-auto">
        <div class="col-1">
        <h6 class="title"><?php echo $title;?></h6>
            <div class="content">
                <form action="?m=invest&c=consul&a=insert" method="post" id="adminform">
                    <table class="table_form" cellspacing="0" width="100%">
                        <tr>
                            <th width="150">姓名：</th>
                            <td><input class="input-text" name="name" size="10" id="name"></td>
                        </tr>
                        <tr>
                            <th width="150">身份证号：</th>
                            <td><input class="input-text" name="identity" id="identity" size="30"></td>
                        </tr>
                        <tr>
                            <th width="150">所在单位党委名称：</th>
                            <td><input class="input-text" name="organization" id="organization" size="30"></td>
                        </tr>
                        <tr>
                            <th width="150">现任（原任）职务：</th>
                            <td><input class="input-text" name="office" id="office" size="30"></td>
                        </tr>
                        <tr>
                            <th width="150">性别：</th>
                            <td>
                                <?php echo form::select(array('男' => '男', '女' => '女'), '', 'id="sex" class="sex"', '请选择');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">民族：</th>
                            <td>
                                <?php echo form::select(array('汉族' => '汉族', '回族' => '回族', '满族' => '满族', '蒙古族' => '蒙古族',
                                '壮族' => '壮族', '其他少数民族' => '其他少数民族'),
                                '', 'id="nation" name="nation"', '请选择');?>
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
                        <?php if($type == 6 ) { ?>
                        <tr>
                            <th width="150">撤销资格时间：</th>
                            <td>
                                <?php echo form::date('dismiss_consul_time');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">撤销资格原因：</th>
                            <td>
                                <?php echo form::select(array('因涉嫌违纪违法被撤销资格' => '因涉嫌违纪违法被撤销资格',
                                '丧失国籍' => '丧失国籍',
                                '其他原因' => '其他原因'), '', 'name="dismiss_consul_reason" id="dismiss_consul_reason"', '请选择');?>
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

                        <?php } elseif (($type == 7)) { ?>
                        <tr>
                            <th width="150">责令辞职时间：</th>
                            <td>
                                <?php echo form::date('order_resign_time');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">责令辞职原因：</th>
                            <td>
                                <?php echo form::select(array('违反社会道德' => '违反社会道德',
                                '存在与其身份不符的行为' => '存在与其身份不符的行为',
                                '其他原因' => '其他原因'), '', 'name="order_resign_reason" id="order_resign_reason"', '请选择');?>
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
                        <h1>无效的政协委员类型';</h1>
                        <?php } ?>

                        <tr>
                            <th width="150">担任本届哪一级代表职务：</th>
                            <td>
                                <?php echo form::select(array('全国政协委员' => '全国政协委员', '省政协委员' => '省政协委员', '市政协委员' => '市政协委员', '县政协委员' => '县政协委员'), '', 'name="level" id="level"', '请选择');?>
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