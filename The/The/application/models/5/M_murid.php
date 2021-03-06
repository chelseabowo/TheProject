<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_murid extends CI_Model {

	function Tampil_murid($where){
		$query="SELECT
		url.m_user_id,
		url.d_user_role_id,
		us.user_nama,
		us.user_id,
		us.user_alamat,
		us.user_no_hp,
		us.user_password,
		rl.role_nama,
		sk.sekolah_nama,
		kl.kelas_nama,
		(CASE
			WHEN url.is_verified='0' THEN 'NOT VERIFIED'
			WHEN url.is_verified='1' THEN 'VERIFIED'
			ELSE ''
		END) AS status
		FROM d_user_role url 
		LEFT JOIN m_user us ON url.m_user_id = us.m_user_id 
		LEFT JOIN m_role rl ON url.m_role_id = rl.m_role_id
		LEFT JOIN d_kelas kl ON url.d_kelas_id = kl.d_kelas_id
		LEFT JOIN d_sekolah sk ON url.d_sekolah_id = sk.d_sekolah_id
		WHERE us.is_murid = '1' and sk.d_sekolah_id = (
		Select
		skl.d_sekolah_id
		From
		M_user us
		LEFT JOIN d_user_role ur ON us.m_user_id = ur.m_user_id
		LEFT JOIN d_sekolah skl ON ur.d_sekolah_id= skl.d_sekolah_id
		WHERE us.m_user_id='$where[m_user_id]'
		)
		";
		return $this->db->query($query);
	}
	function verifikasi_murid($where){
		$query1="UPDATE d_user_role SET is_verified='1' WHERE d_user_role_id='$where[d_user_role_id]'";
		//$query2="SELECT us.m_user_id,us.user_id FROM d_user_role url LEFT JOIN m_user us ON url.m_user_id = us.m_user_id WHERE d_user_role_id='$where[d_user_role_id]'";
		//$a = $this->db->query($query2)->row_array();
		//$query3="UPDATE m_user SET user_id='$a[user_id]-1' WHERE m_user_id='$a[m_user_id]'";
		$this->db->query($query1);
		//$this->db->query($query3);
	}
	function tambah_murid($data1,$table)
		{
			$this->db->insert($table,$data1);
			$last_id = $this->db->insert_id();
			
			$query ="INSERT INTO d_user_role (m_user_id,m_role_id) VALUES ('$last_id','8')";
			return $this->db->query($query);
		}
	function hapus_murid($where)
	{
		$this->db->where($where);
		$this->db->delete('M_user');
		$this->db->where($where);
		$this->db->delete('d_user_role');
		
	}
	function edit_murid($table,$where)
	{
		return $this->db->get_where($where,$table);
	}
	function update_murid($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}


}

/* End of file M_admin_sekolah.php */
/* Location: ./application/models/1/M_admin_sekolah.php */