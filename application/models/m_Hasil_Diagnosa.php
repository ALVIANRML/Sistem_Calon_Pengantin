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
}
