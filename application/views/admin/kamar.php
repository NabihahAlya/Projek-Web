<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="title" content="Dashboard" />
    <meta name="author" content="Themesberg" />

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
      table {
            width: 100%;
            border-collapse: collapse;
        }

        td.long-text {
            white-space: normal;
            word-wrap: break-word;
            word-break: break-word;
        }
    </style>
  </head>
  <body>
    <main class="content mt-5">
      <div class="card mt-5">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Data Kamar</h5>
          <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalKamar">+ Tambah Kamar</a>
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Nama Tipe</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Jumlah Foto</th>
                <th>Spesifikasi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                  if (!empty($data_kamar)) {
                    foreach ($data_kamar as $index => $row) {
                  
                ?>
                  <tr>
                    <td><?= ++$index ?></td>
                    <td><?= $row['type_kamar'] ?> Room</td>
                    <td class="long-text"><?= $row['deskripsi'] ?></td>
                    <td><?= number_format($row['price'] , 0, ',', '.') ?></td>
                    <td><?= $jml_foto[$row['type_kamar']] ?></td>
                    <td><?= $jml_spek[$row['type_kamar']] ?></td>

                    <td>
                      <a href="#" class="btn btn-sm btn-info btn-lihat-foto" data-type="<?= $row['type_kamar'] ?>">Lihat Foto</a>
                      <a href="#" class="btn btn-sm btn-warning btn-edit-kamar" data-bs-toggle="modal" data-bs-target="#modalEditKamar<?= $row['type_kamar'] ?>" data-type="<?= $row['type_kamar'] ?>">Edit</a>
                      <a href="<?= base_url('admin/hapus_kamar/' . $row['type_kamar']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus kamar ini?')">Hapus</a>
                    </td>
                  </tr>
                <?php 
                    }
                  } else {
                    echo "<tr><td colspan='7'>Tidak Ada Data Kamar</td></tr>";
                  } 
                ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>

    
    <!-- Modal Tambah Kamar -->
    <div class="modal fade" id="modalKamar" tabindex="-1" aria-labelledby="modalKamarLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="<?= base_url('admin/tambah_kamar'); ?>" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title" id="modalKamarLabel">Tambah Kamar</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="type_kamar" class="form-label">Tipe Kamar</label>
                <input type="text" class="form-control" name="type_kamar" required>
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">Harga/malam</label>
                <input type="number" class="form-control" name="price" required>
              </div>
              <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required></textarea>
              </div>
              <div class="mb-3">
                <label for="spek[]" class="form-label">Spek</label>
                <div id="spekContainer">
                  <div class="file-input-wrapper mb-2">
                    <input type="text" class="form-control" name="spek[]" id="spek" required>
                  </div>
                </div>
              </div>
              <button type="button" class="btn btn-secondary mt-2 btn-add-more-spek" data-container="spekContainer">Tambah Spek Lain</button>
              <div class="mb-3">
                <label class="form-label">Upload Foto</label>
                <div id="fileUploadContainer">
                  <div class="file-input-wrapper mb-2">
                    <input type="file" class="form-control" name="foto[]" accept="image/*">
                  </div>
                </div>
                <button type="button" class="btn btn-secondary mt-2 btn-add-more-files" data-container="fileUploadContainer">Tambah File Lain</button>
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



    <!-- Looping Membutuhkan Data Kamar -->
    <?php 
      if (!empty($data_kamar)) {
        foreach ($data_kamar as $index => $row) {
    ?>
      <!-- Modal Lihat Foto -->
      <div class="modal fade" id="modalLihatFoto<?= $row['type_kamar'] ?>" tabindex="-1" aria-labelledby="modalLihatFotoLabel<?= $row['type_kamar'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLihatFotoLabel<?= $row['type_kamar'] ?>"><?= "Foto " . ucfirst($row['type_kamar']) . " Kamar" ?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Header dengan Tombol Tambah Foto -->
              <div class="d-flex justify-content-end mb-3">
                <button type="button" class="btn btn-primary btn-tambah-foto btn-tambah-foto" data-bs-toggle="modal" data-bs-target="#modalTambahFoto" data-type="<?= $row['type_kamar'] ?>">
                  <i class="fas fa-plus"></i> Tambah Foto
                </button>
              </div>
              
              <!-- Carousel -->
              <div id="carouselFotoKamar<?= $row['type_kamar'] ?>" class="carousel slide" data-bs-ride="false" data-bs-interval="false">
                <div class="carousel-inner" id="carousel-items-<?= $row['type_kamar'] ?>">
                <?php
                  foreach ($foto[$row['type_kamar']] as $index => $img){
                    $class = ($index == 0) ? 'carousel-item active' : 'carousel-item';
                ?>
                    <div class="<?= $class ?>">
                      <img src="<?= base_url('assets/img/upload/kamar/' . $img['foto']) ?>" class="d-block mx-auto" alt="<?= $row['type_kamar'] ?> Room">
                      <div class="carousel-footer text-center">
                        <a href="#" class="btn btn-sm btn-warning mt-3 btn-edit-foto" data-id="<?= $img['id_foto'] ?>" data-bs-toggle="modal" data-bs-target="#modalEditFoto">Edit</a>
                        <a href="<?= base_url('admin/hapus_foto_kamar/' . $img['id_foto']) ?>" class="btn btn-sm btn-danger mt-3" onclick="return confirm('Yakin ingin menghapus foto ini?')">Hapus</a>
                      </div>
                    </div>
                <?php 
                  }
                ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselFotoKamar<?= $row['type_kamar'] ?>" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselFotoKamar<?= $row['type_kamar'] ?>" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Edit Kamar -->
      <div class="modal fade" id="modalEditKamar<?= $row['type_kamar'] ?>" tabindex="-1" aria-labelledby="modalEditKamarLabel<?= $row['type_kamar'] ?>" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="<?= base_url('admin/edit_kamar'); ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="type_kamar_before" id="type_kamar_before_<?= $row['type_kamar'] ?>">
              <div class="modal-header">
                <h5 class="modal-title" id="modalEditKamarLabel<?= $row['type_kamar'] ?>">Edit Kamar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="type_kamar" class="form-label">Tipe Kamar</label>
                  <input type="text" class="form-control" name="type_kamar" value="<?= $row['type_kamar'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="price" class="form-label">Harga/malam</label>
                  <input type="number" class="form-control" name="price" value="<?= $row['price'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <textarea name="deskripsi" class="form-control" required><?= $row['deskripsi'] ?></textarea>
                </div>
                <div class="mb-3">
                  <label for="spek[]" class="form-label">Spek</label>
                  <div id="spekContainerEdit<?= $row['type_kamar'] ?>">
                <?php 
                  foreach ($spek[$row['type_kamar']] as $indexSpek => $rowSpek) {
                ?>
                    <div class="file-input-wrapper mb-2">
                      <input type="text" class="form-control" name="spek[]" id="spek" value="<?= $rowSpek['spek'] ?>" required>
                      <?php if ($indexSpek > 0) { ?>
                        <button type="button" class="btn btn-sm btn-danger mt-1 remove-file">Hapus</button>
                      <?php } ?>
                    </div>
                <?php } ?>
                
                  </div>
                </div>
                <button type="button" class="btn btn-secondary mt-2 btn-add-more-spek" data-container="spekContainerEdit<?= $row['type_kamar'] ?>">Tambah Spek Lain</button>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php
        }
      } 
    ?>

    <!-- Modal tambah foto -->
    <div class="modal fade" id="modalTambahFoto" tabindex="-1" aria-labelledby="modalTambahFotoLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="<?= base_url('admin/tambah_foto_kamar'); ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="type_kamar" id="type_kamar_tambah_foto">
              <div class="modal-header">
                <h5 class="modal-title" id="modalTambahFotoLabel">Tambah Foto untuk Kamar</h5>
                <button type="button" class="btn-close close-tambah-foto" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Upload Foto</label>
                  <div id="fileUploadContainerFoto">
                    <div class="file-input-wrapper mb-2">
                      <input type="file" class="form-control" name="foto[]" accept="image/*" required>
                    </div>
                  </div>
                  <button type="button" class="btn btn-secondary mt-2 btn-add-more-files" data-container="fileUploadContainerFoto">Tambah File Lain</button>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary close-tambah-foto">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    <!-- Modal edit foto -->
    <div class="modal fade" id="modalEditFoto" tabindex="-1" aria-labelledby="modalEditFotoLabel" aria-hidden="true" data-bs-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="<?= base_url('admin/edit_foto_kamar'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_foto" id="edit_id_foto">
            <div class="modal-header">
              <h5 class="modal-title" id="modalEditFotoLabel">Edit Foto</h5>
              <button type="button" class="btn-close close-tambah-foto" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Upload Foto</label>
                  <input type="file" class="form-control" name="foto" accept="image/*" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="button" class="btn btn-secondary close-tambah-foto">Batal</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function() {
        // Initialize all carousels with unique IDs
        $('.carousel').each(function() {
          const carouselId = $(this).attr('id');
          var carousel = new bootstrap.Carousel(document.getElementById(carouselId), {
            interval: false,
            wrap: true
          });
        });

        // Global modal backdrop and scroll handling
        $('body').on('hidden.bs.modal', '.modal', function() {
          if ($('.modal:visible').length) {
            $('body').addClass('modal-open');
            if ($('.modal-backdrop').length === 0) {
              $('body').append('<div class="modal-backdrop fade show"></div>');
            }
          }
        });

        // Handle the Lihat Foto button click
        $('.btn-lihat-foto').on('click', function() {
          var typeKamar = $(this).data('type');
          var modalId = '#modalLihatFoto' + typeKamar;
          $(modalId).modal('show');
        });

        // Handle the Tambah Foto button click
        $(document).on('click', '.btn-tambah-foto', function() {
          const targetModalId = '#modalTambahFoto';
          
          // Open the add photo modal
          $(targetModalId).modal('show');
        });

        // Handle closing of Tambah Foto modal
        $(document).on('click', '.close-tambah-foto', function() {
          const modal = $(this).closest('.modal');
          modal.modal('hide');
          
          // Make sure parent modal stays visible and interactive
          setTimeout(function() {
            if ($('.modal:visible').length) {
              $('body').addClass('modal-open');
              if ($('.modal-backdrop').length === 0) {
                $('body').append('<div class="modal-backdrop fade show"></div>');
              }
            }
          }, 150); // Small delay to ensure proper handling
        });

        // Add more file inputs for the dynamic containers
        $(document).on('click', '.btn-add-more-files', function() {
          const containerId = $(this).data('container');
          const container = $('#' + containerId);
          const newInput = $(`
            <div class="file-input-wrapper mb-2">
              <input type="file" class="form-control" name="foto[]" accept="image/*">
              <button type="button" class="btn btn-sm btn-danger mt-1 remove-file">Hapus</button>
            </div>
          `);
          container.append(newInput);
        });

        // Remove file input 
        $(document).on('click', '.remove-file', function() {
          $(this).parent().remove();
        });

        // Add more spek
        $(document).on('click', '.btn-add-more-spek', function() {
          const containerId = $(this).data('container');
          const container = $('#' + containerId);
          const newInput = $(`
            <div class="file-input-wrapper mb-2">
              <input type="text" class="form-control" name="spek[]" id="spek" required>
              <button type="button" class="btn btn-sm btn-danger mt-1 remove-file">Hapus</button>
            </div>
          `);
          console.log(containerId);
          container.append(newInput);
        });

        $('.btn-edit-foto').on('click', function() {
          const id = $(this).data('id');
          $('#edit_id_foto').val(id); 
        });

        $('.btn-edit-kamar').on('click', function() {
          const type = $(this).data('type');
          const idInput = '#type_kamar_before_' + type;
          $(idInput).val(type);
        });
        
        $('.btn-tambah-foto').on('click', function() {
          const type = $(this).data('type');
          const idInput = '#type_kamar_tambah_foto';
          $(idInput).val(type);
        });

        // Flash message handling
        <?php if ($this->session->flashdata('pesan') && $this->session->userdata('flash_displayed')): ?>
          alert("<?php echo $this->session->flashdata('pesan'); ?>");
          <?php $this->session->unset_userdata('flash_displayed'); ?>
        <?php endif; ?>
      });
    </script>
  </body>
</html>