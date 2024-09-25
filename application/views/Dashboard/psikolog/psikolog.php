<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard Psikolog</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/admin/admin.css')?>" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/admin/sidebar_admin.css') ?>" />
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/percatin_log.png" />

	<!-- Custom styles for this template-->


	<!-- SweetAlert -->
	<script src="<?= base_url() ?>node_modules/sweetalert/dist/sweetalert.min.js"></script>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<style>
		.swal-modal {
			width: 80% !important;
			/* Sesuaikan panjang popup */
			max-width: 600px;
			/* Batasi lebar maksimum */
			background-color: white !important;
			/* Warna background popup */
			height: auto;
			/* Atur tinggi secara otomatis */
		}

		.swal-title {
			color: #343a40 !important;
			/* Warna teks judul */
			font-weight: bold;
			margin-bottom: 10px;
			/* Atur margin bawah */
			margin-top: 20px;
			/* Atur margin atas */
			text-align: left;
			padding-left: 20px;
			/* Padding kiri */
		}

		.swal-content {
			color: white !important;
			/* Warna teks isi */
			background-color: #015D67;
			border-radius: 4px;
			width: 90%;
			max-width: 500px;
			/* Batasi lebar maksimum konten */
			margin: auto;
			/* Mengatur margin auto untuk posisi tengah */
			display: flex;
			/* Menggunakan flexbox untuk penataan */
			align-items: center;
			/* Memusatkan vertikal */
			justify-content: left;
			/* Memusatkan horizontal */
			padding: 20px;
			/* Atur padding sesuai kebutuhan */
			text-align: left;
			font-size: medium;
		}

		.swal-button {
			background-color: #015D67 !important;
			/* Warna tombol */
			position: relative;
			top: 50%;
			/* Geser vertikal */
			right: 45%;
			/* Geser horizontal */
		}

		/* Media query untuk layar yang lebih kecil */
		@media (max-width: 629px) {
			.swal-modal {
				width: 90% !important;
				/* Sesuaikan lebar untuk layar kecil */
				max-width: 90%;
				height: auto;
				/* Atur tinggi secara otomatis */
			}

			.swal-content {
				width: 95%;
				/* Sesuaikan lebar konten untuk layar kecil */
				max-width: none;
				/* Hapus batasan lebar maksimum */
				height: 10%;
			}
		}
	</style>
</head>

<body>
	<?php if ($this->session->flashdata('error_tanggal')) { ?>
		<script>
			swal({
				title: "Error!",
				text: "Tanggal pemeriksaan tidak boleh lebih awal dari tanggal hari ini.",
				icon: "error"
			});
		</script>
	<?php } ?>
	<?php if ($this->session->flashdata('error_tanggal_pemeriksaan')) { ?>
		<script>
			swal({
				title: "Error!",
				text: "Tanggal Pendaftaran tidak boleh lebih awal dari tanggal hari ini.",
				icon: "error"
			});
		</script>
	<?php } ?>
	<div class="container">
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
		<div class="container-sidebar-dashboard-admin">
			<p>NAVIGASI</p>
			<a href="">
				<div class="menu location-menu">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g id="Frame">
							<path id="Vector" d="M13 9V3H21V9H13ZM3 13V3H11V13H3ZM13 21V11H21V21H13ZM3 21V15H11V21H3ZM5 11H9V5H5V11ZM15 19H19V13H15V19ZM15 7H19V5H15V7ZM5 19H9V17H5V19Z" fill="#828282" />
						</g>
					</svg>
					<p class="menu-text">Dashboard</p>
				</div>
			</a>
			<a href="<?= base_url('dashboard_psikolog/view_data') ?>">
				<div class="menu">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g id="Frame">
							<path id="Vector" d="M15 21V18H11V8H9V11H2V3H9V6H15V3H22V11H15V8H13V16H15V13H22V21H15ZM17 9H20V5H17V9ZM17 19H20V15H17V19ZM4 9H7V5H4V9Z" fill="#828282" />
						</g>
					</svg>
					<p class="menu-text">Data Catin</p>
				</div>
			</a>
			

			
		</div>

		<div class="container-content" style="padding: 0px;">
			<div class="container-content-dashboard-admin">
				<p>Dashboard</p>
				<div class="container-card-dashboard">
					<div class="card-dashboard" id="biru">
						<img class="logo" src="<?= base_url('assets/') ?>img/paper.svg"" alt="">
                        <div class=" container-judul-jumlah">
						<p class="judul-card-dashboard">Data Catin</p>
						<p class="jumlah-card-dashboard"><?= $this->session->userdata('data_catin') ?></p>
					</div>
					<a href="<?= base_url('dashboard_psikolog/view_data') ?>">
						<p class="selengkapnya-text">Selengkapnya ></p>
					</a>
				</div>
				
			</div>
			
			<div class="copyright-text">
				Copyright © 2024 DPPKB Kota Tebing. Hak cipta dilindungi
			</div>
		</div>
	</div>

	</div>

	<script>
		function showPopup() {
			document.getElementById('popup').classList.add('show');
			document.getElementById('overlay').classList.add('show');
		}

		function closePopup() {
			document.getElementById('popup').classList.remove('show');
			document.getElementById('overlay').classList.remove('show');
		}
	</script>

	<script src="<?= base_url('assets/js/sidebar.js') ?>"></script>




</body>

</html>
