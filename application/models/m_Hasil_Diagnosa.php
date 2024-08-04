<?php
class m_Hasil_Diagnosa extends CI_Model
{
	public function hasil_diagnosa($id_user) {
        $this->db->where('user_id', $id_user);
        $query = $this->db->get('hasil_diagnosa'); 
        return $query;
    }

	public function delete_by_id($user_id){
		$this->db->delete('hasil_diagnosa', array('user_id' => $user_id));
	}
}
