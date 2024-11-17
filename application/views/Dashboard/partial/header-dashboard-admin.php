<div class="header-dashboard-admin">
			<div class="container-logo">
				<img src="<?= base_url('assets/') ?>img/percantin.png" alt="">
				<p>PERCATIN</p>
			</div>
			<div class="profil-container">
				<div class="foto-profil">
					<img src="<?= base_url('assets/img/profile-admin.png') ?>" alt="">
				</div>
				<div style="display: flex; flex-direction: column;">
					<p style="color: #7F7F7F; font-size: 12px; font-weight: 600;">Halo,</p>
					<p class="nama"><?= $this->session->userdata('username'); ?></p>
				</div>
				<!-- Dropdown -->
				<div class="dropdown-logo">
					<img src="<?= base_url('assets/img/dropdown.svg') ?>" alt="">
					<div class="dropdown" style="width: 122%;">
						<div> <a href="<?= base_url('auth/ganti_password') ?>" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Ganti Password </a>
						</div>
						<div><a href="<?= base_url('auth/login') ?>" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Keluar </a></div>
					</div>
				</div>
				<!-- End of Dropdown -->
			</div>
		</div>
