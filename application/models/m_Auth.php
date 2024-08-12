<?php

class m_Auth extends CI_Model

{

	// register	
	public function input_user($id, $nama, $password, $role,  $created_at, $nomorTelepon, $tanggalLahir)
	{
		$this->db->trans_start();

		$this->db->query("INSERT INTO users(id_user, nama, password, role, created_at, nomor_telepon, tanggal_lahir,id_user_detail) VALUES ('$id', '$nama', '$password', '$role','$created_at', '$nomorTelepon', '$tanggalLahir','$id')");
		$this->db->query("INSERT INTO user_detail(id_user_detail) VALUES ('$id')");
		$this->db->query("INSERT INTO hasil_diagnosa(user_id) VALUES ('$id')");
		$this->db->trans_complete();

		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}


	// login
	public function check_login($nama)
	{
		$hasil = $this->db->query("SELECT * FROM users WHERE nama='$nama'");
		return $hasil;
	}


	public function get_user_by_phone($nomor_telepon)
	{
		$this->db->where('nomor_telepon', $nomor_telepon);
		$query = $this->db->get('users');
		return $query;
	}

	// UPDATE PASSWORDD
	public function update_password($user_id, $new_password)
	{
		$this->db->where('id_user', $user_id);
		$this->db->update('users', ['password' => $new_password]);
	}

	public function get_users($id_user)
	{
		$this->db->where('id_user', $id_user);
		$query = $this->db->get('users');
		return $query;
	}

	public function delete_by_id($user_id)
	{
		$this->db->delete('users', array('id_user' => $user_id));
	}


	public function user_pemeriksa()
	{
		$this->db->where_in('role', [1, 2, 3, 4]);
		$query = $this->db->get('users');
		return $query->result_array();
	}


	public function update_user_pemeriksa($id, $username, $password, $role,  $created_at, $nomorTelepon, $tanggalLahir)
	{
		$this->db->where('id_user', $id);
		$this->db->update('users', [
			'nama' => $username,
			'password' => $password,
			'role' => $role,
			'created_at' => $created_at,
			'nomor_telepon' => $nomorTelepon,
			'tanggal_lahir' => $tanggalLahir,
		]);
	}



	public function search($keyword)
	{
		if (!$keyword) {
			return null;
		}
		$this->db->where_in('role', [1, 2, 3, 4]);
		$this->db->like('nama', $keyword);
		$this->db->or_like('password', $keyword);
		$this->db->or_like('nomor_telepon', $keyword);
		$query = $this->db->get('users');
		return $query->result_array();
	}

	public function users_userDetail()
	{
		$query = $this->db->select('*')
			->from('user_detail')
			->join('users', 'users.id_user_detail = user_detail.id_user_detail')
			->get();

			return $query->result_array();

		// Lakukan sesuatu dengan $nama_lengkap

	}

	public function get_by_id($id_user_details)
	{
		// Menggunakan where_in untuk filter berdasarkan array
		$this->db->select('*, users.tanggal_lahir as tanggalLahir, users.nomor_telepon as nomorTelepon');
		$this->db->from('users');
		$this->db->join('user_detail', 'user_detail.id_user_detail = users.id_user');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function search_user_pemeriksa($keyword)
	{
		$this->db->where_in('role', [1, 2, 3, 4]);
		$this->db->select('*, users.tanggal_lahir as tanggalLahir, users.nomor_telepon as nomorTelepon');
		$this->db->from('users');
		$this->db->join('user_detail', 'user_detail.id_user_detail = users.id_user');
		$this->db->like('nama', $keyword);
		$this->db->or_like('nama_lengkap', $keyword);
		// $this->db->or_like('nomorTelepon', $keyword);
		$query = $this->db->get();
		return $query->result_array();
	}
}
