<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="title" content="Volt Premium Bootstrap Dashboard - Sign in page" />
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

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
  </head>

  <body>
    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

    <main>
      <!-- Section -->
      <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
        <div class="container">
          <p class="text-center"></p>
          <div class="row justify-content-center form-bg-image">
            <div class="col-12 d-flex align-items-center justify-content-center">
              <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                <div class="text-center text-md-center mb-4 mt-md-0">
                  <h1 class="mb-0 h3">Admin Helios Hotel</h1>
                </div>
                <form method="post" action="<?= base_url('auth/process') ?>" class="mt-4">
                  <!-- Form -->
                  <div class="form-group mb-4">
                    <label for="email">Email</label>
                    <div class="input-group">
                      <span class="input-group-text" id="basic-addon1">
                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                          <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                      </span>
                      <input type="email" class="form-control" placeholder="example@company.com" id="email" name="email" autofocus required />
                    </div>
                  </div>
                  <!-- End of Form -->
                  <div class="form-group">
                    <!-- Form -->
                    <div class="form-group mb-4">
                      <label for="password">Password</label>
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon2">
                          <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                          </svg>
                        </span>
                        <input type="password" placeholder="Password" class="form-control" id="password" name="password" required />
                      </div>
                    </div>
  
                    <!-- End of Form -->
                  </div>
                  
                  <div class="d-grid">
                    <button type="submit" class="btn btn-custom">Sign in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Core -->
    <script src="<?= base_url('include/vendor/@popperjs/core/dist/umd/popper.min.js') ?>"></script>
    <script src="<?= base_url('include/vendor/bootstrap/dist/js/bootstrap.min.js') ?>"></script>

    <!-- Vendor JS -->
    <script src="<?= base_url('include/vendor/onscreen/dist/on-screen.umd.min.js') ?>"></script>

    <!-- Slider -->
    <script src="<?= base_url('include/vendor/nouislider/distribute/nouislider.min.js') ?>"></script>

    <!-- Smooth scroll -->
    <script src="<?= base_url('include/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') ?>"></script>

    <!-- Charts -->
    <script src="<?= base_url('include/vendor/chartist/dist/chartist.min.js') ?>"></script>
    <script src="<?= base_url('include/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') ?>"></script>

    <!-- Datepicker -->
    <script src="<?= base_url('include/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') ?>"></script>

    <!-- Sweet Alerts 2 -->
    <script src="<?= base_url('vendor/sweetalert2/dist/sweetalert2.all.min.js') ?>"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

    <!-- Vanilla JS Datepicker -->
    <script src="<?= base_url('include/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') ?>"></script>

    <!-- Notyf -->
    <script src="<?= base_url('vendor/notyf/notyf.min.js') ?>"></script>

    <!-- Simplebar -->
    <script src="<?= base_url('include/vendor/simplebar/dist/simplebar.min.js') ?>"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Volt JS -->
    <script src="<?= base_url('include/js/volt.js') ?>"></script>
  </body>
</html>
