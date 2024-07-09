<?php if ($this->session->flashdata('login_error')) { ?>
	<script>
		swal({
			title: "Error!",
			text: "Username atau password salah.",
			icon: "error"
		});
	</script>
<?php } ?>


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
							<b>Lupa kata sandi?</b>
						</h5>
						<p class="mb-4" style="color: #171717; font-family: 'Arial'; font-size: 12px; font-weight: 400; letter-spacing: -0.64px; margin-top: -10px; margin-left: -5vh">
							Amankan kembali akun Anda dengan reset kata sandi
						</p>
					</div>
					<hr>
					<form method="post" action="<?= base_url('auth/lupa_password') ?>">
						<div class="form-group" style="margin-bottom: 5px;">
							<label for="nomor_telepon" style="font-size: 2vh; margin-bottom: 5px;"><b>Nomor Handphone</b></label>
							<input type="text" class="form-control form-control-user placeHolder" id="nomor_telepon" placeholder="+62812**" style="font-size: 2vh; width: 100%;" name="nomor_telepon" value="<?= set_value('nomor_telepon') ?>">
							<?= form_error('nomor_telepon', '<small class="text-danger pl-3">', '</small>'); ?>
							<?php if ($this->session->flashdata('message')) : ?>
                        <p class="text-danger pl-3" style="font-size: small;"> <?php echo $this->session->flashdata('message'); ?>
                        </p>
                    <?php endif; ?>
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
	<script>
// Script untuk memastikan nilai awal tidak dihapus
document.addEventListener('DOMContentLoaded', function() {
    var inputNomor = document.getElementById('nomor_telepon');
    inputNomor.addEventListener('input', function() {
        if (!inputNomor.value.startsWith('+62')) {
            inputNomor.value = '+62';
        }
    });
});
</script>
