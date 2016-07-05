<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/15
 * Time: 17:50
 */
defined('IN_PHPCMS') or exit('No permission resources.');
//pc_base::load_app_class('admin', 'admin', 0);
pc_base::load_app_class('foreground', 'member');
pc_base::load_sys_class('format', '', 0);
pc_base::load_sys_class('form', '', 0);
class representative extends foreground
{
    //private $comm_db;
    private $hash;
    function __construct() {
        $this->comm_db = pc_base::load_model('communist_model');

        parent::__construct();
    }

    function index() {
        $userid = $this->memberinfo[userid];
        $rows = $this->comm_db->select("type in (1, 2) and userid = $userid");
        //include $this->admin_tpl('index');
        include template('invest', 'representative_index');
    }

    function delete() {
        $id = $_GET['id'];
        if($this->comm_db->delete(array('id' => $id, 'userid' => $this->memberinfo[userid]))) {
            showmessage('删除成功', '?m=invest&c=representative&a=index');
        } else {
            showmessage('删除失败，请检查权限', '?m=invest&c=representative&a=index');
        }
    }

    function add() {
        $type = $_GET[type];
        if ($type == 1) {
            $title = '添加终止资格党代表';
        } else if ($type == 2) {
            $title = '添加停止职务党代表';
        } else {
            showmessage('未知类型的党代表', '?m=invest&c=representative&a=index');
        }
        $show_validator = $show_scroll = $show_header = true;
        include template('invest', 'representative_add');
    }


    function insert() {
        $memberinfo = $this->memberinfo;
        unset($_POST[dosubmit]);
        $_POST[userid] = $memberinfo[userid];
        $_POST[organization] = $memberinfo[organization];
        $_POST[insert_time] = date('Y-m-d H:i:s', SYS_TIME);
        if($this->comm_db->insert($_POST)) {
            showmessage('添加成功', '?m=invest&c=representative&a=index');
        }
    }

    function modify() {
        $userid = $this->memberinfo[userid];
        $row = $this->comm_db->get_one(array('id' => $_GET[id], 'userid' => $userid));
        if(!$row) {
            showmessage('修改失败，请检查权限', '?m=invest&c=representative&a=index');
        }
        $type = $row[type];
        if ($type == 1) {
            $title = '修改终止资格党代表';
        } else if ($type == 2) {
            $title = '修改停止职务党代表';
        } else {
            showmessage('未知类型的党代表', '?m=invest&c=representative&a=index');
        }
        //include $this->admin_tpl('modify');
        include template('invest', 'representative_modify');    }

    function update() {
        $memberinfo = $this->memberinfo;
        $id = $_POST[id];
        unset($_POST[dosubmit]);
        $_POST[update_time] = date('Y-m-d H:i:s', SYS_TIME);
        //var_dump($_POST);
        if( $this->comm_db->update($_POST, array('id' => $id, 'userid' => $memberinfo[userid]))) {
            showmessage('修改成功', '?m=invest&c=representative&a=index');
        } else {
            showmessage('修改失败，请检查是否有权限');
        }
    }

    function init() {
        echo 'list';
    }

    function show() {
        $id = $_GET[id];
        $memberinfo = $this->memberinfo;
        $row = $this->comm_db->get_one(array('id' => $id, 'userid' => $memberinfo[userid]));
        if(!$row) {
            showmessage('查看失败，请检查权限', '?m=invest&c=representative&a=index');
        }
        $type = $row[type];
        if ($type == 1) {
            $title = '终止资格党代表';
        } else if ($type == 2) {
            $title = '停止职务党代表';
        } else {
            showmessage('未知类型的党代表', '?m=invest&c=representative&a=index');
        }
        include template('invest', 'representative_show');
    }
}