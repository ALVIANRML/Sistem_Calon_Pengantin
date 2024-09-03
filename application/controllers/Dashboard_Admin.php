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
				// var_dump($data);
				// exit;
			}
		}

		$this->load->view('Dashboard/admin/data_catin_admin', $data);
	}

	public function data_verifikasi(){
		$verifikasi = $this->input->post('data_verifikasi');
		$id = $this->input->post('id');
		$this->m_User_detail->update_data_verifikasi($id,$verifikasi);
		redirect('dashboard_admin/view_data_catin');

	}


	public function aktivasi(){
		$aktif = $this->input->post('aktif');
		$id = $this->input->post('id');
		$this->m_User_detail->update_data_aktif($id,$aktif);
		redirect('dashboard_admin/view_data_catin');

	}

	public function test()
	{
		$this->load->view('tes/tes_admin');
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
		// $tanggal_awal = '2024-08-20';
		// $tanggal_akhir = '2024-08-27';
		// Lakukan query ke database dengan rentang tanggal tertentu
		$data['laporan'] = $this->m_User_detail->getLaporanByDateRange($tanggal_awal, $tanggal_akhir);
		// var_dump($data);
		// exit;
		// Buat objek Spreadsheet baru
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

		$keyword = $this->input->get('search');

		if ($keyword != null) {
			$keyword = $this->m_Penyakit->search($keyword);
			$data['id'] = $keyword;
		} else {
			$data['id'] = $this->m_Penyakit->penyakit();
		}
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
		// var_dump($id, $kode, $nama, $keterangan, $pemeriksa);
		// exit;
		$this->m_Penyakit->edit_penyakit($id, $kode, $nama, $keterangan, $pemeriksa);
		redirect('dashboard_admin/data_penyakit');

		// buat bisa edit penyakit
	}

	public function data_gejala()
	{

		$keyword = $this->input->get('search');

		if ($keyword != null) {
			$keyword = $this->m_gejala->search($keyword);
			$data['id'] = $keyword;
		} else {
			$data['id'] = $this->m_gejala->gejala();
		}
		$this->load->view('Dashboard/admin/data_gejala', $data);
	}

	public function add_gejala()
	{
		$id 		= bin2hex(random_bytes(16));
		$kode 		= $this->input->post('kode_gejala');
		$nama 		= $this->input->post('nama_gejala');
		$kelompokGejala = $this->input->post('kelompok_gejala');

		$this->m_gejala->add_gejala($id, $kode, $nama, $kelompokGejala);
		redirect('dashboard_admin/data_gejala');
	}

	public function hapus_gejala()
	{
		$id = $this->input->post('gejala_id');
		$this->m_gejala->delete_by_id($id);
		redirect('dashboard_admin/data_gejala');
		// buat bisa edit gejala
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

		if ($keyword != null) {
			$keyword = $this->m_kelompok_gejala->search($keyword);
			$data['id'] = $keyword;
		} else {
			$data['id'] = $this->m_kelompok_gejala->kelompok_gejala();
		}
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
		$keyword = $this->input->get('search');

		if ($keyword != null) {
			// Melakukan pencarian dengan keyword
			$nilai_pakar = $this->m_Nilai_Pakar->search($keyword);
			$nilais = []; // Inisialisasi array $nilais

			foreach ($nilai_pakar as $nilai) {
				$id_gejala = $nilai['gejala_id'];
				$id_penyakit = $nilai['penyakit_id'];
				$id = $nilai['id'];
				$nilai_hasil = $this->m_Nilai_Pakar->nilai($id_gejala, $id_penyakit, $id);
				if (!empty($nilai_hasil)) {
					$nilais[] = $nilai_hasil;
				}
			}

			$data['penyakit'] = $this->m_Penyakit->penyakit();
			$data['gejala'] = $this->m_gejala->gejala();
			$data['id'] = $nilais;
		} else {
			// Menampilkan semua data jika tidak ada keyword
			$nilai_pakar = $this->m_Nilai_Pakar->nilai_pakar();
			$nilais = []; // Inisialisasi array $nilais

			foreach ($nilai_pakar as $nilai) {
				$id_gejala = $nilai['gejala_id'];
				$id_penyakit = $nilai['penyakit_id'];
				$id = $nilai['id'];
				$nilai_hasil = $this->m_Nilai_Pakar->nilai($id_gejala, $id_penyakit, $id);
				if (!empty($nilai_hasil)) {
					$nilais[] = $nilai_hasil;
				}
			}

			$data['penyakit'] = $this->m_Penyakit->penyakit();
			$data['gejala'] = $this->m_gejala->gejala();
			$data['id'] = $nilais;
		}

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
		$keyword = $this->input->get('search');
		if ($keyword != null) {
			$keywords = $this->m_Auth->search_user_pemeriksa($keyword);
			// $keywords = $this->m_User_detail->search($keywords);_
			// var_dump($user_catin);
			$data['userPemeriksa'] = $keywords;
		} else {

			$users = $this->m_Auth->user_pemeriksa();
			foreach ($users as $user) {
				$id[] = $user['id_user_detail'];
			}
			$user_catin = $this->m_Auth->get_by_id($id);
			$data['userPemeriksa'] = $user_catin;
			// var_dump($user_catin);
			// exit;
		}
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
