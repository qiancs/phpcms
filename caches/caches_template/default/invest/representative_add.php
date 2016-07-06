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

    });

    //-->
</script>
<div id="memberArea">
    <?php include template("member", "left"); ?>
    <div class="col-auto">
        <div class="col-1">
        <h6 class="title"><?php echo $title;?></h6>
            <div class="content">
                <form action="?m=invest&c=admin&a=insert" method="post" id="adminform">
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
                        <?php if($type == 1 ) { ?>
                        <tr>
                            <th width="150">终止资格原因：</th>
                            <td>
                                <?php echo form::select(array('受到留党察看及以上处分' => '受到留党察看及以上处分',
                                '因出国（境）定居等原因被停止党籍或者丧失中国籍' => '因出国（境）定居等原因被停止党籍或者丧失中国籍',
                                '辞去代表职务被接受' => '辞去代表职务被接受', '其他原因' => '其他原因'), '', 'id="abort_repre_reason" name="abort_repre_reason"', '请选择');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">是否终止资格：</th>
                            <td>
                                <?php echo form::radio(array('1' => '是', '0' => '否'), '是', 'id="is_abort" name="is_abort"', '请选择');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">终止资格时间：</th>
                            <td>
                                <?php echo form::date('abort_repre_time');?>
                            </td>
                        </tr>
                        <?php } else { ?>
                        <tr>
                            <th width="150">停止职务原因：</th>
                            <td>
                                <?php echo form::select(array('涉嫌违纪违法被免去党政领导职务' => '涉嫌违纪违法被免去党政领导职务', '其他原因' => '其他原因'), '', 'id="stop_repre_reason" name="stop_repre_reason"', '请选择');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">是否停止职务：</th>
                            <td>
                                <?php echo form::radio(array('1' => '是', '0' => '否'), '是', 'name="is_stop"', '请选择');?>
                            </td>
                        </tr>
                        <tr>
                            <th width="150">停止职务时间：</th>
                            <td>
                                <?php echo form::date('stop_repre_time');?>
                            </td>
                        </tr>
                        <?php } ?>

                        <tr>
                            <th width="150">担任本届哪一级代表职务：</th>
                            <td>
                                <?php echo form::select(array('十八大代表' => '十八大代表', '省党代会代表' => '省党代会代表', '市党代会代表' => '市党代会代表',
                                '县党代会代表' => '县党代会代表', '乡镇党代会代表' => '乡镇党代会代表', '机关党代会代表' => '机会党代会代表',
                                '企业党代会代表' => '企业党代会代表', '高校党代会代表' => '高校党代会代表', '其他' => '其他'), '', 'name="level"', '请选择');?>
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