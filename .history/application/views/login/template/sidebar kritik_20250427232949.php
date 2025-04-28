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
    <nav id="sidebarMenu" class="sidebar d-lg-block bg-custom text-white collapse" data-simplebar>
      <div class="sidebar-inner px-4 pt-3">
        <ul class="nav flex-column pt-3 pt-md-0">
          <li class="nav-item active">
            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
              <span class="sidebar-icon">
                <svg class="icon icon-xs me-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M21 6h-2V4a1 1 0 00-1-1H6a1 1 0 00-1 1v2H3a1 1 0 00-1 1v11a1 1 0 001 1h2v3l3-3h10a1 1 0 001-1V7a1 1 0 00-1-1z" />
                </svg>
              </span>
              <span class="sidebar-text">Kritik & Saran</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('Admin/kamar') ?>" class="nav-link">
              <span class="sidebar-icon">
                <svg class="icon icon-xs me-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M4 7a2 2 0 012-2h12a2 2 0 012 2v5h-6v-1a2 2 0 00-4 0v1H4V7zm0 7h16v2H4v-2zm0 3h16v2H4v-2z" />
                </svg>
              </span>
              <span class="sidebar-text">Kamar</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/fasilitas') ?>" class="nav-link">
              <span class="sidebar-icon">
                <svg class="icon icon-xs me-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M19 13h-2v-2h2V8a2 2 0 00-2-2h-3V4a2 2 0 00-4 0v2H7a2 2 0 00-2 2v3h2v2H5v3a2 2 0 002 2h3v2a2 2 0 004 0v-2h3a2 2 0 002-2v-3z" />
                </svg>
              </span>
              <span class="sidebar-text">Fasilitas</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/layanan') ?>" class="nav-link">
              <span class="sidebar-icon">
                <svg class="icon icon-xs me-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 1a9 9 0 00-9 9v5a4 4 0 004 4h1v-6H6v-3a6 6 0 1112 0v3h-2v6h1a4 4 0 004-4v-5a9 9 0 00-9-9z" />
                </svg>
              </span>
              <span class="sidebar-text">Layanan</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/admin') ?>" class="nav-link">
              <span class="sidebar-icon">
                <svg class="icon icon-xs me-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 12a5 5 0 10-5-5 5 5 0 005 5zm-7 9a7 7 0 0114 0H5zm15.7-5.3l-1-1a.999.999 0 00-1.4 1.4l1 1a.999.999 0 101.4-1.4zM19 15a1 1 0 10-1-1 1 1 0 001 1zm-4.3 4.3l-1 1a.999.999 0 101.4 1.4l1-1a.999.999 0 10-1.4-1.4z" />
                </svg>
              </span>
              <span class="sidebar-text">Admin</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
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
    <script src="<?= base_url('include/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') ?>"></script>
    <!-- Datepicker -->
    <script src="<?= base_url('include/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') ?>"></script>
    <!-- Sweet Alerts 2 -->
    <script src="<?= base_url('include/vendor/sweetalert2/dist/sweetalert2.all.min.js') ?>"></script>
    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
    <!-- Vanilla JS Datepicker -->
    <script src="<?= base_url('include/vendor/vanillajs-datepicker/dist/js/datepicker.min.j') ?>"></script>
    <!-- Notyf -->
    <script src="<?= base_url('include/vendor/notyf/notyf.min.js') ?>"></script>
    <!-- Simplebar -->
    <script src="<?= base_url('include/vendor/simplebar/dist/simplebar.min.js') ?>"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Volt JS -->
    <script src="<?= base_url('assets/js/volt.js') ?>"></script>
  </body>
</html>
