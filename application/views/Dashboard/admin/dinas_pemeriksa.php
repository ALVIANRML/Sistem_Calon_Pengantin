<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/admin/dinas_pemeriksa.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/admin/sidebar_admin.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/pagination.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/responsive.css') ?>" />
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/percatin_log.png" />
</head>

<body>
	<div class="container">
		<!-- header -->
		<?php $this->load->view('Dashboard/partial/header-dashboard-admin.php') ?>

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
				<div class="menu">
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
					<a href="<?= base_url('dashboard_admin/data_gejala') ?>">
						<p>Gejala</p>
					</a>
					<a href="<?= base_url('dashboard_admin/nilai_pakar') ?>">
						<p>Nilai Pakar</p>
					</a>
				</div>
			</div>

			<div class="menu menu-double location-menu" id="md2">
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
					<a href="<?= base_url('dashboard_admin/user_pemeriksa') ?>">
						<p>User Pemeriksa</p>
					</a>
				</div>
			</div>
		</div>

		<!--==================================================================================================-->

		<!-- content -->
		<div class="container-content">
			<div class="container-content-data-catin-admin">
				<p>Dinas Pemeriksa</p>
				<div class="tambah-data-btn" style="cursor: pointer;" onclick="showPopup()">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path d="M12 4C11.7348 4 11.4804 4.10536 11.2929 4.29289C11.1054 4.48043 11 4.73478 11 5V11H5C4.73478 11 4.48043 11.1054 4.29289 11.2929C4.10536 11.4804 4 11.7348 4 12C4 12.2652 4.10536 12.5196 4.29289 12.7071C4.48043 12.8946 4.73478 13 5 13H11V19C11 19.2652 11.1054 19.5196 11.2929 19.7071C11.4804 19.8946 11.7348 20 12 20C12.2652 20 12.5196 19.8946 12.7071 19.7071C12.8946 19.5196 13 19.2652 13 19V13H19C19.2652 13 19.5196 12.8946 19.7071 12.7071C19.8946 12.5196 20 12.2652 20 12C20 11.7348 19.8946 11.4804 19.7071 11.2929C19.5196 11.1054 19.2652 11 19 11H13V5C13 4.73478 12.8946 4.48043 12.7071 4.29289C12.5196 4.10536 12.2652 4 12 4Z" fill="#FFFAFA" />
					</svg>
					<p>Tambah Data</p>
				</div>

				<div class="container-tabel">
					<div class="baris-show-entries">
						<div class="show-entries"></Show>
						</div>
						<div class="cari-data">
							<form action="<?= base_url('dashboard_admin/view_dinas_pemeriksaan') ?>" method="get">
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

					<table>
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Gejala Pemeriksaan</th>
								<th>Keterangan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $angka = $start;?>
							<?php foreach ($id as $kelompok) : ?>
								<tr>
									<td><?= ++$angka ?></td>
									<td><?= $kelompok['kelompok_gejala_id'] ?></td>
									<td><?= $kelompok['keterangan'] ?></td>
									<td>
										<div class="container-2-btn">
											<div class="edit-btn" style="cursor: pointer;" data-id="<?= $kelompok['id'] ?>" data-kelompok="<?= $kelompok['kelompok_gejala_id'] ?>" data-keterangan="<?= $kelompok['keterangan'] ?>" onclick="showPopup2(this)">
												<p>Edit</p>
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M18.988 2.01221L21.988 5.01221L19.701 7.30021L16.701 4.30021L18.988 2.01221ZM8 16.0002H11L18.287 8.71321L15.287 5.71321L8 13.0002V16.0002Z" fill="#FFFAFA" />
													<path d="M19 19H8.158C8.132 19 8.105 19.01 8.079 19.01C8.046 19.01 8.013 19.001 7.979 19H5V5H11.847L13.847 3H5C3.897 3 3 3.896 3 5V19C3 20.104 3.897 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V10.332L19 12.332V19Z" fill="#FFFAFA" />
												</svg>
											</div>
											<div class="hapus-btn" style="cursor: pointer;" data-id="<?= $kelompok['id'] ?>" onclick="showPopup1(this)">
												<p>Hapus</p>
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M20.0001 6C20.255 6.00028 20.5001 6.09788 20.6855 6.27285C20.8708 6.44782 20.9823 6.68695 20.9973 6.94139C21.0122 7.19584 20.9294 7.44638 20.7658 7.64183C20.6023 7.83729 20.3702 7.9629 20.1171 7.993L20.0001 8H19.9191L19.0001 19C19.0002 19.7652 18.7078 20.5015 18.1828 21.0583C17.6579 21.615 16.94 21.9501 16.1761 21.995L16.0001 22H8.00011C6.40211 22 5.09611 20.751 5.00811 19.25L5.00311 19.083L4.08011 8H4.00011C3.74523 7.99972 3.50008 7.90212 3.31474 7.72715C3.12941 7.55218 3.01788 7.31305 3.00294 7.05861C2.988 6.80416 3.07079 6.55362 3.23438 6.35817C3.39797 6.16271 3.63002 6.0371 3.88311 6.007L4.00011 6H20.0001ZM14.0001 2C14.5305 2 15.0393 2.21071 15.4143 2.58579C15.7894 2.96086 16.0001 3.46957 16.0001 4C15.9998 4.25488 15.9022 4.50003 15.7273 4.68537C15.5523 4.8707 15.3132 4.98223 15.0587 4.99717C14.8043 5.01211 14.5537 4.92933 14.3583 4.76574C14.1628 4.60214 14.0372 4.3701 14.0071 4.117L14.0001 4H10.0001L9.99311 4.117C9.96301 4.3701 9.8374 4.60214 9.64195 4.76574C9.44649 4.92933 9.19595 5.01211 8.94151 4.99717C8.68707 4.98223 8.44793 4.8707 8.27296 4.68537C8.09799 4.50003 8.0004 4.25488 8.00011 4C7.99995 3.49542 8.19052 3.00943 8.53361 2.63945C8.8767 2.26947 9.34696 2.04284 9.85011 2.005L10.0001 2H14.0001Z" fill="#FFFAFA" />
												</svg>
											</div>
										</div>
									</td>
								</tr>
							<?php endforeach ?>

							<!-- KHUSUS MODAL -->
							<!-- Modal tambah data -->
							<div class="overlay" id="overlay"></div>
							<div class="popup" id="popup">
								<span class="close-btn" onclick="closePopup()">&times;</span>
								<h2>Tambah Data Penyakit</h2>
								<hr style="border-color: #015D67;">
								<form id="popupForm" action="<?= base_url('dashboard_admin/add_dinas_pemeriksa'); ?>" method="post">
									<div class="edit-pendaftaran-container">
										<label for="kelompok"><b class="form-label">Nama Penyakit</b><br></label>
										<div class="input-form">
											<input type="text" id="kelompok" class="tambah-data" name="kelompok" required>
										</div>
										<label for="keterangan"><b class="form-label">Kode Penyakit</b><br></label>
										<div class="input-form">
											<input type="text" id="keterangan" class="tambah-data" name="keterangan" required>
										</div>
										<button type="submit">Submit</button>
									</div>
								</form>
							</div>

							<!-- Popup Konfirmasi Hapus -->
							<div class="overlay" id="overlay1"></div>
							<div class="popup" id="popup1">
								<span class="close-btn" onclick="closePopup1()">&times;</span>
								<form id="popupForm" action="<?= base_url('dashboard_admin/hapus_dinas_pemeriksa'); ?>" method="post">
									<input type="hidden" name="gejalaId" id="gejalaId" />
									<h4>Apakah Anda Yakin Menghapus data ini?</h4>
									<button type="submit">Ya</button>
									<button type="button" onclick="closePopup1()">Tidak</button>
								</form>
							</div>

							<!-- Popup Edit Data Gejala -->
							<div class="overlay" id="overlay2"></div>
							<div class="popup" id="popup2">
								<span class="close-btn" onclick="closePopup2()">&times;</span>
								<h2>Edit Data Gejala</h2>
								<hr style="border-color: #015D67;">
								<form id="popupForm" action="<?= base_url('dashboard_admin/edit_dinas_pemeriksa'); ?>" method="post">
									<input type="hidden" name="gejalaId" id="gejalaId2" />
									<div class="edit-pendaftaran-container">
										<label for="kelompok2"><b class="form-label">Nama Penyakit</b><br></label>
										<div class="input-form">
											<input type="text" id="kelompok2" class="tambah-data" name="kelompok" required>
										</div>
										<label for="keterangan2"><b class="form-label">Kode Penyakit</b><br></label>
										<div class="input-form">
											<input type="text" id="keterangan2" class="tambah-data" name="keterangan" required>
										</div>
										<button type="submit">Submit</button>
									</div>
								</form>
							</div>
						</tbody>
					</table>
					<div>
						<?= $pagination; ?>
					</div>
				</div>
				<div class="copyright-text">
					Copyright © 2024 DPPKB Kota Tebing. Hak cipta dilindungi
				</div>
			</div>
			<!-- KHUSUS MODAL -->
			<!--  -->
		</div>
	</div>
	</div>

	<script>
		// Fungsi untuk menampilkan popup "Tambah Data Penyakit"
		function showPopup() {
			document.getElementById('popup').classList.add('show');
			document.getElementById('overlay').classList.add('show');
		}

		function closePopup() {
			document.getElementById('popup').classList.remove('show');
			document.getElementById('overlay').classList.remove('show');
		}

		// Fungsi untuk menampilkan popup konfirmasi hapus
		function showPopup1(buttonElement) {
			const gejalaId = buttonElement.getAttribute('data-id');
			document.getElementById('gejalaId').value = gejalaId;
			document.getElementById('popup1').classList.add('show');
			document.getElementById('overlay1').classList.add('show');
		}

		function closePopup1() {
			document.getElementById('popup1').classList.remove('show');
			document.getElementById('overlay1').classList.remove('show');
		}

		// Fungsi untuk menampilkan popup "Edit Data Gejala"
		function showPopup2(buttonElement) {
			const gejalaId = buttonElement.getAttribute('data-id');
			const kelompok = buttonElement.getAttribute('data-kelompok');
			const keterangan = buttonElement.getAttribute('data-keterangan');

			document.getElementById('gejalaId2').value = gejalaId;
			document.getElementById('kelompok2').value = kelompok;
			document.getElementById('keterangan2').value = keterangan;

			document.getElementById('popup2').classList.add('show');
			document.getElementById('overlay2').classList.add('show');
		}

		function closePopup2() {
			document.getElementById('popup2').classList.remove('show');
			document.getElementById('overlay2').classList.remove('show');
		}
	</script>
	<script src="<?= base_url('assets/js/sidebar.js') ?>"></script>
</body>

</html>
