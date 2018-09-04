<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_murid extends CI_Model {

	function all_admin(){
		$query="SELECT
		url.m_user_id,
		url.d_user_role_id,
		us.user_nama,
		us.user_alamat,
		us.user_no_hp,
		us.user_id,
		us.user_password,
		rl.role_nama,
		sk.sekolah_nama,
		(CASE
			WHEN url.is_verified='0' THEN 'NOT VERIFIED'
			WHEN url.is_verified='1' THEN 'VERIFIED'
			ELSE ''
		END) AS status
		FROM d_user_role url 
		LEFT JOIN m_user us ON url.m_user_id = us.m_user_id 
		LEFT JOIN m_role rl ON url.m_role_id = rl.m_role_id
		LEFT JOIN d_sekolah sk ON url.d_sekolah_id = sk.d_sekolah_id
		WHERE us.m_user_id !='1' and us.is_murid='1'
		";
		return $this->db->query($query);
	}

	function tampil_murid($where){
		$query="SELECT 
usr.user_nama,
usr.user_alamat,
usr.user_no_hp,
kls.kelas_nama
FROM d_user_role dus
LEFT JOIN m_user usr ON dus.m_user_id = usr.m_user_id
LEFT JOIN d_kelas kls ON dus.d_kelas_id = kls.d_kelas_id
WHERE dus.m_role_id='8' AND dus.d_kelas_id =
(SELECT
kl.d_kelas_id
FROM d_kelas kl
LEFT JOIN d_user_role ur ON kl.d_kelas_id = ur.d_kelas_id
LEFT JOIN m_user us ON ur.m_user_id = us.m_user_id
LEFT JOIN d_family fm ON us.m_user_id = fm.m_user_id_son
LEFT JOIN m_user us2 ON fm.m_user_id_parent = us2.m_user_id
WHERE
us2.m_user_id='$where[m_user_id]')";
		return $this->db->query($query);
}
}

/* End of file M_admin_sekolah.php */
/* Location: ./application/models/1/M_admin_sekolah.php */