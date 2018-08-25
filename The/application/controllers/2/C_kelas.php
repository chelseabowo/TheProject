<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kelas extends CI_Controller {
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
		$data['kelas'] = $this->M_kelas->tampil_kelas('d_kelas',$where)->result();
		$data['content'] ="2/b2_kelas";
		$this->load->view('Home_admin',$data);
	}

	public function tambah_kelas()
	{
		$us = $this->session->userdata('user');
		$where = array('user_id' => $us );
		$profil = $this->M_profil->myprofil('m_user',$where)->row_array();
		$where2 = array('m_user_id' => $profil['m_user_id'] );
		$role = $this->M_profil->myrole('d_user_role',$where2)->row_array();

		$kelas_nama = $this->input->post('in_nama_kelas');
		$kelas_id   = $this->input->post('in_id_kelas');

		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d h:i:sa');
		$data = array(
			'kelas_nama'   => $kelas_nama,
			'kelas_id'     => $kelas_id,
			'd_sekolah_id' => $role['d_sekolah_id'],
			'created_by'   => $profil['m_user_id'],
			'created_date' => $date
		);

		$this->M_kelas->tambah_kelas($data,'d_kelas');
		redirect('2/C_kelas/index');
		
	}

}

/* End of file C_kelas.php */
/* Location: ./application/controllers/2/C_kelas.php */