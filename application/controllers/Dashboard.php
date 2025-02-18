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
		$this->load->model('m_gejala');
		$this->load->model('m_Penyakit');
		$this->load->helper(array('form', 'url'));
	}



	//  05 catin
	public function view_catin()
	{
		$id_user = $this->session->userdata('id_user');

		// var_dump($gejala); exit;
		$userDetail = $this->m_User_detail->getAll($id_user);
		
		$userPemeriksaan = $this->m_User_detail->getAllPemeriksaan($id_user);
		if ($userDetail->num_rows() > 0 && $userPemeriksaan->num_rows() > 0) {
			$userDetail = $userDetail->row_array();
			$userPemeriksaan = $userPemeriksaan->row_array();
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
			$this->session->set_userdata('skrining_kesehatan', $userDetail['skrining_kesehatan']);
			$this->session->set_userdata('kuesioner_kepribadian', $userDetail['kuesioner_kepribadian']);
			$this->session->set_userdata('id_status_verifikasi', $userDetail['id_status_verifikasi']);
			$this->session->set_userdata('id_status_perpanjangan', $userDetail['id_status_perpanjangan']);
			$this->session->set_userdata('id_status_aktif', $userDetail['id_status_aktif']);
			$this->session->set_userdata('id_status_kesehatan', $userDetail['id_status_kesehatan']);
			$this->session->set_userdata('id_status_bnn', $userDetail['id_status_bnn']);
			$this->session->set_userdata('id_status_psikolog', $userDetail['id_status_psikolog']);
			$this->session->set_userdata('id_pemeriksaan_survei', $userDetail['id_pemeriksaan_survei']);
			$this->session->set_userdata('id_pemeriksaan_psikolog', $userDetail['id_pemeriksaan_psikolog']);
			$this->session->set_userdata('tanggal_periksa', $userDetail['tanggal_periksa']);
			//For Hasil Skrining Kesehatan 
			$this->session->set_userdata('kode_catin', $userPemeriksaan['kode_catin']);
			$this->session->set_userdata('nama_sakit_catin', $userPemeriksaan['nama_sakit_catin']);
			$this->session->set_userdata('kepercayaan_catin', $userPemeriksaan['kepercayaan_catin']);
			$this->session->set_userdata('keterangan_catin', $userPemeriksaan['keterangan_catin']);
			//For Hasil Psikolog
			$this->session->set_userdata('kode_psikolog', $userPemeriksaan['kode_psikolog']);
			$this->session->set_userdata('nama_sakit_psikolog', $userPemeriksaan['nama_sakit_psikolog']);
			$this->session->set_userdata('kepercayaan_psikolog', $userPemeriksaan['kepercayaan_psikolog']);
			$this->session->set_userdata('keterangan_psikolog', $userPemeriksaan['keterangan_psikolog']);
			
			$data['total_asset'] = $this->m_User_detail->hitung($id_user);
			$data = $this->session->set_userdata('nomor', $data['total_asset']);
			// var_dump($userDetail['id_pemeriksaan_survei']);exit;
			$data['pakar'] = $this->m_User_detail->getPakar($id_user);
			// var_dump($data['pakar']); exit;
			$data['gejalaCatin'] = $this->m_User_detail->get_all_gejala_catin()->result_array();
			$data['gejalaPsikolog'] = $this->m_User_detail->get_all_gejala_psikolog()->result_array();
			$this->load->view('Dashboard/catin/catin', $data);
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
			$this->session->set_userdata('pendidikan_terakhir', $userDetail['pendidikan_terakhir']);
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
			$this->session->set_userdata('id_status_verifikasi', $userDetail['id_status_verifikasi']);
			$this->session->set_userdata('id_status_perpanjangan', $userDetail['id_status_perpanjangan']);
			$this->session->set_userdata('id_status_aktif', $userDetail['id_status_aktif']);
			$this->session->set_userdata('tanggal_periksa', $userDetail['tanggal_periksa']);
		}
		$tgl_periksa = $this->m_Tanggal_Pemeriksaan->get_tanggal_periksa();
		$this->session->set_userdata('tgl_periksa', $tgl_periksa);
		$this->load->view('Dashboard/catin/catin_pemeriksaan');
	}

	public function pemeriksaan()
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
			'jenis_kelamin',
			'Jenis Kelamin',
			'required|trim',
			[
				'required' => 'Jenis Kelamin tidak boleh kosong',
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
			'pendidikan_terakhir',
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
			'nomor_telepon',
			'Nomor HP',
			'required|trim',
			[
				'required' =>  'Nomor HP tidak boleh kosong',
			]
		);
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
			'Pernikahan ke',
			'required|trim',
			[
				'required' => '"Pernikahan ke" tidak boleh kosong',
			]
		);

		if ($this->form_validation->run() == false) {

			$this->load->view('Dashboard/catin/catin_pemeriksaan');
		} else {
			$path = 'uploads/photo/';
			$nama = $this->session->userdata('username');
			$this->load->library('upload');
			
			// Konfigurasi upload file
			$upload_config = [
				'upload_path' => $path,
				'allowed_types' => 'jpg|png|jpeg|gif',
				'max_size' => '100000',  // 20MB max
				'max_width' => '100000', // pixel
				'max_height' => '100000' // pixel
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
			$pendidikan = $this->input->post('pendidikan_terakhir');
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
			$tanggalPeriksa = $this->input->post('tanggal_periksa');
			$dateObject = DateTime::createFromFormat('d/m/Y', $tanggalPeriksa);
			
			if ($dateObject) {
				$tanggalPeriksa = $dateObject->format('Y-m-d'); // Format ke string "2024-12-29"
				// Atau, jika Anda ingin tetap sebagai DateTime object, gunakan $dateObject
			} else {
				// Handle error jika format string salah
				echo "Format tanggal tidak valid.";
			}
			// var_dump($tanggalPeriksa);
			// exit;
			
			
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
			$this->m_User_detail->update($id_user, $nomor_pendaftaran, $nama, $nik, $tempatLahir, $tanggalLahir, $umur, $jenisKelamin, $agama, $pendidikan, $pekerjaan, $nomorTelepon, $provinsi, $kota, $kecamatan, $kelurahan, $alamat, $pernikahanKe, $tanggalPernikahan, $fotoUser, $fotoktp, $fotokk, $fotoSurat, $status, $data_registered, $tanggalPeriksa);
			
			
			// var_dump('masuk sumpah');exit;

			$this->session->set_flashdata('input', 'input');
			redirect('dashboard/view_catin_pemeriksaan');
		}
	}


	public function skrining_kesehatan()
	{
		$id_user = $this->session->userdata('id_user');
		$skrining = 2;

		if (!$this->input->post('skrining_kesehatan')) {
			$this->session->set_flashdata('eror_survei', 'eror_survei');
			redirect('dashboard/view_catin');
		} else {
			$gejala = implode(",", $this->input->post("skrining_kesehatan"));
			$data["listGejala"] = $this->m_Penyakit->get_list_by_id($gejala);
			//Menghitung Nilai Kemungkinan
			$listPenyakit = $this->m_Penyakit->get_by_gejala($gejala);
			$penyakit = array();
			$i = 0;
			foreach ($listPenyakit->result() as $value) {
				$listGejala = $this->m_Penyakit->get_gejala_by_penyakit($value->penyakit_id, $gejala);
				$combineCFmb = 0;
				$combineCFmd = 0;
				$CFBefore = 0;
				$j = 0;
				$cfawal = 0;
				foreach ($listGejala->result() as $value2) {
					//Hitung Nilai CF yang Baru
					$cfold = $cfawal + ($value2->cf * (1 - $cfawal));
					//Melakukan Update nilai CF 
					$cfawal = $cfold;
				}
				$combineHasil = $cfawal;
				if ($combineHasil) {
					$penyakit[$i] = array(
						'kode' => $value->kode,
						'nama' => $value->nama,
						'kepercayaan' => number_format($combineHasil * 100, 1),
						'keterangan' => $value->keterangan
					);
					// 'user_id' =>$user_login);
					// $this->db->insert('hasil_diagnosa', $penyakit[$i]);
					$i++;
				}
			}

			function cmp($a, $b)
			{
				return ($a["kepercayaan"] > $b["kepercayaan"]) ? -1 : 1;
			}
			usort($penyakit, "cmp");
			$data["listPenyakit"] = $penyakit;
			$data_hasil = array(
				'kode_catin' => $penyakit[0]['kode'],
				'nama_sakit_catin' => $penyakit[0]['nama'],
				'kepercayaan_catin' => $penyakit[0]['kepercayaan'],
				'keterangan_catin' => $penyakit[0]['keterangan'],
			);
			$this->db->where('user_id', $id_user);
			$this->db->update('hasil_diagnosa', $data_hasil);
			$this->m_User_detail->update_skrining_kesehatan($id_user, $skrining);
			redirect('dashboard/view_catin');
		}
	}


	public function kuisioner_kepribadian()
	{
		$id_user = $this->session->userdata('id_user');
		$kuesioner = 2;

		if (!$this->input->post('kuisioner_kepribadian')) {
			$this->session->set_flashdata('eror_survei', 'eror_survei');
			redirect('dashboard/view_catin');
		} else {
			$gejala = implode(",", $this->input->post("kuisioner_kepribadian"));
			$data["listGejala"] = $this->m_Penyakit->get_list_by_id($gejala);
			//Menghitung Nilai Kemungkinan
			$listPenyakit = $this->m_Penyakit->get_by_gejala($gejala);
			$penyakit = array();
			$i = 0;
			foreach ($listPenyakit->result() as $value) {
				$listGejala = $this->m_Penyakit->get_gejala_by_penyakit($value->penyakit_id, $gejala);
				$combineCFmb = 0;
				$combineCFmd = 0;
				$CFBefore = 0;
				$j = 0;
				$cfawal = 0;
				foreach ($listGejala->result() as $value2) {
					//Hitung Nilai CF yang Baru
					$cfold = $cfawal + ($value2->cf * (1 - $cfawal));
					//Melakukan Update nilai CF 
					$cfawal = $cfold;
				}
				$combineHasil = $cfawal;
				if ($combineHasil) {
					$penyakit[$i] = array(
						'kode' => $value->kode,
						'nama' => $value->nama,
						'kepercayaan' => number_format($combineHasil * 100, 1),
						'keterangan' => $value->keterangan
					);
					// 'user_id' =>$user_login);
					// $this->db->insert('hasil_diagnosa', $penyakit[$i]);
					$i++;
				}
			}

			function cmp($a, $b)
			{
				return ($a["kepercayaan"] > $b["kepercayaan"]) ? -1 : 1;
			}
			usort($penyakit, "cmp");
			$data["listPenyakit"] = $penyakit;
			$data_hasil = array(
				'kode_psikolog' => $penyakit[0]['kode'],
				'nama_sakit_psikolog' => $penyakit[0]['nama'],
				'kepercayaan_psikolog' => $penyakit[0]['kepercayaan'],
				'keterangan_psikolog' => $penyakit[0]['keterangan'],
			);
			$this->db->where('user_id', $id_user);
			$this->db->update('hasil_diagnosa', $data_hasil);
			$this->m_User_detail->update_kuesioner_kepribadian($id_user, $kuesioner);
			redirect('dashboard/view_catin');
		}
	}


	public function tanggal()
	{
		$role = $this->session->userdata('role');

		// admin
		if ($role == 1) {
			$awal_tanggal = date('Y-m-d');
			// $awal_tanggal = date('2024-08-01');
			$tanggal = $this->input->post('tanggal_pendaftaran');
			if (strtotime($tanggal) < strtotime($awal_tanggal)) {
				$this->session->set_flashdata('error_tanggal', 'Tanggal pendaftaran tidak boleh sebelum dari tanggal hari ini.');

				redirect('Dashboard_admin/view_admin');
			}

			$tanggal = $this->input->post('tanggal_periksa');
			if (strtotime($tanggal) < strtotime($awal_tanggal)) {
				$this->session->set_flashdata('error_tanggal_pemeriksaan', 'Tanggal pemeriksaan tidak boleh lebih awal dari tanggal hari ini.');
				redirect('Dashboard_admin/view_admin');
			}
			$id_tanggal = '0ff4c7bc-cf4e-4c38-8d0a-f5a7de5c5c7e';
			$this->m_Tanggal_Pemeriksaan->tanggal_periksa($id_tanggal, $tanggal);
			$id_tanggal = 'd4973c6f-3510-4edc-8b49-e044b873bb26';
			$id_status = $this->input->post('status_pendaftaran');
			$this->m_Tanggal_Pemeriksaan->tanggal_pemeriksaan($awal_tanggal, $id_tanggal, $id_status, $tanggal);

			redirect('Dashboard_admin/view_admin');

			// kesehatan
		} else if ($role == 2) {
			$tanggal = $this->input->post('tanggal_pemeriksaan');
			$id_status = $this->input->post('status');
			$id_tanggal = 'ee250336-d65f-9309-742e-3c500258963d';
			$this->m_Tanggal_Pemeriksaan->tanggal_pemeriksaan($id_tanggal, $id_status, $tanggal);
			$tanggalexisted = $this->m_Tanggal_Pemeriksaan->get_tanggal($id_tanggal);
			$this->session->set_userdata('tanggal', $tanggalexisted);
			redirect('Dashboard_kesehatan/view_kesehatan');
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
			redirect('Dashboard_psikolog/view_psikolog');
		} else {
			return ('anda tidak memiliki akses');
		}
	}
}
