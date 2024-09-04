<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_Auth');
		$this->load->library('twilio');
		$this->load->library('session');
		$this->load->model('m_User_detail');
		$this->load->model('m_Tanggal_Pemeriksaan');
	}


	// register

	public function register()
	{
		$id_tanggal = 'd4973c6f-3510-4edc-8b49-e044b873bb26';
		$status = $this->m_Tanggal_Pemeriksaan->get_status($id_tanggal);
		$todaytes = date('Y-m-d');
			$tes =$this->m_User_detail->hitung_kuota($todaytes);
			$tes =7;
			$this->session->set_userdata('kuota', $tes );
			if ($tes == 10){
				$id_status = 0;
				$this->m_Tanggal_Pemeriksaan->update_id_status($id_tanggal, $id_status);
			}
			else if ($tes < 10 && $tes >= 5){
				$tes = 10 - $tes;
				$this->session->set_userdata('sisa_kuota', $tes );
			}
			$status = $this->m_Tanggal_Pemeriksaan->get_status($id_tanggal);
			$this->session->set_userdata('status', $status);
		$this->session->set_userdata('status', $status);

		$this->form_validation->set_rules(
			'nama',
			'Nama',
			'required|trim|is_unique[users.nama]',
			[
				'is_unique' => 'Username ini sudah terdaftar, gunakan username unik yang lain',
				'required' => 'Username tidak boleh kosong',
			]

		);


		$this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required|trim|is_unique[users.nomor_telepon]|max_length[15]|min_length[7]', [
			'is_unique' => 'Nomor Handphone ini sudah terdaftar',
			'max_length' => 'Nomor Handphone maksimal 15',
			'min_length' => 'Nomor Handphone minimal 7',
			'required' => 'Nomor Handphone tidak boleh kosong',
		]);

		$this->form_validation->set_rules('tanggal_lahir', "Tanggal Lahir", 'required|callback_check_age');
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[4]|matches[password2]',
			[
				'required' => 'Password tidak boleh kosong',
				'matches' => 'Password tidak cocok',
				'min_length' =>	 'Password terlalu pendek'
			]
		);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [

			'required' => 'Password tidak boleh kosong',
		]);

		if ($this->form_validation->run() == false) {
			// $this->session->set_flashdata('message', 'validation_erorrs');
			$data['title'] = 'Percatin Register';
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/register');
			$this->load->view('template/auth_footer');
			// var_dump(20);
			// exit;
		} else {

			$nama = $this->input->post('nama');
			$password =	 password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$role = 5;
			$created_at = date('Y-m-d H:i:s', time());
			$nomorTelepon = $this->input->post('nomor_telepon');
			$tanggalLahir =	$this->input->post('tanggal_lahir');
			$id = bin2hex(random_bytes(16));

			$this->m_Auth->input_user($id, $nama, $password, $role, $created_at, $nomorTelepon, $tanggalLahir);
			$this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">Congratulation!</div>');

			redirect('auth/login');
		}
	}

	public function check_age($date)
	{
		$dob = new DateTime($date);
		$now = new DateTime();
		$age = $now->diff($dob)->y;

		if ($age < 19) {
			$this->form_validation->set_message('check_age', 'Minimal usia mendaftar calon pengantin 19 tahun');
			return false;
		}
		return true;
	}

	// cek masa pendaftaran

	public function cek_pendaftaran()
	{

		$this->session->set_flashdata('cek_masa_pendaftaran', 'Status pendaftaran BUKA');
		redirect('auth/login');
	}

	// login
	public function login()
	{
		$id_tanggal = 'd4973c6f-3510-4edc-8b49-e044b873bb26';
		$tanggalexisted = $this->m_Tanggal_Pemeriksaan->get_tanggal_by_id($id_tanggal);
		$today = date('Y-m-d');
		// $today = '2024-07-17';
		if ($tanggalexisted->num_rows() > 0) {
			$tanggalexisted = $tanggalexisted->row_array();
			$akhir_tanggal = $tanggalexisted['tanggal'];
			$awal_tanggal = $tanggalexisted['awal_tanggal'];
			if (strtotime($akhir_tanggal) < strtotime($today) || strtotime($awal_tanggal) > strtotime($today)) {
				$id_status = 0;
				$this->m_Tanggal_Pemeriksaan->update_id_status($id_tanggal, $id_status);
			} else {
				$id_status = 1;
				$this->m_Tanggal_Pemeriksaan->update_id_status($id_tanggal, $id_status);
			}
			$status = $this->m_Tanggal_Pemeriksaan->get_status($id_tanggal);
			$this->session->set_userdata('status', $status);
		}

		$this->session->set_userdata('status', $status);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login page';
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('template/auth_footer');
		} else {
			$nama = $this->input->post("nama");
			$password = $this->input->post("password1");

			$user = $this->m_Auth->check_login($nama);
			if ($user->num_rows() > 0) {
				$user = $user->row_array();

				if (password_verify($password, $user['password'])) {
					// Password cocok, atur session untuk pengguna
					$this->session->set_userdata('logged_in', true);
					$this->session->set_userdata('id_user', $user['id_user']);
					$this->session->set_userdata('username', $user['nama']);
					$this->session->set_userdata('role', $user['role']);
					switch ($user['role']) {
						case 1:
							redirect('Dashboard_Admin/view_admin');
							break;
						case 2:
							redirect('Dashboard_kesehatan/view_kesehatan');
							break;
						case 3:
							redirect('Dashboard_bnn/view_bnn');
							break;
						case 4:
							redirect('Dashboard_psikolog/view_psikolog');
							break;
						case 5:
							redirect('Dashboard/view_Catin');
							break;
						default:
							$this->session->set_flashdata('loggin_err', 'loggin_err');
							redirect('auth/login');
							break;
					}
				} else {
					// Password tidak cocok
					$this->session->set_flashdata('login_error', 'Username atau password salah.');
					redirect('auth/login');
				}
			} else {
				// Pengguna tidak ditemukan dalam database
				$this->session->set_flashdata('login_error', 'Username atau password salah.');
				redirect('auth/login');
			}
		}
	}
	public function lupa_password()
	{
		$this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required|trim|max_length[15]|min_length[7]', [
			'max_length' => 'Nomor Handphone maksimal 15',
			'min_length' => 'Nomor Handphone minimal 7',
			'required' => 'Nomor Handphone tidak boleh kosong',
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Lupa Password';
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/lupa_password');
			$this->load->view('template/auth_footer');
		} else {
			$nomor_telepon = $this->input->post('nomor_telepon');
			$user = $this->m_Auth->get_user_by_phone($nomor_telepon);

			if ($user->num_rows() > 0) {
				$user = $user->row_array();

				// Simpan nomor telepon ke session
				$this->session->set_userdata('nomor_telepon', $nomor_telepon);
				$this->session->set_flashdata('kirim_otp', 'Buka SMS Anda, maka kode OTP untuk mengubah kata sandi akan dikirim ke nomoro telepon yang Anda masukkan.');
				redirect('auth/lupa_password');
			} else {
				$this->session->set_flashdata('message', 'Nomor telepon tidak ditemukan.');
				redirect('auth/lupa_password');
			}
		}
	}

	public function send_otp()
	{
		$to = $this->session->userdata('nomor_telepon');
		if (!$to) {
			echo "Nomor telepon tidak ditemukan dalam sesi.";
			return;
		}
		$from = '+16185564227';

		$otp = mt_rand(100000, 999999);
		$this->session->set_userdata('otp', $otp);

		$message = "Ini kode OTP kamu: " . $otp;
		$response = $this->twilio->send_message($to, $from, $message);
		var_dump($response);
		if ($response) {
			echo "OTP BERHASIL DIKIRIM";
			echo ($otp);
			$this->load->view('auth/otp');
		} else {
			echo "GAGAL MENGIRIM OTP";
		}
	}

	public function verified_otp()
	{
		$this->form_validation->set_rules('otp_input', 'Kode OTP', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, kembali ke halaman input OTP
			$this->load->view('auth/otp');
		} else {
			$otp_input = $this->input->post("otp_input");
			$stored_otp = $this->session->userdata("otp");

			if ($otp_input == $stored_otp) {
				echo "OTP BENAR";
				redirect('auth/reset_password');
			} else {
				echo "OTP SALAH. Kode yang benar adalah: " . $stored_otp;
				$this->load->view('auth/otp');
			}
		}
	}




	public function reset_password()
	{
		$stored_otp = $this->session->userdata("otp");
		if ($stored_otp) {
			$this->form_validation->set_rules(
				'password1',
				'Password',
				'required|trim|min_length[4]|matches[password2]',
				[
					'required' => 'Password tidak boleh kosong',
					'matches' => 'Password tidak cocok',
					'min_length' => 'Password terlalu pendek'
				]
			);
			$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
				'required' => 'Password tidak boleh kosong',
				'matches' => 'Password tidak cocok',
				'min_length' => 'Password terlalu pendek'
			]);

			if ($this->form_validation->run() == false) {
				$data['title'] = 'Reset Password';
				$this->load->view('template/auth_header', $data);
				$this->load->view('auth/reset_password');
				$this->load->view('template/auth_footer');
			} else {
				$nomor_telepon = $this->session->userdata('nomor_telepon');

				if (!$nomor_telepon) {
					$this->session->set_flashdata('message', 'Sesi habis. Silakan coba lagi.');
					redirect('auth/lupa_password');
				}

				$password = $this->input->post('password1');
				$user = $this->m_Auth->get_user_by_phone($nomor_telepon);

				if ($user->num_rows() > 0) {
					$user = $user->row_array();
					$this->m_Auth->update_password($user['id_user'], password_hash($password, PASSWORD_DEFAULT));
					$this->session->unset_userdata('nomor_telepon');
					$this->session->set_flashdata('reset_success', 'Permintaan Anda berhasil dijalankan. ');
					redirect('auth/reset_password');
				} else {
					$this->session->set_flashdata('message', 'Nomor telepon tidak ditemukan.');
					redirect('auth/reset_password');
				}
			}
		} else
			redirect('auth/lupa_password');
	}

	public function ganti_password()
	{
		// jadi nanti user input password dia yg lama dan password dia yg baru, untuk password dia yg baru dia nginput 2 kali, terus untuk di controllernya pertama
		// ambil dulu password yg ada di database menggunakan parameter id si user, lalu kita descrypt lah password si user jika passwordnya sama dengan apa yg diinput 
		// si user maka dia boleh melakukan perubahan si user maka dia boleh melakukan perubahan password, jika tidak maka balik lagi ke halaman ganti_password dan berikan error]
		// jika berhasil dia bakal ke halaman login terlebih dahulu, user harus login lagi

		$this->form_validation->set_rules(
			'password_lama',
			'Password Lama',
			'required|trim',
			[
				'required' => 'Password Lama tidak boleh kosong'
			]
		);

		$this->form_validation->set_rules(
			'password_baru',
			'Password Baru',
			'required|trim|matches[password_baru1]',
			[
				'required' => 'Password Baru tidak boleh kosong',
			]
		);
		$this->form_validation->set_rules(
			'password_baru1',
			'Konfirmasi Password',
			'required|trim|matches[password_baru]',
			[
				'required' => 'Konfirmasi Password tidak boleh kosong',
			]
		);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Ganti Password';
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/ganti_password');
			$this->load->view('template/auth_footer');
		} else {
			$passwordLama = $this->input->post('password_lama');
			$id_user = $this->session->userdata('id_user');

			$user = $this->m_Auth->get_users($id_user);
			if ($user->num_rows() > 0) {
				$user = $user->row_array();


				if (password_verify($passwordLama, $user['password'])) {
					$passwordBaru = $this->input->post('password_baru');
					$kofirmasiPassword = $this->input->post('password_baru1');
					$this->m_Auth->update_password($id_user, password_hash($passwordBaru, PASSWORD_DEFAULT));

					redirect('auth/login');
				} else {
					$this->session->set_flashdata('reset_error', 'Password salah.');
					redirect('auth/ganti_password');
				}
				$this->session->set_flashdata('reset_error', 'Password salah.');
				redirect('auth/login');
			}
		}
	}
}
