<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/kesehatan/dashboard.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/admin/sidebar_admin.css') ?>" />
</head>

<body>
	<div class="container">
		<!-- header -->
		<div class="header-dashboard-admin">
			<div class="container-logo">
				<img src="<?= base_url('assets/') ?>img/percantin.png" alt="">
				<p>PERCATIN</p>
			</div>
			<div class="profil-container">
				<div class="foto-profil">
					<img src="<?= base_url('assets/img/profile-admin.png') ?>" alt="">
				</div>
				<div style="display: flex; flex-direction: column;">
					<p style="color: #7F7F7F; font-size: 12px; font-weight: 600;">Halo,</p>
					<p class="nama"><?= $this->session->userdata('username'); ?></p>
				</div>
				<!-- Dropdown -->
				<div class="dropdown-logo">
					<img src="<?= base_url('assets/img/dropdown.svg') ?>" alt="">
					<div class="dropdown" style="width: 122%;">
						<div> <a href="<?= base_url('auth/ganti_password') ?>" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Ganti Password </a>
						</div>
						<div><a href="<?= base_url('auth/login') ?>" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Keluar </a></div>
					</div>
				</div>
				<!-- End of Dropdown -->
			</div>
		</div>

		<!-- sidebar -->
		<div class="container-sidebar-dashboard-admin">
			<p>NAVIGASI</p>
			<a href="">
				<div class="menu location-menu">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g id="Frame">
							<path id="Vector"
								d="M13 9V3H21V9H13ZM3 13V3H11V13H3ZM13 21V11H21V21H13ZM3 21V15H11V21H3ZM5 11H9V5H5V11ZM15 19H19V13H15V19ZM15 7H19V5H15V7ZM5 19H9V17H5V19Z"
								fill="#828282" />
						</g>
					</svg>
					<p class="menu-text">Dashboard</p>
				</div>
			</a>
			<a href="<?= base_url('dashboard_kesehatan/data_kesehatan') ?>">
				<div class="menu">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g id="Frame">
							<path id="Vector"
								d="M15 21V18H11V8H9V11H2V3H9V6H15V3H22V11H15V8H13V16H15V13H22V21H15ZM17 9H20V5H17V9ZM17 19H20V15H17V19ZM4 9H7V5H4V9Z"
								fill="#828282" />
						</g>
					</svg>
					<p class="menu-text">Data Catin</p>
				</div>
			</a>

		</div>

		<!--==================================================================================================-->

		<!-- content -->
		<div class="container-content">
			<div class="container-content-dashboard-admin">
				<p>Dashboard</p>

				<!-- Cards -->
				<div class="container-card-dashboard">
					<div class="card-dashboard" id="biru">
						<img class="logo" src="<?= base_url('assets/') ?>img/paper.svg"" alt="">
                        <div class=" container-judul-jumlah">
						<p class="judul-card-dashboard">Data Catin</p>
						<p class="jumlah-card-dashboard"><?= $this->session->userdata('data_catin') ?></p>
					</div>
					<a href="<?= base_url('dashboard_admin/view_data_catin') ?>" style="cursor:pointer">
						<p class="selengkapnya-text">Selengkapnya ></p>
					</a>
				</div>
				<div class="card-dashboard" id="hijau">
					<img class="logo" src="<?= base_url('assets/') ?>img/printer.svg" alt="">
					<div class="container-judul-jumlah">
						<p class="judul-card-dashboard">Cetak Kartu</p>
						<p class="jumlah-card-dashboard"><?= $this->session->userdata('cetak_kartu') ?></p>
					</div>
					<p class="selengkapnya-text">Selengkapnya ></p>
				</div>
				<div class="card-dashboard" id="merah">
					<img class="logo" src="<?= base_url('assets/img/warning.svg') ?>" alt="">
					<div class="container-judul-jumlah">
						<p class="judul-card-dashboard">Data Catin Beresiko Stunting</p>
						<p class="jumlah-card-dashboard"><?= $this->session->userdata('catin_bermasalah') ?></p>
					</div>
					<p class="selengkapnya-text">Selengkapnya ></p>
				</div>
				<div class="card-dashboard" id="merah">
					<img class="logo" src="<?= base_url('assets/img/narkobski.svg') ?>" alt="">
					<div class="container-judul-jumlah">
						<p class="judul-card-dashboard">Data Catin Beresiko Narkoba</p>
						<p class="jumlah-card-dashboard"><?= $this->session->userdata('catin_bermasalah') ?></p>
					</div>
					<p class="selengkapnya-text">Selengkapnya ></p>
				</div>
				<div class="card-dashboard" id="merah">
					<img class="logo" src="<?= base_url('assets/img/hiv.svg') ?>" alt="">
					<div class="container-judul-jumlah">
						<p class="judul-card-dashboard">Data Catin Beresiko HIV</p>
						<p class="jumlah-card-dashboard"><?= $this->session->userdata('catin_bermasalah') ?></p>
					</div>
					<p class="selengkapnya-text">Selengkapnya ></p>
				</div>
				</div>
				<!-- End of cards -->

				<!-- <div class="edit-pendaftaran-btn">
          <img src="../public/icon/edit.svg" alt="">
          <p>Edit Pendaftaran</p>
        </div>

        <div class="tanggal-pemeriksaan">
          <p>Tanggal Pemeriksaan</p>
          <div class="container-tanggal-pemeriksaan">
            <div class="subcontainer-tanggal-pemeriksaan">
              <div class="tanggal-buka-tutup">03-03-2004</div>
              <div class="buka-tutup-btn buka-btn">Pendaftaran Dibuka</div>
            </div>
            <div class="subcontainer-tanggal-pemeriksaan">
              <div class="tanggal-buka-tutup">03-03-2004</div>
              <div class="buka-tutup-btn tutup-btn">Pendaftaran Ditutup</div>
            </div>
          </div>
        </div> -->

				<!-- copyright text -->
				<div class="copyright-text">
					Copyright &copy; 2024 DPPKB Kota Tebing. Hak cipta dilindungi
				</div>
			</div>
		</div>

	</div>
</body>
<script src="sidebar.js"></script>

</html>
