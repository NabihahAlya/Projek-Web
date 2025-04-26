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
            <h5 class="mb-0">Daftar Kritik dan Saran </h5>
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead class="thead-light">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Kritik dan Saran</th>
                </tr>
              </thead>
              <tbody>
              <?php $id = 1; foreach ($kritik_list as $k) : ?>
                <tr>
                  <td><?= $id++ ?></td>
                  <td><?= $k->nama_pengirim ?></td>
                  <td><?= $k->kritik_saran ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>

    <script>
        // Fungsi untuk melakukan AJAX request
        function loadKritik() {
            const xhr = new XMLHttpRequest(); // Membuat XMLHttpRequest
            xhr.open('GET', '<?= base_url('controller/load_kritik') ?>', true); // URL controller untuk load data

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    // Jika berhasil, kita perbarui tabel dengan data yang diterima
                    document.getElementById('kritik-list').innerHTML = xhr.responseText;
                } else {
                    console.error('Request failed with status: ' + xhr.status);
                }
            };

            xhr.onerror = function() {
                console.error('Request failed');
            };

            xhr.send(); // Kirim request
        }

        // Panggil fungsi loadKritik ketika halaman siap
        document.addEventListener('DOMContentLoaded', loadKritik);
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
