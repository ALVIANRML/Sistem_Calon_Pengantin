<?php
defined('BASEPATH') or exit('No direct script access allowed');


require_once FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dashboard_psikolog extends CI_Controller

{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('twilio');
		$this->load->library('session');
		$this->load->model('m_Tanggal_Pemeriksaan');
		$this->load->model('m_User_detail');
		$this->load->model('m_Auth');
		$this->load->model('m_Penyakit');
		$this->load->model('m_gejala');
		$this->load->model('m_kelompok_gejala');
		$this->load->model('m_Hasil_Diagnosa');
		$this->load->model('m_Nilai_Pakar');
	}

	public function view_psikolog()
	{
		$dataCatin = $this->m_User_detail->count_data_catin();
		$this->session->set_userdata('data_catin', $dataCatin);
		$this->load->view('Dashboard/psikolog/psikolog');
	}

	public function view_data()
	{

		$keyword = $this->input->get('search');
		$tanggal = $this->session->userdata('psikolog_tanggal_filter');

		// var_dump($keyword);
		// exit;
		if ($keyword != null) {
			$keyword = $this->m_User_detail->search($keyword);
			// Ambil ID dari hasil pencarian
			$id = array_map(function ($user) {
				return $user['id_user_detail'];
			}, $keyword);

			if ($tanggal != null) {
				// Panggil model dengan ID array dan tanggal
				$data['user_detail'] = $this->m_User_detail->get_by_id_and_tanggal($id, $tanggal);
			} else {
				$data['user_detail'] = $keyword;
			}
		} else {
			if ($tanggal == null) {
				$data['user_detail'] = $this->m_User_detail->all();
				// var_dump($data);
				// exit;
			} else {
				$data['user_detail'] = $this->m_User_detail->get_by_data_registered($tanggal);
			}
		}
		$this->load->view('Dashboard/psikolog/data_psikolog', $data);
	}

	public function data_verifikasi(){
		$verifikasi = $this->input->post('data_verifikasi');
		$id = $this->input->post('id');
		$this->m_User_detail->update_psikolog_verifikasi($id,$verifikasi);
		redirect('dashboard_psikolog/view_data');

	}

	public function psikolog_filter_tanggal()
	{
		$id_tanggal = 'c1116372-6028-0013-f4f6-b8cd6e12f2f2';
		$tanggal = $this->input->post('tanggal');
		if ($tanggal == '') {
			$tanggal = null;
		}
		$this->m_Tanggal_Pemeriksaan->tanggal_periksa($id_tanggal, $tanggal);
		$tanggal = $this->m_Tanggal_Pemeriksaan->get_tanggal($id_tanggal);
		$this->session->set_userdata('psikolog_tanggal_filter', $tanggal);
		redirect('Dashboard_psikolog/view_data');
	}
}
