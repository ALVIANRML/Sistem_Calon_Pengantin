<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/catin.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/form.css') ?>">
	<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
	<title>Non-Scrollable Layout</title>

</head>

<body style="overflow-y: scroll;">

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
	$provinsi = $this->session->userdata('provinsi');
	$kota = $this->session->userdata('kota');
	$kecamatan = $this->session->userdata('kecamatan');
	$kelurahan = $this->session->userdata('kelurahan');
	$foto_user = $this->session->userdata('foto_user');
	$foto_kk = $this->session->userdata('foto_kk');
	$foto_ktp = $this->session->userdata('foto_ktp');
	$foto_surat = $this->session->userdata('foto_surat');
	$id_status_verifikasi = $this->session->userdata('id_status_verifikasi');
	// var_dump($id_pemeriksaan_survei);exit;
	$id_status_perpanjangan = $this->session->userdata('id_status_perpanjangan');
	$id_status_aktif = $this->session->userdata('id_status_aktif');
	$id_status_kesehatan = $this->session->userdata('id_status_kesehatan');
	$id_status_bnn = $this->session->userdata('id_status_bnn');
	$id_status_psikolog = $this->session->userdata('id_status_psikolog');
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
	if ($fotoProfil == null) {
		$fotoProfil = base_url('assets/img/null_profile.svg');
		// var_dump('2');exit;
	} else {
		$fotoProfil = base_url('uploads/photo/') . $foto_user;
		$this->session->userdata('foto_user');
	}
	// $fotoProfil = ($fotoProfil == null) ? '' : '<td><span class="status-tabel" style="background-color: #DC3545">Belum diverifikasi</span></td>';


	// Memastikan bahwa $tanggal_periksa_catin tidak null sebelum memformat
	if ($tanggal_periksa_catin) {
		// Memformat tanggal menjadi format d/m/Y
		$tanggal_periksa_catin = date('d/m/Y', strtotime($tanggal_periksa_catin));
	}
	?>
	
	<?php
	//matikan komen kalok mau ngetes disable
	// $id_status_verifikasi = 2; $id_status_perpanjangan = 2; $id_status_aktif= 2;
	$disabled = ($id_status_verifikasi == 2 or $id_status_perpanjangan == 2 or $id_status_aktif == 2) ? 'disabled' : '';
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
			<li class="item"><a href="<?= base_url('dashboard/view_catin') ?>"><i class="bx bx-grid-alt"></i>Dashboard</a></li>
			<li class="item" style="background-color: #015D67;"><a href="<?= base_url('dashboard/view_catin_pemeriksaan') ?>" style="color:white"><i class="bx bx-edit"></i>Daftar Pemeriksaan</a></li>
		</ul>
	</div>

	<form action="<?= base_url('dashboard/pemeriksaan') ?>" method="post" enctype="multipart/form-data">
		<div class="form" style="background-color: whitesmoke;">
			<h2 style="color: #015D67;"><i class="bx bx-edit"></i>Form Daftar Calon Pengantin</a></li>
			</h2>
			<!-- baris pertama -->
			<div class="mb-3 row">
				<div class="col-12 col-md-8">
					<label for="nama_lengkap" class="form-label">Nama Lengkap</label>
					<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap Anda" value="<?= $this->session->userdata('nama_lengkap'); ?>"<?= $disabled ?>>
					<?= form_error('nama_lengkap', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
				</div>
				<div class="col-12 col-md-4">
					<label for="nik" class="form-label">NIK</label>
					<input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK Anda" value="<?= $this->session->userdata('nik'); ?>"<?= $disabled ?>>
					<?= form_error('nik', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
				</div>
			</div>

			<!-- baris kedua -->
			<div class="mb-3 row">
				<div class="col-12 col-md-4">
					<label for="tempat_lahir" class="form-label">Tempat Lahir</label>
					<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Isi Tempat Lahir" value="<?= $this->session->userdata('tempat_lahir'); ?>"<?= $disabled ?>>
					<?= form_error('tempat_lahir', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
				</div>
				<div class="col-12 col-md-4">
					<label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
					<div class="input-group">
						<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" onchange="hitungUmur()" placeholder="Isi Tanggal Lahir" value="<?= $this->session->userdata('tanggal_lahir'); ?>"<?= $disabled ?>>
						<?= form_error('tanggal_lahir', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<label for="umur" class="form-label">Umur</label>
					<input type="number" class="form-control" id="umur" name="umur" placeholder="0" readonly value="<?= $this->session->userdata('usia'); ?>"<?= $disabled ?>>
				</div>
			</div>

			<!-- baris ketiga -->
			<div class="mb-3 row">
				<div class="col-12 col-md-4">
					<label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
					<select name="jenis_kelamin" id="jenis_kelamin" class="form-select" <?= $disabled ?> value="<?= $this->session->userdata('jenis_kelamin'); ?>">
						<option value="" disabled selected>Pilih Jenis Kelamin</option>
						<option value="Laki-Laki" <?= ($this->session->userdata('jenis_kelamin') == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-Laki</option>
						<option value="Perempuan" <?= ($this->session->userdata('jenis_kelamin') == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
					</select>
					<?= form_error('jenis_kelamin', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
				</div>
				<div class="col-12 col-md-4">
					<label for="agama" class="form-label">Agama</label>
					<select name="agama" id="agama" class="form-select" <?= $disabled ?> value="<?= $this->session->userdata('agama'); ?>">
						<option value="" disabled selected>Pilih Agama</option>
						<option value="Islam" <?= ($this->session->userdata('agama') == 'Islam') ? 'selected' : ''; ?>>Islam</option>
						<option value="Kristen" <?= ($this->session->userdata('agama') == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
						<option value="Katolik" <?= ($this->session->userdata('agama') == 'Katolik') ? 'selected' : ''; ?>>Katolik</option>
						<option value="Buddha" <?= ($this->session->userdata('agama') == 'Buddha') ? 'selected' : ''; ?>>Buddha</option>
						<option value="Hindu" <?= ($this->session->userdata('agama') == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
						<option value="Khonghucu" <?= ($this->session->userdata('agama') == 'Khonghucu') ? 'selected' : ''; ?>>Khonghucu</option>
					</select>
					<?= form_error('agama', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
				</div>
				<div class="col-12 col-md-4">
					<label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
					<select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-select" <?= $disabled ?> value="<?= $this->session->userdata('pendidikan_terakhir'); ?>">
						<option value="" disabled selected>Pilih Pendidikan Terakhir</option>
						<option value="PAUD" <?= ($this->session->userdata('pendidikan_terakhir') == 'PAUD') ? 'selected' : ''; ?>>PAUD</option>
						<option value="SD" <?= ($this->session->userdata('pendidikan_terakhir') == 'SD') ? 'selected' : ''; ?>>SD</option>
						<option value="SMP" <?= ($this->session->userdata('pendidikan_terakhir') == 'SMP') ? 'selected' : ''; ?>>SMP</option>
						<option value="SMA/SMK" <?= ($this->session->userdata('pendidikan_terakhir') == 'SMA/SMK') ? 'selected' : ''; ?>>SMA/SMK</option>
						<option value="S1" <?= ($this->session->userdata('pendidikan_terakhir') == 'S1') ? 'selected' : ''; ?>>S1</option>
						<option value="S2" <?= ($this->session->userdata('pendidikan_terakhir') == 'S2') ? 'selected' : ''; ?>>S2</option>
						<option value="S3" <?= ($this->session->userdata('pendidikan_terakhir') == 'S3') ? 'selected' : ''; ?>>S3</option>
						<option value="D1" <?= ($this->session->userdata('pendidikan_terakhir') == 'D1') ? 'selected' : ''; ?>>D1</option>
						<option value="D2" <?= ($this->session->userdata('pendidikan_terakhir') == 'D2') ? 'selected' : ''; ?>>D2</option>
						<option value="D3" <?= ($this->session->userdata('pendidikan_terakhir') == 'D3') ? 'selected' : ''; ?>>D3</option>
						<option value="Tidak menempuh pendidikan formal" <?= ($this->session->userdata('pendidikan') == 'Tidak menempuh pendidikan formal') ? 'selected' : ''; ?>>Tidak menempuh pendidikan formal</option>
					</select>
					<?= form_error('pendidikan_terakhir', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
				</div>
			</div>

			<!-- baris Keempat -->
			<div class="mb-3 row">
				<div class="col-12 col-md-8">
					<label for="pekerjaan" class="form-label">Pekerjaan</label>
					<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Isi Pekerjaan" value="<?= $this->session->userdata('pekerjaan'); ?>"<?= $disabled ?>>
					<?= form_error('pekerjaan', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
				</div>
				<div class="col-12 col-md-4">
					<label for="nomor_telepon" class="form-label">No. Hp</label>
					<input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Isi Nomor HP Aktif" value="<?= $this->session->userdata('nomor_telepon'); ?>"<?= $disabled ?>>
					<?= form_error('nomor_telepon', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
				</div>
			</div>
			<br>
			<h2 style="color: #015D67;">Alamat</h2>

			<div class="row">
				<!-- Form Group untuk Provinsi -->
				<div class="col-12 col-md-6 mb-3">
					<label for="provinsi" class="form-label">Provinsi</label>
					<select name="provinsi" id="provinsi" class="form-select" <?= $disabled ?>>
						<?php if ($provinsi == null) : ?>
							<!-- <option value="" disabled selected>Pilih Provinsi</option> -->
						<?php elseif ($provinsi == $this->session->userdata('provinsi')) : ?>
							<option value="<?= $this->session->userdata('provinsi'); ?>" disabled selected> <?= $this->session->userdata('provinsi'); ?> </option>
						<?php else : ?>
							<option value="<?= $provinsi ?>" disabled selected><?= $provinsi ?></option>
						<?php endif ?>
					</select>
					<?= form_error('provinsi', '<small class="text-danger">', '</small>'); ?>
				</div>

				<!-- Form Group untuk Kota -->
				<div class="col-12 col-md-6 mb-3">
					<label for="kota" class="form-label">Kota</label>
					<select name="kota" id="kota" class="form-select" <?= $disabled ?>>
						<?php if ($kota == null) : ?>
							<option value="" disabled selected>Pilih Kota</option>
						<?php elseif ($kota == $this->session->userdata('kota')) : ?>
							<option value="<?= $this->session->userdata('kota'); ?>" disabled selected> <?= $this->session->userdata('kota'); ?> </option>
						<?php else : ?>
							<option value="<?= $kota ?>" disabled selected><?= $kota ?></option>
						<?php endif ?>
					</select>
					<?= form_error('kota', '<small class="text-danger">', '</small>'); ?>
				</div>

				<!-- Form Group untuk Kecamatan -->
				<div class="col-12 col-md-6 mb-3">
					<label for="kecamatan" class="form-label">Kecamatan</label>
					<select name="kecamatan" id="kecamatan" class="form-select" <?= $disabled ?>>
						<?php if ($kecamatan == null) : ?>
							<option value="" disabled selected>Pilih Kecamatan</option>
						<?php elseif ($kecamatan == $this->session->userdata('kecamatan')) : ?>
							<option value="<?= $this->session->userdata('kecamatan'); ?>" disabled selected> <?= $this->session->userdata('kecamatan'); ?> </option>
						<?php else : ?>
							<option value="<?= $kecamatan ?>" disabled selected><?= $kecamatan ?></option>
						<?php endif ?>
					</select>
					<?= form_error('kecamatan', '<small class="text-danger">', '</small>'); ?>
				</div>

				<!-- Form Group untuk Kelurahan -->
				<div class="col-12 col-md-6 mb-3">
					<label for="kelurahan" class="form-label">Kelurahan</label>
					<select name="kelurahan" id="kelurahan" class="form-select" <?= $disabled ?>>
						<?php if ($kelurahan == null) : ?>
							<option value="" disabled selected>Pilih Kelurahan</option>
						<?php elseif ($kelurahan == $this->session->userdata('kelurahan')) : ?>
							<option value="<?= $this->session->userdata('kelurahan'); ?>" disabled selected> <?= $this->session->userdata('kelurahan'); ?> </option>
						<?php else : ?>
							<option value="<?= $kelurahan ?>" disabled selected><?= $kelurahan ?></option>
						<?php endif ?>
					</select>
					<?= form_error('kelurahan', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="mb-3">
					<label for="alamat" class="form-label">Alamat</label>
					<textarea class="form-control" id="alamat" name="alamat" <?= $disabled ?> rows="3"><?= $this->session->userdata('alamat'); ?></textarea>
					<?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
				</div>
			</div>

			<h2 style="color: #015D67;">Dokumen</h2>

			<div class="mb-3 row">
				<div class="col-12 col-md-4">
					<label for="penikahan_ke" class="form-label">Pernikahan Ke</label>
					<input type="number" id="pernikahan_ke" class="form-control" name="pernikahan_ke" placeholder="" min="1" value="<?= $this->session->userdata('pernikahan_ke'); ?>" <?= $disabled ?>>
					<?= form_error('pernikahan_ke', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="col-12 col-md-4">
					<label for="tanggal_pernikahan" class="form-label">Tanggal Pernikahan</label>
					<div class="input-group">
						<input type="date" class="form-control" id="tanggal_pernikahan" name="tanggal_pernikahan" placeholder="Pilih Tanggal Pernikahan" value="<?= $this->session->userdata('tanggal_pernikahan'); ?>" <?= $disabled ?>>
						<?= form_error('tanggal_pernikahan', '<small class="text-danger">', '</small>'); ?>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<?php
					//foreach($tglPeriksa as $i)
					//:
					//$tanggal_periksa = $i['tanggal']; 

					$tanggal_periksa = $this->session->userdata('tgl_periksa');
					// var_dump($tanggal_periksa);exit
					?>
					<label for="tanggal_periksa" class="form-label">Tanggal Periksa</label>
					<div class="input-group">
						<input type="text" id="tanggal_periksa" name="tanggal_periksa" placeholder="Isi Tanggal Periksa" class="form-control" value="<?= $tanggal_periksa_catin ?? $tanggal_periksa ?>" readonly <?= $disabled ?>>
					</div>
				</div>

				<div class="container mt-5">
					<div class="row">
						<!-- Pas Foto -->
						<div class="col-md-6">
							<p>Pas Foto</p>
							<div class="upload-box" onclick="document.getElementById('fileInput1').click();">
								<img
									id="previewImage1"
									src="<?= isset($fotoUser) ? base_url('uploads/photo/' . $fotoUser) : 'placeholder.png'; ?>"
									alt="Preview Image"
									style="display: block;">
								<p>Unggah Pas Foto Disini Ukuran 4X3</p>
								<p class="text-muted">Format PNG/JPG/JPEG (Max 2MB)</p>
							</div>
							<input
								type="file"
								id="fileInput1"
								accept="image/png, image/jpeg"
								name="foto_user"
								style="display: none;"
								onchange="showPreview(event, 'previewImage1');" <?= $disabled ?>>
						</div>

						<!-- Foto KTP -->
						<div class="col-md-6">
							<p>Foto KTP</p>
							<div class="upload-box" onclick="document.getElementById('fileInput2').click();">
								<img
									id="previewImage2"
									src="<?= isset($foto_ktp) ? base_url('uploads/photo/' . $foto_ktp) : 'placeholder.png'; ?>"
									alt="Preview Image"
									style="display: block;">
								<p>Unggah Foto KTP</p>
								<p class="text-muted">Format PNG/JPG/JPEG (Max 2MB)</p>
							</div>
							<input type="file" id="fileInput2" accept="image/png, image/jpeg" name="foto_ktp" style="display: none;" onchange="showPreview(event, 'previewImage2');"<?= $disabled ?>>
						</div>
					</div>
				</div>

				<div class="container mt-5">
					<div class="row">
						<!-- Foto Kartu Keluarga -->
						<div class="col-md-6">
							<p>Foto Kartu Keluarga</p>
							<div class="upload-box" onclick="document.getElementById('fileInput3').click();">
								<img id="previewImage3"
									src="<?= isset($foto_kk) ? base_url('uploads/photo/' . $foto_kk) : 'placeholder.png'; ?>"
									alt="Preview Image"
									style="display: block;">
								<p>Unggah Foto Kartu Keluarga</p>
								<p class="text-muted">Format PNG/JPG/JPEG (Max 2MB)</p>
							</div>
							<input type="file" id="fileInput3" accept="image/png, image/jpeg" name="foto_kk" style="display: none;" onchange="showPreview(event, 'previewImage3');"<?= $disabled ?>>
						</div>

						<!-- Foto Surat -->
						<div class="col-md-6">
							<p>Foto Surat</p>
							<div class="upload-box" onclick="document.getElementById('fileInput4').click();">
								<img id="previewImage4"
									src="<?= isset($foto_surat) ? base_url('uploads/photo/' . $foto_surat) : 'placeholder.png'; ?>"
									alt="Preview Image"
									style="display: block;">
								<p>Unggah Foto Surat Pengantar</p>
								<p class="text-muted">Format PNG/JPG/JPEG (Max 2MB)</p>
							</div>
							<input type="file" id="fileInput4" accept="image/png, image/jpeg" name="foto_surat" style="display: none;" onchange="showPreview(event, 'previewImage4');"<?= $disabled ?>>
						</div>
					</div>
				</div>

			</div>
			<hr>
			<div class="text-end">
				<button type="submit" style="background-color: #015D67;" class="btn btn-primary"<?= $disabled ?>>Submit</button>
			</div>
		</div>
	</form>



	<script>
		function showPreview(event, previewId) {
			const file = event.target.files[0];

			if (file) {
				// Validasi Ukuran File (maksimal 2MB)
				if (file.size > 8 * 1024 * 1024) {
					alert("File size exceeds 2MB. Please upload a smaller file.");
					event.target.value = ""; // Reset input file
					return;
				}

				// Validasi Tipe File (PNG, JPG, JPEG)
				const validTypes = ["image/png", "image/jpeg"];
				if (!validTypes.includes(file.type)) {
					alert("Invalid file format. Please upload a PNG, JPG, or JPEG file.");
					event.target.value = ""; // Reset input file
					return;
				}

				const reader = new FileReader();
				reader.onload = function(e) {
					const previewImage = document.getElementById(previewId);
					previewImage.src = e.target.result;
					previewImage.style.display = "block"; // Pastikan gambar terlihat
				};
				reader.readAsDataURL(file);
			} else {
				// Reset ke placeholder jika tidak ada file
				const previewImage = document.getElementById(previewId);
				previewImage.src = "placeholder.png";
				previewImage.style.display = "block";
			}
		}
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


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script>
		// Toggle Sidebar
		const toggleSidebar = document.getElementById('toggleSidebar');
		const sidebar = document.getElementById('sidebar');

		toggleSidebar.addEventListener('click', () => {
			sidebar.classList.toggle('hidden');
		});
	</script>

	<script>
		function hitungUmur() {
			const tanggalLahir = document.getElementById('tanggal_lahir').value;
			const umurInput = document.getElementById('umur');

			// Pastikan tanggal lahir terisi dan valid
			if (tanggalLahir) {
				// Mengonversi tanggal lahir ke dalam objek Date
				const tanggalLahirDate = new Date(tanggalLahir);

				// Cek apakah tanggal lahir valid
				if (isNaN(tanggalLahirDate)) {
					umurInput.value = '';
					return;
				}

				const today = new Date();

				// Menghitung umur berdasarkan tahun
				let umur = today.getFullYear() - tanggalLahirDate.getFullYear();
				const bulan = today.getMonth() - tanggalLahirDate.getMonth();

				// Menyesuaikan umur jika belum ulang tahun di tahun ini
				if (bulan < 0 || (bulan === 0 && today.getDate() < tanggalLahirDate.getDate())) {
					umur--;
				}

				// Menampilkan hasil umur pada input
				umurInput.value = umur;
			} else {
				// Jika tanggal tidak diisi, set umur ke kosong
				umurInput.value = '';
			}
		}
	</script>

	<script>
		function loadData(apiUrl, defaultOption, selectId, selectedValue = null) {
			fetch(apiUrl)
				.then(response => response.json())
				.then(data => {
					let options = `<option>${defaultOption}</option>`;
					if (selectedValue) {
						options = `<option>${selectedValue}</option>`;
					}
					data.forEach(element => {
						options += `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`;
					});
					document.getElementById(selectId).innerHTML = options;
				})
				.catch(error => console.error('Error:', error));
		}

		// Memuat daftar provinsi
		loadData(
			'https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json',
			'Pilih Provinsi',
			'provinsi',
			"<?= $provinsi ?? null ?>"
		);

		// Event listener untuk pemilihan provinsi
		document.getElementById('provinsi').addEventListener('change', (e) => {
			const provinsiId = e.target.options[e.target.selectedIndex].dataset.reg;
			loadData(
				`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsiId}.json`,
				'Pilih Kota',
				'kota',
				"<?= $kota ?? null ?>"
			);
		});

		// Event listener untuk pemilihan kota
		document.getElementById('kota').addEventListener('change', (e) => {
			const kotaId = e.target.options[e.target.selectedIndex].dataset.reg;
			loadData(
				`https://kanglerian.github.io/api-wilayah-indonesia/api/districts/${kotaId}.json`,
				'Pilih Kecamatan',
				'kecamatan',
				"<?= $kecamatan ?? null ?>"
			);
		});

		// Event listener untuk pemilihan kecamatan
		document.getElementById('kecamatan').addEventListener('change', (e) => {
			const kecamatanId = e.target.options[e.target.selectedIndex].dataset.reg;
			loadData(
				`https://kanglerian.github.io/api-wilayah-indonesia/api/villages/${kecamatanId}.json`,
				'Pilih Kelurahan',
				'kelurahan',
				"<?= $kelurahan ?? null ?>"
			);
		});
	</script>
</body>

</html>