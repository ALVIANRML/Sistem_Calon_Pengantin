<?php
// models/Subdistrict_model.php
class m_kelurahan extends CI_Model {
    public function get_kelurahan_by_kecamatan($kecamatan_id) {
        return $this->db->get_where('kelurahan', ['kecamatan_id' => $kecamatan_id])->result();
    }
}
