<?php
class m_User_detail extends CI_Model
{



	public function all()
	{

		$query = $this->db->get('user_detail');
        // Mengembalikan hasil sebagai array
        return $query->result_array();
	}

	public function getAll($id_user)
	{

		$this->db->where('id_user_detail', $id_user);
		$query = $this->db->get('user_detail');
		return $query;
	}


	public function update($id_user, $nomor_pendaftaran, $nama, $nik, $tempatLahir, $tanggalLahir, $umur, $jenisKelamin, $agama, $pendidikan, $pekerjaan, $nomorTelepon, $provinsi, $kota, $kecamatan, $kelurahan, $alamat, $pernikahanKe, $tanggalPernikahan, $fotoUser, $fotoktp, $fotokk, $fotoSurat, $status, $data_registered)
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
			'foto_user' => $fotoUser,
			'foto_ktp' => $fotoktp,
			'foto_kk' => $fotokk,
			'foto_surat' => $fotoSurat,
			'status' => $status,
			'data_registered' => $data_registered,
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

	
}
