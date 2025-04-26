
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
    <div class="slideshow-background"></div>
    <div class="form">
      <h2>Kritik & Saran</h2>
      <form action="<?= base_url('admin/simpan')?>" method="POST">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required />

        <label for="pesan">Kritik & Saran</label>
        <textarea id="pesan" name="kritik" placeholder="Tulis kritik dan saran Anda..." required></textarea>

        <button type="submit">Kirim</button>
      </form>
    </div>
    </div>
    
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
    <div id="kritik-container"></div>

    <script>
      function loadKritik() {
          $.ajax({
              url: "<?= site_url('admin/get_kritik_data') ?>",
              method: "GET",
              success: function(response) {
                  $('#kritik-container').html(response);  // Menampilkan data kritik
              }
          });
      }

      // Memanggil fungsi loadKritik setiap 5 detik
      setInterval(loadKritik, 5000);  // 5000ms = 5 detik
    </script>

  </body>
</html>