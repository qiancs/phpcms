<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/29
 * Time: 15:48
 */
class invest extends admin
{
    private $db;
    private $orga_db;
    function __construct() {
        parent::__construct();
        $this->db = pc_base::load_model('communist_model');
        $this->orga_db = pc_base::load_model('member_model');
        pc_base::load_sys_class('form');
        $this->invest_type = L('invest_type_list');
    }

    function init() {
        //$where = '1 = 1';
        $page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
        $infos = $this->db->listinfo($where,$order = 'id DESC',$page, $pages = '12');
        $pages = $this->db->pages;
        $invest_type = $this->invest_type;
        include $this->admin_tpl('communist_list');
    }

    function public_organization_tree() {
        //$this->db->set_model('member_model');
        $menuid = $_GET[menuid];
        $organizations = $this->orga_db->select('', 'userid, organization, parentid');
        $tree = pc_base::load_sys_class('tree');
        $nodes = array();
        foreach ($organizations as $r) {
            if ($r[organization] == '') $r[organization] = "&nbsp;";
            $r[id] = $r[userid];
            $r[name] = $r[organization];
            $nodes[$r[id]] = $r;
        }
        $strs = "<span class='file'><a href='?m=invest&c=invest&a=public_show&menuid=$menuid&id=\$id' target='right'> \$name</a></span>";
        $strs2 = "<img src='".IMG_PATH."folder.gif'> <a href='?m=invest&c=invest&a=public_show&menuid=$menuid&id=\$id' target='right'>\$name</a>";
        if (!empty($nodes)) {
            $tree->init($nodes);
            $nodes = $tree->get_treeview(0, 'organization_tree', $strs, $strs2);
        }
        //var_dump($nodes);
        include $this->admin_tpl('organization_tree');
    }

    function public_show() {
        //$show_header = 1;
        $id = isset($_GET[id]) ? intval($_GET[id]) : 0;
        $rows = $this->orga_db->select("userid=$id");
        $big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=invest&c=invest&menuid=\$menuid&a=init\', title:\''.'详细信息'.'\', width:\'700\', height:\'450\'}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', '详细信息');
        include $this->admin_tpl('communist_list');
    }

}