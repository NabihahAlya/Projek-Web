<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="title" content="Dashboard" />
    <meta name="author" content="Themesberg" />
  
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
    <div class="container-fluid">
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="mb-0">Daftar Kritik dan Saran</h5>
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
