<?php
defined('BASEPATH') or exit('No direct script access allowed');


require_once FCPATH . 'vendor/autoload.php';


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dashboard_Admin extends CI_Controller

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
		$this->load->library('pagination');
	}


	public function view_admin()
	{
		$id_tanggal = '0ff4c7bc-cf4e-4c38-8d0a-f5a7de5c5c7e';
		$tanggal = $this->m_Tanggal_Pemeriksaan->get_tanggal($id_tanggal);
		$this->session->set_userdata('tanggal_periksa', $tanggal);
		$id_tanggal = 'd4973c6f-3510-4edc-8b49-e044b873bb26';
		$tanggal = $this->m_Tanggal_Pemeriksaan->get_tanggal($id_tanggal);
		$this->session->set_userdata('tanggal_pendaftaran', $tanggal);
		$status = $this->m_Tanggal_Pemeriksaan->get_status($id_tanggal);
		$this->session->set_userdata('status', $status);
		$this->session->set_userdata('tanggal', $tanggal);
		$dataCatin = $this->m_User_detail->count_data_catin();
		$cetakKartu = $this->m_User_detail->count_cetak_kartu();
		$catinBermasalah = $this->m_User_detail->count_catin_bermasalah();
		$this->session->set_userdata('data_catin', $dataCatin);
		$this->session->set_userdata('cetak_kartu', $cetakKartu);
		$this->session->set_userdata('catin_bermasalah', $catinBermasalah);
		$this->load->view('Dashboard/admin/admin');
	}

	public function view_data_catin()
	{
		$keyword = $this->input->get('search');
		$tanggal = $this->session->userdata('admin_tanggal_filter');
		$config = array();
		$config['base_url'] = base_url('dashboard_admin/view_data_catin');
		$config['per_page'] = 5; // Jumlah data per halaman
		$config['uri_segment'] = 3; // Segmen URI untuk mengetahui halaman
		$config['num_links'] = 5; // Jumlah link angka halaman
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		if ($keyword != null) {
			$search = $this->m_User_detail->search($keyword, $config['per_page'], $page);
			$count = $this->m_User_detail->search_count($keyword);
			$config['suffix'] = '?search=' . urlencode($keyword); // Tambahkan query string di akhir setiap link
			$config['first_url'] = $config['base_url'] . $config['suffix'];

			// Ambil ID dari hasil pencarian
			$id = array_map(function ($user) {
				return $user['id_user_detail'];
			}, $count);
			if ($tanggal != null) {

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

				$data['id_user_detail'] = $this->m_User_detail->all_count();
				$count = count((array) $data['id_user_detail']);
				$data['user_detail'] = $this->m_User_detail->all($config['per_page'], $page);
			} else {

				$data['id_user_detail'] = $this->m_User_detail->get_by_data_registered_count($tanggal);
				$data['user_detail'] = $this->m_User_detail->get_by_data_registered($tanggal, $config['per_page'], $page);
				$count = count((array) $data['id_user_detail']);
			}
		}
		// Pagination configuration
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
		$config['total_rows'] = $count; // Total number of data
		$this->pagination->initialize($config);

		// Add this line to calculate the starting number for row numbers (angka)
		$data['start'] = $page;

		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('Dashboard/admin/data_catin_admin', $data);
	}

	public function data_verifikasi()
	{
		$verifikasi = $this->input->post('data_verifikasi');
		$id = $this->input->post('id');
		$this->m_User_detail->update_data_verifikasi($id, $verifikasi);
		redirect('dashboard_admin/view_data_catin');
	}


	public function aktivasi()
	{
		$aktif = $this->input->post('aktif');
		$id = $this->input->post('id');
		$this->m_User_detail->update_data_aktif($id, $aktif);
		redirect('dashboard_admin/view_data_catin');
	}

	public function hapus()
	{
		$id = $this->input->post('id');
		$this->m_User_detail->hapus_data($id);
		redirect('dashboard_admin/view_data_catin');
	}

	public function edit()
	{
		$id_user = $this->session->userdata('id_user');
		$userDetail = $this->m_User_detail->getAll($id_user);
		if ($userDetail->num_rows() > 0) {
			$userDetail = $userDetail->row_array();
			$this->session->set_userdata('nama_lengkap', $userDetail['nama_lengkap']);
			$this->session->set_userdata('foto_user', $userDetail['foto_user']);
			$this->session->set_userdata('foto_ktp', $userDetail['foto_ktp']);
			$this->session->set_userdata('foto_kk', $userDetail['foto_kk']);
			$this->session->set_userdata('foto_surat', $userDetail['foto_surat']);
		}


		$this->form_validation->set_rules(
			'nama_lengkap',
			'Nama',
			'required|trim',
			[
				'required' => 'nama tidak boleh kosong',
			]
		);

		$this->form_validation->set_rules(
			'nik',
			'NIK',
			'required|trim|min_length[16]',
			[
				'required' => 'NIK tidak boleh kosong',
				'min_length' => 'NIK terlalu pendek',
			]
		);

		$this->form_validation->set_rules(
			'tempat_lahir',
			'Tempat Lahir',
			'required|trim',
			[
				'required' => 'Tempat Lahir tidak boleh kosong',
			]
		);

		$this->form_validation->set_rules(
			'tanggal_lahir',
			'Tanggal Lahir',
			'required|trim',
			[
				'required' => 'Tanggal Lahir tidak boleh kosong',
			]
		);

		$this->form_validation->set_rules(
			'agama',
			'Agama',
			'required|trim',
			[
				'required' => 'Agama tidak boleh kosong',
			]
		);
		$this->form_validation->set_rules(
			'pendidikan',
			'Pendidikan Terakhir',
			'required|trim',
			[
				'required' => 'Pendidikan Terakhir tidak boleh kosong',
			]
		);
		$this->form_validation->set_rules(
			'pekerjaan',
			'Pekerjaan',
			'required|trim',
			[
				'required' => 'Pekerjaan tidak boleh kosong',
			]
		);
		$this->form_validation->set_rules(
			'umur',
			'Umur',
			'required|trim',
			[
				'required' => 'Umur tidak boleh kosong',
			]
		);

		$this->form_validation->set_rules(
			'jenis_kelamin',
			'Jenis Kelamin',
			'required|trim',
			[
				'required' => 'Jenis Kelamin tidak boleh kosong',
			]
		);
		$this->form_validation->set_rules(
			'nomor_telepon',
			'Nomor HP',
			'required|trim',
			[
				'required' =>  'Nomor HP tidak boleh kosong',
			]
		);
		$this->form_validation->set_rules(
			'alamat',
			'Alamat',
			'required|trim',
			[
				'required' => 'Alamat tidak boleh kosong',
			]
		);

		$this->form_validation->set_rules(
			'tanggal_pernikahan',
			'Tanggal Pernikahan',
			'required|trim',
			[
				'required' => 'Tanggal Pernikahan tidak boleh kosong',
			]
		);

		$this->form_validation->set_rules(
			'pernikahan_ke',
			'"Pernikahan ke"',
			'required|trim',
			[
				'required' => '"Pernikahan ke" tidak boleh kosong',
			]
		);

		if ($this->form_validation->run() == false) {

			redirect('dashboard_admin/view_data_catin');
		} else {
			$path = 'uploads/photo/';
			$nama = $this->session->userdata('username');
			$this->load->library('upload');

			// Konfigurasi upload file
			$upload_config = [
				'upload_path' => $path,
				'allowed_types' => 'jpg|png|jpeg|gif',
				'max_size' => '100000',  // 20MB max
				'max_width' => '720', // pixel
				'max_height' => '720' // pixel
			];

			// Upload dan simpan foto user
			$upload_config['file_name'] = $nama . '_pas_foto';
			$this->upload->initialize($upload_config);
			$foto_saya_upload = $this->upload->do_upload('foto_user');

			$fotoUser = $this->session->userdata('foto_user');
			if ($foto_saya_upload) {
				@unlink($path . $fotoUser);
				$foto_saya = $this->upload->data();
				$fotoUser = $foto_saya['file_name'];
			} else {
				$this->session->set_flashdata('eror_input_file', 'eror_input_file');
			}

			// Upload dan simpan foto KTP
			$upload_config['file_name'] = $nama . '_ktp';
			$this->upload->initialize($upload_config);
			$foto_ktp_upload = $this->upload->do_upload('foto_ktp');
			$fotoktp = $this->session->userdata('foto_ktp');
			if ($foto_ktp_upload) {
				@unlink($path . $fotoktp);
				$foto_ktp = $this->upload->data();
				$fotoktp = $foto_ktp['file_name'];
			} else {
				$this->session->set_flashdata('eror_input_file', 'eror_input_file');
			}

			// Upload dan simpan foto KK
			$upload_config['file_name'] = $nama . '_kk';
			$this->upload->initialize($upload_config);
			$foto_kk_upload = $this->upload->do_upload('foto_kk');
			$fotokk = $this->session->userdata('foto_kk');
			if ($foto_kk_upload) {
				@unlink($path . $fotokk);
				$foto_kk = $this->upload->data();
				$fotokk = $foto_kk['file_name'];
			} else {
				$this->session->set_flashdata('eror_input_file', 'eror_input_file');
				$fotokk = $this->session->userdata('foto_kk');
			}

			// Upload dan simpan foto Surat
			$upload_config['file_name'] = $nama . '_surat';
			$this->upload->initialize($upload_config);
			$foto_surat_upload = $this->upload->do_upload('foto_surat');
			$fotoSurat = $this->session->userdata('foto_surat');
			if ($foto_surat_upload) {
				@unlink($path . $fotoSurat);
				$foto_surat = $this->upload->data();
				$fotoSurat = $foto_surat['file_name'];
			} else {
				$this->session->set_flashdata('eror_input_file', 'eror_input_file');
				$fotoSurat = $this->session->userdata('foto_surat');
			}

			// Data untuk update
			$id_user = $this->session->userdata('id_user');
			$nomor = $this->m_User_detail->hitung($id_user);
			$tanggal_daftar = date('dmy');
			$nomor = sprintf("%03d", $nomor);
			$nomor_pendaftaran = $tanggal_daftar . $nomor;

			$nama = $this->input->post('nama_lengkap');
			$nik = $this->input->post('nik');
			$tempatLahir = $this->input->post('tempat_lahir');
			$tanggalLahir = $this->input->post('tanggal_lahir');
			$umur = $this->input->post('umur');
			$jenisKelamin = $this->input->post('jenis_kelamin');
			$agama = $this->input->post('agama');
			$pendidikan = $this->input->post('pendidikan');
			$pekerjaan = $this->input->post('pekerjaan');
			$nomorTelepon = $this->input->post('nomor_telepon');
			$provinsi = $this->input->post('provinsi');
			$kota = $this->input->post('kota');
			$kecamatan = $this->input->post('kecamatan');
			$kelurahan = $this->input->post('kelurahan');
			$alamat = $this->input->post('alamat');
			$pernikahanKe = $this->input->post('pernikahan_ke');
			$tanggalPernikahan = $this->input->post('tanggal_pernikahan');
			$tanggalPeriksa = $this->input->post('tanggal_periksa');


			if ($provinsi == null) {
				$provinsi = $this->session->userdata('provinsi');
			}
			if ($kota == null) {
				$kota = $this->session->userdata('kota');
			}
			if ($kecamatan == null) {
				$kecamatan = $this->session->userdata('kecamatan');
			}
			if ($kelurahan == null) {
				$kelurahan = $this->session->userdata('kelurahan');
			}
			if ($fotoUser == null) {
				$fotoUser = $this->session->userdata('foto_user');
			}
			if ($fotokk == null) {
				$fotokk = $this->session->userdata('foto_kk');
			}
			if ($fotoktp == null) {
				$fotoktp = $this->session->userdata('foto_ktp');
			}
			if ($fotoSurat == null) {
				$fotoSurat = $this->session->userdata('foto_surat');
			}



			$data_registered = date('Y-m-d');
			$status = 1;
			var_dump($status);
			exit;
			$this->m_User_detail->update($id_user, $nomor_pendaftaran, $nama, $nik, $tempatLahir, $tanggalLahir, $umur, $jenisKelamin, $agama, $pendidikan, $pekerjaan, $nomorTelepon, $provinsi, $kota, $kecamatan, $kelurahan, $alamat, $pernikahanKe, $tanggalPernikahan, $fotoUser, $fotoktp, $fotokk, $fotoSurat, $status, $data_registered, $tanggalPeriksa);



			$this->session->set_flashdata('input', 'input');
			redirect('dashboard_admin/view_data_catin');
		}
	}

	public function kartu_kuning($id_user)
	{
		$data['user'] = $this->m_User_detail->get_user_detail_by_id($id_user)->result_array();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->set_option('isRemoteEnabled', true);
		$this->pdf->filename = "kartu_kendali.pdf";
		$this->pdf->load_view('kartu_kendali_pdf', $data);
	}


	public function admin_filter_tanggal()
	{
		$id_tanggal = '50f5b246-20b7-4e1c-88f6-81865d50ecf0';
		$tanggal = $this->input->post('tanggal');
		if ($tanggal == '') {
			$tanggal = null;
		}
		$this->m_Tanggal_Pemeriksaan->tanggal_periksa($id_tanggal, $tanggal);
		$tanggal = $this->m_Tanggal_Pemeriksaan->get_tanggal($id_tanggal);
		$this->session->set_userdata('admin_tanggal_filter', $tanggal);
		redirect('dashboard_admin/view_data_catin');
	}



	public function tanggal_periksa()
	{
		$this->form_validation->set_rules('tanggal_periksa', 'Tanggal Pemeriksaan',);
		$id_tanggal = '0ff4c7bc-cf4e-4c38-8d0a-f5a7de5c5c7e';
		$tanggal = $this->input->post('tanggal_periksa');
		$this->m_Tanggal_Pemeriksaan->tanggal_periksa($id_tanggal, $tanggal);
	}

	public function filter_hapus_data()
	{
		$id_tanggal = '3c1d7f43-e30d-4202-8181-e87d44db53d9';
		$tanggal = $this->input->post('tanggal_del_catin');
		$this->m_Tanggal_Pemeriksaan->tanggal_periksa($id_tanggal, $tanggal);
		$this->session->set_userdata('tanggal_hapus_data', $tanggal);
		$data = $this->m_User_detail->get_by_data_registered($tanggal);
		$this->session->set_userdata('data_for_delete', $data);
		$response = [];
		$response['tanggal'] = $tanggal;

		if ($data == null) {
			$response['bool'] = 0;
		} else {
			$captcha = rand(10000, 99999);
			$this->session->set_userdata('captcha', $captcha);
			$response['captcha'] = $captcha;
			$response['bool'] = 1;
		}

		echo json_encode($response);
	}

	public function konfirmasi_hapus_data()
	{

		$option = $this->input->post('option1');
		$captchainput = $this->input->post('captcha');
		$captcha = $this->session->userdata('captcha');
		if ($option == 1) {
			if ($captchainput == $captcha) {
				$data = $this->session->userdata('data_for_delete');
				if (is_array($data) && !empty($data)) {
					// Loop through each item in the array
					foreach ($data as $user_detail) {
						// Access the id_user_detail
						$id_user_detail = $user_detail['id_user_detail'];
						$this->m_Auth->delete_by_id($id_user_detail);
						$this->m_Hasil_Diagnosa->delete_by_id($id_user_detail);
						$this->m_User_detail->delete_by_id($id_user_detail);
					}


					$this->session->set_flashdata('success_delete', 'Anda berhasil menghapus data.');
					redirect('dashboard_admin/view_data_catin');
				} else {
				}
			} else {
				$this->session->set_flashdata('error_captcha', 'Kode Yang Anda Input Salah');
				redirect('dashboard_admin/view_data_catin');
			}
		} else {
			$this->session->set_flashdata('cancel_delete', 'permintaan anda batal');
			redirect('dashboard_admin/view_data_catin');
		}
	}


	public function export()
	{
		ob_end_clean();
		// Ambil tanggal awal dan tanggal akhir dari inputan form
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$data['laporan'] = $this->m_User_detail->getLaporanByDateRange($tanggal_awal, $tanggal_akhir);
		$spreadsheet = new Spreadsheet();

		$spreadsheet->getProperties()->setCreator("DPPKB Kota Tebing Tinggi")
			->setLastModifiedBy("DPPKB Kota Tebing Tinggi")
			->setTitle("Pemeriksaan Catin");

		$spreadsheet->setActiveSheetIndex(0);

		// Isi data ke dalam sel-sel
		$spreadsheet->getActiveSheet()->setCellValue('A1', 'No');
		$spreadsheet->getActiveSheet()->setCellValue('B1', 'NIK');
		$spreadsheet->getActiveSheet()->setCellValue('C1', 'Nama Lengkap');
		$spreadsheet->getActiveSheet()->setCellValue('D1', 'Tempat Lahir');
		$spreadsheet->getActiveSheet()->setCellValue('E1', 'Tanggal Lahir');
		$spreadsheet->getActiveSheet()->setCellValue('F1', 'Usia');
		$spreadsheet->getActiveSheet()->setCellValue('G1', 'Jenis Kelamin');
		$spreadsheet->getActiveSheet()->setCellValue('H1', 'Agama');
		$spreadsheet->getActiveSheet()->setCellValue('I1', 'Tinggi Badan');
		$spreadsheet->getActiveSheet()->setCellValue('J1', 'Berat Badan');
		$spreadsheet->getActiveSheet()->setCellValue('K1', 'IMT');
		$spreadsheet->getActiveSheet()->setCellValue('L1', 'Pendidikan Terakhir');
		$spreadsheet->getActiveSheet()->setCellValue('M1', 'Pekerjaan');
		$spreadsheet->getActiveSheet()->setCellValue('N1', 'Alamat');
		$spreadsheet->getActiveSheet()->setCellValue('O1', 'Pernikahan Ke');
		$spreadsheet->getActiveSheet()->setCellValue('P1', 'Tanggal Pernikahan');
		$spreadsheet->getActiveSheet()->setCellValue('Q1', 'Tanggal Pemeriksaan');
		$spreadsheet->getActiveSheet()->setCellValue('R1', 'Tanda Anemia');
		$spreadsheet->getActiveSheet()->setCellValue('S1', 'Rapid Test');
		$spreadsheet->getActiveSheet()->setCellValue('T1', 'Plano Test');
		$spreadsheet->getActiveSheet()->setCellValue('U1', 'Test Narkoba');
		$spreadsheet->getActiveSheet()->setCellValue('V1', 'Hasil Skrining Kesehatan');
		$spreadsheet->getActiveSheet()->setCellValue('W1', 'Hasil Test Kesehatan');
		$spreadsheet->getActiveSheet()->setCellValue('X1', 'Hasil Test Narkoba');


		// Mengatur ukuran kolom
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(7);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(5);
		$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(5);
		$spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(7);
		$spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(16);
		$spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(6);
		$spreadsheet->getActiveSheet()->getColumnDimension('P')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
		$spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('T')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('U')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('V')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('W')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('X')->setWidth(20);

		$row = 2;
		$no = 1;
		foreach ($data['laporan'] as $item) {
			$tanggal_lahir_formatted = date('d/m/Y', strtotime($item['tanggal_lahir']));
			$tanggal_nikah_formatted = date('d/m/Y', strtotime($item['tanggal_pernikahan']));
			$tanggal_periksa_formatted = date('d/m/Y', strtotime($item['tanggal_periksa']));
			$spreadsheet->getActiveSheet()->setCellValue('A' . $row, $no++);
			$spreadsheet->getActiveSheet()->setCellValueExplicit('B' . $row, $item['nik'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
			$spreadsheet->getActiveSheet()->setCellValue('C' . $row, $item['nama_lengkap']);
			$spreadsheet->getActiveSheet()->setCellValue('D' . $row, $item['tempat_lahir']);
			$spreadsheet->getActiveSheet()->setCellValue('E' . $row, $tanggal_lahir_formatted);
			$spreadsheet->getActiveSheet()->setCellValue('F' . $row, $item['usia']);
			$spreadsheet->getActiveSheet()->setCellValue('G' . $row, $item['jenis_kelamin']);
			$spreadsheet->getActiveSheet()->setCellValue('H' . $row, $item['agama']);
			$spreadsheet->getActiveSheet()->setCellValue('I' . $row, $item['tinggi_badan']);
			$spreadsheet->getActiveSheet()->setCellValue('J' . $row, $item['berat_badan']);
			$spreadsheet->getActiveSheet()->setCellValue('K' . $row, $item['imt']);
			$spreadsheet->getActiveSheet()->setCellValue('L' . $row, $item['pendidikan_terakhir']);
			$spreadsheet->getActiveSheet()->setCellValue('M' . $row, $item['pekerjaan']);
			$spreadsheet->getActiveSheet()->setCellValue('N' . $row, $item['alamat']);
			$spreadsheet->getActiveSheet()->setCellValue('O' . $row, $item['pernikahan_ke']);
			$spreadsheet->getActiveSheet()->setCellValue('P' . $row, $tanggal_nikah_formatted);
			$spreadsheet->getActiveSheet()->setCellValue('Q' . $row, $tanggal_periksa_formatted);
			$spreadsheet->getActiveSheet()->setCellValue('R' . $row, $item['tanda_anemia']);
			$spreadsheet->getActiveSheet()->setCellValue('S' . $row, $item['rapid_test']);
			$spreadsheet->getActiveSheet()->setCellValue('T' . $row, $item['plano_test']);
			$spreadsheet->getActiveSheet()->setCellValue('U' . $row, $item['narkoba_test']);
			$spreadsheet->getActiveSheet()->setCellValue('V' . $row, $item['nama_sakit_catin']);
			$spreadsheet->getActiveSheet()->setCellValue('W' . $row, $item['nama_sakit_kesehatan']);
			$spreadsheet->getActiveSheet()->setCellValue('X' . $row, $item['nama_sakit_bnn']);
			$row++;
		}

		// Buat file Excel
		$filename = 'laporan.xlsx';
		$spreadsheet->getActiveSheet()->setTitle("Pemeriksaan Catin");

		// Set header untuk file Excel

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');

		// Tampilkan hasil laporan dalam bentuk file Excel
		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	}

	public function data_penyakit()
{
    $keyword = $this->input->post('input'); // Ambil kata kunci pencarian jika ada
    $page = $this->input->post('page') ?? 1; // Nomor halaman dari AJAX, default ke 1 jika kosong
    $per_page = 5; // Jumlah data per halaman

    // Menghitung jumlah total data berdasarkan pencarian
    if ($keyword) {
        $total_rows = $this->m_Penyakit->count_search($keyword); // Jumlah total hasil pencarian
        $data['id'] = $this->m_Penyakit->pagination_search($keyword, $per_page, ($page - 1) * $per_page);
    } else {
        $total_rows = $this->m_Penyakit->count_all_penyakit(); // Jumlah total data tanpa pencarian
        $data['id'] = $this->m_Penyakit->pagination_penyakit($per_page, ($page - 1) * $per_page);
    }

    // Pengaturan pagination
    $this->load->library('pagination');
    // $config['base_url'] = base_url('dashboard_admin/data_penyakit');
    $config['base_url'] = '#';
    $config['total_rows'] = $total_rows;
    $config['per_page'] = $per_page;
    $config['use_page_numbers'] = TRUE; // Menggunakan nomor halaman, bukan offset
    $config['num_links'] = 5; // Jumlah link di kiri dan kanan halaman aktif
	// $config['total_rows'] = $total_rows;

    // Pengaturan tampilan HTML untuk pagination
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


    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();

    // Jika request AJAX, kirim respons dalam bentuk JSON
    if ($this->input->is_ajax_request()) {
        echo json_encode([
            'results' => $data['id'],
            'pagination' => $data['pagination']
        ]);
        return;
    }

    // Jika bukan request AJAX, tampilkan view biasa
    $data['start'] = ($page - 1) * $per_page;
    $this->load->view('Dashboard/admin/data_penyakit', $data);
}




	public function add_penyakit()
	{
		$id 		= bin2hex(random_bytes(16));
		$kode 		= $this->input->post('kode_penyakit');
		$nama 		= $this->input->post('nama_penyakit');
		$keterangan = $this->input->post('pencegahan');
		$pemeriksa 	= $this->input->post('pemeriksa');

		$this->m_Penyakit->add_penyakit($id, $kode, $nama, $keterangan, $pemeriksa);
		redirect('dashboard_admin/data_penyakit');
	}

	public function hapus_penyakit()
	{
		$id = $this->input->post('penyakit_id');
		$this->m_Penyakit->delete_by_id($id);
		redirect('dashboard_admin/data_penyakit');
		// buat bisa edit penyakit
	}


	public function edit_penyakit()
	{
		$id 		= $this->input->post('penyakitId');
		$kode 		= $this->input->post('kode_penyakit');
		$nama 		= $this->input->post('nama_penyakit');
		$keterangan = $this->input->post('pencegahan');
		$pemeriksa 	= $this->input->post('pemeriksa');

		$this->m_Penyakit->edit_penyakit($id, $kode, $nama, $keterangan, $pemeriksa);
		redirect('dashboard_admin/data_penyakit');

		// buat bisa edit penyakit
	}

	public function data_gejala()
	{
		$keyword = $this->input->get('search'); // Ambil keyword dari URL

		// Konfigurasi Pagination
		$config = array();
		$config['base_url'] = base_url('dashboard_admin/data_gejala'); // URL dasar untuk pagination
		$config['per_page'] = 5; // Jumlah data per halaman
		$config['uri_segment'] = 3; // Segmen URI untuk mengetahui halaman
		$config['num_links'] = 5; // Jumlah link angka halaman
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		if ($keyword != null) {
			// Jika ada keyword pencarian
			$config['base_url'] = base_url('dashboard_admin/data_gejala'); // Base URL tanpa query string
			$config['suffix'] = '?search=' . urlencode($keyword); // Menambahkan query string search di setiap link
			$config['first_url'] = $config['base_url'] . $config['suffix']; // URL untuk halaman pertama dengan query string

			// Hitung total hasil pencarian
			$total_rows = $this->m_gejala->count_search($keyword);

			// Dapatkan hasil pencarian dengan pagination
			$data['id'] = $this->m_gejala->pagination_search($keyword, $config['per_page'], $page);
		} else {
			// Jika tidak ada keyword pencarian
			$total_rows = $this->m_gejala->count_all_gejala(); // Hitung total semua data
			$data['id'] = $this->m_gejala->pagination_gejala($config['per_page'], $page);
		}

		// Menambahkan tag pembuka dan penutup pada pagination
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

		// Total data untuk pagination
		$config['total_rows'] = $total_rows;

		// Inisialisasi pagination
		$this->pagination->initialize($config);
		$data['start'] = $page;
		// var_dump($data['start']);exit;
		// Menyimpan link pagination dalam $data['pagination']
		$data['pagination'] = $this->pagination->create_links();

		// Tampilkan halaman dengan data pagination
		$this->load->view('Dashboard/admin/data_gejala', $data);
	}



	public function edit_gejala()
	{
		$id 		= $this->input->post('gejalaId');
		$kode 		= $this->input->post('kodeGejala');
		$nama 		= $this->input->post('namaGejala');
		$kelompokGejala = $this->input->post('kelompokGejala');
		$this->m_gejala->edit_gejala($id, $kode, $nama, $kelompokGejala);
		redirect('dashboard_admin/data_gejala');

		// buat bisa edit penyakit
	}


	public function view_dinas_pemeriksaan()
	{
		$keyword = $this->input->get('search');


		// Konfigurasi Pagination
		// $config['base_url'] = base_url('dashboard_admin/view_dinas_pemeriksaan'); // URL untuk halaman pagination
		$config = array();
		$config['base_url'] = base_url('dashboard_admin/view_dinas_pemeriksaan'); // URL dasar untuk pagination
		$config['per_page'] = 5; // Jumlah data per halaman
		$config['uri_segment'] = 3; // Segmen URI untuk mengetahui halaman
		$config['num_links'] = 5; // Jumlah link angka halaman
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		if ($keyword != null) {
			// Jika ada keyword pencarian
			$config['base_url'] = base_url('dashboard_admin/view_dinas_pemeriksaan');
			$config['suffix'] = '?search=' . urlencode($keyword); // Tambahkan query string di akhir setiap link
			$config['first_url'] = $config['base_url'] . $config['suffix'];
			$count = $this->m_kelompok_gejala->search_count($keyword); // Hitung total hasil pencarian
			$count = count((array) $count);
			$data['id'] = $this->m_kelompok_gejala->pagination_search($keyword, $config['per_page'], $page);
		} else {
			// Jika tidak ada keyword pencarian
			$count = $this->m_kelompok_gejala->count_all_kelompok_gejala(); // Hitung total semua data
			$data['id'] = $this->m_kelompok_gejala->pagination_kelompok_gejala($config['per_page'], $page);
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
		$config['total_rows'] = $count; // Total data
		$this->pagination->initialize($config);
		$data['start'] = $page;
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('Dashboard/admin/dinas_pemeriksa', $data);
	}

	public function add_dinas_pemeriksa()
	{
		$id 		= bin2hex(random_bytes(16));
		$kelompok 	= $this->input->post('kelompok');
		$keterangan = $this->input->post('keterangan');


		$this->m_kelompok_gejala->add_kelompok_gejala($id, $kelompok, $keterangan);
		redirect('dashboard_admin/view_dinas_pemeriksaan');
	}

	public function hapus_dinas_pemeriksa()
	{
		$id = $this->input->post('gejalaId');
		$this->m_kelompok_gejala->delete_by_id($id);
		redirect('dashboard_admin/view_dinas_pemeriksaan');
		// buat bisa edit gejala
	}


	public function edit_dinas_pemeriksa()
	{
		$id 		= $this->input->post('gejalaId');
		$kode 		= $this->input->post('kodeGejala');
		$nama 		= $this->input->post('namaGejala');
		$kelompokGejala = $this->input->post('kelompokGejala');

		$this->m_gejala->edit_gejala($id, $kode, $nama, $kelompokGejala);
		redirect('dashboard_admin/view_dinas_pemeriksaan');
	}

	public function nilai_pakar()
	{
		$config = array();
		$config['per_page'] = 5; // Jumlah data per halaman
		$config['uri_segment'] = 3; // Segmen URI untuk mengetahui halaman
		$config['num_links'] = 5; // Jumlah link angka halaman
		$keyword = $this->input->get('search');
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		if ($keyword != null) {
			// Base URL tanpa query string
			$config['base_url'] = base_url('dashboard_admin/nilai_pakar');
			$config['suffix'] = '?search=' . urlencode($keyword); // Tambahkan query string di akhir setiap link
			$config['first_url'] = $config['base_url'] . $config['suffix']; // Query string untuk halaman pertama

			// Menghitung jumlah hasil pencarian
			$jumlah = $this->m_Nilai_Pakar->search_count($keyword);
			$data['id'] = $this->m_Nilai_Pakar->search($keyword, $config['per_page'], $page);
			$count = count((array)$jumlah);
		} else {
			// Tanpa pencarian
			$config['base_url'] = base_url('dashboard_admin/nilai_pakar');
			$jumlah = $this->m_Nilai_Pakar->nilai_count();
			$data['id'] = $this->m_Nilai_Pakar->nilai($config['per_page'], $page);
			$count = count((array)$jumlah);
		}

		// Konfigurasi tag pagination
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
		$config['total_rows'] = $count; // Total data

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['penyakit'] = $this->m_Penyakit->penyakit();
		$data['gejala'] = $this->m_gejala->gejala();
		$data['start'] = $page;
		$this->load->view('dashboard/admin/nilai_pakar', $data);
	}

	public function add_nilai_pakar()
	{

		$id 		= bin2hex(random_bytes(16));
		$gejala 	= $this->input->post('gejala');
		$penyakit 	= $this->input->post('penyakit');
		$mb 		= $this->input->post('mb');
		$md 		= $this->input->post('md');
		$cf			= $this->input->post('cf');

		$this->m_Nilai_Pakar->add_nilai_pakar($id, $gejala, $penyakit, $mb, $md, $cf);

		redirect('dashboard_admin/nilai_pakar');
	}

	public function hapus_nilai_pakar()
	{
		$id = $this->input->post('id');
		$this->m_Nilai_Pakar->delete_by_id($id);
		redirect('dashboard_admin/nilai_pakar');
		// buat bisa edit gejala
	}

	public function edit_nilai_pakar()
	{
		$id 		= $this->input->post('id');
		$gejala 	= $this->input->post('gejala');
		$penyakit 	= $this->input->post('penyakit');
		$mb 		= $this->input->post('mb');
		$md 		= $this->input->post('md');
		$cf			= $this->input->post('cf');

		$this->m_Nilai_Pakar->edit_nilai_pakar($id, $gejala, $penyakit, $mb, $md, $cf);
		redirect('dashboard_admin/nilai_pakar');
	}



	public function user_pemeriksa()
	{
		$config = array();
		$config['base_url'] = base_url('dashboard_admin/user_pemeriksa'); // URL untuk halaman pagination
		$config['per_page'] = 5; // Jumlah data per halaman
		$config['uri_segment'] = 3; // Segmen URI untuk mengetahui halaman
		$config['num_links'] = 5; // Jumlah link angka halaman
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$keyword = $this->input->get('search');
		if ($keyword != null) {
			$jumlah = $this->m_Auth->search_user_pemeriksa_count($keyword);
			$count = count((array) $jumlah);
			$data['userPemeriksa'] = $this->m_Auth->search_user_pemeriksa($keyword, $config['per_page'], $page);
		} else {

			$jumlah = $this->m_Auth->all_count();
			$count = count((array) $jumlah);
			$data['userPemeriksa'] = $this->m_Auth->all($config['per_page'], $page);
			// var_dump($data['userPemeriksa']);exit;
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
		$config['total_rows'] = $count; // Total data
		$this->pagination->initialize($config);
		$data['start'] = $page;
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('dashboard/admin/user_pemeriksa', $data);
	}




	public function add_user_pemeriksa()
	{

		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.nama]', [
			'required' => 'Username wajib diisi',
			'is_unique' => 'Username sudah digunakan',
		]);

		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required' => 'Password wajib diisi',
			// 'is_unique' => 'Username sudah digunakan',
		]);

		$this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password]', [
			'required' => 'Password wajib diisi',
			'matches' => 'Password tidak sesuai',
		]);

		$this->form_validation->set_rules('nomorTelepon', 'Nomor Telepon', 'required|trim|is_unique[users.nomor_telepon]', [
			'required' => 'Nomor Telepon wajib diisi',
			'is_unique' => 'Nomor Telepon sudah digunakan',
		]);

		$this->form_validation->set_rules('username', 'Username', 'required|trim', [
			'required' => 'Username wajib diisi',
			// 'is_unique' => 'Username sudah digunakan',
		]);


		$id 			= bin2hex(random_bytes(16));
		$username 		= $this->input->post('username');
		$nama 			= $this->input->post('nama');
		$password =	 password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$nomorTelepon 	= $this->input->post('nomorTelepon');
		$role 			= $this->input->post('statusUser');
		$md 	= date('Y-m-d H:i:s', time());
		$tanggalLahir	= date('Y-m-d H:i:s', time());
		$dataRegistered = date('Y-M-D');

		$this->m_Auth->input_user($id, $username, $password, $role,  $md, $nomorTelepon, $tanggalLahir,);
		$this->m_User_detail->add_pemeriksa($id, $nama, $dataRegistered);

		redirect('dashboard_admin/user_pemeriksa');
	}

	public function hapus_user_pemeriksa()
	{
		$id = $this->input->post('id');
		$this->m_Auth->delete_by_id($id);
		$this->m_Hasil_Diagnosa->delete_by_id($id);
		$this->m_User_detail->delete_by_id($id);
		redirect('dashboard_admin/user_pemeriksa');
	}

	public function edit_user_pemeriksa()
	{
		$id 			= $this->input->post('Id');
		$username 		= $this->input->post('username');
		$nama 			= $this->input->post('nama');
		$password 		= password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$nomorTelepon 	= $this->input->post('nomorTelepon');
		$role 			= $this->input->post('role');
		$created_at 	= date('Y-m-d H:i:s', time());
		$tanggalLahir	= date('Y-m-d H:i:s', time());
		$this->m_Auth->update_user_pemeriksa($id, $username, $password, $role,  $created_at, $nomorTelepon, $tanggalLahir);
		$this->m_User_detail->add_pemeriksa($id, $nama);

		redirect('dashboard_admin/user_pemeriksa');
	}
}
