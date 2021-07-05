@extends('layout.masterTeacherTahfiz')

@section('content')

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
@endsection
