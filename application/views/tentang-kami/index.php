<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet"  href="<?= base_url('assets/css/tentang-kami.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <title>Tentang-Kami</title>
  </head>
  <body> <div class="container-utama"></div>
    <!-- SECTION 1: Kontak di kiri, Foto di kanan -->
<section class="tentang-kami-container">
  <div class="about-left">
    <h1 class="judul-top">Tentang Kami</h1>
    <div class="contact">
      <p><i class="fas fa-map-marker-alt"></i> Jl. Patimura No.37, Klojen, Kota Malang, Jawa Timur 65111</p>
      <p><i class="fas fa-phone"></i> +62 812-1111-5787</p>
      <p><i class="fas fa-envelope"></i><a href="mailto:marketing.helios58@gmail.com"> marketing.helios58@gmail.com</a></p>
      <p><i class="fab fa-whatsapp"></i><a href="https://api.whatsapp.com/send?phone=6281211115787"> +62 812-1111-5787</a></p>
      <p><i class="fab fa-instagram"></i><a href="https://www.instagram.com/heliosmalang"> @heliosmalang</a></p>
    </div>
  </div>
  <div class="about-right">
    <img src="<?= base_url('assets/img/kamarhelios.jpeg')?>" class="foto-1" />
  </div>
</section>

<!-- SECTION 2: Foto di kiri, Deskripsi di kanan -->
<section class="Deskripsi-container">
  <div class="desc-left">
    <img src="<?= base_url('assets/img/kamarhelios.jpeg')?>" alt="Helios" class="foto-2" />
  </div>
  
  <div class="desc-right">
    <h1 class="judul-desc">
      Deskripsi
    </h1>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio voluptate voluptates quae enim, iste quia recusandae ex impedit porro? Illo laudantium iure optio adipisci rerum repellat vero quam labore facilis?
      merupakan hotel bintang 4 yang menghadirkan kombinasi sempurna antara kenyamanan modern dan kehangatan budaya lokal.
      Dengan desain elegan dan fasilitas lengkap, hotel ini berlokasi strategis dekat stasiun kota Malang dan menjadi pilihan ideal untuk liburan maupun bisnis.
    </p>
    
  </div>
</section>

<section class="visi-misi-container">
  <div class="visi-misi-left">
    <h1 class="judul-visi-misi">Visi Misi</h1>
    <div class="contact">
      <p>
        merupakan hotel bintang 4 yang menghadirkan kombinasi sempurna antara kenyamanan modern dan kehangatan budaya lokal.
        Dengan desain elegan dan fasilitas lengkap, hotel ini berlokasi strategis dekat stasiun kota Malang dan menjadi pilihan ideal untuk liburan maupun bisnis.
      </p>
    </div>
  </div>
  <div class="visi-misi-right">
    <img src="<?= base_url('assets/img/kamarhelios.jpeg')?>" alt="Helios" class="foto-3" />
  </div>
</section>
  </body>
</html>