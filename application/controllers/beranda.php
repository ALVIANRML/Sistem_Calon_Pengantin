<?php
defined('BASEPATH') or exit('No direct script access allowed');

class beranda extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_Contact');
		$this->load->model('m_Tanggal_Pemeriksaan');
		$this->load->model('m_User_detail');
		$this->load->library('session');
	}

	public function index()
	{
		$id_tanggal = 'd4973c6f-3510-4edc-8b49-e044b873bb26';
		$tanggalexisted = $this->m_Tanggal_Pemeriksaan->get_tanggal_by_id($id_tanggal);
		$today = date('Y-m-d');
		// $today = '2024-08-12';
		
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
			
			$todaytes = date('Y-m-d');
			$kuota =$this->m_User_detail->hitung_kuota($todaytes);
			$kuota =7;
			$this->session->set_userdata('kuota', $kuota );
			if ($kuota == 10){
				$id_status = 0;
				$this->m_Tanggal_Pemeriksaan->update_id_status($id_tanggal, $id_status);
			}
			else if ($kuota < 10 && $kuota >= 5){
				$kuota = 10 - $kuota;
				$this->session->set_userdata('sisa_kuota', $kuota );
			}
			$status = $this->m_Tanggal_Pemeriksaan->get_status($id_tanggal);
			$this->session->set_userdata('status', $status);
			$this->load->view('beranda/public');
		}
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

			redirect('beranda/index');
		} else {
			$id = bin2hex(random_bytes(16));
			$firstName = $this->input->post('first_name');
			$lastName = $this->input->post('last_name');
			$address = $this->input->post('address');
			$description = $this->input->post('description');

			$this->m_Contact->contact($id, $firstName, $lastName, $address, $description);
			redirect('beranda/index');
		}
	}

	public function struktur(){
		$this->load->view('beranda/struktur');
	}
}
