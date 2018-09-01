<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelas extends CI_Model {


	function tampil_kelas($table,$where)
	{
		$query = "
			SELECT
			kl.d_kelas_id,
			kl.kelas_nama,
			kl.kelas_id
			FROM d_kelas kl
			LEFT JOIN d_user_role ur ON kl.d_sekolah_id = ur.d_sekolah_id
			LEFT JOIN m_user us ON ur.m_user_id = us.m_user_id
			WHERE us.user_id='$where[user_id]'
		";
		return $this->db->query($query);
	}

	function tambah_kelas($data,$table)
	{
		$this->db->insert($table, $data);
	}
	function hapus_kelas($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_kelas($table,$where)
	{
		return $this->db->get_where($where,$table);
	}

	function update_kelas($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}


}

/* End of file M_kelas.php */
/* Location: ./application/models/2/M_kelas.php */