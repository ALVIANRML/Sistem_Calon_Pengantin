<?php
class m_User_detail extends CI_Model
{


public function getAll($id_user){
	
        $this->db->where('id_user_detail', $id_user);
        $query = $this->db->get('user_detail'); 
        return $query;
    
}


	public function update($id_user, $nama, $nik, $tempatLahir, $tanggalLahir, $umur, $jenisKelamin, $agama, $pendidikan, $pekerjaan, $nomorTelepon, $provinsi, $kota, $kecamatan, $kelurahan, $alamat, $pernikahanKe, $tanggalPernikahan, $fotoUser, $fotoktp, $fotokk, $fotoSurat)
	{
		$this->db->where('id_user_detail', $id_user);

		$this->db->update('user_detail', [
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
		]);
	}

	public function hitung($id_user){
		
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
}
