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
    function __construct() {
        parent::__construct();
        $this->db = pc_base::load_model('communist_model');
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
}