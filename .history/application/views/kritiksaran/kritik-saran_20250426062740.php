<?php  require_once('header.php')?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Form Kritik dan Saran</title>
    <link rel="stylesheet" href="assets/css/kritik-saran.css" />
  </head>
  <body>
    <div class="wrap">
    <div class="slideshow-background"></div>
    <div class="form">
      <h2>Kritik & Saran</h2>
      <form action="proses_kritik.php" method="POST">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required />

        <label for="pesan">Kritik & Saran</label>
        <textarea id="pesan" name="pesan" placeholder="Tulis kritik dan saran Anda..." required></textarea>

        <button type="submit">Kirim</button>
      </form>
    </div>
    </div>
    
    <script>
      const images = ["pic/fotopage4-1.jpg", "pic/fotopage4-2.jpg", "pic/fotopage4-3.jpg"];

      let current = 0;
      const bg = document.querySelector(".slideshow-background");

      function changeBackground() {
        bg.style.backgroundImage = `url(${images[current]})`;
        current = (current + 1) % images.length;
      }

      changeBackground();
      setInterval(changeBackground, 5000);
    </script>
  </body>
</html>
<?php require_once('footer.php') ?>