<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		$this->load->library('form_validation');
		// $this->load->model('Auth');
	}

	public function login()
	{
		$data['title'] = 'Login page';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/login');
		$this->load->view('templates/auth_footer');
	}


	public function register()
	{

		$this->form_validation->set_rules(
			'nama','Nama','required|trim|is_unique[users.nama]',
			[
				'is_unique' => 'Nama ini sudah terdaftar, gunakan nama unik yang lain',
				'required' => 'Nama tidak boleh kosong',
			]

		);
		// $this->form_validation->set_rules(
		// 	'email','Email','required|trim|valid_email|is_unique[users.email]',
		// 	[
		// 		'is_unique' => 'Email ini sudah terdaftar',
		// 		'required' => 'Email tidak boleh kosong',
		// 	]
		// );

		$this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required|trim|is_unique[users.nomor_telepon]|max_length[13]|min_length[7]', [
			'is_unique' => 'Nomor Telepon ini sudah terdaftar',
			'max_length' => 'Nomor Telepon maksimal 13',
			'min_length' => 'Nomor Telepon minimal 7',
			'required' => 'Nomor Telepon tidak boleh kosong',
		]);

		$this->form_validation->set_rules('tanggal_lahir',"Tanggal Lahir", 'required|callback_check_age');
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
			$data = [
				'nama' =>  $this->input->post('nama'),
				// 'email' => $this->input->post('email'),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role' => 2,
				'is_active' => 1,
				'created_at' => time(),
				'nomor_telepon' => $this->input->post('nomor_telepon'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			];

			$this->db->insert('users', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">Congratulation!</div>');
			redirect('auth/login');
		}
	}

	public function check_age($date){
		$dob = new DateTime($date);
		$now = new DateTime();
		$age = $now->diff($dob)->y;

		if($age < 19){
			$this->form_validation->set_message('check_age', 'Usia anda minimal 19 tahun');
		return false;
	}
		return true;
	}
	



}
