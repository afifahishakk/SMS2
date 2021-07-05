<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="profile-image">
                <img class="img-xs rounded-circle" src="/assets/images/faces/face23.jpg" alt="profile image">
                <div class="dot-indicator bg-success"></div>
              </div>
              <div class="text-wrapper">
                <p class="profile-name">{{ session('UserID') }}</p>
                <p class="designation">Admin</p>
              </div>
            </a>
          </li>
      <li class="nav-item">
        <a class="nav-link" href="/">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
    <li class='nav-item'>
        <a class='nav-link' data-toggle='collapse' href='#ui-teacher' aria-expanded='false' aria-controls='ui-basic'>
              <i class='menu-icon mdi mdi-account-box'></i>
              <span class='menu-title'>Teacher</span>
              <i class='menu-arrow'></i>
        </a>
        <div class='collapse' id='ui-teacher'>
              <ul class='nav flex-column sub-menu'>
                <li class='nav-item'>
                     <a class='nav-link' href="{{ route('teacher.create') }}">Register Teacher</a>
                </li>
                <li class='nav-item'>
                      <a class='nav-link' href="{{ route('teacher.index') }}">Manage Teacher</a>
                </li>
              </ul>
        </div>
    </li>
    <li class='nav-item'>
        <a class='nav-link' data-toggle='collapse' href='#ui-parent' aria-expanded='false' aria-controls='ui-basic'>
            <i class='menu-icon mdi mdi-account-multiple'></i>
              <span class='menu-title'>Parent</span>
              <i class='menu-arrow'></i>
        </a>
        <div class='collapse' id='ui-parent'>
              <ul class='nav flex-column sub-menu'>
                <li class='nav-item'>
                      <a class='nav-link' href="/guardians/create">Register Parent</a>
                </li>
                <li class='nav-item'>
                      <a class='nav-link' href='/guardians'>Manage Parent</a>
                </li>
              </ul>
        </div>
    </li>
      <li class='nav-item'>
        <a class='nav-link' data-toggle='collapse' href='#ui-enrollment' aria-expanded='false' aria-controls='ui-basic'>
            <i class='menu-icon mdi mdi-kodi'></i>
              <span class='menu-title'>Student</span>
              <i class='menu-arrow'></i>
        </a>
        <div class='collapse' id='ui-enrollment'>
              <ul class='nav flex-column sub-menu'>
                <li class='nav-item'>
                      <a class='nav-link' href="{{ route('student.create') }}">Register Student</a>
                </li>
                <li class='nav-item'>
                      <a class='nav-link' href="{{ route('student.index') }}">Manage Student</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href="/student-performance">Performance Student</a>
                </li>
              </ul>
        </div>
    </li>
      <li class='nav-item'>
        <a class='nav-link' data-toggle='collapse' href='#ui-announcement' aria-expanded='false' aria-controls='ui-basic'>
            <i class='menu-icon mdi mdi-cookie'></i>
            <span class='menu-title'>Announcement</span>
            <i class='menu-arrow'></i>
        </a>
        <div class='collapse' id='ui-announcement'>
            <ul class='nav flex-column sub-menu'>
                <li class='nav-item'>
                  <a class='nav-link' href="{{ route('announcement.create') }}">Add Announcement</a>
                </li>
                <li class='nav-item'>
                  <a class='nav-link' href="{{ route('announcement.index') }}">Manage Announcement</a>
                </li>
            </ul>
        </div>
    </li>
      <li class='nav-item'>
        <a class='nav-link' data-toggle='collapse' href='#ui-fees' aria-expanded='false' aria-controls='ui-basic'>
              <i class='menu-icon mdi mdi-clipboard-check'></i>
              <span class='menu-title'>Fee</span>
              <i class='menu-arrow'></i>
        </a>
        <div class='collapse' id='ui-fees'>
              <ul class='nav flex-column sub-menu'>
                <li class='nav-item'>
                      <a class='nav-link' href="{{ route('fee.create') }}">Add Registration Fee</a>
                </li>
                <li class='nav-item'>
                      <a class='nav-link' href="{{ route('monthlyFee.create') }}">Add Monthly Fee</a>
                </li>
                <li class='nav-item'>
                      <a class='nav-link' href="{{ route('fee.index') }}">Manage Registration Fee</a>
                </li>
                <li class='nav-item'>
                      <a class='nav-link' href="{{ route('monthlyFee.index') }}">Manage Monthly Fee</a>
                </li>
              </ul>
        </div>
    </li>
      <li class='nav-item'>
        <a class='nav-link' data-toggle='collapse' href='#ui-payment' aria-expanded='false' aria-controls='ui-basic'>
              <i class='menu-icon mdi mdi-google-wallet'></i>
              <span class='menu-title'>Payment</span>
              <i class='menu-arrow'></i>
        </a>
        <div class='collapse' id='ui-payment'>
              <ul class='nav flex-column sub-menu'>
                <li class='nav-item'>
                    <a class='nav-link' href="/pay-student-registration-fee">Pay Registration Fee</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href="/pay-student-monthly-fee">Pay Monthly Fee</a>
                </li>
                <li class='nav-item'>
                      <a class='nav-link' href="/payment">Update Registration Status</a>
                </li>
                <li class='nav-item'>
                      <a class='nav-link' href="/update-monthly-status">Update Monthly Status</a>
                </li>
              </ul>
        </div>
    </li>
    <li class='nav-item'>
        <a class='nav-link' data-toggle='collapse' href='#ui-report' aria-expanded='false' aria-controls='ui-basic'>
            <i class='menu-icon mdi mdi-chart-bar'></i>
             <span class='menu-title'>Report</span>
              <i class='menu-arrow'></i>
        </a>
        <div class='collapse' id='ui-report'>
              <ul class='nav flex-column sub-menu'>
                <li class='nav-item'>
                      <a class='nav-link' href="/monthly-report">Monthly Report</a>
                </li>
                <li class='nav-item'>
                      <a class='nav-link' href="/annual-report">Annual Report</a>
                </li>
              </ul>
        </div>
    </li>
    </ul>
  </nav>
