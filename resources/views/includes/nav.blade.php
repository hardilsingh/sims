  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="/home" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="{{route('students.create')}}" class="nav-link">Register Students</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="{{route('fee.index')}}" class="nav-link">Fee Transactions</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="{{ url('/logout') }}" class="nav-link"> Logout </a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="#" class="nav-link"> <b>Session 2020-2021</b> </a>
          </li>
      </ul>

  </nav>
  <!-- /.navbar -->