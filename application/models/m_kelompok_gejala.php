<?php
class m_kelompok_gejala extends CI_Model
{
	public function kelompok_gejala()
	{
		$query = $this->db->get('kelompok_gejala');
		return $query->result_array();
	}

	public function delete_by_id($id)
	{
		$this->db->delete('kelompok_gejala', array('id' => $id));
	}

	public function add_kelompok_gejala($id, $keterangan, $kelompokGejala)
	{
		$this->db->trans_start();
		$this->db->query("INSERT INTO kelompok_gejala(id, keterangan, kelompok_gejala_id) VALUES ('$id','$keterangan', '$kelompokGejala')");
		$this->db->trans_complete();

		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}

	public function edit_kelompok_gejala($id, $kelompok, $keterangan)
	{
		$this->db->where('id', $id);
		$this->db->update('kelompok_gejala', [
			'kelompok_gejala_id' => $kelompok,
			'keterangan' => $keterangan,

		]);
	}

	public function search($keyword)
	{
		if (!$keyword) {
			return null;
		}
		$this->db->like('kelompok_gejala_id', $keyword);
		$this->db->or_like('keterangan', $keyword);
		$query = $this->db->get('kelompok_gejala');
		return $query->result_array();
	}
}
