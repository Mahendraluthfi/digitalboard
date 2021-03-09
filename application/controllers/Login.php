<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
 	    if($this->auth->is_logged_in() == false){          
        	$this->load->view('login');
        }else{
            redirect('welcome','refresh');
        }		
	}	

	public function submit()
	{
		$username = htmlspecialchars($this->input->post('username'));
		$password = htmlspecialchars($this->input->post('password'));

		$cek = $this->db->get_where('users', array('username' => $username));

		if ($cek->num_rows() > 0) {
			$get = $cek->row();
			if (password_verify($password, $get->password)) {
				$array = array(
					'username' => $get->username,
					'password' => $get->password,
				);
				
				$this->session->set_userdata( $array );

				redirect('login','refresh');
			}else{
				$this->session->set_flashdata('msg', '
					<div class="alert alert-danger text-center">Password is wrong !
					</div>
					');
			}
		}else{
			$this->session->set_flashdata('msg', '
				<div class="alert alert-danger text-center">Username not found !
				</div>
				');
		}
		redirect('login','refresh');
	}

	public function create()
	{
		$options = [
		    'cost' => 10,
		];
		$username = 'admin';
		$password = password_hash('admin', PASSWORD_DEFAULT, $options);

		$this->db->insert('users', array(
			'username' => $username,
			'password' => $password,
			'level' => 'ADMIN',
		));

		redirect('login','refresh');
	}

	public function logout()
	{
		session_destroy();
		redirect('login','refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */