
	<?php if ($this->session->flashdata('reset_success')) { ?>
    
	<script>
		
        swal({
            title: "Informasi",
            content: {
                element: "div",
                attributes: {
                    innerHTML: "<hr><br><?php echo $this->session->flashdata('reset_success'); ?>Anda akan diarahkan ke halaman login.&ensp;&ensp;<br><br><hr>"
                },
            },
            // icon: "success"
        }).then((willRedirect) => {
            if (willRedirect) {
                window.location.href = "<?php echo base_url('auth/login'); ?>";
            }
        });
    </script>
<?php } ?>


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
                <div class="row">
                    <div class="col-lg-7 d-none d-lg-flex justify-content-center align-items-center" style="background-color: #015D67; margin:0vh;">
                        <img src="<?php echo base_url(); ?>assets/img/percatin_log.png" alt="logo percatin" class="img-fluid" style="max-height: 40vh;">
                    </div>
                    <div class="col-lg-5 p-5">
                        <div class="text-center">
                            <img src="<?php echo base_url(); ?>assets/img/percatin_log.png" alt="logo percatin" class="img-fluid" style="max-height: 15vh; width: 15vh; margin-left:-35vh; color:#015D67;flex-shrink: 0;">
                            <h5 class="text-gray-900 mt-4" style="color: #171717; font-family: 'Arial Black', sans-serif; font-size: 3.4vh; font-weight: 700; letter-spacing: -1.44px; margin-left:.0vh;">
                                <b>Reset Kata Sandi</b>
                            </h5>
                            <hr>
                        </div>
                        <form method="post" action="<?= base_url('auth/reset_password') ?>">
                            <div class="form-group" style="margin-bottom: 40px; position: relative;">
                                <label for="password1" style="font-size: 2vh; margin-bottom: 5px;"><i class="zmdi zmdi-lock"></i><b>Kata sandi baru</b></label>
                                <div class="password-field" style="position: relative;">
                                    <input type="password" class="form-control form-control-user" id="password1" placeholder="******" style="font-size: 2vh; width:100%;" name="password1">
                                    <span class="toggle-password" onclick="togglePasswordVisibility('password1')" style="position: absolute; top: 3vh; right: 2vh; transform: translateY(-50%); cursor: pointer;">
                                        <i id="toggle-icon-password1" class="fas fa-eye"></i>
                                    </span>
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <p><?php if ($this->session->flashdata('login_error')) : ?>
                                            <small class="text-danger pl-3"><?= $this->session->flashdata('login_error') ?></small>
                                        <?php endif; ?>
                                    </p>
                                </div>

                                <div class="form-group" style="margin-bottom: 40px; position: relative;">
                                    <label for="password2" style="font-size: 2vh; margin-bottom: 5px;"><i class="zmdi zmdi-lock"></i><b>Konfirmasi kata sandi baru</b></label>
                                    <div class="password-field" style="position: relative;">
                                        <input type="password" class="form-control form-control-user" id="password2" placeholder="******" style="font-size: 2vh; width:100%;" name="password2">
                                        <span class="toggle-password" onclick="togglePasswordVisibility('password2')" style="position: absolute; top: 3vh; right: 2vh; transform: translateY(-50%); cursor: pointer;">
                                            <i id="toggle-icon-password2" class="fas fa-eye"></i>
                                        </span>
                                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <p><?php if ($this->session->flashdata('login_error')) : ?>
                                                <small class="text-danger pl-3"><?= $this->session->flashdata('login_error') ?></small>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                    <button type="submit" id="submit" name="submit" class="btn btn-primary btn-user btn-block" style="background-color: #015D67;">Perbarui Kata Sandi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
