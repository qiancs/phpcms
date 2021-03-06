<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/17
 * Time: 16:24
 */
?>
<link type="text/css" rel="stylesheet" href="<?php echo BS_PATH; ?>css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="<?php echo BS_PATH; ?>css/bootstrap-datetimepicker.min.css" />

<script href="<?php echo JS_PATH; ?>jquery.min.js"></script>
<script src="http://cdn.bootcss.com/jquery/1.12.4/jquery.js"></script>
<script src="<?php echo BS_PATH; ?>js/bootstrap.min.js"></script>
<script src="<?php echo BS_PATH; ?>js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo BS_PATH; ?>js/locales/bootstrap-datetimepicker.zh-CN.js"></script>

<hr>
<div class="container">
    <form action="?m=invest&c=representative&a=insert&pc_hash=<?php echo $hash;?>" method="post">
        <div class="form-group">
            <label for="">姓名：</label>
            <input class="form-control" type="text" name="name">
        </div>
        <div class="form-group">
            <label for="">现任（原任）职务:
            </label>
            <input type="text" class="form-control" name="office">
        </div>
        <div class="form-group">
            <label for="">性别:
            </label>
            <select class="form-control" name="sex">
                <option>男</option>
                <option>女</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">民族:
            </label>
            <select class="form-control" name="nation">
                <option>汉族</option>
                <option>回族</option>
                <option>满族</option>
                <option>蒙族</option>
                <option>壮族</option>
                <option>其他少数民族</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">出生年月:
            </label>
            <div class="input-group date form_date">
                <input class="form-control" type="text" name="birth" value="" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span>
            </div>
        </div>
        <div class="form-group">
            <label for="">入党时间:
            </label>
            <div class="input-group date form_date">
                <input class="form-control" type="text" name="party" value="" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn-primary" value="添加党代表">
        </div>
    </form>
</div>
<script type="application/javascript">
    $('.form_date').datetimepicker({
        language: 'zh-CN',
        weekStart: 1,
        format:'yyyy-mm-dd',
        todayBtn:  1,
        autoclose: 1,
        startView: 2,
        minView: 2
    });
</script>