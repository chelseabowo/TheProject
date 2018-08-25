<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_starter extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('2/M_profil');
		$this->load->model('2/M_sekolah');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("Dashboard"));
		}
	}

	public function index()
	{
		$user = $this->session->userdata('user');
		$where = array('user_id' => $user );
		$data['list_sekolah'] = $this->M_sekolah->tampil_sekolah()->result();
		$data['provinsi']     = $this->M_sekolah->tampil_provinsi()->result();
		$data['kota']         = $this->M_sekolah->tampil_kota()->result();
		$data['kecamatan']    = $this->M_sekolah->tampil_kecamatan()->result();
		$data['kelurahan']    = $this->M_sekolah->tampil_kelurahan()->result();
		$data['itsme'] = $this->M_profil->myprofil('m_user',$where)->row_array();
		$this->load->view('2/Starter',$data);	
	}

}

/* End of file C_starter.php */
/* Location: ./application/controllers/2/C_starter.php */