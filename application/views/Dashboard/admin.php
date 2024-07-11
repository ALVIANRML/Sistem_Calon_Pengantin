<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard admin</title>
</head>

<body>
	<form action="<?= base_url('dashboard/admin') ?>" method="post">
		<div>
			<label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
			<?php $today = date('Y-m-d');?>
			<input type="date" name="tanggal_pemeriksaan" onload="getDate()" id="tanggal_pemeriksaan" value="<?php echo $today; ?>"">
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
