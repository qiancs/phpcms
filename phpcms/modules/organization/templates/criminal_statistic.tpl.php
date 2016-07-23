<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/21
 * Time: 17:53
 */
defined('IN_PHPCMS') or exit('No permission resources.');
include $this->admin_tpl('header', 'admin');
?>
<div class="content">
    <a href='?m=organization&c=organization&a=representative_statistic&id=<?php echo $_GET[id] ?>&pc_hash=$pc_hash'
       class="<?php $selected == 'representative' ? 'on' : '' ?>"<em>党代表排查</em></a><span>|</span>
    <a href='?m=organization&c=organization&a=congress_statistic&id=<?php echo $_GET[id] ?>&pc_hash=$pc_hash'
       class="<?php $selected == 'congress' ? 'on' : '' ?>" <em>人大代表排查</em></a><span>|</span>
    <a href='?m=organization&c=organization&a=consul_statistic&id=<?php echo $_GET[id] ?>&pc_hash=$pc_hash'
       class="<?php $selected == 'consul' ? 'on' : '' ?>" <em>政协委员代表排查</em></a><span>|</span>
    <a href='?m=organization&c=organization&a=criminal_statistic&id=<?php echo $_GET[id] ?>&pc_hash=$pc_hash'
       class="<?php $selected == 'criminal' ? 'on' : '' ?>"<em>刑责追究党员排查</em></a><span>|</span>
    <a href='?m=organization&c=organization&a=admin_statistic&id=<?php echo $_GET[id] ?>&pc_hash=$pc_hash'
       class="<?php $selected == 'admin' ? 'on' : '' ?>"<em>行政处罚党员排查</em></a><span>|</span>
    <form id="organizationform" action="" method="post">
        <br>
        <table class="table table-bordered" style="width:100%;">
            <tr>
                <th colspan="2">统计类别</th>
                <th>总计</th>
            </tr>
            <tr>
                <th colspan="2">在册党员人数</th>
                <td><?php echo $row[total_num] ?></td>
            </tr>
            <tr>
                <th colspan="2">已排查党员人数</th>
                <td><?php echo $row[criminal_num] ?></td>
            </tr>
            <tr>
                <th rowspan="2" style="width: 40px">受到刑事责任追究的党员情况</th>
                <th  style="width: 100px">人民法院作出有罪判决、裁定的人数</th>
                <td><?php echo $row[penalty1] ?></td>
            </tr>
            <tr>
                <th>人民检察院对于犯罪情节轻微、依照刑法规定不需要判处刑罚或免除刑罚的人数</th>
                <td><?php echo $row[penalty2] ?></td>
            </tr>
            <tr>
                <th rowspan="2" style="width: 100px">清理前已给予党纪处分和组织处理情况</th>
                <th style="width: 100px">党纪处分</th>
                <td><?php echo $row[solve1][0] ?></td>
            </tr>
            <tr>
                <th>组织处理</th>
                <td><?php echo $row[solve2][0] ?></td>
            </tr>
            <tr>
                <th rowspan="2">清理前未按规定给予党纪处分和组织处理情况</th>
                <th>党纪处分</th>
                <td><?php echo $row[solveless1][0] ?></td>
            </tr>
            <tr>
                <th>组织处理</th>
                <td><?php echo $row[solveless2][0] ?></td>
            </tr>
            <tr>
                <th rowspan="2">清理情况</th>
                <th>党纪处分</th>
                <td><?php echo $row[result1][0] ?></td>
            </tr>
            <tr>
                <th>组织处理</th>
                <td><?php echo $row[result2][0] ?></td>
            </tr>
        </table>
        <br>
        <p>
            <input type="submit" name="dosubmit" id="dosubmit" class="button" value="提交党代表人数">
            <input type="reset" value="重置" class="button">
        </p>
    </form>

</div>