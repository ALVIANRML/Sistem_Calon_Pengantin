 
<script src="<?= base_url(); ?>assets/login/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/login/js/main.js"></script>

<script>
	function togglePasswordVisibility(inputId) {
		var passwordField = document.getElementById(inputId);
		var toggleIcon = document.getElementById('toggle-icon-' + inputId);

		if (passwordField.type === 'password') {
			passwordField.type = 'text';
			toggleIcon.classList.remove('fa-eye');
			toggleIcon.classList.add('fa-eye-slash');
		} else {
			passwordField.type = 'password';
			toggleIcon.classList.remove('fa-eye-slash');
			toggleIcon.classList.add('fa-eye');
		}
	}
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 
 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

	<!-- JS  -->
	  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Function to show error modal
        function showErrorModal() {
            $('#errorModal').modal('show');
        }
    </script>

</body>

</html>
