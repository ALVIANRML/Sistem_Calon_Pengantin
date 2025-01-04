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
		$this->db->like('LOWER(nama)', strtolower($keyword), 'both', false);
		return $this->db->from('penyakit')->count_all_results();
	}
	

	function get_list_by_id($ids) {
		// Jika $ids adalah string, ubah menjadi array
		if (is_string($ids)) {
			$ids = explode(',', $ids);
		}
	
		// Pastikan $ids adalah array
		if (!is_array($ids)) {
			throw new InvalidArgumentException('Input harus berupa array atau string yang dipisahkan koma');
		}
	
		// Bersihkan dan bungkus setiap ID dengan tanda kutip
		$quoted_ids = array_map(function($id) {
			return "'" . $this->db->escape_str(trim($id)) . "'";
		}, $ids);
	
		$id_list = implode(',', $quoted_ids);
	
		$sql = "SELECT id, kode, nama_gejala FROM gejala WHERE id IN ($id_list)";
		return $this->db->query($sql);
	}

	function get_by_gejala($gejala) {
		// Jika $gejala adalah String, ubah menjadi Sebuah Array
		if (is_string($gejala)) {
			$gejala = explode(',', $gejala);
		}
		//Pastikan $gejala adalah Array
		if (!is_array($gejala)) {
			throw new InvalidArgumentException('Input harus berupa array atau string yang dipisahkan koma');
		}

		//Bersihkan dan Bungkus Setiap ID dengan tanda Kutip
		$qouted_gejala = array_map(function($id) {
			return "'" . $this->db->escape_str(trim($id)). "'";
		}, $gejala);

		$gejala_list = implode(',', $qouted_gejala);
		$sql = "select distinct penyakit_id,p.kode,p.nama,p.keterangan,gp.gejala_id from gejala_penyakit gp inner join penyakit p on gp.penyakit_id=p.id where gejala_id in ($gejala_list) order by penyakit_id,gejala_id";
		return $this->db->query($sql);
	}

	function get_gejala_by_penyakit($id, $gejala = null) {
		// Bungkus $id dengan tanda kutip
		$id = $this->db->escape($id);
		
		$sql = "SELECT gejala_penyakit.gejala_id, mb, md, cf 
				FROM gejala_penyakit 
				WHERE penyakit_id = $id";
		
		if ($gejala != null) {
			if (is_string($gejala)) {
				// Jika $gejala adalah string, pisahkan dan bungkus setiap nilai
				$gejala_array = explode(',', $gejala);
				$gejala_array = array_map('trim', $gejala_array);
				$gejala_array = array_map(array($this->db, 'escape'), $gejala_array);
				$gejala = implode(',', $gejala_array);
			} elseif (is_array($gejala)) {
				// Jika $gejala adalah array, bungkus setiap nilai
				$gejala = array_map(array($this->db, 'escape'), $gejala);
				$gejala = implode(',', $gejala);
			}
			$sql .= " AND gejala_id IN ($gejala)";
		}
		
		$sql .= " ORDER BY gejala_id";
		
		return $this->db->query($sql);
	}
	
	

	

}
