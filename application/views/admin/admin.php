<main class="content mt-5">
      <div class="card mt-5">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">DATA ADMIN</h5>
          <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdmin">+ Tambah Admin</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
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
                    <a href="#" class="btn btn-sm btn-warning btn-edit-admin" data-id="<?= $a->id_admin ?>" data-bs-toggle="modal" data-bs-target="#modalEditAdmin">Edit</a>
                    <a href="<?= base_url('admin/hapus_admin/' . $a->id_admin) ?>" class="btn btn-sm btn-danger">Hapus</a>
                  </td>
                </tr> 
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
</main>
  
<!-- Modal Tambah Admin -->
  <div class="modal fade mt-5 px-3" id="modalAdmin" tabindex="-1" aria-labelledby="modalAdminLabel" aria-hidden="true">
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
  <div class="modal fade mt-5 px-3" id="modalEditAdmin" tabindex="-1" aria-labelledby="modalEditAdminLabel" aria-hidden="true">
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
              <input type="text" class="form-control" name="nama" id="edit_nama" required>
            </div>
            <div class="mb-3">
              <label for="edit_email" class="form-label">Email</label>
              <input type="text" class="form-control" name="email" id="edit_email" required>
            </div>
            <div class="mb-3">
              <label for="edit_password" class="form-label">Password</label>
              <input type="text" class="form-control" name="password" id="edit_password" required>
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