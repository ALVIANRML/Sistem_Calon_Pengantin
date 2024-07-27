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


        $id_user = $this->session->userdata('id_user');
		$dataCatin = $this->m_User_detail->count_data_catin();
		$cetakKartu = $this->m_User_detail->count_cetak_kartu();
		$catinBermasalah = $this->m_User_detail->count_catin_bermasalah();
        $this->session->set_userdata('data_catin', $dataCatin);
        $this->session->set_userdata('cetak_kartu', $cetakKartu);
        $this->session->set_userdata('catin_bermasalah', $catinBermasalah);
		$this->load->view('Dashboard/admin/admin');
    }

    public function view_data_catin(){
        $this->load->view('Dashboard/admin/data_catin_admin');
    }
}
