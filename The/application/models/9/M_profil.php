<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_Model {

	function myprofil($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function call_gender()
	{
		return $this->db->get('m_gender');
	}

	function update_reg($user,$data1,$data2)
	{
		$a = $this->db->get_where('m_user', array('user_id' => $user))->row_array();
		$b = $this->db->get_where('d_user_role', array('m_user_id' => $a['m_user_id']))->row_array();
		$c = $this->db->get_where('m_user', $data1)->row_array();
		$d = $this->db->get_where('d_user_role', array('m_user_id' => $c['m_user_id']))->row_array();
		$query = "INSERT INTO d_family (m_user_id_parent, m_role_id_parent, m_user_id_son, m_role_id_son) 
		VALUES ('$b[m_user_id]','$b[m_role_id]','$d[m_user_id]','$d[m_role_id]')";
		$this->db->query($query);
	}
}

/* End of file M_profil.php */
/* Location: ./application/models/1/M_profil.php */