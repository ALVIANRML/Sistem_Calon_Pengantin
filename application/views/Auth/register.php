<div class="container">
	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">
				<!-- Kolom kiri untuk gambar -->
				<div class="col-lg-7 d-none d-lg-flex justify-content-center align-items-center" style="background-color: #015D67;">
					<img src="<?php echo base_url(); ?>assets/img/percatin_log.png" alt="logo percatin" class="img-fluid" style="max-height: 40vh;">
				</div>
				<!-- Kolom kanan untuk form -->
				<div class="col-lg-5 p-5">
					<div class="text-center">
						<img src="<?php echo base_url(); ?>assets/img/percatin_log.png" alt="logo percatin" class="img-fluid" style="max-height: 15vh; width: 15vh; margin-left:-45vh; color:#015D67;flex-shrink: 0;">
						<h5 class="text-gray-900 mt-4" style="color: #171717; font-family: 'Arial Black', sans-serif; font-size: 20px; font-weight: 700; letter-spacing: -1.44px; margin-left:-32.5vh;">
							<b>Daftar akun Anda</b>
						</h5>
						<p class="mb-4" style="color: #171717; font-family: 'Arial'; font-size: 12px; font-weight: 400; letter-spacing: -0.64px; margin-top: -10px; margin-left: -36vh">
							Isi detail Anda untuk mendaftar
						</p>
					</div>
					<form method="post" action="<?= base_url('auth/register') ?>">
						<div class="form-group" style="margin-bottom: 5px;">
							<label for="nama" style="font-size: 2vh; margin-bottom: 5px;"><b>Username</b></label>
							<input type="text" class="form-control form-control-user placeHolder" id="nama" placeholder="Masukkan username (contohnya: Andi_123)" style="font-size: 2vh; width: 100%;" name="nama" value="<?= set_value('nama') ?>">
							<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>


						<div class="form-group" style="margin-bottom: 5px;">
							<label for="tanggal_lahir" style="font-size: 2vh; margin-bottom: 5px;"><b>Tanggal Lahir</b></label>
							<input type="date" class="form-control form-control-user placeHolder" id="tanggal_lahir" style="font-size: 2vh;" name="tanggal_lahir" value="<?= set_value('tanggal_lahir') ?>">
							<?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group" style="margin-bottom: 5px;">
							<label for="nomor_telepon" style="font-size: 2vh; margin-bottom: 5px;"><b>Nomor Telepon</b></label>
							<input type="text" class="form-control form-control-user" id="nomor_telepon" placeholder="08*********" style="font-size: 2vh;" name="nomor_telepon" value="<?= set_value('nomor_telepon') ?>">
							<?= form_error('nomor_telepon', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						
						<div class="form-group" style="margin-bottom: 40px; position: relative;">
							<label for="password1" style="font-size: 2vh; margin-bottom: 5px;"><i class="zmdi zmdi-lock"></i><b>Ulangi Password</b></label>
							<div class="password-field" style="position: relative;">
								<input type="password" class="form-control form-control-user" id="password1" placeholder="******" style="font-size: 2vh; padding-right: 40vh;" name="password1">
								<span class="toggle-password" onclick="togglePasswordVisibility('password1')" style="position: absolute; top: 3vh; right: 2vh; transform: translateY(-50%); cursor: pointer;">
									<i id="toggle-icon-2" class="zmdi zmdi-eye">👁️</i>
								</span>
								<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							
							<div class="form-group" style="margin-bottom: 40px; position: relative;">
								<label for="password2" style="font-size: 2vh; margin-bottom: 5px;"><b>Ulangi Password</b></label>
								<div class="password-field" style="position: relative;">
									<input type="password" class="form-control form-control-user"  id="password2" placeholder="******" style="font-size: 2vh; padding-right: 40vh;" name="password2">
									<span class="toggle-password" onclick="togglePasswordVisibility('password2')" style="position: absolute; top: 3vh; right: 2vh; transform: translateY(-50%); cursor: pointer; ">
										<i id="toggle-icon-2" class="zmdi zmdi-eye">👁️</i>
									</span>
									<?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>


<br>
							<button type="submit" id="submit" name="submit" class="btn btn-primary btn-user btn-block" style="background-color: #015D67;">Daftar</button>
					</form>

					<div class="text-center" style="margin-top: 30vh;">
						<p style="color: black">Sudah punya Akun? <a class="small" href="<?= base_url('auth/login'); ?>">Masuk</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?= base_url(); ?>assets/login/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/login/js/main.js"></script>

<script>
	function togglePasswordVisibility(inputId) {
		var passwordField = document.getElementById(inputId);
		var toggleIcon = document.querySelector(`#${inputId} ~ .toggle-password i`);

		if (passwordField.type === 'password') {
			passwordField.type = 'text';
			toggleIcon.textContent = '🙈'; // Change icon to hide password
		} else {
			passwordField.type = 'password';
			toggleIcon.textContent = '👁️'; // Change icon to show password
		}
	}
</script>


