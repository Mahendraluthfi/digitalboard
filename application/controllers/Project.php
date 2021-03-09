<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GlobalM');
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('login');
	    }
	}

	public function index()
	{
		$data['content'] = 'project';
		$this->load->view('index', $data);		
	}

	public function get_request()
	{
		$data = $this->GlobalM->get_request()->result();
		// $data = $this->db->get('request')->result();
		echo json_encode($data);
	}

	public function get_ongoing()
	{
		$data = $this->db->get('ongoing')->result();
		echo json_encode($data);
	}

	public function get_running()
	{
		$data = $this->db->get('running')->result();
		foreach ($data as $key => $value) {
			$value->location = $this->GlobalM->get_location($value->id)->result();
			$value->total_loc = $this->db->get_where('running_have', array('id_running' => $value->id))->num_rows();
		}
		echo json_encode($data);
	}

	public function get_npi()
	{
		$data = $this->db->get('npi')->result();
		echo json_encode($data);
	}

	public function add_request()
	{
		$this->db->insert('request', array(
			'projectname' => $this->input->post('projectname'),
			'department' => $this->input->post('department'),
			'category' => $this->input->post('category'),
			'remarks' => $this->input->post('remarks'),
		));

		echo json_encode(array('status' => TRUE));
	}

	public function edit_request()
	{
		$this->db->where('id', $this->input->post('id_request'));
		$this->db->update('request', array(
			'projectname' => $this->input->post('projectname_request'),
			'department' => $this->input->post('department_request'),
			'category' => $this->input->post('category_request'),
			'remarks' => $this->input->post('remarks_request'),
		));

		echo json_encode(array('status' => TRUE));
	}

	public function del_request()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('request');
		echo json_encode(array('status' => TRUE));
	}

	public function get_request_id($id)
	{
		$data = $this->db->get_where('request', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function add_ongoing()
	{
		$this->db->insert('ongoing', array(
			'projectname' => $this->input->post('projectname'),
			'champion' => $this->input->post('champion'),
			'finishdate' => $this->input->post('finishdate'),
			'remarks' => $this->input->post('remarks'),
		));

		echo json_encode(array('status' => TRUE));
	}

	public function edit_ongoing()
	{
		$this->db->where('id', $this->input->post('id_ongoing'));
		$this->db->update('ongoing', array(
			'projectname' => $this->input->post('projectname_ongoing'),
			'champion' => $this->input->post('champion_ongoing'),
			'finishdate' => $this->input->post('finishdate_ongoing'),
			'remarks' => $this->input->post('remarks_ongoing'),			
		));
			
		echo json_encode(array('status' => TRUE));
	}

	public function del_ongoing()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('ongoing');
		echo json_encode(array('status' => TRUE));
	}

	public function get_ongoing_id($id)
	{
		$data = $this->db->get_where('ongoing', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function add_running()
	{
		$this->db->insert('running', array(
			'projectname' => $this->input->post('projectname'),			
			'remarks' => $this->input->post('remarks'),
		));

		echo json_encode(array('status' => TRUE));
	}

	public function edit_running()
	{
		$this->db->where('id', $this->input->post('id_running'));
		$this->db->update('running', array(
			'projectname' => $this->input->post('projectname_running'),
			'units' => $this->input->post('units_running'),
			'locations' => $this->input->post('locations_running'),
			'remarks' => $this->input->post('remarks_running'),			
		));
			
		echo json_encode(array('status' => TRUE));
	}

	public function del_running()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('running');
		echo json_encode(array('status' => TRUE));
	}

	public function get_running_id($id)
	{
		$data = $this->db->get_where('running', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function add_npi()
	{
		$this->db->insert('npi', array(
			'product' => $this->input->post('product'),
			'style' => $this->input->post('style'),
			'pdra' => $this->input->post('pdra'),
			'provo' => $this->input->post('provo'),
			'integration' => $this->input->post('integration'),
			'pp' => $this->input->post('pp'),
			'pilot' => $this->input->post('pilot'),
			'psd' => $this->input->post('psd'),
			'remarks' => $this->input->post('remarks'),
		));

		echo json_encode(array('status' => TRUE));
	}

	public function edit_npi()
	{
		$this->db->where('id', $this->input->post('id_npi'));
		$this->db->update('npi', array(
			'product' => $this->input->post('product_npi'),
			'style' => $this->input->post('style_npi'),
			'pdra' => $this->input->post('pdra_npi'),
			'provo' => $this->input->post('provo_npi'),			
			'integration' => $this->input->post('integration_npi'),			
			'pp' => $this->input->post('pp_npi'),			
			'pilot' => $this->input->post('pilot_npi'),			
			'psd' => $this->input->post('psd_npi'),			
			'remarks' => $this->input->post('remarks_npi'),			
		));
			
		echo json_encode(array('status' => TRUE));
	}

	public function del_npi()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('npi');
		echo json_encode(array('status' => TRUE));
	}

	public function get_npi_id($id)
	{
		$data = $this->db->get_where('npi', array('id' => $id))->row();
		echo json_encode($data);
	}


	public function get_location($id)
	{
		$data = $this->db->query("SELECT *, running_have.id as idhave FROM running_have JOIN location ON running_have.id_location=location.id WHERE running_have.id_running ='$id'")->result();
		echo json_encode($data);
	}

	public function get_remaining_loc($id)
	{
		$data = $this->db->query("SELECT * FROM location WHERE NOT id IN (SELECT id_location FROM running_have WHERE id_running='$id')")->result();
		echo json_encode($data);
	}

	public function add_location()
	{
		$this->db->insert('running_have', array(
			'id_location' => $this->input->post('id_loc'),
			'id_running' => $this->input->post('id_running'),
		));

		echo json_decode($this->input->post('id_running'));
	}

	public function edit_location()
	{
		$this->db->where('id', $this->input->post('id_loc_edit'));
		$this->db->update('locations', array(
			'location' => $this->input->post('location_edit'),			
		));

		echo json_decode($this->input->post('id_running_edit'));
	}

	public function del_location()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('running_have');
		echo json_encode(array('status' => TRUE));
	}

	public function get_location_id($id)
	{
		$data = $this->db->get_where('locations', array('id' => $id))->row();
		// $data = $this->db->get('locations');
		echo json_encode($data);
	}

	public function get_score()
	{
		$cek = $this->db->get_where('score', array('id_request' => $this->input->post('id')))->num_rows();

		if ($cek > 0) {
			$data = $this->GlobalM->get_score_id($this->input->post('id'))->row();
		}else{
			$this->db->insert('score', array(
				'id_request' => $this->input->post('id')
			));
			$data = $this->GlobalM->get_score_id($this->input->post('id'))->row();
		}

		echo json_encode($data);
	}

	public function save_score()
	{
		$total = $this->input->post('safety')+$this->input->post('quality')+$this->input->post('delivery')+$this->input->post('cost')+$this->input->post('morale')+$this->input->post('roi')+$this->input->post('delivery_time')+$this->input->post('urgency');
		$this->db->where('id_request', $this->input->post('id_score'));
		$this->db->update('score', array(
			'safety' => $this->input->post('safety'),
            'quality' => $this->input->post('quality'),
            'delivery' => $this->input->post('delivery'),
            'cost' => $this->input->post('cost'),
            'morale' => $this->input->post('morale'),
            'roi' => $this->input->post('roi'),
            'delivery_time' => $this->input->post('delivery_time'),
            'urgency' => $this->input->post('urgency'),
            'total' => $total,
		));
		redirect('project','refresh');
	}

	public function table_location()
	{
		$data = $this->db->get('location')->result();
		echo json_encode($data);
	}

	public function tambahlokasi()
	{
		$this->db->insert('location', array(
			'location' => $this->input->post('location')
		));

		echo json_encode(true);
	}

	public function editlokasi()
	{
		$this->db->where('id', $this->input->post('idlokasi'));
		$this->db->update('location', array(
			'location' => $this->input->post('lokasiedit')
		));

		echo json_encode(true);
	}

	public function hapuslokasi($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('location');

		echo json_encode(true);
	}

	public function getlokasi($id)
	{
		$data = $this->db->get_where('location', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function insertloop()
	{
		for ($i=1; $i < 63 ; $i++) { 
			$this->db->insert('location', array(
				'location' => 'L'.$i
			));
		}
	}

	public function save_smv()
	{
		$smv_prev = $this->input->post('smv_prev');
		$smv_reduc = $this->input->post('smv_reduc');
		$smv_final = $smv_prev - $smv_reduc;
		$percentage = ($smv_reduc/$smv_prev) * 100;

		$this->db->insert('smv', array(
			'styleno' => $this->input->post('styleno'),
			'smv_prev' => $smv_prev,
			'smv_reduc' => $smv_reduc,
			'smv_final' => $smv_final,
			'percentage' => number_format($percentage,2),
			'customer' => $this->input->post('customer'),
			'psd' => $this->input->post('psd'),
			'running' => $this->input->post('running'),
			'improvement' => $this->input->post('improvement'),
		));
		echo json_encode(true);
	}

	public function edit_smv($id)
	{
		$smv_prev = $this->input->post('smv_prev');
		$smv_reduc = $this->input->post('smv_reduc');
		$smv_final = $smv_prev - $smv_reduc;
		$percentage = ($smv_reduc/$smv_prev) * 100;

		$this->db->where('id', $id);
		$this->db->update('smv', array(
			'styleno' => $this->input->post('styleno'),
			'smv_prev' => $smv_prev,
			'smv_reduc' => $smv_reduc,
			'smv_final' => $smv_final,
			'percentage' => number_format($percentage,2),
			'customer' => $this->input->post('customer'),
			'psd' => $this->input->post('psd'),
			'running' => $this->input->post('running'),
			'improvement' => $this->input->post('improvement'),
		));
		echo json_encode(true);
	}

	public function get_smv()
	{
		$data = $this->db->get('smv')->result();
		echo json_encode($data);
	}

	public function get_smv_id($id)
	{
		$data = $this->db->get_where('smv', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function del_smv($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('smv');
		echo json_encode(true);
	}
}

/* End of file Project.php */
/* Location: ./application/controllers/Project.php */