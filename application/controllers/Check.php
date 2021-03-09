<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check extends CI_Controller {

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
		$data['content'] = 'check';
		$data['get'] = $this->db->get_where('running')->result();
		$this->load->view('index', $data);		
	}

	public function get_check($id)
	{
		$cek = $this->db->get_where('checktime', array('id_running' => $id, 'date' => date('Y-m-d')));
		$date = date('Y-m-d');
		if ($cek->num_rows() > 0) {
			$addloc = $this->db->query("SELECT * FROM `locations` WHERE location NOT in(SELECT loc FROM checktime WHERE date='$date' AND id_running='$id') AND id_running='$id'")->result();
			foreach ($addloc as $data) {
				$this->db->insert('checktime', array(
					'id_running' => $id,
					'date' => date('Y-m-d'),
					'loc' => $data->location,
					'cb' => 0
				));
			}

			$delloc = $this->db->query("SELECT * FROM `checktime` WHERE loc NOT in(SELECT location FROM locations WHERE id_running='$id') AND id_running='$id' AND date='$date'")->result();
			foreach ($delloc as $data) {
				$this->db->where('id', $data->id);
				$this->db->delete('checktime');
			}

			$getnew = $this->db->query("SELECT * FROM checktime WHERE id_running='$id' AND date='$date' ORDER BY loc ASC")->result();			
			echo json_encode($getnew);
						
		}else{
			$get = $this->db->get_where('locations', array('id_running' => $id))->result();
			foreach ($get as $row) {
				$this->db->insert('checktime', array(
					'id_running' => $id,
					'date' => date('Y-m-d'),
					'loc' => $row->location,
					'cb' => 0
				));
			}
			$getnew = $this->db->query("SELECT * FROM checktime WHERE id_running='$id' AND date='$date' ORDER BY loc ASC")->result();			
			echo json_encode($getnew);
		}
	}

	public function save($id)
	{
		
		$cb = $this->input->post('cb');
		$rm = $this->input->post('rm');
		if (!empty($cb)) {			
			foreach ($cb as $key => $value) {
				$this->db->where('id', $key);
				$this->db->update('checklist', array(
					'cb' => $value					
				));
			}
		}

		if (!empty($rm)) {			
			foreach ($rm as $key => $value) {
				$this->db->where('id', $key);
				$this->db->update('checklist', array(
					'reason' => $value
				));
			}
		}

		$this->db->where('id', $id);
		$this->db->update('running', array('last_update' => date('Y-m-d H:i:s')));

		redirect('check','refresh');
	}

	public function savebylocation()
	{
		
		$cb = $this->input->post('cb');
		$rm = $this->input->post('rm');
		if (!empty($cb)) {			
			foreach ($cb as $key => $value) {
				$this->db->where('id', $key);
				$this->db->update('checklist', array(
					'cb' => $value					
				));

				$getprj = $this->db->get_where('checklist', array('id' => $key))->row();
				$this->db->where('id', $getprj->id_running);
				$this->db->update('running', array('last_update' => date('Y-m-d H:i:s')));				

			}
		}

		if (!empty($rm)) {			
			foreach ($rm as $key => $value) {
				$this->db->where('id', $key);
				$this->db->update('checklist', array(
					'reason' => $value
				));
			}
		}		

		redirect('check/linewise','refresh');
	}


	public function get_check_history()
	{
		$this->db->from('checklist');
		$this->db->join('location', 'location.id = checklist.id_location');
		$this->db->where('checklist.id_running', $this->input->post('id_search'));
		$this->db->where('checklist.date', $this->input->post('date'));
		$db = $this->db->get()->result();
		echo json_encode($db);
	}

	public function get_checknew($id)
	{
		$cek = $this->db->get_where('checklist', array('id_running' => $id, 'date' => date('Y-m-d')));
		$date = date('Y-m-d');
		if ($cek->num_rows() > 0) {
			$ceknew = $this->db->get_where('running_have', array('id_running' => $id))->result();

			foreach ($ceknew as $key) {
				$cek_a = $this->db->get_where('checklist', array('id_running' => $key->id_running, 'id_location' => $key->id_location, 'date' => date('Y-m-d')))->num_rows();
				if (empty($cek_a)) {
					$this->db->insert('checklist', array(					
						'id_running' => $key->id_running,
						'id_location' => $key->id_location,
						'date' => date('Y-m-d'),
						'cb' => 0
					));
				}
				
			}			
		}else{
			$get_loc = $this->db->get_where('running_have', array('id_running' => $id))->result();
			foreach ($get_loc as $data) {
				$this->db->insert('checklist', array(
					'id_running' => $id,
					'id_location' => $data->id_location,
					'date' => date('Y-m-d'),
					'cb' => 0
				));			
			}
		}

			$this->db->select('*, checklist.id as idcheck');
			$this->db->from('checklist');
			$this->db->join('location', 'checklist.id_location = location.id');
			$this->db->where('checklist.date', $date);
			$this->db->where('checklist.id_running', $id);
			$db = $this->db->get()->result();
			echo json_encode($db);
	}

	public function linewise($id=''){
		$date = date('Y-m-d');
		if (empty($id)) {
			$data['isi'] = '';
		}else{
			// $cek = $this->db->get_where('checklist', array('id_location' => $id, 'date' => $date));
			// if ($cek->num_rows() > 0) {				
			// 	$ceknew = $this->db->get_where('running_have', array('id_location' => $id))->result();

			// 	foreach ($ceknew as $key) {
			// 		$cek_a = $this->db->get_where('checklist', array('id_running' => $key->id_running, 'id_location' => $key->id_location, 'date' => date('Y-m-d')))->num_rows();
			// 		if (empty($cek_a)) {
			// 			$this->db->insert('checklist', array(					
			// 				'id_running' => $key->id_running,
			// 				'id_location' => $key->id_location,
			// 				'date' => date('Y-m-d'),
			// 				'cb' => 0
			// 			));
			// 		}
					
			// 	}			
			
			// }else{			
			// 	$get_project = $this->db->get_where('running_have', array('id_location' => $id))->result();
			// 	foreach ($get_project as $data) {
			// 		$this->db->insert('checklist', array(
			// 			'id_running' => $data->id_running,
			// 			'id_location' => $id,
			// 			'date' => $date,
			// 			'cb' => 0
			// 		));			
			// 	}
			// }

			$get_run = $this->db->get_where('running_have', array('id_location' => $id))->result();
			foreach ($get_run as $key) {
				$cek_empty = $this->db->get_where('checklist', array(
					'id_running' => $key->id_running,
					'id_location' => $id,
					'date' => $date
				))->num_rows();
				if (empty($cek_empty)) {
					$this->db->insert('checklist', array(
						'id_running' => $key->id_running,
						'id_location' => $id,
						'date' => $date,
						'cb' => 0
					));
				}
			}

			$this->db->select('*, checklist.id as idcheck');
			$this->db->from('checklist');
			$this->db->join('running', 'checklist.id_running = running.id');
			$this->db->where('checklist.date', $date);
			$this->db->where('checklist.id_location', $id);
			$db = $this->db->get()->result();
			$data['db']= $db;
			$data['textline'] = $this->db->get_where('location', array('id' => $id))->row();

		}

		$data['content'] = 'linewise';
		$data['location'] = $this->db->get('location')->result();
		$this->load->view('index', $data);
	}

}

/* End of file Check.php */
/* Location: ./application/controllers/Check.php */