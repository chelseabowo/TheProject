<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kota extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('1/M_profil');
		$this->load->model('1/M_master_registrasi');
		$this->load->model('1/M_daerah');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("dashboard"));
		}
	}

	public function index()
	{
		$us                   = $this->session->userdata('user');
		$where                = array('user_id' => $us );
		$m_provinsi_id         = $this->uri->segment(4);
		$data['m_provinsi_id'] = $m_provinsi_id;
		$data['provinsi']      = $this->M_daerah->view_provinsi($m_provinsi_id)->row_array();
		$data['list_kota']   = $this->M_daerah->view_kota($m_provinsi_id)->result();
		$data['itsme']        = $this->M_profil->myprofil('m_user',$where)->row_array();
		$data['gender']       = $this->M_profil->call_gender()->result();
		$data['content']      = "1/b21_daerah_kota";
		$this->load->view('Home',$data);
	}
}