<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">



	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">


	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/home.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/tentang.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/alur_pendaftaran.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/struktur.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/contact.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/faq.css') ?>" />

	<style>
		.alert {
			position: fixed;
			top: 5px;
			left: 50%;
			transform: translateX(-50%);
			background-color: #f8d7da;
			/* Red background for example */
			color: #721c24;
			/* Dark red text */
			padding: 10px;
			
			border: 1px solid #f5c6cb;
			border-radius: 5px;
			z-index: 1000;
			/* Ensures the alert is on top of other content */
		}

		.alert-message {
			display: inline-block;
			/* Center text horizontally within the alert */
			text-align: center;
			/* Optionally adjust vertical alignment */
			vertical-align: middle;
		}

		.close-btn {
			background: none;
			border: none;
			font-size: 20px;
			cursor: pointer;
			color: #721c24;
			line-height: 1;
			/* Adjust positioning of the close button if needed */
			margin-left: 10px;
		}

		/* You can add more styles for other alert types */
	</style>


	<title>Catin DPPKB Tebing Tinggi</title>
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/percatin_log.png" />
</head>


<body style="margin: auto; padding-top:0;overflow-x:hidden	">

	<?php
	$tombol = $this->session->userdata('status');
	$display = ($tombol == 0) ? "display:none" : "display:block";
	$heroMovement = ($tombol == 0) ? "position: absolute; width: 105%; " : ""; // Tambahkan ini
	?>

	<!-- home -->
	<div class="container_home" style="margin-bottom: 30vh;">
		<header>
		<?php
	$kuota = $this->session->userdata('kuota');
	if ($kuota == 10) :?>
		<?php $display = "display:none"; "display:block";
		$heroMovement = "position: absolute; width: 105%; "; ""; ?>
		<div id="alert-box" class="alert">
			<span class="alert-message">kuota pendaftaran telah penuh</span>
			<button id="close-alert" class="close-btn">&times;</button>
		</div>		
	<?php endif ?>
	<?php if($kuota < 10  && $kuota >=5) : ?>
		<div id="alert-box" class="alert">
			<span class="alert-message">Sisa kuota pendaftaran adalah <?= $this->session->userdata('sisa_kuota') ?> orang lagi</span>
			<button id="close-alert" class="close-btn">&times;</button>
		</div>
	<?php endif ?>


			<div class="header-container">
				<img class="logo" src="<?= base_url('assets/') ?>img/percantin.png" alt="" style="margin-left:-10vh; width: 13vh;height: 13vh;">
				<div class="navbar">
					<nav>
						<ul>
							<li><a href="#tentang">Tentang</a></li>
							<li><a href="#">Struktur</a></li>
							<li><a href="#">FAQ</a></li>
							<li><a href="#contact">Kontak</a></li>
						</ul>
					</nav>
				</div>
				<div class="daftar-masuk">
					<a href="<?= base_url('auth/register') ?>"><button class="btn" style="<?php echo $display; ?>">Daftar</button></a>
					<a href="<?= base_url('auth/login') ?>"><button class="btn">Masuk</button></a>
				</div>
			</div>
		</header>
		<div class="home">
			<img class="hero-home" src="<?= base_url('assets/') ?>img/tugu-13-desember-t-tinggi3.jpg" alt="" style="height:100%; margin-top:10vh; opacity:20%; <?php echo $heroMovement; ?>"> <!-- Tambahkan heroMovement -->
			<div class="desc-container">
				<div class="desc">
					<p class="teks-1">PERCANTIN</p>
					<p class="teks-2">Pemeriksaan Calon</p>
					<p class="teks-2">Pengantin</p>
				</div>

				<a href="<?= base_url('auth/login') ?>"><button class="btn-masuk">Masuk</button></a>
				<p class="teks-3" style="<?php echo $display; ?>">Belum mempunyai akun? <span class="span-1"><a href="<?= base_url('auth/register') ?>">Daftar</a></span></p>
			</div>
			<img src="<?= base_url('assets/') ?>img/logo_besar.svg" alt="" style="margin-right: 20vh;" class="logo-besar">
		</div>
	</div>
</body>




<!-- TENTANG KAMI -->
<section id="tentang">
</section>
<div class="container_tentangkami" data-aos="fade-up">
	<div class="header">
		<h1>Tentang Kami</h1>
		<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla doloribus odit reiciendis fuga in dicta doloremque suscipit. Tempore inventore vero laboriosam explicabo. At autem reiciendis laudantium iure ullam ex? Fugit sunt, inventore possimus earum aperiam nam eligendi assumenda et repellat.</p>
	</div>
	<div class="container-card">
		<div class="card" data-aos="fade-up" style="height:13vh;" data-aos-delay="100">
			<h2>Skrining Kesehatan</h2>
			<p>Pemeriksaan skrining kesehatan bertujuan untuk mendeteksi penyakit atau kondisi medis yang dapat mempengaruhi kesehatan calon pengantin. Pemeriksaan ini mencakup cek darah, analisis urine, dan pemeriksaan fisik dasar.</p>
		</div>
		<div class="card" data-aos="fade-up" style="height:13vh;" data-aos-delay="200">
			<h2>Pemeriksaan Narkoba</h2>
			<p>Pemeriksaan narkoba dilakukan untuk memastikan calon pengantin bebas dari penggunaan zat terlarang. Ini penting untuk menjaga kesehatan dan kesejahteraan pasangan serta keluarga di masa depan.</p>
		</div>
		<div class="card" data-aos="fade-up" style="height:13vh;" data-aos-delay="300">
			<h2>Pemeriksaan Psikologi</h2>
			<p>Pemeriksaan psikologi membantu mengidentifikasi kondisi mental dan emosional calon pengantin. Ini bertujuan untuk memastikan kesiapan psikologis dalam menjalani kehidupan pernikahan yang harmonis dan bahagia.</p>
		</div>
	</div>
</div>
<!-- ALUR PENDAFTARAN -->
<div class="container_alurpendaftaran" style="background: var(--primary---color, #015D67);" data-aos="fade-up">
	<div class="elipse"></div>
	<h1 style="  text-align: center; color: var(--white---color, #FFFAFA);">Alur Pendaftaran</h1>
	<p class="underHeader">Standar Pelayanan Prosedur Perkawinan (SP3)</p>
	<div class="container">
		<div class="box_baris1" data-aos="fade-up" data-aos-delay="100">
			<div class="isi_box">
				<h3 class="judul_box" style="font-weight: bold;">
					<span class="circle-number">1</span> Registrasi
				</h3>
				<p class="text_box">Forward closer feature disband down eow working back cc nor. Chime regroup management vendor accountable turn close solutionize activities brainstorming. Overflow optimize for roll future-proof stronger issues revision hours an.</p>
			</div>
		</div>
		<div class="box_baris1" data-aos="fade-up" data-aos-delay="200">
			<div class="isi_box">
				<h3 class="judul_box" style="font-weight: bold;">
					<span class="circle-number">2</span> Plano Test, Suntik TD
				</h3>
				<p class="text_box">Forward closer feature disband down eow working back cc nor. Chime regroup management vendor accountable turn close solutionize activities brainstorming. Overflow optimize for roll future-proof stronger issues revision hours an.</p>
			</div>
		</div>
		<div class="box_baris1" data-aos="fade-up" data-aos-delay="300">
			<div class="isi_box">
				<h3 class="judul_box" style="font-weight: bold;">
					<span class="circle-number">3</span> KIE Narkoba
				</h3>
				<p class="text_box">Forward closer feature disband down eow working back cc nor. Chime regroup management vendor accountable turn close solutionize activities brainstorming. Overflow optimize for roll future-proof stronger issues revision hours an.</p>
			</div>
		</div>
		<div class="box_baris1" data-aos="fade-up" data-aos-delay="400">
			<div class="isi_box">
				<h3 class="judul_box" style="font-weight: bold;">
					<span class="circle-number">4</span> Konseling Psikolog
				</h3>
				<p class="text_box">Forward closer feature disband down eow working back cc nor. Chime regroup management vendor accountable turn close solutionize activities brainstorming. Overflow optimize for roll future-proof stronger issues revision hours an.</p>
			</div>
		</div>
		<div class="box_baris1" data-aos="fade-up" data-aos-delay="500">
			<div class="isi_box">
				<h3 class="judul_box" style="font-weight: bold;">
					<span class="circle-number">5</span> Kartu Kendali
				</h3>
				<p class="text_box">Forward closer feature disband down eow working back cc nor. Chime regroup management vendor accountable turn close solutionize activities brainstorming. Overflow optimize for roll future-proof stronger issues revision hours an.</p>
			</div>
		</div>
	</div>
</div>

<!-- struktur organisasi -->

<div class="header">
	<p class="judul" data-aos="fade-up" data-aos-delay="100">Struktur Organisasi</p>
	<p class="desc">Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pengendalian Penduduk dan Keluarga Berencana.</p>
</div>
<div class="card-container" data-aos="fade-up" data-aos-delay="100">
	<div class="card-struktur" data-aos="fade-up" data-aos-delay="100">
		<img class="image" src="" alt="">
		<p class="nama">Atika P. Sary Nasution., S.Rj</p>
		<p class="NIP">NIP: 196907251995012001</p>
		<p class="jabatan">Kepala Dinas</p>
	</div>
	<div class="card-struktur" data-aos="fade-up" data-aos-delay="100">
		<img class="image" src="" alt="">
		<p class="nama">Atika P. Sary Nasution., S.Rj</p>
		<p class="NIP">NIP: 196907251995012001</p>
		<p class="jabatan">Kepala Dinas</p>
	</div>
	<div class="card-struktur" data-aos="fade-up" data-aos-delay="100">
		<img class="image" src="" alt="">
		<p class="nama">Atika P. Sary Nasution., S.Rj</p>
		<p class="NIP">NIP: 196907251995012001</p>
		<p class="jabatan">Kepala Dinas</p>
	</div>
</div>



<!-- CONTACT -->
<section id="contact">
</section>
<div class="contact_container" data-aos="fade-up" style="margin-top: 20vh;">
	<div class="contact_pertanyaan">
		<h1 class="contact_pertanyaan_title">Ada Pertanyaan?</h1>
		<div class="contact_pertanyaan_isi" style="margin-bottom: 0vh; margin-top:0vh;">
			<div class="isi" style="width: 20%;">
				<h4>Phone</h4>
				<p style="margin-top: -10px;">(0621)-21536</p>
			</div>
			<div class="isi" style="width: 40%;">
				<h4>Email</h4>
				<p style="margin-top: -10px;">dppappkb@tebingtinggikota.go.id</p>
			</div>
			<div class="isi" style="width: 24%;">
				<h4>Address</h4>
				<p style="margin-top: -10px;">Jl. Gunung Leuser No. 3, Kota Tebing Tinggi Sumatera Utara Indonesia Kode POS : 20614</p>
			</div>
		</div>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.986706135521!2d99.16206607473123!3d3.353395096621332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303161da98f8c417%3A0xa9aa16030bbeef11!2sDinas%20PPKB%20Kota%20Tebing%20Tinggi!5e0!3m2!1sid!2sid!4v1705589852672!5m2!1sid!2sid" frameborder="0" style="width:100%; height: 65vh; margin-top:30px; border-radius:10px;" allowfullscreen></iframe>
	</div>

	<div class="contact_form" data-aos="fade-up" data-aos-delay="100" style="width: 50%;">
		<h1 class="contact_form_title">Form Kontak</h1>
		<form style="margin-top: 2vh;" action="<?= base_url('beranda/contact') ?>" method="post">
			<div class="name_container">
				<div class="input_container">
					<label for="first_name">Nama Depan</label>
					<input type="text" placeholder="Masukkan nama depan Anda" id="first_name" name="first_name" value="<?= set_value('first_name') ?>">
					<?= form_error('first_name', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="input_container">
					<label for="last_name">Nama Belakang</label>
					<input type="text" id="last_name" placeholder="Masukkan nama belakang Anda" name="last_name" value="<?= set_value('last_name') ?>">
					<?= form_error('last_name', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
			<div class="name_container">
				<div class="input_container">
					<label for="email">Email</label>
					<input type="text" id="email" placeholder="Masukkan email Anda" name="email" value="<?= set_value('email') ?>">
					<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
			<div class="name_container">
				<div class="input_container">
					<label for="address">Alamat</label>
					<input type="text" id="address" placeholder="Masukkan alamat anda" name="address" value="<?= set_value('address') ?>">
					<?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
			<div class="name_container">
				<div class="input_container">
					<label for="description">Deskripsi</label><br>
					<textarea id="description" name="description" class="element" style="height: 10vh; width:50vh; border-radius:10px" value="<?= set_value('description') ?>"></textarea>
					<?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
			<button class="button_form" style="align-items: center;">Submit</button>
		</form>
	</div>

</div>

<!-- faq -->
<div class="faq-container" style="margin-top: 10vh;">
	<h1>FAQ</h1>
	<div class="faq-item">
		<div class="faq-question">
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
			<span class="plus">+</span>
		</div>
		<div class="faq-answer">
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book...
		</div>
	</div>
	<div class="faq-item">
		<div class="faq-question">
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
			<span class="plus">+</span>
		</div>
		<div class="faq-answer">
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book...
		</div>
	</div>
	<div class="faq-item">
		<div class="faq-question">
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
			<span class="plus">+</span>
		</div>
		<div class="faq-answer">
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book...
		</div>
	</div>
	<div class="faq-item">
		<div class="faq-question">
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
			<span class="plus">+</span>
		</div>
		<div class="faq-answer">
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book...
		</div>
	</div>
	<div class="faq-item">
		<div class="faq-question">
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
			<span class="plus">+</span>
		</div>
		<div class="faq-answer">
			Ideally, both partners should undergo a pre-wedding medical check-up. It ensures that both individuals are aware of their health status and can take necessary steps to address any concerns.
		</div>
	</div>
	<div class="faq-item">
		<div class="faq-question">
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
			<span class="plus">+</span>
		</div>
		<div class="faq-answer">
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book...
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
	AOS.init();
</script>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		const faqItems = document.querySelectorAll('.faq-item');

		faqItems.forEach(item => {
			item.querySelector('.faq-question').addEventListener('click', () => {
				item.classList.toggle('open');
			});
		});
	});
</script>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		var closeBtn = document.getElementById('close-alert');
		var alertBox = document.getElementById('alert-box');

		closeBtn.addEventListener('click', function() {
			alertBox.style.display = 'none'; // Hide the alert
		});
	});
</script>
</body>

</html>