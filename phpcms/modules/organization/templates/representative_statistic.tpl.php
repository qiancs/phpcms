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
        <table class="table table-bordered" style="width:100%; ">
            <tr>
                <th rowspan="2" colspan="2">统计类别</th>
                <th>全国</th>
                <th colspan="3">地方</th>
                <th colspan="5">基层</th>
                <th rowspan="2">总计</th>
            </tr>
            <tr>
                <th>十八大代表</th>
                <th>省党代会代表</th>
                <th>市党代会代表</th>
                <th>县党代会代表</th>
                <th>乡镇党代会代表</th>
                <th>机关党代会代表</th>
                <th>企业党代会代表</th>
                <th>高校党代会代表</th>
                <th>其他</th>
            </tr>
            <tr>
                <th colspan="2">本届选举党代表人数</th>
                <td><?php echo $row[rt1] ?></td>
                <td><?php echo $row[rt2] ?></td>
                <td><?php echo $row[rt3] ?></td>
                <td><?php echo $row[rt4] ?></td>
                <td><?php echo $row[rt5] ?></td>
                <td><?php echo $row[rt6] ?></td>
                <td><?php echo $row[rt7] ?></td>
                <td><?php echo $row[rt8] ?></td>
                <td><?php echo $row[rt9] ?></td>
                <td><?php echo $row[rt1] + $row[rt2] + $row[rt3] + $row[rt4] + $row[rt5] + $row[rt6] + $row[rt7] + $row[rt8] + $row[rt9] ?></td>
            </tr>
            <tr>
                <th colspan="2">现有党代表人数</th>
                <td><?php echo $row[rn1] ?></td>
                <td><?php echo $row[rn2] ?></td>
                <td><?php echo $row[rn3] ?></td>
                <td><?php echo $row[rn4] ?></td>
                <td><?php echo $row[rn5] ?></td>
                <td><?php echo $row[rn6] ?></td>
                <td><?php echo $row[rn7] ?></td>
                <td><?php echo $row[rn8] ?></td>
                <td><?php echo $row[rn9] ?></td>
                <td><?php echo $row[rn1] + $row[rn2] + $row[rn3] + $row[rn4] + $row[rn5] + $row[rn6] + $row[rn7] + $row[rn8] + $row[rn9] ?></td>
            </tr>
            <tr>
                <th rowspan="3" style="width: 40px">终止代表资格人数</th>
                <th>受到留党察看（含）以上处分的</th>
                <td><?php echo $row[abort1][0] ?></td>
                <td><?php echo $row[abort1][1] ?></td>
                <td><?php echo $row[abort1][2] ?></td>
                <td><?php echo $row[abort1][3] ?></td>
                <td><?php echo $row[abort1][4] ?></td>
                <td><?php echo $row[abort1][5] ?></td>
                <td><?php echo $row[abort1][6] ?></td>
                <td><?php echo $row[abort1][7] ?></td>
                <td><?php echo $row[abort1][8] ?></td>
                <td><?php echo $row[abort1][0] + $row[abort1][1] + $row[abort1][2] + $row[abort1][3] + $row[abort1][4]
                        + $row[abort1][5] + $row[abort1][6] + $row[abort1][7] + $row[abort1][8] ?></td>
            </tr>
            <tr>
                <th>停止党籍或丧失中国国籍的</th>
                <td><?php echo $row[abort2][0] ?></td>
                <td><?php echo $row[abort2][1] ?></td>
                <td><?php echo $row[abort2][2] ?></td>
                <td><?php echo $row[abort2][3] ?></td>
                <td><?php echo $row[abort2][4] ?></td>
                <td><?php echo $row[abort2][5] ?></td>
                <td><?php echo $row[abort2][6] ?></td>
                <td><?php echo $row[abort2][7] ?></td>
                <td><?php echo $row[abort2][8] ?></td>
                <td><?php echo $row[abort2][0] + $row[abort2][1] + $row[abort2][2] + $row[abort2][3] + $row[abort2][4]
                        + $row[abort2][5] + $row[abort2][6] + $row[abort2][7] + $row[abort2][8] ?></td>
            </tr>
            <tr>
                <th>辞去代表职务被接受的</th>
                <td><?php echo $row[abort3][0] ?></td>
                <td><?php echo $row[abort3][1] ?></td>
                <td><?php echo $row[abort3][2] ?></td>
                <td><?php echo $row[abort3][3] ?></td>
                <td><?php echo $row[abort3][4] ?></td>
                <td><?php echo $row[abort3][5] ?></td>
                <td><?php echo $row[abort3][6] ?></td>
                <td><?php echo $row[abort3][7] ?></td>
                <td><?php echo $row[abort3][8] ?></td>
                <td><?php echo $row[abort3][0] + $row[abort3][1] + $row[abort3][2] + $row[abort3][3] + $row[abort3][4]
                        + $row[abort3][5] + $row[abort3][6] + $row[abort3][7] + $row[abort3][8] ?></td>
            </tr>
            <tr>
                <th>停止执行代表职务人数</th>
                <th>因违纪违法被免去党政领导职务的</th>
                <td><?php echo $row[stop1][0] ?></td>
                <td><?php echo $row[stop1][1] ?></td>
                <td><?php echo $row[stop1][2] ?></td>
                <td><?php echo $row[stop1][3] ?></td>
                <td><?php echo $row[stop1][4] ?></td>
                <td><?php echo $row[stop1][5] ?></td>
                <td><?php echo $row[stop1][6] ?></td>
                <td><?php echo $row[stop1][7] ?></td>
                <td><?php echo $row[stop1][8] ?></td>
                <td><?php echo $row[stop1][0] + $row[stop1][1] + $row[stop1][2] + $row[stop1][3] + $row[stop1][4]
                        + $row[stop1][5] + $row[stop1][6] + $row[stop1][7] + $row[stop1][8] ?></td>
            </tr>
            <tr>
                <th rowspan="2">清理前已作出处理情况</th>
                <th>终止代表资格人数</th>
                <td><?php echo $row[solve1][0] ?></td>
                <td><?php echo $row[solve1][1] ?></td>
                <td><?php echo $row[solve1][2] ?></td>
                <td><?php echo $row[solve1][3] ?></td>
                <td><?php echo $row[solve1][4] ?></td>
                <td><?php echo $row[solve1][5] ?></td>
                <td><?php echo $row[solve1][6] ?></td>
                <td><?php echo $row[solve1][7] ?></td>
                <td><?php echo $row[solve1][8] ?></td>
                <td><?php echo $row[solve1][0] + $row[solve1][1] + $row[solve1][2] + $row[solve1][3] + $row[solve1][4]
                        + $row[solve1][5] + $row[solve1][6] + $row[solve1][7] + $row[solve1][8] ?></td>
            </tr>
            <tr>
                <th>停止执行代表职务人数</th>
                <td><?php echo $row[solve2][0] ?></td>
                <td><?php echo $row[solve2][1] ?></td>
                <td><?php echo $row[solve2][2] ?></td>
                <td><?php echo $row[solve2][3] ?></td>
                <td><?php echo $row[solve2][4] ?></td>
                <td><?php echo $row[solve2][5] ?></td>
                <td><?php echo $row[solve2][6] ?></td>
                <td><?php echo $row[solve2][7] ?></td>
                <td><?php echo $row[solve2][8] ?></td>
                <td><?php echo $row[solve2][0] + $row[solve2][1] + $row[solve2][2] + $row[solve2][3] + $row[solve2][4]
                        + $row[solve2][5] + $row[solve2][6] + $row[solve2][7] + $row[solve2][8] ?></td>
            </tr>
            <tr>
                <th rowspan="2">清理前未按规定作出处理情况</th>
                <th>终止代表资格人数</th>
                <td><?php echo $row[solveless1][0] ?></td>
                <td><?php echo $row[solveless1][1] ?></td>
                <td><?php echo $row[solveless1][2] ?></td>
                <td><?php echo $row[solveless1][3] ?></td>
                <td><?php echo $row[solveless1][4] ?></td>
                <td><?php echo $row[solveless1][5] ?></td>
                <td><?php echo $row[solveless1][6] ?></td>
                <td><?php echo $row[solveless1][7] ?></td>
                <td><?php echo $row[solveless1][8] ?></td>
                <td><?php echo $row[solveless1][0] + $row[solveless1][1] + $row[solveless1][2] + $row[solveless1][3] + $row[solveless1][4]
                        + $row[solveless1][5] + $row[solveless1][6] + $row[solveless1][7] + $row[solveless1][8] ?></td>
            </tr>
            <tr>
                <th>停止执行代表职务人数</th>
                <td><?php echo $row[solveless2][0] ?></td>
                <td><?php echo $row[solveless2][1] ?></td>
                <td><?php echo $row[solveless2][2] ?></td>
                <td><?php echo $row[solveless2][3] ?></td>
                <td><?php echo $row[solveless2][4] ?></td>
                <td><?php echo $row[solveless2][5] ?></td>
                <td><?php echo $row[solveless2][6] ?></td>
                <td><?php echo $row[solveless2][7] ?></td>
                <td><?php echo $row[solveless2][8] ?></td>
                <td><?php echo $row[solveless2][0] + $row[solveless2][1] + $row[solveless2][2] + $row[solveless2][3] + $row[solveless2][4]
                        + $row[solveless2][5] + $row[solveless2][6] + $row[solveless2][7] + $row[solveless2][8] ?></td>
            </tr>
            <tr>
                <th rowspan="2">清理情况</th>
                <th>终止代表资格人数</th>
                <td><?php echo $row[result1][0] ?></td>
                <td><?php echo $row[result1][1] ?></td>
                <td><?php echo $row[result1][2] ?></td>
                <td><?php echo $row[result1][3] ?></td>
                <td><?php echo $row[result1][4] ?></td>
                <td><?php echo $row[result1][5] ?></td>
                <td><?php echo $row[result1][6] ?></td>
                <td><?php echo $row[result1][7] ?></td>
                <td><?php echo $row[result1][8] ?></td>
                <td><?php echo $row[result1][0] + $row[result1][1] + $row[result1][2] + $row[result1][3] + $row[result1][4]
                        + $row[result1][5] + $row[result1][6] + $row[result1][7] + $row[result1][8] ?></td>
            </tr>
            <tr>
                <th>停止执行代表职务人数</th>
                <td><?php echo $row[result2][0] ?></td>
                <td><?php echo $row[result2][1] ?></td>
                <td><?php echo $row[result2][2] ?></td>
                <td><?php echo $row[result2][3] ?></td>
                <td><?php echo $row[result2][4] ?></td>
                <td><?php echo $row[result2][5] ?></td>
                <td><?php echo $row[result2][6] ?></td>
                <td><?php echo $row[result2][7] ?></td>
                <td><?php echo $row[result2][8] ?></td>
                <td><?php echo $row[result2][0] + $row[result2][1] + $row[result2][2] + $row[result2][3] + $row[result2][4]
                        + $row[result2][5] + $row[result2][6] + $row[result2][7] + $row[result2][8] ?></td>
            </tr>
        </table>
        <br>
        <p>
            <input type="submit" name="dosubmit" id="dosubmit" class="button" value="提交党代表人数">
            <input type="reset" value="重置" class="button">
        </p>
    </form>

</div>