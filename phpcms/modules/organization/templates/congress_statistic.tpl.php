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

                <th>全国人大代表</th>
                <th>省人大代表</th>
                <th>市人大代表</th>
                <th>县人大代表</th>
                <th>乡镇人大代表</th>
                <th>总计</th>
            </tr>
            <tr>
                <th colspan="2">本届选举的人大代表人数</th>
                <td><?php echo $row[ct1] ?></td>
                <td><?php echo $row[ct2] ?></td>
                <td><?php echo $row[ct3] ?></td>
                <td><?php echo $row[ct4] ?></td>
                <td><?php echo $row[ct5] ?></td>
                <td><?php echo $row[ct1] + $row[ct2] + $row[ct3] + $row[ct4] + $row[ct5] ?></td>
            </tr>
            <tr>
                <th colspan="2">本届选举的党员人大代表人数</th>
                <td><?php echo $row[ctp1] ?></td>
                <td><?php echo $row[ctp2] ?></td>
                <td><?php echo $row[ctp3] ?></td>
                <td><?php echo $row[ctp4] ?></td>
                <td><?php echo $row[ctp5] ?></td>
                <td><?php echo $row[ctp1] + $row[ctp2] + $row[ctp3] + $row[ctp4] + $row[ctp5] ?></td>
            </tr>
            <tr>
                <th colspan="2">现有人大代表人数</th>
                <td><?php echo $row[cn1] ?></td>
                <td><?php echo $row[cn2] ?></td>
                <td><?php echo $row[cn3] ?></td>
                <td><?php echo $row[cn4] ?></td>
                <td><?php echo $row[cn5] ?></td>
                <td><?php echo $row[cn1] + $row[cn2] + $row[cn3] + $row[cn4] + $row[cn5] ?></td>
            </tr>
            <tr>
                <th colspan="2">现有党员人大代表人数</th>
                <td><?php echo $row[cnp1] ?></td>
                <td><?php echo $row[cnp2] ?></td>
                <td><?php echo $row[cnp3] ?></td>
                <td><?php echo $row[cnp4] ?></td>
                <td><?php echo $row[cnp5] ?></td>
                <td><?php echo $row[cnp1] + $row[cnp2] + $row[cnp3] + $row[cnp4] + $row[cnp5] ?></td>
            </tr>
            <tr>
                <th rowspan="4" style="width: 40px">终止人大代表资格党员人数</th>
                <th  style="width: 100px">被罢免人大代表职务的人数</th>
                <td><?php echo $row[abort1][0] ?></td>
                <td><?php echo $row[abort1][1] ?></td>
                <td><?php echo $row[abort1][2] ?></td>
                <td><?php echo $row[abort1][3] ?></td>
                <td><?php echo $row[abort1][4] ?></td>
                <td><?php echo $row[abort1][0] + $row[abort1][1] + $row[abort1][2] + $row[abort1][3] + $row[abort1][4]?></td>
            </tr>
            <tr>
                <th>因涉嫌违纪违法被责令辞去人大代表职务的人数</th>
                <td><?php echo $row[abort2][0] ?></td>
                <td><?php echo $row[abort2][1] ?></td>
                <td><?php echo $row[abort2][2] ?></td>
                <td><?php echo $row[abort2][3] ?></td>
                <td><?php echo $row[abort2][4] ?></td>
                <td><?php echo $row[abort2][0] + $row[abort2][1] + $row[abort2][2] + $row[abort2][3] + $row[abort2][4]?></td>
            </tr>
            <tr>
                <th>因违反社会道德或存在与其身份不符行为被责令辞去人大代表职务的人数</th>
                <td><?php echo $row[abort3][0] ?></td>
                <td><?php echo $row[abort3][1] ?></td>
                <td><?php echo $row[abort3][2] ?></td>
                <td><?php echo $row[abort3][3] ?></td>
                <td><?php echo $row[abort3][4] ?></td>
                <td><?php echo $row[abort3][0] + $row[abort3][1] + $row[abort3][2] + $row[abort3][3] + $row[abort3][4]?></td>
            </tr>
            <tr>
                <th>丧失中华人民共和国国籍的人数</th>
                <td><?php echo $row[abort4][0] ?></td>
                <td><?php echo $row[abort4][1] ?></td>
                <td><?php echo $row[abort4][2] ?></td>
                <td><?php echo $row[abort4][3] ?></td>
                <td><?php echo $row[abort4][4] ?></td>
                <td><?php echo $row[abort4][0] + $row[abort4][1] + $row[abort4][2] + $row[abort4][3] + $row[abort4][4]?></td>
            </tr>
            <tr>
                <th colspan="2">被暂停执行人大代表职务的党员人数</th>
                <td><?php echo $row[stop1][0] ?></td>
                <td><?php echo $row[stop1][1] ?></td>
                <td><?php echo $row[stop1][2] ?></td>
                <td><?php echo $row[stop1][3] ?></td>
                <td><?php echo $row[stop1][4] ?></td>
                <td><?php echo $row[stop1][0] + $row[stop1][1] + $row[stop1][2] + $row[stop1][3] + $row[stop1][4]?></td>
            </tr>
            <tr>
                <th colspan="2">因涉嫌违纪人大代表当选无效的党员人数</th>
                <td><?php echo $row[invalid1][0] ?></td>
                <td><?php echo $row[invalid1][1] ?></td>
                <td><?php echo $row[invalid1][2] ?></td>
                <td><?php echo $row[invalid1][3] ?></td>
                <td><?php echo $row[invalid1][4] ?></td>
                <td><?php echo $row[invalid1][0] + $row[invalid1][1] + $row[invalid1][2] + $row[invalid1][3] + $row[invalid1][4]?></td>
            </tr>
            <tr>
                <th rowspan="2">清理前已给予党纪处分和组织处理情况</th>
                <th>党纪处分</th>
                <td><?php echo $row[solve1][0] ?></td>
                <td><?php echo $row[solve1][1] ?></td>
                <td><?php echo $row[solve1][2] ?></td>
                <td><?php echo $row[solve1][3] ?></td>
                <td><?php echo $row[solve1][4] ?></td>
                <td><?php echo $row[solve1][0] + $row[solve1][1] + $row[solve1][2] + $row[solve1][3] + $row[solve1][4]?></td>
            </tr>
            <tr>
                <th>组织处理</th>
                <td><?php echo $row[solve2][0] ?></td>
                <td><?php echo $row[solve2][1] ?></td>
                <td><?php echo $row[solve2][2] ?></td>
                <td><?php echo $row[solve2][3] ?></td>
                <td><?php echo $row[solve2][4] ?></td>
                <td><?php echo $row[solve2][0] + $row[solve2][1] + $row[solve2][2] + $row[solve2][3] + $row[solve2][4]?></td>
            </tr>
            <tr>
                <th rowspan="2">清理前未按规定给予党纪处分和组织处理情况</th>
                <th>党纪处分</th>
                <td><?php echo $row[solveless1][0] ?></td>
                <td><?php echo $row[solveless1][1] ?></td>
                <td><?php echo $row[solveless1][2] ?></td>
                <td><?php echo $row[solveless1][3] ?></td>
                <td><?php echo $row[solveless1][4] ?></td>
                <td><?php echo $row[solveless1][0] + $row[solveless1][1] + $row[solveless1][2] + $row[solveless1][3] + $row[solveless1][4]?></td>
            </tr>
            <tr>
                <th>组织处理</th>
                <td><?php echo $row[solveless2][0] ?></td>
                <td><?php echo $row[solveless2][1] ?></td>
                <td><?php echo $row[solveless2][2] ?></td>
                <td><?php echo $row[solveless2][3] ?></td>
                <td><?php echo $row[solveless2][4] ?></td>
                <td><?php echo $row[solveless2][0] + $row[solveless2][1] + $row[solveless2][2] + $row[solveless2][3] + $row[solveless2][4]?></td>
            </tr>
            <tr>
                <th rowspan="2">清理前未按规定作出处理情况</th>
                <th>终止代表资格人数</th>
                <td><?php echo $row[solveless1][0] ?></td>
                <td><?php echo $row[solveless1][1] ?></td>
                <td><?php echo $row[solveless1][2] ?></td>
                <td><?php echo $row[solveless1][3] ?></td>
                <td><?php echo $row[solveless1][4] ?></td>
                <td><?php echo $row[solveless1][0] + $row[solveless1][1] + $row[solveless1][2] + $row[solveless1][3] + $row[solveless1][4]
                        + $row[solveless1][5] + $row[solveless1][6] + $row[solveless1][7] + $row[solveless1][8]?></td>
            </tr>
            <tr>
                <th>停止执行代表职务人数</th>
                <td><?php echo $row[solveless2][0] ?></td>
                <td><?php echo $row[solveless2][1] ?></td>
                <td><?php echo $row[solveless2][2] ?></td>
                <td><?php echo $row[solveless2][3] ?></td>
                <td><?php echo $row[solveless2][4] ?></td>
                <td><?php echo $row[solveless2][0] + $row[solveless2][1] + $row[solveless2][2] + $row[solveless2][3] + $row[solveless2][4]
                        + $row[solveless2][5] + $row[solveless2][6] + $row[solveless2][7] + $row[solveless2][8]?></td>
            </tr>
            <tr>
                <th rowspan="2">清理情况</th>
                <th>党纪处分</th>
                <td><?php echo $row[result1][0] ?></td>
                <td><?php echo $row[result1][1] ?></td>
                <td><?php echo $row[result1][2] ?></td>
                <td><?php echo $row[result1][3] ?></td>
                <td><?php echo $row[result1][4] ?></td>
                <td><?php echo $row[result1][0] + $row[result1][1] + $row[result1][2] + $row[result1][3] + $row[result1][4]?></td>
            </tr>
            <tr>
                <th>组织处理</th>
                <td><?php echo $row[result2][0] ?></td>
                <td><?php echo $row[result2][1] ?></td>
                <td><?php echo $row[result2][2] ?></td>
                <td><?php echo $row[result2][3] ?></td>
                <td><?php echo $row[result2][4] ?></td>
                <td><?php echo $row[result2][0] + $row[result2][1] + $row[result2][2] + $row[result2][3] + $row[result2][4]?></td>
            </tr>
        </table>
        <br>
        <p>
            <input type="submit" name="dosubmit" id="dosubmit" class="button" value="提交党代表人数">
            <input type="reset" value="重置" class="button">
        </p>
    </form>

</div>