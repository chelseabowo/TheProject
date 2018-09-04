<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kepala_sekolah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('5/M_profil');
		$this->load->model('5/M_kepala_sekolah');
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
		$data['a_s'] = $this->M_kepala_sekolah->tampil_kepala_sekolah($data['itsme'])->result();
		$data['content'] ="5/B1_kepala_sekolah";
		$this->load->view('Home_gurubk',$data);
	}

	// public function verifikasi_kepala_sekolah($d_user_role_id){
	// 	$where = array('d_user_role_id' => $d_user_role_id );
	// 	$this->M_kepala_sekolah->verifikasi_kepala_sekolah($where);
	// 	redirect('3/C_kepala_sekolah');
	// }

	// public function tambah_baru_kepala_sekolah()
	// {
	// 	$nip      = $this->input->post('in_userid');
	// 	$nama     = $this->input->post('in_nama');
	// 	$email    = $this->input->post('in_email');
	// 	$password = $this->input->post('in_password');
	// 	$iskepalasekolah  = '1';
	// 	date_default_timezone_set('Asia/Jakarta');
	// 	$date = date('Y-m-d h:i:sa');

	// 	$data1 = array(
	// 		'user_id'           => $nip,
	// 		'user_nama'         => $nama, 
	// 		'user_email'        => $email,
	// 		'user_password'     => $password,
	// 		'is_kepala_sekolah' => $iskepalasekolah,
	// 		'created_date'      => $date,
	// 		'is_active'         => '1'
	// 	);
	// 	$this->M_kepala_sekolah->tambah_kepala_sekolah($data1,'m_user');
	// 	redirect('3/C_kepala_sekolah');
	// }
	// public function hapus_kepala_sekolah($m_user_id){
	// 	$where = array('m_user_id' => $m_user_id );
	// 	$this->M_kepala_sekolah->hapus_kepala_sekolah($where);
	// 	redirect('3/C_kepala_sekolah');
	// }
	// function edit_kepala_sekolah($m_user_id){
	// 	$where = array('m_user_id' => $m_user_id);
	// 	$data['m_user'] = $this->M_kepala_sekolah->edit_kepala_sekolah($where,'m_user')->result();
		
	// 	$this->load->view('3/edit_kepala_sekolah',$data);
	// }
	// public function update_kepala_sekolah(){
	// 	// $us = $this->session->userdata('user');
	// 	// $where = array('user_id' => $us );
	// 	// // $data['itsme'] = $this->M_profil->myprofil('m_user',$where)->row_array();
	// 	// $updated_by = $this->M_profil->myprofil('m_user',$where)->row_array();		
	// 	$m_user_id  	      = $this->input->post('in_m_user_id');
	// 	$user_id = $this->input->post('in_user_id');
	// 	$user_nama   = $this->input->post('in_user_nama');
	// 	$user_password       = $this->input->post('in_user_password');
	// 	$user_tempat_lahir      = $this->input->post('in_user_tempat_lahir');
	// 	$user_tanggal_lahir     = $this->input->post('in_user_tanggal_lahir');
	// 	$m_gender_id         = $this->input->post('in_m_gender_id');
	// 	$user_alamat    = $this->input->post('in_user_alamat');
	// 	$user_email  = $this->input->post('in_user_email');
	// 	$user_no_hp   = $this->input->post('in_user_no_hp');
	// 	date_default_timezone_set('Asia/Jakarta');
	// 	$date = date('Y-m-d h:i:sa');
	
	// 	$data = array(
			
	// 		// 'm_user_id'    => $m_user_id,
	// 		'user_id'      => $user_id,
	// 		'user_nama'  => $user_nama, 
	// 		'user_password' => $user_password, 
	// 		'user_tempat_lahir'   => $user_tempat_lahir, 
	// 		'user_tanggal_lahir'       => $user_tanggal_lahir,
	// 		'm_gender_id'  => $m_gender_id,
	// 		'user_alamat'  => $user_alamat,
	// 		'user_email'	=> $user_email,
	// 		'user_no_hp' => $user_no_hp,
	// 		'updated_date'    => $date  
	// 	);
	// 	$where = array (
	// 		'm_user_id' => $m_user_id 
	// 	);
	// 	$this->M_kepala_sekolah->update_kepala_sekolah($where,$data,'m_user');
	// 	redirect('3/C_kepala_sekolah');
	// }

}

/* End of file Admin_sekolah.php */
/* Location: ./application/controllers/1/Admin_sekolah.php */