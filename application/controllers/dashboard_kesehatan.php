<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard_kesehatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('twilio');
		$this->load->library('session');
		$this->load->model('m_Tanggal_Pemeriksaan');
		$this->load->model('m_User_detail');
		$this->load->model('m_Auth');
		$this->load->model('m_Penyakit');
		$this->load->model('m_gejala');
		$this->load->model('m_kelompok_gejala');
		$this->load->model('m_Hasil_Diagnosa');
		$this->load->model('m_Nilai_Pakar');
		$this->load->library('pagination');
	}

	public function view_kesehatan()
	{
		$dataCatin = $this->m_User_detail->count_data_catin();
		$this->session->set_userdata('data_catin', $dataCatin);
		$this->load->view('Kesehatan/dashboard_kesehatan');
	}

	public function data_kesehatan()
	{
		$id_pemeriksa = $this->session->userdata('id_user');
		$id_pemeriksa = $this->m_User_detail->getpemeriksa($id_pemeriksa);
		$this->session->set_userdata('nama_pemeriksa', $id_pemeriksa[0]['nama_lengkap']);
		$keyword = $this->input->get('search');
		$tanggal = $this->session->userdata('kesehatan_tanggal_filter');

		$config = array();
		$config['base_url'] = base_url('dashboard_admin/data_kesehatan'); // URL untuk halaman pagination
		$config['per_page'] = 5; // Jumlah data per halaman
		$config['uri_segment'] = 3; // Segmen URI untuk mengetahui halaman
		$config['num_links'] = 5; // Jumlah link angka halaman
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		if ($keyword != null) {
			$search = $this->m_User_detail->search($keyword, $config['per_page'], $page);
			$count = $this->m_User_detail->search_count($keyword);
			$config['base_url'] = base_url('dashboard_kesehatan/data_kesehatan');
			$config['suffix'] = '?search=' . urlencode($keyword); // Tambahkan query string di akhir setiap link
			$config['first_url'] = $config['base_url'] . $config['suffix'];

			// Ambil ID dari hasil pencarian
			$id = array_map(function ($user) {
				return $user['id_user_detail'];
			}, $count);
			if ($tanggal != null) {
				$config['base_url'] = base_url('dashboard_kesehatan/data_kesehatan');
				$config['suffix'] = '?search=' . urlencode($keyword); // Tambahkan query string di akhir setiap link
				$config['first_url'] = $config['base_url'] . $config['suffix'];
				$data['id_user_detail'] = $this->m_User_detail->get_by_id_and_tanggal_count($id, $tanggal);
				$count = count((array) $data['id_user_detail']);
				$data['user_detail'] = $this->m_User_detail->get_by_id_and_tanggal($id, $tanggal, $config['per_page'], $page);
			} else {
				$data['user_detail'] = $search;
				$count = count((array) $count);
			}
		} else {
			if ($tanggal == null) {
				$config['base_url'] = base_url('dashboard_kesehatan/data_kesehatan');
				$data['id_user_detail'] = $this->m_User_detail->all_count();
				$count = count((array) $data['id_user_detail']);
				$data['user_detail'] = $this->m_User_detail->all($config['per_page'], $page);
			} else {
				$config['base_url'] = base_url('dashboard_kesehatan/data_kesehatan');
				$data['id_user_detail'] = $this->m_User_detail->get_by_data_registered_count($tanggal);
				$data['user_detail'] = $this->m_User_detail->get_by_data_registered($tanggal, $config['per_page'], $page);
				$count = count((array) $data['id_user_detail']);
			}
		}
		$config['full_tag_open'] = '<nav><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');
		$config['total_rows'] = $count;
		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['start'] = $page;
		$data['gejalaKesehatan'] = $this->m_gejala->get_all_gejala_kesehatan()->result_array();
		$this->load->view('Kesehatan/data_kesehatan', $data);
	}

	public function data_verifikasi()
	{
		$verifikasi = $this->input->post('data_verifikasi');
		$id = $this->input->post('id');
		$this->m_User_detail->update_kesehatan_verifikasi($id, $verifikasi);
		redirect('dashboard_kesehatan/data_kesehatan');
	}

	public function kesehatan_filter_tanggal()
	{
		$id_tanggal = 'ee250336-d65f-9309-742e-3c500258963d';
		$tanggal = $this->input->post('tanggal');
		if ($tanggal == '') {
			$tanggal = null;
		}
		$this->m_Tanggal_Pemeriksaan->tanggal_periksa($id_tanggal, $tanggal);
		$tanggal = $this->m_Tanggal_Pemeriksaan->get_tanggal($id_tanggal);
		$this->session->set_userdata('kesehatan_tanggal_filter', $tanggal);
		redirect('Dashboard_kesehatan/data_kesehatan');
	}

	public function hasil_survey()
	{
		$id = $this->input->post('hasil');

		$response['id'] = $this->m_Hasil_Diagnosa->get_by_id($id);

		echo json_encode($response);
	}

	public function periksa_kesehatan() 
	{
		$id_user = $this->input->post('id');
		$nama_faskes = $this->input->post('nama_faskes');
		$nama_pemeriksa_kesehatan = $this->input->post('nama_pemeriksa');
		$tekanan_sistolik = $this->input->post('sistolik');
		$tekanan_diastolik = $this->input->post('diastolik');
		$nadi = $this->input->post('nadi');
		$nafas = $this->input->post('nafas');
		$suhu = $this->input->post('suhu');
		$berat_badan = $this->input->post('berat_badan');
		$tinggi_badan = $this->input->post('tinggi');
		$imt = $this->input->post('imt');
		$lila = $this->input->post('lila');
		$suntik_tt = $this->input->post('suntik_tt');
		$tanda_anemia = $this->input->post('anemia');
		$hb = $this->input->post('hb');
		$gol_darah = $this->input->post('gol_darah');
		$rapid_test = $this->input->post('rapidtest');
		$plano_test = $this->input->post('planotest');
		$status_kesehatan = $this->input->post('verifikasi');
		$id_pemeriksaan_kesehatan = 2;

		if (!$this->input->post('periksa_kesehatan')){
			$this->session->set_flashdata('eror_survei', 'eror_survei');
            redirect('dashboard/view_catin');
		} else{
			$gejala = implode(",", $this->input->post("periksa_kesehatan"));
			$data["listGejala"] = $this->m_Penyakit->get_list_by_id($gejala);
			//Menghitung Nilai Kemungkinan
			$listPenyakit = $this->m_Penyakit->get_by_gejala($gejala);
			$penyakit = array();
			$i=0;
			foreach($listPenyakit->result() as $value){
				$listGejala = $this->m_Penyakit->get_gejala_by_penyakit($value->penyakit_id,$gejala);
				$combineCFmb=0;
				$combineCFmd=0;
				$CFBefore=0;
				$j=0;
                $cfawal=0;
				foreach($listGejala->result() as $value2){
					//Hitung Nilai CF yang Baru
					$cfold = $cfawal + ($value2->cf * (1 - $cfawal));
					//Melakukan Update nilai CF 
					$cfawal = $cfold;
				}
				$combineHasil = $cfawal;
				if($combineHasil)
				{
					$penyakit[$i]=array('kode'=>$value->kode,
										'nama'=>$value->nama,
										'kepercayaan'=>number_format($combineHasil * 100, 1),
										'keterangan'=>$value->keterangan);
										// 'user_id' =>$user_login);
					// $this->db->insert('hasil_diagnosa', $penyakit[$i]);
					$i++;
				}
			}

			function cmp($a, $b)
			{
				return ($a["kepercayaan"] > $b["kepercayaan"]) ? -1 : 1;
			}
			usort($penyakit, "cmp");
			$data["listPenyakit"] = $penyakit;
			$data_hasil = array(
				'kode_kesehatan' =>$penyakit[0]['kode'],
				'nama_sakit_kesehatan' =>$penyakit[0]['nama'],
				'kepercayaan_kesehatan' =>$penyakit[0]['kepercayaan'],
				'keterangan_kesehatan' =>$penyakit[0]['keterangan'],
			);
			$this->db->where('user_id', $id_user);
			$this->db->update('hasil_diagnosa', $data_hasil);
			$this->m_Hasil_Diagnosa->update_pemeriksaan_kesehatan($id_user, $nama_faskes, $nama_pemeriksa_kesehatan, $tekanan_sistolik, $tekanan_diastolik, $nadi, $nafas, $suhu, $berat_badan, $tinggi_badan, $imt, $lila, $suntik_tt, $tanda_anemia, $hb, $gol_darah, $rapid_test, $plano_test, $status_kesehatan, $id_pemeriksaan_kesehatan);
			redirect('dashboard_kesehatan/data_kesehatan');
		}

	}

	
}
