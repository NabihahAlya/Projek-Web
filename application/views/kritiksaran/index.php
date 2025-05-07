<div class="wrap">
  <div class="slideshow-background" ></div>
  <div class="form">
    <h2>Kritik & Saran</h2>
    <form action="<?= base_url('beranda/simpan_kritik')?>" method="POST">
      <label for="nama">Nama</label>
      <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required />
      <label for="pesan">Kritik & Saran</label>
      <textarea id="pesan" name="kritik" placeholder="Tulis kritik dan saran Anda..." required></textarea>
      <button type="submit">Kirim</button>
    </form>
  </div>
</div>
<script>
  window.slideshowImages = <?= json_encode([
      base_url('assets/img/fotopage4-1.jpg'),
      base_url('assets/img/fotopage4-2.jpg'),
      base_url('assets/img/fotopage4-3.jpg'),
  ]) ?>;
</script>