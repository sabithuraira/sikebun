<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('material') }}/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>SIKEBUN</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="{{ asset('material') }}/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <link href="{{ asset('material') }}/assets/demo/demo.css" rel="stylesheet" />
  @yield('css')
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('material') }}/assets/img/sidebar-1.jpg">
      <div class="logo">
        <a href="{{ url('/') }}" class="simple-text logo-normal">SI KEBUN</a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ (request()->is('dashboard*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <li class="nav-item {{ (request()->is('user/edit')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('user/edit') }}">
              <i class="material-icons">bubble_chart</i>
              <p>Profile Perusahaan</p>
            </a>
          </li>
          
          @hasanyrole('admin')
            <li class="nav-item {{ (request()->is('survei/karet*') || request()->is('survei/index_karet*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('survei/index_karet') }}">
                <i class="material-icons">library_books</i>
                <p>Karet</p>
              </a>
            </li>
            <li class="nav-item {{ (request()->is('survei/sawit*') || request()->is('survei/index_sawit*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('survei/index_sawit') }}">
                <i class="material-icons">library_books</i>
                <p>Kelapa Sawit</p>
              </a>
            </li>
          @else
            @hasanyrole('operator|approval')
              @if(Auth::user()->getIsKaretAttributes())
                <li class="nav-item {{ (request()->is('survei/karet*') || request()->is('survei/index_karet*')) ? 'active' : '' }}">
                  <a class="nav-link" href="{{ url('survei/index_karet') }}">
                    <i class="material-icons">library_books</i>
                    <p>Karet</p>
                  </a>
                </li>
              @endif 

              @if(Auth::user()->getIsSawitAttributes())
                <li class="nav-item {{ (request()->is('survei/sawit*') || request()->is('survei/index_sawit*')) ? 'active' : '' }}">
                  <a class="nav-link" href="{{ url('survei/index_sawit') }}">
                    <i class="material-icons">library_books</i>
                    <p>Kelapa Sawit</p>
                  </a>
                </li>
              @endif
            @endhasanyrole
          @endhasanyrole
            
          @hasanyrole('admin|operator|approval')
            <li class="nav-item {{ (request()->is('survei/tahunan*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('survei/tahunan') }}">
                <i class="material-icons">library_books</i>
                <p>Tahunan</p>
              </a>
            </li>
          @endhasanyrole
          
          @hasanyrole('admin')
            <li class="nav-item {{ (request()->is('perusahaan*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('perusahaan') }}">
                <i class="material-icons">library_books</i>
                <p>Master Perusahaan</p>
              </a>
            </li>
            
            <li class="nav-item {{ (request()->is('user_role*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('user_role') }}">
                <i class="material-icons">library_books</i>
                <p>Kelola Level User</p>
              </a>
            </li>
          @endhasanyrole

          <li class="nav-item {{ (request()->is('user/change_password*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('user/change_password') }}">
                <i class="material-icons">fingerprint</i>
                <p>Rubah Password</p>
              </a>
            </li>

          <li class="nav-item ">
              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a class="nav-link" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                this.closest('form').submit();">
                  <i class="material-icons">logout</i>
                  <p>Logout</p>
                </a>
            </form>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <div>
      <div class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
      </div></div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, dibuat oleh by <a href="https://bps.go.id/" target="_blank">Badan Pusat Statistik</a>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('material') }}/assets/js/core/jquery.min.js"></script>
  <script src="{{ asset('material') }}/assets/js/core/popper.min.js"></script>
  <script src="{{ asset('material') }}/assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="{{ asset('material') }}/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="{{ asset('material') }}/assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{ asset('material') }}/assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="{{ asset('material') }}/assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{ asset('material') }}/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{ asset('material') }}/assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="{{ asset('material') }}/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{ asset('material') }}/assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('material') }}/assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <script src="{{ asset('material') }}/assets/js/plugins/arrive.min.js"></script>
  @yield('scripts')
</body>

</html>