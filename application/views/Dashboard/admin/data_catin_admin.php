<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Catin</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/admin/data-catin-admin.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/admin/sidebar_admin.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/pagination.css') ?>" />
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/percatin_log.png" />
	<script src="<?php echo base_url("js/jquery.min.js"); ?>"></script> <!-- Load library jquery -->
	<script src="<?php echo base_url("js/config.js"); ?>"></script> <!-- Load file process.js -->

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


<body style="overflow-y:auto">
	<?php if ($this->session->flashdata('success_delete')) { ?>
		<script>
			swal({
				title: "Success!",
				text: "Anda berhasil menghapus data.",
				icon: "success"
			});
		</script>
	<?php } ?>
	<?php if ($this->session->flashdata('cancel_delete')) { ?>
		<script>
			swal({
				title: "Error!",
				text: "permintaan anda batal.",
				icon: "error"
			});
		</script>
	<?php } ?>

	<?php if ($this->session->flashdata('error_captcha')) { ?>
		<script>
			swal({
				title: "Error!",
				text: "Kode Yang Anda Input Salah.",
				icon: "error"
			});
		</script>
	<?php } ?>
	<?php
	$angka = 0; // Inisialisasi variabel $angka
	?>
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
					<div class="dropdown">
						<div> <a href="<?= base_url('auth/ganti_password') ?>" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Ganti Password</a>
						</div>
						<div><a href="<?= base_url('auth/login') ?>" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Keluar</a></div>
					</div>
				</div>
				<!-- End of Dropdown -->
			</div>
		</div>

		<!-- sidebar -->
		<div class="container-sidebar-dashboard-admin">
			<p>NAVIGASI</p>
			<a href="<?= base_url('dashboard_admin/view_admin') ?>">
				<div class="menu">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g id="Frame">
							<path id="Vector" d="M13 9V3H21V9H13ZM3 13V3H11V13H3ZM13 21V11H21V21H13ZM3 21V15H11V21H3ZM5 11H9V5H5V11ZM15 19H19V13H15V19ZM15 7H19V5H15V7ZM5 19H9V17H5V19Z" fill="#828282" />
						</g>
					</svg>
					<p class="menu-text">Dashboard</p>
				</div>
			</a>
			<a href="<?= base_url('dashboard_admin/view_data_catin') ?>">
				<div class="menu location-menu">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g id="Frame">
							<path id="Vector" d="M15 21V18H11V8H9V11H2V3H9V6H15V3H22V11H15V8H13V16H15V13H22V21H15ZM17 9H20V5H17V9ZM17 19H20V15H17V19ZM4 9H7V5H4V9Z" fill="#828282" />
						</g>
					</svg>
					<p class="menu-text">Data Catin</p>
				</div>
			</a>
			<a href="<?= base_url('dashboard_admin/data_penyakit') ?>">
				<div class="menu">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g id="material-symbols-light:data-table">
							<path id="Vector" d="M4.00001 8.92304H20V5.38504C20 5.23104 19.936 5.09004 19.808 4.96204C19.68 4.83404 19.539 4.76971 19.385 4.76904H4.615C4.46167 4.76904 4.32067 4.83304 4.19201 4.96104C4.06334 5.08904 3.99934 5.23004 4.00001 5.38404V8.92304ZM4.00001 14.077H20V9.92304H4.00001V14.077ZM4.615 19.231H19.385C19.5383 19.231 19.6793 19.1667 19.808 19.038C19.9367 18.9094 20.0007 18.7684 20 18.615V15.077H4.00001V18.616C4.00001 18.7694 4.06401 18.9104 4.19201 19.039C4.32001 19.1677 4.461 19.2317 4.615 19.231ZM5.77001 7.65404V6.03904H7.38501V7.65404H5.77001ZM5.77001 12.808V11.192H7.38501V12.808H5.77001ZM5.77001 17.962V16.346H7.38501V17.962H5.77001Z" fill="#828282" />
						</g>
					</svg>
					<p class="menu-text">Data Penyakit</p>
				</div>
			</a>
			<!-- menu double -->
			<div class="menu menu-double" id="md1">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g id="material-symbols-light:data-table">
						<path id="Vector" d="M4.00001 8.92304H20V5.38504C20 5.23104 19.936 5.09004 19.808 4.96204C19.68 4.83404 19.539 4.76971 19.385 4.76904H4.615C4.46167 4.76904 4.32067 4.83304 4.19201 4.96104C4.06334 5.08904 3.99934 5.23004 4.00001 5.38404V8.92304ZM4.00001 14.077H20V9.92304H4.00001V14.077ZM4.615 19.231H19.385C19.5383 19.231 19.6793 19.1667 19.808 19.038C19.9367 18.9094 20.0007 18.7684 20 18.615V15.077H4.00001V18.616C4.00001 18.7694 4.06401 18.9104 4.19201 19.039C4.32001 19.1677 4.461 19.2317 4.615 19.231ZM5.77001 7.65404V6.03904H7.38501V7.65404H5.77001ZM5.77001 12.808V11.192H7.38501V12.808H5.77001ZM5.77001 17.962V16.346H7.38501V17.962H5.77001Z" fill="#828282" />
					</g>
				</svg>
				<p class="menu-text">Data Gejala</p>
				<svg class="logo-menu-dropdown" xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24" fill="none">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M10.157 12.7109L4.5 18.3679L3.086 16.9539L8.036 12.0039L3.086 7.05389L4.5 5.63989L10.157 11.2969C10.3445 11.4844 10.4498 11.7387 10.4498 12.0039C10.4498 12.2691 10.3445 12.5234 10.157 12.7109Z" fill="#828282" />
				</svg>
			</div>
			<div class="menu-dropdown-visibility" id="mdv1">
				<div class="menu-dropdown">
					<a href="<?= base_url('dashboard_admin/data_penyakit') ?>">
						<p>Gejala</p>
					</a>
					<a href="<?= base_url('dashboard_admin/nilai_pakar') ?>">
						<p>Nilai Pakar</p>
					</a>
				</div>
			</div>

			<div class="menu menu-double" id="md2">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g id="flowbite:users-solid">
						<path id="Vector" fill-rule="evenodd" clip-rule="evenodd" d="M8 4.00001C6.93913 4.00001 5.92172 4.42144 5.17157 5.17159C4.42143 5.92173 4 6.93915 4 8.00001C4 9.06088 4.42143 10.0783 5.17157 10.8284C5.92172 11.5786 6.93913 12 8 12C9.06087 12 10.0783 11.5786 10.8284 10.8284C11.5786 10.0783 12 9.06088 12 8.00001C12 6.93915 11.5786 5.92173 10.8284 5.17159C10.0783 4.42144 9.06087 4.00001 8 4.00001ZM6 13C4.93913 13 3.92172 13.4214 3.17157 14.1716C2.42143 14.9217 2 15.9391 2 17V18C2 18.5304 2.21071 19.0392 2.58579 19.4142C2.96086 19.7893 3.46957 20 4 20H12C12.5304 20 13.0391 19.7893 13.4142 19.4142C13.7893 19.0392 14 18.5304 14 18V17C14 15.9391 13.5786 14.9217 12.8284 14.1716C12.0783 13.4214 11.0609 13 10 13H6ZM13.25 10.905C13.728 10.045 14 9.05501 14 8.00001C14.0002 6.98345 13.7421 5.9835 13.25 5.09401C13.8178 4.55674 14.5306 4.19763 15.3003 4.06104C16.07 3.92446 16.8628 4.0164 17.5808 4.3255C18.2988 4.6346 18.9106 5.14731 19.3403 5.80026C19.7701 6.45322 19.9992 7.2178 19.9992 7.99951C19.9992 8.78123 19.7701 9.54581 19.3403 10.1988C18.9106 10.8517 18.2988 11.3644 17.5808 11.6735C16.8628 11.9826 16.07 12.0746 15.3003 11.938C14.5306 11.8014 13.8178 11.4423 13.25 10.905ZM15.466 20C15.806 19.412 16.001 18.729 16.001 18V17C16.0028 15.5238 15.4586 14.099 14.473 13H18C19.0609 13 20.0783 13.4214 20.8284 14.1716C21.5786 14.9217 22 15.9391 22 17V18C22 18.5304 21.7893 19.0392 21.4142 19.4142C21.0391 19.7893 20.5304 20 20 20H15.466Z" fill="#828282" />
					</g>
				</svg>
				<p class="menu-text">Data User</p>
				<svg class="logo-menu-dropdown" xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24" fill="none">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M10.157 12.7109L4.5 18.3679L3.086 16.9539L8.036 12.0039L3.086 7.05389L4.5 5.63989L10.157 11.2969C10.3445 11.4844 10.4498 11.7387 10.4498 12.0039C10.4498 12.2691 10.3445 12.5234 10.157 12.7109Z" fill="#828282" />
				</svg>
			</div>
			<div class="menu-dropdown-visibility" id="mdv2">
				<div class="menu-dropdown">
					<a href="<?= base_url('dashboard_admin/view_dinas_pemeriksaan') ?>">
						<p>Dinas Pemeriksa</p>
					</a>
					<a href="#">
						<p>User Pemeriksa</p>
					</a>
				</div>
			</div>
		</div>

		<!--==================================================================================================-->

		<!-- content -->
		<div class="container-content">
			<div class="container-content-data-catin-admin">
				<p>Data Calon Pengantin</p>

				<label class="filter-tanggal-text" for="tanggal">Filter tanggal</label>
				<div class="baris-filter-tanggal">
					<div>
						<form action="<?= base_url('dashboard_admin/admin_filter_tanggal') ?>" method="post">
							<div class="form-group">
								<div class="form-input-tanggal">
									<input type="date" id="tanggal" name="tanggal" value="<?= $this->session->userdata('admin_tanggal_filter') ?>" onchange="this.form.submit()">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M9 11H7V13H9V11ZM13 11H11V13H13V11ZM17 11H15V13H17V11ZM19 4H18V2H16V4H8V2H6V4H5C3.89 4 3.01 4.9 3.01 6L3 20C3 20.5304 3.21071 21.0391 3.58579 21.4142C3.96086 21.7893 4.46957 22 5 22H19C20.1 22 21 21.1 21 20V6C21 4.9 20.1 4 19 4ZM19 20H5V9H19V20Z" fill="#015963" />
									</svg>
								</div>
							</div>
						</form>
					</div>
					<div class="container-2-btn">
						<div class="cetak-data-btn" style="cursor:pointer" onclick="showPopup9()">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M14 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V8L14 2ZM15.8 20H14L12 16.6L10 20H8.2L11.1 15.5L8.2 11H10L12 14.4L14 11H15.8L12.9 15.5L15.8 20ZM13 9V3.5L18.5 9H13Z" fill="#FFFAFA" />
							</svg>
							<p>Cetak Data</p>
						</div>
						<div class="hapus-data-btn" style="cursor:pointer;" onclick="showPopup7()">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M20.0001 6C20.255 6.00028 20.5001 6.09788 20.6855 6.27285C20.8708 6.44782 20.9823 6.68695 20.9973 6.94139C21.0122 7.19584 20.9294 7.44638 20.7658 7.64183C20.6023 7.83729 20.3702 7.9629 20.1171 7.993L20.0001 8H19.9191L19.0001 19C19.0002 19.7652 18.7078 20.5015 18.1828 21.0583C17.6579 21.615 16.94 21.9501 16.1761 21.995L16.0001 22H8.00011C6.40211 22 5.09611 20.751 5.00811 19.25L5.00311 19.083L4.08011 8H4.00011C3.74523 7.99972 3.50008 7.90212 3.31474 7.72715C3.12941 7.55218 3.01788 7.31305 3.00294 7.05861C2.988 6.80416 3.07079 6.55362 3.23438 6.35817C3.39797 6.16271 3.63002 6.0371 3.88311 6.007L4.00011 6H20.0001ZM14.0001 2C14.5305 2 15.0393 2.21071 15.4143 2.58579C15.7894 2.96086 16.0001 3.46957 16.0001 4C15.9998 4.25488 15.9022 4.50003 15.7273 4.68537C15.5523 4.8707 15.3132 4.98223 15.0587 4.99717C14.8043 5.01211 14.5537 4.92933 14.3583 4.76574C14.1628 4.60214 14.0372 4.3701 14.0071 4.117L14.0001 4H10.0001L9.99311 4.117C9.96301 4.3701 9.8374 4.60214 9.64195 4.76574C9.44649 4.92933 9.19595 5.01211 8.94151 4.99717C8.68707 4.98223 8.44793 4.8707 8.27296 4.68537C8.09799 4.50003 8.0004 4.25488 8.00011 4C7.99995 3.49542 8.19052 3.00943 8.53361 2.63945C8.8767 2.26947 9.34696 2.04284 9.85011 2.005L10.0001 2H14.0001Z" fill="#FFFAFA" />
							</svg>
							<p>Hapus Data</p>
						</div>
					</div>
				</div>
				<!-- Popup 1 -->
				<div class="overlay" id="overlay7"></div>
				<div class="popup" id="popup7">
					<span class="close-btn" onclick="closePopup7()">&times;</span>
					<h2>Hapus Data</h2>
					<p>Masukkan tanggal untuk memilih data yang ingin dihapus</p>

					<hr>
					<form id="popupForm7" action="<?= base_url('dashboard_admin/filter_hapus_data'); ?>" method="post">
						<div class="hapus_data">
							<label for="tanggal_del_catin"><b class="form-label" style="color:#015D67; margin-bottom:10px;">Masukkan Tanggal</b><br></label>
							<div class="input-form">
								<input type="date" id="tanggal_del_catin" name="tanggal_del_catin" style="width:90%;" required>
								<svg class="tanggal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M9 11H7V13H9V11ZM13 11H11V13H13V11ZM17 11H15V13H17V11ZM19 4H18V2H16V4H8V2H6V4H5C3.89 4 3.01 4.9 3.01 6L3 20C3 20.5304 3.21071 21.0391 3.58579 21.4142C3.96086 21.7893 4.46957 22 5 22H19C20.1 22 21 21.1 21 20V6C21 4.9 20.1 4 19 4ZM19 20H5V9H19V20Z" fill="#015963" />
								</svg>
							</div>
							<button type="submit">Submit</button>
						</div>
					</form>
				</div>
				<?php $data = $this->session->userdata('hapus-data') ?>

				<!-- Popup 2 -->
				<div class="overlay" id="overlay8"></div>
				<div class="popup" id="popup8">
					<span class="close-btn" onclick="closePopup8()">&times;</span>
					<h2>Konfirmasi apakah anda yakin ingin menghapusnya</h2>


					<form action="<?= base_url('dashboard_admin/konfirmasi_hapus_data') ?>" method="post">
						<div class="input-form" style="border:none">
							<label for="option1">Apakah anda yakin ingin menghapus seluruh data pada tanggal <span id="tanggal_hapus_data"></span>?</label>
							<br>
							<input type="radio" id="option1" name="option1" value="1"> Ya
							<input type="radio" id="option1" name="option1" value="0"> Tidak
						</div>
						<div class="input-form" style="border:none">
							<label style="margin-top: 10px;">Untuk mengonfirmasi, ketik "<span id="captcha_text"></span>" di kotak di bawah ini.</label>
							<br>
							<input type="text" name="captcha" id="captcha" placeholder="Masukkan disini">
						</div>
						<button type="submit">Submit</button>
					</form>
				</div>


				<div class="container-tabel">
					<div class="baris-show-entries">
						<div class="show-entries">Show 10 entries</Show>
						</div>
						<div class="cari-data">
							<form action="<?= base_url('dashboard_admin/view_data_catin') ?>" method="get">
								<div class="form-input-cari">
									<input type="text" name="search" id="search" placeholder="Cari data">
									<button type="submit" id="btn-search">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M11 2C9.56238 2.00016 8.14571 2.3447 6.86859 3.00479C5.59146 3.66489 4.49105 4.62132 3.65947 5.79402C2.82788 6.96672 2.28933 8.32158 2.08889 9.74516C1.88844 11.1687 2.03194 12.6196 2.50738 13.9764C2.98281 15.3331 3.77634 16.5562 4.82154 17.5433C5.86673 18.5304 7.13318 19.2527 8.51487 19.6498C9.89656 20.0469 11.3533 20.1073 12.7631 19.8258C14.1729 19.5443 15.4947 18.9292 16.618 18.032L20.293 21.707C20.4816 21.8892 20.7342 21.99 20.9964 21.9877C21.2586 21.9854 21.5094 21.8802 21.6948 21.6948C21.8802 21.5094 21.9854 21.2586 21.9877 20.9964C21.99 20.7342 21.8892 20.4816 21.707 20.293L18.032 16.618C19.09 15.2939 19.7526 13.6979 19.9435 12.0138C20.1344 10.3297 19.8459 8.62586 19.1112 7.0985C18.3764 5.57113 17.2253 4.28228 15.7904 3.38029C14.3554 2.47831 12.6949 1.99985 11 2ZM5 11C5 10.2121 5.1552 9.43185 5.45673 8.7039C5.75825 7.97595 6.20021 7.31451 6.75736 6.75736C7.31451 6.20021 7.97595 5.75825 8.7039 5.45672C9.43186 5.15519 10.2121 5 11 5C11.7879 5 12.5682 5.15519 13.2961 5.45672C14.0241 5.75825 14.6855 6.20021 15.2426 6.75736C15.7998 7.31451 16.2418 7.97595 16.5433 8.7039C16.8448 9.43185 17 10.2121 17 11C17 12.5913 16.3679 14.1174 15.2426 15.2426C14.1174 16.3679 12.5913 17 11 17C9.4087 17 7.88258 16.3679 6.75736 15.2426C5.63214 14.1174 5 12.5913 5 11Z" fill="#E0E0E0" />
										</svg>
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="table-scroll">
						<table>
							<thead>
								<tr>
									<th>No.</th>
									<th>Username</th>
									<th>Nomor Telepon</th>
									<th>Nama Lengkap</th>
									<th>NIK</th>
									<th>No Pendaftar</th>
									<th>Status Verifikasi</th>
									<th>Status Kesehatan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<?php foreach ($user_detail as $datas) : ?>
								<?php $status_verifikasi = ($datas['id_status_verifikasi'] == 2) ? '<td><span class="status-tabel" style="background-color: green">Sudah diverifikasi</span></td>' : '<td><span class="status-tabel" style="background-color: #DC3545">Belum diverifikasi</span></td>'; ?>
								<?php $status_kesehatan = ($datas['id_status_kesehatan'] == 2) ? '<td><span class="status-tabel" style="background-color: green">Sudah diverifikasi</span></td>' : '<td><span class="status-tabel" style="background-color: #DC3545">Belum diverifikasi</span></td>'; ?>
								<?php $status_bnn = ($datas['id_status_bnn'] == 2) ? '<span class="status-tabel" style="background-color: green">Sudah di setujui</span>' : '<span class="status-tabel" style="background-color: #DC3545">Belum di setujui</span>'; ?>
								<?php $status_psikolog = ($datas['id_status_psikolog'] == 2) ? '<span class="status-tabel" style="background-color: green">Sudah di setujui</span>' : '<span class="status-tabel" style="background-color: #DC3545">Belum di setujui</span>'; ?>


								<?php
								$provinsi = $datas['provinsi'];
								$kota = $datas['kota'];
								$kecamatan = $datas['kecamatan'];
								$kelurahan = $datas['kelurahan'];
								$foto_user = $datas['foto_user'];
								$foto_kk = $datas['foto_kk'];
								$foto_ktp = $datas['foto_ktp'];
								$foto_surat = $datas['foto_surat'];


								?>
								<tbody>
									<tr>
										<td><?= ++$angka; ?></td>
										<td><?= $datas['nama'] ?></td>
										<td><?= $datas['nomor_telepon'] ?></td>
										<td><?= $datas['nama_lengkap'] ?></td>
										<td><?= $datas['nik'] ?></td>
										<td><?= $datas['no_pendaftaran'] ?></td>
										<?= $status_verifikasi ?>
										<?= $status_kesehatan ?>

										<td><button class="toggleContentButton"><span class="detail">Detail</span></button></td>
									<tr class="row-hidden" class="hiddenRow">
										<td colspan="100%">
											<div class="content-div hidden">
												<ul>
													<!-- DATANYA MASUKKAN KE DALAM <SPAN></SPAN> CLASS "VALUE"  BAIK ITU TEKS MAUPUN GAMBAR-->
													<li><span class="label">Status BNN</span><span class="titik-dua">:</span><span class="value"><?= $status_bnn ?></span> </li>
													<li><span class="label">Status Psikolog</span><span class="titik-dua">:</span><span class="value"><?= $status_psikolog ?></span></li>
													<li><span class="label">Tempat Lahir</span><span class="titik-dua">:</span><span class="value"><?= $datas['tempat_lahir'] ?></span></li>
													<li><span class="label">Tanggal Lahir</span><span class="titik-dua">:</span><span class="value"><?= date('d / m / Y', strtotime($datas['tanggal_lahir'])); ?></span></li>
													<li><span class="label">Usia</span><span class="titik-dua">:</span><span class="value"><?= $datas['usia'] ?></span></li>
													<li><span class="label">Jenis Kelamin</span><span class="titik-dua">:</span><span class="value"><?= $datas['jenis_kelamin'] ?></span></li>
													<li><span class="label">Agama</span><span class="titik-dua">:</span><span class="value"><?= $datas['agama'] ?></span></li>
													<li><span class="label">Tinggi Badan</span><span class="titik-dua">:</span><span class="value"><?= $datas['tinggi_badan'] ?> cm</span></li>
													<li><span class="label">Berat Badan</span><span class="titik-dua">:</span><span class="value"><?= $datas['berat_badan'] ?> kg</span></li>
													<li><span class="label">IMT (Index Massa Tubuh)</span><span class="titik-dua">:</span><span class="value"><?= $datas['imt'] ?></span></li>
													<li><span class="label">Pendidikan Terakhir</span><span class="titik-dua">:</span><span class="value"><?= $datas['pendidikan'] ?></span></li>
													<li><span class="label">Pekerjaan</span><span class="titik-dua">:</span><span class="value"><?= $datas['pekerjaan'] ?></span></li>
													<li><span class="label">No HP</span><span class="titik-dua">:</span><span class="value"><?= $datas['nomor_telepon'] ?></span></li>
													<li><span class="label">Provinsi</span><span class="titik-dua">:</span><span class="value"><?= $datas['provinsi'] ?></span></li>
													<li><span class="label">Kota</span><span class="titik-dua">:</span><span class="value"><?= $datas['kota'] ?></span></li>
													<li><span class="label">Kecamatan</span><span class="titik-dua">:</span><span class="value"><?= $datas['kecamatan'] ?></span></li>
													<li><span class="label">Kelurahan</span><span class="titik-dua">:</span><span class="value"><?= $datas['kelurahan'] ?></span></li>
													<li><span class="label">Alamat</span><span class="titik-dua">:</span><span class="value"><?= $datas['alamat'] ?></span></li>
													<li><span class="label">Pernikahan ke-</span><span class="titik-dua">:</span><span class="value"><?= $datas['pernikahan_ke'] ?></span></li>
													<li><span class="label">Tanggal Menikah</span><span class="titik-dua">:</span><span class="value"><?= $datas['tanggal_pernikahan'] ?></span></li>
													<li><span class="label">Tanggal Periksa</span><span class="titik-dua">:</span><span class="value"><?= $datas['tanggal_periksa'] ?></span></li>
													<li><span class="label">Pas Foto</span><span class="titik-dua">:</span><span class="value"><img src="<?= base_url('uploads/photo/'); ?><?= $datas['foto_user'] ?>" alt="Profile Image" style="weight:400px; height:400px;"></span></li>
													<li><span class="label">Foto KTP</span><span class="titik-dua">:</span><span class="value"><img src="<?= base_url('uploads/photo/'); ?><?= $datas['foto_ktp'] ?>" alt="Profile Image" style="weight:400px; height:400px;"></span></li>
													<li><span class="label">Foto Kartu Keluarga</span><span class="titik-dua">:</span><span class="value"><img src="<?= base_url('uploads/photo/'); ?><?= $datas['foto_kk'] ?>" alt="Profile Image" style="weight:400px; height:400px;"></span></li>
													<li><span class="label">Foto Surat</span><span class="titik-dua">:</span><span class="value"><img src="<?= base_url('uploads/photo/'); ?><?= $datas['foto_surat'] ?>" alt="Profile Image" style="weight:400px; height:400px;"></span></li>
													<li><span class="label">Tanggal Pendaftaran</span><span class="titik-dua">:</span><span class="value"><?= $datas['data_registered'] ?>"</span></li>
													<li><span class="label">Hasil Pemeriksaan</span><span class="titik-dua">:</span>
														<span class="value gap-btn">
															<button class="open-modal btn green-btn" onclick="showPopup1('popup1-<?= $datas['user_id'] ?>')">Hasil Survei Catin<svg
																	xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path
																		d="M10.0002 5H8.2002C7.08009 5 6.51962 5 6.0918 5.21799C5.71547 5.40973 5.40973 5.71547 5.21799 6.0918C5 6.51962 5 7.08009 5 8.2002V15.8002C5 16.9203 5 17.4801 5.21799 17.9079C5.40973 18.2842 5.71547 18.5905 6.0918 18.7822C6.5192 19 7.07899 19 8.19691 19H15.8031C16.921 19 17.48 19 17.9074 18.7822C18.2837 18.5905 18.5905 18.2839 18.7822 17.9076C19 17.4802 19 16.921 19 15.8031V14M20 9V4M20 4H15M20 4L13 11"
																		stroke="#FFFAFA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
																</svg></button>
															<button class="open-modal btn green-btn" onclick="showPopup2('popup2-<?= $datas['user_id'] ?>')">Hasil Kesehatan<svg
																	xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path
																		d="M10.0002 5H8.2002C7.08009 5 6.51962 5 6.0918 5.21799C5.71547 5.40973 5.40973 5.71547 5.21799 6.0918C5 6.51962 5 7.08009 5 8.2002V15.8002C5 16.9203 5 17.4801 5.21799 17.9079C5.40973 18.2842 5.71547 18.5905 6.0918 18.7822C6.5192 19 7.07899 19 8.19691 19H15.8031C16.921 19 17.48 19 17.9074 18.7822C18.2837 18.5905 18.5905 18.2839 18.7822 17.9076C19 17.4802 19 16.921 19 15.8031V14M20 9V4M20 4H15M20 4L13 11"
																		stroke="#FFFAFA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
																</svg></button>
															<button class="open-modal btn green-btn" onclick="showPopup3('popup3-<?= $datas['user_id'] ?>')">Hasil BNN<svg xmlns="http://www.w3.org/2000/svg"
																	width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path
																		d="M10.0002 5H8.2002C7.08009 5 6.51962 5 6.0918 5.21799C5.71547 5.40973 5.40973 5.71547 5.21799 6.0918C5 6.51962 5 7.08009 5 8.2002V15.8002C5 16.9203 5 17.4801 5.21799 17.9079C5.40973 18.2842 5.71547 18.5905 6.0918 18.7822C6.5192 19 7.07899 19 8.19691 19H15.8031C16.921 19 17.48 19 17.9074 18.7822C18.2837 18.5905 18.5905 18.2839 18.7822 17.9076C19 17.4802 19 16.921 19 15.8031V14M20 9V4M20 4H15M20 4L13 11"
																		stroke="#FFFAFA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
																</svg></button>
															<button class="open-modal btn green-btn" onclick="showPopup4('popup4-<?= $datas['user_id'] ?>')">Hasil Psikolog<svg xmlns="http://www.w3.org/2000/svg"
																	width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path
																		d="M10.0002 5H8.2002C7.08009 5 6.51962 5 6.0918 5.21799C5.71547 5.40973 5.40973 5.71547 5.21799 6.0918C5 6.51962 5 7.08009 5 8.2002V15.8002C5 16.9203 5 17.4801 5.21799 17.9079C5.40973 18.2842 5.71547 18.5905 6.0918 18.7822C6.5192 19 7.07899 19 8.19691 19H15.8031C16.921 19 17.48 19 17.9074 18.7822C18.2837 18.5905 18.5905 18.2839 18.7822 17.9076C19 17.4802 19 16.921 19 15.8031V14M20 9V4M20 4H15M20 4L13 11"
																		stroke="#FFFAFA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
																</svg></button>
														</span>
													</li>
													<li><span class="label">Status Aktif</span><span class="titik-dua">:</span>
														<span class="value">
															<button class="btn blue-btn">Selesai Aktif</button>
														</span>
													</li>
													<li><span class="label">Status Perpanjangan</span><span class="titik-dua">:</span>
														<span class="value">
															<button class="btn red-btn">Belum Butuh Perpanjangan</button>
														</span>
													</li>
													<li><span class="label">Mulai Berlaku</span><span class="titik-dua">:</span><span
															class="value"><?= $datas['mulai_berlaku'] ?></span></li>
													<li><span class="label">Akhir Berlaku</span><span class="titik-dua">:</span><span
															class="value"><?= $datas['akhir_berlaku'] ?></span></li>
													<li><span class="label">Verifikasi Data</span><span class="titik-dua">:</span>
														<span class="value gap-btn">
															<button class="open-modal btn green-btn" onclick="showPopup5('popup5-<?= $datas['user_id'] ?>')"><svg xmlns="http://www.w3.org/2000/svg" width="24"
																	height="24" viewBox="0 0 24 24" fill="none">
																	<path
																		d="M1 3H23V21H1V3ZM3 5V19H21V5H3ZM15.5 9.5C15.7652 9.5 16.0196 9.60536 16.2071 9.79289C16.3946 9.98043 16.5 10.2348 16.5 10.5C16.5 10.7652 16.3946 11.0196 16.2071 11.2071C16.0196 11.3946 15.7652 11.5 15.5 11.5C15.2348 11.5 14.9804 11.3946 14.7929 11.2071C14.6054 11.0196 14.5 10.7652 14.5 10.5C14.5 10.2348 14.6054 9.98043 14.7929 9.79289C14.9804 9.60536 15.2348 9.5 15.5 9.5ZM17.9 12.3C18.2343 11.8543 18.4378 11.3243 18.4879 10.7694C18.5379 10.2145 18.4324 9.65668 18.1833 9.15836C17.9341 8.66004 17.5511 8.24095 17.0772 7.94805C16.6033 7.65514 16.0571 7.5 15.5 7.5C14.9429 7.5 14.3967 7.65514 13.9228 7.94805C13.4489 8.24095 13.0659 8.66004 12.8167 9.15836C12.5676 9.65668 12.4621 10.2145 12.5121 10.7694C12.5622 11.3243 12.7657 11.8543 13.1 12.3C12.6032 12.6726 12.2 13.1557 11.9223 13.7111C11.6446 14.2666 11.5 14.879 11.5 15.5V16.5H13.5V15.5C13.5 14.9696 13.7107 14.4609 14.0858 14.0858C14.4609 13.7107 14.9696 13.5 15.5 13.5C16.0304 13.5 16.5391 13.7107 16.9142 14.0858C17.2893 14.4609 17.5 14.9696 17.5 15.5V16.5H19.5V15.5C19.5 14.191 18.872 13.03 17.9 12.3ZM5 9H9.5V11H5V9ZM5 13H9.5V15H5V13Z"
																		fill="#FFFAFA" />
																</svg>Verifikasi Data</button>
															<button class="open-modal btn green-btn" onclick="showPopup6('popup6-<?= $datas['user_id'] ?>')"><svg xmlns="http://www.w3.org/2000/svg" width="24"
																	height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M21 3H3V21H21V3ZM10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z"
																		fill="#FFFAFA" />
																</svg>Aktifkan Kartu </button>
															<?php $id_user = $datas['user_id']  ?>
															<a style="padding:0px" href="<?= base_url(); ?>Dashboard_Admin/kartu_kuning/<?= $id_user ?>" class="btn btn-primary">
																<button class="btn green-btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
																		viewBox="0 0 24 24" fill="none">
																		<path fill-rule="evenodd" clip-rule="evenodd"
																			d="M20.75 16.714C20.7488 16.7619 20.7441 16.8097 20.736 16.857C20.7571 16.9656 20.7539 17.0774 20.7267 17.1846C20.6995 17.2918 20.6489 17.3917 20.5785 17.477C20.5082 17.5623 20.4198 17.6311 20.3198 17.6783C20.2198 17.7255 20.1106 17.75 20 17.75H6C5.83585 17.75 5.6733 17.7823 5.52165 17.8451C5.36999 17.908 5.23219 18 5.11612 18.1161C5.00004 18.2322 4.90797 18.37 4.84515 18.5216C4.78233 18.6733 4.75 18.8358 4.75 19C4.75 19.1642 4.78233 19.3267 4.84515 19.4784C4.90797 19.63 5.00004 19.7678 5.11612 19.8839C5.23219 20 5.36999 20.092 5.52165 20.1549C5.6733 20.2177 5.83585 20.25 6 20.25H20C20.1989 20.25 20.3897 20.329 20.5303 20.4697C20.671 20.6103 20.75 20.8011 20.75 21C20.75 21.1989 20.671 21.3897 20.5303 21.5303C20.3897 21.671 20.1989 21.75 20 21.75H6C5.27065 21.75 4.57118 21.4603 4.05546 20.9445C3.53973 20.4288 3.25 19.7293 3.25 19V5C3.25 4.27065 3.53973 3.57118 4.05546 3.05546C4.57118 2.53973 5.27065 2.25 6 2.25H19.4C20.146 2.25 20.75 2.854 20.75 3.6V16.714ZM9 6.25C8.80109 6.25 8.61032 6.32902 8.46967 6.46967C8.32902 6.61032 8.25 6.80109 8.25 7C8.25 7.19891 8.32902 7.38968 8.46967 7.53033C8.61032 7.67098 8.80109 7.75 9 7.75H15C15.1989 7.75 15.3897 7.67098 15.5303 7.53033C15.671 7.38968 15.75 7.19891 15.75 7C15.75 6.80109 15.671 6.61032 15.5303 6.46967C15.3897 6.32902 15.1989 6.25 15 6.25H9Z"
																			fill="#FFFAFA" />
																	</svg>Cetak Kartu</button><i class="fas fas fa-book"></i></a>
														</span>
													</li>
													<li><span class="label">Aksi</span><span class="titik-dua">:</span>
														<span class="value gap-btn">
															<button class="btn blue-btn" onclick="showPopup11('popup11-<?= $datas['user_id'] ?>')">Edit<svg xmlns="http://www.w3.org/2000/svg" width="24"
																	height="24" viewBox="0 0 24 24" fill="none">
																	<path
																		d="M18.988 2.01221L21.988 5.01221L19.701 7.30021L16.701 4.30021L18.988 2.01221ZM8 16.0002H11L18.287 8.71321L15.287 5.71321L8 13.0002V16.0002Z"
																		fill="#FFFAFA" />
																	<path
																		d="M19 19H8.158C8.132 19 8.105 19.01 8.079 19.01C8.046 19.01 8.013 19.001 7.979 19H5V5H11.847L13.847 3H5C3.897 3 3 3.896 3 5V19C3 20.104 3.897 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V10.332L19 12.332V19Z"
																		fill="#FFFAFA" />
																</svg></button>
															<button class="open-modal btn red-btn" onclick="showPopup10('popup10-<?= $datas['user_id'] ?>')">Hapus<svg xmlns="http://www.w3.org/2000/svg" width="24"
																	height="24" viewBox="0 0 24 24" fill="none">
																	<path
																		d="M19.9999 6C20.2547 6.00028 20.4999 6.09788 20.6852 6.27285C20.8706 6.44782 20.9821 6.68695 20.997 6.94139C21.012 7.19584 20.9292 7.44638 20.7656 7.64183C20.602 7.83729 20.37 7.9629 20.1169 7.993L19.9999 8H19.9189L18.9999 19C18.9999 19.7652 18.7075 20.5015 18.1826 21.0583C17.6576 21.615 16.9398 21.9501 16.1759 21.995L15.9999 22H7.99987C6.40187 22 5.09587 20.751 5.00787 19.25L5.00287 19.083L4.07987 8H3.99987C3.74499 7.99972 3.49984 7.90212 3.3145 7.72715C3.12916 7.55218 3.01763 7.31305 3.0027 7.05861C2.98776 6.80416 3.07054 6.55362 3.23413 6.35817C3.39772 6.16271 3.62977 6.0371 3.88287 6.007L3.99987 6H19.9999ZM13.9999 2C14.5303 2 15.039 2.21071 15.4141 2.58579C15.7892 2.96086 15.9999 3.46957 15.9999 4C15.9996 4.25488 15.902 4.50003 15.727 4.68537C15.5521 4.8707 15.3129 4.98223 15.0585 4.99717C14.804 5.01211 14.5535 4.92933 14.358 4.76574C14.1626 4.60214 14.037 4.3701 14.0069 4.117L13.9999 4H9.99987L9.99287 4.117C9.96277 4.3701 9.83715 4.60214 9.6417 4.76574C9.44625 4.92933 9.19571 5.01211 8.94126 4.99717C8.68682 4.98223 8.44769 4.8707 8.27272 4.68537C8.09775 4.50003 8.00015 4.25488 7.99987 4C7.99971 3.49542 8.19028 3.00943 8.53337 2.63945C8.87646 2.26947 9.34671 2.04284 9.84987 2.005L9.99987 2H13.9999Z"
																		fill="#FFFAFA" />
																</svg></button>
														</span>
													</li>
												</ul>
											</div>
										</td>
									</tr>
									</tr>
									<!-- Tambahkan baris data lainnya di sini -->

								</tbody>
								<div class="overlay" id="overlay1"></div>
								<div class="popup" id="popup1-<?= $datas['user_id'] ?>">
									<span class="close-btn" onclick="closePopup1('popup1-<?= $datas['user_id'] ?>')">&times;</span>
									<h2>Tambah Data Penyakit</h2>
									<hr style="border-color: #015D67;">
									<div class="edit-pendaftaran-container">
										<p><b>Tingkat Kepercayaan : <?= $datas['kepercayaan_catin']; ?>%</b></p>
										<label for="kode_penyakit"><b class="form-label">Kode Penyakit</b><br></label>
										<div class="input-form" style="border: none;">
											<input type="text" id="kode_penyakit" value="<?= $datas['kode_catin'] ?>" class="tambah-data" name="kode_penyakit" readonly required>
										</div>
										<label for="nama_penyakit"><b class="form-label">Nama Penyakit</b><br></label>
										<div class="input-form" style="border: none;">
											<input type="text" id="nama_penyakit" value="<?= $datas['nama_sakit_catin'] ?>" class="tambah-data" name="nama_penyakit" readonly required>
										</div>
										<label for="keterangan"><b class="form-label">Keterangan</b><br></label>
										<div class="input-form" style="border: none;">
											<textarea name="keterangan" class="tambah-data" style="height: 90px;" readonly><?= $datas['keterangan_catin'] ?></textarea>
										</div>
									</div>
								</div>

								<!-- popup periksa kesehatan -->
								<div class="overlay" id="overlay2"></div>
								<div class="popup" id="popup2-<?= $datas['user_id'] ?>">
									<span class="close-btn" onclick="closePopup2('popup2-<?= $datas['user_id'] ?>')">&times;</span>
									<h2>Tambah Data Penyakit</h2>
									<hr style="border-color: #015D67;">
									<div class="edit-pendaftaran-container">
										<p>Nama Faskes: UPT Puskesmas Rambung</p><br>
										<p>Nama Pemeriksa: <?= $datas['nama_pemeriksa_kesehatan'] ?></p><br>
										<b> Tanda Vital</b>
										<p>Tekanan Darah: <?= $datas['nama_pemeriksa_kesehatan'] ?></p>
										<p>Nadi: <?= $datas['nadi'] ?></p>
										<p>Nafas: <?= $datas['nafas'] ?></p>
										<p>Suhu: <?= $datas['suhu'] ?></p><br>
										<p>Berat Badan: <?= $datas['berat_badan'] ?></p><br>
										<p>Tinggi: <?= $datas['tinggi_badan'] ?></p><br>
										<p>IMT: <?= $datas['suhu'] ?></p><br>
										<p>Lila (Lingkar Lengan Atas): <?= $datas['lila'] ?></p><br>
										<p>Status T: <?= $datas['suntik_tt'] ?></p><br>
										<p>Tanda Anemia: <?= $datas['tanda_anemia'] ?></p><br>
										<p>Penunjang:</p><br>
										<p>HB: <?= $datas['hb'] ?></p><br>
										<p>Golongan Darah: <?= $datas['gol_darah'] ?></p><br><br>
										<p><b>Lain-Lain</b></p><br>
										<p>Rapidtest: <?= $datas['rapid_test'] ?></p><br>
										<p>Planotest: <?= $datas['plano_test'] ?></p><br><br>
										<label for="kode_resiko">Kode Kesehatan</label> <br>
										<input type="text" name="kode_resiko" id="kode_resiko" value="<?= $datas['kode_kesehatan'] ?>" readonly> <br><br>
										<p><b>Tingkat Kepercayaan : <?= $datas['kepercayaan_kesehatan'] ?>%</b></p> <br>
										<label for="nama_resiko"></label>
										<input type="text" name="nama_resiko" id="nama_resiko" value="<?= $datas['nama_sakit_kesehatan'] ?>" readonly><br>
										<label for="keterangan"><b class="form-label">Keterangan</b><br></label>
										<div class="input-form" style="border: none;">
											<textarea name="keterangan" class="tambah-data" style="height: 90px;" readonly><?= $datas['keterangan_kesehatan'] ?></textarea>
										</div>
									</div>
								</div>

								<!-- popup periksa BNN -->
								<div class="overlay" id="overlay3"></div>
								<div class="popup" id="popup3-<?= $datas['user_id'] ?>">
									<span class="close-btn" onclick="closePopup3('popup3-<?= $datas['user_id'] ?>')">&times;</span>
									<h2>Hasil Periksa BNN Catin</h2>
									<hr style="border-color: #015D67;">
									<div class="edit-pendaftaran-container">
										<p><b>Nama BNN : <?= $datas['nama_bnn'] ?></b></p> <br>
										<p><b>Nama Pemeriksa : <?= $datas['nama_pemeriksa_bnn'] ?></b></p> <br>
										<p><b>Hasil Test Narkoba : <?= $datas['narkoba_test'] ?></b></p> <br>
										<p><b>Tingkat Kepercayaan : <?= $datas['kepercayaan_bnn'] ?>%</b></p> <br>

										<label for="kode"><b class="form-label">Kode BNN</b><br></label>
										<div class="input-form" style="border: none;">
											<input type="text" id="kode" value="<?= $datas['kode_bnn'] ?>" class="tambah-data" name="kode_penyakit" readonly required>
										</div>
										<label for="nama_penyakit"><b class="form-label">Nama Penyakit</b><br></label>
										<div class="input-form" style="border: none;">
											<input type="text" id="nama_penyakit" value="<?= $datas['nama_sakit_bnn'] ?>" class="tambah-data" name="nama_penyakit" readonly required>
										</div>
										<label for="keterangan"><b class="form-label">Keterangan</b><br></label>
										<div class="input-form" style="border: none;">
											<textarea name="keterangan" class="tambah-data" style="height: 90px;" readonly><?= $datas['keterangan_bnn'] ?></textarea>
										</div>
									</div>
								</div>


								<div class="overlay" id="overlay4"></div>
								<div class="popup" id="popup4-<?= $datas['user_id'] ?>">

									<span class="close-btn" onclick="closePopup4('popup4-<?= $datas['user_id'] ?>')">&times;</span>
									<h2>Tambah Data Penyakit</h2>
									<hr style="border-color: #015D67;">
									<div class="edit-pendaftaran-container">
										<p><b>Tingkat Kepercayaan : <?= $datas['kepercayaan_catin'] ?>%</b></p> <br>
										<label for="kode_penyakit"><b class="form-label">Kode Penyakit</b><br></label>
										<div class="input-form" style="border: none;">
											<input type="text" id="kode_penyakit" value="<?= $datas['kode_catin'] ?>" class="tambah-data" name="kode_penyakit" readonly required>
										</div>
										<label for="nama_penyakit"><b class="form-label">Nama Penyakit</b><br></label>
										<div class="input-form" style="border: none;">
											<input type="text" id="nama_penyakit" value="<?= $datas['nama_sakit_catin'] ?>" class="tambah-data" name="nama_penyakit" readonly required>
										</div>
										<label for="keterangan"><b class="form-label">Keterangan</b><br></label>
										<div class="input-form" style="border: none;">
											<textarea name="keterangan" class="tambah-data" style="height: 90px;" readonly><?= $datas['keterangan_catin'] ?></textarea>
										</div>
									</div>
								</div>

								<div class="overlay" id="overlay5"></div>
								<div class="popup" id="popup5-<?= $datas['user_id'] ?>">
									<span class="close-btn" onclick="closePopup5('popup5-<?= $datas['user_id'] ?>')">&times;</span>
									<h2>Tambah Data Penyakit</h2>
									<hr style="border-color: #015D67;">
									<div class="edit-pendaftaran-container">
										<label for="role"><b class="form-label">Status User</b><br></label>
										<form action="<?= base_url('dashboard_admin/data_verifikasi'); ?>" method="post">
											<input type="text" value="<?= $datas['user_id'] ?>" name="id" required hidden> <br>
											<select type="text" id="role" class="tambah-data" name="data_verifikasi" style="width:100%; height:50px" required>
												<?php if ($datas['id_status_verifikasi'] == 2) : ?>
													<option value="2">Sudah Diverifikasi</option>
													<option value="1">Belum Diverifikasi</option>
												<?php else : ?>
													<option value="1">Belum Diverifikasi</option>
													<option value="2">Sudah Diverifikasi</option>
												<?php endif ?>
											</select>
											<button type="submit">Submit</button>
										</form>
									</div>
								</div>

								<div class="overlay" id="overlay6"></div>
								<div class="popup" id="popup6-<?= $datas['user_id'] ?>">
									<span class="close-btn" onclick="closePopup6('popup6-<?= $datas['user_id'] ?>')">&times;</span>
									<h2>Tambah Data Penyakit</h2>
									<hr style="border-color: #015D67;">
									<div class="edit-pendaftaran-container">
										<p>Apakah kamu ingin menghapus data</p>
										<label for="role"><b class="form-label">Status Aktif</b><br></label>
										<form action="<?= base_url('dashboard_admin/aktivasi'); ?>" method="post">
											<input type="text" value="<?= $datas['user_id'] ?>" name="id" required hidden> <br>
											<select type="text" id="role" class="tambah-data" name="aktif" style="width:100%; height:50px" required>
												<option value="2">Aktifkan</option>
											</select>

											<input type="date" value="<?= $datas['mulai_berlaku'] ?>" style="border: #343a40;" readonly>
											<input type="date" value="<?= $datas['akhir_berlaku'] ?>" readonly>
											<br>
											<button type="submit">Submit</button>
										</form>
									</div>
								</div>

								<div class="overlay" id="overlay10"></div>
								<div class="popup" id="popup10-<?= $datas['user_id'] ?>">
									<span class="close-btn" onclick="closePopup10('popup10-<?= $datas['user_id'] ?>')">&times;</span>
									<h2>Tambah Data Penyakit</h2>
									<hr style="border-color: #015D67;">
									<div class="edit-pendaftaran-container">
										<label for="role"><b class="form-label">Status Aktif</b><br></label>
										<form action="<?= base_url('dashboard_admin/hapus'); ?>" method="post">
											<input type="text" value="<?= $datas['id_user_detail'] ?>" name="id" required hidden> <br>

											<button type="submit">Ya</button>
											<button type="button" onclick="closePopup9('popup9-<?= $datas['user_id'] ?>'">Tidak</button>
										</form>
									</div>
								</div>

								<div class="overlay" id="overlay11"></div>
								<div class="popup" id="popup11-<?= $datas['user_id'] ?>">
									<span class="close-btn" onclick="closePopup11('popup11-<?= $datas['user_id'] ?>')">&times;</span>
									<h2>Tambah Data gejala</h2>
									<hr style="border-color: #015D67;">
									<form id="popupForm" action="<?= base_url('dashboard_admin/edit_user_pemeriksa'); ?>" method="post">
										<div class="edit-pendaftaran-container">
											<input type="hidden" name="Id" value="<?= $datas['id_user_detail'] ?>" />
											<label for="no_pendaftaran"><b class="form-label">Nomor Pendaftaran</b><br></label>
											<div class="input-form">
												<input type="text" value="<?= $datas['no_pendaftaran'] ?>" name="no_pendaftaran" class="tambah-data">
											</div>
											<label for="nik"><b class="form-label">NIK</b><br></label>
											<div class="input-form">
												<input type="text" class="tambah-data" value="<?= $datas['nik'] ?>" name="nik" required>
											</div>
											<label for="nama"><b class="form-label">Nama Lengkap</b><br></label>
											<div class="input-form">
												<input type="text" value="<?= $datas['nama_lengkap'] ?>" name="nama" class="tambah-data">
											</div>
											<label for="tempatLahir"><b class="form-label">Tempat Lahir</b><br></label>
											<div class="input-form">
												<input type="text" value="<?= $datas['tempat_lahir'] ?>" class="tambah-data" name="tempatLahir" required>
											</div>
											<label for="tanggalLahir"><b class="form-label">Tanggal Lahir</b><br></label>
											<div class="input-form">
												<input type="date" value="<?= $datas['tanggal_lahir'] ?>" onchange="hitungUmur()" class="tambah-data" name="tanggalLahir" required>
											</div>

											<label for="umur"><b class="form-label">Usia</b><br></label>
											<div class="input-form">
												<input type="date" value="<?= $datas['tanggal_lahir'] ?>" onchange="hitungUmur()" class="tambah-data" name="umur" required>
											</div>
											<label for="jenisKelamin"><b class="form-label">Jenis Kelamin</b><br></label>
											<div class="input-form">
												<select type="text" class="tambah-data" name="jenisKelamin" required>
													<option value="<?= $datas['jenis_kelamin'] ?>"><?= $datas['jenis_kelamin'] ?></option>
													<option value="Laki-Laki">Laki-Laki</option>
													<option value="Perempuan">Perempuan</option>
												</select>
											</div>
											<label for="agama"><b class="form-label">Agama</b><br></label>
											<div class="input-form">
												<select type="text" class="tambah-data" name="agama" required>
													<option value="<?= $datas['agama'] ?>"><?= $datas['agama'] ?></option>
													<option value="Islam">Islam</option>
													<option value="Kristen Protestan">Kristen Protestan</option>
													<option value="Kristen Katolik">Kristen Katolik</option>
													<option value="Buddha">Buddha</option>
													<option value="Hindu">Hindu</option>
												</select>
											</div>

											<label for="pendidikan"><b class="form-label">Pendidikan Terakhir</b><br></label>
											<div class="input-form">
												<select type="text" class="tambah-data" name="pendidikan" required>
													<option value="<?= $datas['pendidikan_terakhir'] ?>"><?= $datas['pendidikan_terakhir'] ?></option>
													<option value="Paud">Paud</option>
													<option value="SD">SD</option>
													<option value="SMP">SMP</option>
													<option value="SMA/SMK">SMA/SMK</option>
													<option value="S1">S1</option>
													<option value="S2">S2</option>
													<option value="S3">S3</option>
													<option value="D1">D1</option>
													<option value="D2">D2</option>
													<option value="D3">D3</option>
													<option value="Tidak menempuh pendidikan formal ">Tidak menempuh pendidikan formal </option>
												</select>
											</div>
											<label for="jenisKelamin"><b class="form-label">Jenis Kelamin</b><br></label>
											<div class="input-form">
												<select type="text" class="tambah-data" name="jenisKelamin" required>
													<option value="<?= $datas['jenis_kelamin'] ?>"><?= $datas['jenis_kelamin'] ?></option>
													<option value="Laki-Laki">Laki-Laki</option>
													<option value="Perempuan">Perempuan</option>
												</select>
											</div>
											<label for="nomorTelepon"><b class="form-label">Tanggal Lahir</b><br></label>
											<div class="input-form">
												<input type="text" value="<?= $datas['nomor_telepon'] ?>" class="tambah-data" name="nomorTelepon" required>
											</div>

											<div class="form-group" style="width:60vh ;">
												<label for="provinsi">Provinsi</label>
												<select name="provinsi" id="provinsi" class="inputan" style="width:100%">
													<?php if ($provinsi == null) : ?>
														<!-- <option value="" disabled selected>Pilih Provinsi</option> -->
													<?php elseif ($provinsi == $this->session->userdata('provinsi')) : ?>
														<option value="<?= $this->session->userdata('provinsi'); ?>" disabled selected> <?= $this->session->userdata('provinsi'); ?> </option>
													<?php else : ?>
														<option value="<?= $provinsi ?>" disabled selected><?= $provinsi ?></option>
													<?php endif ?>

												</select>
												<?= form_error('provinsi', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
											</div>
											<div class="form-group" style="width: 60vh;">
												<label for="kota">Kota</label>
												<select name="kota" id="kota" class="inputan" style="width:100%">
													<?php if ($kota == null) : ?>
														<option value="" disabled selected>Pilih Kota</option>
													<?php elseif ($kota == $this->session->userdata('kota')) : ?>
														<option value="<?= $this->session->userdata('kota'); ?>" disabled selected> <?= $this->session->userdata('kota'); ?> </option>
													<?php else : ?>
														<option value="<?= $kota ?>" disabled selected><?= $kota ?></option>
													<?php endif ?>
												</select>
												<?= form_error('kota', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
											</div>
											<div class="form-group" style="width: 60vh;">
												<label for="kecamatan">Kecamatan</label>
												<select name="kecamatan" id="kecamatan" class="inputan" style="width:100%">
													<?php if ($kecamatan == null) : ?>
														<option value="" disabled selected>Pilih Kecamatan</option>
													<?php elseif ($kecamatan == $this->session->userdata('kecamatan')) : ?>
														<option value="<?= $this->session->userdata('kecamatan'); ?>" disabled selected> <?= $this->session->userdata('kecamatan'); ?> </option>
													<?php else : ?>
														<option value="<?= $kecamatan ?>" disabled selected><?= $kecamatan ?></option>
													<?php endif ?>

												</select>
												<?= form_error('kecamatan', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
											</div>
											<div class="form-group" style="width: 60vh;">
												<label for="kelurahan">Kelurahan</label>
												<select name="kelurahan" id="kelurahan" class="inputan" style="width:100%">
													<?php if ($kelurahan == null) : ?>
														<option value="" disabled selected>Pilih Kelurahan</option>
													<?php elseif ($kelurahan == $this->session->userdata('kelurahan')) : ?>
														<option value="<?= $this->session->userdata('kelurahan'); ?>" disabled selected> <?= $this->session->userdata('kelurahan'); ?> </option>
													<?php else : ?>
														<option value="<?= $kelurahan ?>" disabled selected><?= $kelurahan ?></option>
													<?php endif ?>

												</select>
												<?= form_error('kelurahan', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
											</div>

											<div class="form-group" style="width: 60vh;">
												<label for="alamat">Alamat Lengkap</label>
												<textarea id="alamat" class="inputan" name="alamat" placeholder="" value="<?= $this->session->userdata('alamat'); ?>" style="width: 100%;height:20vh;"><?= $this->session->userdata('alamat'); ?></textarea>
												<?= form_error('alamat', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
											</div>

											<label for="pernikahanKe"><b class="form-label">Pernikahan Ke</b><br></label>
											<div class="input-form">
												<input type="text" value="<?= $datas['pernikahan_ke'] ?>" class="tambah-data" name="pernikahanKe" required>
											</div>

											<label for="tanggalPernikahan"><b class="form-label">Pernikahan Ke</b><br></label>
											<div class="input-form">
												<input type="date" value="<?= $datas['tanggal_pernikahan'] ?>" class="tambah-data" name="tanggalPernikahan" required>
											</div>

											<?php if ($foto_user == null) : ?>
												<div class="form-group" style="width: 50vh;">
													<label for="foto_user">Pas Foto</label>
													<?php echo form_open_multipart('dashboard/pemeriksaan'); ?>
													<div class="custom-file-upload" style="cursor: pointer;" id="drop-zone-foto_user">
														<input type="file" id="foto_user" class="inputan" name="foto_user" onchange="uploadfile('foto_user')" style="display: none;" value="<?= $foto_user ?>">
														<label for="foto_user" class="custom-file-label">
															<div class="upload-icon" style="text-align: center; font-size: 2rem; color: #d3d3d3;">+</div>
															<img id="preview-image-foto_user" class="preview-image" src="" alt="Preview Image" style="display: none;">
															<div class="upload-text">Unggah atau drop file disini</div>
															<div class="upload-subtext">Format PNG/JPG/JPEG (Max 2MB)</div>
														</label>
														<span id="file-name-foto_user" class="file-name"></span>
													</div>
													<?= form_error('foto_user', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
												</div>
											<?php else : ?>

												<div class="form-group" style="width: 50vh;">
													<label for="foto_user">Pas Foto</label>
													<?php echo form_open_multipart('dashboard/pemeriksaan'); ?>
													<div class="custom-file-upload" style="cursor: pointer;" id="drop-zone-foto_user">
														<img id="uploadImage-foto_user" src="<?= base_url('uploads/photo/') . $foto_user ?>" alt="KTP Image" class="preview-image">
														<input type="file" id="foto_user" class="inputan" name="foto_user" onchange="updateFile('foto_user')" style="display: none;" value="<?= $foto_user ?>">
														<div class="image-caption">

														</div>
														<label for="foto_user" class="custom-file-label">
															<img id="preview-image-foto_user" class="preview-image" src="" alt="Preview Image" style="display: none;">
														</label>
														<span id="file-name-foto_user" class="file-name"></span>
													</div>
													<?= form_error('foto_user', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
													<input type="hidden" name="existing_image" value="<?= $foto_user ?>">
												</div>

											<?php endif ?>


											<?php if ($foto_ktp == null) : ?>
												<div class="form-group" style="width: 50vh;">
													<label for="foto_ktp">Foto KTP</label>
													<?php echo form_open_multipart('dashboard/pemeriksaan'); ?>
													<div class="custom-file-upload" style="cursor: pointer;" id="drop-zone-foto_ktp">
														<input type="file" id="foto_ktp" class="inputan" name="foto_ktp" onchange="updateFile('foto_ktp')" style="display: none;" value="<?= $this->session->userdata('foto_ktp') ?>">
														<label for="foto_ktp" class="custom-file-label">
															<div class="upload-icon" style="text-align: center; font-size: 2rem; color: #d3d3d3;">+</div>
															<img id="preview-image-foto_ktp" class="preview-image" src="" alt="Preview Image" style="display: none;">
															<div class="upload-text">Unggah atau drop file disini</div>
															<div class="upload-subtext">Format PNG/JPG/JPEG (Max 2MB)</div>
														</label>
														<span id="file-name-foto_ktp" class="file-name"></span>
													</div>
													<?= form_error('foto_ktp', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
												</div>
											<?php else : ?>
												<div class="form-group" style="width: 50vh;">
													<label for="foto_ktp">Foto KTP</label>
													<?php echo form_open_multipart('dashboard/pemeriksaan'); ?>
													<div class="custom-file-upload" style="cursor: pointer;" id="drop-zone-foto_ktp">
														<img id="uploadImage-foto_ktp" src="<?= base_url('uploads/photo/') . $foto_ktp ?>" alt="KTP Image" class="preview-image">
														<input type="file" id="foto_ktp" class="inputan" name="foto_ktp" onchange="updateFile('foto_ktp')" style="display: none;" value="<?= $foto_ktp ?>">
														<div class="image-caption">

														</div>
														<label for="foto_ktp" class="custom-file-label">
															<img id="preview-image-foto_ktp" class="preview-image" src="" alt="Preview Image" style="display: none;">
														</label>
														<span id="file-name-foto_ktp" class="file-name"></span>
													</div>
													<?= form_error('foto_ktp', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
													<input type="hidden" name="existing_image" value="<?= $foto_ktp ?>">
												</div>

											<?php endif ?>

											<?php if ($foto_kk == null) : ?>
												<div class="form-group" style="width: 50vh">
													<label for="foto_kk">Foto Kartu Keluarga</label>
													<?php echo form_open_multipart('dashboard/pemeriksaan'); ?>
													<div class="custom-file-upload" style="cursor: pointer;" id="drop-zone-foto_kk">
														<input type="file" id="foto_kk" class="inputan" name="foto_kk" onchange="uploadfile('foto_kk')" style="display: none;">
														<label for="foto_kk" class="custom-file-label">
															<div class="upload-icon" style="text-align: center; font-size: 2rem; color: #d3d3d3;">+</div>
															<img id="preview-image-foto_kk" class="preview-image" src="" alt="Preview Image" style="display: none;">
															<div class="upload-text">Unggah atau drop file disini</div>
															<div class="upload-subtext">Format PNG/JPG/JPEG (Max 2MB)</div>
														</label>
														<span id="file-name-foto_kk" class="file-name"></span>
													</div>
													<?= form_error('foto_kk', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
												</div>
											<?php else : ?>
												<div class="form-group" style="width: 50vh;">
													<label for="foto_kk">Foto Kartu Keluarga</label>
													<?php echo form_open_multipart('dashboard/pemeriksaan'); ?>
													<div class="custom-file-upload" style="cursor: pointer;" id="drop-zone-foto_kk">
														<img id="uploadImage-foto_kk" src="<?= base_url('uploads/photo/') . $foto_kk ?>" alt="KTP Image" class="preview-image">
														<input type="file" id="foto_kk" class="inputan" name="foto_kk" onchange="updateFile('foto_kk')" style="display: none;" value="<?= $foto_kk ?>">
														<div class="image-caption">

														</div>
														<label for="foto_kk" class="custom-file-label">
															<img id="preview-image-foto_kk" class="preview-image" src="" alt="Preview Image" style="display: none;">
														</label>
														<span id="file-name-foto_kk" class="file-name"></span>
													</div>
													<?= form_error('foto_kk', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
													<input type="hidden" name="existing_image" value="<?= $foto_kk ?>">
												</div>

											<?php endif ?>

											<?php if ($foto_surat == null) : ?>
												<div class="form-group" style="width: 50vh">
													<label for="foto_surat">Foto Surat Pengantar</label>
													<?php echo form_open_multipart('dashboard/pemeriksaan'); ?>
													<div class="custom-file-upload" style="cursor: pointer;" id="drop-zone-foto_surat">
														<input type="file" id="foto_surat" class="inputan" name="foto_surat" onchange="uploadfile('foto_surat')" style="display: none;">
														<label for="foto_surat" class="custom-file-label">
															<div class="upload-icon" style="text-align: center; font-size: 2rem; color: #d3d3d3;">+</div>
															<img id="preview-image-foto_surat" class="preview-image" src="" alt="Preview Image" style="display: none;">
															<div class="upload-text">Unggah atau drop file disini</div>
															<div class="upload-subtext">Format PNG/JPG/JPEG (Max 2MB)</div>
														</label>
														<span id="file-name-foto_surat" class="file-name"></span>
													</div>
													<?= form_error('foto_surat', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
												</div>
											<?php else : ?>
												<div class="form-group" style="width: 50vh;">
													<label for="foto_surat">Foto Surat Pengantar</label>
													<?php echo form_open_multipart('dashboard/pemeriksaan'); ?>
													<div class="custom-file-upload" style="cursor: pointer;" id="drop-zone-foto_surat">
														<img id="uploadImage-foto_surat" src="<?= base_url('uploads/photo/') . $foto_surat ?>" alt="KTP Image" class="preview-image">
														<input type="file" id="foto_surat" class="inputan" name="foto_surat" onchange="updateFile('foto_surat')" style="display: none;" value="<?= $foto_surat ?>">
														<div class="image-caption">

														</div>
														<label for="foto_surat" class="custom-file-label">
															<img id="preview-image-foto_surat" class="preview-image" src="" alt="Preview Image" style="display: none;">
														</label>
														<span id="file-name-foto_surat" class="file-name"></span>
													</div>
													<?= form_error('foto_surat', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
													<input type="hidden" name="existing_image" value="<?= $foto_surat ?>">
												</div>
											<?php endif ?>
										</div>
										<button type="submit">Submit</button>
								</div>
								</form>
					</div>
				<?php endforeach ?>
			</table>
		</div>
		<div class="overlay" id="overlay9"></div>
		<div class="popup" id="popup9">
					<span class="close-btn" onclick="closePopup9()">&times;</span>
					<h2>Tambah Data gejala</h2>
					<hr style="border-color: #015D67;">
					<form id="popupForm" action="<?= base_url('dashboard_admin/export'); ?>" method="post">
						<div class="edit-pendaftaran-container">
							<label for="tanggal_awal"><b class="form-label">Tanggal Awal</b><br></label>
							<div class="input-form">
								<input type="date" id="tanggal_awal" class="tambah-data" name="tanggal_awal" required>
							</div>
							<label for="tanggal_akhir"><b class="form-label">Tanggal Akhir</b><br></label>
							<div class="input-form">
								<input type="date" id="tanggal_akhir" class="tambah-data" name="tanggal_akhir" required>
							</div>
							

							<button type="submit" onclick="closePopup2()">Submit</button>
						</div>
					</form>
				</div>
			</div>
			<?= $pagination?>
			<div class="copyright-text" style="bottom: 0%">
				Copyright © 2024 DPPKB Kota Tebing. Hak cipta dilindungi
			</div>
		</div>
	</div>
	</div>

	<script src="<?= base_url('assets/js/data-catin-admin.js') ?>"></script>
	<script src="<?= base_url('assets/js/sidebar.js') ?>"></script>
	<script src="<?= base_url('assets/js/detail-baris-table.js') ?>"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="<?= base_url('assets/js/popup.js') ?>"></script>
	<script>
		$(document).ready(function() {
			// Event listener for form submission on popup 1
			$('#popupForm7').on('submit', function(event) {
				event.preventDefault(); // Prevent default form submission

				console.log("Form data: ", $(this).serialize()); // Log form data

				$.ajax({
					url: '<?php echo site_url('dashboard_admin/filter_hapus_data'); ?>',
					type: 'POST',
					data: $(this).serialize(),
					success: function(response) {
						console.log("Response: ", response); // Log server response

						// Parse the JSON response
						let result = JSON.parse(response);

						// Store data in sessionStorage
						sessionStorage.setItem('tanggal_hapus_data', result.tanggal);
						sessionStorage.setItem('hapus_data', result.bool);
						sessionStorage.setItem('captcha', result.captcha);

						// Check if data is available
						if (result.bool == 1) {
							closePopup7(); // Close popup 1
							showPopup8(); // Show popup 2
						} else {
							alert('Data tidak tersedia');
							closePopup7();
						}
					},
					error: function() {
						alert('There was an error processing your request.');
					}
				});
			});

			// Event listener for form submission on popup 2
			$('#popupForm8').on('submit', function(event) {
				event.preventDefault(); // Prevent default form submission
				closePopup1();
				// Additional actions if needed
			});
		});
	</script>
	<script>
		function updateFile(fileId) {
			var input = document.getElementById(fileId);
			var fileName = input.files.length > 0 ? input.files[0].name : '';
			document.getElementById('file-name-' + fileId).textContent = fileName;

			var previewImage = document.getElementById('preview-image-' + fileId);
			var uploadImage = document.getElementById('uploadImage-' + fileId);
			var uploadIcon = document.querySelector('#drop-zone-' + fileId + ' .upload-icon');
			var uploadText = document.querySelector('#drop-zone-' + fileId + ' .upload-text');
			var uploadSubtext = document.querySelector('#drop-zone-' + fileId + ' .upload-subtext');

			if (input.files.length > 0) {
				var file = input.files[0];
				var reader = new FileReader();

				reader.onload = function(e) {
					previewImage.src = e.target.result;
					previewImage.style.display = 'block';
					if (uploadImage) uploadImage.style.display = 'none';
				};

				reader.readAsDataURL(file);

				if (uploadIcon) uploadIcon.style.display = 'none';
				if (uploadText) uploadText.style.display = 'none';
				if (uploadSubtext) uploadSubtext.style.display = 'none';
			} else {
				if (uploadImage) uploadImage.src = '';
				previewImage.src = '';
				if (uploadImage) uploadImage.style.display = 'block';
				previewImage.style.display = 'none';

				if (uploadIcon) uploadIcon.style.display = 'block';
				if (uploadText) uploadText.style.display = 'block';
				if (uploadSubtext) uploadSubtext.style.display = 'block';
			}
		}

		// Event listeners for drag and drop
		document.querySelectorAll('[id^=drop-zone-]').forEach(function(dropZone) {
			dropZone.addEventListener('dragover', function(e) {
				e.preventDefault();
				e.stopPropagation();
				dropZone.classList.add('dragover');
			});

			dropZone.addEventListener('dragleave', function(e) {
				e.preventDefault();
				e.stopPropagation();
				dropZone.classList.remove('dragover');
			});

			dropZone.addEventListener('drop', function(e) {
				e.preventDefault();
				e.stopPropagation();
				dropZone.classList.remove('dragover');
				var fileInputId = dropZone.id.replace('drop-zone-', '');
				var files = e.dataTransfer.files;
				document.getElementById(fileInputId).files = files;
				updateFile(fileInputId);
			});


		});
	</script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var phoneInput = document.getElementById('nomor_telepon');

			// Prepend +62 if not already present
			if (phoneInput.value && !phoneInput.value.startsWith('+62')) {
				phoneInput.value = '+62' + phoneInput.value;
			}

			// Handle user input to ensure +62 is always at the start
			phoneInput.addEventListener('input', function() {
				if (phoneInput.value.startsWith('+62')) {
					// Allow user to type after +62
					phoneInput.value = '+62' + phoneInput.value.slice(3);
				} else {
					phoneInput.value = '+62' + phoneInput.value;
				}
			});
		});
	</script>

	<script>
		function hitungUmur() {
			const tanggalLahir = document.getElementById('tanggalLahir').value;
			const umurInput = document.getElementById('umur');

			if (tanggalLahir) {
				const tanggalLahirDate = new Date(tanggalLahir);
				const today = new Date();
				let umur = today.getFullYear() - tanggalLahirDate.getFullYear();
				const bulan = today.getMonth() - tanggalLahirDate.getMonth();
				if (bulan < 0 || (bulan === 0 && today.getDate() < tanggalLahirDate.getDate())) {
					umur--;
				}
				umurInput.value = umur;
			} else {
				umurInput.value = '';
			}
		}

		fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json`)
			.then(response => response.json())
			.then(provinces => {
				var data = provinces;
				<?php if ($provinsi == null) : ?>

					var tampung = '<option>Pilih Provinsi</option>';
				<?php else : ?>

					var tampung = '<option><?= $provinsi ?></option>';
				<?php endif ?>
				data.forEach(element => {
					tampung += `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`;
				});
				document.getElementById('provinsi').innerHTML = tampung;
			});

		const selectProvinsi = document.getElementById('provinsi');

		selectProvinsi.addEventListener('change', (e) => {
			var provinsi = e.target.options[e.target.selectedIndex].dataset.reg;
			fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
				.then(response => response.json())
				.then(regencies => {
					var data = regencies;
					<?php if ($kota == null) : ?>
						var tampung = '<option>Pilih Kota</option>';
					<?php else : ?>

						var tampung = '<option><?= $kota ?></option>';
					<?php endif ?>
					data.forEach(element => {
						tampung += `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`;
					});
					document.getElementById('kota').innerHTML = tampung;
				});
		});

		const selectKota = document.getElementById('kota');
		selectKota.addEventListener('change', (e) => {
			var kota = e.target.options[e.target.selectedIndex].dataset.reg;
			fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/districts/${kota}.json`)
				.then(response => response.json())
				.then(districts => {
					districts;
					var data = districts;
					<?php if ($kecamatan == null) : ?>

						var tampung = '<option>Pilih Kecamatan</option>';
					<?php else : ?>

						var tampung = '<option><?= $kecamatan ?></option>';
					<?php endif ?>
					data.forEach(element => {
						tampung += `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`;
					});
					document.getElementById('kecamatan').innerHTML = tampung;
				});
		});

		const selectKecamatan = document.getElementById('kecamatan');
		selectKecamatan.addEventListener('change', (e) => {
			var kecamatan = e.target.options[e.target.selectedIndex].dataset.reg;
			fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/villages/${kecamatan}.json`)
				.then(response => response.json())
				.then(villages => {
					villages;
					var data = villages;
					<?php if ($kelurahan == null) : ?>

						var tampung = '<option>Pilih kelurahan</option>';
					<?php else : ?>

						var tampung = '<option><?= $kelurahan ?></option>';
					<?php endif ?>
					data.forEach(element => {
						tampung += `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`;
					});
					document.getElementById('kelurahan').innerHTML = tampung;
				});
		});
	</script>
</body>

</html>
