<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller

{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('twilio');
		$this->load->library('session');
		$this->load->model('m_Tanggal_Pemeriksaan');
		$this->load->model('m_User_detail');
		$this->load->helper(array('form', 'url'));
	}

	// admin


	// kesehatan
	public function view_kesehatan()
	{
		$this->load->view('Dashboard/kesehatan');
	}
	public function view_bnn()
	{
		$this->load->view('Dashboard/bnn');
	}
	public function view_psikolog()
	{
		$this->load->view('Dashboard/psikolog');
	}


	//  05 catin
	public function view_catin()
	{
		$id_user = $this->session->userdata('id_user');

		$userDetail = $this->m_User_detail->getAll($id_user);
		if ($userDetail->num_rows() > 0) {
			$userDetail = $userDetail->row_array();
			$this->session->set_userdata('no_pendaftaran', $userDetail['no_pendaftaran']);
			$this->session->set_userdata('nama_lengkap', $userDetail['nama_lengkap']);
			$this->session->set_userdata('nik', $userDetail['nik']);
			$this->session->set_userdata('tempat_lahir', $userDetail['tempat_lahir']);
			$this->session->set_userdata('tanggal_lahir', $userDetail['tanggal_lahir']);
			$this->session->set_userdata('usia', $userDetail['usia']);
			$this->session->set_userdata('jenis_kelamin', $userDetail['jenis_kelamin']);
			$this->session->set_userdata('agama', $userDetail['agama']);
			$this->session->set_userdata('pendidikan', $userDetail['pendidikan']);
			$this->session->set_userdata('pekerjaan', $userDetail['pekerjaan']);
			$this->session->set_userdata('nomor_telepon', $userDetail['nomor_telepon']);
			$this->session->set_userdata('provinsi', $userDetail['provinsi']);
			$this->session->set_userdata('kota', $userDetail['kota']);
			$this->session->set_userdata('kecamatan', $userDetail['kecamatan']);
			$this->session->set_userdata('kelurahan', $userDetail['kelurahan']);
			$this->session->set_userdata('alamat', $userDetail['alamat']);
			$this->session->set_userdata('pernikahan_ke', $userDetail['pernikahan_ke']);
			$this->session->set_userdata('tanggal_pernikahan', $userDetail['tanggal_pernikahan']);
			$this->session->set_userdata('foto_user', $userDetail['foto_user']);
			$this->session->set_userdata('foto_ktp', $userDetail['foto_ktp']);
			$this->session->set_userdata('foto_kk', $userDetail['foto_kk']);
			$this->session->set_userdata('foto_surat', $userDetail['foto_surat']);
			$data['total_asset'] = $this->m_User_detail->hitung($id_user);
			$data = $this->session->set_userdata('nomor', $data['total_asset']);
			$this->load->view('Dashboard/catin/catin');
		}
	}

	public function view_catin_pemeriksaan()
	{
		$id_user = $this->session->userdata('id_user');

		$userDetail = $this->m_User_detail->getAll($id_user);
		if ($userDetail->num_rows() > 0) {
			$userDetail = $userDetail->row_array();
			$this->session->set_userdata('no_pendaftaran', $userDetail['no_pendaftaran']);
			$this->session->set_userdata('nama_lengkap', $userDetail['nama_lengkap']);
			$this->session->set_userdata('nik', $userDetail['nik']);
			$this->session->set_userdata('tempat_lahir', $userDetail['tempat_lahir']);
			$this->session->set_userdata('tanggal_lahir', $userDetail['tanggal_lahir']);
			$this->session->set_userdata('usia', $userDetail['usia']);
			$this->session->set_userdata('jenis_kelamin', $userDetail['jenis_kelamin']);
			$this->session->set_userdata('agama', $userDetail['agama']);
			$this->session->set_userdata('pendidikan', $userDetail['pendidikan']);
			$this->session->set_userdata('pekerjaan', $userDetail['pekerjaan']);
			$this->session->set_userdata('nomor_telepon', $userDetail['nomor_telepon']);
			$this->session->set_userdata('provinsi', $userDetail['provinsi']);
			$this->session->set_userdata('kota', $userDetail['kota']);
			$this->session->set_userdata('kecamatan', $userDetail['kecamatan']);
			$this->session->set_userdata('kelurahan', $userDetail['kelurahan']);
			$this->session->set_userdata('alamat', $userDetail['alamat']);
			$this->session->set_userdata('pernikahan_ke', $userDetail['pernikahan_ke']);
			$this->session->set_userdata('tanggal_pernikahan', $userDetail['tanggal_pernikahan']);
			$this->session->set_userdata('foto_user', $userDetail['foto_user']);
			$this->session->set_userdata('foto_ktp', $userDetail['foto_ktp']);
			$this->session->set_userdata('foto_kk', $userDetail['foto_kk']);
			$this->session->set_userdata('foto_surat', $userDetail['foto_surat']);
		}


		$this->load->view('Dashboard/catin/catin_pemeriksaan');
	}

	public function pemeriksaan()
	{
		$id_user = $this->session->userdata('id_user');
		$userDetail = $this->m_User_detail->getAll($id_user);
		if ($userDetail->num_rows() > 0) {
			$userDetail = $userDetail->row_array();
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
		// $kota = $this->input->post('provinsi');
		// var_dump($kota);
		// exit;
		// $this->form_validation->set_rules(
		// 	'provinsi',
		// 	'Provinsi',
		// 	'required|trim',
		// 	[
		// 		'required' => 'Provinsi tidak boleh kosong',
		// 	]

		// );
		// $this->form_validation->set_rules(
		// 	'kota',
		// 	'Kota',
		// 	'required|trim',
		// 	[
		// 		'required' => 'Kota tidak boleh kosong',
		// 	]
		// );

		// $this->form_validation->set_rules(
		// 	'kecamatan',
		// 	'Kecamatan',
		// 	'required|trim',
		// 	[
		// 		'required' => 'Kecamatan tidak boleh kosong',
		// 	]
		// );

		// $this->form_validation->set_rules(
		// 	'kelurahan',
		// 	'Kelurahan',
		// 	'required|trim',
		// 	[
		// 		'required' => 'Kelurahan tidak boleh kosong',
		// 	]
		// );

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

			$this->load->view('Dashboard/catin_pemeriksaan');
		} else {
			$fotoUser = null;
			$fotoktp = null;
			$fotokk = null;
			$fotoSurat = null;
			if (!is_dir(FCPATH . 'uploads/photo')) {
				mkdir(FCPATH . 'uploads/photo', 0777, true);
			}

			$config['upload_path'] = FCPATH . 'uploads/photo/pasFoto';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size'] = 1000000; // 2 MB
			$config['max_width'] = 1000000;
			$config['max_height'] = 1000000;
			$this->load->library('upload', $config);

			$file = 'foto_user';
			if (!empty($_FILES[$file]['name'])) {
				$config['file_name'] = time() . '_' . $_FILES[$file]['name']; // Nama file unik
				$config['file_name'] = str_replace(' ', '_', $config['file_name']);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload($file)) {
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
					var_dump($config['upload_path']);
					exit;
				} else {
					$data = array('upload_data' => $this->upload->data());
				}
				$fotoUser = $config['file_name'];
			}

			$config['upload_path'] = FCPATH . 'uploads/photo/ktp';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size'] = 1000000; // 2 MB
			$config['max_width'] = 1000000;
			$config['max_height'] = 1000000;
			$this->load->library('upload', $config);

			$file = 'foto_ktp';

			if (!empty($_FILES[$file]['name'])) {
				$config['file_name'] = time() . '_' . $_FILES[$file]['name']; // Nama file unik
				$config['file_name'] = str_replace(' ', '_', $config['file_name']);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload($file)) {
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
					var_dump($config['upload_path']);

					exit;
				} else {
					$data = array('upload_data' => $this->upload->data());
				}
				$fotoktp = $config['file_name'];
			}
			$config['upload_path'] = FCPATH . 'uploads/photo/kk';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size'] = 1000000; // 2 MB
			$config['max_width'] = 1000000;
			$config['max_height'] = 1000000;


			$this->load->library('upload', $config);


			$file =  'foto_kk';
			if (!empty($_FILES[$file]['name'])) {
				$config['file_name'] = time() . '_' . $_FILES[$file]['name']; // Nama file unik
				$config['file_name'] = str_replace(' ', '_', $config['file_name']);

				$this->upload->initialize($config);

				if (!$this->upload->do_upload($file)) {
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
					var_dump($config['upload_path']);

					exit;
				} else {
					$data = array('upload_data' => $this->upload->data());
				}
				$fotokk = $config['file_name'];
			}
			$config['upload_path'] = FCPATH . 'uploads/photo/surat';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size'] = 1000000; // 2 MB
			$config['max_width'] = 1000000;
			$config['max_height'] = 1000000;

			$this->load->library('upload', $config);

			$file = 'foto_surat';
			if (!empty($_FILES[$file]['name'])) {
				$config['file_name'] = time() . '_' . $_FILES[$file]['name']; // Nama file unik
				$config['file_name'] = str_replace(' ', '_', $config['file_name']);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload($file)) {
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
					var_dump($config['upload_path']);

					exit;
				} else {
					$data = array('upload_data' => $this->upload->data());
				}
				$fotoSurat = $config['file_name'];
			}
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
			$this->m_User_detail->update($id_user, $nomor_pendaftaran, $nama, $nik, $tempatLahir, $tanggalLahir, $umur, $jenisKelamin, $agama, $pendidikan, $pekerjaan, $nomorTelepon, $provinsi, $kota, $kecamatan, $kelurahan, $alamat, $pernikahanKe, $tanggalPernikahan, $fotoUser, $fotoktp, $fotokk, $fotoSurat, $status, $data_registered);
			redirect('dashboard/view_catin_pemeriksaan');
		}
	}


	public function tanggal()
	{
		$role = $this->session->userdata('role');

		// admin
		if ($role == 1) {
			$awal_tanggal = date('Y-m-d');
			$tanggal = $this->input->post('tanggal_pendaftaran');
			if (strtotime($tanggal) < strtotime($awal_tanggal)) {
				$this->session->set_flashdata('error_tanggal', 'Tanggal pendaftaran tidak boleh lebih awal dari tanggal hari ini.');

				redirect('Dashboard_admin/view_admin');
			}
			$id_status = $this->input->post('status_pendaftaran');
			$id_tanggal = 'd4973c6f-3510-4edc-8b49-e044b873bb26';
			$this->m_Tanggal_Pemeriksaan->tanggal_pemeriksaan($awal_tanggal, $id_tanggal, $id_status, $tanggal);
			
			$id_tanggal = '0ff4c7bc-cf4e-4c38-8d0a-f5a7de5c5c7e';
			$tanggal = $this->input->post('tanggal_periksa');
			if (strtotime($tanggal) < strtotime($awal_tanggal)) {
				$this->session->set_flashdata('error_tanggal_pemeriksaan', 'Tanggal pemeriksaan tidak boleh lebih awal dari tanggal hari ini.');
				redirect('Dashboard_admin/view_admin');
			}
			$this->m_Tanggal_Pemeriksaan->tanggal_periksa($id_tanggal, $tanggal);
			redirect('Dashboard_admin/view_admin');

			// kesehatan
		} else if ($role == 2) {
			$tanggal = $this->input->post('tanggal_pemeriksaan');
			$id_status = $this->input->post('status');
			$id_tanggal = 'ee250336-d65f-9309-742e-3c500258963d';
			$this->m_Tanggal_Pemeriksaan->tanggal_pemeriksaan($id_tanggal, $id_status, $tanggal);
			$tanggalexisted = $this->m_Tanggal_Pemeriksaan->get_tanggal($id_tanggal);
			$this->session->set_userdata('tanggal', $tanggalexisted);
			redirect('Dashboard/view_kesehatan');
		} else if ($role == 3) {

			// bnn
			$tanggal = $this->input->post('tanggal_pemeriksaan');
			$id_status = $this->input->post('status');
			$id_tanggal = '44ff9962-5668-aeeb-a1a6-4e730d5f1752';
			$this->m_Tanggal_Pemeriksaan->tanggal_pemeriksaan($id_tanggal, $id_status, $tanggal);
			$tanggalexisted = $this->m_Tanggal_Pemeriksaan->get_tanggal($id_tanggal);
			$this->session->set_userdata('tanggal', $tanggalexisted);
			redirect('Dashboard/view_bnn');
		} else if ($role == 4) {

			// psikolog
			$tanggal = $this->input->post('tanggal_pemeriksaan');
			$id_status = $this->input->post('status');
			$id_tanggal = 'c1116372-6028-0013-f4f6-b8cd6e12f2f2';
			$this->m_Tanggal_Pemeriksaan->tanggal_pemeriksaan($id_tanggal, $id_status, $tanggal);
			$tanggalexisted = $this->m_Tanggal_Pemeriksaan->get_tanggal($id_tanggal);
			$this->session->set_userdata('tanggal', $tanggalexisted);
			redirect('Dashboard/view_psikolog');
		} else {
			return ('anda tidak memiliki akses');
		}
	}
}
