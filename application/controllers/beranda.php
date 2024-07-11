<?php
defined('BASEPATH') or exit('No direct script access allowed');

class beranda extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_Beranda');
		$this->load->model('m_Dashboard');
		$this->load->library('session');
	}

	public function index()
	{
		$id_tanggal ='d4973c6f-3510-4edc-8b49-e044b873bb26';
		$status = $this->m_Dashboard->get_status($id_tanggal);
		$this->session->set_userdata('status', $status);
		$this->load->view('beranda/public');
	}

	public function home()
	{
		$this->load->view('Beranda/home');
	}



	public function contact()
	{
		$this->form_validation->set_rules(
			'first_name',
			'First Name',
			'required|trim',
			[
				'required' => 'Nama tidak boleh kosong',
			]
		);

		$this->form_validation->set_rules(
			'last_name',
			'Last Name',
			'required|trim',
			[
				'required' => 'Nama tidak boleh kosong',
			]
		);

		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim',
			[
				'required' => 'email tidak boleh kosong',
				'email' => 'format email salah',
			]
		);
		$this->form_validation->set_rules(
			'address',
			'Address',
			'required|trim',
			[
				'required' => 'Alamat tidak boleh kosong',
			]
		);

		$this->form_validation->set_rules(
			'description',
			'Description',
			'required|trim',
			[
				'required' => 'Deskripsi tidak boleh kosong',
			]
		);

		if ($this->form_validation->run() == false) {

			$this->load->view('beranda/public');
		} else {
			$id = bin2hex(random_bytes(16));
			$firstName = $this->input->post('first_name');
			$lastName = $this->input->post('last_name');
			$address = $this->input->post('address');
			$description = $this->input->post('description');

			$this->m_Beranda->contact($id, $firstName, $lastName, $address, $description);
			redirect('beranda/public');
		}
	}
}
