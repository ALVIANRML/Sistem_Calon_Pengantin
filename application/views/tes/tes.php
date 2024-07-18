<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('tes/do_upload');?>

<input type="file" name="userfile" size="1048" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>
