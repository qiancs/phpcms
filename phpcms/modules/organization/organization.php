<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);
class organization extends admin {
	private $db2, $db;
	function __construct() {
		parent::__construct();
		$this->orga_db = pc_base::load_model('organization_model');
		$this->comm_db = pc_base::load_model('communist_model');
	}

	public function init() {
		$page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
		$infos = $this->db->listinfo(array('siteid'=>$this->get_siteid()),'subjectid DESC',$page, '14');
		$pages = $this->db->pages;
		$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=vote&c=vote&a=add\', title:\''.L('vote_add').'\', width:\'700\', height:\'450\'}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', L('vote_add'));
		include $this->admin_tpl('vote_list'); 
 	}

	public function representative_statistic()
	{
		$userid = isset($_GET[id]) && $_GET[id] != '' ? $_GET[id] : 1;
		$pc_hash = $_SESSION[pc_hash];
		$selected = 'representative';
		$row = $this->orga_db->get_one(array('userid' => $userid));
		$row[abort1] = array($this->comm_db->count("userid=$userid and " . 'abort_repre_reason="受到留党察看及以上处分" and level="十八大代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="受到留党察看及以上处分" and level="省党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="受到留党察看及以上处分" and level="市党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="受到留党察看及以上处分" and level="县党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="受到留党察看及以上处分" and level="乡镇党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="受到留党察看及以上处分" and level="机关党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="受到留党察看及以上处分" and level="企业党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="受到留党察看及以上处分" and level="高校党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="受到留党察看及以上处分" and level="其他"'));
		$row[abort2] = array($this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="因出国（境）定居等原因被停止党籍或者丧失中国籍" and level="十八大代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="因出国（境）定居等原因被停止党籍或者丧失中国籍" and level="省党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="因出国（境）定居等原因被停止党籍或者丧失中国籍" and level="市党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="因出国（境）定居等原因被停止党籍或者丧失中国籍" and level="县党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="因出国（境）定居等原因被停止党籍或者丧失中国籍" and level="乡镇党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="因出国（境）定居等原因被停止党籍或者丧失中国籍" and level="机关党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="因出国（境）定居等原因被停止党籍或者丧失中国籍" and level="企业党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="因出国（境）定居等原因被停止党籍或者丧失中国籍" and level="高校党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="因出国（境）定居等原因被停止党籍或者丧失中国籍" and level="其他"'));
		$row[abort3] = array($this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="辞去代表职务被接受" and level="十八大代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="辞去代表职务被接受" and level="省党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="辞去代表职务被接受" and level="市党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="辞去代表职务被接受" and level="县党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="辞去代表职务被接受" and level="乡镇党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="辞去代表职务被接受" and level="机关党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="辞去代表职务被接受" and level="企业党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="辞去代表职务被接受" and level="高校党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'abort_repre_reason="辞去代表职务被接受" and level="其他"'));
		$row[stop1] = array($this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time < "2016-06-20" and level="十八大代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time < "2016-06-20" and level="省党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time < "2016-06-20" and level="市党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time < "2016-06-20" and level="县党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time < "2016-06-20" and level="乡镇党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time < "2016-06-20" and level="机关党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time < "2016-06-20" and level="企业党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time < "2016-06-20" and level="高校党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time < "2016-06-20" and level="其他"'));
		$row[solve1] = array($this->comm_db->count('type=1 and is_abort=1 and abort_repre_time < "2016-06-20" and level="十八大代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time < "2016-06-20" and level="省党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time < "2016-06-20" and level="市党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time < "2016-06-20" and level="县党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time < "2016-06-20" and level="乡镇党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time < "2016-06-20" and level="机关党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time < "2016-06-20" and level="企业党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time < "2016-06-20" and level="高校党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time < "2016-06-20" and level="其他"'));
		$row[solve2] = array($this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time < "2016-06-20" and level="十八大代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time < "2016-06-20" and level="省党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time < "2016-06-20" and level="市党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time < "2016-06-20" and level="县党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time < "2016-06-20" and level="乡镇党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time < "2016-06-20" and level="机关党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time < "2016-06-20" and level="企业党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time < "2016-06-20" and level="高校党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time < "2016-06-20" and level="其他"'));
		$row[solveless1] = array($this->comm_db->count("userid=$userid  and " . 'type=1 and (is_abort=0 or abort_repre_time > "2016-06-20" or abort_repre_time = "0000-00-00") and level="十八大代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and (is_abort=0 or abort_repre_time > "2016-06-20" or abort_repre_time = "0000-00-00") and level="省党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and (is_abort=0 or abort_repre_time > "2016-06-20" or abort_repre_time = "0000-00-00") and level="市党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and (is_abort=0 or abort_repre_time > "2016-06-20" or abort_repre_time = "0000-00-00") and level="县党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and (is_abort=0 or abort_repre_time > "2016-06-20" or abort_repre_time = "0000-00-00") and level="乡镇党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and (is_abort=0 or abort_repre_time > "2016-06-20" or abort_repre_time = "0000-00-00") and level="机关党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and (is_abort=0 or abort_repre_time > "2016-06-20" or abort_repre_time = "0000-00-00") and level="企业党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and (is_abort=0 or abort_repre_time > "2016-06-20" or abort_repre_time = "0000-00-00") and level="高校党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and (is_abort=0 or abort_repre_time > "2016-06-20" or abort_repre_time = "0000-00-00") and level="其他"'));
		$row[solveless2] = array($this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time > "2016-06-20" and level="十八大代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time > "2016-06-20" and level="省党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time > "2016-06-20" and level="市党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time > "2016-06-20" and level="县党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time > "2016-06-20" and level="乡镇党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time > "2016-06-20" and level="机关党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time > "2016-06-20" and level="企业党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time > "2016-06-20" and level="高校党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time > "2016-06-20" and level="其他"'));
		$row[result1] = array($this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time > "2016-06-20" and level="十八大代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time > "2016-06-20" and level="省党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time > "2016-06-20" and level="市党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time > "2016-06-20" and level="县党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time > "2016-06-20" and level="乡镇党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time > "2016-06-20" and level="机关党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time > "2016-06-20" and level="企业党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time > "2016-06-20" and level="高校党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=1 and is_abort=1 and abort_repre_time > "2016-06-20" and level="其他"'));
		$row[result2] = array($this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time > "2016-06-20" and level="十八大代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time > "2016-06-20" and level="省党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time > "2016-06-20" and level="市党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time > "2016-06-20" and level="县党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time > "2016-06-20" and level="乡镇党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time > "2016-06-20" and level="机关党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time > "2016-06-20" and level="企业党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time > "2016-06-20" and level="高校党代会代表"'),
			$this->comm_db->count("userid=$userid  and " . 'type=2 and is_stop=1 and stop_repre_time > "2016-06-20" and level="其他"'));

		include $this->admin_tpl('representative_statistic');
	}

	public function congress_statistic()
	{
		$userid = isset($_GET[id]) && $_GET[id] != '' ? $_GET[id] : 1;
		$row = $this->orga_db->get_one(array('userid' => $userid));
		$row[abort1] = array($this->comm_db->count("userid=$userid and " . 'abort_cong_reason="因涉嫌违纪被罢免" and level="全国人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'abort_cong_reason="因涉嫌违纪被罢免" and level="省人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'abort_cong_reason="因涉嫌违纪被罢免" and level="市人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'abort_cong_reason="因涉嫌违纪被罢免" and level="县人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'abort_cong_reason="因涉嫌违纪被罢免" and level="乡镇人大代表"'));
		$row[abort2] = array($this->comm_db->count("userid=$userid and " . 'abort_cong_reason="因涉嫌违纪被责令辞职" and level="全国人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'abort_cong_reason="因涉嫌违纪被责令辞职" and level="省人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'abort_cong_reason="因涉嫌违纪被责令辞职" and level="市人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'abort_cong_reason="因涉嫌违纪被责令辞职" and level="县人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'abort_cong_reason="因涉嫌违纪被责令辞职" and level="乡镇人大代表"'));
		$row[abort3] = array($this->comm_db->count("userid=$userid and " . 'abort_cong_reason="因违反社会道德被责令辞职" and level="全国人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'abort_cong_reason="因违反社会道德被责令辞职" and level="省人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'abort_cong_reason="因违反社会道德被责令辞职" and level="市人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'abort_cong_reason="因违反社会道德被责令辞职" and level="县人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'abort_cong_reason="因违反社会道德被责令辞职" and level="乡镇人大代表"'));
		$row[abort4] = array($this->comm_db->count("userid=$userid and " . 'abort_cong_reason="丧失国籍" and level="全国人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'abort_cong_reason="丧失国籍" and level="省人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'abort_cong_reason="丧失国籍" and level="市人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'abort_cong_reason="丧失国籍" and level="县人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'abort_cong_reason="丧失国籍" and level="乡镇人大代表"'));
		$row[stop1] = array($this->comm_db->count("userid=$userid and " . 'type=4 and level="全国人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type=4 and level="省人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type=4 and level="市人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type=4 and level="县人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type=4 and level="乡镇人大代表"'));
		$row[invalid1] = array($this->comm_db->count("userid=$userid and " . 'type=5 and level="全国人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type=5 and level="省人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type=5 and level="市人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type=5 and level="县人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type=5 and level="乡镇人大代表"'));
		$row[solve1] = array($this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and  measure_time <> "0000-00-00" and measure_time < "2016-06-20" and level="全国人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and measure_time <> "0000-00-00" and measure_time < "2016-06-20" and level="省人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and measure_time <> "0000-00-00" and measure_time < "2016-06-20" and level="市人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and measure_time <> "0000-00-00" and measure_time < "2016-06-20" and level="县人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and measure_time <> "0000-00-00" and measure_time < "2016-06-20" and level="乡镇人大代表"'));
		$row[solve2] = array($this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and  sanction_time <> "0000-00-00" and sanction_time < "2016-06-20" and level="全国人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and sanction_time <> "0000-00-00" and sanction_time < "2016-06-20" and level="省人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and sanction_time <> "0000-00-00" and sanction_time < "2016-06-20" and level="市人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and sanction_time <> "0000-00-00" and sanction_time < "2016-06-20" and level="县人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and sanction_time <> "0000-00-00" and sanction_time < "2016-06-20" and level="乡镇人大代表"'));
		$row[solveless1] = array($this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and  (measure_time = "0000-00-00" or measure_time > "2016-06-20") and level="全国人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and (measure_time = "0000-00-00" or measure_time > "2016-06-20") and level="省人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and (measure_time = "0000-00-00" or measure_time > "2016-06-20") and level="市人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and (measure_time = "0000-00-00" or measure_time > "2016-06-20") and level="县人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and (measure_time = "0000-00-00" or measure_time > "2016-06-20") and level="乡镇人大代表"'));
		$row[solveless2] = array($this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and  (sanction_time = "0000-00-00" or sanction_time > "2016-06-20") and level="全国人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and (sanction_time = "0000-00-00" or sanction_time > "2016-06-20") and level="省人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and (sanction_time = "0000-00-00" or sanction_time > "2016-06-20") and level="市人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and (sanction_time = "0000-00-00" or sanction_time > "2016-06-20") and level="县人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and (sanction_time = "0000-00-00" or sanction_time > "2016-06-20") and level="乡镇人大代表"'));
		$row[result1] = array($this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and  measure_time > "2016-06-20" and level="全国人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and measure_time > "2016-06-20" and level="省人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and measure_time > "2016-06-20" and level="市人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and measure_time > "2016-06-20" and level="县人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and measure_time > "2016-06-20" and level="乡镇人大代表"'));
		$row[result2] = array($this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and  sanction_time > "2016-06-20" and level="全国人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and sanction_time > "2016-06-20" and level="省人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and sanction_time > "2016-06-20" and level="市人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and sanction_time > "2016-06-20" and level="县人大代表"'),
			$this->comm_db->count("userid=$userid and " . 'type in (3, 4, 5) and sanction_time > "2016-06-20" and level="乡镇人大代表"'));
		include $this->admin_tpl('congress_statistic');
	}

	public function consul_statistic()
	{
		$userid = isset($_GET[id]) && $_GET[id] != '' ? $_GET[id] : 1;
		$row = $this->orga_db->get_one(array('userid' => $userid));
		$row[dismiss1] = array($this->comm_db->count("userid=$userid and " . 'dismiss_consul_reason="因涉嫌违纪违法被撤销资格" and level="全国政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'dismiss_consul_reason="因涉嫌违纪违法被撤销资格" and level="省政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'dismiss_consul_reason="因涉嫌违纪违法被撤销资格" and level="市政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'dismiss_consul_reason="因涉嫌违纪违法被撤销资格" and level="县政协委员"'));
		$row[dismiss2] = array($this->comm_db->count("userid=$userid and " . 'dismiss_consul_reason="丧失国籍" and level="全国政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'dismiss_consul_reason="丧失国籍" and level="省政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'dismiss_consul_reason="丧失国籍" and level="市政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'dismiss_consul_reason="丧失国籍" and level="县政协委员"'));
		$row[order1] = array($this->comm_db->count("userid=$userid and " . 'type=7 and level="全国政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type=7 and level="省政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type=7 and level="市政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type=7 and level="县政协委员"'));
		$row[solve1] = array($this->comm_db->count("userid=$userid and " . 'type in (6, 7) and  measure_time <> "0000-00-00" and measure_time < "2016-06-20" and level="全国政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type in (6, 7) and measure_time <> "0000-00-00" and measure_time < "2016-06-20" and level="省政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type in (6, 7) and measure_time <> "0000-00-00" and measure_time < "2016-06-20" and level="市政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type in (6, 7) and measure_time <> "0000-00-00" and measure_time < "2016-06-20" and level="县政协委员"'));
		$row[solve2] = array($this->comm_db->count("userid=$userid and " . 'type in (6, 7) and  sanction_time <> "0000-00-00" and sanction_time < "2016-06-20" and level="全国政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type in (6, 7) and sanction_time <> "0000-00-00" and sanction_time < "2016-06-20" and level="省政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type in (6, 7) and sanction_time <> "0000-00-00" and sanction_time < "2016-06-20" and level="市政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type in (6, 7) and sanction_time <> "0000-00-00" and sanction_time < "2016-06-20" and level="县政协委员"'));
		$row[solveless1] = array($this->comm_db->count("userid=$userid and " . 'type in (6, 7) and  (measure_time = "0000-00-00" or measure_time > "2016-06-20") and level="全国政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type in (6, 7) and (measure_time = "0000-00-00" or measure_time > "2016-06-20") and level="省政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type in (6, 7) and (measure_time = "0000-00-00" or measure_time > "2016-06-20") and level="市政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type in (6, 7) and (measure_time = "0000-00-00" or measure_time > "2016-06-20") and level="县政协委员"'));
		$row[solveless2] = array($this->comm_db->count("userid=$userid and " . 'type in (6, 7) and  (sanction_time = "0000-00-00" or sanction_time > "2016-06-20") and level="全国政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type in (6, 7) and (sanction_time = "0000-00-00" or sanction_time > "2016-06-20") and level="省政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type in (6, 7) and (sanction_time = "0000-00-00" or sanction_time > "2016-06-20") and level="市政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type in (6, 7) and (sanction_time = "0000-00-00" or sanction_time > "2016-06-20") and level="县政协委员"'));
		$row[result1] = array($this->comm_db->count("userid=$userid and " . 'type in (6, 7) and  measure_time > "2016-06-20" and level="全国政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type in (6, 7) and measure_time > "2016-06-20" and level="省政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type in (6, 7) and measure_time > "2016-06-20" and level="市政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type in (6, 7) and measure_time > "2016-06-20" and level="县政协委员"'));
		$row[result2] = array($this->comm_db->count("userid=$userid and " . 'type in (6, 7) and  sanction_time > "2016-06-20" and level="全国政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type in (6, 7) and sanction_time > "2016-06-20" and level="省政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type in (6, 7) and sanction_time > "2016-06-20" and level="市政协委员"'),
			$this->comm_db->count("userid=$userid and " . 'type in (6, 7) and sanction_time > "2016-06-20" and level="县政协委员"'));
		include $this->admin_tpl('consul_statistic');
	}

	public function criminal_statistic()
	{
		$userid = isset($_GET[id]) && $_GET[id] != '' ? $_GET[id] : 1;
		$row = $this->orga_db->get_one(array('userid' => $userid));
		$row[penalty1] = $this->comm_db->count("userid=$userid and type=8");
		$row[penalty2] = $this->comm_db->count("userid=$userid and type=9");
		$row[solve1] = $this->comm_db->count("userid=$userid and " . 'type in (8, 9) and  measure_time <> "0000-00-00" and measure_time < "2016-06-20" ');
		$row[solve2] = $this->comm_db->count("userid=$userid and " . 'type in (8, 9) and  sanction_time <> "0000-00-00" and sanction_time < "2016-06-20" ');
		$row[solveless1] = $this->comm_db->count("userid=$userid and " . 'type in (8, 9) and  (measure_time = "0000-00-00" or measure_time > "2016-06-20") ');
		$row[solveless2] = $this->comm_db->count("userid=$userid and " . 'type in (8, 9) and  (sanction_time = "0000-00-00" or sanction_time > "2016-06-20") ');
		$row[result1] = $this->comm_db->count("userid=$userid and " . 'type in (8, 9) and  measure_time > "2016-06-20" ');
		$row[result2] = $this->comm_db->count("userid=$userid and " . 'type in (8, 9) and  sanction_time > "2016-06-20" ');

		include $this->admin_tpl('criminal_statistic');
	}

	public function admin_statistic()
	{
		$userid = isset($_GET[id]) && $_GET[id] != '' ? $_GET[id] : 1;
		$row = $this->orga_db->get_one(array('userid' => $userid));
		$row[penalty1] = $this->comm_db->count("userid=$userid and type=10");
		$row[solve1] = $this->comm_db->count("userid=$userid and " . 'type in (10) and  measure_time <> "0000-00-00" and measure_time < "2016-06-20" ');
		$row[solve2] = $this->comm_db->count("userid=$userid and " . 'type in (10) and  sanction_time <> "0000-00-00" and sanction_time < "2016-06-20" ');
		$row[solveless1] = $this->comm_db->count("userid=$userid and " . 'type in (10) and  (measure_time = "0000-00-00" or measure_time > "2016-06-20") ');
		$row[solveless2] = $this->comm_db->count("userid=$userid and " . 'type in (10) and  (sanction_time = "0000-00-00" or sanction_time > "2016-06-20") ');
		$row[result1] = $this->comm_db->count("userid=$userid and " . 'type in (10) and  measure_time > "2016-06-20" ');
		$row[result2] = $this->comm_db->count("userid=$userid and " . 'type in (10) and  sanction_time > "2016-06-20" ');
		include $this->admin_tpl('admin_statistic');
	}


}
?>