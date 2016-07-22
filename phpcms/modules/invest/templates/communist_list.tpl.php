<?php
defined('IN_ADMIN') or exit('No permission resources.');
$show_dialog = 1;
include $this->admin_tpl('header','admin');
?>
<SCRIPT LANGUAGE="JavaScript">
    <!--
    if(window.top.$("#current_pos").data('clicknum')==1 || window.top.$("#current_pos").data('clicknum')==null) {
        parent.document.getElementById('display_center_id').style.display='';
        parent.document.getElementById('center_frame').src = '?m=invest&c=invest&a=public_organization_tree&menuid=<?php echo $menuid ?>&pc_hash=<?php echo $_SESSION['pc_hash'];?>';
        window.top.$("#current_pos").data('clicknum',0);
    }
    //-->
</SCRIPT>
<div class="pad-lr-10">
    <a href='?m=organization&c=organization&a=representative_statistic&id=<?php echo $_GET[id] ?>&pc_hash=$pc_hash' class="<?php $selected == 'representative' ? 'on' : '' ?>"<em>党代表排查</em></a><span>|</span>
    <a href='?m=organization&c=organization&a=congress&pc_hash=$pc_hash' class="<?php $selected == 'congress' ? 'on' : '' ?>"  <em>人大代表排查</em></a><span>|</span>
    <a href='?m=organization&c=organization&a=consul&pc_hash=$pc_hash'  class="<?php $selected == 'consul' ? 'on' : '' ?>" <em>政协委员代表排查</em></a><span>|</span>
    <a href='?m=organization&c=organization&a=criminal&pc_hash=$pc_hash'  class="<?php $selected == 'criminal' ? 'on' : '' ?>"<em>刑责追究党员排查</em></a><span>|</span>
    <a href='?m=organization&c=organization&a=admin&pc_hash=$pc_hash'  class="<?php $selected == 'admin' ? 'on' : '' ?>"<em>行政处罚党员排查</em></a><span>|</span>
    <?php var_dump($_GET); ?>
</div>