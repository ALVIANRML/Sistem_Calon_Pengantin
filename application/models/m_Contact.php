<?php

class m_Contact extends CI_Model
{
	public function contact($id, $firstName,$lastName,$address,$description){
		$this->db->trans_start();

		$this->db->query("INSERT INTO contact(id, first_name,last_name,address,description) VALUES ('$id', '$firstName','$lastName','$address','$description')");

		$this->db->trans_complete();

		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}
}
?>
