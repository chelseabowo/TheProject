<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_Model {

	function myprofil($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function myrole($table,$where){
		return $this->db->get_where($table,$where);	
	}
	
	function mydataprofile($where){
		//echo $where['user_id'];
		$query = "SELECT
		us.m_user_id,
		us.user_id,
		us.user_nama,
		us.user_password,
		us.user_tempat_lahir,
		us.user_tanggal_lahir,
		gn.m_gender_id,
		gn.gender_nama,
		us.user_alamat,
		us.user_email,
		us.user_no_hp,
		sk.d_sekolah_id,
		sk.sekolah_id,
		sk.sekolah_nama
		FROM m_user us
		LEFT JOIN d_user_role ur ON us.m_user_id = ur.m_user_id
		LEFT JOIN d_sekolah sk ON ur.d_sekolah_id = sk.d_sekolah_id
		LEFT JOIN m_gender gn ON us.m_gender_id = gn.m_gender_id
		where us.user_id = '$where[user_id]'
		";
		return $this->db->query($query);
	}
	
	function update_profil($table,$where,$data)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}

/* End of file M_profil.php */
/* Location: ./application/models/1/M_profil.php */