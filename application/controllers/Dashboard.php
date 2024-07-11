<?php
class Dashboard extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_Auth');
		$this->load->library('twilio');
		$this->load->library('session');
	}

	public function admin()
	{
		
	}

	public function kesehatan()
	{

	}
	public function bnn()
	{

	}
	public function psikolog()
	{

	}
	public function catin()
	{

	}

	
}
