<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Header</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url('include/bootstrap/css/bootstrap.min.css'); ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/header.css'); ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/footer.css'); ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/section_kamar.css'); ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/section_best.css'); ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/kamar.css'); ?>"/>
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
          <a href="<?=base_url('index.php/hubungi-kami')?>"><i class="fa-solid fa-tty"></i>Kritik & Saran</a>
        </li>
        <li class="navi">
          <a href="<?=base_url('auth')?>"><i class="fa-solid fa-user"></i></a>
        </li>
      </ul>
    </nav>

    <script src="header.js"></script>
  </body>
</html>