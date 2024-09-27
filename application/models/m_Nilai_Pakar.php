<?php
class m_Nilai_Pakar extends CI_Model
{
	public function nilai_pakar()
	{
		$query = $this->db->get('gejala_penyakit');
		return $query->result_array();
	}


	public function nilai_count()
	{
		$this->db->select('*, penyakit.id as id_penyakit, penyakit.kode as kode_penyakit,penyakit.nama as nama_penyakit');
		$this->db->from('gejala_penyakit');
		$this->db->join('penyakit', 'penyakit.id = gejala_penyakit.penyakit_id');
		$this->db->join('gejala', 'gejala.id = gejala_penyakit.gejala_id');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function nilai($limit, $start)
	{
		$this->db->select('*, penyakit.id as id_penyakit, penyakit.kode as kode_penyakit,penyakit.nama as nama_penyakit');
		$this->db->from('gejala_penyakit');
		$this->db->join('penyakit', 'penyakit.id = gejala_penyakit.penyakit_id');
		$this->db->join('gejala', 'gejala.id = gejala_penyakit.gejala_id');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function delete_by_id($id)
	{
		$this->db->delete('gejala_penyakit', array('id' => $id));
	}

	public function add_nilai_pakar($id, $gejala, $penyakit, $mb, $md, $cf)
	{
		$this->db->trans_start();
		$this->db->query("INSERT INTO gejala_penyakit(id, gejala_id, penyakit_id, mb, md, cf) VALUES ('$id','$gejala', '$penyakit','$mb','$md','$cf')");
		$this->db->trans_complete();

		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}

	public function edit_nilai_pakar($id, $gejala, $penyakit, $mb, $md, $cf)
	{
		$this->db->where('id', $id);
		$this->db->update('gejala_penyakit', [
			'gejala_id' => $gejala,
			'penyakit_id' => $penyakit,
			'mb' => $mb,
			'md' => $md,
			'cf' => $cf,

		]);
	}

	public function search_count($keyword)
	{
		if (!$keyword) {
			return null;
		}

		// Convert keyword to lowercase
		$keyword = strtolower($keyword);

		// Perform the JOIN between kelompok_gejala and gejala
		$this->db->select('*, penyakit.id as id_penyakit, penyakit.kode as kode_penyakit,penyakit.nama as nama_penyakit');
		$this->db->from('gejala_penyakit');
		$this->db->join('gejala', 'gejala_penyakit.gejala_id = gejala.id');
		$this->db->join('penyakit', 'gejala_penyakit.penyakit_id = penyakit.id');

		// Apply LIKE on the joined column (nama_gejala)
		$this->db->like('LOWER(gejala.nama_gejala)', $keyword);
		$this->db->or_like('LOWER(penyakit.nama)', $keyword);

		// Optionally, add more conditions or like clauses here if needed
		$query = $this->db->get();

		return $query->result_array();
	}
	public function search($keyword,$limit, $start)
	{
		if (!$keyword) {
			return null;
		}

		// Convert keyword to lowercase
		$keyword = strtolower($keyword);

		// Perform the JOIN between kelompok_gejala and gejala
		$this->db->select('*, penyakit.id as id_penyakit, penyakit.kode as kode_penyakit,penyakit.nama as nama_penyakit');
		$this->db->from('gejala_penyakit');
		$this->db->join('gejala', 'gejala_penyakit.gejala_id = gejala.id');
		$this->db->join('penyakit', 'gejala_penyakit.penyakit_id = penyakit.id');

		// Apply LIKE on the joined column (nama_gejala)
		$this->db->like('LOWER(gejala.nama_gejala)', $keyword);
		$this->db->or_like('LOWER(penyakit.nama)', $keyword);

		// Optionally, add more conditions or like clauses here if needed
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		$result = $query->result_array();
		return $result;
	}
}
