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
	public function admin()
	{
		$tanggal = $this->input->post('tanggal_pemeriksaan');
		$id_status = $this->input->post('status');
		$id_tanggal = 'd4973c6f-3510-4edc-8b49-e044b873bb26';

		$this->m_Tanggal_Pemeriksaan->tanggal_pemeriksaan($id_tanggal, $id_status, $tanggal);
		redirect('Dashboard/view_admin');
	}

	// kesehatan
	public function view_kesehatan()
	{
		$this->load->view('Dashboard/kesehatan');
	}
	public function kesehatan()
	{
		$tanggal = $this->input->post('tanggal_pemeriksaan');
		$id_status = $this->input->post('status');
		$id_tanggal = 'ee250336-d65f-9309-742e-3c500258963d';
		$this->m_Tanggal_Pemeriksaan->tanggal_pemeriksaan($id_tanggal, $id_status, $tanggal);
		$tanggalexisted = $this->m_Tanggal_Pemeriksaan->get_tanggal($id_tanggal);
		$this->session->set_userdata('tanggal', $tanggalexisted);
		redirect('Dashboard/view_kesehatan');
	}



	public function bnn()
	{
	}
	public function psikolog()
	{
	}
	public function catin()
	{
	}
}
