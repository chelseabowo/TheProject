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
		
		$user_nama = $this->input->post('in_user_nama');
		$user_tempat_lahir = $this->input->post('in_tempat_lahir');
		$user_tanggal_lahir = $this->input->post('in_tanggal_lahir');
		$user_gender = $this->input->post('in_gender');
		$user_alamat = $this->input->post('in_alamat');
		$user_email = $this->input->post('in_email');
		$user_no_hp = $this->input->post('in_no_hp');

		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d h:i:sa');
		$data = array(
			'user_nama' => $user_nama,
			'user_tempat_lahir' => $user_tempat_lahir,
			'user_tanggal_lahir' => $user_tanggal_lahir,
			'm_gender_id' => $user_gender,
			'user_alamat' => $user_alamat,
			'user_email' => $user_email,
			'user_no_hp' => $user_no_hp,
			'updated_date' => $date
		);
		$this->M_profil->update_profil('m_user',$where,$data);
		redirect('2/C_profil/');
	}

	public function edit_sekolah()
	{

	}

	public function edit_password()
	{

	}

}