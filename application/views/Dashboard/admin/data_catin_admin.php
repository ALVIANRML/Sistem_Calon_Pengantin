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
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/percatin_log.png" />
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
						<div class="cetak-data-btn">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M14 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V8L14 2ZM15.8 20H14L12 16.6L10 20H8.2L11.1 15.5L8.2 11H10L12 14.4L14 11H15.8L12.9 15.5L15.8 20ZM13 9V3.5L18.5 9H13Z" fill="#FFFAFA" />
							</svg>
							<p>Cetak Data</p>
						</div>
						<div class="hapus-data-btn" style="cursor:pointer;" onclick="showPopup()">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M20.0001 6C20.255 6.00028 20.5001 6.09788 20.6855 6.27285C20.8708 6.44782 20.9823 6.68695 20.9973 6.94139C21.0122 7.19584 20.9294 7.44638 20.7658 7.64183C20.6023 7.83729 20.3702 7.9629 20.1171 7.993L20.0001 8H19.9191L19.0001 19C19.0002 19.7652 18.7078 20.5015 18.1828 21.0583C17.6579 21.615 16.94 21.9501 16.1761 21.995L16.0001 22H8.00011C6.40211 22 5.09611 20.751 5.00811 19.25L5.00311 19.083L4.08011 8H4.00011C3.74523 7.99972 3.50008 7.90212 3.31474 7.72715C3.12941 7.55218 3.01788 7.31305 3.00294 7.05861C2.988 6.80416 3.07079 6.55362 3.23438 6.35817C3.39797 6.16271 3.63002 6.0371 3.88311 6.007L4.00011 6H20.0001ZM14.0001 2C14.5305 2 15.0393 2.21071 15.4143 2.58579C15.7894 2.96086 16.0001 3.46957 16.0001 4C15.9998 4.25488 15.9022 4.50003 15.7273 4.68537C15.5523 4.8707 15.3132 4.98223 15.0587 4.99717C14.8043 5.01211 14.5537 4.92933 14.3583 4.76574C14.1628 4.60214 14.0372 4.3701 14.0071 4.117L14.0001 4H10.0001L9.99311 4.117C9.96301 4.3701 9.8374 4.60214 9.64195 4.76574C9.44649 4.92933 9.19595 5.01211 8.94151 4.99717C8.68707 4.98223 8.44793 4.8707 8.27296 4.68537C8.09799 4.50003 8.0004 4.25488 8.00011 4C7.99995 3.49542 8.19052 3.00943 8.53361 2.63945C8.8767 2.26947 9.34696 2.04284 9.85011 2.005L10.0001 2H14.0001Z" fill="#FFFAFA" />
							</svg>
							<p>Hapus Data</p>
						</div>
					</div>
				</div>
				<!-- Popup 1 -->
				<div class="overlay" id="overlay"></div>
				<div class="popup" id="popup">
					<span class="close-btn" onclick="closePopup()">&times;</span>
					<h2>Hapus Data</h2>
					<p>Masukkan tanggal untuk memilih data yang ingin dihapus</p>

					<hr>
					<form id="popupForm1" action="<?= base_url('dashboard/filter_hapus_data'); ?>" method="post">
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
				<div class="overlay" id="overlay1"></div>
				<div class="popup" id="popup1">
					<span class="close-btn" onclick="closePopup1()">&times;</span>
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

				<!-- modal
                    <button id="openModalBtn">Open Modal</button>

                    <div id="myModal" class="modal">
                        <div class="modal-content">
                            <span class="modal-btn" style="background-color: #DC3545;">Tidak</span>
                            <span class="modal-btn" style="background-color: #015D67;">Ya</span>
                            <p>Hapus Data Catin</p>
                            <p>Apakah kamu yakin menghapus data ini?</p>
                        </div>
                    </div> -->

				<div class="container-tabel">
					<div class="baris-show-entries">
						<div class="show-entries">Show 10 entries</Show>
						</div>
						<div class="cari-data">
							<form action="<?= base_url('dashboard_admin/view_data_catin') ?>" method="get">
								<div class="form-input-cari">
									<input type="text" name="search" id="search" placeholder="Cari data">
									<button type="submit">
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
								<?php $status_bnn = ($datas['id_status_bnn'] == 2) ? 'Sudah di setujui' : 'belum di setujui'; ?>
								<?php $status_psikolog = ($datas['id_status_psikolog'] == 2) ? 'Sudah di setujui' : 'belum di setujui'; ?>
								<tbody>
									<tr>
										<td><?= ++$angka; ?></td>
										<td>user1</td>
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
													<li><span class="label">Tanggal Lahir</span><span class="titik-dua">:</span><span class="value"><?= $datas['tanggal_lahir'] ?></span></li>
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
													<li><span class="label">Hasil Pemeriksaan</span><span class="titik-dua">:</span><span class="value">-</span></li>
													<li><span class="label">Status Aktif</span><span class="titik-dua">:</span><span class="value">"</span></li>
													<li><span class="label">Status Perpanjangan</span><span class="titik-dua">:</span><span class="value"><?= $datas['foto_surat'] ?>"</span></li>
													<li><span class="label">Mulai Berlaku</span><span class="titik-dua">:</span><span class="value"><?= $datas['mulai_berlaku'] ?></span></li>
													<li><span class="label">Akhir Berlaku</span><span class="titik-dua">:</span><span class="value"><?= $datas['akhir_berlaku'] ?></span></li>
													<li><span class="label">Verifikasi Data</span><span class="titik-dua">:</span><span class="value">VALUE</span></li>
													<li><span class="label">Aksi</span><span class="titik-dua">:</span><span class="value">VALUE</span></li>
												</ul>
											</div>
										</td>
									</tr>
									</tr>
									<!-- Tambahkan baris data lainnya di sini -->

								</tbody>
							<?php endforeach ?>
						</table>
					</div>
				</div>
				<!--  -->
				<div class="copyright-text">
					Copyright © 2024 DPPKB Kota Tebing. Hak cipta dilindungi
				</div>
			</div>
		</div>
	</div>

	<script src="<?= base_url('assets/js/data-catin-admin.js') ?>"></script>
	<script src="<?= base_url('assets/js/sidebar.js') ?>"></script>
	<script src="<?= base_url('assets/js/detail-baris-table.js') ?>"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		// Function to show popup 1
		function showPopup() {
			$('#overlay').css('display', 'block');
			$('#popup').css('display', 'block');
		}

		// Function to close popup 1
		function closePopup() {
			$('#overlay').css('display', 'none');
			$('#popup').css('display', 'none');
		}

		// Function to show popup 2
		function showPopup1() {
			$('#overlay1').css('display', 'block');
			$('#popup1').css('display', 'block');
			// Set the date and captcha in the form
			$('#tanggal_hapus_data').text(sessionStorage.getItem('tanggal_hapus_data'));
			$('#captcha_text').text(sessionStorage.getItem('captcha'));
		}

		// Function to close popup 2
		function closePopup1() {
			$('#overlay1').css('display', 'none');
			$('#popup1').css('display', 'none');
			location.reload(); // Refresh the page
		}

		$(document).ready(function() {
			// Event listener for form submission on popup 1
			$('#popupForm1').on('submit', function(event) {
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
							closePopup(); // Close popup 1
							showPopup1(); // Show popup 2
						} else {
							alert('Data tidak tersedia');
							closePopup();
						}
					},
					error: function() {
						alert('There was an error processing your request.');
					}
				});
			});

			// Event listener for form submission on popup 2
			$('#popupForm2').on('submit', function(event) {
				event.preventDefault(); // Prevent default form submission
				closePopup1();
				// Additional actions if needed
			});
		});
	</script>


</body>

</html>
