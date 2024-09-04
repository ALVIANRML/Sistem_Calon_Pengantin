<?php
defined('BASEPATH') or exit('No direct script access allowed');


require_once FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dashboard_bnn extends CI_Controller

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

	public function view_bnn(){
		
		$this->load->view('Dashboard/bnn/bnn');
	}

	public function view_data(){
		$keyword = $this->input->get('search');
		$tanggal = $this->session->userdata('bnn_tanggal_filter');

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
		$this->load->view('Dashboard/bnn/data_bnn', $data);
	}

	public function data_verifikasi(){
		$verifikasi = $this->input->post('data_verifikasi');
		$id = $this->input->post('id');
		$this->m_User_detail->update_bnn_verifikasi($id,$verifikasi);
		redirect('dashboard_bnn/view_data');

	}

	public function bnn_filter_tanggal()
	{
		$id_tanggal = '44ff9962-5668-aeeb-a1a6-4e730d5f1752';
		$tanggal = $this->input->post('tanggal');
		if ($tanggal == '') {
			$tanggal = null;
		}
		$this->m_Tanggal_Pemeriksaan->tanggal_periksa($id_tanggal, $tanggal);
		$tanggal = $this->m_Tanggal_Pemeriksaan->get_tanggal($id_tanggal);
		$this->session->set_userdata('bnn_tanggal_filter', $tanggal);
		redirect('Dashboard_bnn/view_data');
	}




}


