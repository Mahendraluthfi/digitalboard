<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('login');
	    }
	}
	public function index()
	{
		$data['content'] = 'plan';
		$data['get'] = $this->db->get_where('plan', array('id' => 1))->row();
		$this->load->view('index', $data);		
	}

	public function save()
	{
		$this->db->where('id', 1);
		$this->db->update('plan', array(
			'embed' => $this->input->post('embed')
		));

		redirect('plan','refresh');
	}

}

/* End of file Plan.php */
/* Location: ./application/controllers/Plan.php */