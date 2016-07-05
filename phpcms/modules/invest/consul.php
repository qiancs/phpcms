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
class consul extends foreground
{
    //private $comm_db;
    private $hash;
    function __construct() {
        $this->comm_db = pc_base::load_model('communist_model');

        parent::__construct();
    }

    function index() {
        $userid = $this->memberinfo[userid];
        $rows = $this->comm_db->select("type in (6, 7) and userid = $userid");
        //include $this->admin_tpl('index');
        include template('invest', 'consul_index');
    }

    function delete() {
        $id = $_GET['id'];
        if($this->comm_db->delete(array('id' => $id, 'userid' => $this->memberinfo[userid]))) {
            showmessage('删除成功', '?m=invest&c=consul&a=index');
        } else {
            showmessage('删除失败，请检查权限', '?m=invest&c=consul&a=index');
        }
    }

    function add() {
        $type = $_GET[type];
        if ($type == 6) {
            $title = '添加撤销资格政协委员';
        } else if ($type == 7) {
            $title = '添加因故责令辞去政协委员';
        } else {
            showmessage('未知类型的政协委员', '?m=invest&c=consul&a=index');
        }
        $show_validator = $show_scroll = $show_header = true;
        include template('invest', 'consul_add');
    }


    function insert() {
        $memberinfo = $this->memberinfo;
        unset($_POST[dosubmit]);
        $_POST[userid] = $memberinfo[userid];
        $_POST[organization] = $memberinfo[organization];
        $_POST[insert_time] = date('Y-m-d H:i:s', SYS_TIME);
        if($this->comm_db->insert($_POST)) {
            showmessage('添加成功', '?m=invest&c=consul&a=index');
        }
    }

    function modify() {
        $userid = $this->memberinfo[userid];
        $row = $this->comm_db->get_one(array('id' => $_GET[id], 'userid' => $userid));
        if(!$row) {
            showmessage('修改失败，请检查权限', '?m=invest&c=consul&a=index');
        }
        $type = $row[type];
        if ($type == 6) {
            $title = '修改撤销资格政协委员';
        } else if ($type == 7) {
            $title = '修改责令辞职政协委员';
        } else {
            showmessage('未知类型的政协委员', '?m=invest&c=consul&a=index');
        }
        //include $this->admin_tpl('modify');
        include template('invest', 'consul_modify');    }

    function update() {
        $memberinfo = $this->memberinfo;
        $id = $_POST[id];
        unset($_POST[dosubmit]);
        $_POST[update_time] = date('Y-m-d H:i:s', SYS_TIME);
        //var_dump($_POST);
        if( $this->comm_db->update($_POST, array('id' => $id, 'userid' => $memberinfo[userid]))) {
            showmessage('修改成功', '?m=invest&c=consul&a=index');
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
            showmessage('查看失败，请检查权限', '?m=invest&c=consul&a=index');
        }
        $type = $row[type];
        if ($type == 6) {
            $title = '撤销资格政协委员';
        } else if ($type == 7) {
            $title = '责令辞职政协委员';
        } else {
            showmessage('未知类型的政协委员', '?m=invest&c=consul&a=index');
        }
        include template('invest', 'consul_show');
    }
}