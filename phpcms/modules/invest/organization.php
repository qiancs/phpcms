<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/15
 * Time: 17:50
 */
defined('IN_PHPCMS') or exit('No permission resources.');
//pc_base::load_app_class('admin', 'admin', 0);
pc_base::load_app_class('foreground', 'organization');
pc_base::load_sys_class('format', '', 0);
pc_base::load_sys_class('form', '', 0);
class organization extends foreground
{
    //private $comm_db;
    private $hash;
    function __construct() {
        $this->db = pc_base::load_model('organization_model');

        parent::__construct();
    }

    function index() {
        $userid = $this->memberinfo[userid];
        $rows = $this->db->select(" userid in ( $userid)");
        //include $this->admin_tpl('index');
        include template('invest', 'organization_index');
    }

    function organization_manage_info() {

    }

    function delete() {
        $id = $_GET['id'];
        if($this->comm_db->delete(array('id' => $id, 'userid' => $this->memberinfo[userid]))) {
            showmessage('删除成功', '?m=invest&c=admin&a=index');
        } else {
            showmessage('删除失败，请检查权限', '?m=invest&c=admin&a=index');
        }
    }

    function add() {
        $type = $_GET[type];
        if ($type == 10) {
            $title = '添加行政处罚的党员';
        } else {
            showmessage('未知类型的行政处罚追究党员', '?m=invest&c=admin&a=index');
        }
        $show_validator = $show_scroll = $show_header = true;
        include template('invest', 'admin_add');
    }


    function insert() {
        $memberinfo = $this->memberinfo;
        unset($_POST[dosubmit]);
        $_POST[userid] = $memberinfo[userid];
        $_POST[organization] = $memberinfo[organization];
        $_POST[insert_time] = date('Y-m-d H:i:s', SYS_TIME);
        if($this->comm_db->insert($_POST)) {
            showmessage('添加成功', '?m=invest&c=admin&a=index');
        }
    }

    function modify() {
        $userid = $this->memberinfo[userid];
        $row = $this->comm_db->get_one(array('id' => $_GET[id], 'userid' => $userid));
        if(!$row) {
            showmessage('修改失败，请检查权限', '?m=invest&c=admin&a=index');
        }
        $type = $row[type];
        if ($type == 10) {
            $title = '修改行政处罚的党员';
        } else {
            showmessage('未知类型的行政处罚党员', '?m=invest&c=admin&a=index');
        }
        //include $this->admin_tpl('modify');
        include template('invest', 'admin_modify');    }

    function update() {
        $memberinfo = $this->memberinfo;
        $id = $_POST[id];
        unset($_POST[dosubmit]);
        $_POST[update_time] = date('Y-m-d H:i:s', SYS_TIME);
        //var_dump($_POST);
        if( $this->comm_db->update($_POST, array('id' => $id, 'userid' => $memberinfo[userid]))) {
            showmessage('修改成功', '?m=invest&c=admin&a=index');
        }
    }

    function init() {
        echo 'list';
    }

    function show() {
        $id = $_GET[id];
        $memberinfo = $this->memberinfo;
        $row = $this->comm_db->get_one(array('id' => $id, 'userid' => $memberinfo[userid]));
        $type = $row[type];
        if ($type == 10) {
            $title = '受行政处罚的党员';
        } else {
            showmessage('未知类型的行政处罚党员', '?m=invest&c=admin&a=index');
        }
        include template('invest', 'admin_show');
    }
}