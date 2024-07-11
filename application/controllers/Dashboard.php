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
		$this->load->model('m_Dashboard');
		// $this->load
	}
	public function tampil()
	{
		$this->load->view('Dashboard/admin');
	}
	public function admin()
	{
		$tanggal = $this->input->post('tanggal_pemeriksaan');
		$id_status = $this->input->post('status');
		$id_tanggal = 'd4973c6f-3510-4edc-8b49-e044b873bb26';

		$this->m_Dashboard->tanggal_pemeriksaan($id_tanggal, $id_status, $tanggal);

		redirect('Dashboard/tampil');
	}

	public function kesehatan()
	{
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
