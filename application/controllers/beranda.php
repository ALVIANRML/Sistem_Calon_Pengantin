<?php
defined('BASEPATH') or exit('No direct script access allowed');

class beranda extends CI_Controller
{
	// public function __construct()
	// {

	// 	parent::__construct();
	// 	$this->load->library('form_validation');
	// 	$this->load->model('m_Auth');
	// }
	public function faq()
	{
		// var_dump(20);
		// exit;

			$this->load->view('Beranda/faq');

	}

	public function tentang_kami(){
		$this->load->view('Beranda/alur_pendaftaran');
	}
}
