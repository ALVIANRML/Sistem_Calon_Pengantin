<?php

class m_Auth extends CI_Model

{

	// register	
	public function input_user($id, $nama, $password, $role,  $created_at, $nomorTelepon, $tanggalLahir)
	{
		$this->db->trans_start();

		$this->db->query("INSERT INTO users(id_user, nama, password, role, created_at, nomor_telepon, tanggal_lahir,id_user_detail) VALUES ('$id', '$nama', '$password', '$role','$created_at', '$nomorTelepon', '$tanggalLahir','$id')");
		$this->db->trans_complete();

		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}


	// login
	public function check_login($nama)
	{
		   $hasil=$this->db->query("SELECT * FROM users WHERE nama='$nama'");
        return $hasil;
        
    }

    

}
