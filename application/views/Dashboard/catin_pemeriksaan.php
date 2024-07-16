<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/catin.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="<?= base_url('assets/') ?>js/jquery-ui.js"></script>

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
		<div class="inti-pemeriksaan">
			<h1 style="font-size: 30px;"> <img src="<?= base_url('assets/') ?>/img/Vector.png" alt="Profile Image" class="icon-navigation" style="height:5vh; width: 5vh;">Form Daftar Calon Pengantin</h1>
			<hr>
			<h2>informasi dasar</h2>
			<form>
				<div class="form-container" action="post" method="dashboard/daftar_pemeriksaan">
					<div class="form-group">
						<label for="nama">Nama Lengkap</label>
						<input type="text" id="nama" class="inputan" name="nama" placeholder="Isi Nama Lengkap" style="width: 32.3vw;">
					</div>
					<div class="form-group">
						<label for="nik">NIK</label>
						<input type="text" id="nik" class="inputan" name="nik" placeholder="Isi 16 Digit Nomor NIK">
					</div>
					<div class="form-group">
						<label for="tempat_lahir">Tempat Lahir </label>
						<input type="text" id="tempat_lahir" class="inputan" placeholder="Isi Tempat Lahir">
					</div>
					<div class="form-group" style="width: 32.8vh;">
						<label for="tanggal_lahir">Tanggal Lahir</label>
						<input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="Isi Tanggal Lahir" class="inputan" onchange="hitungUmur()">
					</div>
					<div class="form-group">
						<label for="umur">Usia</label>
						<input type="number" id="umur" class="inputan" readonly>
					</div>

					<div class="form-group">
						<label for="jenis_kelamin">Jenis Kelamin</label>
						<select name="jenis_kelamin" id="jenis_kelamin" class="inputan" required>
							<option value="" disabled selected>Pilih Jenis Kelamin</option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="agama">Agama</label>
						<select name="agama" id="agama" class="inputan" required>
							<option value="" disabled selected>Pilih Agama</option>
							<option value="Islam">Islam</option>
							<option value="Kristen">Kristen</option>
							<option value="Katolik">Katolik</option>
							<option value="Buddha">Buddha</option>
							<option value="Hindu">Hindu</option>
							<option value="Khonghucu">Khonghucu</option>
						</select>
					</div>
					<div class="form-group">
						<label for="pendidikan">Pendidikan Terakhir</label>
						<select name="pendidikan" id="pendidikan" class="inputan" required>
							<option value="" disabled selected>Pilih Pendidikan Terakhir</option>
							<option value="PAUD">PAUD</option>
							<option value="SD">SD</option>
							<option value="SMP">SMP</option>
							<option value="">SMP/SMK</option>
							<option value="S1">S1</option>
							<option value="S2">S2</option>
							<option value="S3">S3</option>
							<option value="D1">D1</option>
							<option value="D2">D2</option>
							<option value="D3">D3</option>
							<option value="D4">D4</option>
							<option value="Tidak menempuh pendidikan formal">Tidak menempuh pendidikan formal</option>
						</select>
					</div>
					<div class="form-group">
						<label for="pekerjaan">Pekerjaan</label>
						<input type="text" id="pekerjaan" class="inputan" name="pekerjaan" placeholder="Isi Pekerjaan" style="width: 32.3vw;">
					</div>
					<div class="form-group">
						<label for="nomor_telepon">No.HP</label>
						<input type="text" id="nomor_telepon" name="nomor_telepon" placeholder="Isi Nomor HP Aktif" class="inputan">
					</div>

					<h2 style="width: 100%;">Alamat</h2>


					<div class="form-group">
						<label for="provinsi">Provinsi</label>
						<select name="provinsi" id="provinsi" class="inputan" style="width: 24vw;" required>
							<option value="" disabled selected>Pilih Provinsi</option>
							<?php foreach ($provinsi as $provinsis) : ?>
								<option value="<?= $provinsis->id ?>"><?= $provinsis->name ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="kota">Kota</label>
						<select name="kota" id="kota" class="inputan" style="width: 24vw;" required>
							<option value="" disabled selected>Pilih Kota</option>
						</select>
					</div>
					<div class="form-group">
						<label for="kecamatan">Kecamatan</label>
						<select name="kecamatan" id="kecamatan" class="inputan" style="width: 24vw;" required>
							<option value="" disabled selected>Pilih Kecamatan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="kelurahan">Kelurahan</label>
						<select name="kelurahan" id="kelurahan" class="inputan" style="width: 24vw;" required>
							<option value="" disabled selected>Pilih Kelurahan</option>
						</select>
					</div>

					<div class="form-group"> <label for="alamat">Alamat Lengkap</label>
						<input type="text" id="alamat" class="inputan" name="alamat" placeholder="" style="width: 49.4vw;height:15vh;">
					</div>

					<h2 style="width: 100%;">Dokumen</h2>

					<div class="form-group"> <label for="pernikahan_ke">Pernikahan Ke</label>
						<input type="text" id="pernikahan_ke" class="inputan" name="pernikahan_ke" placeholder="" style="width: 23.9vw;">
					</div>

					<div class="form-group"><label for="tanggal_pernikahan">Tanggal Pernikahan</label>
						<input type="date" id="tanggal_pernikahan" class="inputan" name="tanggal_pernikahan" placeholder="Pilih tanggal_pernikahan" style="width: 23.9vw; ">
					</div>

					<div class="form-group"><label for="foto_user">Pas Foto</label>
						<input type="file" id="foto_user" class="inputan" name="foto_user" placeholder="" style="width: 23.9vw; height: 25vh; ">
					</div>
					<div class="form-group"><label for="foto_ktp">Foto KTP</label>
						<input type="file" id="foto_ktp" class="inputan" name="foto_ktp" placeholder="masukkan foto" style="width: 23.9vw; height: 25vh; ">
					</div>

					<div class="form-group"><label for="foto_kk">Foto Kartu Keluarga</label>
						<input type="file" id="foto_kk" class="inputan" name="foto_kk" placeholder="masukkan foto" style="width: 23.9vw; height: 25vh; ">
					</div>
					<div class="form-group"><label for="foto_surat">Foto Surat Pengantar</label>
						<input type="file" id="foto_surat" class="inputan" name="foto_surat" placeholder="masukkan foto" style="width: 23.9vw; height: 25vh; margin-bottom:20px;">
					</div>

				</div>

				<hr>
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

		$(document).ready(function() {
    // Debugging function to prevent multiple bindings
    function bindEvent(selector, event, handler) {
        $(document).off(event, selector).on(event, selector, handler);
    }

    bindEvent('#provinsi', 'change', function() {
        var provinsi_id = $(this).val();
        console.log('Provinsi changed:', provinsi_id);
        $.ajax({
            url: '<?= base_url('Dashboard/get_kota') ?>',
            method: 'POST',
            data: {provinsi_id: provinsi_id},
            dataType: 'json',
            success: function(data) {
                console.log('Kota data:', data);
                $('#kota').html('<option value="" disabled selected>Pilih Kota</option>');
                $.each(data, function(index, value) {
                    $('#kota').append('<option value="'+value.id+'">'+value.name+'</option>');
                });
                $('#kecamatan').html('<option value="" disabled selected>Pilih Kecamatan</option>');
                $('#kelurahan').html('<option value="" disabled selected>Pilih Kelurahan</option>');
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
            }
        });
    });

    bindEvent('#kota', 'change', function() {
        var kota_id = $(this).val();
        console.log('Kota changed:', kota_id);
        $.ajax({
            url: '<?= base_url('Dashboard/get_kecamatan') ?>',
            method: 'POST',
            data: {kota_id: kota_id},
            dataType: 'json',
            success: function(data) {
                console.log('Kecamatan data:', data);
                $('#kecamatan').html('<option value="" disabled selected>Pilih Kecamatan</option>');
                $.each(data, function(index, value) {
                    $('#kecamatan').append('<option value="'+value.id+'">'+value.name+'</option>');
                });
                $('#kelurahan').html('<option value="" disabled selected>Pilih Kelurahan</option>');
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
            }
        });
    });

    bindEvent('#kecamatan', 'change', function() {
        var kecamatan_id = $(this).val();
        console.log('Kecamatan changed:', kecamatan_id);
        $.ajax({
            url: '<?= base_url('Dashboard/get_kelurahan') ?>',
            method: 'POST',
            data: {kecamatan_id: kecamatan_id},
            dataType: 'json',
            success: function(data) {
                console.log('Kelurahan data:', data);
                $('#kelurahan').html('<option value="" disabled selected>Pilih Kelurahan</option>');
                $.each(data, function(index, value) {
                    $('#kelurahan').append('<option value="'+value.id+'">'+value.name+'</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
            }
        });
    });
});	</script>
</body>

</html>
