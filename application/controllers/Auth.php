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
	}


	// register

	public function register()
	{

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
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/register');
			$this->load->view('templates/auth_footer');
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

	// login
	public function login()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
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
					$this->session->set_userdata('username', $user['username']);
					$this->session->set_userdata('role', $user['role']);

					switch ($user['role']) {
						case 1:
							redirect('Dashboard/admin');
							break;
						case 2:
							redirect('Dashboard/kesehatan');
							break;
						case 3:
							redirect('Dashboard/bnn');
							break;
						case 4:
							redirect('Dashboard/psikolog');
							break;
						case 5:
							redirect('Dashboard/Catin');
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
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/lupa_password');
			$this->load->view('templates/auth_footer');
		} else {
			$nomor_telepon = $this->input->post('nomor_telepon');
			$user = $this->m_Auth->get_user_by_phone($nomor_telepon);

			if ($user->num_rows() > 0) {
				$user = $user->row_array();

				// Simpan nomor telepon ke session
				$this->session->set_userdata('nomor_telepon', $nomor_telepon);
				redirect('auth/send_otp');
			} else {
				$this->session->set_flashdata('message', 'Nomor telepon tidak ditemukan.');
				redirect('auth/lupa_password');
			}
		}
	}

	public function send_otp() {
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
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/reset_password');
			$this->load->view('templates/auth_footer');
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
				$this->session->set_flashdata('message', 'Password berhasil diperbarui.');
				redirect('auth/login');
			} else {
				$this->session->set_flashdata('message', 'Nomor telepon tidak ditemukan.');
				redirect('auth/reset_password');
			}
		}
	}
}
