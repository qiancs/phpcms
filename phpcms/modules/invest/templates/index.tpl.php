<link type="text/css" rel="stylesheet" href="<?php echo BS_PATH; ?>css/bootstrap.min.css" />

<script href="<?php echo JS_PATH; ?>jquery.min.js"></script>
<script href="<?php echo BS_PATH; ?>js/bootstrap.min.js"></script>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/16
 * Time: 11:45
 */
?>
<button class="btn-primary" href="?m=invest&c=representative&a=add"
        onclick="location.href='?m=invest&c=representative&a=add&pc_hash=<?php echo $hash;?>'">添加党代表</button>
<table class="table table-striped">
        <th>姓名</th>
        <th>现任（原任职务）</th>
        <th>性别</th>
        <th>民族</th>
        <th>出生年月</th>
        <th>入党时间</th>
        <th>单位</th>
        <th>操作</th>
    <?php
        foreach ($rows as $row) {
            echo '<tr>';
            echo '<td>' . $row["name"] . '</td>';
            echo '<td>' . $row[office] . '</td>';
            echo '<td>' . $row[sex] . '</td>';
            echo '<td>' . $row[nation] . '</td>';
            echo '<td>' . $row[birth] . '</td>';
            echo '<td>' . $row[party] . '</td>';
            echo '<td>' . $row[organization] . '</td>';
            echo '<td><a href="?m=invest&c=representative&a=modify&id=' . $row[id] . '&pc_hash=' . $hash . '">修改</a> | <a href="?m=invest&c=representative&a=delete&id=' . $row[id] . '&pc_hash=' . $hash . '">删除</a> </td>';
            echo '</tr>';
        }

    ?>
</table>
