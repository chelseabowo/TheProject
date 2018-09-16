<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_daerah extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('1/M_profil');
		$this->load->model('1/M_daerah');
		$this->load->helper('url');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("Dashboard"));
		}
	}

	public function index()
	{
		$user = $this->session->userdata('user');
		$where = array('user_id' => $user);
		$data['itsme'] = $this->M_profil->myprofil('m_user',$where)->row_array();
		$data['provinsi'] = $this->M_daerah->view_provinsi()->result();
		$data['content'] ="1/b2_daerah_provinsi";
		$this->load->view('Home',$data);	
	}

	public function tambah_provinsi()
	{
		$provinsi_nama = strtoupper($this->input->post('in_provinsi_nama'));
		$data = array(
			'provinsi_nama' => $provinsi_nama
		);
		$this->M_daerah->tambah_provinsi($data,'m_provinsi');
		redirect(base_url('1/C_daerah/index/'));
	}

	public function hapus_provinsi($m_provinsi_id)
	{
		$where = array('m_provinsi_id' => $m_provinsi_id );
		$this->M_daerah->hapus_provinsi($where, 'm_provinsi');
		redirect('1/C_daerah/index/');
	}

	public function edit_provinsi($m_provinsi_id)
	{
		$where = array('m_provinsi_id' => $m_provinsi_id );
		$data['edit'] = $this->M_daerah->edit_provinsi('m_provinsi', $where)->row_array();
		$this->load->view('1/edit_data_provinsi',$data);
	}

	public function update_provinsi()
	{
		$m_provinsi_id = $this->input->post('in_m_provinsi_id');
		$provinsi_nama = strtoupper($this->input->post('in_provinsi_nama'));

		$where = array('m_provinsi_id' => $m_provinsi_id );
		$data = array('provinsi_nama' => $provinsi_nama );
		$this->M_daerah->update_provinsi($where, $data, 'm_provinsi');
		redirect('1/C_daerah/index/');	
	}

	public function kota($m_provinsi_id)
	{
		$where1 = array('m_provinsi_id' => $m_provinsi_id );

		$user = $this->session->userdata('user');
		$where = array('user_id' => $user);
		$data['itsme'] = $this->M_profil->myprofil('m_user',$where)->row_array();
		$data['kota'] = $this->M_daerah->view_kota('m_kota', $where1)->result();
		$data['content'] ="1/b21_daerah_kota";
		$this->load->view('Home',$data);
	}



	public function kecamatan($m_kota_id)
	{
		$where1 = array('m_kota_id' => $m_kota_id );
		$user = $this->session->userdata('user');
		$where = array('user_id' => $user);
		$data['itsme'] = $this->M_profil->myprofil('m_user',$where)->row_array();
		$data['kota'] = $this->M_daerah->view_kt('m_kota', $m_kota_id)->row_array();
		$data['kecamatan'] = $this->M_daerah->view_kecamatan('m_kecamatan', $where1)->result();
		$data['content'] ="1/b22_daerah_kecamatan";
		$this->load->view('Home',$data);
	}

}

/* End of file C_daerah.php */
/* Location: ./application/controllers/1/C_daerah.php */