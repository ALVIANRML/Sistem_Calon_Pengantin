<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/home.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="header-container">
                <img class="logo" src="<?= base_url('assets/')?>img/logo.png" alt="">
                    <div class="navbar">
                        <nav>
                            <ul>
                                <li><a href="#">Tentang</a></li>
                                <li><a href="#">Struktur</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Kontak</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="daftar-masuk">
                        <button class="btn">Daftar</button>
                        <button class="btn">Masuk</button>
                    </div>
            </div>
        </header>
        <div class="home">
            <img class="hero-home" src="<?= base_url('assets/')?>img/hero.png" alt="">
            <div class="desc-container">
                <div class="desc">
                    <p class="teks-1">PERCANTIN</p>
                    <p class="teks-2">Pemeriksaan Calon</p>
                    <p class="teks-2">Pengantin</p>
                </div>
                <button class="btn-masuk">Masuk</button>
                <p class="teks-3">Belum mempunyai akun? <span class="span-1">Daftar</span></p>
            </div>
            <img src="<?= base_url('assets/')?>img/percantin.png" alt="">
        </div>
    </div>
</body>
</html>
