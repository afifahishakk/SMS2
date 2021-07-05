<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="profile-image">
                <img class="img-xs rounded-circle" src="/image/teachers/{{ session('photo') }}" alt="profile image">
                <div class="dot-indicator bg-success"></div>
              </div>
              <div class="text-wrapper">
                <p class="profile-name">{{ session('username') }}</p>
                <p class="designation">Teacher Tahfiz</p>
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
        <a class='nav-link' data-toggle='collapse' href='#ui-performance' aria-expanded='false' aria-controls='ui-basic'>
              <i class='menu-icon mdi mdi-account-box'></i>
              <span class='menu-title'>Performance</span>
              <i class='menu-arrow'></i>
        </a>
        <div class='collapse' id='ui-performance'>
              <ul class='nav flex-column sub-menu'>
                <li class='nav-item'>
                     <a class='nav-link' href="{{ route('hafazan.create') }}">Add Performance</a>
                </li>
                <li class='nav-item'>
                      <a class='nav-link' href="{{ route('hafazan.index') }}">Manage Performance</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href="{{ route('hafazan.listHafazan') }}">View Performance</a>
                </li>
              </ul>
        </div>
    </li>
    </ul>
  </nav>
