<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_profil extends CI_Controller {
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
		$data['profil'] = $this->M_profil->mydataprofile($where)->row_array();
		$data['content'] ="2/v_profil";
		$this->load->view('Home_admin',$data);
	}

	public function edit_profil()
	{
		$user = $this->session->userdata('user');
		$where = array('user_id' => $user );
		$data['itsme'] = $this->M_profil->myprofil('m_user',$where)->row_array();
		$data['profil'] = $this->M_profil->mydataprofile($where)->row_array();
		$data['content'] ="2/v_edit_profil";
		$this->load->view('Home_admin',$data);
	}

	public function edit_sekolah()
	{

	}

	public function edit_password()
	{

	}

}