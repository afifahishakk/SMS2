<!DOCTYPE html>
<html lang="en">
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

  <body>
    @include('layout.headerPublic')
    <div class="container-scroller">
	    {{-- <?php//include "layout/top_public.php";?> --}}
      <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
        <!-- partial:partials/_navbar.html -->
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper">
		            <h1 class="display-1 text-bold-200 text-center">S M S</h1>
		            <p class="text-muted text-center">Student Management System<br />Pusat Tahfiz Sains Darul Ilmi</p>
		            <hr />
                @if(!empty($errorMsg))
                    <div class="alert alert-success"> {{ $errorMsg }}</div>
                @endif
                <form action="{{ route('login.validateLogin') }}" method="post">
                    @csrf
                  <div class="form-group">
                    <label class="label">Username</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="UserID" placeholder="Username" required />
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-account-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                      <input type="password" id="password" class="form-control" name="password" placeholder="*********" required />
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <a onclick="showHidePass()" data-toggle="tooltip" data-placement="left" title="Show/Hide"><i class="mdi mdi-textbox-password text-primary"></i></a>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary submit-btn btn-block">Login</button>
                  </div>
                </form>
              </div>
              <br />
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="/assets/js/shared/off-canvas.js"></script>
    <script src="/assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
      function showHidePass() {
	      var x = document.getElementById("password");
	      if (x.type === "password") {
	    	  x.type = "text";
	      }
        else {
	    	  x.type = "password";
	      }
	    }
	  </script>
  </body>
</html>
<?php  ?>
