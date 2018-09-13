<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelas extends CI_Model {

	function tampil_kelas($d_sekolah_id)
	{
		$query = "
		SELECT
		sk.d_sekolah_id,
		sk.sekolah_id,
		kl.d_kelas_id,
		kl.kelas_nama,
		kl.kelas_id
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

	function tampil_siswa($d_kelas_id)
	{
		$query = "
		SELECT
		us.*
		FROM
		m_user us
		LEFT JOIN d_user_role ur ON us.m_user_id = ur.m_user_id
		WHERE d_kelas_id = '$d_kelas_id'
		";
		return $this->db->query($query);
	}

	function tampil_sekolah($d_sekolah_id)
	{
		$query = "
		SELECT  
		sk.sekolah_id,
		sk.sekolah_nama,
		sk.sekolah_no_telp,
		sk.sekolah_alamat,
		pr.provinsi_nama,
		kt.kota_nama,
		kc.kecamatan_nama,
		kl.kelurahan_nama,
		(
			SELECT us1.user_nama FROM m_user us1
			LEFT JOIN d_user_role ur1 ON ur1.m_user_id = us1.m_user_id
            WHERE ur1.d_sekolah_id='$d_sekolah_id' AND ur1.m_role_id='2'
		)AS admin_sekolah,
        (
			SELECT us2.user_nama FROM m_user us2
			LEFT JOIN d_user_role ur2 ON ur2.m_user_id = us2.m_user_id
            WHERE ur2.d_sekolah_id='$d_sekolah_id' AND ur2.m_role_id='3'
		)AS kepala_sekolah
		FROM d_sekolah sk
		LEFT JOIN m_provinsi pr ON sk.m_provinsi_id = pr.m_provinsi_id
		LEFT JOIN m_kota kt ON sk.m_kota_id = kt.m_kota_id
		LEFT JOIN m_kecamatan kc ON sk.m_kecamatan_id = kc.m_kecamatan_id
		LEFT JOIN m_kelurahan kl ON sk.m_kelurahan_id = kl.m_kelurahan_id
		WHERE d_sekolah_id='$d_sekolah_id'";
		return $this->db->query($query);
	}

	function tampil_wali_kelas($d_kelas_id)
	{
		$query = "
			SELECT
			kl.kelas_nama,
			kl.kelas_id,
			(
				SELECT us1.user_nama FROM m_user us1
				LEFT JOIN d_user_role ur1 ON ur1.m_user_id = us1.m_user_id
            	WHERE ur1.d_kelas_id='$d_kelas_id' AND ur1.m_role_id='7'
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
}

/* End of file M_kelas.php */
/* Location: ./application/models/1/M_kelas.php */