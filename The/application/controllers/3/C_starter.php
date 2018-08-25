<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_starter extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('3/M_profil');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("Dashboard"));
		}
	}

	public function index()
	{
		$user           = $this->session->userdata('user');
		$where          = array('user_id' => $user );
		$data['gender'] = $this->M_profil->call_gender()->result();
		$data['itsme']  = $this->M_profil->myprofil('m_user',$where)->row_array();
		$this->load->view('3/Starter',$data);	
	}

}

/* End of file C_starter.php */
/* Location: ./application/controllers/2/C_starter.php */