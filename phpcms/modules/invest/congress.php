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
class congress extends foreground
{
    //private $comm_db;
    private $hash;
    function __construct() {
        $this->comm_db = pc_base::load_model('communist_model');

        parent::__construct();
    }

    function index() {
        $userid = $this->memberinfo[userid];
        $rows = $this->comm_db->select("type in (3, 4, 5) and userid = $userid");
        //include $this->admin_tpl('index');
        include template('invest', 'congress_index');
    }

    function delete() {
        $id = $_GET['id'];
        if($this->comm_db->delete(array('id' => $id, 'userid' => $this->memberinfo[userid]))) {
            showmessage('删除成功', '?m=invest&c=congress&a=index');
        } else {
            showmessage('删除失败，请检查权限', '?m=invest&c=congress&a=index');
        }
    }

    function add() {
        $type = $_GET[type];
        if ($type == 3) {
            $title = '添加终止资格人大代表';
        } else if ($type == 4) {
            $title = '添加暂停职务人大代表';
        } else if ($type == 5) {
            $title = '添加违纪当选人大代表';
        } else {
            showmessage('未知类型的党代表', '?m=invest&c=congress&a=index');
        }
        $show_validator = $show_scroll = $show_header = true;
        include template('invest', 'congress_add');
    }


    function insert() {
        $memberinfo = $this->memberinfo;
        unset($_POST[dosubmit]);
        $_POST[userid] = $memberinfo[userid];
        //$_POST[organization] = $memberinfo[organization];
        $_POST[insert_time] = date('Y-m-d H:i:s', SYS_TIME);
        if($this->comm_db->insert($_POST)) {
            showmessage('添加成功', '?m=invest&c=congress&a=index');
        }
    }

    function modify() {
        $userid = $this->memberinfo[userid];
        $row = $this->comm_db->get_one(array('id' => $_GET[id], 'userid' => $userid));
        if(!$row) {
            showmessage('修改失败，请检查权限', '?m=invest&c=congress&a=index');
        }
        $type = $row[type];
        if ($type == 3) {
            $title = '修改终止资格人大代表';
        } else if ($type == 4) {
            $title = '修改暂停职务人大代表';
        } else if ($type == 5) {
            $title = '修改违纪当选人大代表';
        } else {
            showmessage('未知类型的人大代表', '?m=invest&c=congress&a=index');
        }
        //include $this->admin_tpl('modify');
        $show_validator = $show_scroll = $show_header = true;
        include template('invest', 'congress_modify');    }

    function update() {
        $memberinfo = $this->memberinfo;
        $id = $_POST[id];
        unset($_POST[dosubmit]);
        $_POST[update_time] = date('Y-m-d H:i:s', SYS_TIME);
        //var_dump($_POST);
        if( $this->comm_db->update($_POST, array('id' => $id, 'userid' => $memberinfo[userid]))) {
            showmessage('修改成功', '?m=invest&c=congress&a=index');
        }else {
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
            showmessage('查看失败，请检查权限', '?m=invest&c=congress&a=index');
        }
        $type = $row[type];
        if ($type == 3) {
            $title = '终止资格人大代表';
        } else if ($type == 4) {
            $title = '暂停职务人大代表';
        } else if ($type == 5) {
            $title = '违纪当选人大代表';
        } else {
            showmessage('未知类型的人大代表', '?m=invest&c=congress&a=index');
        }
        include template('invest', 'congress_show');
    }
}