<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard_Admin extends CI_Controller

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



    public function view_admin()
    {
        // $id_user = $this->session->userdata('id_user');

		// $userDetail = $this->m_User_detail->get_users($id_user);
		// if ($userDetail->num_rows() > 0) {
		// 	$userDetail = $userDetail->row_array();
			
        // }
        $this->load->view('Dashboard/admin');
    }
}
