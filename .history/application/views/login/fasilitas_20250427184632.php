<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="title" content="Dashboard" />
    <meta name="author" content="Themesberg" />

    <!-- Important: jQuery dan Bootstrap JS harus dimuat sebelum kode lain -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('include/img/favicon/logo1.png') ?>" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('include/img/favicon/logo1.png') ?>" />

    <link type="text/css" href="<?= base_url('include/vendor/notyf/notyf.min.css') ?>" rel="stylesheet" />

    <!-- Volt CSS -->
    <link type="text/css" href="<?= base_url('include/css/volt.css') ?>" rel="stylesheet" />
    <style>
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


/* Pastikan modal muncul di depan semua elemen */
.modal {
  z-index: 1060 !important;
}

/* Hilangkan overflow hidden */
.modal-body {
  overflow: visible !important;
}

/* Pastikan modal content terlihat */
.modal-content {
  opacity: 1 !important;
  transform: none !important;
}

/* Perbaikan untuk form yang tersembunyi */
#edit_formLink, #edit_formPopup {
  display: none !important;
}

#edit_formLink.show, #edit_formPopup.show {
  display: block !important;
}








      
    </style>
    
    <!-- Fungsi Preview Icon -->
    <script>
      function previewIcon(selectElement) {
        var selectedIcon = selectElement.value;
        if(selectedIcon) {
          $('#previewIcon').attr('class', 'fas ' + selectedIcon);
        } else {
          $('#previewIcon').attr('class', '');
        }
      }

      function previewEditIcon(selectElement) {
        var selectedIcon = selectElement.value;
        if(selectedIcon) {
          $('#previewIcon').attr('class', 'fas ' + selectedIcon);
        } else {
          $('#previewIcon').attr('class', '');
        }
      }
    </script>
  </head>

  <body>
  <div id="modalWrapper" style="position: relative; z-index: 1060;">
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
                <?php  $no = 1;  foreach ($fasilitas_list as $f) : ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $f->nama; ?></td>
                    <td><?php echo $f->tipe_aksi; ?></td>
                    <td><i class="fas <?= $f->ikon; ?>"></i></td>
                    <td>
                    <a href="#" class="btn btn-sm btn-warning btn-edit-fasilitas" data-id="<?= $f->id_fasilitas; ?>" data-bs-toggle="modal" data-bs-target="#modalEditFasilitas">Edit</a>
                        <a href="<?= base_url('admin/hapus_fasilitas/' . $f->id_fasilitas)?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
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

<!-- Modal Edit Fasilitas -->
<div class="modal fade" id="modalEditFasilitas" tabindex="-1" aria-labelledby="modalEditFasilitasLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formEditFasilitas" action="<?= base_url('admin/update_fasilitas'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_fasilitas" id="edit_id_fasilitas">
        
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditFasilitasLabel">Edit Fasilitas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label for="edit_nama" class="form-label">Nama Fasilitas</label>
            <input type="text" class="form-control" id="edit_nama" name="nama" required>
          </div>
          
          <div class="mb-3">
            <label for="edit_ikon" class="form-label">Ikon</label>
            <select id="edit_ikon" class="form-select" name="ikon" onchange="previewEditIcon(this)">
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

          <!-- Bagian untuk Tipe LINK -->
          <div id="edit_formLink" class="d-none">
            <div class="mb-3">
              <label for="edit_link" class="form-label">Link URL</label>
              <input type="text" class="form-control" id="edit_link" name="link">
            </div>
          </div>

          <!-- Bagian untuk Tipe POPUP -->
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
</div>

<!-- Script-script lainnya -->
<script>
$(document).ready(function() {
  // Debug modal
  $('#modalEditFasilitas').on('show.bs.modal', function (e) {
    console.log('Modal sedang dibuka');
  });

  $('#modalEditFasilitas').on('shown.bs.modal', function (e) {
    console.log('Modal telah terbuka');
  });

  // Ketika tombol edit diklik (perbaikan)
  $('.btn-edit-fasilitas').on('click', function(e) {
    console.log('Tombol edit diklik');
    var id = $(this).data('id'); // Ambil id_fasilitas dari tombol
    console.log('ID Fasilitas:', id);
    
    // AJAX request ke controller
    $.ajax({
      url: '<?= base_url("admin/get_fasilitas_by_id"); ?>', // ini endpointnya
      type: 'POST',
      data: { id_fasilitas: id },
      dataType: 'json',
      success: function(data) {
        console.log('Data diterima:', data);
        if(data) {
          // Isi form di modal
          $('#edit_id_fasilitas').val(data.id_fasilitas);
          $('#edit_nama').val(data.nama);
          $('#edit_ikon').val(data.ikon).trigger('change');
          $('#edit_tipe_aksi').val(data.tipe_aksi).trigger('change');

          if(data.tipe_aksi === 'link') {
            $('#edit_formLink').removeClass('d-none');
            $('#edit_formPopup').addClass('d-none');
            $('#edit_link').val(data.link);
          } else if(data.tipe_aksi === 'popup') {
            $('#edit_formPopup').removeClass('d-none');
            $('#edit_formLink').addClass('d-none');
            $('#edit_deskripsi').val(data.deskripsi);

            // Tampilkan foto-fotonya kalau ada
            let photosHtml = '';
            if(data.fotos) {
              data.fotos.forEach(function(foto) {
                photosHtml += `<img src="<?= base_url('uploads/fasilitas/'); ?>${foto}" class="img-thumbnail" width="100">`;
              });
            }
            $('#currentPhotos').html(photosHtml);
          }
        } else {
          alert('Data fasilitas tidak ditemukan!');
        }
      },
      error: function(xhr, status, error) {
        console.error('Error AJAX:', xhr.responseText);
        alert('Terjadi kesalahan saat mengambil data.');
      }
    });

        // Buka modal terlebih dahulu
        $('#modalEditFasilitas').modal('show');
  });

  // Ubah tampilan form link / popup kalau edit tipe_aksi diubah manual
  $('#edit_tipe_aksi').on('change', function() {
    var value = this.value;
    if (value == 'link') {
      $('#edit_formLink').removeClass('d-none');
      $('#edit_formPopup').addClass('d-none');
    } else if (value == 'popup') {
      $('#edit_formPopup').removeClass('d-none');
      $('#edit_formLink').addClass('d-none');
    } else {
      $('#edit_formLink').addClass('d-none');
      $('#edit_formPopup').addClass('d-none');
    }
  });

  // Tambah event listener untuk tombol Tambah File Lain pada modal edit
  $('#edit_addMoreFiles').on('click', function() {
    const container = document.getElementById('edit_fileUploadContainer');
    const newInput = document.createElement('div');
    newInput.className = 'file-input-wrapper mb-2';
    newInput.innerHTML = `
      <input type="file" class="form-control" name="foto[]" accept="image/*">
      <button type="button" class="btn btn-sm btn-danger mt-1 remove-file">Hapus</button>
    `;
    container.appendChild(newInput);
    
    // Tambahkan event listener untuk tombol hapus
    $(newInput).find('.remove-file').on('click', function() {
      container.removeChild(newInput);
    });
  });

  // Konfigurasi Select2 untuk ikon
  $('#ikon').select2({
    templateResult: formatIcon,
    templateSelection: formatIconSelection,
    width: '100%'
  });

  $('#edit_ikon').select2({
    templateResult: formatIcon,
    templateSelection: formatIconSelection,
    width: '100%'
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
  </body>
</html>