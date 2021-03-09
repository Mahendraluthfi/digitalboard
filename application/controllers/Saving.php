<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saving extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('login');
	    }
	}

	public function index()
	{
		$data['content'] = 'saving';
		$data['get'] = $this->db->get_where('saving', array('id' => 1))->row();
		$this->load->view('index', $data);	
	}

	public function save()
	{
		
		$this->db->where('id', 1);
		$this->db->update('saving', array(
			'embed' => $this->input->post('embed')
		));

		redirect('saving','refresh');
	
	}

}

/* End of file Saving.php */
/* Location: ./application/controllers/Saving.php */