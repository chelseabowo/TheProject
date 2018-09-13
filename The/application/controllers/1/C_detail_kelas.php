<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_detail_kelas extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('1/M_profil');
		$this->load->model('1/M_master_registrasi');
		$this->load->model('1/M_detail_siswa');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("dashboard"));
		}
	}

	public function index()
	{
		$us                 = $this->session->userdata('user');
		$where              = array('user_id' => $us );
		$d_kelas_id         = $this->uri->segment(4);
		$data['d_kelas_id'] = $d_kelas_id;
		$data['list_siswa'] = $this->M_detail_siswa->tampil_siswa($d_kelas_id)->result();
		$data['wk']         = $this->M_detail_siswa->tampil_wali_kelas($d_kelas_id)->row_array();
		$data['itsme']      = $this->M_profil->myprofil('m_user',$where)->row_array();
		$data['gender']     = $this->M_profil->call_gender()->result();
		$data['content']    = "1/b12_detail_kelas";
		$this->load->view('home',$data);
	}

	public function tampil_detail_siswa()
	{
		$us = $this->session->userdata('user');
		$where = array('user_id' => $us );
		$data['itsme'] = $this->M_profil->myprofil('m_user',$where)->row_array();
		$m_user_id     = $this->uri->segment(4);
		$data['murid'] = $this->M_detail_siswa->detail_siswa('m_user',$m_user_id)->row_array();
		$this->load->view('1/detail_siswa',$data);
	}

	public function tambah_baru_murid()
	{
		$d_kelas_id = $this->input->post('in_d_kelas_id');

		$user_nama          = $this->input->post('in_user_nama');
		$user_id            = $this->input->post('in_user_id');
		$user_password      = $this->input->post('in_user_password');
		$user_tempat_lahir  = $this->input->post('in_user_tempat_lahir');
		$user_tanggal_lahir = $this->input->post('in_user_tanggal_lahir');
		$m_gender_id        = $this->input->post('in_m_gender_id');
		$user_alamat        = $this->input->post('in_user_alamat');
		$user_email         = $this->input->post('in_user_email');
		$user_no_hp         = $this->input->post('in_user_no_hp');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d h:i:sa');

		$data1 = array('d_kelas_id' => $d_kelas_id);
		$data2 = array(
			'user_id'            => $user_id,
			'user_nama'          => $user_nama, 
			'user_password'      => $user_password, 
			'user_tempat_lahir'  => $user_tempat_lahir, 
			'user_tanggal_lahir' => $user_tanggal_lahir,
			'm_gender_id'        => $m_gender_id,
			'user_alamat'        => $user_alamat,
			'user_email'         => $user_email,
			'user_no_hp'         => $user_no_hp,
			'is_murid'           => '1',
			'created_date'       => $date,
			'is_active'          => '1'
		);
		$this->M_master_registrasi->tambah_murid($data1,$data2);
		redirect(base_url('1/C_detail_kelas/index/'.$data1['d_kelas_id']));
	}

	public function signin_wali_kelas()
	{
		$d_kelas_id = $this->input->post('in_d_kelas_id');
		$user_id    = $this->input->post('in_user_id');

		$data1 = array('d_kelas_id' => $d_kelas_id);
		$data2 = array('user_id' => $user_id);

		$this->M_master_registrasi->signin_wk($data1,$data2);
		redirect(base_url('1/C_detail_kelas/index/'.$data1['d_kelas_id']));
	}

	public function tambah_baru_wali_kelas()
	{
		$d_kelas_id = $this->input->post('in_d_kelas_id');

		$user_nama          = $this->input->post('in_user_nama');
		$user_id            = $this->input->post('in_user_id');
		$user_password      = $this->input->post('in_user_password');
		$user_tempat_lahir  = $this->input->post('in_user_tempat_lahir');
		$user_tanggal_lahir = $this->input->post('in_user_tanggal_lahir');
		$m_gender_id        = $this->input->post('in_m_gender_id');
		$user_alamat        = $this->input->post('in_user_alamat');
		$user_email         = $this->input->post('in_user_email');
		$user_no_hp         = $this->input->post('in_user_no_hp');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d h:i:sa');

		$data1 = array('d_kelas_id' => $d_kelas_id);
		$data2 = array(
			'user_id'            => $user_id,
			'user_nama'          => $user_nama, 
			'user_password'      => $user_password, 
			'user_tempat_lahir'  => $user_tempat_lahir, 
			'user_tanggal_lahir' => $user_tanggal_lahir,
			'm_gender_id'        => $m_gender_id,
			'user_alamat'        => $user_alamat,
			'user_email'         => $user_email,
			'user_no_hp'         => $user_no_hp,
			'is_wali_kelas'      => '1',
			'created_date'       => $date,
			'is_active'          => '1'
		);
		$this->M_master_registrasi->signup_wk($data1,$data2);
		redirect(base_url('1/C_detail_kelas/index/'.$data1['d_kelas_id']));
	}

	public function edit_detail_siswa()
	{
		$us = $this->session->userdata('user');
		$where = array('user_id' => $us );
		$data['itsme'] = $this->M_profil->myprofil('m_user',$where)->row_array();
		$m_user_id     = $this->uri->segment(4);
		$data['murid'] = $this->M_detail_siswa->detail_siswa('m_user',$m_user_id)->row_array();
		$this->load->view('1/detail_siswa_edit',$data);
	}

	public function hapus_siswa($m_user_id)
	{
		$where = array('m_user_id' => $m_user_id );
		$data = $this->M_detail_siswa->info_siswa($where)->row_array();
		$this->M_master_registrasi->hapus_siswa($where);
		redirect(base_url('1/C_detail_kelas/index/'.$data['d_kelas_id']));
	}

	public function edit_detail_profil()
	{
		// $us = $this->session->userdata('user');
		// $where = array('user_id' => $us );
		// // $data['itsme'] = $this->M_profil->myprofil('m_user',$where)->row_array();
		// $updated_by = $this->M_profil->myprofil('m_user',$where)->row_array();		
		$m_user_id          = $this->input->post('in_m_user_id');
		$user_id            = $this->input->post('in_user_id');
		$user_nama          = $this->input->post('in_user_nama');
		$user_password      = $this->input->post('in_user_password');
		$user_tempat_lahir  = $this->input->post('in_user_tempat_lahir');
		$user_tanggal_lahir = $this->input->post('in_user_tanggal_lahir');
		$m_gender_id        = $this->input->post('in_m_gender_id');
		$user_alamat        = $this->input->post('in_user_alamat');
		$user_email         = $this->input->post('in_user_email');
		$user_no_hp         = $this->input->post('in_user_no_hp');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d h:i:sa');
	
		$data = array(
			// 'm_user_id'    => $m_user_id,
			'user_id'            => $user_id,
			'user_nama'          => $user_nama, 
			'user_password'      => $user_password, 
			'user_tempat_lahir'  => $user_tempat_lahir, 
			'user_tanggal_lahir' => $user_tanggal_lahir,
			'm_gender_id'        => $m_gender_id,
			'user_alamat'        => $user_alamat,
			'user_email'         => $user_email,
			'user_no_hp'         => $user_no_hp,
			'updated_date'       => $date  
		);
		$where = array (
			'm_user_id' => $m_user_id 
		);
		$where = array('m_user_id' => $m_user_id );
		$data2 = $this->M_detail_siswa->info_siswa($where)->row_array();
		$this->M_master_registrasi->update_detail_profil($where,$data,'m_user');
		redirect(base_url('1/C_detail_kelas/index/'.$data2['d_kelas_id']));
	}
}

/* End of file C_detail_kelas.php */
/* Location: ./application/controllers/1/C_detail_kelas.php */