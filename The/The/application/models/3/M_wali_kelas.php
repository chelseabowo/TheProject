<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_wali_kelas extends CI_Model {

	function tampil_wali_kelas($where){
		$query="Select DISTINCT 
		us.m_user_id,
		us.user_nama,
		us.user_alamat,
		us.user_no_hp,
		(CASE
			WHEN ur.is_verified='0' THEN 'NOT VERIFIED'
			WHEN ur.is_verified='1' THEN 'VERIFIED'
			ELSE ''
		END) AS status,
		(SELECT kelas_nama FROM d_kelas k
		LEFT JOIN d_user_role u ON k.d_kelas_id = u.d_kelas_id
		WHERE u.m_user_id = us.m_user_id
		) as kl
		From
		M_user us
		LEFT JOIN d_user_role ur ON us.m_user_id = ur.m_user_id
		LEFT JOIN d_sekolah kls ON ur.d_sekolah_id = kls.d_sekolah_id
		WHERE ur.m_role_id = '7' AND kls.d_sekolah_id = (
		Select
		skl.d_sekolah_id
		From
		M_user us
		LEFT JOIN d_user_role ur ON us.m_user_id = ur.m_user_id
		LEFT JOIN d_sekolah skl ON ur.d_sekolah_id= skl.d_sekolah_id
		WHERE us.m_user_id='$where[m_user_id]'
		)";
		return $this->db->query($query);
	}
}