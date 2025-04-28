<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Form Kritik dan Saran</title>
    <link rel="stylesheet" href="<?= base_url ('assets/css/kritik-saran.css')?>" />
  </head>
  <body>
    <div class="wrap">
    <div class="slideshow-background" ></div>
    <div class="form">
      <h2>Kritik & Saran</h2>
      <form action="<?= base_url('admin/simpan_kritik')?>" method="POST">
        <?php if ($this->session->flashdata('message')): ?>
          echo cok;
        <?php endif; ?>
      
      
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required />
        
        <label for="pesan">Kritik & Saran</label>
        <textarea id="pesan" name="kritik" placeholder="Tulis kritik dan saran Anda..." required></textarea>

        <button type="submit">Kirim</button>
      </form>
    </div>
    </div>
    <div id="kritik-container"></div>

    <script>
    const images = ["<?= base_url ('assets/img/fotopage4-1.jpg')?>", "<?= base_url ('assets/img/fotopage4-2.jpg')?>", "<?= base_url ('assets/img/fotopage4-3.jpg')?>"];

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