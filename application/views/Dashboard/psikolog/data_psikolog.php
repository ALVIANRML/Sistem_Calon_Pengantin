<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Catin</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/kesehatan/data.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/admin/sidebar_admin.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/pagination.css') ?>" />
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/percatin_log.png" />
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
			</div>
		</div>

		<!-- sidebar -->
		<div class="container-sidebar-dashboard-admin">
			<p>NAVIGASI</p>
			<a href="<?= base_url('dashboard_psikolog/view_psikolog') ?>">
				<div class="menu">
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
			<a href="">
				<div class="menu location-menu">
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
			<div class="container-content-data-catin-admin">
				<p>Data Calon Pengantin</p>

				<label class="filter-tanggal-text" for="tanggal">Filter tanggal</label>
				<div class="baris-filter-tanggal">
					<div>
						<form action="<?= base_url('dashboard_psikolog/psikolog_filter_tanggal') ?>" method="post">
							<div class="form-group">
								<div class="form-input-tanggal">
									<input type="date" id="tanggal" name="tanggal" value="<?= $this->session->userdata('psikolog_tanggal_filter') ?>" onchange="this.form.submit()">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M9 11H7V13H9V11ZM13 11H11V13H13V11ZM17 11H15V13H17V11ZM19 4H18V2H16V4H8V2H6V4H5C3.89 4 3.01 4.9 3.01 6L3 20C3 20.5304 3.21071 21.0391 3.58579 21.4142C3.96086 21.7893 4.46957 22 5 22H19C20.1 22 21 21.1 21 20V6C21 4.9 20.1 4 19 4ZM19 20H5V9H19V20Z" fill="#015963" />
									</svg>
								</div>
							</div>
						</form>
					</div>
					<!-- <div class="container-2-btn">
						<div class="cetak-data-btn">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path
									d="M14 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V8L14 2ZM15.8 20H14L12 16.6L10 20H8.2L11.1 15.5L8.2 11H10L12 14.4L14 11H15.8L12.9 15.5L15.8 20ZM13 9V3.5L18.5 9H13Z"
									fill="#FFFAFA" />
							</svg>
							<p>Cetak Data</p>
						</div>
						
					</div> -->
				</div>

				<div class="container-tabel">
					<div class="baris-show-entries">
						<div class="show-entries">
							</Show>
						</div>
						<div class="cari-data">
							<form action="<?= base_url('dashboard_psikolog/view_data') ?>" method="get">
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
								</tr>
							</thead>
							<?php
							$angka = $start; // Inisialisasi variabel $angka

							?>
							<?php foreach ($user_detail as $datas) : ?>
								<?php $status_verifikasi = ($datas['id_status_verifikasi'] == 2) ? '<td><span class="status-tabel" style="background-color: green">Sudah diverifikasi</span></td>' : '<td><span class="status-tabel" style="background-color: #DC3545">Belum diverifikasi</span></td>'; ?>
								<?php $status_kesehatan = ($datas['id_status_kesehatan'] == 2) ? '<td><span class="status-tabel" style="background-color: green">Sudah diverifikasi</span></td>' : '<td><span class="status-tabel" style="background-color: #DC3545">Belum diverifikasi</span></td>'; ?>
								<?php $status_bnn = ($datas['id_status_bnn'] == 2) ? '<span class="status-tabel" style="background-color: green">Sudah di setujui</span>' : '<span class="status-tabel" style="background-color: #DC3545">Belum di setujui</span>'; ?>
								<?php $status_psikolog = ($datas['id_status_psikolog'] == 2) ? '<span class="status-tabel" style="background-color: green">Sudah di setujui</span>' : '<span class="status-tabel" style="background-color: #DC3545">Belum di setujui</span>'; ?>
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
													<span class="value gap-btn" style="display: flex; justify-content: flex-end;">
															<button class="open-modal btn green-btn" style="display: flex; align-items: center; padding-right: 5px;" onclick="showPopup1('popup1-<?= $datas['user_id'] ?>')">
																Hasil Survei Catin
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" style="margin-left: auto;">
																	<path d="M10.0002 5H8.2002C7.08009 5 6.51962 5 6.0918 5.21799C5.71547 5.40973 5.40973 5.71547 5.21799 6.0918C5 6.51962 5 7.08009 5 8.2002V15.8002C5 16.9203 5 17.4801 5.21799 17.9079C5.40973 18.2842 5.71547 18.5905 6.0918 18.7822C6.5192 19 7.07899 19 8.19691 19H15.8031C16.921 19 17.48 19 17.9074 18.7822C18.2837 18.5905 18.5905 18.2839 18.7822 17.9076C19 17.4802 19 16.921 19 15.8031V14M20 9V4M20 4H15M20 4L13 11" stroke="#FFFAFA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
																</svg>
															</button>
															<button class="open-modal btn green-btn" style="display: flex; align-items: center; padding-right: 5px;" onclick="showPopup2('popup2-<?= $datas['user_id'] ?>')">
																Hasil Kesehatan
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" style="margin-left: auto;">
																	<path d="M10.0002 5H8.2002C7.08009 5 6.51962 5 6.0918 5.21799C5.71547 5.40973 5.40973 5.71547 5.21799 6.0918C5 6.51962 5 7.08009 5 8.2002V15.8002C5 16.9203 5 17.4801 5.21799 17.9079C5.40973 18.2842 5.71547 18.5905 6.0918 18.7822C6.5192 19 7.07899 19 8.19691 19H15.8031C16.921 19 17.48 19 17.9074 18.7822C18.2837 18.5905 18.5905 18.2839 18.7822 17.9076C19 17.4802 19 16.921 19 15.8031V14M20 9V4M20 4H15M20 4L13 11" stroke="#FFFAFA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
																</svg>
															</button>
															<button class="open-modal btn green-btn" style="display: flex; align-items: center; padding-right: 5px;" onclick="showPopup3('popup3-<?= $datas['user_id'] ?>')">
																Hasil BNN
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" style="margin-left: auto;">
																	<path d="M10.0002 5H8.2002C7.08009 5 6.51962 5 6.0918 5.21799C5.71547 5.40973 5.40973 5.71547 5.21799 6.0918C5 6.51962 5 7.08009 5 8.2002V15.8002C5 16.9203 5 17.4801 5.21799 17.9079C5.40973 18.2842 5.71547 18.5905 6.0918 18.7822C6.5192 19 7.07899 19 8.19691 19H15.8031C16.921 19 17.48 19 17.9074 18.7822C18.2837 18.5905 18.5905 18.2839 18.7822 17.9076C19 17.4802 19 16.921 19 15.8031V14M20 9V4M20 4H15M20 4L13 11" stroke="#FFFAFA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
																</svg>
															</button>
															<button class="open-modal btn green-btn" style="display: flex; align-items: center; padding-right: 5px;" onclick="showPopup4('popup4-<?= $datas['user_id'] ?>')">
																Hasil Psikolog
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" style="margin-left: auto;">
																	<path d="M10.0002 5H8.2002C7.08009 5 6.51962 5 6.0918 5.21799C5.71547 5.40973 5.40973 5.71547 5.21799 6.0918C5 6.51962 5 7.08009 5 8.2002V15.8002C5 16.9203 5 17.4801 5.21799 17.9079C5.40973 18.2842 5.71547 18.5905 6.0918 18.7822C6.5192 19 7.07899 19 8.19691 19H15.8031C16.921 19 17.48 19 17.9074 18.7822C18.2837 18.5905 18.5905 18.2839 18.7822 17.9076C19 17.4802 19 16.921 19 15.8031V14M20 9V4M20 4H15M20 4L13 11" stroke="#FFFAFA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
																</svg>
															</button>
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
																</svg>Verifikasi Data
															</button>
														</span>
													</li>
												</ul>
											</div>
										</td>
									</tr>
									</tr>



									<!-- pop up hasil survei catin -->
								</tbody>
								<div class="overlay" id="overlay1"></div>
								<div class="popup" id="popup1-<?= $datas['user_id'] ?>">
									<span class="close-btn" onclick="closePopup1('popup1-<?= $datas['user_id'] ?>')">&times;</span>
									<h2>Hasil Survey Catin</h2>
									<hr style="border-color: #015D67;">
									<div class="edit-pendaftaran-container">
										<p><b>Tingkat Kepercayaan : <?= $datas['kepercayaan_catin']; ?>%</b></p> <br>
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
									<h2>Hasil Kesehatan</h2>
									<hr style="border-color: #015D67;">
									<div class="edit-pendaftaran-container">
										<p>Nama Faskes: UPT Puskesmas Rambung</p><br>
										<p>Nama Pemeriksa: <?= $datas['nama_pemeriksa_kesehatan'] ?></p><br>
										<b>Tanda Vital</b>

										<p>Tekanan Darah: <?= !empty($datas['tekanan_sistolik']) && !empty($datas['tekanan_diasistolik']) ? $datas['tekanan_sistolik'] . '/' . $datas['tekanan_diasistolik'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>

										<p>Nadi: <?= !empty($datas['nadi']) ? $datas['nadi'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>

										<p>Nafas: <?= !empty($datas['nafas']) ? $datas['nafas'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>

										<p>Suhu: <?= !empty($datas['suhu']) ? $datas['suhu'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>

										<br>
										<p>Berat Badan: <?= !empty($datas['berat_badan']) ? $datas['berat_badan'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>
										<p>Tinggi: <?= !empty($datas['tinggi_badan']) ? $datas['tinggi_badan'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>
										<p>IMT: <?= !empty($datas['imt']) ? $datas['imt'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>
										<p>Lila (Lingkar Lengan Atas): <?= !empty($datas['lila']) ? $datas['lila'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>
										<p>Status T: <?= !empty($datas['suntik_tt']) ? $datas['suntik_tt'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>
										<p>Tanda Anemia: <?= !empty($datas['tanda_anemia']) ? $datas['tanda_anemia'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>
										<br>
										<p><strong>Penunjang:</strong></p>
										<p>HB: <?= !empty($datas['hb']) ? $datas['hb'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>
										<p>Golongan Darah: <?= !empty($datas['gol_darah']) ? $datas['gol_darah'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>

										<br>
										<p><b>Lain-Lain</b></p><br>

										<p>Rapidtest: <?= !empty($datas['rapid_test']) ? $datas['rapid_test'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>
										<p>Planotest: <?= !empty($datas['plano_test']) ? $datas['plano_test'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>

										<br>
										<label for="kode_resiko"><strong> Kesehatan </strong></label><br>
										<input type="text" name="kode_resiko" id="kode_resiko" value="<?= !empty($datas['kode_kesehatan']) ? $datas['kode_kesehatan'] : '<span style="color: red;">Data tidak tersedia</span>' ?>" readonly><br><br>

										<p><b>Tingkat Kepercayaan : <?= !empty($datas['kepercayaan_kesehatan']) ? $datas['kepercayaan_kesehatan'] : '<span style="color: red;">Data tidak tersedia</span>' ?>%</b></p>
										<label for="nama_resiko"></label>
										<input type="text" name="nama_resiko" id="nama_resiko" value="<?= !empty($datas['nama_sakit_kesehatan']) ? $datas['nama_sakit_kesehatan'] : '<span style="color: red;">Data tidak tersedia</span>' ?>" readonly><br>

										<br>
										<label for="keterangan"><b class="form-label">Keterangan</b><br></label>
										<div class="input-form" style="border: none;">
											<textarea name="keterangan" class="tambah-data" style="height: 90px; width: 700px;" readonly><?= !empty($datas['keterangan_kesehatan']) ? $datas['keterangan_kesehatan'] : '<span style="color: red;">Data tidak tersedia</span>' ?></textarea>
										</div>

									</div>
								</div>

								<!-- popup periksa BNN -->
								<div class="overlay" id="overlay3"></div>
								<div class="popup" id="popup3-<?= $datas['user_id'] ?>">
									<span class="close-btn" onclick="closePopup3('popup3-<?= $datas['user_id'] ?>')">&times;</span>
									<h2>Hasil BNN</h2>
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
								<!-- psikologi -->
								<div class="overlay" id="overlay4"></div>
								<div class="popup" id="popup4-<?= $datas['user_id'] ?>">
									<span class="close-btn" onclick="closePopup4('popup4-<?= $datas['user_id'] ?>')">&times;</span>
									<h2>Hasil Psikolog</h2>
									<hr style="border-color: #015D67;">
									<div class="edit-pendaftaran-container">
										<p><b>Tingkat Kepercayaan : <?= $datas['kepercayaan_psikolog'] ?>%</b></p> <br>
										<label for="kode_penyakit"><b class="form-label">Kode Identifikasi</b><br></label>
										<div class="input-form" style="border: none;">
											<input type="text" id="kode_penyakit" value="<?= $datas['kode_psikolog'] ?>" class="tambah-data" name="kode_penyakit" readonly required>
										</div>
										<label for="nama_penyakit"><b class="form-label">Nama Identifikasi Kepribadian Catin</b><br></label>
										<div class="input-form" style="border: none;">
											<input type="text" id="nama_penyakit" value="<?= $datas['nama_sakit_psikolog'] ?>" class="tambah-data" name="nama_penyakit" readonly required>
										</div>
										<label for="keterangan"><b class="form-label">Keterangan</b><br></label>
										<div class="input-form" style="border: none;">
											<textarea name="keterangan" class="tambah-data" style="height: 90px;" readonly><?= $datas['keterangan_psikolog'] ?></textarea>
										</div>
									</div>
								</div>

								<div class="overlay" id="overlay5"></div>
								<div class="popup" id="popup5-<?= $datas['user_id'] ?>">
									<span class="close-btn" onclick="closePopup5('popup5-<?= $datas['user_id'] ?>')">&times;</span>
									<h2>Verifikasi Data</h2>
									<hr style="border-color: #015D67;">
									<div class="edit-pendaftaran-container">
										<label for="role"><b class="form-label">Status User</b><br></label>
										<form action="<?= base_url('dashboard_psikolog/data_verifikasi'); ?>" method="post">
											<input type="text" value="<?= $datas['user_id'] ?>" name="id" required hidden> <br>
											<label for="nama_pemeriksa">Nama Pemeriksa:</label>
											<input type="text" value="<?= $this->session->userdata('nama_pemeriksa') ?>" name="nama_pemeriksa" readonly>
											<select type="text" id="role" class="tambah-data" name="data_verifikasi" style="width:100%; height:50px" required>
												<?php if ($datas['id_status_kesehatan'] == 2) : ?>
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
							<?php endforeach ?>
						</table>
					</div>

				</div>
				<?= $pagination ?>
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
	<script src="<?= base_url('assets/js/popup.js') ?>"></script>


</body>

</html>
