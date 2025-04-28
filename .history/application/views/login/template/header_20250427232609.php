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
    <header>
      <div class="header d-flex justify-content-between align-items-center px-4 py-2">
        <div class="d-flex align-items-center">
          <img src="<?= base_url('include/img/logo_wt_name.png') ?>" alt="logo" />
          <p>Helios Hotel Malang</p>
        </div>

        <div id="navbarSupportedContent" class="d-flex align-items-center">
          <ul>
            <li class="nav-item">
              <a class="nav-link text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span><?php echo $admin_name; ?> </span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end mt-2">
                <li>
                  <a class="dropdown-item d-flex align-items-center text-danger" href="<?= base_url('auth/logout')?>">
                    <svg class="dropdown-icon me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Logout
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </header>
    
    <script src="<?= base_url('include/vendor/@popperjs/core/dist/umd/popper.min.js') ?>"></script>
    <script src="<?= base_url('include/vendor/bootstrap/dist/js/bootstrap.min.js') ?>"></script>

    <!-- Vendor JS -->
    <script src="<?= base_url('include/vendor/onscreen/dist/on-screen.umd.min.js') ?>"></script>

    <!-- Slider -->
    <script src="<?= base_url('include/vendor/nouislider/distribute/nouislider.min.js') ?>"></script>

    <!-- Smooth scroll -->
    <script src="<?= base_url('include/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.jss') ?>"></script>

    <!-- Charts -->
    <script src="<?= base_url('include/vendor/chartist/dist/chartist.min.js') ?>"></script>
    <script src="<?= base_url('include/vendor/onscreen/dist/on-screen.umd.min.js') ?>../../vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

    <!-- Datepicker -->
    <script src="<?= base_url('include/vendor/onscreen/dist/on-screen.umd.min.js') ?>../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

    <!-- Sweet Alerts 2 -->
    <script src="<?= base_url('include/vendor/onscreen/dist/on-screen.umd.min.js') ?>../../vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

    <!-- Vanilla JS Datepicker -->
    <script src="<?= base_url('include/vendor/onscreen/dist/on-screen.umd.min.js') ?>../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

    <!-- Notyf -->
    <script src="<?= base_url('include/vendor/onscreen/dist/on-screen.umd.min.js') ?>../../vendor/notyf/notyf.min.js"></script>

    <!-- Simplebar -->
    <script src="<?= base_url('include/vendor/onscreen/dist/on-screen.umd.min.js') ?>../../vendor/simplebar/dist/simplebar.min.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Volt JS -->
    <script src="<?= base_url('include/vendor/onscreen/dist/on-screen.umd.min.js') ?>../../assets/js/volt.js"></script>
  </body>
</html>
