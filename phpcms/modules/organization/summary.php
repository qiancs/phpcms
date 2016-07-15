<?php
/**
 * 会员前台管理中心、账号管理、收藏操作类
 */

defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('foreground', 'member');
pc_base::load_sys_class('format', '', 0);
pc_base::load_sys_class('form', '', 0);

class summary extends foreground
{
	private $orga_db;
	private $comm_db;

	function __construct()
	{
		parent::__construct();
		$this->orga_db = pc_base::load_model('organization_model');
		$this->comm_db = pc_base::load_model('communist_model');
	}

	public function representative()
	{
		$userid = $this->memberinfo['userid'];
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

		include template('organization', 'representative_summary');
	}

	public function congress()
	{
		$userid = $this->memberinfo['userid'];
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
		include template('organization', 'congress_summary');
	}

	public function consul()
	{
		$userid = $this->memberinfo['userid'];
		$row = $this->orga_db->get_one(array('userid' => $userid));
		if (isset($_POST['dosubmit'])) {
			unset($_POST['dosubmit']);
			if ($row) {
				$this->orga_db->update($_POST, array('userid' => $userid));
			} else {
				$this->orga_db->insert($_POST);
			}
			showmessage(L('operation_success'), HTTP_REFERER);
		}
		include template('organization', 'consul_summary');
	}

	public function criminal()
	{
		$userid = $this->memberinfo['userid'];
		$row = $this->orga_db->get_one(array('userid' => $userid));
		if (isset($_POST['dosubmit'])) {
			unset($_POST['dosubmit']);
			if ($row) {
				$this->orga_db->update($_POST, array('userid' => $userid));
			} else {
				$this->orga_db->insert($_POST);
			}
			showmessage(L('operation_success'), HTTP_REFERER);
		}
		include template('organization', 'criminal_summary');
	}

	public function admin()
	{
		$userid = $this->memberinfo['userid'];
		$row = $this->orga_db->get_one(array('userid' => $userid));
		if (isset($_POST['dosubmit'])) {
			unset($_POST['dosubmit']);
			if ($row) {
				$this->orga_db->update($_POST, array('userid' => $userid));
			} else {
				$this->orga_db->insert($_POST);
			}
			showmessage(L('operation_success'), HTTP_REFERER);
		}
		include template('organization', 'admin_summary');
	}
}

?>