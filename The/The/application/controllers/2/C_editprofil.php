<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_editprofil extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('2/M_profil');
		$this->load->model('2/M_sekolah');
		$this->load->model('2/M_kelas');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("dashboard"));
		}
	}

	public function index()
	{
		$user = $this->session->userdata('user');
		$where = array('user_id' => $user );
		$data['itsme'] = $this->M_profil->myprofil('m_user',$where)->row_array();
		// $data['kelas'] = $this->M_kelas->tampil_kelas('d_kelas',$where)->result();
		$data['content'] ="2/v_editprofil";
		$this->load->view('Home_admin',$data);
	}

	public function edit($user_id)
	{

		$cek = $this->M_profil->ambil_sekolah('where username='.$user_id);
		$data = array('user_name' => $cek[0]['user_name'] , 
					'sekolah_nama' => $cek[0]['sekolah_nama'] ,
					'user_email' => $cek[0]['user_email'] ,
			);

		$this->load->view('v_editprofil', $data);
		
	}
}