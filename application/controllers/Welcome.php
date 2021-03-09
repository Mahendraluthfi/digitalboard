<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('login');
	    }
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$getrunning = $this->db->get('running')->result();
		foreach ($getrunning as $key => $value) {
			$value->location = $this->db->get_where('locations',array('id_running' => $value->id))->result();
			$value->total_loc = $this->db->get_where('locations', array('id_running' => $value->id))->num_rows();
		}
		$data['request'] = $this->db->get('request')->result();
		$data['ongoing'] = $this->db->get('ongoing')->result();
		$data['running'] = $getrunning;
		$data['npi'] = $this->db->get('npi')->result();
		$data['content'] = 'front';
		$this->load->view('index', $data);
	}

	
}
