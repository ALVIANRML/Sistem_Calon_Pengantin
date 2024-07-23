<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/catin.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/percatin_log.png" />
	<title>D_catin</title>
</head>

<body>
	<!-- declatation -->
	<?php
	$provinsi = $this->session->userdata('provinsi');
	$kota = $this->session->userdata('kota');
	$kecamatan = $this->session->userdata('kecamatan');
	$kelurahan = $this->session->userdata('kelurahan');
	$foto_user = $this->session->userdata('foto_user');
	$foto_kk = $this->session->userdata('foto_kk');
	$foto_ktp = $this->session->userdata('foto_ktp');
	$foto_surat = $this->session->userdata('foto_surat');
	?>

	<div class="container_admin">
		<div class="header-container">
			<div class="logo-container">
				<img class="logo" src="<?= base_url('assets/') ?>img/percantin.png" alt="Logo">
				<span class="logo-text"><b style="font-family: 'Nunito Sans', sans-serif;">DPPKB <br> KOTA TEBING TINGGI</b></span>
			</div>
			<nav class="navbar">
				<ul>
					<div class="navbar_profil" style="width: 15vw; margin-right:0px">
						<img src="<?= base_url('uploads/photo/pasFoto/'); ?><?= $this->session->userdata('foto_user'); ?>" alt="Profile Image" class="profile-img">
						<div class="profile-text">
							<span>Halo,</span>
							<span><b style="color:black; font-family: 'Nunito Sans', sans-serif;"><?= $this->session->userdata('username'); ?></b> <img src="<?= base_url('assets/') ?>/img/dropdown.png" alt="Profile Image" style="width: 10px; height: 10px; margin-left: 50px;"></span>
						</div>
					</div>
				</ul>
			</nav>
		</div>
		<div class="main-content">
			<div class="navigasi_admin">
				<h6 style="color: gray; margin: 0; font-size:10px;">NAVIGASI</h6>
				<a href="<?= base_url('dashboard/view_catin') ?>" style="text-decoration: none;">
					<div class="navigasi_admin_menu">
						<div class="isi" style="background-color: white;">
						<img src="<?= base_url('assets/') ?>img/dashboard_black.svg" alt="Profile Image" class="icon-navigation" style="width:2.5vh; height:2.5vh;">
							<div class="profile-text">
								<span>Dashboard</span>
							</div>
						</div>
				</a>
			</div>
			<div class="isi" style="background-color: #015D67;">
				<img src="<?= base_url('assets/') ?>img/Frame.svg" alt="Profile Image" class="icon-navigation" style="width:2.5vh; height:2.5vh;">
				<div class="profile-text" style="color:white;">
					<span style="color:white">Daftar Pemeriksaan</span>
				</div>
			</div>
		</div>
		<div class="inti-pemeriksaan" style="height: 100%; background-color: white; border: 2px solid gray;">
			<h1 style="font-size: 30px;"> <img src="<?= base_url('assets/') ?>img/title_pemeriksaan.svg" alt="Profile Image" class="icon-navigation" style=" height:5vh; width: 5vh;">Form Daftar Calon Pengantin</h1>
			<hr>
			<h2>informasi dasar</h2>
			<?php echo isset($error) ? $error : ''; ?>
			<form action="<?= base_url('dashboard/pemeriksaan') ?>" method="post" enctype="multipart/form-data">
				<div class="form-container">
					<div class="form-group" style="width: 37.5vw; margin-right:5.5vh;">
						<label for="nama_lengkap">Nama Lengkap</label>
						<input type="text" id="nama_lengkap" class="inputan" name="nama_lengkap" placeholder="Isi Nama Lengkap" style="width:100%" value="<?= $this->session->userdata('nama_lengkap'); ?>">
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

					<div class="form-group" style="">
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
					<div class="form-group" style="width: 37.5vw; margin-right:5.5vh">
						<label for="pekerjaan">Pekerjaan</label>
						<input type="text" id="pekerjaan" class="inputan" name="pekerjaan" placeholder="Isi Pekerjaan" style="width: 100%;" value="<?= $this->session->userdata('pekerjaan'); ?>">
						<?= form_error('pekerjaan', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="nomor_telepon">No.HP</label>
						<input type="text" id="nomor_telepon" name="nomor_telepon" placeholder="Isi Nomor HP Aktif" class="inputan" value="<?= $this->session->userdata('nomor_telepon'); ?>">
						<?= form_error('nomor_telepon', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
					</div>

					<h2 style="width: 100%;">Alamat</h2>


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

					<h2 style="width: 100%;">Dokumen</h2>

					<div class="form-group" style="width: 48vh;">
						<label for="pernikahan_ke">Pernikahan Ke</label>
						<input type="number" id="pernikahan_ke" class="inputan" name="pernikahan_ke" placeholder="" value="<?= $this->session->userdata('pernikahan_ke'); ?>" style="width:100%" min="1">
						<?= form_error('pernikahan_ke', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
					</div>

					<div class="form-group" style="width: 48vh;">
						<label for="tanggal_pernikahan">Tanggal Pernikahan</label>
						<input type="date" id="tanggal_pernikahan" class="inputan" name="tanggal_pernikahan" placeholder="Pilih tanggal_pernikahan" value="<?= $this->session->userdata('tanggal_pernikahan'); ?>" style="width: 100%;">
						<?= form_error('tanggal_pernikahan', '<small class="text-danger pl-3" style="color: red;">', '</small>'); ?>
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
							<label for="foto_user">Foto KTP</label>
							<?php echo form_open_multipart('dashboard/pemeriksaan'); ?>
							<div class="custom-file-upload" style="cursor: pointer;" id="drop-zone-foto_user">
								<img id="uploadImage-foto_user" src="<?= base_url('uploads/photo/pasFoto/') . $foto_user ?>" alt="KTP Image" class="preview-image">
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
							<label for="foto_ktp">Pas Foto</label>
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
								<img id="uploadImage-foto_ktp" src="<?= base_url('uploads/photo/ktp/') . $foto_ktp ?>" alt="KTP Image" class="preview-image">
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
								<img id="uploadImage-foto_kk" src="<?= base_url('uploads/photo/kk/') . $foto_kk ?>" alt="KTP Image" class="preview-image">
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
								<img id="uploadImage-foto_surat" src="<?= base_url('uploads/photo/surat/') . $foto_surat ?>" alt="KTP Image" class="preview-image">
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

				<hr style=" margin-top:20px;">
				<div class="main-container" style="display: flex; align-items: center; justify-content: space-between;">
					<div class="info-container" style="display: flex; align-items: center;">
						<img src="<?= base_url('assets') ?>/img/caution.svg" alt="" style="margin-top:1px;">
						<p> &nbsp;Isi semua kolom yang ada</p>
					</div>
					<div class="status-container" style="display: flex;">
						<button class="btn-pemeriksaan" style="margin-top: 4px;">
							<p style="font-weight:bold; color:#015D67; text-align:center; ">Batal</p>
						</button>
						<button type="submit" name="submit" id="submit" class="btn-pemeriksaan" style="background-color: #015D67;margin-top: 4px;">
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



	<script>
		function uploadfile(fileId) {
			var input = document.getElementById(fileId);
			var fileName = input.files.length > 0 ? input.files[0].name : '';
			document.getElementById('file-name-' + fileId).textContent = fileName;

			var previewImage = document.getElementById('preview-image-' + fileId);
			var uploadIcon = document.querySelector('#drop-zone-' + fileId + ' .upload-icon');
			var uploadText = document.querySelector('#drop-zone-' + fileId + ' .upload-text');
			var uploadSubtext = document.querySelector('#drop-zone-' + fileId + ' .upload-subtext');

			if (input.files.length > 0) {
				var file = input.files[0];
				var reader = new FileReader();

				reader.onload = function(e) {
					previewImage.src = e.target.result;
					previewImage.style.display = 'block';
				};

				reader.readAsDataURL(file);

				// Hide the upload text and subtext
				uploadIcon.style.display = 'none';
				uploadText.style.display = 'none';
				uploadSubtext.style.display = 'none';
			} else {
				previewImage.src = '';
				previewImage.style.display = 'none';

				// Show the upload text and subtext
				uploadIcon.style.display = 'block';
				uploadText.style.display = 'block';
				uploadSubtext.style.display = 'block';
			}
		}

		// Set up event listeners for drag and drop
		var dropZones = document.querySelectorAll('[id^=drop-zone-]');

		dropZones.forEach(function(dropZone) {
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
				uploadfile(fileInputId);
			});

			dropZone.addEventListener('click', function() {
				var fileInputId = dropZone.id.replace('drop-zone-', '');
				document.getElementById(fileInputId).click();
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

				// Hide the upload text and subtext
				if (uploadIcon) uploadIcon.style.display = 'none';
				if (uploadText) uploadText.style.display = 'none';
				if (uploadSubtext) uploadSubtext.style.display = 'none';
			} else {
				if (uploadImage) uploadImage.src = '';
				previewImage.src = '';
				if (uploadImage) uploadImage.style.display = 'block';
				previewImage.style.display = 'none';

				// Show the upload text and subtext
				if (uploadIcon) uploadIcon.style.display = 'block';
				if (uploadText) uploadText.style.display = 'block';
				if (uploadSubtext) uploadSubtext.style.display = 'block';
			}
		}

		// Set up event listeners for drag and drop
		var dropZones = document.querySelectorAll('[id^=drop-zone-]');

		dropZones.forEach(function(dropZone) {
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

</body>

</html>