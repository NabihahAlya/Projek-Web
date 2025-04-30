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
    <div class="container-fluid">
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="mb-0">DATA KRITIK DAN SARAN</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kritik dan Saran</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  $no = 1;  foreach ($kritik_list as $k) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $k->nama_pengirim; ?></td>
                            <td><?php echo $k->kritik_saran; ?></td>
                            <td><?php echo $k->tanggal_kirim; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
</body>
</html>