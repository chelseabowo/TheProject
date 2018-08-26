<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('Login');
		$this->load->model('Mod_registrasi');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['role'] = $this->Mod_registrasi->tampil_role()->result();
		$this->load->view('Dashboard',$data);
	}

	public function pr_login()
	{
		$user = $this->input->post('in_user');
		$password = $this->input->post('in_password');
		$where = array(
			'user_id'       => $user,
			'user_password' => $password
			);
		$where2 = array(
			'user_id'	=> $user
			);
		$cek = $this->Login->cek_login("m_user",$where)->num_rows();
		$role = $this->Login->cek_role($where2)->row_array();
		if($cek > 0){
			$data_session = array(
				'user' => $user,
				'status' => "login"
			);
			if($role['m_role_id']=='1'){ //super admin
				$this->session->set_userdata($data_session);	
				redirect(base_url('1/C_dashboard/index'));
			}else if($role['m_role_id']=='2'){ //admin_sekolah
				if($role['is_verified']=='0' && $role['d_sekolah_id']=='0'){
					echo "<script>alert('UserID Anda Belum di Verifikasi,Mohon Hubungi CS')</script>";
					echo "<script>window.location=history.go(-1)</script>";
				}else if($role['is_verified']=='1' && $role['d_sekolah_id']=='0'){
					$this->session->set_userdata($data_session);
					redirect(base_url('2/C_starter/index'));
				}else if($role['d_sekolah_id']!='0'){
					$this->session->set_userdata($data_session);
					redirect(base_url('2/C_dashboard/index'));
				}else{
					redirect(base_url('Dashboard/index'));	
				}
			}else if($role['m_role_id']=='3'){ //kepala_sekolah
				if($role['d_sekolah_id']=='0' && $role['d_kelas_id']=='0'){
					$this->session->set_userdata($data_session);
					redirect(base_url('3/C_starter/index'));
				}else if($role['d_sekolah_id']!='0' && $role['is_verified']=='1'){
					$this->session->set_userdata($data_session);
					redirect(base_url('3/C_dashboard/index'));
				}else if($role['is_verified']=='0'){
					echo "<script>alert('UserID Anda Belum di Verifikasi,Mohon Hubungi Admin Sekolah')</script>";
					echo "<script>window.location=history.go(-1)</script>";
				}else{
					redirect(base_url('Dashboard/index'));	
				}
			}else if($role['m_role_id']=='4'){ //konselor
				if($role['d_sekolah_id']=='0' && $role['d_kelas_id']=='0'){
					$this->session->set_userdata($data_session);
					redirect(base_url('4/C_starter/index'));
				}else if($role['d_sekolah_id']!='0' && $role['is_verified']=='1'){
					$this->session->set_userdata($data_session);
					redirect(base_url('4/C_dashboard/index'));
				}else if($role['is_verified']=='0'){
					echo "<script>alert('UserID Anda Belum di Verifikasi,Mohon Hubungi Admin Sekolah')</script>";
					echo "<script>window.location=history.go(-1)</script>";
				}else{
					redirect(base_url('Dashboard/index'));	
				}
			}else if($role['m_role_id']=='5'){ //guru_bk
				if($role['d_sekolah_id']=='0' && $role['d_kelas_id']=='0'){
					$this->session->set_userdata($data_session);
					redirect(base_url('5/C_starter/index'));
				}else if($role['d_sekolah_id']!='0' && $role['is_verified']=='1'){
					$this->session->set_userdata($data_session);
					redirect(base_url('5/C_dashboard/index'));
				}else if($role['is_verified']=='0'){
					echo "<script>alert('UserID Anda Belum di Verifikasi,Mohon Hubungi Admin Sekolah')</script>";
					echo "<script>window.location=history.go(-1)</script>";
				}else{
					redirect(base_url('Dashboard/index'));	
				}
			}else if($role['m_role_id']=='6'){ //guru_mapel
				if($role['d_sekolah_id']=='0' && $role['d_kelas_id']=='0'){
					$this->session->set_userdata($data_session);
					redirect(base_url('6/C_starter/index'));
				}else if($role['d_sekolah_id']!='0' && $role['is_verified']=='1'){
					$this->session->set_userdata($data_session);
					redirect(base_url('6/C_dashboard/index'));
				}else if($role['is_verified']=='0'){
					echo "<script>alert('UserID Anda Belum di Verifikasi,Mohon Hubungi Admin Sekolah')</script>";
					echo "<script>window.location=history.go(-1)</script>";
				}else{
					redirect(base_url('Dashboard/index'));	
				}
			}else if($role['m_role_id']=='7'){ //wali_kelas
				if($role['d_sekolah_id']=='0' && $role['d_kelas_id']=='0'){
					$this->session->set_userdata($data_session);
					redirect(base_url('7/C_starter/index'));
				}else if($role['d_sekolah_id']!='0' && $role['d_kelas_id']!='0' && $role['is_verified']=='1'){
					$this->session->set_userdata($data_session);
					redirect(base_url('7/C_dashboard/index'));
				}else if($role['is_verified']=='0'){
					echo "<script>alert('UserID Anda Belum di Verifikasi,Mohon Hubungi Admin Sekolah')</script>";
					echo "<script>window.location=history.go(-1)</script>";
				}else{
					redirect(base_url('Dashboard/index'));	
				}
			}else if($role['m_role_id']=='8'){ //murid
				if($role['d_sekolah_id']=='0' && $role['d_kelas_id']=='0'){
					$this->session->set_userdata($data_session);
					redirect(base_url('8/C_starter/index'));
				}else if($role['d_sekolah_id']!='0' && $role['d_kelas_id']!='0' && $role['is_verified']=='1'){
					$this->session->set_userdata($data_session);
					redirect(base_url('8/C_dashboard/index'));
				}else if($role['is_verified']=='0'){
					echo "<script>alert('UserID Anda Belum di Verifikasi,Mohon Hubungi Admin Sekolah')</script>";
					echo "<script>window.location=history.go(-1)</script>";
				}else{
					redirect(base_url('Dashboard/index'));	
				}
			}else if($role['m_role_id']=='9'){ //wali_murid
				if($role['d_sekolah_id']=='0' && $role['d_kelas_id']=='0'){
					$this->session->set_userdata($data_session);
					redirect(base_url('9/C_starter/index'));
				}else if($role['d_sekolah_id']!='0' && $role['d_kelas_id']!='0' && $role['is_verified']=='1'){
					$this->session->set_userdata($data_session);
					redirect(base_url('9/C_dashboard/index'));
				}else if($role['is_verified']=='0'){
					echo "<script>alert('UserID Anda Belum di Verifikasi,Mohon Hubungi Admin Sekolah')</script>";
					echo "<script>window.location=history.go(-1)</script>";
				}else{
					redirect(base_url('Dashboard/index'));	
				}
			}else{
				redirect(base_url('Dashboard/index'));
			}
			
		}else{
			echo "<script>alert('periksa kembali user dan password anda')</script>";
			echo "<script>window.location=history.go(-1)</script>";
		}
		
	}

	public function pr_logout(){
		$this->session->sess_destroy();
		redirect(base_url('Dashboard'));
	}

	public function menu1()
	{
		$this->load->view('menu1');
	}
}
