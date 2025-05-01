<main class="content mt-5">
  <div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">DATA FASILITAS</h5>
      <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalFasilitas">+ Tambah Fasilitas</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Nama Fasilitas</th>
              <th>Jenis</th>
              <th>Ikon</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($fasilitas_list as $f) : ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $f->nama ?></td>
              <td><?= $f->tipe_aksi ?></td>
              <td><i class="fas <?= $f->ikon ?>"></i></td>
              <td>
                <a href="#" class="btn btn-sm btn-warning btn-edit-fasilitas" data-id="<?= $f->id_fasilitas ?>" data-bs-toggle="modal" data-bs-target="#modalEditFasilitas">Edit</a>
                <a href="<?= base_url('admin/hapus_fasilitas/' . $f->id_fasilitas) ?>" class="btn btn-sm btn-danger">Hapus</a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>

<!-- Modal Tambah Fasilitas -->
<div class="modal fade mt-5 px-3" id="modalFasilitas" tabindex="-1" aria-labelledby="modalFasilitasLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <form action="<?= base_url('admin/tambah_fasilitas'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="modalFasilitasLabel">Tambah Fasilitas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Fasilitas</label>
            <input type="text" class="form-control" name="nama" id="nama" required>
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
            <select class="form-select" id="tipe_aksi" name="tipe_aksi" required>
              <option value="">Pilih Tipe</option>
              <option value="link">Link</option>
              <option value="popup">Popup</option>
            </select>
          </div>
          <div id="formLink" class="d-none">
            <div class="mb-3">
              <label for="link" class="form-label">Link URL</label>
              <input type="text" class="form-control" id="link" name="link">
            </div>
          </div>
          <div id="formPopup" class="d-none">
            <div class="mb-3">
              <label for="deskripsi" class="form-label">Deskripsi</label>
              <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
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

<!-- Modal Edit Fasilitas -->
<div class="modal fade mt-5 px-3" id="modalEditFasilitas" tabindex="-1" aria-labelledby="modalEditFasilitasLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <form id="formEditFasilitas" action="<?= base_url('admin/update_fasilitas'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_fasilitas" id="edit_id_fasilitas">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditFasilitasLabel">Edit Fasilitas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
          <div class="mb-3">
            <label for="edit_nama" class="form-label">Nama Fasilitas</label>
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