<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/contact.css">
	<title>Contact</title>
</head>

<body>
	<div class="contact_container">
		<div class="contact_pertanyaan">
			<h1 class="contact_pertanyaan_title">Ada Pertanyaan?</h1>
			<div class="contact_pertanyaan_isi">
				<div class="isi">
					<h4>Phone</h4>
					<p>+1 123-456-7890</p>
				</div>
				<div class="isi">
					<h4>Email</h4>
					<p>info@example.com</p>
				</div>
				<div class="isi">
					<h4>Address</h4>
					<p>123 Main Street, City, State, Country</p>
				</div>
				
			</div>
			<img src="<?php echo base_url(); ?>assets/img/maps_contact.png" alt="logo percatin" class="img-fluid" style="width:75vh";>
		</div>


		<div class="contact_form">
			<h1 class="contact_form_title">Form Kontak</h1>
			<form style="margin-top: 2vh;">
				<div class="name_container">
					<div class="input_container">
						<label for="first_name">Name</label>
						<input type="text" id="first_name" name="first_name">
					</div>
					<div class="input_container">
						<label for="last_name">Surname</label>
						<input type="text" id="last_name" name="last_name">
					</div>
				</div>
				<div class="name_container">
					<div class="input_container">
						<label for="last_name">Mail</label>
						<input type="text" id="last_name" name="last_name">
					</div>
				</div>
				<div class="name_container">
					<div class="input_container">
						<label for="last_name">Address</label>
						<input type="text" id="last_name" name="last_name">
					</div>
				</div>
				<div class="name_container">
					<div class="input_container">
						<label for="last_name">Description</label>
						<input type="text" id="last_name" name="last_name" class="element" style="height: 150px;">
					</div>
				</div>
				
				<button class="button_form" style="align-items: center;">Submit</button>
			</form>
		</div>
	</div>
	<!-- Form fields lainnya -->
	
	</div>

	</div>
	</div>

	</div>
</body>

</html>
