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
		$this->load->view('Dashboard/psikolog/data_bnn');
	}


}


