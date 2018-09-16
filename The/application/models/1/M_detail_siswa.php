<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_detail_siswa extends CI_Model {
	function tampil_siswa($d_kelas_id)
	{
		$query = "
		SELECT
		us.*,
		ur.d_sekolah_id
		FROM
		m_user us
		LEFT JOIN d_user_role ur ON us.m_user_id = ur.m_user_id
		WHERE ur.d_kelas_id = '$d_kelas_id' AND ur.is_verified='1' ORDER BY ur.m_role_id
		";
		return $this->db->query($query);
	}

	function tampil_wali_kelas($d_kelas_id)
	{
		$query = "
			SELECT
			kl.d_sekolah_id,
			kl.kelas_nama,
			kl.kelas_id,
			(
				SELECT us1.user_nama FROM m_user us1
				LEFT JOIN d_user_role ur1 ON ur1.m_user_id = us1.m_user_id
            	WHERE ur1.d_kelas_id='$d_kelas_id' AND ur1.m_role_id='7' AND ur1.is_verified='1'
			)AS wali_kelas
			FROM d_kelas kl
			WHERE kl.d_kelas_id='$d_kelas_id'
		";
		return $this->db->query($query);
	}

	function detail_siswa($table,$m_user_id)
	{
		$query = "
		SELECT
		us.m_user_id,
		us.user_nama,
		us.user_id,
		us.user_password,
		us.m_gender_id,
		gn.gender_nama,
		us.user_tempat_lahir,
		us.user_tanggal_lahir,
		us.user_alamat,
		us.user_email,
		us.user_no_hp
		FROM m_user us
		LEFT JOIN m_gender gn ON us.m_gender_id = gn.m_gender_id
		WHERE us.m_user_id='$m_user_id'
		";
		return $this->db->query($query);
	}

	function info_siswa($where)
	{
		$query = "
			SELECT rl.d_kelas_id FROM m_user us
			LEFT JOIN d_user_role rl ON us.m_user_id = rl.m_user_id
			WHERE us.m_user_id = '$where[m_user_id]'
		";
		return $this->db->query($query);
	}


}

/* End of file M_detail_siswa.php */
/* Location: ./application/models/1/M_detail_siswa.php */