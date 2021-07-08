<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="profile-image">
                <img class="img-xs rounded-circle" src="/image/guardians/{{ session('photo') }}" alt="profile image">
                <div class="dot-indicator bg-success"></div>
              </div>
              <div class="text-wrapper">
                <p class="profile-name">{{ session('UserID') }}</p>
                <p class="designation">Parent</p>
              </div>
            </a>
          </li>
      <li class="nav-item">
        <a class="nav-link" href="/dashboardParent">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
    <li class='nav-item'>
        <a class='nav-link' data-toggle='collapse' href='#ui-enrollment' aria-expanded='false' aria-controls='ui-basic'>
              <i class='menu-icon mdi mdi-account-box'></i>
              <span class='menu-title'>Enrollment</span>
              <i class='menu-arrow'></i>
        </a>
        <div class='collapse' id='ui-enrollment'>
            <ul class='nav flex-column sub-menu'>
                <li class='nav-item'>
                      <a class='nav-link' href="/parents/createChild">Enrollment Form</a>
                </li>
                <li class='nav-item'>
                      <a class='nav-link' href="{{ route('parents.indexChild') }}">Enrollment Status</a>
                </li>
            </ul>
        </div>
    </li>
    <li class='nav-item'>
        <a class='nav-link' data-toggle='collapse' href='#ui-fees' aria-expanded='false' aria-controls='ui-basic'>
              <i class='menu-icon mdi mdi-google-wallet'></i>
              <span class='menu-title'>Payment</span>
              <i class='menu-arrow'></i>
        </a>
        <div class='collapse' id='ui-fees'>
              <ul class='nav flex-column sub-menu'>
                <li class='nav-item'>
                      <a class='nav-link' href="/pay-registration-fee">Registration Fees</a>
                </li>
                <li class='nav-item'>
                     <a class='nav-link' href="/pay-monthly-fee">Monthly Fees</a>
                </li>
                <li class='nav-item'>
                      <a class='nav-link' href="/payment-history">Payment History</a>
                </li>
              </ul>
        </div>
      </li>

      <li class='nav-item'>
        <a class='nav-link' href="/view-child-performance">
              <i class='menu-icon mdi mdi-book-open-page-variant'></i>
              <span class='menu-title'>Performance</span>
        </a>
      </li>
    </ul>
  </nav>
