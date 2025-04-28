<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="title" content="Dashboard" />
    <meta name="author" content="Themesberg" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('include/img/favicon/logo1.png') ?>" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('include/img/favicon/logo1.png') ?>" />

   <!-- Sweet Alert -->
   <link type="text/css" href="<?= base_url('include/vendor/sweetalert2/dist/sweetalert2.min.css') ?>" rel="stylesheet" />

    <!-- Notyf -->
    <link type="text/css" href="<?= base_url('include/vendor/notyf/notyf.min.css') ?>" rel="stylesheet" />

    <!-- Volt CSS -->
    <link type="text/css" href="<?= base_url('include/css/volt.css') ?>" rel="stylesheet" />
    <link type="text/css" href="<?= base_url('assets/js/main.js') ?>" rel="stylesheet" />

    <style>
    /* Mengatur lebar elemen select dan container-nya */
/* .select2-container {
  width: 100% !important;
  max-width: 100%;
} */

/* Memperbaiki tampilan selection box */
.select2-container--default .select2-selection--single {
  height: 38px;
  border: 1px solid #ced4da;
  border-radius: 4px;
  width: 100%;
}

/* Memastikan dropdown memiliki lebar yang sama dengan selection box */
.select2-dropdown {
  width: 9 !important;
  min-width: 100%;
}

/* Memperbaiki tampilan teks di dalam selection box */
.select2-container--default .select2-selection--single .select2-selection__rendered {
  line-height: 38px;
  padding-left: 12px;
}

/* Memperbaiki posisi arrow */
.select2-container--default .select2-selection--single .select2-selection__arrow {
  height: 36px;
  right: 5px;
}
    </style>

  </head>

  <body>
    <main class="content mt-5">
      <div class="card mt-5">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Data Fasilitas</h5>
          <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalFasilitas">+ Tambah Fasilitas</a>
        </div>

        <div class="card-body">
          <table class="table table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Fasilitas</th>
                <th scope="col">Jenis</th>
                <th scope="col">Ikon</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php  $no = 1;  foreach ($fasilitas_list as $f) : ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $f->nama; ?></td>
                    <td><?php echo $f->tipe_aksi; ?></td>
                    <td><i class="fas <?= $f->ikon; ?>"></i></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('admin/hapus_fasilitas/' . $f->id_fasilitas)?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>

    <!-- Modal Tambah Fasilitas -->
<div class="modal fade" id="modalFasilitas" tabindex="-1" aria-labelledby="modalFasilitasLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= base_url('admin/tambah_fasilitas'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="modalFasilitasLabel">Tambah Fasilitas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Fasilitas</label>
            <input type="text" class="form-control" name="nama" required>
          </div>
          <div class="mb-3">
        <label for="ikon" class="form-label">Ikon</label>
        <select id="ikon" class="form-select" name="ikon" onchange="previewIcon(this)">
        <option value="">- Pilih Ikon -</option>
            <option value="fa-map-marker-alt">Lokasi</option>
            <option value="fa-bed">Kamar Tidur</option>
            <option value="fa-utensils">Restoran</option>
            <option value="fa-dumbbell">Gym</option>
            <option value="fa-parking">Parkir</option>
            <option value="fa-swimming-pool">Kolam Renang</option>
            <option value="fa-spa">Spa</option>
            <option value="fa-tshirt">Laundry</option>
            <option value="fa-motorcycle">Sewa Motor</option>
            <option value="fa-warehouse">Gudang</option>
            <option value="fa-map">Peta</option>
            <option value="fa-star">Bintang Hotel</option>
            <option value="fa-star-half-alt">Bintang Setengah</option>
            <option value="fa-star-half-alt" data-icon="fa-star-half-alt">Bintang Setengah</option>
          </select>
      </div>


          <div class="mb-3">
            <label for="tipe_aksi" class="form-label">Tipe Aksi</label>
            <select class="form-select" id="tipeAksi" name="tipe_aksi" required>
              <option value="">Pilih Tipe</option>
              <option value="link">Link</option>
              <option value="popup">Popup</option>
            </select>
          </div>

          <!-- Bagian untuk Tipe LINK -->
          <div id="formLink" class="d-none">
            <div class="mb-3">
              <label for="link" class="form-label">Link URL</label>
              <input type="text" class="form-control" name="link">
            </div>
          </div>

          <!-- Bagian untuk Tipe POPUP -->
          <div id="formPopup" class="d-none">
  <div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea class="form-control" name="deskripsi"></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Upload Foto (Satu per satu)</label>
    <div id="fileUploadContainer">
      <!-- Tempat untuk input file yang sudah ditambahkan -->
      <div class="file-input-wrapper mb-2">
        <input type="file" class="form-control" name="foto[]" accept="image/*">
      </div>
    </div>
    <button type="button" class="btn btn-secondary mt-2" id="addMoreFiles">Tambah File Lain</button>
  </div>
</div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script> 
    document.getElementById('addMoreFiles').addEventListener('click', function() {
      const container = document.getElementById('fileUploadContainer');
      const newInput = document.createElement('div');
      newInput.className = 'file-input-wrapper mb-2';
      newInput.innerHTML = `
        <input type="file" class="form-control" name="foto[]" accept="image/*">
        <button type="button" class="btn btn-sm btn-danger mt-1 remove-file">Hapus</button>
      `;
      container.appendChild(newInput);
      
      // Tambahkan event listener untuk tombol hapus
      newInput.querySelector('.remove-file').addEventListener('click', function() {
        container.removeChild(newInput);
      });
    });
</script>

<script>
document.getElementById('tipeAksi').addEventListener('change', function() {
  var value = this.value;
  var formLink = document.getElementById('formLink');
  var formPopup = document.getElementById('formPopup');

  if (value == 'link') {
    formLink.classList.remove('d-none');
    formPopup.classList.add('d-none');
  } else if (value == 'popup') {
    formLink.classList.add('d-none');
    formPopup.classList.remove('d-none');
  } else {
    formLink.classList.add('d-none');
    formPopup.classList.add('d-none');
  }
});
</script>


 <!-- Core -->
 <script src="<?= base_url('include/vendor/@popperjs/core/dist/umd/popper.min.js') ?>"></script>
    <script src="<?= base_url('include/vendor/bootstrap/dist/js/bootstrap.min.js') ?>"></script>

    <!-- Vendor JS -->
    <script src="<?= base_url('include/vendor/onscreen/dist/on-screen.umd.min.js') ?>"></script>

    <!-- Slider -->
    <script src="<?= base_url('include/vendor/nouislider/distribute/nouislider.min.js') ?>"></script>

    <!-- Smooth scroll -->
    <script src="<?= base_url('include/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') ?>"></script>

    <!-- Charts -->
    <script src="<?= base_url('include/vendor/chartist/dist/chartist.min.js') ?>"></script>
    <script src="<?= base_url('include/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') ?>"></script>

    <!-- Datepicker -->
    <script src="<?= base_url('include/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') ?>"></script>

    <!-- Sweet Alerts 2 -->
    <script src="<?= base_url('vendor/sweetalert2/dist/sweetalert2.all.min.js') ?>"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Vanilla JS Datepicker -->
    <script src="<?= base_url('include/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') ?>"></script>

    <!-- Notyf -->
    <script src="<?= base_url('vendor/notyf/notyf.min.js') ?>"></script>

    <!-- Simplebar -->
    <script src="<?= base_url('include/vendor/simplebar/dist/simplebar.min.js') ?>"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    <!-- Volt JS -->
    <script src="<?= base_url('include/js/volt.js') ?>"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
      $(document).ready(function() {
  $('#ikon').select2({
    templateResult: formatIcon,
    templateSelection: formatIconSelection,
    width: '100%' // Menambahkan opsi width 100%
  });

  function formatIcon(option) {
    if (!option.id) return option.text;
    // Untuk dropdown options
    var $container = $('<span style="display: flex; align-items: center;"></span>');
    $container.html('<i class="fas ' + option.id + '" style="margin-right: 8px;"></i>' + option.text);
    return $container;
  }
  
  function formatIconSelection(option) {
    if (!option.id) return option.text;
    // Untuk selected value (mempertahankan tampilan asli)
    return option.text;
  }
});
  </script>


  </body>
</html>
