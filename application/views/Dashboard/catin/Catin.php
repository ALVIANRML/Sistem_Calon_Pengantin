<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/catin.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/catin2.css">
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/percatin_log.png" />
	<title>D_catin</title>
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
		$fotoProfil = base_url('assets/img/profilNull.svg');
	} else {
		$fotoProfil = base_url('uploads/photo/');
		$this->session->userdata('foto_user');
	}
	$fotoProfil = ($fotoProfil == null) ? '' : '<td><span class="status-tabel" style="background-color: #DC3545">Belum diverifikasi</span></td>';


	// Memastikan bahwa $tanggal_periksa_catin tidak null sebelum memformat
	if ($tanggal_periksa_catin) {
		// Memformat tanggal menjadi format d/m/Y
		$tanggal_periksa_catin = date('d/m/Y', strtotime($tanggal_periksa_catin));
	}
	?>

	<div class="container_admin">

		<!--Header-->
		<div class="header-container">
			<div class="logo-container">
				<img class="logo" src="<?= base_url('assets/') ?>img/percantin.png" alt="Logo">
				<span class="logo-text"><b style="font-family: 'Nunito Sans', sans-serif;">PERCATIN</b></span>
			</div>
			<nav class="navbar">
				<ul>
					<div class="navbar_profil" style="width: 15vw; margin-right:0px">
						<img src="<?= base_url('uploads/photo/'); ?><?= $this->session->userdata('foto_user'); ?>" alt="Profile Image" class="profile-img">
						<div class="profile-text">
							<span>Halo,</span><br> <!-- Menambahkan break line -->
							<span><b style="color:black; font-family: 'Nunito Sans', sans-serif;">
									<?= $this->session->userdata('username'); ?>
								</b></span>
							<div class="dropdown" style="display: inline-block; vertical-align: middle;">
								<button style="border: 1px; background-color:white; margin-right:5vh; width:2px;">
									<img src="<?= base_url('assets/') ?>/img/dropdown.png" alt="Profile Image" style="width: 10px; height: 10px; margin-left: 0px;" class="dropdown-button">
								</button>
								<div class="dropdown-content">
									<a href="<?= base_url('auth/ganti_password') ?>" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Ganti Password</a>
									<a href="<?= base_url('auth/login') ?>" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Keluar</a>
								</div>
							</div>
						</div>
					</div>


				</ul>
			</nav>
		</div>
		<!--End Header-->

		<!--Navbar-->
		<div class="main-content">
			<div class="navigasi_admin">
				<h6 style="color: gray; margin: 0; font-size:10px;">NAVIGASI</h6>
				<div class="navigasi_admin_menu">
					<div class="isi" style="background-color: #015D67;">
						<img src="<?= base_url('assets/') ?>/img/dashboard_catin.svg" alt="Profile Image" class="icon-navigation">
						<div class="profile-text" style="color:white;">
							<span style="color:white">Dashboard</span>
						</div>
					</div>
					<a href="<?= base_url('dashboard/view_catin_pemeriksaan') ?> " style="text-decoration: none;">
						<div class="isi" style="background-color: white;">
							<img src="<?= base_url('assets/') ?>/img/dp_catin.svg" alt="Profile Image" class="icon-navigation">
							<div class="profile-text">
								<span>Daftar Pemeriksaan</span>
							</div>
						</div>
					</a>
				</div>
			</div>
			<!--End Navbar-->

			<!--Information Dashboard-->
			<div class="inti">
				<h1 style=" font-size: large;">DASHBOARD</h1>
				<div class="informasi">
					<div class="profil">
						<div class="img-profil">
							<img src="<?= base_url('uploads/photo/'); ?><?= $this->session->userdata('foto_user') ?>" class="catin-image">
						</div>
						<p style="text-align: center; margin: 0;"><b><?= $nama  ?></b></p>
						<div class="biodata" style="font-size: 12.5px;">
							<div class="label">No</div>
							<?php if ($nomor == null) : ?>
								<div class="isi-label">: Lakukan daftar pemeriksaan terlebih dahulu</div>
							<?php else : ?>
								<div class="isi-label">: <?= $nomor_pendaftaran ?></div>
							<?php endif ?>

							<div class="label">NIK</div>
							<?php if ($nik == null) : ?>
								<div class="isi-label">: Lakukan daftar pemeriksaan terlebih dahulu</div>
							<?php else : ?>
								<div class="isi-label">: <?= $this->session->userdata('nik') ?></div>
							<?php endif ?>

							<div class="label">TTL</div>
							<?php if ($tanggalLahir == null && $tempatLahir == null) : ?>
								<div class="isi-label">: Lakukan daftar pemeriksaan terlebih dahulu</div>
							<?php else : ?>
								<div class="isi-label">: <?= $tempatLahir ?>, <?= date('d / m / Y', strtotime($this->session->userdata('tanggal_lahir'))) ?></div>
							<?php endif ?>

							<div class="label">Usia</div>
							<?php if ($usia == null) : ?>
								<div class="isi-label">: Lakukan daftar pemeriksaan terlebih dahulu</div>
							<?php else : ?>
								<div class="isi-label">: <?= $usia ?> Tahun</div>
							<?php endif ?>

							<div class="label">Gender</div>
							<?php if ($jenisKelamin == null) : ?>
								<div class="isi-label">: Lakukan daftar pemeriksaan terlebih dahulu</div>
							<?php else : ?>
								<div class="isi-label">: <?= $jenisKelamin ?></div>
							<?php endif ?>
						</div>
					</div>
					<!-- 1 -->
					<div class="status">
						<h5 style=" margin:10px;margin-bottom:20px; cursor:pointer;">Skrining Kesehatan</h5>

						<?php if ($id_pemeriksaan_survei == 2) { ?>
							<div class="isi-status" onclick="showPopup()" style="border: 1px solid  #015D67;font-weight:bold;">
								<span>Hasil Skrining Kesehatan</span>
							</div>
							<div class="status-container">
								<p>Status:</p>
								<span style="margin-right: 1vh;">Sudah</span>
								<img src="<?= base_url('assets') ?>/img/sudah.svg" alt="" style="margin-top:0px;margin-right:1vh">
							</div>
						<?php } else { ?>
							<div class="isi-status" onclick="showPopup()" style="border: 1px solid  #015D67;font-weight:bold; cursor:pointer;">
								<span>Isi Skrining Kesehatan</span>
							</div>
							<div class="status-container">
								<p>Status:</p>
								<span style="margin-right: 1vh;">Belum</span>
								<img src="<?= base_url('assets') ?>/img/belum.svg" alt="" style="margin-top:0px;margin-right:1vh">
							</div>
						<?php }  ?>

						<!--Pop Up Isi Skrining Kesehatan-->
						<div class="overlay" id="overlay">
						</div>
						<div class="popup" id="popup">
							<span class="close-btn" onclick="closePopup()">&times;</span>
							<?php if ($id_pemeriksaan_survei == 2): ?>
								<h1>Hasil Skrining Kesehatan</h1>
									<hr style="border-color: #015D67;">
									<div class="edit-pendaftaran-container">
										<p><b>Tingkat Kepercayaan : <?= $kepercayaan_catin ?>%</b></p>
										<label for="kode_penyakit"><b class="form-label">Kode Penyakit</b><br></label>
										<div class="input-form" style="border: none;">
											<input type="text" id="kode_penyakit" value="<?= $kode_catin ?>" class="tambah-data" name="kode_penyakit" readonly required>
										</div>
										<label for="nama_penyakit"><b class="form-label">Nama Penyakit</b><br></label>
										<div class="input-form" style="border: none;">
											<input type="text" id="nama_penyakit" value="<?= $nama_sakit_catin ?>" class="tambah-data" name="nama_penyakit" readonly required>
										</div>
										<label for="keterangan"><b class="form-label">Keterangan</b><br></label>
										<div class="input-form" style="border: none;">
											<textarea name="keterangan" class="tambah-data" style="height: 90px; width: 700px;" readonly><?= $keterangan_catin ?></textarea>
										</div>
									</div>
							<?php else: ?>
								<h2 style="color:#015D67">Isi Skrining Kesehatan</h2>
								<form id="popupForm" action="<?= base_url('dashboard/skrining_kesehatan'); ?>" method="post">
									<p>Silahkan isi sesuai dengan kamu</p>
									<div class="input-form">
										<?php foreach ($gejalaCatin as $skrining): ?>
											<label for="skrining_kesehatan[]"><b></b><br></label>
											<!-- Unique ID for each checkbox, using $index to ensure IDs don't repeat -->
											<input type="checkbox" style="color:#015D67" " name="skrining_kesehatan[]" id="skrining_kesehatan[]" value="<?= $skrining['id'] ?>"> <?= $skrining['nama_gejala'] ?>
											<hr>
										<?php endforeach; ?>
										<button type="submit">Submit</button>
									</div>
								</form>
							<?php endif; ?>
						</div>
					</div>
					<!--Akhir Pop Up Isi Skrining Kesehatan-->


					<!-- 2 -->
					<div class="status">
						<h5 style=" margin:10px; margin-bottom:20px; cursor:pointer;">Kuesioner Kepribadian</h5>
						<?php if ($id_pemeriksaan_psikolog == 2) { ?>
							<div class="isi-status" onclick="showPopup1()" style="border: 1px solid  #015D67; font-weight:bold;">
								<span style>Hasil Kuesioner Kepribadian</span>
							</div>
							<div class="status-container">
								<p>Status:</p>
								<span style="margin-right: 1vh;">Sudah</span>
								<img src="<?= base_url('assets') ?>/img/sudah.svg" alt="" style="margin-top:0px;margin-right:1vh">
							</div>
						<?php } else { ?>
							<div class="isi-status" onclick="showPopup1()" style="border: 1px solid  #015D67; font-weight:bold; cursor:pointer;">
								<span>Isi Kuesioner Kepribadian</span>
							</div>
							<div class="status-container">
								<p>Status:</p>
								<span style="margin-right: 1vh;">Belum</span>
								<img src="<?= base_url('assets') ?>/img/belum.svg" alt="" style="margin-top:0px;margin-right:1vh">
							</div>
						<?php }  ?>

						<!--Pop Up Isi Kuesionoer Psikologi-->
						<div class="overlay" id="overlay1"></div>
						<div class="popup" id="popup1">
							<span class="close-btn" onclick="closePopup1()">&times;</span>
							<?php
							if ($id_pemeriksaan_psikolog == 2) :
							?>
								<h1>Hasil Kusesioner Kepribadian</h1>
									<hr style="border-color: #015D67;">
									<div class="edit-pendaftaran-container">
										<p><b>Tingkat Kepercayaan : <?= $kepercayaan_psikolog ?>%</b></p>
										<label for="kode_penyakit"><b class="form-label">Kode Penyakit</b><br></label>
										<div class="input-form" style="border: none;">
											<input type="text" id="kode_penyakit" value="<?= $kode_psikolog ?>" class="tambah-data" name="kode_penyakit" readonly required>
										</div>
										<label for="nama_penyakit"><b class="form-label">Nama Penyakit</b><br></label>
										<div class="input-form" style="border: none;">
											<input type="text" id="nama_penyakit" value="<?= $nama_sakit_psikolog ?>" class="tambah-data" name="nama_penyakit" readonly required>
										</div>
										<label for="keterangan"><b class="form-label">Keterangan</b><br></label>
										<div class="input-form" style="border: none;">
											<textarea name="keterangan" class="tambah-data" style="height: 90px; width: 700px;" readonly><?= $keterangan_psikolog ?></textarea>
										</div>
									</div>
							<?php else : ?>
								<form id="popupForm" action="<?= base_url('dashboard/kuisioner_kepribadian'); ?>" method="post">
									<p>Silahkan isi sesuai dengan kamu</p>
									<div class="input-form">
										<?php foreach ($gejalaPsikolog as $skrining): ?>
											<label for="kuisioner_kepribadian[]"><b></b><br></label>
											<!-- Unique ID for each checkbox, using $index to ensure IDs don't repeat -->
											<input type="checkbox"  name="kuisioner_kepribadian[]" id="kuisioner_kepribadian[]" value="<?= $skrining['id'] ?>"> <?= $skrining['nama_gejala'] ?>
											<hr>
										<?php endforeach; ?>
										<button type="submit">Submit</button>
									</div>
								</form>
							<?php endif ?>
						</div>
					</div>

					<!--Akhir Pop Up Isi Kuesionoer Psikologi-->

					<!-- 3 -->
					<div class="status">
						<h5 style=" margin:10px; margin-bottom:20px;">Status Verifikasi</h5>

						<?php if ($id_status_verifikasi == 2) { ?>
							<div class="isi-status" onclick="verifikasi()" style="background-color: white; border: 1px solid  #015D67;color:#015D67; font-weight:bold;">
								<span>Sudah Diverifikasi <img src="<?= base_url('assets') ?>/img/sudah.svg" alt="" style="margin-top:1px"></span>
							</div>
						<?php } else { ?>
							<div class="isi-status" style="background-color: white; border: 1px solid  #015D67;color:#015D67; font-weight:bold;">
								<span>Belum Diverifikasi <img src="<?= base_url('assets') ?>/img/belum.svg" alt="" style="margin-top:1px"></span>
							</div>
						<?php }  ?>
						<div class="status-container" style="position: relative;">
							<p style="position: absolute; left: 0;">Tanggal Periksa:</p>
							<span style="margin-left: 150px;"><b><?= $tanggal_periksa_catin ?></b></span>
						</div>
						<div class="overlay" id="overlayVerifikasi"></div>
						<div class="popup" id="verifikasi">
							<span class="close-btn" onclick="closeverifikasi()">&times;</span>
							<h2>Status verifikasi</h2>
							<h1>Status anda sudah di verifikasi</h1>
						</div>
					</div>
					<!-- 4 -->
					<div class="status">
						<h5 style=" margin:10px; margin-bottom:20px;">Status Kesehatan</h5>

						<?php if ($id_status_kesehatan == 2) { ?>
							<div class="isi-status" onclick="kesehatan()" style="background-color: white; border: 1px solid  #015D67;color:#015D67; font-weight:bold;">
								<span>Sudah Disetujui <img src="<?= base_url('assets') ?>/img/sudah.svg" alt="" style="margin-top:1.5px"></span>
							</div>
						<?php } else { ?>
							<div class="isi-status" style="background-color: white; border: 1px solid  #015D67;color:#015D67; font-weight:bold;">
								<span>Belum Disetujui <img src="<?= base_url('assets') ?>/img/belum.svg" alt="" style="margin-top:1.5px"></span>
							</div>
						<?php }  ?>

						<div class="status-container">
							<p>Harap menunggu s/d:</p>
							<span style="margin-left: 0px;"><b><?= $tanggal_periksa_catin ?></b></span>

						</div>
						<div class="overlay" id="overlayKesehatan"></div>
						<div class="popup" id="kesehatan">
							<span class="close-btn" onclick="closekesehatan()">&times;</span>
							<h2>Status kesehatan</h2>
							<h1>Status kesehatan anda sudah di verifikasi</h1>
						</div>
					</div>
					<!-- 5 -->
					<div class="status">
						<h5 style=" margin:10px; margin-bottom:20px;">Status BNN</h5>
						<?php if ($id_status_bnn == 2) { ?>
							<div class="isi-status" onclick="bnn()" style="background-color: white; border: 1px solid  #015D67;color:#015D67; font-weight:bold;">
								<span>Sudah Disetujui <img src="<?= base_url('assets') ?>/img/sudah.svg" alt="" style="margin-top:1.5px"></span>
							</div>
						<?php } else { ?>
							<div class="isi-status" style="background-color: white; border: 1px solid  #015D67;color:#015D67; font-weight:bold;">
								<span>Belum Disetujui <img src="<?= base_url('assets') ?>/img/belum.svg" alt="" style="margin-top:1.5px"></span>
							</div>
						<?php }  ?>

						<div class="status-container">
							<p>Harap menunggu s/d:</p>
							<span style="margin-left: 0px;"><b><?= $tanggal_periksa_catin ?></b></span>
						</div>
						<div class="overlay" id="overlaybnn"></div>
						<div class="popup" id="bnn">
							<span class="close-btn" onclick="closebnn()">&times;</span>
							<h2>Status bnn</h2>
							<h1>Status anda sudah di verifikasi</h1>
						</div>
					</div>
					<!-- 6 -->
					<div class="status">
						<h5 style=" margin:10px; margin-bottom:20px;" margin-bottom:20px;>Status Psikolog</h5>
						<?php if ($id_status_psikolog == 2) { ?>
							<div class="isi-status" onclick="psikolog()" style="background-color: white; border: 1px solid  #015D67;color:#015D67; font-weight:bold;">
								<span>Sudah Disetujui <img src="<?= base_url('assets') ?>/img/sudah.svg" alt="" style="margin-top:1.5px"></span>
							</div>
						<?php } else { ?>
							<div class="isi-status" style="background-color: white; border: 1px solid  #015D67;color:#015D67; font-weight:bold;">
								<span>Belum Disetujui <img src="<?= base_url('assets') ?>/img/belum.svg" alt="" style="margin-top:1.5px"></span>
							</div>
						<?php }  ?>

						<div class="status-container">
							<p>Harap menunggu s/d:</p>
							<span style="margin-left: 0px;"><b><?= $tanggal_periksa_catin ?></b></span>
						</div>
						<div class="overlay" id="overlaypsikolog"></div>
						<div class="popup" id="psikolog">
							<span class="close-btn" onclick="closepsikolog()">&times;</span>
							<h2>Status psikolog</h2>
							<h1>Status anda sudah di psikolog</h1>
						</div>
					</div>
				</div>
			</div>
			<!--End Information Dashboard-->
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

		function showPopup1() {
			document.getElementById('popup1').classList.add('show');
			document.getElementById('overlay1').classList.add('show');
		}

		function closePopup1() {
			document.getElementById('popup1').classList.remove('show');
			document.getElementById('overlay1').classList.remove('show');
		}

		function verifikasi() {
			document.getElementById('verifikasi').classList.add('show');
			document.getElementById('overlayVerifikasi').classList.add('show');
		}

		function closeverifikasi() {
			document.getElementById('verifikasi').classList.remove('show');
			document.getElementById('overlayVerifikasi').classList.remove('show');
		}

		function kesehatan() {
			document.getElementById('kesehatan').classList.add('show');
			document.getElementById('overlayKesehatan').classList.add('show');
		}

		function closekesehatan() {
			document.getElementById('kesehatan').classList.remove('show');
			document.getElementById('overlayKesehatan').classList.remove('show');
		}

		function bnn() {
			document.getElementById('bnn').classList.add('show');
			document.getElementById('overlaybnn').classList.add('show');
		}

		function closebnn() {
			document.getElementById('bnn').classList.remove('show');
			document.getElementById('overlaybnn').classList.remove('show');
		}

		function psikolog() {
			document.getElementById('psikolog').classList.add('show');
			document.getElementById('overlaypsikolog').classList.add('show');
		}

		function closepsikolog() {
			document.getElementById('psikolog').classList.remove('show');
			document.getElementById('overlaypsikolog').classList.remove('show');
		}
	</script>
</body>

</html>
