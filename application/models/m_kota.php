<?php
// models/City_model.php
class m_kota extends CI_Model{
public function get_kota_by_provinsi($provinsi_id) {
	return $this->db->get_where('kota', ['provinsi_id' => $provinsi_id])->result();

	}
}
