<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>D_admin</title>
</head>

<body>
	<?= $this->session->flashdata('error_tanggal') ?>
	<form action="<?= base_url('dashboard/tanggal') ?>" method="post">
		<div>
			<label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
			<?php $today = date('Y-m-d');?>
			<input type="date" name="tanggal_pemeriksaan" id="tanggal_pemeriksaan" value="<?= $this->session->userdata('tanggal')?>"">
			<label for="status">input status</label>	
			<input type="number" name="status" id="status">
			<button type="submit">Update tanggal pemeriksaan</button>
		</div>
	</form>
	<script>
		document.getElementById("date").valueAsDate = new Date();
	</script>
</body>


</html>
