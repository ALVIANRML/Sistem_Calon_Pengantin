<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
		$this->load->helper(array('form', 'url'));
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
				// var_dump($data['user_detail']);
				// exit;
			} else {
				$data['user_detail'] = $this->m_User_detail->get_by_data_registered($tanggal);
			}
		}

		$this->load->view('Dashboard/admin/data_catin_admin', $data);
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

			// INI BELUM ADA SEARCH NYA UNTUK NILAI PAKAR
		} else {
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

		$this->m_Auth->input_user($id, $username, $password, $role,  $md, $nomorTelepon, $tanggalLahir);
		$this->m_User_detail->add_pemeriksa($id, $nama);

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
