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
                                                <h4 class="card-title text-left">Hello dear visitor...</h4>
                                                <img class="card-img img-fluid" src="/assets/images/welcome_bg.jpg" alt="images" />
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
                                    <h4 class="card-title">Here are long short story of us...</h4>
                                    <ul class="bullet-line-list">
                                      <li>
                                        <h6 class="text-dark">Introduction</h6>
                                        <p>
                                            Pusat Tahfiz Sains Darul Ilmi (PTSDI) merupakan sebuah intitusi pendidikan tahfiz di bawah
                                            kelolaan Yayasan Takmir Pendidikan Negeri Johor. Lokasi PTSDI terletak di Lot 1665, Jalan Gelang
                                            Chinchin, Mukim Jabi, Segamat dan jaraknya dari bandar Segamat sekitar 15 kilometer. PTSDI
                                            mula beroperasi sepenuhnya bermula 17 Januari 2014.
                                        </p>
                                        <p>
                                            Melalui permuafakatan antara Pewakaf Tuan Haji Harris bin Mat Jadi dan Pemegang
                                            Amanah Darul Ilmi serta Yayasan Takmir Pendidikan Negeri Johor, maka tertubuhlah Pusat Tahfiz
                                            Sains Darul Ilmi yang menyediakan pengajian tahfiz dan akademik bagi persediaan SPM. Pusat
                                            Tahfiz ini bakal melahirkan huffaz yang profesional serta mempunyai kefahaman dan
                                            penghayatan agama yang berteraskan Al-Quran dan As-Sunnah seterusnya disepadukan
                                            dengan ilmu-ilmu kehidupan semasa.
                                        </p>
                                      </li>
                                      <li>
                                        <h6 class="text-dark">Vision</h6>
                                        <p>
                                            “ Huffaz Profesional Yang Berhikmah Menuju Keradhaan Allah”
                                        </p>
                                      </li>
                                      <li>
                                        <h6 class="text-dark">Mission</h6>
                                        <p>
                                            <i class="mdi mdi-check"></i> Mendidik huffaz untuk menjiwai iman yang mantap dan berakhlak mulia<br />
                                            <i class="mdi mdi-check"></i> Mendidik huffaz yang membudayakan amal jama`ie<br />
                                            <i class="mdi mdi-check"></i> Mendidik huffaz faqih Ulum Islamiyyah<br />
                                            <i class="mdi mdi-check"></i> Mendidik pelajar berfungsi sebagau du’at dalam menegak daulah islamiyyah
                                        </p>
                                      </li>
                                      <li>
                                        <h6 class="text-dark">Objectives</h6>
                                        <p>
                                            <i class="mdi mdi-check"></i> Melahirkan pelajar qulbun salim dan berakhlak mulia yang qurratu a’yun dengan menjadikan Al-Quran sebagai penawar dan rahmat.<br />
                                            <i class="mdi mdi-check"></i> Melahirkan pelajar istiqamah menghidupkan ‘amal jama’ie dalam diri, keluarga, masyarakat dan Negara<br />
                                            <i class="mdi mdi-check"></i>  Melahirkan huffaz memahami ilmu qiraat iaitu berkaitan kelimah-kalimah Al-Quran<br />
                                            <i class="mdi mdi-check"></i>  Melahirkan pelajar yang faqih Ulum Islamiyyah termasuk kitab turath dan Sains<br />
                                            <i class="mdi mdi-check"></i>  Melahirkan pelajar yang mampu menjadi du’at qudwah hasanah yang serba boleh dan profesional gerak kerjanya.
                                        </p>
                                      </li>
                                    </ul>
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
    <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="/assets/js/shared/off-canvas.js"></script>
    <script src="/assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

