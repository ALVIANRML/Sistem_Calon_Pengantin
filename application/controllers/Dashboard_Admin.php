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
        $id_tanggal = 'd4973c6f-3510-4edc-8b49-e044b873bb26';
        $status = $this->m_Tanggal_Pemeriksaan->get_status($id_tanggal);
        $tanggal = $this->m_Tanggal_Pemeriksaan->get_tanggal_periksa($id_tanggal);
        $this->session->set_userdata('tanggal_pendaftaran', $tanggal);
        $id_tanggal = '0ff4c7bc-cf4e-4c38-8d0a-f5a7de5c5c7e';
        $tanggal = $this->m_Tanggal_Pemeriksaan->get_tanggal_periksa($id_tanggal);
        $this->session->set_userdata('status', $status);
        $this->session->set_userdata('tanggal', $tanggal);
        $dataCatin = $this->m_User_detail->count_data_catin();
        $cetakKartu = $this->m_User_detail->count_cetak_kartu();
        $catinBermasalah = $this->m_User_detail->count_catin_bermasalah();
        $this->session->set_userdata('data_catin', $dataCatin);
        $this->session->set_userdata('cetak_kartu', $cetakKartu);
        $this->session->set_userdata('catin_bermasalah', $catinBermasalah);
        $this->load->view('Dashboard/admin/admin');
    }

    public function view_data_catin()
    {
        $data['user_detail'] = $this->m_User_detail->all();

        $this->load->view('Dashboard/admin/data_catin_admin',$data);
    }

    public function test()
    {
        $this->load->view('tes/tes_admin');
    }

    public function admin_filter_tanggal()
    {
        $id_tanggal = '50f5b246-20b7-4e1c-88f6-81865d50ecf0';
        $tanggal = $this->input->post('tanggal');
        $this->m_Tanggal_Pemeriksaan->tanggal_periksa($id_tanggal, $tanggal);
        $tanggal = $this->m_Tanggal_Pemeriksaan->get_tanggal_periksa($id_tanggal);
        $this->session->set_userdata('admin_tanggal_filter', $tanggal);
        redirect('dashboard_admin/view_data_catin');

    }



    public function tanggal_periksa()
    {
        $this->form_validation->set_rules('tanggal_periksa', 'Tanggal Pemeriksaan',);
        $id_tanggal = '0ff4c7bc-cf4e-4c38-8d0a-f5a7de5c5c7e';
        $tanggal = $this->input->post('tanggal_periksa');
        $this->m_Tanggal_Pemeriksaan->tanggal_periksa($id_tanggal, $tanggal);
    }
}
