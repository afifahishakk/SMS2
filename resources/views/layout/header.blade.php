<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
      <a class="navbar-brand brand-logo" href="index.html">
        <img src="/assets/images/logo.png" style="width: 100%; height: 100%" alt="logo" /> </a>
      <a class="navbar-brand brand-logo-mini" href="index.html">
        <img src="/assets/images/logo-mini.svg" alt="logo" /> </a>
    </div>
    {{-- @foreach($admins as $admin) --}}
        <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <span class='profile-text'>Welcome, {{ session('UserID') }}! </span>
                <!-- <img class="img-xs rounded-circle" src="/assets/images/faces/face23.jpg" alt="Profile image"> </a> -->
                <div class='dropdown-menu dropdown-menu-right navbar-dropdown' aria-labelledby='UserDropdown'>
                    <a href="" class='dropdown-item mt-2'>
                    <i class='mdi mdi-account-outline'></i>	Profile
                    </a>
                    <a href='update_password.php' class='dropdown-item'>
                    <i class='mdi mdi-lock-outline'></i> Password
                    </a>
                    <a href='{{ route('logout') }}' class='dropdown-item'>
                    <i class='mdi mdi-arrow-top-right'></i> Logout
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
        </div>
    {{-- @endforeach --}}
  </nav>
