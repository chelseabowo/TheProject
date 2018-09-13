<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_Model {

	function myprofil($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function myrole($table,$where){
		return $this->db->get_where($table,$where);	
	}

	function call_gender()
	{
		return $this->db->get('m_gender');
	}

}

/* End of file M_profil.php */
/* Location: ./application/models/1/M_profil.php */