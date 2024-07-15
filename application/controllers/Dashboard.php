<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller

{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		// $this->load->model('m_Auth');
		$this->load->library('twilio');
		$this->load->library('session');
		$this->load->model('m_Tanggal_Pemeriksaan');
		// $this->load
	}

	// admin
	public function view_admin()
	{
		$this->load->view('Dashboard/admin');
	}

	// kesehatan
	public function view_kesehatan()
	{
		$this->load->view('Dashboard/kesehatan');
	}
	public function view_bnn()
	{
		$this->load->view('Dashboard/bnn');
	}
	public function view_psikolog()
	{
		$this->load->view('Dashboard/psikolog');
	}
	public function view_catin()
	{
		$this->load->view('Dashboard/catin');
	}

	public function view_catin_pemeriksaan(){
		$this->load->view('Dashboard/catin_pemeriksaan');
	}



	public function tanggal()
	{
		$role = $this->session->userdata('role');

		// admin
		if ($role == 1) {
			$awal_tanggal = date('Y-m-d');
			$tanggal = $this->input->post('tanggal_pemeriksaan');
			if (strtotime($tanggal) < strtotime($awal_tanggal)) {
				$this->session->set_flashdata('error_tanggal', 'Tanggal pemeriksaan tidak boleh lebih awal dari tanggal hari ini.');
				redirect('Dashboard/view_admin');
			}
			$id_status = $this->input->post('status');
			$id_tanggal = 'd4973c6f-3510-4edc-8b49-e044b873bb26';
			$this->m_Tanggal_Pemeriksaan->tanggal_pemeriksaan($awal_tanggal, $id_tanggal, $id_status, $tanggal);
			redirect('Dashboard/view_admin');

			// kesehatan
		} else if ($role == 2) {
			$tanggal = $this->input->post('tanggal_pemeriksaan');
			$id_status = $this->input->post('status');
			$id_tanggal = 'ee250336-d65f-9309-742e-3c500258963d';
			$this->m_Tanggal_Pemeriksaan->tanggal_pemeriksaan($id_tanggal, $id_status, $tanggal);
			$tanggalexisted = $this->m_Tanggal_Pemeriksaan->get_tanggal($id_tanggal);
			$this->session->set_userdata('tanggal', $tanggalexisted);
			redirect('Dashboard/view_kesehatan');
		} else if ($role == 3) {

			// bnn
			$tanggal = $this->input->post('tanggal_pemeriksaan');
			$id_status = $this->input->post('status');
			$id_tanggal = '44ff9962-5668-aeeb-a1a6-4e730d5f1752';
			$this->m_Tanggal_Pemeriksaan->tanggal_pemeriksaan($id_tanggal, $id_status, $tanggal);
			$tanggalexisted = $this->m_Tanggal_Pemeriksaan->get_tanggal($id_tanggal);
			$this->session->set_userdata('tanggal', $tanggalexisted);
			redirect('Dashboard/view_bnn');
		} else if ($role == 4) {

			// psikolog
			$tanggal = $this->input->post('tanggal_pemeriksaan');
			$id_status = $this->input->post('status');
			$id_tanggal = 'c1116372-6028-0013-f4f6-b8cd6e12f2f2';
			$this->m_Tanggal_Pemeriksaan->tanggal_pemeriksaan($id_tanggal, $id_status, $tanggal);
			$tanggalexisted = $this->m_Tanggal_Pemeriksaan->get_tanggal($id_tanggal);
			$this->session->set_userdata('tanggal', $tanggalexisted);
			redirect('Dashboard/view_psikolog');
		} else {
			return ('anda tidak memiliki akses');
		}
	}
}
