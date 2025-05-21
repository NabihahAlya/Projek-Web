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
    <?php
      if (!empty($f_css)){
    ?>
      <link rel="stylesheet" href="<?= base_url('assets/css/' . $f_css .'.css'); ?>"/>
    <?php
}
    ?>
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('assets/img/logo.png') ?>" />
    <script>const baseUrl = "<?= base_url() ?>"; </script>
  </head>
  <body>
    <header>
      <div class="header">
        <img src="<?=base_url('assets/img/logo.png')?>" alt="logo" />
        <p>Helios Hotel Malang</p>
        <div class="hamburger-menu">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </header>
    <nav>
    <ul>
    <li class="navi">
          <a href="<?=base_url()?>"><i class="fa-solid fa-house"></i>Beranda</a>
        </li>
        <li class="navi">
          <a href="<?=base_url('tentang-kami')?>"><i class="fa-solid fa-lightbulb"></i>Tentang Kami</a>
        </li>
        <li class="navi">
          <a href="<?=base_url('kamar')?>"><i class="fa-solid fa-hotel"></i>Kamar</a>
        </li>
        <li class="navi">
          <a href="<?=base_url('fasilitas')?>"><i class="fa-solid fa-concierge-bell"></i>Fasilitas</a>
        </li>
        <li class="navi">
          <a href="<?=base_url('wisata')?>"><i class="fas fa-plane"></i>Wisata</a>
        </li>
        <li class="navi">
          <a href="<?=base_url('kritik')?>"><i class="fa-solid fa-tty"></i>Kritik & Saran</a>
        </li>
      </ul>
    </nav>
