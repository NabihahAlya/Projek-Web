<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="title" content="Dashboard" />
    <meta name="author" content="Themesberg" />
    <meta name="description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS." />
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('include/img/favicon/logo1.png') ?>" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('include/img/favicon/logo1.png') ?>" />
    <!-- Sweet Alert -->
    <link type="text/css" href="<?= base_url('include/vendor/sweetalert2/dist/sweetalert2.min.css') ?>" rel="stylesheet" />
    <!-- Notyf -->
    <link type="text/css" href="<?= base_url('include/vendor/notyf/notyf.min.css') ?>" rel="stylesheet" />
    <!-- Volt CSS -->
    <link type="text/css" href="<?= base_url('include/css/volt.css') ?>" rel="stylesheet" />
  </head>
  
  <body>
    <main class="content mt-5">
      <div class="card mt-5">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Data Admin</h5>
          <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdmin">+ Tambah Admin</a>
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php  $id = 1;  foreach ($admin_list as $a) : ?>
              <tr>
                <td><?php echo $id++; ?></td>
                <td><?php echo $a->nama; ?></td>
                <td><?php echo $a->email; ?></td>
                <td><?php echo $a->password; ?></td>
                <td>
                  <a href="#" class="btn btn-sm btn-warning btn-edit-admin" data-id="<?= $a->id ?>" data-bs-toggle="modal" data-bs-target="#modalEditAdmin">Edit</a>
                  <a href="<?= base_url('admin/hapus_admin/' . $a->id) ?>" class="btn btn-sm btn-danger">Hapus</a>
                </td>
              </tr> 
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>

<!-- Modal Tambah Admin -->
<div class="modal fade" id="modalAdmin" tabindex="-1" aria-labelledby="modalAdminLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= base_url('admin/tambah_admin'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAdminLabel">Edit Admin</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Admin</label>
            <input type="text" class="form-control" name="nama" id="nama" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email" required>
          </div>
          <div class="mb-3">
            <label for="pw" class="form-label">Password</label>
            <input type="text" class="form-control" name="pw" id="pw" required>
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



<!-- Modal Edit Admin -->
<div class="modal fade" id="modalEditAdmin" tabindex="-1" aria-labelledby="modalEditAdminLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formEditAdmin" action="<?= base_url('admin/update_admin'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_admin" id="edit_id_admin">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditAdminLabel">Edit Admin</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="edit_nama" class="form-label">Nama Admin</label>
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
    $('.btn-edit-admin').on('click', function() {
        const id = $(this).data('id');
        console.log('ID yang diambil:', id); // Tambahkan ini
        $('#edit_id').val(id); 
    });
});

</script> 



    <script src="<?= base_url('include/vendor/@popperjs/core/dist/umd/popper.min.js') ?>"></script>
    <script src="<?= base_url('include/vendor/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <!-- Vendor JS -->
    <script src="<?= base_url('include/vendor/onscreen/dist/on-screen.umd.min.js') ?>"></script>
    <!-- Slider -->
    <script src="<?= base_url('include/vendor/nouislider/dist/nouislider.min.js') ?>"></script>
    <!-- Smooth scroll -->
    <script src="<?= base_url('include/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') ?>"></script>
    <!-- Charts -->
    <script src="<?= base_url('include/vendor/chartist/dist/chartist.min.js') ?>"></script>
    <script src="<?= base_url('include/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') ?>"></script>
    <!-- Datepicker -->
    <script src="<?= base_url('include/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') ?>"></script>
    <!-- Sweet Alerts 2 -->
    <script src="<?= base_url('include/vendor/sweetalert2/dist/sweetalert2.all.min.js') ?>"></script>
    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
    <!-- Vanilla JS Datepicker -->
    <script src="<?= base_url('include/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') ?>"></script>
    <!-- Notyf -->
    <script src="<?= base_url('include/vendor/notyf/notyf.min.js') ?>"></script>
    <!-- Simplebar -->
    <script src="<?= base_url('include/vendor/simplebar/dist/simplebar.min.js') ?>"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
