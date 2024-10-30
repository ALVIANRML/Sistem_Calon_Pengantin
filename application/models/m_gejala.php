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
	
	public function pagination_gejala($limit, $start) {
		$this->db->limit($limit, $start);
		$query = $this->db->get('gejala');
        return $query->result_array();
    }

    public function count_all_gejala() {
        return $this->db->count_all('gejala');
    }

    public function pagination_search($keyword, $limit = null, $start = null) {
        $this->db->like('nama_gejala', $keyword);
		$keyword = strtolower($keyword);
		$this->db->like('LOWER(kode)', $keyword);
		$this->db->or_like('LOWER(kelompok_gejala_id)', $keyword);
		$this->db->or_like('LOWER(nama_gejala)', $keyword);
        if ($limit !== null && $start !== null) {
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get('gejala');
        return $query->result_array();
    }

    public function count_search($keyword) {
        $this->db->like('nama_gejala', $keyword);
        return $this->db->count_all_results('gejala');
    }

	public function get_all_gejala_bnn()
    {
        $hasil = $this->db->query("SELECT * FROM gejala WHERE kelompok_gejala_id='BNN'");
        return $hasil;
    }

	public function get_all_gejala_kesehatan()
    {
        $hasil = $this->db->query("SELECT * FROM gejala WHERE kelompok_gejala_id='Kesehatan'");
        return $hasil;
    }
}

