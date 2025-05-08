<main class="content mt-5">
  <div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Data Kamar</h5>
      <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalKamar">+ Tambah Kamar</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
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
            <?php if (!empty($data_kamar)) : ?>
              <?php foreach ($data_kamar as $index => $row) : ?>
                <tr>
                  <td><?= ++$index ?></td>
                  <td><?= htmlspecialchars($row['type_kamar']) ?> Room</td>
                  <td class="long-text"><?= htmlspecialchars($row['deskripsi']) ?></td>
                  <td><?= number_format($row['price'], 0, ',', '.') ?></td>
                  <td><?= $jml_foto[$row['type_kamar']] ?? 0 ?></td>
                  <td><?= $jml_spek[$row['type_kamar']] ?? 0 ?></td>
                  <td>
                    <a href="#" class="btn btn-sm btn-info btn-lihat-foto" data-type="<?= $row['type_kamar'] ?>">Lihat Foto</a>
                    <a href="#" class="btn btn-sm btn-warning btn-edit-kamar" data-bs-toggle="modal" data-bs-target="#modalEditKamar<?= $row['type_kamar'] ?>" data-type="<?= $row['type_kamar'] ?>">Edit</a>
                    <a href="<?= base_url('admin/hapus_kamar/' . $row['type_kamar']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus kamar ini?')">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td colspan="7" class="text-center">Tidak Ada Data Kamar</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
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
    <label class="form-label">Spesifikasi</label>
    <div id="spekContainer">
        <div class="file-input-wrapper mb-2">
            <input type="text" class="form-control" name="spek[]" required>
        </div>
    </div>
    <button type="button" class="btn btn-secondary mt-2 btn-add-more-spek" data-container="spekContainer">Tambah Spek Lain</button>
</div>
          <div class="mb-3">
            <label class="form-label">Upload Foto</label>
            <div id="fileUploadContainer">
              <div class="file-input-wrapper mb-2">
                <input type="file" class="form-control" name="foto[]" accept="image/*" required>
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

<!-- Modal Lihat Foto -->
<?php if (!empty($data_kamar)) : ?>
  <?php foreach ($data_kamar as $row) : ?>
    <div class="modal fade" id="modalLihatFoto<?= $row['type_kamar'] ?>" tabindex="-1" aria-labelledby="modalLihatFotoLabel<?= $row['type_kamar'] ?>" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLihatFotoLabel<?= $row['type_kamar'] ?>">Foto <?= ucfirst($row['type_kamar']) ?> Kamar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="d-flex justify-content-end mb-3">
              <button type="button" class="btn btn-primary btn-tambah-foto" data-bs-toggle="modal" data-bs-target="#modalTambahFoto" data-type="<?= $row['type_kamar'] ?>">
                <i class="fas fa-plus"></i> Tambah Foto
              </button>
            </div>
            
            <div id="carouselFotoKamar<?= $row['type_kamar'] ?>" class="carousel slide" data-bs-ride="false">
              <div class="carousel-inner">
                <?php if (!empty($foto[$row['type_kamar']])) : ?>
                  <?php foreach ($foto[$row['type_kamar']] as $index => $img) : ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                      <img src="<?= base_url('assets/img/upload/kamar/' . $img['foto']) ?>" class="d-block mx-auto img-fluid" alt="<?= $row['type_kamar'] ?> Room">
                      <div class="carousel-footer text-center mt-2">
                        <a href="#" class="btn btn-sm btn-warning btn-edit-foto" data-id="<?= $img['id_foto'] ?>" data-bs-toggle="modal" data-bs-target="#modalEditFoto">Edit</a>
                        <a href="<?= base_url('admin/hapus_foto_kamar/' . $img['id_foto']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus foto ini?')">Hapus</a>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else : ?>
                  <div class="text-center py-4">
                    <p>Tidak ada foto untuk kamar ini</p>
                  </div>
                <?php endif; ?>
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
  <?php endforeach; ?>
<?php endif; ?>

<!-- Modal Edit Kamar -->
<?php if (!empty($data_kamar)) : ?>
  <?php foreach ($data_kamar as $row) : ?>
    <div class="modal fade" id="modalEditKamar<?= $row['type_kamar'] ?>" tabindex="-1" aria-labelledby="modalEditKamarLabel<?= $row['type_kamar'] ?>" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="<?= base_url('admin/update_kamar'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="type_kamar_before" value="<?= $row['type_kamar'] ?>">
            <div class="modal-header">
              <h5 class="modal-title" id="modalEditKamarLabel<?= $row['type_kamar'] ?>">Edit Kamar</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="type_kamar" class="form-label">Tipe Kamar</label>
                <input type="text" class="form-control" name="type_kamar" value="<?= htmlspecialchars($row['type_kamar']) ?>" required>
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">Harga/malam</label>
                <input type="number" class="form-control" name="price" value="<?= $row['price'] ?>" required>
              </div>
              <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required><?= htmlspecialchars($row['deskripsi']) ?></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">Spesifikasi</label>
                <div id="spekContainerEdit<?= $row['type_kamar'] ?>">
                  <?php if (!empty($spek[$row['type_kamar']])) : ?>
                    <?php foreach ($spek[$row['type_kamar']] as $indexSpek => $rowSpek) : ?>
                      <div class="file-input-wrapper mb-2">
                        <input type="text" class="form-control" name="spek[]" value="<?= htmlspecialchars($rowSpek['spek']) ?>" required>
                        <?php if ($indexSpek > 0) : ?>
                          <button type="button" class="btn btn-sm btn-danger mt-1 remove-file">Hapus</button>
                        <?php endif; ?>
                      </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
                <button type="button" class="btn btn-secondary mt-2 btn-add-more-spek" data-container="spekContainerEdit<?= $row['type_kamar'] ?>">Tambah Spek Lain</button>
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
  <?php endforeach; ?>
<?php endif; ?>

<!-- Modal Tambah Foto -->
<div class="modal fade" id="modalTambahFoto" tabindex="-1" aria-labelledby="modalTambahFotoLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= base_url('admin/tambah_foto_kamar'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="type_kamar" id="type_kamar_tambah_foto">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTambahFotoLabel">Tambah Foto Kamar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit Foto -->
<div class="modal fade" id="modalEditFoto" tabindex="-1" aria-labelledby="modalEditFotoLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= base_url('admin/edit_foto_kamar'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_foto" id="edit_id_foto">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditFotoLabel">Edit Foto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Upload Foto Baru</label>
            <input type="file" class="form-control" name="foto" accept="image/*" required>
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
  $(document).ready(function() {
    // Initialize carousels
    $('.carousel').each(function() {
        new bootstrap.Carousel(this, {
            interval: false,
            wrap: true
        });
    });

    // Modal backdrop handling
    $('body').on('hidden.bs.modal', '.modal', function() {
        if ($('.modal:visible').length) {
            $('body').addClass('modal-open');
            if ($('.modal-backdrop').length == 0) {
                $('body').append('<div class="modal-backdrop fade show"></div>');
            }
        }
    });

    // Lihat Foto button (delegasi event untuk elemen dinamis)
    $(document).on('click', '.btn-lihat-foto', function() {
        const typeKamar = $(this).data('type');
        $('#modalLihatFoto' + typeKamar).modal('show');
    });

    // Tambah Foto button
    $(document).on('click', '.btn-tambah-foto', function() {
        const typeKamar = $(this).data('type');
        $('#type_kamar_tambah_foto').val(typeKamar);
    });

    // Dynamic form elements
    $(document).on('click', '.btn-add-more-files', function() {
        const container = $('#' + $(this).data('container'));
        const count = container.find('.file-input-wrapper').length;
        
        container.append(`
            <div class="file-input-wrapper mb-2">
                <input type="file" class="form-control" name="foto[]" accept="image/*" required>
                <button type="button" class="btn btn-sm btn-danger mt-1 remove-file">Hapus</button>
            </div>
        `);
    });

    $(document).on('click', '.btn-add-more-spek', function() {
        const container = $('#' + $(this).data('container'));
        const count = container.find('.file-input-wrapper').length;
        
        container.append(`
            <div class="file-input-wrapper mb-2">
                <input type="text" class="form-control" name="spek[]" required>
                <button type="button" class="btn btn-sm btn-danger mt-1 remove-file">Hapus</button>
            </div>
        `);
    });

    // Remove dynamic elements
    $(document).on('click', '.remove-file', function() {
        $(this).closest('.file-input-wrapper').remove();
    });

    // Edit Foto button (delegasi event untuk elemen dinamis)
    $(document).on('click', '.btn-edit-foto', function() {
        $('#edit_id_foto').val($(this).data('id'));
    });

    // Flash message
    <?php if ($this->session->flashdata('pesan') && $this->session->userdata('flash_displayed')): ?>
        alert("<?= addslashes($this->session->flashdata('pesan')) ?>");
        <?php $this->session->unset_userdata('flash_displayed'); ?>
    <?php endif; ?>
});
</script>