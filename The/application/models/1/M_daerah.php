<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_daerah extends CI_Model {

	function view_provinsi()
	{
		return $this->db->get('m_provinsi');
	}

	function tambah_provinsi($data, $table)
	{
		$this->db->insert($table, $data);	
	}

	function hapus_provinsi($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_provinsi($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	function update_provinsi($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
// <!------------------------------------------------kota----------------------------------->
	function view_kota($table, $where1)
	{
		return $this->db->get_where($table, $where1);
	}
	function tambah_kota($data, $table)
	{
		$this->db->insert($table, $data);	
	}

	function hapus_kota($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	function my_kota ($tabel, $where1)
	{
		return $this->db->get_where($tabel, $where);	
	}

	function edit_kota($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	function update_kota($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
// <!------------------------------------------------kota----------------------------------->
// <!------------------------------------------------kecamatan----------------------------------->
	function view_kecamatan($table, $where1)
	{
		return $this->db->get_where($table, $where1);
	}
	function tambah_kecamatan($data, $table)
	{
		$this->db->insert($table, $data);	
	}

	function hapus_kecamatan($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_kecamatan($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	function update_kecamatan($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	function view_kt($table, $m_kota_id)
	{
		return $this->db->get_where($table, array('m_kota_id' => $m_kota_id ));	
	}
// <!------------------------------------------------kelurahan----------------------------------->
	function view_kelurahan($table, $where1)
	{
		return $this->db->get_where($table, $where1);
	}
	function tambah_kelurahan($data, $table)
	{
		$this->db->insert($table, $data);	
	}

	function hapus_kelurahan($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_kelurahan($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	function update_kelurahan($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	function view_kc($table, $m_kecamatan_id)
	{
		return $this->db->get_where($table, array('m_kecamatan_id' => $m_kecamatan_id ));	
	}
	
}

/* End of file M_daerah.php */
/* Location: ./application/models/1/M_daerah.php */