<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mod_registrasi');
	}

	public function index()
	{
		
	}

	public function registrasi_baru_admin()
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
		$this->mod_registrasi->registrasi_admin($data1,'m_user');
		redirect('dashboard/index/open');
	}

	public function registrasi_baru_pengajar()
	{
		$role     = $this->input->post('in_role');
		$nip      = $this->input->post('in_userid');
		$nama     = $this->input->post('in_nama');
		$email    = $this->input->post('in_email');
		$password = $this->input->post('in_password');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d h:i:sa');
		if ($role=='3') {
			$data = array(
				'user_id'           => $nip,
				'user_nama'         => $nama, 
				'user_email'        => $email,
				'user_password'     => $password,
				'is_kepala_sekolah' => '1',
				'created_date'      => $date,
				'is_active'         => '1'
			);
			$this->mod_registrasi->registrasi_pengajar($role,$data,'m_user');
			redirect('dashboard/index/open');
		}else if ($role=='4') {
			$data = array(
				'user_id'       => $nip,
				'user_nama'     => $nama, 
				'user_email'    => $email,
				'user_password' => $password,
				'is_konselor'   => '1',
				'created_date'  => $date,
				'is_active'     => '1'
			);
			$this->mod_registrasi->registrasi_pengajar($role,$data,'m_user');
			redirect('dashboard/index/open');
		}else if($role=='5') {
			$data = array(
				'user_id'       => $nip,
				'user_nama'     => $nama, 
				'user_email'    => $email,
				'user_password' => $password,
				'is_guru_bk'    => '1',
				'created_date'  => $date,
				'is_active'     => '1'
			);
			$this->mod_registrasi->registrasi_pengajar($role,$data,'m_user');
			redirect('dashboard/index/open');
		}else if($role=='6') {
			$data = array(
				'user_id'       => $nip,
				'user_nama'     => $nama, 
				'user_email'    => $email,
				'user_password' => $password,
				'is_guru_mapel' => '1',
				'created_date'  => $date,
				'is_active'     => '1'
			);
			$this->mod_registrasi->registrasi_pengajar($role,$data,'m_user');
			redirect('dashboard/index/open');
		}else if ($role=='7') {
			$data = array(
				'user_id'       => $nip,
				'user_nama'     => $nama, 
				'user_email'    => $email,
				'user_password' => $password,
				'is_wali_kelas' => '1',
				'created_date'  => $date,
				'is_active'     => '1'
			);
			$this->mod_registrasi->registrasi_pengajar($role,$data,'m_user');
			redirect('dashboard/index/open');
		}else {
			redirect('dashboard/index/');
		}
	}

	public function registrasi_baru_murid()
	{
		$nis      = $this->input->post('in_userid');
		$nama     = $this->input->post('in_nama');
		$email    = $this->input->post('in_email');
		$password = $this->input->post('in_password');
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d h:i:sa');

		$data = array(
			'user_id'       => $nis,
			'user_nama'     => $nama, 
			'user_email'    => $email,
			'user_password' => $password,
			'is_murid'      => '1',
			'created_date'  => $date,
			'is_active'     => '1'
		);
		$this->mod_registrasi->registrasi_murid($data,'m_user');
		redirect('dashboard/index/open');
	}
}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */