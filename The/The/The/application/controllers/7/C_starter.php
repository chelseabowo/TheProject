<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_starter extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('7/M_profil');
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
		$this->load->view('7/Starter',$data);
	}

	public function update_registrasi()
	{
		$user           = $this->session->userdata('user');
		$data1 = array(
			'sekolah_id' => $this->input->post('in_id_sekolah')
		);
		$data2 = array(
			'user_tempat_lahir'  => $this->input->post('in_tempat_lahir') ,
			'user_tanggal_lahir' => $this->input->post('in_tanggal_lahir') , 
			'm_gender_id'        => $this->input->post('in_gender'),
			'user_alamat'        => $this->input->post('in_alamat') ,
			'user_no_hp'         => $this->input->post('in_no_hp')
		);
		$this->M_profil->update_reg($user,$data1,$data2);
		redirect(base_url('Dashboard/index/notif'));
	}

}

/* End of file C_starter.php */
/* Location: ./application/controllers/2/C_starter.php */