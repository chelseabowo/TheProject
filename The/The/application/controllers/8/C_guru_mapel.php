<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_guru_mapel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('8/M_profil');
		$this->load->model('8/M_guru_mapel');
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
		$data['a_s'] = $this->M_guru_mapel->tampil_guru_mapel($data['itsme'])->result();
		$data['content'] ="8/B4_guru_mapel";
		$this->load->view('Home_murid',$data);
	}

	// public function verifikasi_guru_mapel($d_user_role_id){
	// 	$where = array('d_user_role_id' => $d_user_role_id );
	// 	$this->M_guru_mapel->verifikasi_guru_mapel($where);
	// 	redirect('7/C_guru_mapel');
	// }

	// public function tambah_baru_guru_mapel()
	// {
	// 	$nip      = $this->input->post('in_userid');
	// 	$nama     = $this->input->post('in_nama');
	// 	$email    = $this->input->post('in_email');
	// 	$password = $this->input->post('in_password');
	// 	$isguru_mapel  = 1;
	// 	date_default_timezone_set('Asia/Jakarta');
	// 	$date = date('Y-m-d h:i:sa');

	// 	$data1 = array(
	// 		'user_id'       => $nip,
	// 		'user_nama'     => $nama, 
	// 		'user_email'    => $email,
	// 		'user_password' => $password,
	// 		'is_guru_mapel'      => $isguru_mapel,
	// 		'created_date'  => $date,
	// 		'is_active'     => '1'
	// 	);
	// 	$this->M_guru_mapel->tambah_guru_mapel($data1,'m_user');
	// 	redirect('7/C_guru_mapel');
	// }
	// public function hapus_guru_mapel($m_user_id){
	// 	$where = array('m_user_id' => $m_user_id );
	// 	$this->M_guru_mapel->hapus_guru_mapel($where);
	// 	redirect('7/C_guru_mapel');
	// }
	// function edit_guru_mapel($m_user_id){
	// 	$where = array('m_user_id' => $m_user_id);
	// 	$data['m_user'] = $this->M_guru_mapel->edit_guru_mapel($where,'m_user')->result();
		
	// 	$this->load->view('7/edit_data_guru_mapel',$data);
	// }
	// public function update_guru_mapel(){
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
	// 	$this->M_guru_mapel->update_guru_mapel($where,$data,'m_user');
	// 	redirect('2/C_guru_mapel');
	// }

}

/* End of file Admin_sekolah.php */
/* Location: ./application/controllers/1/Admin_sekolah.php */