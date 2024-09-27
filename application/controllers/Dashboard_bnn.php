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
		$dataCatin = $this->m_User_detail->count_data_catin();
		$this->session->set_userdata('data_catin', $dataCatin);
		$this->load->view('Dashboard/bnn/bnn');
	}

	public function view_data(){
		$keyword = $this->input->get('search');
		$tanggal = $this->session->userdata('bnn_tanggal_filter');

		$config = array();
		$config['base_url'] = base_url('dashboard_bnn/view_data'); // URL untuk halaman pagination
		$config['per_page'] = 2; // Jumlah data per halaman
		$config['uri_segment'] = 3; // Segmen URI untuk mengetahui halaman
		$config['num_links'] = 5; // Jumlah link angka halaman
		if ($keyword != null) {
			$search = $this->m_User_detail->search($keyword, $config['per_page'], $this->uri->segment(3));
			$count = $this->m_User_detail->search_count($keyword);
			$config['base_url'] = base_url('dashboard_bnn/view_data');
			$config['suffix'] = '?search=' . urlencode($keyword); // Tambahkan query string di akhir setiap link
			$config['first_url'] = $config['base_url'] . $config['suffix'];

			// Ambil ID dari hasil pencarian
			$id = array_map(function ($user) {
				return $user['id_user_detail'];
			}, $count);
			if ($tanggal != null) {
				$config['base_url'] = base_url('dashboard_bnn/view_data');
				$config['suffix'] = '?search=' . urlencode($keyword); // Tambahkan query string di akhir setiap link
				$config['first_url'] = $config['base_url'] . $config['suffix'];
				$data['id_user_detail'] = $this->m_User_detail->get_by_id_and_tanggal_count($id, $tanggal);
				$count = count((array) $data['id_user_detail']);
				$data['user_detail'] = $this->m_User_detail->get_by_id_and_tanggal($id, $tanggal, $config['per_page'], $this->uri->segment(3));
				
			} else {
				$data['user_detail'] = $search;
				$count = count((array) $count);
			}
		} else {
			if ($tanggal == null) {
				$config['base_url'] = base_url('dashboard_bnn/view_data');
				$data['id_user_detail'] = $this->m_User_detail->all_count();
				$count = count((array) $data['id_user_detail']);
				$data['user_detail'] = $this->m_User_detail->all($config['per_page'], $this->uri->segment(3));
			} else {
				$config['base_url'] = base_url('dashboard_bnn/view_data');
				$data['id_user_detail'] = $this->m_User_detail->get_by_data_registered_count($tanggal);
				$data['user_detail'] = $this->m_User_detail->get_by_data_registered($tanggal, $config['per_page'], $this->uri->segment(3));
				$count = count((array) $data['id_user_detail']);
			}
		}
		$config['full_tag_open'] = '<nav><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');
		$config['total_rows'] = $count;
		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
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


