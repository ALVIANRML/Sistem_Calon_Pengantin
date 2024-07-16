<?php
// models/District_model.php
class m_kecamatan extends CI_Model {
    public function get_kecamatan_by_kota($kota_id) {
		return $this->db->get_where('kecamatan', ['kota_id' => $kota_id])->result();
    }
}
