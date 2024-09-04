<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Kendali</title>
</head>

<body>

<?php
                                            $id = 0;
                                            foreach($user as $i)
                                            :
                                            $id++;
                                            $id_user = $i['id_user'];
                                            $username = $i['nama'];
                                            $email = $i['nomor_telepon'];
                                            $nik = $i['nik']; 
                                            $no_pendaftaran = $i['no_pendaftaran'];
                                            $nama_lengkap = $i['nama_lengkap']; 
                                            $tempat_lahir = $i['tempat_lahir'];
                                            $tanggal_lahir = $i['tanggal_lahir'];
                                            // Mengonversi format tanggal
                                            $tanggal_lahir_format = date("d F Y", strtotime($tanggal_lahir));
                                            $usia = $i['usia'];
                                            $jenis_kelamin = $i['jenis_kelamin']; 
                                            $agama = $i['agama'];
                                            $tinggi_badan = $i['tinggi_badan'];
                                            $berat_badan = $i['berat_badan'];
                                            $imt = $i['imt'];
                                            $pendidikan_terakhir = $i['pendidikan_terakhir'];
                                            // $no_hp = $i['no_hp'];
                                            $kecamatan = $i['kecamatan'];
                                            $kelurahan = $i['kelurahan'];
                                            $alamat = $i['alamat'];
                                            $nikahke = $i['pernikahan_ke'];
                                            $tanggal_nikah = $i['tanggal_pernikahan'];
                                            $tanggal_periksa = $i['tanggal_periksa']; 
                                            // Mengonversi format tanggal
                                            $tanggal_periksa_format = date("d F Y", strtotime($tanggal_periksa));
                                            $foto_saya = $i['foto_user'];
                                            $foto_ktp = $i['foto_ktp'];
                                            $foto_kk = $i['foto_kk'];
                                            $foto_surat = $i['foto_surat'];
                                            $date_registered = $i['data_registered'];
                                            $id_status_verifikasi = $i['id_status_verifikasi'];
                                            $id_status_perpanjangan = $i['id_status_perpanjangan'];
                                            $id_status_aktif = $i['id_status_aktif'];
                                            $id_status_kesehatan = $i['id_status_kesehatan'];
                                            $id_status_bnn = $i['id_status_bnn'];
                                            $id_status_psikolog = $i['id_status_psikolog'];
                                            $mulai_berlaku = $i['mulai_berlaku'];
                                            $akhir_berlaku = $i['akhir_berlaku'];
                                            $kode_catin = $i['kode_catin'];
                                            $nama_sakit_catin = $i['nama_sakit_catin'];
                                            $kepercayaan_catin = $i['kepercayaan_catin'];
                                            $keterangan_catin = $i['keterangan_catin'];
                                            $pekerjaan = $i['pekerjaan'];
                                            //Data Hasil Periksa Kesehatan :
                                            $tekanan_sistolik = $i['tekanan_sistolik'];
                                            $tekanan_diastolik = $i['tekanan_diasistolik'];
                                            $nadi = $i['nadi'];
                                            $nafas = $i['nafas'];
                                            $suhu = $i['suhu'];
                                            $lila = $i['lila'];
                                            $suntik_tt = $i['suntik_tt'];
                                            $hb = $i['hb'];
                                            $gol_darah = $i['gol_darah'];
                                            $rapid_test = $i['rapid_test'];
                                            $plano_test = $i['plano_test'];
                                            $kode_kesehatan = $i['kode_kesehatan'];
                                            $nama_sakit_kesehatan = $i['nama_sakit_kesehatan'];
                                            $kepercayaan_kesehatan = $i['kepercayaan_kesehatan'];
                                            $keterangan_kesehatan = $i['keterangan_kesehatan'];
                                            $nama_pemeriksa_kesehatan = $i['nama_pemeriksa_kesehatan'];
                                            $nama_faskes = $i['nama_faskes'];
                                            $tanda_anemia = $i['tanda_anemia'];
                                            //Data Hasil Periksa BNN
                                            $id_pemeriksaan_bnn = $i['id_pemeriksaan_bnn'];
                                            $narkoba_test = $i['narkoba_test'];
                                            $nama_pemeriksa_bnn = $i['nama_pemeriksa_bnn'];
                                            $nama_bnn = $i['nama_bnn'];
                                            $kode_bnn = $i['kode_bnn'];
                                            $nama_sakit_bnn = $i['nama_sakit_bnn'];
                                            $kepercayaan_bnn = $i['kepercayaan_bnn'];
                                            $keterangan_bnn = $i['keterangan_bnn'];
                                            //Hasil Psikolog
                                            $id_pemeriksaan_psikolog = $i['id_pemeriksaan_psikolog'];
                                            $kode_psikolog = $i['kode_psikolog'];
                                            $nama_sakit_psikolog = $i['nama_sakit_psikolog'];
                                            $kepercayaan_psikolog = $i['kepercayaan_psikolog'];
                                            $keterangan_psikolog = $i['keterangan_psikolog'];
                                            $nama_pemeriksa_psikolog = $i['nama_pemeriksa_psikolog'];
                                            ?>

<div class="Frame2" style="width: 700px; height: 990.59px; position: relative; background: white">
  <div class="Line1" style="width: 700.80px; height: 0px; left: 0.28px; top: 509.49px; position: absolute; border: 1.13px black solid"></div>
  <div class="TtdKepalaDinas" style="width: 189.33px; height: 89.10px; left: 470.78px; top: 424.44px; position: absolute">
    <div class="TebingTinggi29Februari2024" style="width: 103.72px; height: 12.21px; left: 45.21px; top: 0.20px; position: absolute; color: black; font-size: 6.78px; font-family: Inter; font-weight: 400; word-wrap: break-word">
    Tebing Tinggi, 29 Februari 2024 </div>
    <div class="KepalaDinasPengendalianPendudukDanKeluargaBerencanaKotaTebingTinggi" style="width: 189.27px; height: 31.66px; left: -0px; top: 9.40px; position: absolute; text-align: center; color: black; font-size: 7.06px; font-family: Inter; font-weight: 400; word-wrap: break-word">KEPALA DINAS PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA<br/>KOTA TEBING TINGGI</div>
    <div class="HjNinaZaharaMzShMApPembinaUtamaMudaNip196907251995012001" style="width: 189.27px; height: 31.66px; left: -0px; top: 57.44px; position: absolute; text-align: center; color: black; font-size: 7.06px; font-family: Inter; font-weight: 400; word-wrap: break-word">Hj. NINA ZAHARA MZ, SH. M.AP<br/>PEMBINA UTAMA MUDA<br/>NIP. 19690725 199501 2 001</div>
  </div>
  <div class="Logo" style="width: 403.24px; height: 137.62px; left: 47.19px; top: 0px; position: absolute">
    <img class="TebingTinggiArmcoats" style="width: 50.83px; height: 58.25px; left: 203.18px; top: 0px; position: absolute" src="<?= base_url();?>assets/logo/logo_tt.png" />
    <img class="LogoBnn" style="width: 57.87px; height: 57.68px; left: 269.42px; top: 0.76px; position: absolute" src="<?= base_url();?>assets/logo/logo_bnn.png" />
    <img class="LogoKemenagPng7676" style="width: 60.34px; height: 58.44px; left: 342.90px; top: 0px; position: absolute" src="<?= base_url();?>assets/logo/logo_kemenag.png" />
    <img class="Img04211" style="width: 72.34px; height: 108.51px; left: 0px; top: 29.11px; position: absolute" src="<?= base_url();?>uploads/photo/<?php echo $foto_saya?>" />
  </div>
  <div class="Judul" style="width: 336.84px; height: 75.06px; left: 181.98px; top: 70.65px; position: absolute">
    <div class="PusatPelayananKeluargaSejahteraPpks" style="width: 336.84px; height: 6.80px; left: 0px; top: 0px; position: absolute; color: black; font-size: 13.56px; font-family: Inter; font-weight: 400; word-wrap: break-word">PUSAT PELAYANAN KELUARGA SEJAHTERA (PPKS)</div>
    <div class="DinasPengendalianPendudukDanKeluargaBerencanaKotaTebingTinggi" style="width: 336.84px; height: 27.48px; left: 0px; top: 25.78px; position: absolute; text-align: center; color: black; font-size: 11.30px; font-family: Inter; font-weight: 400; word-wrap: break-word">DINAS PENGENDALIAN PENDUDUK DAN<br/>KELUARGA BERENCANA KOTA TEBING TINGGI</div>
    <div class="KartuKendali" style="width: 154.68px; height: 13.29px; left: 90.94px; top: 61.77px; position: absolute; text-align: center; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">KARTU KENDALI</div>
  </div>
  <div class="DataInputan" style="width: 308.09px; height: 138.21px; left: 46.06px; top: 157.96px; position: absolute">
    <div class="JneisData" style="width: 141.30px; height: 138.20px; left: -0px; top: 0.01px; position: absolute">
      <div class="NomorPeserta" style="width: 94.62px; height: 13.26px; left: -0px; top: 0.18px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">NOMOR PESERTA</div>
      <div class="Nama" style="width: 94.62px; height: 13.26px; left: 0px; top: 17.98px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">NAMA</div>
      <div class="TempatTanggalLahir" style="width: 141.27px; height: 13.26px; left: 0px; top: 35.88px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">TEMPAT/TANGGAL LAHIR</div>
      <div class="Agama" style="width: 94.62px; height: 13.26px; left: 0px; top: 53.59px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">AGAMA</div>
      <div class="Alamat" style="width: 94.62px; height: 13.26px; left: 0px; top: 71.39px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">ALAMAT</div>
      <div class="Pendidikan" style="width: 94.62px; height: 13.26px; left: 0px; top: 89.19px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">PENDIDIKAN</div>
      <div class="Pekerjaan" style="width: 94.62px; height: 13.26px; left: 0px; top: 106.99px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">PEKERJAAN</div>
      <div class="JenisPelayanan" style="width: 105.08px; height: 13.26px; left: 0px; top: 124.94px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">JENIS PELAYANAN</div>
    </div>
    <div class="TitikDua" style="width: 24.58px; height: 138.20px; left: 163.05px; top: 0.01px; position: absolute">
      <div style="width: 16.46px; height: 13.26px; left: 0px; top: 0.18px; position: absolute; transform: rotate(-0.62deg); transform-origin: 0 0; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
      <div style="width: 16.46px; height: 13.26px; left: 0px; top: 17.98px; position: absolute; transform: rotate(-0.62deg); transform-origin: 0 0; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
      <div style="width: 24.58px; height: 13.26px; left: 0px; top: 35.88px; position: absolute; transform: rotate(-0.62deg); transform-origin: 0 0; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
      <div style="width: 16.46px; height: 13.26px; left: 0px; top: 53.59px; position: absolute; transform: rotate(-0.62deg); transform-origin: 0 0; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
      <div style="width: 16.46px; height: 13.26px; left: 0px; top: 71.39px; position: absolute; transform: rotate(-0.62deg); transform-origin: 0 0; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
      <div style="width: 16.46px; height: 13.26px; left: 0px; top: 89.19px; position: absolute; transform: rotate(-0.62deg); transform-origin: 0 0; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
      <div style="width: 16.46px; height: 13.26px; left: 0px; top: 106.99px; position: absolute; transform: rotate(-0.62deg); transform-origin: 0 0; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
      <div style="width: 18.28px; height: 13.26px; left: 0px; top: 124.94px; position: absolute; transform: rotate(-0.62deg); transform-origin: 0 0; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
    </div>
    <div class="IsiData" style="width: 443.73px; height: 138.80px; left: 181.42px; top: 0px; position: absolute">
      <div class="Nomor" style="width: 294.34px; height: 13.26px; left: 0px; top: 0.78px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">
      <?=$no_pendaftaran?></div>
      <div class="Nama" style="width: 428.45px; height: 13.26px; left: 0px; top: 18.59px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">
      <?=$nama_lengkap ?></div>
      <div class="TempatTglLahir" style="width: 443.72px; height: 13.26px; left: 0px; top: 36.48px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">
      <?=$tempat_lahir?> / <?=$tanggal_lahir_format?></div>
      <div class="Agama" style="width: 435.75px; height: 13.26px; left: 0px; top: 54.19px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">
      <?=$agama?></div>
      <div class="Alamat" style="width: 514.59px; height: 13.26px; left: 0px; top: 71.99px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">
      <?=$alamat?></div>
      <div class="Pendidikan" style="width: 443.72px; height: 13.26px; left: 0px; top: 89.80px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">
      <?=$pendidikan_terakhir?></div>
      <div class="Pekerjaan" style="width: 430.44px; height: 13.26px; left: 0px; top: 107.60px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">
      <?=$pekerjaan?></div>
      <div class="KonselingPranikah" style="width: 126.66px; height: 13.26px; left: 0px; top: 125.55px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">
      KONSELING PRANIKAH</div>
    </div>
  </div>
  <div class="TtdPeriksa" style="width: 616.03px; height: 109.50px; left: 42.10px; top: 309.71px; position: absolute">
    <div class="HariTanggal" style="width: 106.69px; height: 13.29px; left: 24.02px; top: 15.18px; position: absolute; text-align: center; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word">HARI/TANGGAL</div>
    <div class="HariTgl" style="width: 106.69px; height: 13.29px; left: 24.02px; top: 66.04px; position: absolute; text-align: center; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$tanggal_periksa_format ?></div>
    <div class="BimbinganKonselingOlehPsikolog" style="width: 147.72px; height: 13.29px; left: 157.68px; top: 12.43px; position: absolute; text-align: center; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word">BIMBINGAN KONSELING OLEH<br/>PSIKOLOG</div>
    <div class="Disetuji" style="width: 147.72px; height: 13.29px; left: 160.79px; top: 66.12px; position: absolute; text-align: center; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word">DISETUJI</div>
    <div class="NamaPemeriksaPsikolog" style="width: 147.72px; height: 13.29px; left: 160.79px; top: 87.31px; position: absolute; text-align: center; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$nama_pemeriksa_psikolog ?></div>
    <div class="KieTestNarkobaOlehBnn" style="width: 147.72px; height: 13.29px; left: 314.23px; top: 12.43px; position: absolute; text-align: center; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word">KIE & TEST NARKOBA OLEH<br/>BNN</div>
    <div class="Hasil" style="width: 147.72px; height: 13.29px; left: 310.84px; top: 66.40px; position: absolute; text-align: center; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$narkoba_test ?></div>
    <div class="NamaPemeriksaBnn" style="width: 147.72px; height: 13.29px; left: 311.40px; top: 87.03px; position: absolute; text-align: center; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$nama_pemeriksa_bnn ?></div>
    <div class="RapidtestHasil" style="width: 151.42px; height: 12.35px; left: 463.72px; top: 44.49px; position: absolute; color: black; font-size: 9.04px; font-family: Inter; font-weight: 400; word-wrap: break-word">Rapidtest : <?=$rapid_test ?></div>
    <div class="PlanotestHasil" style="width: 152.35px; height: 12.17px; left: 463.90px; top: 54.43px; position: absolute; color: black; font-size: 9.04px; font-family: Inter; font-weight: 400; word-wrap: break-word">Planotest : <?=$plano_test ?></div>
    <!--<div class="Hasil" style="width: 53.35px; height: 13.29px; left: 519.95px; top: 65.38px; position: absolute; text-align: center; color: black; font-size: 10.74px; font-family: Inter; font-weight: 400; word-wrap: break-word">HASIL</div>-->
    <div class="NamaPemeriksaKesehatan" style="width: 133.96px; height: 13.29px; left: 479.54px; top: 80.22px; position: absolute; text-align: center; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$nama_pemeriksa_kesehatan ?></div>
    <div class="NamaPuskesmas" style="width: 133.96px; height: 13.29px; left: 479.54px; top: 93.79px; position: absolute; text-align: center; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$nama_faskes ?></div>
    <div class="SuntikTtDanKieOlehKesehatan" style="width: 147.72px; height: 13.29px; left: 467.39px; top: 12.15px; position: absolute; text-align: center; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word">SUNTIK TT DAN KIE OLEH<br/>KESEHATAN</div>
    <div class="Line5" style="width: 109.08px; height: 0px; left: 0.85px; top: 109.08px; position: absolute; transform: rotate(-90deg); transform-origin: 0 0; border: 0.85px black solid"></div>
    <div class="Line6" style="width: 108.79px; height: 0px; left: 154.29px; top: -0px; position: absolute; transform: rotate(90deg); transform-origin: 0 0; border: 0.85px black solid"></div>
    <div class="Line7" style="width: 108.51px; height: 0px; left: 308.58px; top: 0.28px; position: absolute; transform: rotate(90deg); transform-origin: 0 0; border: 0.85px black solid"></div>
    <div class="Line8" style="width: 108.51px; height: 0px; left: 462.02px; top: -0px; position: absolute; transform: rotate(90deg); transform-origin: 0 0; border: 0.85px black solid"></div>
    <div class="Line10" style="width: 108.51px; height: 0px; left: 615.18px; top: 0.85px; position: absolute; transform: rotate(90deg); transform-origin: 0 0; border: 0.85px black solid"></div>
    <div class="Line9" style="width: 615.80px; height: 64.99px; left: 0.23px; top: 43.66px; position: absolute; border: 0.85px black solid"></div>
    <div class="Line2" style="width: 616.03px; height: 0px; left: 0px; top: 0.57px; position: absolute; border: 0.85px black solid"></div>
  </div>
  <div class="DataKartuKesehatan" style="width: 728px; height: 83.34px; left: 37.87px; top: 525.88px; position: absolute">
    <div class="NamaFaskes" style="width: 94.62px; height: 13.26px; left: 0px; top: 34.38px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">Nama Faskes</div>
    <div class="NamaPeserta" style="width: 94.62px; height: 13.26px; left: 0px; top: 52.19px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">Nama Peserta</div>
    <div class="Umur" style="width: 94.62px; height: 13.26px; left: 502.15px; top: 50.20px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">Umur</div>
    <div class="Alamat" style="width: 141.27px; height: 13.26px; left: 0px; top: 70.08px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">Alamat</div>
    <div class="JK" style="width: 141.27px; height: 13.26px; left: 502.15px; top: 68.09px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">J.K</div>
    <div style="width: 16.46px; height: 13.26px; left: 163.05px; top: 34.38px; position: absolute; transform: rotate(-0.62deg); transform-origin: 0 0; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
    <div style="width: 16.46px; height: 13.26px; left: 163.05px; top: 52.19px; position: absolute; transform: rotate(-0.62deg); transform-origin: 0 0; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
    <div style="width: 16.46px; height: 13.26px; left: 536.34px; top: 50.19px; position: absolute; transform: rotate(-0.62deg); transform-origin: 0 0; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
    <div style="width: 24.58px; height: 13.26px; left: 163.05px; top: 70.08px; position: absolute; transform: rotate(-0.62deg); transform-origin: 0 0; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
    <div style="width: 24.58px; height: 13.26px; left: 536.34px; top: 68.09px; position: absolute; transform: rotate(-0.62deg); transform-origin: 0 0; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
    <div class="NamaFaskes" style="width: 299.34px; height: 13.26px; left: 181.42px; top: 34.38px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$nama_faskes ?></div>
    <div class="Nama" style="width: 283.85px; height: 13.26px; left: 181.42px; top: 52.19px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$nama_lengkap ?></div>
    <div style="width: 173.27px; height: 13.26px; left: 554.71px; top: 50.19px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$usia ?></div>
    <div class="Alamat" style="width: 287.54px; height: 13.26px; left: 181.42px; top: 70.08px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$alamat?></div>
    <div class="Laki" style="width: 107.08px; height: 13.26px; left: 554.71px; top: 68.09px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$jenis_kelamin?></div>
    <div class="KartuCalonPengantinSehat" style="width: 237.37px; height: 16.39px; left: 193.85px; top: -0px; position: absolute; color: black; font-size: 14.13px; font-family: Inter; font-weight: 400; word-wrap: break-word">KARTU CALON PENGANTIN SEHAT</div>
  </div>
  <div class="HasilPeriksa" style="width: 622.53px; height: 240.48px; left: 37.58px; top: 619.70px; position: absolute">
    <div class="Kotak" style="width: 622.53px; height: 240.48px; left: 0px; top: 0px; position: absolute">
      <div class="Line12" style="width: 622.10px; height: 0.08px; left: 0.14px; top: 240.34px; position: absolute; border: 0.85px black solid"></div>
      <div class="Line14" style="width: 622.24px; height: 0px; left: -0px; top: 25.15px; position: absolute; border: 0.85px black solid"></div>
      <div class="Line15" style="width: 622.24px; height: 0px; left: -0px; top: 86.47px; position: absolute; border: 0.85px black solid"></div>
      <div class="Line16" style="width: 621.96px; height: 0px; left: -0px; top: 102.86px; position: absolute; border: 0.85px black solid"></div>
      <div class="Line17" style="width: 621.96px; height: 0px; left: -0px; top: 119.25px; position: absolute; border: 0.85px black solid"></div>
      <div class="Line18" style="width: 621.96px; height: 0px; left: -0px; top: 135.92px; position: absolute; border: 0.85px black solid"></div>
      <div class="Line19" style="width: 622.24px; height: 0px; left: -0px; top: 152.59px; position: absolute; border: 0.85px black solid"></div>
      <div class="Line20" style="width: 622.24px; height: 0px; left: -0px; top: 169.55px; position: absolute; border: 0.85px black solid"></div>
      <div class="Line21" style="width: 621.96px; height: 0px; left: -0px; top: 186.79px; position: absolute; border: 0.85px black solid"></div>
      <div class="Line22" style="width: 622.53px; height: 0px; left: -0px; top: 211.94px; position: absolute; border: 0.85px black solid"></div>
      <div class="Line23" style="width: 240.48px; height: 0px; left: 166.44px; top: 0px; position: absolute; transform: rotate(90.28deg); transform-origin: 0 0; border: 0.85px black solid"></div>
      <div class="Line24" style="width: 240.19px; height: 0px; left: 389.11px; top: 0.28px; position: absolute; transform: rotate(90deg); transform-origin: 0 0; border: 0.85px black solid"></div>
      <div class="Line10" style="width: 622.24px; height: 0px; left: -0px; top: 0.57px; position: absolute; border: 0.85px black solid"></div>
      <div class="Line11" style="width: 239.91px; height: 0px; left: -0px; top: 0.57px; position: absolute; transform: rotate(90deg); transform-origin: 0 0; border: 0.85px black solid"></div>
      <div class="Line13" style="width: 239.35px; height: 0px; left: 621.96px; top: 1.13px; position: absolute; transform: rotate(90deg); transform-origin: 0 0; border: 0.85px black solid"></div>
    </div>
    <div class="HariTgl" style="width: 160.82px; height: 13.29px; left: 434.19px; top: 32.47px; position: absolute; text-align: center; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$tanggal_periksa_format ?></div>
    <div class="TelahDiperiksa" style="width: 204.85px; height: 13.29px; left: 408.34px; top: 58.52px; position: absolute; text-align: center; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word">TELAH DIPERIKSA</div>
    <div class="JenisPemeriksaan" style="width: 114.04px; height: 13.26px; left: 27.41px; top: 6.15px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">JENIS PEMERIKSAAN</div>
    <div class="TandaVital" style="width: 114.04px; height: 13.26px; left: 10.46px; top: 50.52px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">Tanda Vital</div>
    <div class="BbKg" style="width: 60.43px; height: 13.26px; left: 10.46px; top: 88.56px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">BB (kg)</div>
    <div class="TbCm" style="width: 60.43px; height: 13.26px; left: 10.46px; top: 105.23px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">TB (cm)</div>
    <div class="ImtKgM" style="width: 66.36px; left: 10.46px; top: 121.62px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">IMT (kg/m²)</div>
    <div class="LilaCm" style="width: 60.43px; height: 13.26px; left: 10.46px; top: 138.30px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">LILA (cm)</div>
    <div class="StatusT" style="width: 60.43px; height: 13.26px; left: 10.46px; top: 154.97px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">Status T</div>
    <div class="TandaAnemia" style="width: 75.60px; height: 13.26px; left: 10.46px; top: 171.36px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">Tanda Anemia</div>
    <div class="Penunjang" style="width: 75.60px; height: 13.26px; left: 10.46px; top: 192.58px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">Penunjang</div>
    <div class="LainLain" style="width: 75.60px; height: 13.26px; left: 10.46px; top: 219.43px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">Lain-lain</div>
    <div class="HbGrDl" style="width: 75.60px; height: 13.26px; left: 175.48px; top: 187.21px; position: absolute; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word">Hb (gr/dl)</div>
    <div class="Rapidtest" style="width: 75.60px; height: 13.26px; left: 175.48px; top: 214.06px; position: absolute; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word">Rapidtest</div>
    <div class="HasilHb" style="width: 113.73px; height: 13.26px; left: 278.34px; top: 187.21px; position: absolute; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$hb ?></div>
    <div class="HasilRapid" style="width: 109.90px; height: 13.26px; left: 278.34px; top: 214.06px; position: absolute; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$rapid_test ?></div>
    <div style="width: 4.94px; height: 13.26px; left: 274.95px; top: 186.65px; position: absolute; transform: rotate(-1.66deg); transform-origin: 0 0; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
    <div style="width: 4.94px; height: 13.26px; left: 274.95px; top: 213.49px; position: absolute; transform: rotate(-1.66deg); transform-origin: 0 0; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
    <div class="GolDarahRhesus" style="width: 99.38px; height: 13.26px; left: 175.48px; top: 199.36px; position: absolute; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word">Gol. Darah & Rhesus</div>
    <div class="Planotest" style="width: 99.38px; height: 13.26px; left: 175.48px; top: 226.21px; position: absolute; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word">Planotest</div>
    <div class="GolDarah" style="width: 117.56px; height: 13.26px; left: 278.34px; top: 199.36px; position: absolute; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$gol_darah ?></div>
    <div class="GhasilPlano" style="width: 108.94px; height: 13.26px; left: 278.34px; top: 226.21px; position: absolute; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$plano_test ?></div>
    <div style="width: 6.50px; height: 13.26px; left: 274.95px; top: 198.80px; position: absolute; transform: rotate(-1.66deg); transform-origin: 0 0; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
    <div style="width: 6.50px; height: 13.26px; left: 274.95px; top: 225.64px; position: absolute; transform: rotate(-1.66deg); transform-origin: 0 0; color: black; font-size: 9.89px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
    <div class="AngkaBb" style="width: 142.26px; height: 13.26px; left: 178.03px; top: 87.71px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$berat_badan ?></div>
    <div class="AngkaTb" style="width: 143.21px; height: 13.26px; left: 178.03px; top: 104.39px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$tinggi_badan ?></div>
    <div class="AngkaImt" style="width: 144.16px; height: 13.26px; left: 178.03px; top: 120.78px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$imt ?></div>
    <div class="AngkaLila" style="width: 138.41px; height: 13.26px; left: 178.03px; top: 137.45px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$lila ?></div>
    <div class="T1" style="width: 141.29px; height: 13.26px; left: 178.03px; top: 154.12px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">T <?=$suntik_tt ?></div>
    <div class="Anemia" style="width: 146.08px; height: 13.26px; left: 178.03px; top: 170.51px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$tanda_anemia ?></div>
    <div class="Td" style="width: 17.96px; height: 13.26px; left: 178.03px; top: 27.91px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">TD</div>
    <div class="80" style="width: 168.75px; height: 13.26px; left: 221.54px; top: 28.29px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$tekanan_sistolik ?> / <?=$tekanan_diastolik ?></div>
    <div style="width: 17.96px; height: 13.26px; left: 212.50px; top: 28.01px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
    <div class="Nadi" style="width: 26.88px; height: 13.26px; left: 178.03px; top: 41.31px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">Nadi</div>
    <div class="NadiXMnt" style="width: 167.50px; height: 13.26px; left: 221.54px; top: 41.69px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$nadi ?> x/mnt</div>
    <div style="width: 26.88px; height: 13.26px; left: 212.50px; top: 41.41px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
    <div class="Nafas" style="width: 31.92px; height: 13.26px; left: 178.03px; top: 56.58px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">Nafas</div>
    <div class="NafasXMnt" style="width: 168.34px; height: 13.26px; left: 221.54px; top: 56.96px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$nafas ?> x/mnt</div>
    <div style="width: 31.92px; height: 13.26px; left: 212.50px; top: 56.68px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
    <div class="Suhu" style="width: 31.92px; height: 13.26px; left: 178.03px; top: 70.99px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">Suhu</div>
    <div class="SuhuXMnt" style="width: 167.93px; height: 13.26px; left: 221.54px; top: 71.37px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$suhu ?> x/mnt</div>
    <div style="width: 31.92px; height: 13.26px; left: 212.50px; top: 71.09px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">:</div>
    <div class="HasilPemeriksaan" style="width: 114.04px; height: 13.26px; left: 231.72px; top: 6.15px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">HASIL PEMERIKSAAN</div>
    <div class="TanggalParafPetugas" style="width: 157.65px; height: 13.26px; left: 439.41px; top: 6.52px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">TANGGAL & PARAF PETUGAS</div>
  </div>
  <div class="HasilAkhir" style="width: 621.96px; height: 114.14px; left: 37.58px; top: 868.94px; position: absolute">
    <div class="Tatalaksana" style="width: 83.26px; height: 13.26px; left: 44.65px; top: 1.57px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">TATALAKSANA</div>
    <div class="DilaksanakanYaTidak" style="width: 142.32px; height: 13.26px; left: 210.24px; top: 1.68px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">DILAKSANAKAN (Ya/Tidak)</div>
    <div class="TanggalParafPetugas" style="width: 157.68px; height: 13.26px; left: 431.22px; top: 1.68px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">TANGGAL & PARAF PETUGAS</div>
    <div class="PengobatanSesuaiIndikasi" style="width: 147.55px; height: 13.26px; left: 1.13px; top: 61.75px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">Pengobatan Sesuai Indikasi </div>
    <div class="Kepala" style="width: 37.90px; height: 13.26px; left: 390.81px; top: 61.60px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">Kepala </div>
    <div class="NamaPemeriksaKesehatan" style="width: 149.26px; height: 13.26px; left: 390.81px; top: 100.88px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$nama_pemeriksa_kesehatan ?></div>
    <div class="SudahDiperiksaDanDisetujui" style="width: 186.01px; height: 13.26px; left: 390.81px; top: 82.51px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">SUDAH DIPERIKSA DAN DISETUJUI</div>
    <div class="PuskesmasSatria" style="width: 188.66px; height: 13.26px; left: 428.67px; top: 61.96px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word"><?=$nama_faskes ?></div>
    <!--<div class="Isi" style="width: 390.85px; height: 31.90px; left: -0px; top: 79.97px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">Isi</div>-->
    <div class="KieKonseling" style="width: 75.60px; height: 13.26px; left: 10.46px; top: 19.64px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">KIE/ Konseling</div>
    <div class="TabletTambahDarahTtd" style="width: 146.89px; height: 13.26px; left: 10.46px; top: 36.31px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">Tablet Tambah Darah (TTD)</div>
    <div class="Ya" style="width: 18.04px; height: 13.26px; left: 273.82px; top: 19.53px; position: absolute; color: black; font-size: 11.02px; font-family: Inter; font-weight: 400; word-wrap: break-word">YA</div>
    <div class="Group1" style="width: 621.96px; height: 52.84px; left: 0px; top: 0px; position: absolute">
      <div class="Line14" style="width: 621.96px; height: 0px; left: -0px; top: 16.91px; position: absolute; border: 0.85px black solid"></div>
      <div class="Line15" style="width: 621.96px; height: 0px; left: -0px; top: 35.16px; position: absolute; border: 0.85px black solid"></div>
      <div class="Line16" style="width: 621.96px; height: 0px; left: -0px; top: 52.45px; position: absolute; border: 0.85px black solid"></div>
      <div class="Line23" style="width: 52.45px; height: 0px; left: 165.49px; top: 0px; position: absolute; transform: rotate(89.81deg); transform-origin: 0 0; border: 0.85px black solid"></div>
      <div class="Line24" style="width: 52.45px; height: 0px; left: 388.44px; top: 0.19px; position: absolute; transform: rotate(89.99deg); transform-origin: 0 0; border: 0.28px black solid"></div>
      <div class="Line10" style="width: 621.96px; height: 0px; left: 0px; top: 0.38px; position: absolute; border: 0.85px black solid"></div>
      <div class="Line25" style="width: 621.96px; height: 0px; left: -0px; top: 16.91px; position: absolute; border: 0.85px black solid"></div>
      <div class="Line26" style="width: 621.96px; height: 0px; left: -0px; top: 35.16px; position: absolute; border: 0.85px black solid"></div>
      <div class="Line27" style="width: 621.96px; height: 0px; left: -0px; top: 52.45px; position: absolute; border: 0.85px black solid"></div>
      <div class="Line28" style="width: 52.45px; height: 0px; left: 165.49px; top: 0px; position: absolute; transform: rotate(89.81deg); transform-origin: 0 0; border: 0.85px black solid"></div>
      <div class="Line29" style="width: 52.45px; height: 0px; left: 388.44px; top: 0.19px; position: absolute; transform: rotate(89.99deg); transform-origin: 0 0; border: 0.85px black solid"></div>
      <div class="Line30" style="width: 621.96px; height: 0px; left: 0px; top: 0.38px; position: absolute; border: 0.85px black solid"></div>
      <div class="Line11" style="width: 52.07px; height: 0px; left: 0px; top: 0.38px; position: absolute; transform: rotate(89.99deg); transform-origin: 0 0; border: 0.85px black solid"></div>
      <div class="Line13" style="width: 51.99px; height: 0px; left: 621.11px; top: 0.85px; position: absolute; transform: rotate(90deg); transform-origin: 0 0; border: 0.85px black solid"></div>

<?php endforeach;?>

</body>
