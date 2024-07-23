<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">


	<title><?= $title; ?></title>


	<!-- Custom fonts for this template-->
	
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/percatin_log.png" />
	<link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- error pop up bootsrap -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

	<!-- SweetAlert -->
	<script src="<?= base_url() ?>node_modules/sweetalert/dist/sweetalert.min.js"></script>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


	<style>
		/* CSS custom untuk mengubah panjang dan warna popup */
		.swal-modal {
			width: 80% !important;
			/* Sesuaikan panjang popup */
			max-width: 600px;
			/* Batasi lebar maksimum */
			background-color: white !important;
			/* Warna background popup */
			height: auto;
			/* Atur tinggi secara otomatis */
		}

		.swal-title {
			color: #343a40 !important;
			/* Warna teks judul */
			font-weight: bold;
			margin-bottom: 10px;
			/* Atur margin bawah */
			margin-top: 20px;
			/* Atur margin atas */
			text-align: left;
			padding-left: 20px;
			/* Padding kiri */
		}

		.swal-content {
			color: white !important;
			/* Warna teks isi */
			background-color: #015D67;
			border-radius: 4px;
			width: 90%;
			max-width: 500px;
			/* Batasi lebar maksimum konten */
			margin: auto;
			/* Mengatur margin auto untuk posisi tengah */
			display: flex;
			/* Menggunakan flexbox untuk penataan */
			align-items: center;
			/* Memusatkan vertikal */
			justify-content: left;
			/* Memusatkan horizontal */
			padding: 20px;
			/* Atur padding sesuai kebutuhan */
			text-align: left;
			font-size: medium;
		}

		.swal-button {
			background-color: #015D67 !important;
			/* Warna tombol */
			position: relative;
			top: 50%;
			/* Geser vertikal */
			right: 45%;
			/* Geser horizontal */
		}

		/* Media query untuk layar yang lebih kecil */
		@media (max-width: 629px) {
			.swal-modal {
				width: 90% !important;
				/* Sesuaikan lebar untuk layar kecil */
				max-width: 90%;
				height: auto;
				/* Atur tinggi secara otomatis */
			}

			.swal-content {
				width: 95%;
				/* Sesuaikan lebar konten untuk layar kecil */
				max-width: none;
				/* Hapus batasan lebar maksimum */
				height: 10%;
			}
		}
	</style>

</head>

<body style="background-color:#015D67;">
