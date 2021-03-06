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

                <th>全国政协委员</th>
                <th>省政协委员</th>
                <th>市政协委员</th>
                <th>县政协委员</th>
                <th>总计</th>
            </tr>
            <tr>
                <th colspan="2">本届选举的政协委员人数</th>
                <td><?php echo $row[c1t1] ?></td>
                <td><?php echo $row[c1t2] ?></td>
                <td><?php echo $row[c1t3] ?></td>
                <td><?php echo $row[c1t4] ?></td>
                <td><?php echo $row[c1t1] + $row[c1t2] + $row[c1t3] + $row[c1t4] ?></td>
            </tr>
            <tr>
                <th colspan="2">本届选举的党员政协委员人数</th>
                <td><?php echo $row[c1tp1] ?></td>
                <td><?php echo $row[c1tp2] ?></td>
                <td><?php echo $row[c1tp3] ?></td>
                <td><?php echo $row[c1tp4] ?></td>
                <td><?php echo $row[c1tp1] + $row[c1tp2] + $row[c1tp3] + $row[c1tp4] ?></td>
            </tr>
            <tr>
                <th colspan="2">现有政协委员人数</th>
                <td><?php echo $row[c1n1] ?></td>
                <td><?php echo $row[c1n2] ?></td>
                <td><?php echo $row[c1n3] ?></td>
                <td><?php echo $row[c1n4] ?></td>
                <td><?php echo $row[c1n1] + $row[c1n2] + $row[c1n3] + $row[c1n4] ?></td>
            </tr>
            <tr>
                <th colspan="2">现有党员政协委员人数</th>
                <td><?php echo $row[c1np1] ?></td>
                <td><?php echo $row[c1np2] ?></td>
                <td><?php echo $row[c1np3] ?></td>
                <td><?php echo $row[c1np4] ?></td>
                <td><?php echo $row[c1np1] + $row[c1np2] + $row[c1np3] + $row[c1np4] ?></td>
            </tr>
            <tr>
                <th rowspan="2" style="width: 40px">被撤销政协委员资格的党员人数</th>
                <th  style="width: 100px">因涉嫌违纪违法被撤销政协委员资格的人数</th>
                <td><?php echo $row[dismiss1][0] ?></td>
                <td><?php echo $row[dismiss1][1] ?></td>
                <td><?php echo $row[dismiss1][2] ?></td>
                <td><?php echo $row[dismiss1][3] ?></td>
                <td><?php echo $row[dismiss1][0] + $row[dismiss1][1] + $row[dismiss1][2] + $row[dismiss1][3]?></td>
            </tr>
            <tr>
                <th>丧失中华人民共和国国籍的人数</th>
                <td><?php echo $row[dismiss2][0] ?></td>
                <td><?php echo $row[dismiss2][1] ?></td>
                <td><?php echo $row[dismiss2][2] ?></td>
                <td><?php echo $row[dismiss2][3] ?></td>
                <td><?php echo $row[dismiss2][0] + $row[dismiss2][1] + $row[dismiss2][2] + $row[dismiss2][3]?></td>
            </tr>

            <tr>
                <th colspan="2">因违反社会道德或存在与其身份不符行为被责令辞去政协委员的党员人数</th>
                <td><?php echo $row[order1][0] ?></td>
                <td><?php echo $row[order1][1] ?></td>
                <td><?php echo $row[order1][2] ?></td>
                <td><?php echo $row[order1][3] ?></td>
                <td><?php echo $row[order1][0] + $row[order1][1] + $row[order1][2] + $row[order1][3]?></td>
            </tr>
            <tr>
                <th rowspan="2">清理前已给予党纪处分和组织处理情况</th>
                <th>党纪处分</th>
                <td><?php echo $row[solve1][0] ?></td>
                <td><?php echo $row[solve1][1] ?></td>
                <td><?php echo $row[solve1][2] ?></td>
                <td><?php echo $row[solve1][3] ?></td>
                <td><?php echo $row[solve1][0] + $row[solve1][1] + $row[solve1][2] + $row[solve1][3]?></td>
            </tr>
            <tr>
                <th>组织处理</th>
                <td><?php echo $row[solve2][0] ?></td>
                <td><?php echo $row[solve2][1] ?></td>
                <td><?php echo $row[solve2][2] ?></td>
                <td><?php echo $row[solve2][3] ?></td>
                <td><?php echo $row[solve2][0] + $row[solve2][1] + $row[solve2][2] + $row[solve2][3]?></td>
            </tr>
            <tr>
                <th rowspan="2">清理前未按规定给予党纪处分和组织处理情况</th>
                <th>党纪处分</th>
                <td><?php echo $row[solveless1][0] ?></td>
                <td><?php echo $row[solveless1][1] ?></td>
                <td><?php echo $row[solveless1][2] ?></td>
                <td><?php echo $row[solveless1][3] ?></td>
                <td><?php echo $row[solveless1][0] + $row[solveless1][1] + $row[solveless1][2] + $row[solveless1][3]?></td>
            </tr>
            <tr>
                <th>组织处理</th>
                <td><?php echo $row[solveless2][0] ?></td>
                <td><?php echo $row[solveless2][1] ?></td>
                <td><?php echo $row[solveless2][2] ?></td>
                <td><?php echo $row[solveless2][3] ?></td>
                <td><?php echo $row[solveless2][0] + $row[solveless2][1] + $row[solveless2][2] + $row[solveless2][3]?></td>
            </tr>
            <tr>
                <th rowspan="2">清理情况</th>
                <th>党纪处分</th>
                <td><?php echo $row[result1][0] ?></td>
                <td><?php echo $row[result1][1] ?></td>
                <td><?php echo $row[result1][2] ?></td>
                <td><?php echo $row[result1][3] ?></td>
                <td><?php echo $row[result1][0] + $row[result1][1] + $row[result1][2] + $row[result1][3]?></td>
            </tr>
            <tr>
                <th>组织处理</th>
                <td><?php echo $row[result2][0] ?></td>
                <td><?php echo $row[result2][1] ?></td>
                <td><?php echo $row[result2][2] ?></td>
                <td><?php echo $row[result2][3] ?></td>
                <td><?php echo $row[result2][0] + $row[result2][1] + $row[result2][2] + $row[result2][3]?></td>
            </tr>
        </table>
        <br>
        <p>
            <input type="submit" name="dosubmit" id="dosubmit" class="button" value="提交党代表人数">
            <input type="reset" value="重置" class="button">
        </p>
    </form>

</div>