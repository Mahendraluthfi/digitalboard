<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AndonAlert extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');		
		$this->load->library('telegram/Telegram_lib');							
	}

	public function index()
	{
		$data['content'] = 'downtime';
		$data['get'] = $this->db->get('downtime')->result();
		$this->load->view('index', $data);	
	}

	public function downtime($project,$time)
	{
		$project = ucwords($project);
		if ($time == '1') {
			$this->db->insert('downtime', array(
				'projectname' => $project,
				'st' => date('Y-m-d H:i:s'),
			));
			$this->telegram_lib->sendmsg("ALERT!!!\nProject ".$project." is problem.\nPlease following this issue.\nDatetime: ".date('Y-m-d H:i:s'));

		}else{
			$get = $this->db->get_where('downtime', array('projectname' => $project, 'et' => NULL))->row();
			$this->db->where('id', $get->id);
			$this->db->update('downtime', array(
				'et' => date('Y-m-d H:i:s')
			));
			$this->telegram_lib->sendmsg("INFO!\nProject ".$project." has been cleared.\nThank You.\nDatetime: ".date('Y-m-d H:i:s'));
		}
	}

}

/* End of file AndonAlert.php */
/* Location: ./application/controllers/AndonAlert.php */