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
    @include('layout.headerPublic')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel" style="width: 100%;">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content tab-transparent-content">
                          <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                            <div class="row">
                              <div class="col-sm-4 grid-margin stretch-card">
                                <div class="card">
                                  <div class="card-body bg-white pt-4">
                                    <div class="row pt-4">
                                      <div class="col-sm-12">
                                        <div class="text-center">
                                            <div class="text-center">
                                                <h4 class="card-title text-left">We love to hear you...</h4>
                                                <img class="card-img img-fluid" src="/assets/images/location.jpg" alt="location" />
                                                <h4><i class="la la-map-marker font-medium-4"></i> We are located at<br />1665, Jalan Gelang Chinchin,<br />Kampung Sepinang,<br />85000 Segamat, Johor<br /></h4>
                                                <p class="timeline-date">
                                                    <span class="text-success"><i class="la la-whatsapp font-medium-4"></i> 6018888888</span><br />
                                                    <span class="text-danger"><i class="la la-envelope font-medium-4"></i> admin@ptsdi.my</span><br />
                                                    <span class="text-info"><i class="la la-calendar-check-o font-medium-4"></i> Sunday - Thursday</span><br />
                                                    <span class="text-warning"><i class="la la-clock-o font-medium-4"></i> 10AM - 6PM</span>
                                                </p>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-8  grid-margin stretch-card">
                                <div class="card">
                                  <div class="card-body">
                                    <div class="d-xl-flex justify-content-between mb-2">
                                      <h4 class="card-title">Using maps is the easy way to reach us...</h4>
                                    </div>
                                    <iframe class="card-img-top" src="https://maps.google.com/maps?q=PUSAT+TAHFIZ+SAINS+DARUL+ILMI&t=&z=13&ie=UTF8&iwloc=&output=embed" width="1300" height="480" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
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

