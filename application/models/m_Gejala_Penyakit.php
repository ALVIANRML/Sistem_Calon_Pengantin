<?php

class m_Gejala_Penyakit extends CI_Model
{
	public function All(){
		$query = $this->db->get('gejala_penyakit');
		return $query;
	}

	public function search($keyword)
	{
		if (!$keyword) {
			return null;
		}
		$this->db->like('nama_lengkap', $keyword);
		$this->db->or_like('nik', $keyword);
		$this->db->or_like('nomor_telepon', $keyword);
		$this->db->or_like('no_pendaftaran', $keyword);
		$query = $this->db->get('user_detail');
		return $query->result_array();
	}
}
?>
