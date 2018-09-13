<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kelas extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('1/M_profil');
		$this->load->model('1/M_master_registrasi');
		$this->load->model('1/M_kelas');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("dashboard"));
		}
	}

	public function index()
	{
		$us                   = $this->session->userdata('user');
		$where                = array('user_id' => $us );
		$d_sekolah_id         = $this->uri->segment(4);
		$data['d_sekolah_id'] = $d_sekolah_id;
		$data['sekolah']      = $this->M_kelas->tampil_sekolah($d_sekolah_id)->row_array();
		$data['list_kelas']   = $this->M_kelas->tampil_kelas($d_sekolah_id)->result();
		$data['itsme']        = $this->M_profil->myprofil('m_user',$where)->row_array();
		$data['gender']       = $this->M_profil->call_gender()->result();
		$data['content']      = "1/b11_kelas";
		$this->load->view('Home',$data);
	}

	public function tambah_kelas()
	{
		$us     = $this->session->userdata('user');
		$where  = array('user_id' => $us );
		$profil = $this->M_profil->myprofil('m_user',$where)->row_array();
		$where2 = array('m_user_id' => $profil['m_user_id'] );
		$role   = $this->M_profil->myrole('d_user_role',$where2)->row_array();

		$d_sekolah_id = $this->uri->segment(4);
		$kelas_nama   = $this->input->post('in_nama_kelas');
		$kelas_id     = $this->input->post('in_id_kelas');

		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d h:i:sa');
		$data = array(
			'kelas_nama'   => $kelas_nama,
			'kelas_id'     => $kelas_id,
			'd_sekolah_id' => $d_sekolah_id,
			'created_by'   => $profil['m_user_id'],
			'created_date' => $date
		);

		$this->M_kelas->tambah_kelas($data,'d_kelas');
		redirect(base_url('1/C_kelas/index/'.$d_sekolah_id));
	}

	public function signin_kepala_sekolah()
	{
		$d_sekolah_id = $this->input->post('in_d_sekolah_id');
		$user_id      = $this->input->post('in_user_id');
		
		$data1        = array('d_sekolah_id' => $d_sekolah_id);
		$data2        = array('user_id' => $user_id);

		$this->M_master_registrasi->signin_ks($data1,$data2);
		redirect(base_url('1/C_kelas/index/'.$data1['d_sekolah_id']));
	}

	public function signup_kepala_sekolah()
	{
		$d_sekolah_id = $this->input->post('in_d_sekolah_id');

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

		$data1 = array('d_sekolah_id' => $d_sekolah_id);
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
			'is_kepala_sekolah'  => '1',
			'created_date'       => $date,
			'is_active'          => '1'
		);
		$this->M_master_registrasi->signup_ks($data1,$data2);
		redirect(base_url('1/C_kelas/index/'.$data1['d_sekolah_id']));
	}

}

/* End of file C_kelas.php */
/* Location: ./application/controllers/1/C_kelas.php */