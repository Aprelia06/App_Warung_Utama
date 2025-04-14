<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('asset') }}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Utama Canteen</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('asset/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('asset/vendor/js/helpers.js') }}"></script>

    <!-- Config -->
    <script src="{{ asset('asset/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- / Sidebar -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          @include('layouts.navbar')
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="container-fluid">
            <section>
              @yield('content')
            </section>
            <p>&nbsp;</p>
            <!-- Add your card content below -->
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Welcome Aprelia</h5>
                <p class="card-text">Semangat untuk ujian yaa Brohhh</p>
                <a href="#" class="btn btn-primary">Let's Go!!</a>
              </div>
            </div>
          </div>
          <!-- / Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
      >
        
      </a>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('asset/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('asset/vendor/js/menu.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('asset/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('asset/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('asset/js/dashboards-analytics.js') }}"></script>
  </body>
</html>
