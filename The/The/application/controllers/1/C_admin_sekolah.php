<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin_sekolah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('1/M_profil');
		$this->load->model('1/M_admin_sekolah');
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
		$data['a_s'] = $this->M_admin_sekolah->all_admin()->result();
		$data['content'] ="1/c1_admin_sekolah";
		$this->load->view('Home',$data);
	}

	public function verifikasi_admin_sekolah($d_user_role_id){
		$where = array('d_user_role_id' => $d_user_role_id );
		$this->M_admin_sekolah->verifikasi_admin_sekolah($where);
		redirect('1/C_admin_sekolah');
	}

	public function tambah_baru_admin()
	{
		$nip      = $this->input->post('in_userid');
		$nama     = $this->input->post('in_nama');
		$email    = $this->input->post('in_email');
		$password = $this->input->post('in_password');
		$isadmin  = 1;
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d h:i:sa');

		$data1 = array(
			'user_id'       => $nip,
			'user_nama'     => $nama, 
			'user_email'    => $email,
			'user_password' => $password,
			'is_admin'      => $isadmin,
			'created_date'  => $date,
			'is_active'     => '1'
		);
		$this->M_admin_sekolah->tambah_admin($data1,'m_user');
		redirect('1/C_admin_sekolah');
	}
	public function hapus_admin_sekolah($m_user_id){
		$where = array('m_user_id' => $m_user_id );
		$this->M_admin_sekolah->hapus_admin_sekolah($where);
		redirect('1/C_admin_sekolah');
	}
	function edit_admin_sekolah($m_user_id){
		$where = array('m_user_id' => $m_user_id);
		$data['m_user'] = $this->M_admin_sekolah->edit_admin_sekolah($where,'m_user')->result();
		
		$this->load->view('1/edit_data_admin_sekolah',$data);
	}
	public function update_admin_sekolah(){
		// $us = $this->session->userdata('user');
		// $where = array('user_id' => $us );
		// // $data['itsme'] = $this->M_profil->myprofil('m_user',$where)->row_array();
		// $updated_by = $this->M_profil->myprofil('m_user',$where)->row_array();		
		$m_user_id  	      = $this->input->post('in_m_user_id');
		$user_id = $this->input->post('in_user_id');
		$user_nama   = $this->input->post('in_user_nama');
		$user_password       = $this->input->post('in_user_password');
		$user_tempat_lahir      = $this->input->post('in_user_tempat_lahir');
		$user_tanggal_lahir     = $this->input->post('in_user_tanggal_lahir');
		$m_gender_id         = $this->input->post('in_m_gender_id');
		$user_alamat    = $this->input->post('in_user_alamat');
		$user_email  = $this->input->post('in_user_email');
		$user_no_hp   = $this->input->post('in_user_no_hp');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d h:i:sa');
	
		$data = array(
			
			// 'm_user_id'    => $m_user_id,
			'user_id'      => $user_id,
			'user_nama'  => $user_nama, 
			'user_password' => $user_password, 
			'user_tempat_lahir'   => $user_tempat_lahir, 
			'user_tanggal_lahir'       => $user_tanggal_lahir,
			'm_gender_id'  => $m_gender_id,
			'user_alamat'  => $user_alamat,
			'user_email'	=> $user_email,
			'user_no_hp' => $user_no_hp,
			'updated_date'    => $date  
		);
		$where = array (
			'm_user_id' => $m_user_id 
		);
		$this->M_admin_sekolah->update_admin_sekolah($where,$data,'m_user');
		redirect('1/C_admin_sekolah');
	}

}

/* End of file Admin_sekolah.php */
/* Location: ./application/controllers/1/Admin_sekolah.php */