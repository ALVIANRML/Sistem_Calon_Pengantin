<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/catin.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/grid.css') ?>">
	<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
	<title>Non-Scrollable Layout</title>

</head>

<body>

	<!-- declaration -->
	<?php
	$nomor_pendaftaran = $this->session->userdata('no_pendaftaran');
	$nama = $this->session->userdata('nama_lengkap');
	$nik = $this->session->userdata('nik');
	$fotoUser = $this->session->userdata('foto_user');
	$tempatLahir = $this->session->userdata('tempat_lahir');
	$tanggalLahir = $this->session->userdata('tanggal_lahir');
	$nomor = $this->session->userdata('nomor');
	$usia = $this->session->userdata('usia');
	$jenisKelamin = $this->session->userdata('jenis_kelamin');
	$id_status_verifikasi = $this->session->userdata('id_status_verifikasi');
	// var_dump($id_pemeriksaan_survei);exit;
	$id_status_perpanjangan = $this->session->userdata('id_status_perpanjangan');
	$id_status_aktif = $this->session->userdata('id_status_aktif');
	$id_status_kesehatan = $this->session->userdata('id_status_kesehatan');
	$id_status_bnn = $this->session->userdata('id_status_bnn');
	$id_status_psikolog = $this->session->userdata('id_status_psikolog');
	$skrining_kesehatan = $this->session->userdata('skrining_kesehatan');
	$kuesioner_kepribadian = $this->session->userdata('kuesioner_kepribadian');
	$id_pemeriksaan_psikolog = $this->session->userdata('id_pemeriksaan_psikolog');
	$id_pemeriksaan_survei = $this->session->userdata('id_pemeriksaan_survei');
	$tanggal_periksa_catin = $this->session->userdata('tanggal_periksa');
	//For Data Hasil Pemeriksaan
	$kode_catin = $this->session->userdata('kode_catin');
	$nama_sakit_catin = $this->session->userdata('nama_sakit_catin');
	$kepercayaan_catin = $this->session->userdata('kepercayaan_catin');
	$keterangan_catin = $this->session->userdata('keterangan_catin');
	$kode_psikolog = $this->session->userdata('kode_psikolog');
	$nama_sakit_psikolog = $this->session->userdata('nama_sakit_psikolog');
	$kepercayaan_psikolog = $this->session->userdata('kepercayaan_psikolog');
	$keterangan_psikolog = $this->session->userdata('keterangan_psikolog');
	$fotoProfil = $this->session->userdata('foto_user');
	// var_dump($id_pemeriksaan_survei);exit;
	if ($fotoUser == null) {
		$fotoProfil = base_url('assets/img/null_profile.svg');
		// var_dump('2');exit;
	} else {
		$fotoProfil = base_url('uploads/photo/') . $fotoUser;
		$this->session->userdata('foto_user');
	}
	// $fotoProfil = ($fotoProfil == null) ? '' : '<td><span class="status-tabel" style="background-color: #DC3545">Belum diverifikasi</span></td>';


	// Memastikan bahwa $tanggal_periksa_catin tidak null sebelum memformat
	if ($tanggal_periksa_catin) {
		// Memformat tanggal menjadi format d/m/Y
		$tanggal_periksa_catin = date('d/m/Y', strtotime($tanggal_periksa_catin));
	}
	?>


	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<button class="btn btn-light me-3" id="toggleSidebar">
				<i class="bx bx-menu"></i>
			</button>
			<img src="<?= base_url('assets/') ?>img/percantin.png" alt="" class="logo">
			<p class="logo-percatin"><b>PERCATIN</b></p>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto">

					<li class="nav-item dropdown" style="margin-right: 5vh;">
						<a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="<?= $fotoProfil ?>" alt="Profile Picture" class="rounded-circle" style="width: 40px; height: 40px; margin-right: 10px;">
							<div class="text-start">
								<p class="mb-0">Halo,</p>
								<p class="mb-0 fw-bold"><?= $nama ?></p>
							</div>

						</a>
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="<?= base_url('auth/ganti_password') ?>">Ganti Password</a></li>
							<li><a class="dropdown-item" href="<?= base_url('auth/login') ?>">Logout</a></li>
						</ul>
					</li>

				</ul>
			</div>
		</div>
	</nav>
	<!-- Sidebar -->
	<div class="sidebar" id="sidebar">
		<ul class="menu_items">
			<li class="item" style="background-color: #015D67;"><a href="<?= base_url('dashboard/view_catin') ?>" style="color:white"><i class="bx bx-grid-alt"></i>Dashboard</a></li>
			<li class="item"><a href="<?= base_url('dashboard/view_catin_pemeriksaan') ?>"><i class="bx bx-edit"></i>Daftar Pemeriksaan</a></li>
		</ul>
	</div>

	<div class="content">
		<div class="dashboard">
			<div class="row g-3" style="height: 100%;">
				<!-- Kolom Kiri -->
				<div class="col-md-3">
					<div class="p-3 bg-light border-solo">
						<div class="column">
							<img class="circular--square" src="<?= $fotoProfil ?>">
						</div>
						<p style="text-align: center; margin-top: 10px;"><b><?= $nama  ?></b></p>
						<div class="biodata" style="font-size: 12.5px;">
							<div class="label">No :</div>
							<?php if ($nomor_pendaftaran == null) : ?>
								<div class="isi-label"> Lakukan daftar pemeriksaan terlebih dahulu</div>
							<?php else : ?>
								<div class="isi-label"> <?= $nomor_pendaftaran ?></div>
							<?php endif ?>
							<div class="label">NIK :</div>
							<?php if ($nik == null) : ?>
								<div class="isi-label"> Lakukan daftar pemeriksaan terlebih dahulu</div>
							<?php else : ?>
								<div class="isi-label"> <?= $this->session->userdata('nik') ?></div>
							<?php endif ?>

							<div class="label">TTL :</div>
							<?php if ($tanggalLahir == null && $tempatLahir == null) : ?>
								<div class="isi-label"> Lakukan daftar pemeriksaan terlebih dahulu</div>
							<?php else : ?>
								<div class="isi-label"> <?= $tempatLahir ?>, <?= date('d / m / Y', strtotime($this->session->userdata('tanggal_lahir'))) ?></div>
							<?php endif ?>

							<div class="label">Usia :</div>
							<?php if ($usia == null) : ?>
								<div class="isi-label">Lakukan daftar pemeriksaan terlebih dahulu</div>
							<?php else : ?>
								<div class="isi-label"> <?= $usia ?> Tahun</div>
							<?php endif ?>

							<div class="label">Jenis Kelamin :</div>
							<?php if ($jenisKelamin == null) : ?>
								<div class="isi-label"> Lakukan daftar pemeriksaan terlebih dahulu</div>
							<?php else : ?>
								<div class="isi-label"> <?= $jenisKelamin ?></div>
							<?php endif ?>
						</div>
					</div>
				</div>
				<!-- Kolom Kanan -->
				<div class="col-md-8">
					<div class="d-flex flex-column h-100">
						<!-- Baris Atas -->
						<div class="row g-3 flex-grow-1">
							<div class="col-md-4">
								<div class="p-3 bg-light border text-center h-100">
									<h6>Skrining Kesehatan</h6>
									<button data-bs-toggle="modal" data-bs-target="#skrining-kesehatan" class="btn btn-outline-primary">Isi Skrining Kesehatan</button>
									<div class="status">
										<?php if ($id_pemeriksaan_survei == 2): ?>
											<p><b>Status:</b> <span class="text-secondary">Sudah <img src="<?= base_url('assets/img/sudah.svg') ?>" alt="Check Icon" style="width: 16px; height: 16px; margin-left: 5px;"></span></p>
										<?php else : ?>
											<p><b>Status:</b> <span class="text-danger">Belum <img src="<?= base_url('assets/img/belum.svg') ?>" alt="Check Icon" style="width: 16px; height: 16px; margin-left: 5px;"></span></p>
										<?php endif ?>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="p-3 bg-light border text-center h-100">
									<h6>Kuesioner Kepribadian</h6>
									<button data-bs-toggle="modal" data-bs-target="#kuesioner-kepribadian	" class="btn btn-outline-primary">Isi Kuesioner Kepribadian</button>
									<div class="status">
										<?php if ($id_pemeriksaan_psikolog == 2) : ?>
											<p><b>Status:</b> <span class="text-secondary">Sudah <img src="<?= base_url('assets/img/sudah.svg') ?>" alt="Check Icon" style="width: 16px; height: 16px; margin-left: 5px;"></span></p>
										<?php else : ?>
											<p><b>Status:</b> <span class="text-danger">Belum <img src="<?= base_url('assets/img/belum.svg') ?>" alt="Check Icon" style="width: 16px; height: 16px; margin-left: 5px;"></span></p>
										<?php endif ?>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="p-3 bg-light border text-center h-100">
									<h6>Status Verifikasi</h6>
									<?php if ($id_status_verifikasi == 2) : ?>
										<button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#status-verifikasi">
											Sudah Diverifikasi <img src="<?= base_url('assets/img/sudah.svg') ?>" alt="Check Icon" style="width: 16px; height: 16px; margin-left: 5px;">
										</button>
									<?php else: ?>
										<button class="btn btn-outline-primary">
											Belum Diverifikasi <img src="<?= base_url('assets/img/belum.svg') ?>" alt="Check Icon" style="width: 16px; height: 16px; margin-left: 5px;">
										</button>
									<?php endif ?>
									<p class="text-grid-kanan">Harap menunggu s/d:</p>
								</div>
							</div>
						</div>
						<!-- Baris Bawah -->
						<div class="row g-3 flex-grow-1">
							<div class="col-md-4">
								<div class="p-3 bg-light border text-center h-100">
									<h6>Status Kesehatan</h6>
									<?php if ($id_status_kesehatan == 2) : ?>
										<button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#status-kesehatan">
											Sudah Disetujui <img src="<?= base_url('assets/img/sudah.svg') ?>" alt="Check Icon" style="width: 16px; height: 16px; margin-left: 5px;">
										</button>
									<?php else: ?>
										<button class="btn btn-outline-primary">
											Belum Disetujui <img src="<?= base_url('assets/img/belum.svg') ?>" alt="Check Icon" style="width: 16px; height: 16px; margin-left: 5px;">
										</button>
									<?php endif ?>
									<p class="text-grid-kanan">Harap menunggu s/d:</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="p-3 bg-light border text-center h-100">
									<h6>Status BNN</h6>
									<?php if ($id_status_bnn == 2) : ?>
										<button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#status-bnn">
											Sudah Disetujui <img src="<?= base_url('assets/img/sudah.svg') ?>" alt="Check Icon" style="width: 16px; height: 16px; margin-left: 5px;">
										</button>
									<?php else: ?>
										<button class="btn btn-outline-primary">
											Belum Disetujui <img src="<?= base_url('assets/img/belum.svg') ?>" alt="Check Icon" style="width: 16px; height: 16px; margin-left: 5px;">
										</button>
									<?php endif ?>
									<p class="text-grid-kanan">Harap menunggu s/d:</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="p-3 bg-light border text-center h-100">
									<h6>Status Psikolog</h6>
									<?php if ($id_status_psikolog == 2) : ?>
										<button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#status-psikolog">
											Sudah Disetujui <img src="<?= base_url('assets/img/sudah.svg') ?>" alt="Check Icon" style="width: 16px; height: 16px; margin-left: 5px;">
										</button>
									<?php else: ?>
										<button class="btn btn-outline-primary">
											Belum Disetujui <img src="<?= base_url('assets/img/belum.svg') ?>" alt="Check Icon" style="width: 16px; height: 16px; margin-left: 5px;">
										</button>
									<?php endif ?>
									<p class="text-grid-kanan">Harap menunggu s/d:</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- Modal isi skrining kesehatan -->
	<div class="modal fade" id="skrining-kesehatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Skrining Kesehatan</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<?php if ($id_pemeriksaan_survei == 2): ?>
						<h1 style="color:#015D67">Hasil Skrining Kesehatan</h1>
						<hr style="border-color: #015D67;">
						<div class="edit-pendaftaran-container">
							<p><b>Tingkat Kepercayaan : <?= $kepercayaan_catin ?>%</b></p>
							<label for="kode_penyakit"><b class="form-label">Kode Penyakit</b><br></label>
							<div class="input-form" style="border: none;">
								<input type="text" id="kode_penyakit" value="<?= $kode_catin ?>" name="kode_penyakit" style="width:100%; border:3px solid #015D67" readonly required>
							</div>
							<label for="nama_penyakit"><b class="form-label">Nama Penyakit</b><br></label>
							<div class="input-form" style="border: none;">
								<input type="text" id="nama_penyakit" value="<?= $nama_sakit_catin ?>" name="nama_penyakit" style="width:100%; border:3px solid #015D67" readonly required>
							</div>
							<label for="keterangan"><b class="form-label">Keterangan</b><br></label>
							<div class="input-form" style="border: none;">
								<textarea name="keterangan" style="height: 90px; width:100%; border:3px solid #015D67" readonly><?= $keterangan_catin ?></textarea>
							</div>
						</div>
					<?php else: ?>
						<h2 style="color:#015D67">Isi Skrining Kesehatan</h2>
						<form action="<?= base_url('dashboard/skrining_kesehatan'); ?>" method="post">
							<p>Silahkan isi sesuai dengan kamu</p>
							<div class="input-form">
								<?php foreach ($gejalaCatin as $skrining): ?>
									<label for="skrining_kesehatan[]"><b></b><br></label>
									<!-- Unique ID for each checkbox, using $index to ensure IDs don't repeat -->
									<input type="checkbox" style="color:#015D67" name=" skrining_kesehatan[]" id="skrining_kesehatan[]" value="<?= $skrining['id'] ?>"> <?= $skrining['nama_gejala'] ?>
									<hr>
								<?php endforeach; ?>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn-outline-primary" style="height: 5vh; margin-top:0cm">Save changes</button>
							</div>
						</form>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal isi Kuesioner Kepribadian -->
	<div class="modal fade" id="kuesioner-kepribadian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Kuesioner Kepribadian</h5>
					<button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<?php
					if ($id_pemeriksaan_psikolog == 2) :
					?>
						<h1 style="color: #015D67;">Hasil Kusesioner Kepribadian</h1>
						<hr style="border-color: #015D67;">
						<div class="edit-pendaftaran-container">
							<p><b>Tingkat Kepercayaan : <?= $kepercayaan_psikolog ?>%</b></p>
							<label for="kode_penyakit"><b class="form-label">Kode Penyakit</b><br></label>
							<div class="input-form" style="border: none;">
								<input type="text" id="kode_penyakit" value="<?= $kode_psikolog ?>" name="kode_penyakit" style="height: 90px; width:100%; border:3px solid #015D67" readonly required>
							</div>
							<label for="nama_penyakit"><b class="form-label">Nama Penyakit</b><br></label>
							<div class="input-form" style="border: none;">
								<input type="text" id="nama_penyakit" value="<?= $nama_sakit_psikolog ?>" name="nama_penyakit" style="height: 90px; width:100%; border:3px solid #015D67" readonly required>
							</div>
							<label for="keterangan"><b class="form-label">Keterangan</b><br></label>
							<div class="input-form" style="border: none; ">
								<textarea name="keterangan" style="height: 90px; width:100%; border:3px solid #015D67" readonly><?= $keterangan_psikolog ?></textarea>
							</div>
						</div>
					<?php else : ?>
						<form action="<?= base_url('dashboard/kuisioner_kepribadian'); ?>" method="post">
							<h2 style="color:#015D67">Isi Kuesioner Kepribadian</h2>
							<p>Silahkan isi sesuai dengan kamu</p>
							<div class="input-form">
								<?php foreach ($gejalaPsikolog as $skrining): ?>
									<label for="kuisioner_kepribadian[]"><b></b><br></label>
									<!-- Unique ID for each checkbox, using $index to ensure IDs don't repeat -->
									<input type="checkbox" name="kuisioner_kepribadian[]" id="kuisioner_kepribadian[]" value="<?= $skrining['id'] ?>"> <?= $skrining['nama_gejala'] ?>
									<hr>
								<?php endforeach; ?>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn-outline-primary" style="height: 5vh; margin-top:0cm">Save changes</button>
							</div>
						</form>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php foreach ($pakar as $pakars): ?>
		<!-- modal verifikasi -->
		<div class="modal fade" id="status-verifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Kuesioner Kepribadian</h5>
						<button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<?php
						if ($id_pemeriksaan_psikolog == 2) :
						?>
							<h1 style="color: #015D67;">Hasil Kusesioner Kepribadian</h1>
							<hr style="border-color: #015D67;">
							<div class="edit-pendaftaran-container">
								<p><b>Tingkat Kepercayaan : <?= $kepercayaan_psikolog ?>%</b></p>
								<label for="kode_penyakit"><b class="form-label">Kode Penyakit</b><br></label>
								<div class="input-form" style="border: none;">
									<input type="text" id="kode_penyakit" value="<?= $kode_psikolog ?>" name="kode_penyakit" style="height: 90px; width:100%; border:3px solid #015D67" readonly required>
								</div>
								<label for="nama_penyakit"><b class="form-label">Nama Penyakit</b><br></label>
								<div class="input-form" style="border: none;">
									<input type="text" id="nama_penyakit" value="<?= $nama_sakit_psikolog ?>" name="nama_penyakit" style="height: 90px; width:100%; border:3px solid #015D67" readonly required>
								</div>
								<label for="keterangan"><b class="form-label">Keterangan</b><br></label>
								<div class="input-form" style="border: none; ">
									<textarea name="keterangan" style="height: 90px; width:100%; border:3px solid #015D67" readonly><?= $keterangan_psikolog ?></textarea>
								</div>
							</div>
						<?php else : ?>
							<form action="<?= base_url('dashboard/kuisioner_kepribadian'); ?>" method="post">
								<h2 style="color:#015D67">Isi Kuesioner Kepribadian</h2>
								<p>Silahkan isi sesuai dengan kamu</p>
								<div class="input-form">
									<?php foreach ($gejalaPsikolog as $skrining): ?>
										<label for="kuisioner_kepribadian[]"><b></b><br></label>
										<!-- Unique ID for each checkbox, using $index to ensure IDs don't repeat -->
										<input type="checkbox" name="kuisioner_kepribadian[]" id="kuisioner_kepribadian[]" value="<?= $skrining['id'] ?>"> <?= $skrining['nama_gejala'] ?>
										<hr>
									<?php endforeach; ?>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn-outline-primary" style="height: 5vh; margin-top:0cm">Save changes</button>
								</div>
							</form>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<!-- modal kesehatan -->
		<div class="modal fade" id="status-kesehatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Kuesioner Kepribadian</h5>
						<button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>Nama Faskes: UPT Puskesmas Rambung</p><br>
						<p>Nama Pemeriksa: <?= $pakars['nama_pemeriksa_kesehatan'] ?></p><br>
						<b>Tanda Vital</b>

						<p>Tekanan Darah: <?= !empty($pakars['tekanan_sistolik']) && !empty($pakars['tekanan_diasistolik']) ? $pakars['tekanan_sistolik'] . '/' . $pakars['tekanan_diasistolik'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>

						<p>Nadi: <?= !empty($pakars['nadi']) ? $pakars['nadi'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>

						<p>Nafas: <?= !empty($pakars['nafas']) ? $pakars['nafas'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>

						<p>Suhu: <?= !empty($pakars['suhu']) ? $pakars['suhu'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>

						<br>
						<p>Berat Badan: <?= !empty($pakars['berat_badan']) ? $pakars['berat_badan'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>
						<p>Tinggi: <?= !empty($pakars['tinggi_badan']) ? $pakars['tinggi_badan'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>
						<p>IMT: <?= !empty($pakars['imt']) ? $pakars['imt'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>
						<p>Lila (Lingkar Lengan Atas): <?= !empty($pakars['lila']) ? $pakars['lila'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>
						<p>Status T: <?= !empty($pakars['suntik_tt']) ? $pakars['suntik_tt'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>
						<p>Tanda Anemia: <?= !empty($pakars['tanda_anemia']) ? $pakars['tanda_anemia'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>
						<br>
						<p><strong>Penunjang:</strong></p>
						<p>HB: <?= !empty($pakars['hb']) ? $pakars['hb'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>
						<p>Golongan Darah: <?= !empty($pakars['gol_darah']) ? $pakars['gol_darah'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>

						<br>
						<p><b>Lain-Lain</b></p><br>

						<p>Rapidtest: <?= !empty($pakars['rapid_test']) ? $pakars['rapid_test'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>
						<p>Planotest: <?= !empty($pakars['plano_test']) ? $pakars['plano_test'] : '<span style="color: red;">Data tidak tersedia</span>' ?></p>

						<br>

						<label for="kode_resiko"><b class="form-label">Kode BNN</b><br></label>
						<div class="input-form" style="border: none;">
							<input type="text" id="kode_resiko" value="<?= $pakars['kode_bnn'] ?>" name="kode_resiko" style="height: 90px; width:100%; border:3px solid #015D67" readonly required>
						</div>
						<p><b>Tingkat Kepercayaan : <?= !empty($pakars['kepercayaan_kesehatan']) ? $pakars['kepercayaan_kesehatan'] . '%' : '<span style="color: red;">Data tidak tersedia</span>' ?></b></p>
						<label for="nama_resiko"><b class="form-label">Nama Penyakit</b><br></label>
						<div class="input-form" style="border: none;">
							<input type="text" id="nama_resiko" value="<?= $pakars['nama_sakit_bnn'] ?>" name="nama_resiko" style="height: 90px; width:100%; border:3px solid #015D67" readonly required>
						</div>
						<label for="keterangan"><b class="form-label">Keterangan</b><br></label>
						<div class="input-form" style="border: none; ">
							<textarea name="keterangan" style="height: 90px; width:100%; border:3px solid #015D67" readonly><?= $pakars['keterangan_bnn'] ?></textarea>
						</div>

						<br>

					</div>
				</div>
			</div>
		</div>

		<!-- modal bnn -->
		<div class="modal fade" id="status-bnn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Kuesioner Kepribadian</h5>
						<button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p><b>Nama BNN: <?= !empty($pakars['nama_bnn']) ? $pakars['nama_bnn'] : '<span style="color: red;">Data tidak tersedia</span>' ?></b></p><br>
						<p><b>Nama Pemeriksa: <?= !empty($pakars['nama_pemeriksa_bnn']) ? $pakars['nama_pemeriksa_bnn'] : '<span style="color: red;">Data tidak tersedia</span>' ?></b></p><br>
						<p><b>Hasil Test Narkoba: <?= !empty($pakars['narkoba_test']) ? $pakars['narkoba_test'] : '<span style="color: red;">Data tidak tersedia</span>' ?></b></p><br>
						<p><b>Tingkat Kepercayaan: <?= !empty($pakars['kepercayaan_bnn']) ? $pakars['kepercayaan_bnn'] . '%' : '<span style="color: red;">Data tidak tersedia</span>' ?></b></p><br>


						<label for="kode"><b class="form-label">Kode BNN</b><br></label>
						<div class="input-form" style="border: none;">
							<input type="text" id="kode" value="<?= $pakars['kode_bnn'] ?>" name="kode" style="height: 90px; width:100%; border:3px solid #015D67" readonly required>
						</div>
						<label for="nama_penyakit"><b class="form-label">Nama Penyakit</b><br></label>
						<div class="input-form" style="border: none;">
							<input type="text" id="nama_penyakit" value="<?= $pakars['nama_sakit_bnn'] ?>" name="nama_penyakit" style="height: 90px; width:100%; border:3px solid #015D67" readonly required>
						</div>
						<label for="keterangan"><b class="form-label">Keterangan</b><br></label>
						<div class="input-form" style="border: none; ">
							<textarea name="keterangan" style="height: 90px; width:100%; border:3px solid #015D67" readonly><?= $pakars['keterangan_bnn'] ?></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- modal psikolog -->
		<div class="modal fade" id="status-psikolog" tabindex="-1" aria-labelledby="statusPsikologLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="statusPsikologLabel">Status Psikolog</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">

						<p><b>Tingkat Kepercayaan: <?= $pakars['kepercayaan_psikolog'] ?>%</b></p><br>
						<label for="kode"><b class="form-label">Kode Penyakit</b></label><br>
						<input type="text" id="kode" value="<?= $pakars['kode_psikolog'] ?>" name="kode" readonly required><br>

						<label for="nama_penyakit"><b class="form-label">Nama Penyakit</b></label><br>
						<input type="text" id="nama_penyakit" value="<?= $pakars['nama_sakit_psikolog'] ?>" name="nama_penyakit" readonly required><br>

						<label for="keterangan"><b class="form-label">Keterangan</b></label><br>
						<textarea name="keterangan" style="height: 90px; width: 100%;" readonly><?= $pakars['keterangan_psikolog'] ?></textarea>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach ?>





	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script>
		// Toggle Sidebar
		const toggleSidebar = document.getElementById('toggleSidebar');
		const sidebar = document.getElementById('sidebar');

		toggleSidebar.addEventListener('click', () => {
			sidebar.classList.toggle('hidden');
		});
	</script>
</body>

</html>