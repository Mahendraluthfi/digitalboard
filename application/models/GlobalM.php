<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GlobalM extends CI_Model {

	public function get_score_id($id)
		{
			$this->db->from('score');
			$this->db->join('request', 'request.id = score.id_request');
			$this->db->where('score.id_request', $id);
			$db = $this->db->get();
			return $db;
		}	

	public function get_request()
	{
		$this->db->select('*, request.id as id_request');
		$this->db->from('request');
		$this->db->join('score', 'request.id = score.id_request', 'left');
		$this->db->order_by('score.total', 'desc');
		$db = $this->db->get();
		return $db;
	}

	public function get_location($id)
	{
		
		$this->db->from('running_have');
		$this->db->join('location', 'location.id = running_have.id_location');
		$this->db->where('running_have.id_running', $id);
		$db = $this->db->get();
		return $db;	
	}
}

/* End of file GlobalM.php */
/* Location: ./application/models/GlobalM.php */