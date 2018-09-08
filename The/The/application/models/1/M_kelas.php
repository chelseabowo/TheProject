<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelas extends CI_Model {

	function tampil_kelas($d_sekolah_id)
	{
		$query = "
		SELECT 
		sk.d_sekolah_id,
		sk.sekolah_id,
		kl.* 
		FROM d_kelas kl
		LEFT JOIN d_sekolah sk ON kl.d_sekolah_id =  sk.d_sekolah_id
		WHERE kl.d_sekolah_id = $d_sekolah_id
		";
		return $this->db->query($query);
	}

	function tambah_kelas($data,$table)
	{
		$this->db->insert($table, $data);
	}	

}

/* End of file M_kelas.php */
/* Location: ./application/models/1/M_kelas.php */