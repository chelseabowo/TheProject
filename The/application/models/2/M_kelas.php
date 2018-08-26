<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelas extends CI_Model {


	function tampil_kelas($table,$where)
	{
		$query = "
			SELECT
			kl.d_kelas_id,
			kl.kelas_nama
			FROM m_user us
			LEFT JOIN d_user_role ur ON us.m_user_id = ur.m_user_id
			LEFT JOIN d_kelas kl ON ur.d_sekolah_id = kl.d_sekolah_id
			WHERE us.user_id='$where[user_id]'
		";
		return $this->db->query($query);
	}

	function tambah_kelas($data,$table)
	{
		$this->db->insert($table, $data);
	}

}

/* End of file M_kelas.php */
/* Location: ./application/models/2/M_kelas.php */