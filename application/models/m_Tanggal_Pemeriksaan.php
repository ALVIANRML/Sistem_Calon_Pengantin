<?php
class m_Tanggal_Pemeriksaan extends CI_Model
{
	public function tanggal_pemeriksaan($id_tanggal, $id_status, $tanggal)
	{


		$this->db->where('id_tanggal', $id_tanggal);
		// var_dump($id_tanggal);
		// exit;
		$this->db->update('tanggal_pemeriksaan', ['id_status' => $id_status, 'tanggal' => $tanggal]);
	}

	public function get_status($id_tanggal)
	{

		$this->db->select('id_status');
		$this->db->from('tanggal_pemeriksaan');
		$this->db->where('id_tanggal', $id_tanggal);
		$query = $this->db->get();

		
		if ($query->num_rows() > 0) {
			return $query->row()->id_status;
		}
		return null;
	}
	public function get_tanggal($id_tanggal)
	{

		$this->db->select('tanggal');
		$this->db->from('tanggal_pemeriksaan');
		$this->db->where('id_tanggal', $id_tanggal);
		$query = $this->db->get();

		
		if ($query->num_rows() > 0) {
			return $query->row()->tanggal;
		}
		return null;
	}
}
