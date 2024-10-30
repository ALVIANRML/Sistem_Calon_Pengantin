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
		$id_pemeriksa = $this->session->userdata('id_user');
		$id_pemeriksa = $this->m_User_detail->getpemeriksa($id_pemeriksa);
		$this->session->set_userdata('nama_pemeriksa', $id_pemeriksa[0]['nama_lengkap']);
		$keyword = $this->input->get('search');
		$tanggal = $this->session->userdata('psikolog_tanggal_filter');

		$config = array();
		$config['base_url'] = base_url('dashboard_admin/view_data'); // URL untuk halaman pagination
		$config['per_page'] = 5; // Jumlah data per halaman
		$config['uri_segment'] = 3; // Segmen URI untuk mengetahui halaman
		$config['num_links'] = 5; // Jumlah link angka halaman
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		if ($keyword != null) {
			$search = $this->m_User_detail->search($keyword, $config['per_page'], $page);
			$count = $this->m_User_detail->search_count($keyword);
			$config['base_url'] = base_url('dashboard_psikolog/view_data');
			$config['suffix'] = '?search=' . urlencode($keyword); // Tambahkan query string di akhir setiap link
			$config['first_url'] = $config['base_url'] . $config['suffix'];

			// Ambil ID dari hasil pencarian
			$id = array_map(function ($user) {
				return $user['id_user_detail'];
			}, $count);
			if ($tanggal != null) {
				$config['base_url'] = base_url('dashboard_psikolog/view_data');
				$config['suffix'] = '?search=' . urlencode($keyword); // Tambahkan query string di akhir setiap link
				$config['first_url'] = $config['base_url'] . $config['suffix'];
				$data['id_user_detail'] = $this->m_User_detail->get_by_id_and_tanggal_count($id, $tanggal);
				$count = count((array) $data['id_user_detail']);
				$data['user_detail'] = $this->m_User_detail->get_by_id_and_tanggal($id, $tanggal, $config['per_page'], $page);
			} else {
				$data['user_detail'] = $search;
				$count = count((array) $count);
			}
		} else {
			if ($tanggal == null) {
				$config['base_url'] = base_url('dashboard_psikolog/view_data');
				$data['id_user_detail'] = $this->m_User_detail->all_count();
				$count = count((array) $data['id_user_detail']);
				$data['user_detail'] = $this->m_User_detail->all($config['per_page'], $page);
			} else {
				$config['base_url'] = base_url('dashboard_psikolog/view_data');
				$data['id_user_detail'] = $this->m_User_detail->get_by_data_registered_count($tanggal);
				$data['user_detail'] = $this->m_User_detail->get_by_data_registered($tanggal, $config['per_page'], $page);
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
		$data['start'] = $page;
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('Dashboard/psikolog/data_psikolog', $data);
	}

	public function data_verifikasi()
	{
		$verifikasi = $this->input->post('data_verifikasi');
		$id = $this->input->post('id');
		$this->m_User_detail->update_psikolog_verifikasi($id, $verifikasi);
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
