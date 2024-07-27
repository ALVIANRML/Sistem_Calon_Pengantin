<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/admin.css') ?>" />
</head>

<body>
    <div class="container">
        <div class="header-dashboard-admin">
            <div class="container-logo">
                <img class="logo" src="<?= base_url('assets/') ?>img/percantin.png">
                <p>PERCATIN</p>
            </div>
            <div class="profil-container" style="display: flex; align-items: center;">
                <div class="foto-profil" style="margin-right: 10px;">
                    <img src="<?= base_url('assets/') ?>img/percantin.png" alt="fo" style="width:6vh; height:6.5vh;margin-right:6vh">
                </div>
                <div style="display: flex; flex-direction: column; margin-left:0vh">
                    <p style="color: #7F7F7F; font-size: 12px; font-weight: 600; margin-right: 4vh;">Halo,</p>
                    <p class="nama"><?= $this->session->userdata('username'); ?></p>
                </div>
                <div class="dropdown">

                    <button style="border:none; background-color:white; margin-left:-4vh; width:6vh;height:5vh; margin-top:1vh;">
                        <img src="<?= base_url('assets/img/dropdown.svg') ?>" alt="" style="margin-left: auto; cursor: pointer;" class="dropdown-button">
                    </button>
                    <div class="dropdown-menu">
                    <a href="<?= base_url('auth/ganti_password') ?>" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Ganti Password</a>
                    <a href="<?= base_url('auth/login') ?>" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Keluar</a>
                    </div>
                </div>
                </div>
        </div>
        <div class="container-sidebar-dashboard-admin">
            <p>NAVIGASI</p>
            <a href="#">
                <div class="menu dashboard-menu">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="Frame">
                            <path id="Vector" d="M13 9V3H21V9H13ZM3 13V3H11V13H3ZM13 21V11H21V21H13ZM3 21V15H11V21H3ZM5 11H9V5H5V11ZM15 19H19V13H15V19ZM15 7H19V5H15V7ZM5 19H9V17H5V19Z" fill="#828282" />
                        </g>
                    </svg>
                    <p class="menu-text">Dashboard</p>
                </div>
            </a>
            <a href="<?= base_url('Dashboard_Admin/view_data_catin') ?>">
                <div class="menu">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="Frame">
                            <path id="Vector" d="M15 21V18H11V8H9V11H2V3H9V6H15V3H22V11H15V8H13V16H15V13H22V21H15ZM17 9H20V5H17V9ZM17 19H20V15H17V19ZM4 9H7V5H4V9Z" fill="#828282" />
                        </g>
                    </svg>
                    <p class="menu-text">Data Catin</p>
                </div>
            </a>
            <a href="#">
                <div class="menu">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="material-symbols-light:data-table">
                            <path id="Vector" d="M4.00001 8.92304H20V5.38504C20 5.23104 19.936 5.09004 19.808 4.96204C19.68 4.83404 19.539 4.76971 19.385 4.76904H4.615C4.46167 4.76904 4.32067 4.83304 4.19201 4.96104C4.06334 5.08904 3.99934 5.23004 4.00001 5.38404V8.92304ZM4.00001 14.077H20V9.92304H4.00001V14.077ZM4.615 19.231H19.385C19.5383 19.231 19.6793 19.1667 19.808 19.038C19.9367 18.9094 20.0007 18.7684 20 18.615V15.077H4.00001V18.616C4.00001 18.7694 4.06401 18.9104 4.19201 19.039C4.32001 19.1677 4.461 19.2317 4.615 19.231ZM5.77001 7.65404V6.03904H7.38501V7.65404H5.77001ZM5.77001 12.808V11.192H7.38501V12.808H5.77001ZM5.77001 17.962V16.346H7.38501V17.962H5.77001Z" fill="#828282" />
                        </g>
                    </svg>
                    <p class="menu-text">Data Penyakit</p>
                </div>
            </a>
            <a href="#">
                <div class="menu">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="material-symbols-light:data-table">
                            <path id="Vector" d="M4.00001 8.92304H20V5.38504C20 5.23104 19.936 5.09004 19.808 4.96204C19.68 4.83404 19.539 4.76971 19.385 4.76904H4.615C4.46167 4.76904 4.32067 4.83304 4.19201 4.96104C4.06334 5.08904 3.99934 5.23004 4.00001 5.38404V8.92304ZM4.00001 14.077H20V9.92304H4.00001V14.077ZM4.615 19.231H19.385C19.5383 19.231 19.6793 19.1667 19.808 19.038C19.9367 18.9094 20.0007 18.7684 20 18.615V15.077H4.00001V18.616C4.00001 18.7694 4.06401 18.9104 4.19201 19.039C4.32001 19.1677 4.461 19.2317 4.615 19.231ZM5.77001 7.65404V6.03904H7.38501V7.65404H5.77001ZM5.77001 12.808V11.192H7.38501V12.808H5.77001ZM5.77001 17.962V16.346H7.38501V17.962H5.77001Z" fill="#828282" />
                        </g>
                    </svg>
                    <p class="menu-text">Data Gejala</p>
                </div>
            </a>
            <a href="#">
                <div class="menu">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="flowbite:users-solid">
                            <path id="Vector" fill-rule="evenodd" clip-rule="evenodd" d="M8 4.00001C6.93913 4.00001 5.92172 4.42144 5.17157 5.17159C4.42143 5.92173 4 6.93915 4 8.00001C4 9.06088 4.42143 10.0783 5.17157 10.8284C5.92172 11.5786 6.93913 12 8 12C9.06087 12 10.0783 11.5786 10.8284 10.8284C11.5786 10.0783 12 9.06088 12 8.00001C12 6.93915 11.5786 5.92173 10.8284 5.17159C10.0783 4.42144 9.06087 4.00001 8 4.00001ZM6 13C4.93913 13 3.92172 13.4214 3.17157 14.1716C2.42143 14.9217 2 15.9391 2 17V18C2 18.5304 2.21071 19.0392 2.58579 19.4142C2.96086 19.7893 3.46957 20 4 20H12C12.5304 20 13.0391 19.7893 13.4142 19.4142C13.7893 19.0392 14 18.5304 14 18V17C14 15.9391 13.5786 14.9217 12.8284 14.1716C12.0783 13.4214 11.0609 13 10 13H6ZM13.25 10.905C13.728 10.045 14 9.05501 14 8.00001C14.0002 6.98345 13.7421 5.9835 13.25 5.09401C13.8178 4.55674 14.5306 4.19763 15.3003 4.06104C16.07 3.92446 16.8628 4.0164 17.5808 4.3255C18.2988 4.6346 18.9106 5.14731 19.3403 5.80026C19.7701 6.45322 19.9992 7.2178 19.9992 7.99951C19.9992 8.78123 19.7701 9.54581 19.3403 10.1988C18.9106 10.8517 18.2988 11.3644 17.5808 11.6735C16.8628 11.9826 16.07 12.0746 15.3003 11.938C14.5306 11.8014 13.8178 11.4423 13.25 10.905ZM15.466 20C15.806 19.412 16.001 18.729 16.001 18V17C16.0028 15.5238 15.4586 14.099 14.473 13H18C19.0609 13 20.0783 13.4214 20.8284 14.1716C21.5786 14.9217 22 15.9391 22 17V18C22 18.5304 21.7893 19.0392 21.4142 19.4142C21.0391 19.7893 20.5304 20 20 20H15.466Z" fill="#828282" />
                        </g>
                    </svg>
                    <p class="menu-text">Data User</p>
                </div>
            </a>
        </div>

        <div class="container-content">
            <div class="container-content-dashboard-admin">
                <p>Dashboard</p>
                <div class="container-card-dashboard">
                    <div class="card-dashboard" id="biru">
                        <img class="logo" src="<?= base_url('assets/') ?>img/paper.svg"" alt="">
                        <div class=" container-judul-jumlah">
                        <p class="judul-card-dashboard">Data Catin</p>
                        <p class="jumlah-card-dashboard"><?= $this->session->userdata('data_catin') ?></p>
                    </div>
                    <p class="selengkapnya-text">Selengkapnya ></p>
                </div>
                <div class="card-dashboard" id="hijau">
                    <img class="logo" src="<?= base_url('assets/') ?>img/printer.svg" alt="">
                    <div class="container-judul-jumlah">
                        <p class="judul-card-dashboard">Cetak Kartu</p>
                        <p class="jumlah-card-dashboard"><?= $this->session->userdata('cetak_kartu') ?></p>
                    </div>
                    <p class="selengkapnya-text">Selengkapnya ></p>
                </div>
                <div class="card-dashboard" id="merah">
                    <img class="logo" src="<?= base_url('assets/img/warning.svg') ?>" alt="">
                    <div class="container-judul-jumlah">
                        <p class="judul-card-dashboard">Data Catin Beresiko Stunting</p>
                        <p class="jumlah-card-dashboard"><?= $this->session->userdata('catin_bermasalah') ?></p>
                    </div>
                    <p class="selengkapnya-text">Selengkapnya ></p>
                </div>
                <div class="card-dashboard" id="merah">
                <img class="logo" src="<?= base_url('assets/img/narkobski.svg') ?>" alt="">
                    <div class="container-judul-jumlah">
                        <p class="judul-card-dashboard">Data Catin Beresiko Narkoba</p>
                        <p class="jumlah-card-dashboard"><?= $this->session->userdata('catin_bermasalah') ?></p>
                    </div>
                    <p class="selengkapnya-text">Selengkapnya ></p>
                </div>
                <div class="card-dashboard" id="merah">
                <img class="logo" src="<?= base_url('assets/img/hiv.svg') ?>" alt="">
                    <div class="container-judul-jumlah">
                        <p class="judul-card-dashboard">Data Catin Beresiko HIV</p>
                        <p class="jumlah-card-dashboard"><?= $this->session->userdata('catin_bermasalah') ?></p>
                    </div>
                    <p class="selengkapnya-text">Selengkapnya ></p>
                </div>
            </div>
            <div class="edit-pendaftaran-btn">
            <img class="logo" src="<?= base_url('assets/') ?>img/edit_tanggal.svg" alt="">
                <p>Edit Pendaftaran</p>
            </div>
            <div class="tanggal-pemeriksaan">
                <p>Tanggal Pemeriksaan</p>
                <div class="container-tanggal-pemeriksaan">
                    <?php $buka = 0;
                    if ($buka == 1) :
                    ?>
                    <div class="subcontainer-tanggal-pemeriksaan"> 
                        <div class="tanggal-buka-tutup">03-03-2004</div>
                        <div class="buka-tutup-btn buka-btn">Pendaftaran Dibuka</div>
                    </div>
                    <?php else :?>
                    <div class="subcontainer-tanggal-pemeriksaan">
                        <div class="tanggal-buka-tutup">03-03-2004</div>
                        <div class="buka-tutup-btn tutup-btn">Pendaftaran Ditutup</div>
                    </div>
                    <?php endif ?>
                </div>
            </div>
            <div class="copyright-text">
                Copyright © 2024 DPPKB Kota Tebing. Hak cipta dilindungi
            </div>
        </div>
    </div>

    </div>
    

</body>

</html>