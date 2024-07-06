<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/contact.css">
    <title>Contact</title>
</head>

<body>
    <div class="contact_container">
        <div class="contact_pertanyaan">
            <h1 class="contact_pertanyaan_title">Ada Pertanyaan?</h1>
            <div class="contact_pertanyaan_isi" style="margin-bottom: 0vh; margin-top:0vh;">
                <div class="isi" style="width: 20%;">
                    <h4>Phone</h4>
                    <p style="margin-top: -10px;">(0621)-21536</p>
                </div>
                <div class="isi" style="width: 40%;">
                    <h4>Email</h4>
                    <p style="margin-top: -10px;">dppappkb@tebingtinggikota.go.id</p>
                </div>
                <div class="isi" style="width: 24%;">
                    <h4>Address</h4>
                    <p style="margin-top: -10px;">Jl. Gunung Leuser No. 3, Kota Tebing Tinggi Sumatera Utara Indonesia Kode POS : 20614</p>
                </div>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.986706135521!2d99.16206607473123!3d3.353395096621332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303161da98f8c417%3A0xa9aa16030bbeef11!2sDinas%20PPKB%20Kota%20Tebing%20Tinggi!5e0!3m2!1sid!2sid!4v1705589852672!5m2!1sid!2sid"
                frameborder="0" style="width:90vh; height: 65vh; margin-top:30px; border-radius:10px;" allowfullscreen></iframe>
        </div>

        <div class="contact_form">
            <h1 class="contact_form_title">Form Kontak</h1>
            <form style="margin-top: 2vh;" action="<?= base_url('beranda/contact') ?>" method="post">
                <div class="name_container">
                    <div class="input_container">
                        <label for="first_name">First Name</label>
                        <input type="text" placeholder="Jude" id="first_name" name="first_name" value="<?= set_value('first_name') ?>">
                        <?= form_error('first_name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="input_container">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" placeholder="Bellingham" name="last_name" value="<?= set_value('last_name') ?>">
                        <?= form_error('last_name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="name_container">
                    <div class="input_container">
                        <label for="email">Email</label>
                        <input type="text" id="email" placeholder="email address" name="email" value="<?= set_value('email') ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="name_container">
                    <div class="input_container">
                        <label for="address">Address</label>
                        <input type="text" id="address" placeholder="Real Madrid" name="address" value="<?= set_value('address') ?>">
                        <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="name_container">
                    <div class="input_container">
                        <label for="description">Description</label>
                        <input type="text" id="description" name="description" class="element" style="height: 150px;" value="<?= set_value('description') ?>">
                        <?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <button class="button_form" style="align-items: center;">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
