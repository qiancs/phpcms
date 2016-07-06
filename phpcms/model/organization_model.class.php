<?php
defined('IN_PHPCMS') or exit('No permission resources.');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/16
 * Time: 10:06
 */
pc_base::load_sys_class('model', '', 0);
class organization_model extends model
{
    function __construct()
    {
        $this->db_config = pc_base::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'organization';
        parent::__construct();
    }

}