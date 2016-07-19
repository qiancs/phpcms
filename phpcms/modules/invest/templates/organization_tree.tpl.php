<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header','admin');?>
<div class="bk10"></div>
<link rel="stylesheet" href="<?php echo CSS_PATH;?>jquery.treeview.css" type="text/css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.treeview.js"></script>
<?php if($ajax_show) {?>
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.treeview.async.js"></script>
<?php }?>
<SCRIPT LANGUAGE="JavaScript">
<!--
<?php if($ajax_show) {?>
$(document).ready(function(){
    $("#organization_tree").treeview({
			control: "#treecontrol",
			url: "index.php?m=invest&c=invest&a=public_sub_organization&menuid=<?php echo $_GET['menuid']?>",
			ajax: {
				data: {
					"additional": function() {
						return "time: " + new Date;
					},
					"modelid": function() {
						return "<?php echo $modelid?>";
					}
				},
				type: "post"
			}
	});
});
<?php } else {?>
$(document).ready(function(){
    $("#organization_tree").treeview({
			control: "#treecontrol",
			persist: "cookie",
			cookieId: "treeview-black"
	});
});
<?php }?>
function open_list(obj) {

	window.top.$("#current_pos_attr").html($(obj).html());
}

//-->
</SCRIPT>
 <style type="text/css">
.filetree *{white-space:nowrap;}
.filetree span.folder, .filetree span.file{display:auto;padding:1px 0 1px 16px;}
 </style>
 <div id="treecontrol">
 <span style="display:none">
		<a href="#"></a>
		<a href="#"></a>
		</span>
		<a href="#"><img src="<?php echo IMG_PATH;?>minus.gif" /> <img src="<?php echo IMG_PATH;?>application_side_expand.png" /> 展开/收缩</a>
</div>
<?php echo $nodes; ?>