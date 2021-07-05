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
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Carousel indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                    <li data-target="#myCarousel" data-slide-to="3"></li>
                                </ol>
                                <!-- Wrapper for carousel items -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="/assets/images/carousel/bg1001.jpg" alt="First Slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="/assets/images/carousel/bg1002.jpg" alt="Second Slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="/assets/images/carousel/bg1003.jpg" alt="Third Slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="/assets/images/carousel/bg1004.jpg" alt="Forth Slide">
                                    </div>
                                </div>
                                <!-- Carousel controls -->
                                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- panggil announcement detail from DB --}}
                <div class="row">
                    @foreach($announcements as $announcement)
                    <div class="col-md-3 grid-margin stretch-card blogBox moreBox" $hideStyle>
                        <div class="card">
                            <img src="/image/announcements/{{ $announcement->image }}" class='card-img-top' alt='card images'>
                            <div class="card-body">
                                <h4 class="card-title">{{ $announcement->title }}</h4>
                                <p class="card-text">{{ $announcement->description }}</p>
                                <div class="d-flex align-items-center justify-content-between text-muted border-top py-3 mt-3">
                                    <div class="wrapper d-flex align-items-center">
                                        <i class="mdi mdi-calendar-check"></i>
                                        <small class="ml-1">
                                            {{ $announcement->announcement_date }}
                                        </small>
                                    </div>
                                    <p class='mb-0'>
                                        <a href='#' data-toggle='modal'
                                            data-target='#details$row[announcement_id]'
                                            class='btn btn-primary btn-md'>
                                            <i class='mdi mdi-arrow-expand'></i> Details
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div id='loadMore' style=''>
                        <a href='#' class='btn mb-1 btn-outline-primary btn-lg'><i class='mdi mdi-arrow-down'></i> Load Announcement</a>
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

<script>
    $( document ).ready(function () {
      $(".moreBox").slice(0, 4).show();
    if ($(".blogBox:hidden").length != 0) {
      $("#loadMore").show();
    }
    $("#loadMore").on('click', function (e) {
      e.preventDefault();
      $(".moreBox:hidden").slice(0, 4).slideDown();
      if ($(".moreBox:hidden").length == 0) {
        $("#loadMore").fadeOut('slow');
      }
    });
  });
   </script>

<style>
    .carousel-inner > .carousel-item {
       height: 400px;
    }
    .carousel-caption {
      top: 18rem;
      z-index: 10;
    }
    #loadMore {
        padding-bottom: 30px;
        padding-top: 30px;
        text-align: center;
        width: 100%;
    }
    #loadMore a {
        display: inline-block;
        padding: 10px 30px;
        transition: all 0.25s ease-out;
        -webkit-font-smoothing: antialiased;
    }
</style>
