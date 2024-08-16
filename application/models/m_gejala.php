<?php
class m_gejala extends CI_Model
{
	public function gejala()
	{
		$query = $this->db->get('gejala');
		return $query->result_array();
	}

	public function delete_by_id($id)
	{
		$this->db->delete('gejala', array('id' => $id));
	}

	public function add_gejala($id, $kode, $nama, $kelompokGejala)
	{
		$this->db->trans_start();
		$this->db->query("INSERT INTO gejala(id, kode, nama_gejala, kelompok_gejala_id) VALUES ('$id','$kode', '$nama', '$kelompokGejala')");
		$this->db->trans_complete();

		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}

	public function edit_gejala($id, $kode, $nama, $kelompokGejala)
	{
		$this->db->where('id', $id);
		$this->db->update('gejala', [
			'kode' => $kode,
			'nama_gejala' => $nama,
			'kelompok_gejala_id' => $kelompokGejala,

		]);
	}

	public function search($keyword)
	{
		if (!$keyword) {
			return null;
		}
		$keyword = strtolower($keyword);
		$this->db->like('LOWER(kode)', $keyword);
		$this->db->or_like('LOWER(kelompok_gejala_id)', $keyword);
		$this->db->or_like('LOWER(nama_gejala)', $keyword);
		$query = $this->db->get('gejala');
		return $query->result_array();
	}
}
