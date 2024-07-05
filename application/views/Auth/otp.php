<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP</title>
</head>
<body>
    <h2>Masukkan OTP</h2>
    <form action="<?php echo base_url('auth/verified_otp'); ?>" method="post">
        <input type="text" name="otp_input" placeholder="Masukkan OTP Anda" required>
        <button type="submit">Verifikasi</button>
    </form>
</body>
</html>
