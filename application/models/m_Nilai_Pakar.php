<?php
class m_Nilai_Pakar extends CI_Model
{
	public function nilai_pakar()
	{
		$query = $this->db->get('gejala_penyakit');
		return $query->result_array();
		// $this->db->select('*, penyakit.id as id_penyakit, penyakit.kode as kode_penyakit');
		// $this->db->from('penyakit');
		// $this->db->select('*');
		// $this->db->from('gejala');
		// $query = $this->db->get();
		// return $query->result_array();
	}


	public function nilai($id_gejala, $id_penyakit, $id)
	{
		// Mengambil data penyakit berdasarkan id_penyakit
		$this->db->select('*, penyakit.id as id_penyakit, penyakit.kode as kode_penyakit');
		$this->db->from('penyakit');
		$this->db->where('id', $id_penyakit);
		$query_penyakit = $this->db->get();
		$result_penyakit = $query_penyakit->result_array();

		// Mengambil data gejala berdasarkan id_gejala
		$this->db->select('*');
		$this->db->from('gejala');
		$this->db->where('id', $id_gejala);
		$query_gejala = $this->db->get();
		$result_gejala = $query_gejala->result_array();

		$this->db->select('*');
		$this->db->from('gejala_penyakit');
		$this->db->where('id', $id);
		$query_gejala_penyakit = $this->db->get();
		$result_gejala_penyakit = $query_gejala_penyakit->result_array();

		// Menggabungkan hasil query menjadi satu array
		return array_merge($result_penyakit, $result_gejala, $result_gejala_penyakit);
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

	public function search($keyword)
	{
		if (!$keyword) {
			return null;
		}

		// Convert keyword to lowercase
		$keyword = strtolower($keyword);

		// Perform the JOIN between kelompok_gejala and gejala
		$this->db->select('gejala_penyakit.*, gejala.nama_gejala, penyakit.nama');
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
}
