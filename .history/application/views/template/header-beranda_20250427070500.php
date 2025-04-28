<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $header ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url('include/bootstrap/css/bootstrap.min.css'); ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/header.css'); ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/footer.css'); ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/section_kamar.css'); ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/section-best.css'); ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/js/main.s'); ?>"/>
  </head>
  <body>
    <header>
      <div class="header">
        <img src="<?=base_url('assets/img/logo_wt_name.png')?>" alt="logo" />
        <p>Helios Hotel Malang</p>
        <div class="hamburger-menu">
          <i class="fas fa-bars"></i>
        </div>
      </div>

      <div class="header-img">
        <img src="<?=base_url('assets/img/kamarhelios.jpeg')?>" alt="Helios" />
        <div class="hero-text">
          <h1>Selamat Datang di Helios Hotel Malang</h1>
          <p>Experience luxury and comfort in the heart of Malang City.</p>
        </div>
        <div class="box-medsos">
          <div class="box-location">
            <p>Temukan Kami</p>
            <a href="https://www.google.com/maps/place/Helios+Hotel/@-7.9732008,112.6321189,917m/data=!3m1!1e3!4m9!3m8!1s0x2dd6283af7d660e9:0x4a02fdae42386c63!5m2!4m1!1i2!8m2!3d-7.9732008!4d112.6346938!16s%2Fg%2F1vnnft00?entry=ttu&g_ep=EgoyMDI1MDQxNi4xIKXMDSoJLDEwMjExNDUzSAFQAw%3D%3D" title="Maps" target="_blank">
              <i class="fa-solid fa-location-dot"></i>
            </a>
            
          </div>
          <div class="box">
            <p>Ikuti kami</p>
            <div class="social-icons">
            <a href="https://www.instagram.com/heliosmalang" title="Follow Instagram" target="_blank">
              <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://api.whatsapp.com/send?phone=6281211115787" title="Kontak WhatsApp" target="_blank">
              <i class="fa-brands fa-whatsapp" title="Hubungi via WhatsApp"></i>
            </a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <nav>
    <ul>
        <li class="navi">
          <a href="<?=base_url('index.php')?>"><i class="fa-solid fa-house"></i>Beranda</a>
        </li>
        <li class="navi">
          <a href="<?=base_url('index.php/tentang-kami')?>"><i class="fa-solid fa-lightbulb"></i>Tentang Kami</a>
        </li>
        <li class="navi">
          <a href="<?=base_url('index.php/kamar')?>"><i class="fa-solid fa-hotel"></i>Kamar</a>
        </li>
        <li class="navi">
          <a href="<?=base_url('index.php#fasilitas')?>"><i class="fa-solid fa-concierge-bell"></i>Fasilitas</a>
        </li>
        <li class="navi">
          <a href="<?=base_url('index.php/wisata')?>"><i class="fas fa-plane"></i>Wisata</a>
        </li>
        <li class="navi">
          <a href="<?=base_url('beranda/kritik')?>"><i class="fa-solid fa-tty"></i>Kritik & Saran</a>
        </li>
        <li class="navi">
          <a href="<?=base_url('auth')?>"><i class="fa-solid fa-user"></i></a>
        </li>
      </ul>
    </nav>
    </nav>