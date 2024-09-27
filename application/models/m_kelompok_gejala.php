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

	public function search_count($keyword)
	{
		if (!$keyword) {
			return null;
		}

		$keyword = strtolower($keyword);
		$this->db->like('LOWER(kelompok_gejala_id)', $keyword);
		$this->db->or_like('LOWER(keterangan)', $keyword);
		$query = $this->db->get('kelompok_gejala');
		return $query->result_array();
	}

	public function pagination_search($keyword, $limit = null, $start = null) {
		$keyword = strtolower($keyword);
		$this->db->like('LOWER(kelompok_gejala_id)', $keyword);
		$this->db->or_like('LOWER(keterangan)', $keyword);
            $this->db->limit($limit, $start);
		$query = $this->db->get('kelompok_gejala');
        return $query->result_array();
    }

	public function count_all_kelompok_gejala()
	{
		return $this->db->count_all('kelompok_gejala');
	}

	public function pagination_kelompok_gejala($limit, $start)
	{
		$this->db->limit($limit, $start);
		$query = $this->db->get('kelompok_gejala');
		return $query->result_array();
	}
}
