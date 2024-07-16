<?php

class m_Alamat extends CI_Model

{
	public function provinsi()
	{
		return $this->db->get('provinsi')->result();
	}



	public function kota($kode_provinsi)
	{
		$this->db->where('kode_provinsi', $kode_provinsi);
		return $this->db->get('kota')->result();
	}
}


