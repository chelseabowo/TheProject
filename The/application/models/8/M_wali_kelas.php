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

	
	function verifikasi_wali_kelas($where){
		$query1="UPDATE d_user_role SET is_verified='1' WHERE d_user_role_id='$where[d_user_role_id]'";
		//$query2="SELECT us.m_user_id,us.user_id FROM d_user_role url LEFT JOIN m_user us ON url.m_user_id = us.m_user_id WHERE d_user_role_id='$where[d_user_role_id]'";
		//$a = $this->db->query($query2)->row_array();
		//$query3="UPDATE m_user SET user_id='$a[user_id]-1' WHERE m_user_id='$a[m_user_id]'";
		$this->db->query($query1);
		//$this->db->query($query3);
	}
	function tambah_wali_kelas($data1,$table)
		{
			$this->db->insert($table,$data1);
			$last_id = $this->db->insert_id();
			
			$query ="INSERT INTO d_user_role (m_user_id,m_role_id) VALUES ('$last_id','7')";
			return $this->db->query($query);
		}
	function hapus_wali_kelas($where)
	{
		$this->db->where($where);
		$this->db->delete('M_user');
		$this->db->where($where);
		$this->db->delete('d_user_role');
		
	}
	function edit_wali_kelas($table,$where)
	{
		return $this->db->get_where($where,$table);
	}
	function update_wali_kelas($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}


}

/* End of file M_admin_sekolah.php */
/* Location: ./application/models/1/M_admin_sekolah.php */