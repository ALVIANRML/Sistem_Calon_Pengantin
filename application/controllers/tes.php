<?php

class tes extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->view('tes/tes', array('error' => ' '));
	}

	public function do_upload()
	{
		
		if (!is_dir(FCPATH . 'uploads/photo')) {
			mkdir(FCPATH . 'uploads/photo', 0777, true);}
			$config['upload_path'] = FCPATH . 'uploads/photo';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2048; // 2 MB
        $config['max_width'] = 2048;
        $config['max_height'] = 2048;


			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('userfile')) {
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('tes/tes', $error);
			} else {
				var_dump($config['upload_path']);
				exit;
				$data = array('upload_data' => $this->upload->data());

				$this->load->view('tes/success', $data);
			}
		}
	}

