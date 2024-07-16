<?php

// models/provinsimodel.php
class m_provinsi extends CI_Model {
    public function get_all_provinsi() {
        return $this->db->get('provinsi')->result();
    }
}
