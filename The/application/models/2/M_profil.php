<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_Model {

	function myprofil($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function myrole($table,$where){
		return $this->db->get_where($table,$where);	
	}


	// function ambil_sekolah(){
	// 	// mengambil data sekolah dari m_user d_user
	// 	SELECT sk.sekolah_nama from d_sekolah sk LEFT JOIN d_user_role ur on sk.d_sekolah_id = ur.d_sekolah_id LEFT JOIN m_user us on ur.m_user_id = us.m_user_id where  
	// }
	
    public function ambil_sekolah($sekolah_nama)
    {
        $this->db->select('sk.sekolah_nama');
        $this->db->from('d_sekolah');
        $this->db->join('d_user_role','sk.d_sekolah_id = ur.d_sekolah_id','left');
        $this->db->where('sk.sekolah_nama',$sekolah_nama);
        // $this->db->where('p.kategori !=','Penyuluh');
        $query = $this->db->get();
        return $query->result();
    }

}

/* End of file M_profil.php */
/* Location: ./application/models/1/M_profil.php */