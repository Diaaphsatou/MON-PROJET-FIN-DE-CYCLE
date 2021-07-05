<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OVIGEST | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
     
      
    

    
            <!-- Message End -->
         
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            
           
         
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
    
    
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/ovigest.jpg') }}" alt="ovigest" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">OVIGEST</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar"  >
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/dia.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Aphsatou Dia</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php
            $segment = Request::segment(2);
          ?>     
          <li class="nav-item">
            <a href="{{ route('admin.home') }}" class="nav-link 
              @if(!$segment)
              active
              @endif
              ">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Tableau de bord
              </p>
            </a>
            
          </li>
         
         
          <li class="nav-item">
            <a href="{{ route('ovin.index') }}" class="nav-link 
              @if($segment=='ovins')
              active
              @endif">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Ovins
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="{{ route('ovins.inventaire') }}" class="nav-link 
              @if($segment=='inventaire')
              active
              @endif">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Inventaire
              </p>
            </a>
          </li>

          {{--<li class="nav-item">
            <a href="{{ route('mises_bas.abou') }}" class="nav-link 
              @if($segment=='abou')
              active
              @endif">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                selection
              </p>
            </a>
          </li>

         --}}

          <li class="nav-item">
            <a href="{{ route('echographie.index') }}" class="nav-link 
              @if($segment=='echographie')
              active
              @endif">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                 Echographie
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('livraison.saisie') }}" class="nav-link 
              @if($segment=='livraison')
              active
              @endif">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                livraison
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('alimentation.index') }}" class="nav-link 
              @if($segment=='alimentation')
              active
              @endif">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Alimentation
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('carnet_sante.index') }}" class="nav-link 
              @if($segment=='carnet_sante')
              active
              @endif">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                CarnetDeSante
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('lutte.index') }}" class="nav-link 
              @if($segment=='lutte')
              active
              @endif">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Lutte
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('mises_bas.abou') }}" class="nav-link 
              @if($segment=='mises_bas')
              active
              @endif">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Mise bas
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('vaccination.index') }}" class="nav-link 
              @if($segment=='vaccination')
              active
              @endif">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Vaccination
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('import.file') }}" class="nav-link 
              @if($segment=='import-form')
              active
              @endif">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Importation de données
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('export.file') }}" class="nav-link 
              @if($segment=='export')
              active
              @endif">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Exportation de nos données
              </p>
            </a>
          </li>

          
          <li class="nav-header">Action</li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="nav-icon fa fa-circle-o text-danger"></i>
                                        {{ __('Deconnexion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>


           
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:wite !important;">
    @yield('content')
  </div>
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
</body>
</html>
