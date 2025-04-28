<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  
  <!-- jQuery & Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  
  <!-- CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link href="<?= base_url('include/vendor/notyf/notyf.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('include/css/volt.css') ?>" rel="stylesheet">

  <style>
    .select2-container--default .select2-selection--single { height: 38px; border: 1px solid #ced4da; border-radius: 4px; width: 100%; }
    .select2-container--default .select2-selection--single .select2-selection__rendered { line-height: 38px; padding-left: 12px; }
    .select2-container--default .select2-selection--single .select2-selection__arrow { height: 36px; right: 5px; }
  </style>

  <script>
    function previewIcon(selectElement) {
      var selectedIcon = selectElement.value;
      $('#previewIcon').attr('class', selectedIcon ? 'fas ' + selectedIcon : '');
    }
  </script>
</head>

<body>
<main class="content mt-5">
  <div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Data Layanan</h5>
      <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalLayanan">+ Tambah Layanan</a>
    </div>
    <div class="card-body">
      <table class="table table-hover">
        <thead class="thead-light">
          <tr>
            <th>No</th>
            <th>Nama Layanan</th>
            <th>Jenis</th>
            <th>Ikon</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($layanan_list as $f) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $f->nama ?></td>
            <td><?= $f->tipe_aksi ?></td>
            <td><i class="fas <?= $f->ikon ?>"></i></td>
            <td>
              <a href="#" class="btn btn-sm btn-warning btn-edit-layanan" data-id="<?= $f->id_layanan ?>" data-bs-toggle="modal" data-bs-target="#modalEditlayanan">Edit</a>
              <a href="<?= base_url('admin/hapus_layanan/' . $f->id_layanan) ?>" class="btn btn-sm btn-danger">Hapus</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<!-- Modal Tambah Layanan -->
<div class="modal fade" id="modalLayanan" tabindex="-1" aria-labelledby="modalLayananLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= base_url('admin/tambah_layanan'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLayananLabel">Tambah Layanan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Layanan</label>
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
              <option value="fa-warehouse">Rooftop</option>
              <option value="fa-map-signs">Wisata</option>
              <option value="fa-map">Peta</option>
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
          <div id="formLink" class="d-none">
            <div class="mb-3">
              <label for="link" class="form-label">Link URL</label>
              <input type="text" class="form-control" name="link">
            </div>
          </div>
          <div id="formPopup" class="d-none">
            <div class="mb-3">
              <label for="deskripsi" class="form-label">Deskripsi</label>
              <textarea class="form-control" name="deskripsi"></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Upload Foto</label>
              <div id="fileUploadContainer">
                <div class="file-input-wrapper mb-2">
                  <input type="file" class="form-control" name="foto[]" accept="image/*">
                </div>
              </div>
              <button type="button" class="btn btn-secondary mt-2" id="addMoreFiles">Tambah File Lain</button>
            </div>
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

<!-- Modal Edit Layanan -->
<div class="modal fade" id="modalEditLayanan" tabindex="-1" aria-labelledby="modalEditLayananLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formEditLayanan" action="<?= base_url('admin/update_layanan'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_layanan" id="edit_id_layanan">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditLayananLabel">Edit Layanan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="edit_nama" class="form-label">Nama Layanan</label>
            <input type="text" class="form-control" id="edit_nama" name="nama" required>
          </div>
          <div class="mb-3">
            <label for="edit_ikon" class="form-label">Ikon</label>
            <select id="edit_ikon" class="form-select" name="ikon" onchange="previewIcon(this)">
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
              <option value="fa-warehouse">Rooftop</option>
              <option value="fa-map-signs">Wisata</option>
              <option value="fa-map">Peta</option>
            </select>
            <div id="iconPreview" class="mt-2">
              <small>Preview:</small>
              <i id="previewIcon" class="fas ml-2"></i>
            </div>
          </div>
          <div class="mb-3">
            <label for="edit_tipe_aksi" class="form-label">Tipe Aksi</label>
            <select class="form-select" id="edit_tipe_aksi" name="tipe_aksi" required>
              <option value="">Pilih Tipe</option>
              <option value="link">Link</option>
              <option value="popup">Popup</option>
            </select>
          </div>
          <div id="edit_formLink" class="d-none">
            <div class="mb-3">
              <label for="edit_link" class="form-label">Link URL</label>
              <input type="text" class="form-control" id="edit_link" name="link">
            </div>
          </div>
          <div id="edit_formPopup" class="d-none">
            <div class="mb-3">
              <label for="edit_deskripsi" class="form-label">Deskripsi</label>
              <textarea class="form-control" id="edit_deskripsi" name="deskripsi"></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Foto Saat Ini</label>
              <div id="currentPhotos" class="d-flex flex-wrap gap-2 mb-3"></div>
              <label class="form-label">Upload Foto Baru (Opsional)</label>
              <div id="edit_fileUploadContainer">
                <div class="file-input-wrapper mb-2">
                  <input type="file" class="form-control" name="foto[]" accept="image/*">
                </div>
              </div>
              <button type="button" class="btn btn-secondary mt-2" id="edit_addMoreFiles">Tambah File Lain</button>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  // Select2 setup
  $('#ikon, #edit_ikon').select2({
    templateResult: function(option) {
      if (!option.id) return option.text;
      return $('<span><i class="fas ' + option.id + '" style="margin-right:8px;"></i>' + option.text + '</span>');
    },
    templateSelection: function(option) {
      return option.text;
    },
    width: '100%'
  });

  // Tambah file baru di tambah fasilitas
  $('#addMoreFiles').on('click', function() {
    const container = $('#fileUploadContainer');
    const newInput = $(`
      <div class="file-input-wrapper mb-2">
        <input type="file" class="form-control" name="foto[]" accept="image/*">
        <button type="button" class="btn btn-sm btn-danger mt-1 remove-file">Hapus</button>
      </div>
    `);
    container.append(newInput);
    newInput.find('.remove-file').on('click', function() {
      $(this).parent().remove();
    });
  });

  // Tambah file baru di edit fasilitas
  $('#edit_addMoreFiles').on('click', function() {
    const container = $('#edit_fileUploadContainer');
    const newInput = $(`
      <div class="file-input-wrapper mb-2">
        <input type="file" class="form-control" name="foto[]" accept="image/*">
        <button type="button" class="btn btn-sm btn-danger mt-1 remove-file">Hapus</button>
      </div>
    `);
    container.append(newInput);
    newInput.find('.remove-file').on('click', function() {
      $(this).parent().remove();
    });
  });

  // Ubah tampilan formLink dan formPopup di Tambah
  $('#tipeAksi').on('change', function() {
    const value = $(this).val();
    $('#formLink, #formPopup').addClass('d-none');
    if (value === 'link') {
      $('#formLink').removeClass('d-none');
    } else if (value === 'popup') {
      $('#formPopup').removeClass('d-none');
    }
  });

  // =================== INI BAGIAN EDIT YANG KITA PERBAIKI ===================
  $('.btn-edit-fasilitas').on('click', function() {
  const id = $(this).data('id');
  $('#edit_id_fasilitas').val(id); 
  
});


  // Kalau user ubah manual tipe aksi di modal edit
  $('#edit_tipe_aksi').on('change', function() {
    const value = $(this).val();
    $('#edit_formLink, #edit_formPopup').addClass('d-none');
    if (value === 'link') {
      $('#edit_formLink').removeClass('d-none');
    } else if (value === 'popup') {
      $('#edit_formPopup').removeClass('d-none');
    }
  });
});

</script>

    <!-- Core -->
    <script src="../../vendor/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../../vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Vendor JS -->
    <script src="../../vendor/onscreen/dist/on-screen.umd.min.js"></script>

    <!-- Slider -->
    <script src="../../vendor/nouislider/distribute/nouislider.min.js"></script>

    <!-- Smooth scroll -->
    <script src="../../vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

    <!-- Charts -->
    <script src="../../vendor/chartist/dist/chartist.min.js"></script>
    <script src="../../vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

    <!-- Datepicker -->
    <script src="../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

    <!-- Sweet Alerts 2 -->
    <script src="../../vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

    <!-- Vanilla JS Datepicker -->
    <script src="../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

    <!-- Notyf -->
    <script src="../../vendor/notyf/notyf.min.js"></script>

    <!-- Simplebar -->
    <script src="../../vendor/simplebar/dist/simplebar.min.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Volt JS -->
    <script src="../../assets/js/volt.js"></script>
</body>
</html>
