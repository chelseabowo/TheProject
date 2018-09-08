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
		$b = $this->db->get_where('d_sekolah',array('sekolah_id'=>$data1['sekolah_id']))->row_array();
		$c = $this->db->get_where('d_kelas',array('kelas_id' => $data1['kelas_id'],'d_sekolah_id' => $b['d_sekolah_id']))->row_array();
		
		$this->db->where('m_user_id', $a['m_user_id']);
		$this->db->update('m_user', $data2);
		$this->db->where('m_user_id', $a['m_user_id']);
		$this->db->update('d_user_role', array('d_sekolah_id' => $b['d_sekolah_id'], 'd_kelas_id' => $c['d_kelas_id']));
	}
}

/* End of file M_profil.php */
/* Location: ./application/models/1/M_profil.php */