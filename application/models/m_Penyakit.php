<?php
class m_Penyakit extends CI_Model
{
	public function penyakit()
	{
		$query = $this->db->get('penyakit');
		return $query->result_array();
	}

	public function get__by_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('hasil_diagnosa');
		return $query->result_array();
	}

	public function delete_by_id($id)
	{
		$this->db->delete('penyakit', array('id' => $id));
	}

	public function add_penyakit($id, $kode, $nama, $keterangan, $pemeriksa)
	{
		$this->db->trans_start();
		$this->db->query("INSERT INTO penyakit(id, kode, nama, keterangan, id_pemeriksaan) VALUES ('$id','$kode', '$nama', '$keterangan', '$pemeriksa')");
		$this->db->trans_complete();

		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}

	public function edit_penyakit($id, $kode, $nama, $keterangan, $pemeriksa)
	{
		$this->db->where('id', $id);
		$this->db->update('penyakit', [
			'kode' => $kode,
			'nama' => $nama,
			'keterangan' => $keterangan,
			'id_pemeriksaan' => $pemeriksa,
		]);
	}


	public function search($keyword)
	{
		if (!$keyword) {
			return null;
		}

		$keyword = strtolower($keyword);
		$this->db->like('LOWER(kode)', $keyword);
		$this->db->or_like('LOWER(nama)', $keyword);
		// $this->db->or_like('LOWER(id_pemeriksaan)', $keyword);
		$query = $this->db->get('penyakit');
		return $query->result_array();
	}

	public function pagination_search($keyword, $limit = null, $start = null) {
		$keyword = strtolower($keyword);
		$this->db->like('LOWER(kode)', $keyword);
		$this->db->or_like('LOWER(nama)', $keyword);
		$this->db->or_like('LOWER(id_pemeriksaan)', $keyword);
        if ($limit !== null && $start !== null) {
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get('penyakit');
        return $query->result_array();
    }

	public function pagination_penyakit($limit, $start) {
		$this->db->limit($limit, $start);
		$query = $this->db->get('penyakit');
        return $query->result_array();
    }

	public function count_all_penyakit() {
        return $this->db->count_all('penyakit');
    }
	
	public function count_search($keyword) {
        $this->db->like('nama_gejala', $keyword);
        return $this->db->count_all_results('gejala');
    }

	

}
