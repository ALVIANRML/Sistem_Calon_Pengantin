<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/catin.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body>



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
								<span><b>sigma</b> <img src="<?= base_url('assets/') ?>/img/dropdown.png" alt="Profile Image" style="width: 10px; height: 10px; margin-left: 50px;"></span>
							</div>
						</div>
					</ul>
				</nav>
			</div>
			<div class="main-content">
				<div class="navigasi_admin">
					<h6 style="color: gray; margin: 0; font-size:10px;">NAVIGASI</h6>
					<a href="<?= base_url('dashboard/view_catin') ?>">
						<div class="navigasi_admin_menu">
							<div class="isi" style="background-color: white;">
								<img src="<?= base_url('assets/') ?>/img/pemeriksaan_dashboard.png" alt="Profile Image" class="icon-navigation">
								<div class="profile-text">
									<span>Dashboard</span>
								</div>
							</div>
					</a>
				</div>
				<div class="isi" style="background-color: #015D67;">
					<img src="<?= base_url('assets/') ?>/img/pemerisaan_daftar.png" alt="Profile Image" class="icon-navigation">
					<div class="profile-text" style="color:white;">
						<span style="color:white">Daftar Pemeriksaan</span>
					</div>
				</div>
			</div>
			<div class="inti-pemeriksaan" style="height: 100%;">
				<h1 style="font-size: 30px;"> <img src="<?= base_url('assets/') ?>/img/Vector.png" alt="Profile Image" class="icon-navigation" value="<?= set_value('nama_lengkap') ?> style=" height:5vh; width: 5vh;">Form Daftar Calon Pengantin</h1>
				<hr>
				<h2>informasi dasar</h2>
				<form action="<?= base_url('Dashboard/view_catin_pemeriksaan') ?>" method="post">
					<div class="form-container">
						<div class="form-group">
							<label for="nama_lengkap">Nama Lengkap</label>
							<input type="text" id="nama_lengkap" class="inputan" name="nama_lengkap" placeholder="Isi Nama Lengkap" style="width: 32.3vw;" value="<?= $this->session->userdata('nama_lengkap'); ?>">
							<?= form_error('nama_lengkap', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>

						</div>
						<div class="form-group">
							<label for="nik">NIK</label>
							<input type="text" id="nik" class="inputan" name="nik" placeholder="Isi 16 Digit Nomor NIK" value="<?= $this->session->userdata('nik'); ?>">
							<?= form_error('nik', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="tempat_lahir">Tempat Lahir </label>
							<input type="text" id="tempat_lahir" name="tempat_lahir" class="inputan" placeholder="Isi Tempat Lahir" value="<?= $this->session->userdata('tempat_lahir'); ?>">
							<?= form_error('tempat_lahir', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
						</div>
						<div class="form-group" style="width: 32.8vh;">
							<label for="tanggal_lahir">Tanggal Lahir</label>
							<input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="Isi Tanggal Lahir" class="inputan" onchange="hitungUmur()" value="<?= $this->session->userdata('tanggal_lahir'); ?>">
							<?= form_error('tanggal_lahir', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="umur">Usia</label>
							<input type="number" id="umur" name="umur" class="inputan" readonly value="<?= $this->session->userdata('usia'); ?>">
							<?= form_error('umur', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
						</div>

						<div class="form-group">
							<label for="jenis_kelamin">Jenis Kelamin</label>
							<select name="jenis_kelamin" id="jenis_kelamin" class="inputan">
								<option value="" disabled selected>Pilih Jenis Kelamin</option>
								<option value="Laki-Laki" <?= ($this->session->userdata('jenis_kelamin') == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-Laki</option>
								<option value="Perempuan" <?= ($this->session->userdata('jenis_kelamin') == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
							</select>
							<?= form_error('jenis_kelamin', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="agama">Agama</label>
							<select name="agama" id="agama" class="inputan">
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
						<div class="form-group">
							<label for="pendidikan">Pendidikan Terakhir</label>
							<select name="pendidikan" id="pendidikan" class="inputan">
								<option value="" disabled selected>Pilih Pendidikan Terakhir</option>
								<option value="PAUD" <?= ($this->session->userdata('pendidikan') == 'PAUD') ? 'selected' : ''; ?>>PAUD</option>
								<option value="SD" <?= ($this->session->userdata('pendidikan') == 'SD') ? 'selected' : ''; ?>>SD</option>
								<option value="SMP" <?= ($this->session->userdata('pendidikan') == 'SMP') ? 'selected' : ''; ?>>SMP</option>
								<option value="SMP/SMK" <?= ($this->session->userdata('pendidikan') == 'SMP/SMK') ? 'selected' : ''; ?>>SMP/SMK</option>
								<option value="S1" <?= ($this->session->userdata('pendidikan') == 'S1') ? 'selected' : ''; ?>>S1</option>
								<option value="S2" <?= ($this->session->userdata('pendidikan') == 'S2') ? 'selected' : ''; ?>>S2</option>
								<option value="S3" <?= ($this->session->userdata('pendidikan') == 'S3') ? 'selected' : ''; ?>>S3</option>
								<option value="D1" <?= ($this->session->userdata('pendidikan') == 'D1') ? 'selected' : ''; ?>>D1</option>
								<option value="D2" <?= ($this->session->userdata('pendidikan') == 'D2') ? 'selected' : ''; ?>>D2</option>
								<option value="D3" <?= ($this->session->userdata('pendidikan') == 'D3') ? 'selected' : ''; ?>>D3</option>
								<option value="Tidak menempuh pendidikan formal" <?= ($this->session->userdata('pendidikan') == 'Tidak menempuh pendidikan formal') ? 'selected' : ''; ?>>Tidak menempuh pendidikan formal</option>
							</select>
							<?= form_error('pendidikan', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="pekerjaan">Pekerjaan</label>
							<input type="text" id="pekerjaan" class="inputan" name="pekerjaan" placeholder="Isi Pekerjaan" style="width: 32.3vw;" value="<?= $this->session->userdata('pekerjaan'); ?>">
							<?= form_error('pekerjaan', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="nomor_telepon">No.HP</label>
							<input type="text" id="nomor_telepon" name="nomor_telepon" placeholder="Isi Nomor HP Aktif" class="inputan" value="<?= $this->session->userdata('nomor_telepon'); ?>">
							<?= form_error('nomor_telepon', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
						</div>

						<h2 style="width: 100%;">Alamat</h2>


						<div class="form-group">
							<label for="provinsi">Provinsi</label>
							<select name="provinsi" id="provinsi" class="inputan" style="width: 24vw;">
								<option value="" disabled selected>Pilih Provinsi</option>
							</select>
							<?= form_error('provinsi', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="kota">Kota</label>
							<select name="kota" id="kota" class="inputan" style="width: 24vw;">
								<option value="" disabled selected>Pilih Kota</option>
							</select>
							<?= form_error('kota', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="kecamatan">Kecamatan</label>
							<select name="kecamatan" id="kecamatan" class="inputan" style="width: 24vw;">
								<option value="" disabled selected>Pilih Kecamatan</option>
							</select>
							<?= form_error('kecamatan', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="kelurahan">Kelurahan</label>
							<select name="kelurahan" id="kelurahan" class="inputan" style="width: 24vw;">
								<option value="" disabled selected>Pilih Kelurahan</option>
							</select>
							<?= form_error('kelurahan', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
						</div>


						<div class="form-group">
							<label for="alamat">Alamat Lengkap</label>
							<input type="text" id="alamat" class="inputan" name="alamat" placeholder="" value="<?= $this->session->userdata('alamat'); ?>" style="width: 49.4vw;height:15vh;">
							<?= form_error('alamat', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
						</div>

						<h2 style="width: 100%;">Dokumen</h2>

						<div class="form-group">
							<label for="pernikahan_ke">Pernikahan Ke</label>
							<input type="number" id="pernikahan_ke" class="inputan" name="pernikahan_ke" placeholder="" value="<?= $this->session->userdata('pernikahan_ke'); ?>" style="width: 23.9vw;">
							<?= form_error('pernikahan_ke', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
						</div>

						<div class="form-group">
							<label for="tanggal_pernikahan">Tanggal Pernikahan</label>
							<input type="date" id="tanggal_pernikahan" class="inputan" name="tanggal_pernikahan" placeholder="Pilih tanggal_pernikahan" value="<?= $this->session->userdata('tanggal_pernikahan'); ?>" style="width: 23.9vw;">
							<?= form_error('tanggal_pernikahan', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
						</div>


					
						<div class="form-group">
							<label for="foto_user">Pas Foto</label>
							<?php echo form_open_multipart('upload/do_upload');?>
							<input type="file" id="foto_user" class="inputan" name="foto_user" placeholder="" style="width: 23.9vw; height: 25vh;" value="<?= $this->session->userdata('foto_user'); ?>"size="20">
							<?= form_error('foto_user', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
						</div>

						<div class="form-group">
							<label for="foto_ktp">Foto KTP</label>
							<input type="file" id="foto_ktp" class="inputan" name="foto_ktp" placeholder="masukkan foto" style="width: 23.9vw; height: 25vh;" value="<?= $this->session->userdata('foto_ktp'); ?>"size="20">
							<?= form_error('foto_ktp', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
						</div>

						<div class="form-group">
							<label for="foto_kk">Foto Kartu Keluarga</label>
							<input type="file" id="foto_kk" class="inputan" name="foto_kk" placeholder="masukkan foto" style="width: 23.9vw; height: 25vh;"value="<?= $this->session->userdata('foto_kk'); ?>"size="20">
							<?= form_error('foto_kk', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
						</div>

						<div class="form-group"><label for="foto_surat">Foto Surat Pengantar</label>
							<input type="file" id="foto_surat" class="inputan" name="foto_surat" placeholder="masukkan foto" style="width: 23.9vw; height: 25vh; " value="<?= $this->session->userdata('foto_surat'); ?>"size="20">
							<?= form_error('foto_surat', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
						</div>

					</div>

					<hr style=" margin-top:20px;">
					<div class="main-container" style="display: flex; align-items: center; justify-content: space-between;">
						<div class="info-container" style="display: flex; align-items: center;">
							<img src="<?= base_url('assets') ?>/img/caution.png" alt="" style="margin-top:1px;">
							<p> &nbsp;Isi semua kolom yang ada</p>
						</div>
						<div class="status-container" style="display: flex;">
							<button class="btn-pemeriksaan" style="margin-top: 4px;">
								<p style="font-weight:bold; color:#015D67; text-align:center; ">Batal</p>
							</button>
							<button class="btn-pemeriksaan" style="background-color: #015D67;margin-top: 4px;">
								<p style="font-weight:bold; color:white; text-align:center;">Daftar</p>
							</button>
						</div>
					</div>

				</form>
			</div>

		</div>



		<script>
			function hitungUmur() {
				const tanggalLahir = document.getElementById('tanggal_lahir').value;
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
					var tampung = '<option>Pilih Provinsi</option>';
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
						var tampung = '<option>Pilih Kota</option>';
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
						var tampung = '<option>Pilih Kecamatan</option>';
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
						var tampung = '<option>Pilih Kelurahan</option>';
						data.forEach(element => {
							tampung += `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`;
						});
						document.getElementById('kelurahan').innerHTML = tampung;
					});
				});
		</script>
	</body>

</html>
