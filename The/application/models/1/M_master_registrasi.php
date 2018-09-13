<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_master_registrasi extends CI_Model {

	function signin_ks($data1,$data2)
	{
		$b = $this->db->get_where('m_user',$data2)->row_array();
		$role = array(
			'd_sekolah_id' => $data1['d_sekolah_id'],
			'is_verified'  => '1'
		);
		$this->db->where(array('m_user_id' => $b['m_user_id']));
		$this->db->update('d_user_role', $role);
	}

	function signup_ks($data1,$data2)
	{
		$this->db->insert('m_user', $data2);
		$last_id = $this->db->insert_id();
		
		$role = array(
			'm_user_id'    => $last_id, 
			'm_role_id'    => '3',
			'd_sekolah_id' => $data1['d_sekolah_id'],
			'is_verified'  => '1'
		);
		$this->db->insert('d_user_role', $role);
	}

	function signin_wk($data1,$data2)
	{
		$a = $this->db->get_where('d_kelas',$data1)->row_array();
		$b = $this->db->get_where('m_user',$data2)->row_array();
		$role = array(
			'd_sekolah_id' => $a['d_sekolah_id'],
			'd_kelas_id'   => $a['d_kelas_id'],
			'is_verified'  => '1'
		);
		$this->db->where(array('m_user_id' => $b['m_user_id']));
		$this->db->update('d_user_role', $role);
	}

	function signup_wk($data1,$data2)
	{
		$this->db->insert('m_user', $data2);
		$last_id = $this->db->insert_id();
		$a = $this->db->get_where('d_kelas',$data1)->row_array();
		$role = array(
			'm_user_id'    => $last_id, 
			'm_role_id'    => '7',
			'd_sekolah_id' => $a['d_sekolah_id'],
			'd_kelas_id'   => $a['d_kelas_id'],
			'is_verified'  => '1'
		);
		$this->db->insert('d_user_role', $role);
	}

	function tambah_murid($data1,$data2)
	{
		$this->db->insert('m_user', $data2);
		$last_id = $this->db->insert_id();
		$a = $this->db->get_where('d_kelas',$data1)->row_array();
		$role = array(
			'm_user_id'    => $last_id, 
			'm_role_id'    => '8',
			'd_sekolah_id' => $a['d_sekolah_id'],
			'd_kelas_id'   => $a['d_kelas_id'],
			'is_verified'  => '1'
		);
		$this->db->insert('d_user_role', $role);
	}

	function hapus_siswa($where)
	{
		$this->db->where($where);
		$this->db->update('d_user_role', array('d_sekolah_id' => '','d_kelas_id' => ''));
	}

	function update_detail_profil($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

}

/* End of file M_master_registrasi.php */
/* Location: ./application/models/1/M_master_registrasi.php */