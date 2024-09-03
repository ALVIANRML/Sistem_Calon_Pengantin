<?php
class m_User_detail extends CI_Model
{



	public function all()
	{

		$this->db->select('*'); // Pilih semua kolom dari tabel yang digabungkan
		$this->db->from('user_detail'); // Tabel utama
		$this->db->join('hasil_diagnosa', 'user_detail.id_user_detail = hasil_diagnosa.user_id', 'left');
		$this->db->join('users', 'user_detail.id_user_detail = users.id_user', 'left');
		$this->db->where('role', 5);
		$queryHasilDiagnosa = $this->db->get();
		$resultHasilDiagnosa = $queryHasilDiagnosa->result_array();
		return $resultHasilDiagnosa;
	}

	public function getTanggalPeriksa()
	{
		$query = $this->db->query("SELECT * FROM tanggal_pemeriksaan WHERE keterangan = 'tanggal pemeriksaan'");
		return $query->result();
	}

	public function getAll($id_user)
	{

		$this->db->where('id_user_detail', $id_user);
		$query = $this->db->get('user_detail');
		return $query;
	}



	public function get_by_data_registered($tanggal)
	{


		$this->db->select('*'); // Pilih semua kolom dari tabel yang digabungkan
		$this->db->from('user_detail'); // Tabel utama
		$this->db->join('hasil_diagnosa', 'user_detail.id_user_detail = hasil_diagnosa.user_id', 'left');
		$this->db->join('users', 'user_detail.id_user_detail = users.id_user', 'left');
		$this->db->where('data_registered', $tanggal);
		$this->db->where('nik IS NOT NULL');
		$this->db->where('role', 5);
		$queryHasilDiagnosa = $this->db->get();
		$resultHasilDiagnosa = $queryHasilDiagnosa->result_array();
		return $resultHasilDiagnosa;
	}

	public function get_by_id_and_tanggal($ids, $tanggal)
	{
		$this->db->select('*, user_detail.nomor_telepon as NomorTelepon'); // Memilih semua kolom dari tabel user_detail dan hasil kolom 'hasil' dari tabel hasil_diagnosa
		$this->db->from('user_detail');
		$this->db->join('hasil_diagnosa', 'user_detail.id_user_detail = hasil_diagnosa.user_id', 'left');
		$this->db->join('users', 'user_detail.id_user_detail = users.id_user', 'left');
		$this->db->where('nik IS NOT NULL');
		$this->db->where('role', 5);
		$this->db->where_in('id_user_detail', $ids);
		$this->db->where('data_registered', $tanggal);
		$queryHasilDiagnosa = $this->db->get();
		$resultHasilDiagnosa = $queryHasilDiagnosa->result_array();
		return $resultHasilDiagnosa;
	}


	public function update($id_user, $nomor_pendaftaran, $nama, $nik, $tempatLahir, $tanggalLahir, $umur, $jenisKelamin, $agama, $pendidikan, $pekerjaan, $nomorTelepon, $provinsi, $kota, $kecamatan, $kelurahan, $alamat, $pernikahanKe, $tanggalPernikahan, $fotoUser, $fotoktp, $fotokk, $fotoSurat, $status, $data_registered, $tanggalPeriksa)
	{
		$this->db->where('id_user_detail', $id_user);
		$this->db->update('user_detail', [
			'no_pendaftaran' => $nomor_pendaftaran,
			'nama_lengkap' => $nama,
			'nik' => $nik,
			'tempat_lahir' => $tempatLahir,
			'tanggal_lahir' => $tanggalLahir,
			'usia' => $umur,
			'jenis_kelamin' => $jenisKelamin,
			'agama' => $agama,
			'pendidikan' => $pendidikan,
			'pekerjaan' => $pekerjaan,
			'nomor_telepon' => $nomorTelepon,
			'provinsi' => $provinsi,
			'kota' => $kota,
			'kecamatan' => $kecamatan,
			'kelurahan' => $kelurahan,
			'alamat' => $alamat,
			'pernikahan_ke' => $pernikahanKe,
			'tanggal_pernikahan' => $tanggalPernikahan,
			'tanggal_periksa' => $tanggalPeriksa,
			'foto_user' => $fotoUser,
			'foto_ktp' => $fotoktp,
			'foto_kk' => $fotokk,
			'foto_surat' => $fotoSurat,
			'status' => $status,
			'data_registered' => $data_registered,
		]);

		return true;
	}

	public function add_pemeriksa($id_user, $nama, $dataRegistered)
	{
		$this->db->where('id_user_detail', $id_user);
		$this->db->update('user_detail', [
			'nama_lengkap' => $nama,
			'data_registered' => $dataRegistered,
		]);
	}
	public function update_skrining_kesehatan($id_user, $skrining)
	{
		$this->db->where('id_user_detail', $id_user);
		$this->db->update('user_detail', [
			'id_pemeriksaan_survei' => $skrining
		]);
	}
	public function update_kuesioner_kepribadian($id_user, $kuesioner)
	{
		$this->db->where('id_user_detail', $id_user);
		$this->db->update('user_detail', [
			'id_pemeriksaan_psikolog' => $kuesioner
		]);
	}
	public function hitung($id_user)
	{

		$this->db->select('id_user_detail');
		$this->db->order_by('id_user_detail', 'ASC');
		$query = $this->db->get('user_detail');

		// Cari posisi urutan ID
		$urutan = 1;
		foreach ($query->result() as $row) {
			if ($row->id_user_detail == $id_user) {
				return $urutan;
			}
			$urutan++;
		}
		return -1; // Jika tidak ditemukan
	}

	public function count_data_catin()
	{
		$this->db->where('status', 1);
		$this->db->from('user_detail');
		$dataCatin = $this->db->count_all_results();



		return $dataCatin;
	}
	public function count_cetak_kartu()
	{

		$this->db->where('status', 2);
		$this->db->from('user_detail');
		$cetakKartu = $this->db->count_all_results();
		return $cetakKartu;
	}


	public function count_catin_bermasalah()
	{
		$this->db->where('status', 3);
		$this->db->from('user_detail');
		$CatinBermasalah = $this->db->count_all_results();
		return $CatinBermasalah;
	}


	public function hitung_kuota($today)
	{
		$this->db->where('data_registered', $today);
		$this->db->from('user_detail');
		$tes = $this->db->count_all_results();
		return $tes;
	}

	public function delete_by_id($user_id)
	{
		$this->db->delete('user_detail', array('id_user_detail' => $user_id));
	}

	public function search($keyword)
	{
		if (!$keyword) {
			return null;
		}

		// Convert keyword to lowercase
		if (!$keyword) {
			return null;
		}
		$keyword = strtolower($keyword);
		$this->db->select('user_detail.*, hasil_diagnosa.*'); // Memilih semua kolom dari tabel user_detail dan hasil kolom 'hasil' dari tabel hasil_diagnosa
		$this->db->from('user_detail');
		$this->db->join('hasil_diagnosa', 'user_detail.id_user_detail = hasil_diagnosa.user_id', 'left'); // Menggabungkan tabel user_detail dan hasil_diagnosa berdasarkan kolom user_id
		$this->db->join('users', 'user_detail.id_user_detail = users.id_user', 'left');
		$this->db->where('nik IS NOT NULL');
		$this->db->where('role', 5);
		$this->db->where('nik IS NOT NULL');
		$this->db->like('LOWER(nama_lengkap)', $keyword);
		$this->db->or_like('LOWER(nik)', $keyword);
		$this->db->or_like('LOWER(nomor_telepon)', $keyword);
		$this->db->or_like('LOWER(no_pendaftaran)', $keyword);
		return $this->db->get()->result_array();
	}

	public function getLaporanByDateRange($tanggal_awal, $tanggal_akhir)
	{
		$this->db->select('user_detail.*, hasil_diagnosa.*'); // Memilih semua kolom dari tabel user_detail dan hasil kolom 'hasil' dari tabel hasil_diagnosa
		$this->db->from('user_detail');
		$this->db->join('hasil_diagnosa', 'user_detail.id_user_detail = hasil_diagnosa.user_id', 'left'); // Menggabungkan tabel user_detail dan hasil_diagnosa berdasarkan kolom user_id
		$this->db->where('user_detail.tanggal_periksa >=', $tanggal_awal);
		$this->db->where('user_detail.tanggal_periksa <=', $tanggal_akhir);
		return $this->db->get()->result_array();
	}

	public function tanggal_cetak($tglAwal, $tglAkhir)
	{
		// Pastikan format tanggal benar dan sesuai dengan format di database
		$this->db->where('data_registered >=', $tglAwal);
		$this->db->where('data_registered <=', $tglAkhir);
		$query = $this->db->get('user_detail');
		return $query->result_array();
	}

	public function update_data_verifikasi($id, $verifikasi){
		$this->db->where('id_user_detail', $id);
		$this->db->update('user_detail',['id_status_verifikasi' => $verifikasi]);
	}

	public function update_data_aktif($id, $aktif){
		$this->db->where('id_user_detail', $id);
		$this->db->update('user_detail',['id_status_aktif' => $aktif]);
	}
}
