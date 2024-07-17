<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/catin.css">
	<title>D_catin</title>
</head>

<body>
	<div class="container_admin">
		<div class="header-container">
			<div class="logo-container">
				<img class="logo" src="<?= base_url('assets/') ?>img/logo.png" alt="Logo">
				<span class="logo-text"><b>PERCATIN</b></span>
			</div>
			<nav class="navbar">
				<ul>
					<div class="navbar_profil">
						<img src="<?= base_url('assets/') ?>/img/tugu-13-desember-t-tinggi3.jpg" alt="Profile Image" class="profile-img">
						<div class="profile-text">
							<span>Halo,</span>
							<span><b><?= $this->session->userdata('nama_lengkap')?></b> <img src="<?= base_url('assets/') ?>/img/dropdown.png" alt="Profile Image" style="width: 10px; height: 10px; margin-left: 50px;"></span>
						</div>
					</div>
				</ul>
			</nav>
		</div>
		<div class="main-content">
			<div class="navigasi_admin">
				<h6 style="color: gray; margin: 0; font-size:10px;">NAVIGASI</h6>
				<div class="navigasi_admin_menu">
					<div class="isi" style="background-color: #015D67;">
						<img src="<?= base_url('assets/') ?>/img/dashboard.png" alt="Profile Image" class="icon-navigation">
						<div class="profile-text" style="color:white;">
							<span style="color:white">Dashboard</span>
						</div>
					</div>
					<a href="<?= base_url('dashboard/view_catin_pemeriksaan') ?>">
						<div class="isi" style="background-color: white;">
							<img src="<?= base_url('assets/') ?>/img/Vector.png" alt="Profile Image" class="icon-navigation">
							<div class="profile-text">
								<span>Daftar Pemeriksaan</span>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="inti"style="height: 100%;">
				<h1 style="font-size: large;">DASHBOARD</h1>
				<div class="informasi">
					<div class="profil">
						<div class="img-profil">
							<img src="<?= base_url('assets/') ?>/img/tugu-13-desember-t-tinggi3.jpg" alt="Profile Image" style="height: 17.5vh; width: 10vw; border-radius: 50%;">
						</div>
						<p style="text-align: center; margin: 0;"><b><?= $this->session->userdata('nama_lengkap')?></b></p>
						<div class="biodata" style="font-size: 12.5px;">
							<div class="label">No</div>
							<div class="isi-label">: 20240010010011</div>
							<div class="label">NIK</div>
							<div class="isi-label">: <?= $this->session->userdata('nik') ?></div>
							<div class="label">TTL</div>
							<div class="isi-label">: <?= $this->session->userdata('tempat_lahir')?>, <?= date('d / m / Y', strtotime($this->session->userdata('tanggal_lahir'))) ?></div>
							<div class="label">Usia</div>
							<div class="isi-label">: <?= $this->session->userdata('usia')?> Tahun</div>
							<div class="label">Gender</div>
							<div class="isi-label">: <?= $this->session->userdata('jenis_kelamin')?></div>
						</div>
					</div>
					<!-- 1 -->
					<div class="status">
						<h5 style="font-size:medium; margin:10px;margin-bottom:20px;">Skrining kesehatan</h5>
						<div class="isi-status" style="border: 1px solid  #015D67;font-weight:bold;">
							<span>Isi Skrining Kesehatan</span>
						</div>
						<div class="status-container">
							<p>Status:</p>
							<span>Belum &nbsp;</span>
							<img src="<?= base_url('assets') ?>/img/belum.png" alt="" style="margin-top:1px">
						</div>
					</div>
					<!-- 2 -->
					<div class="status">
						<h5 style="font-size:medium; margin:10px; margin-bottom:20px;" margin-bottom:20px;>Kuesioner Kepribadian</h5>
						<div class="isi-status" style="border: 1px solid  #015D67; font-weight:bold;">
							<span>Lihat Data</span>
						</div>
						<div class="status-container">
							<p>Status:</p>
							<span>Belum &nbsp;</span>
							<img src="<?= base_url('assets') ?>/img/belum.png" alt="" style="margin-top:1px">
						</div>
					</div>
					<!-- 3 -->
					<div class="status">
						<h5 style="font-size:medium; margin:10px; margin-bottom:20px;" margin-bottom:20px;>Status Verifikasi</h5>
						<div class="isi-status" style="background-color: white; border: 1px solid  #015D67;color:#015D67; font-weight:bold;">
							<span>Sudah Diverifikasi <img src="<?= base_url('assets') ?>/img/sudah.png" alt="" style="margin-top:1px"></span>
						</div>
						<div class="status-container">
							<p>Tanggal:</p>
							<span style="margin-left: 100px;">01/07/2024</span>

						</div>
					</div>
					<!-- 4 -->
					<div class="status">
						<h5 style="font-size:medium; margin:10px; margin-bottom:20px;" margin-bottom:20px;>Status Kesehatan</h5>
						<div class="isi-status" style="background-color: white; border: 1px solid  #015D67;color:#015D67; font-weight:bold;">
							<span>Belum disetujui <img src="<?= base_url('assets') ?>/img/belum.png" alt="" style="margin-top:1px"></span>
						</div>
						<div class="status-container">
							<p>Harap menunggu s/d:</p>
							<span style="margin-left: 0px;"><b>10/07/2024</b></span>

						</div>
					</div>
					<!-- 5 -->
					<div class="status">
						<h5 style="font-size:medium; margin:10px; margin-bottom:20px;" margin-bottom:20px;>Status BNN</h5>
						<div class="isi-status" style="background-color: white; border: 1px solid  #015D67;color:#015D67; font-weight:bold;">
							<span>Belum disetujui <img src="<?= base_url('assets') ?>/img/belum.png" alt="" style="margin-top:1px"></span>
						</div>
						<div class="status-container">
							<p>Harap menunggu s/d:</p>
							<span style="margin-left: 0px;"><b>10/07/2024</b></span>
						</div>
					</div>
					<!-- 6 -->
					<div class="status">
						<h5 style="font-size:medium; margin:10px; margin-bottom:20px;" margin-bottom:20px;>Status Psikolog</h5>
						<div class="isi-status" style="background-color: white; border: 1px solid  #015D67;color:#015D67; font-weight:bold;">
							<span>Belum disetujui <img src="<?= base_url('assets') ?>/img/belum.png" alt="" style="margin-top:1px"></span>
						</div>
						<div class="status-container">
							<p>Harap menunggu s/d:</p>
							<span style="margin-left: 0px;"><b>10/07/2024</b></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
