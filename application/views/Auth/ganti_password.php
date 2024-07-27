

<div class="container">
	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">
				<!-- Kolom kiri untuk gambar -->
				<div class="col-lg-7 d-none d-lg-flex justify-content-center align-items-center" style="background-color: #015D67; margin:0vh;">
					<img src="<?php echo base_url(); ?>assets/img/percatin_log.png" alt="logo percatin" class="img-fluid" style="max-height: 40vh;">
				</div>

				<!-- Kolom kanan untuk form -->
				<div class="col-lg-5 p-5">
					<div class="text-center">

						<img src="<?php echo base_url(); ?>assets/img/percatin_log.png" alt="logo percatin" class="img-fluid" style="max-height: 15vh; width: 15vh; margin-left:-35vh; color:#015D67;flex-shrink: 0;">

						<h5 class="text-gray-900 mt-4" style="color: #171717; font-family: 'Arial Black', sans-serif; font-size: 3.4vh; font-weight: 700; letter-spacing: -1.44px; margin-left:-17vh;">
							<b>Ganti Password</b>
						</h5>
						<p class="mb-4" style="color: #171717; font-family: 'Arial'; font-size: 12px; font-weight: 400; letter-spacing: -0.64px; margin-top: -10px; margin-left: -5vh">
						
						</p>
					</div>
					<hr>
					<form method="post" action="<?= base_url('auth/ganti_password') ?>">
						<div class="form-group" style="margin-bottom: 5px;">
							<label for="password_lama" style="font-size: 2vh; margin-bottom: 5px;"><b>Password lama</b></label>
							<input type="password" class="form-control form-control-user placeHolder" id="password_lama" placeholder="Masukkan Password lama anda" style="font-size: 2vh; width: 100%;" name="password_lama">
							<span class="toggle-password" onclick="togglePasswordVisibility('password_lama')" style="position: absolute; top: 3vh; right: 2vh; transform: translateY(-50%); cursor: pointer;">
									<!-- <i id="toggle-icon-password1" class="fas fa-eye"></i> -->
								</span>
								<?= form_error('password_lama', '<small class="text-danger pl-3">', '</small>'); ?>
								<?php if ($this->session->flashdata('reset_error')) : ?>
									<small class="text-danger pl-3"><?= $this->session->flashdata('reset_error') ?></small>
								<?php endif; ?>
								
						</div>
						<div class="form-group" style="margin-bottom: 5px;">
							<label for="password_baru" style="font-size: 2vh; margin-bottom: 5px;"><b>Password Baru</b></label>
							<input type="password" class="form-control form-control-user placeHolder" id="password_baru" placeholder="Masukkan Password lama anda" style="font-size: 2vh; width: 100%;" name="password_baru">
							<?= form_error('password_baru', '<small class="text-danger pl-3">', '</small>'); ?>
							
						</div>
						<div class="form-group" style="margin-bottom: 5px;">
							<label for="password_baru1" style="font-size: 2vh; margin-bottom: 5px;"><b>Konfirmasi Password</b></label>
							<input type="password" class="form-control form-control-user placeHolder" id="password_baru1" placeholder="Masukkan Password lama anda" style="font-size: 2vh; width: 100%;" name="password_baru1" value="<?= set_value('password_baru1') ?>">
							<?= form_error('password_baru1', '<small class="text-danger pl-3">', '</small>'); ?>
					<br> <!-- Pindahkan pesan error ke baris baru -->
								<a class="small" style="color: #015D67; text-align: right; display: block; margin-right: 10px;top=20%;margin-top:-2.5vh;margin-bottom:2vh" href="<?= base_url('auth/lupa_password'); ?>">Lupa Password?</a>
						</div>
				
				
						<button type="submit" id="submit" name="submit" class="btn btn-primary btn-user btn-block" style="background-color: #015D67;">Kirim Permintaan</button>
						<?php echo form_close(); ?>
			</form>
					<hr>
					<div class="text-center" style="margin-top: 1vh;">
						<p style="color: black; font-size:11px;  text-align: left;">Situs ini dilindungi oleh <a class="medium" style="color: #015D67;" href="<?= base_url('auth/register'); ?>">Kebijakan Privasi Google</a> dan <a class="medium" style="color: #015D67;" href="<?= base_url('auth/register'); ?>"> Ketentuan Layanan</a> yang berlaku </p>
					</div>
					<div class="text-center" style="margin-top:30vh;">

					</div>
				</div>
			</div>
		</div>
	</div>

