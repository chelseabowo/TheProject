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
//---------------------------------------------PROVINSI------------------------------------------------------------------
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
//---------------------------------------------------------------KOTA---------------------------------------------------------------------

	public function kota($m_provinsi_id)
	{
		$where1 = array('m_provinsi_id' => $m_provinsi_id );
		$m_provinsi_id= $this->uri->segment(4);
		$user = $this->session->userdata('user');
		$where = array('user_id' => $user);
		$data['itsme'] = $this->M_profil->myprofil('m_user',$where)->row_array();
		$data['kota'] = $this->M_daerah->view_kota('m_kota', $where1)->result();
		$data['m_provinsi_id']=$m_provinsi_id;
		$data['content'] ="1/b21_daerah_kota";
		$this->load->view('Home',$data);
	}
	public function tambah_kota()
	{
		// $us     = $this->session->userdata('user');
		// $where  = array('user_id' => $us );
		// $profil = $this->M_profil->myprofil('m_user',$where)->row_array();
		// $where2 = array('m_user_id' => $profil['m_user_id'] );
		// $role   = $this->M_profil->myrole('d_user_role',$where2)->row_array();

		$m_provinsi_id = $this->input->post('in_provinsi_id');
		$kota_nama   = $this->input->post('in_kota_nama');
		// $kelas_id     = $this->input->post('in_id_kelas');

		// date_default_timezone_set('Asia/Jakarta');
		// $date = date('Y-m-d h:i:sa');
		$data = array(
			'm_provinsi_id' => $m_provinsi_id,
			'kota_nama'   => $kota_nama
			// 'kelas_id'     => $kelas_id,
			
			// 'created_by'   => $profil['m_user_id'],
			// 'created_date' => $date
		);

		$this->M_daerah->tambah_kota($data,'M_kota');
		redirect(base_url('1/C_daerah/kota/'.$m_provinsi_id));
	}
	public function hapus_kota($m_kota_id)
	{
		$where = array('m_kota_id' => $m_kota_id );
	    $this->M_daerah->hapus_kota($where, 'M_kota');
	    $m_provinsi_id= $this->uri->segment(5);
		$a= $this->M_daerah->my_kota($where1,'M_kota')->row_array();
		redirect('1/C_daerah/kota/' . $a[$m_provinsi_id]);
	}
	public function edit_kota($m_kota_id)
	{
		$where = array('m_kota_id' => $m_kota_id );
		$data['edit'] = $this->M_daerah->edit_kota('M_kota', $where)->row_array();
		$this->load->view('1/edit_data_kota',$data);
	}

	public function update_kota()
	{
		$m_kota_id = $this->input->post('in_m_kota_id');
		$kota_nama = strtoupper($this->input->post('in_kota_nama'));

		$where = array('m_kota_id' => $m_kota_id );
		$data = array('kota_nama' => $kota_nama );
		$this->M_daerah->update_kota($where, $data, 'M_kota');
		redirect('1/C_daerah/index/');	
	}
// ---------------------------------------KECAMATAN--------------------------------------------------

	public function kecamatan($m_kota_id)
	{
		$where1 = array('m_kota_id' => $m_kota_id );

		$user = $this->session->userdata('user');
		$where = array('user_id' => $user);
		$data['itsme'] = $this->M_profil->myprofil('m_user',$where)->row_array();
		$data['kota'] = $this->M_daerah->view_kt('m_kota', $m_kota_id)->row_array();
		$data['kecamatan'] = $this->M_daerah->view_kecamatan('M_kecamatan', $where1)->result();
		$m_kota_id= $this->uri->segment(4);
		$data['m_kota_id']=$m_kota_id;
		$data['content'] ="1/b22_daerah_kecamatan";
		$this->load->view('Home',$data);
	}
	public function tambah_kecamatan()
	{
		// $us     = $this->session->userdata('user');
		// $where  = array('user_id' => $us );
		// $profil = $this->M_profil->myprofil('m_user',$where)->row_array();
		// $where2 = array('m_user_id' => $profil['m_user_id'] );
		// $role   = $this->M_profil->myrole('d_user_role',$where2)->row_array();

		$m_kota_id = $this->input->post('in_kota_id');
		$kecamatan_nama   = $this->input->post('in_kecamatan_nama');
		// $kelas_id     = $this->input->post('in_id_kelas');

		// date_default_timezone_set('Asia/Jakarta');
		// $date = date('Y-m-d h:i:sa');
		$data = array(
			'm_kota_id' => $m_kota_id,
			'kecamatan_nama'   => $kecamatan_nama
			// 'kelas_id'     => $kelas_id,
			
			// 'created_by'   => $profil['m_user_id'],
			// 'created_date' => $date
		);

		$this->M_daerah->tambah_kecamatan($data,'M_kecamatan');
		redirect(base_url('1/C_daerah/kecamatan/'.$m_kota_id));
	}
	public function hapus_kecamatan($m_kecamatan_id)
	{
		$where = array('m_kecamatan_id' => $m_kecamatan_id );
		$this->M_daerah->hapus_kecamatan($where, 'M_kecamatan');
		redirect('1/C_daerah/kota/' . $m_kota_id);
	}
	public function edit_kecamatan($m_kecamatan_id)
	{
		$where = array('m_kecamatan_id' => $m_kecamatan_id );
		$data['edit'] = $this->M_daerah->edit_kota('M_kecamatan', $where)->row_array();
		$this->load->view('1/edit_data_kecamatan',$data);
	}

	public function update_kecamatan()
	{
		$m_kecamatan_id = $this->input->post('in_m_kecamatan_id');
		$kecamatan_nama = strtoupper($this->input->post('in_kecamatan_nama'));

		$where = array('m_kecamatan_id' => $m_kecamatan_id );
		$data = array('kecamatan_nama' => $kecamatan_nama );
		$this->M_daerah->update_kota($where, $data, 'M_kecamatan');
		redirect('1/C_daerah/index/');	
	}
// ---------------------------------------KECAMATAN--------------------------------------------------
// ---------------------------------------KELURAHAN--------------------------------------------------
	public function kelurahan($m_kecamatan_id)
	{
		$where1 = array('m_kecamatan_id' => $m_kecamatan_id );

		$user = $this->session->userdata('user');
		$where = array('user_id' => $user);
		$data['itsme'] = $this->M_profil->myprofil('m_user',$where)->row_array();
		$data['kecamatan'] = $this->M_daerah->view_kc('m_kecamatan', $m_kecamatan_id)->row_array();
		$data['kelurahan'] = $this->M_daerah->view_kelurahan('M_kelurahan', $where1)->result();
		$m_kelurahan_id= $this->uri->segment(4);
		$data['m_kecamatan_id']=$m_kecamatan_id;
		$data['content'] ="1/b23_daerah_kelurahan";
		$this->load->view('Home',$data);
	}
	public function tambah_kelurahan()
	{
		// $us     = $this->session->userdata('user');
		// $where  = array('user_id' => $us );
		// $profil = $this->M_profil->myprofil('m_user',$where)->row_array();
		// $where2 = array('m_user_id' => $profil['m_user_id'] );
		// $role   = $this->M_profil->myrole('d_user_role',$where2)->row_array();

		$m_kecamatan_id = $this->input->post('in_kecamatan_id');
		$kelurahan_nama   = $this->input->post('in_kelurahan_nama');
		// $kelas_id     = $this->input->post('in_id_kelas');

		// date_default_timezone_set('Asia/Jakarta');
		// $date = date('Y-m-d h:i:sa');
		$data = array(
			'm_kecamatan_id' => $m_kecamatan_id,
			'kelurahan_nama'   => $kelurahan_nama
			// 'kelas_id'     => $kelas_id,
			
			// 'created_by'   => $profil['m_user_id'],
			// 'created_date' => $date
		);

		$this->M_daerah->tambah_kelurahan($data,'M_kelurahan');
		redirect(base_url('1/C_daerah/kelurahan/'.$m_kecamatan_id));
	}
	public function hapus_kelurahan($m_kelurahan_id)
	{
		$where = array('m_kelurahan_id' => $m_kelurahan_id );
		$this->M_daerah->hapus_kelurahan($where, 'M_kelurahan');
		redirect('1/C_daerah/kecamatan/' . $m_kecamatan_id);
	}
	public function edit_kelurahan($m_kelurahan_id)
	{
		$where = array('m_kelurahan_id' => $m_kelurahan_id );
		$data['edit'] = $this->M_daerah->edit_kecamatan('M_kelurahan', $where)->row_array();
		$this->load->view('1/edit_data_kelurahan',$data);
	}

	public function update_kelurahan()
	{
		$m_kelurahan_id = $this->input->post('in_m_kelurahan_id');
		$kelurahan_nama = strtoupper($this->input->post('in_kelurahan_nama'));

		$where = array('m_kelurahan_id' => $m_kelurahan_id );
		$data = array('kelurahan_nama' => $kelurahan_nama );
		$this->M_daerah->update_kecamatan($where, $data, 'M_kelurahan');
		redirect('1/C_daerah/index/');	
	}
}

/* End of file C_daerah.php */
/* Location: ./application/controllers/1/C_daerah.php */