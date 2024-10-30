<?php
class m_Hasil_Diagnosa extends CI_Model
{
	public function hasil_diagnosa($id_user)
	{
		$this->db->where('user_id', $id_user);
		$query = $this->db->get('hasil_diagnosa');
		return $query;
	}

	public function delete_by_id($user_id)
	{
		$this->db->delete('hasil_diagnosa', array('user_id' => $user_id));
	}

	public function get_by_id()
	{
		$this->db->select('user_detail.*, hasil_diagnosa.*'); // Memilih semua kolom dari tabel user_detail dan hasil kolom 'hasil' dari tabel hasil_diagnosa
		$this->db->from('user_detail');
		$this->db->join('hasil_diagnosa', 'user_detail.id_user_detail = hasil_diagnosa.user_id', 'left'); // Menggabungkan tabel user_detail dan hasil_diagnosa berdasarkan kolom user_id
		return $this->db->get()->result_array();
	}

	public function search($keyword)
	{
		if (!$keyword) {
			return null;
		}
		$keyword = strtolower($keyword);
		$this->db->select('user_detail.*, hasil_diagnosa.*'); // Memilih semua kolom dari tabel user_detail dan hasil kolom 'hasil' dari tabel hasil_diagnosa
		$this->db->from('user_detail');
		$this->db->join('hasil_diagnosa', 'user_detail.id_user_detail = hasil_diagnosa.user_id', 'left'); // Menggabungkan tabel user_detail dan hasil_diagnosa berdasarkan kolom user_id
		$this->db->where('nik IS NOT NULL' );
		$this->db->like('LOWER(nama_lengkap)', $keyword);
		$this->db->or_like('LOWER(nik)', $keyword);
		$this->db->or_like('LOWER(nomor_telepon)', $keyword);
		$this->db->or_like('LOWER(no_pendaftaran)', $keyword);
		return $this->db->get()->result_array();
	}

	public function get_by_id_and_tanggal($ids, $tanggal)
	{
		$this->db->select('*'); // Memilih semua kolom dari tabel user_detail dan hasil kolom 'hasil' dari tabel hasil_diagnosa
		$this->db->from('user_detail');
		$this->db->join('hasil_diagnosa', 'user_detail.id_user_detail = hasil_diagnosa.user_id', 'left');
		$this->db->where('nik IS NOT NULL' );
		$this->db->where_in('id_user_detail', $ids);
		$this->db->where('data_registered', $tanggal);
		$query = $this->db->get('user_detail');
		return $query;
	}

	public function all()
	{
		$this->db->select('*'); // Memilih semua kolom dari tabel user_detail dan hasil kolom 'hasil' dari tabel hasil_diagnosa
		$this->db->from('user_detail');
		$this->db->join('hasil_diagnosa', 'user_detail.id_user_detail = hasil_diagnosa.user_id', 'left'); // Menggabungkan tabel user_detail dan hasil_diagnosa berdasarkan kolom user_id
		$this->db->where('nik IS NOT NULL');
		return $this->db->get()->result_array();
	}

	public function get_by_data_registered($tanggal)
	{
		$this->db->select('*'); // Memilih semua kolom dari tabel user_detail dan hasil kolom 'hasil' dari tabel hasil_diagnosa
		$this->db->from('user_detail');
		$this->db->join('hasil_diagnosa', 'user_detail.id_user_detail = hasil_diagnosa.user_id', 'left');

		$this->db->where('data_registered', $tanggal);
		$this->db->where('nik IS NOT NULL' );
		return $this->db->get()->result_array();
	}

	public function update_pemeriksaan_bnn($id_user, $nama_bnn, $nama_pemeriksa, $narkoba, $status_bnn, $id_pemeriksaan_bnn){
		$data = array(
			'id_pemeriksaan_bnn'=>$id_pemeriksaan_bnn,
			'nama_bnn'=>$nama_bnn,
			'nama_pemeriksa_bnn'=>$nama_pemeriksa,
			'narkoba_test'=>$narkoba,
			'id_status_bnn'=>$status_bnn,
		);
		$this->db->where('id_user_detail',$id_user);
		$this->db->update('user_detail', $data);
	}

	public function update_pemeriksaan_kesehatan($id_user, $nama_faskes, $nama_pemeriksa_kesehatan, $tekanan_sistolik, $tekanan_diastolik, $nadi, $nafas, $suhu, $berat_badan, $tinggi_badan, $imt, $lila, $suntik_tt, $tanda_anemia, $hb, $gol_darah, $rapid_test, $plano_test, $status_kesehatan, $id_pemeriksaan_kesehatan)
	{
		$data = array(
			'berat_badan'=>$berat_badan,
            'tinggi_badan'=>$tinggi_badan,
            'imt'=>$imt,
			'id_pemeriksaan_kesehatan'=>$id_pemeriksaan_kesehatan,
            'nama_faskes'=>$nama_faskes,
            'nama_pemeriksa_kesehatan'=>$nama_pemeriksa_kesehatan,
            'tekanan_sistolik'=>$tekanan_sistolik,
            'tekanan_diasistolik'=>$tekanan_diastolik,
            'nadi'=>$nadi,
            'nafas'=>$nafas,
            'suhu'=>$suhu,
            'lila'=>$lila,
            'suntik_tt'=>$suntik_tt,
            'hb'=>$hb,
            'gol_darah'=>$gol_darah,
            'rapid_test'=>$rapid_test,
            'plano_test'=>$plano_test,
            'id_status_kesehatan'=>$status_kesehatan,
            'tanda_anemia'=>$tanda_anemia,
		);
		$this->db->where('id_user_detail',$id_user);
		$this->db->update('user_detail', $data);
	}
}
