<!DOCTYPE html>
<html>
<head>
  <title>Student Management System Pusat Tahfiz Sains Darul Ilmi</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

  <!-- plugins:css -->
  <link rel="stylesheet" href="/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
  <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.addons.css">
  {{-- @stack('plugin-styles') --}}

 <!-- inject:css -->
 <link rel="stylesheet" href="/assets/css/shared/style.css">
 <!-- endinject -->
 <!-- Layout styles -->
 <link rel="stylesheet" href="/assets/css/demo_1/style.css">
 <!-- End Layout styles -->
 <link rel="shortcut icon" href="/assets/images/favicon.ico" />


</head>
<body data-base-url="{{url('/')}}">

  <div class="container-scroller" id="app">
    @include('layout.header')
    <div class="container-fluid page-body-wrapper">
      @include('layout.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        @include('layout.footer')
      </div>
    </div>
  </div>

   <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
    {{-- <script src="assets/vendors/js/vendor.bundle.addons.js"></script> --}}
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="/assets/js/shared/off-canvas.js"></script>

    <!-- endinject -->
    <!-- Custom js for this page-->
    {{-- <script src="assets/js/demo_1/dashboard.js"></script> --}}
    <!-- End custom js for this page-->
    <script src="/assets/js/shared/jquery.cookie.js" type="text/javascript"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

