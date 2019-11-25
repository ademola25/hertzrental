
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <!-- Required meta tags -->
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CAR DISPATCHER</title>
  
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- base:css -->
  <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  
  <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}"> 
  <link rel="stylesheet" href="{{ asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}"> 
  <link rel="stylesheet" href="{{ asset('css/horizontal-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.1.6/dist/sweetalert2.min.css">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container">
          <div class="text-left navbar-brand-wrapper d-flex align-items-center justify-content-between">
            <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('http://rentacar.ng/images/hertznigeria.png') }}" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('http://rentacar.ng/images/hertznigeria.png') }}" alt="logo"/></a> 
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav ml-lg-3">
              <li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
                <a class="dropdown-toggle btn btn-outline-secondary btn-fw"  href="#" data-toggle="dropdown" id="pagesDropdown">
                <span class="nav-profile-name">Profile</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="pagesDropdown">
                  <a class="dropdown-item">
                  <i class="mdi mdi-settings text-primary"></i>
                  Account
                  </a>
                  <a class="dropdown-item">
                  <i class="mdi mdi-logout text-primary"></i>
                  Logout
                  </a>
                </div>
              </li>
              
            </ul>
              
              
            <ul class="navbar-nav navbar-nav-right">
               
                
                <li class="nav-item dropdown">
                  <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                    <i class="mdi mdi-email-outline mx-0"></i>
                    <p class="notification-ripple notification-ripple-bg">
                      <span class="ripple notification-ripple-bg"></span>
                      <span class="ripple notification-ripple-bg"></span>
                      <span class="ripple notification-ripple-bg"></span>
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                    <p class="mb-0 font-weight-normal float-left dropdown-header">Pending Trips</p>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <img src="https://via.placeholder.com/36x36" alt="image" class="profile-pic">
                      </div>
                      <div class="preview-item-content flex-grow">
                        <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                        </h6>
                        <p class="font-weight-light small-text text-muted mb-0">
                          The meeting is cancelled
                        </p>
                      </div>
                    </a>
                    
                  </div>
                </li>
                
                <li class="nav-item nav-user-icon">
                  <a class="nav-link" href="#">
                  <img src="https://via.placeholder.com/37x37" alt="profile"/>
                  </a>
                </li>
                <li class="nav-item nav-settings d-none d-lg-flex">
                  <a class="nav-link" href="#">
                  <i class="mdi mdi-dots-horizontal"></i>
                  </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
          <ul class="nav page-navigation">
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <i class="mdi mdi-shield-check menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/widgets/widgets.html">
                <i class="mdi mdi-puzzle menu-icon"></i>
                <span class="menu-title">Drivers</span>
              </a>
            </li>
            
            
            
            
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Trips</span>
                <i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                  <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Book Dispatch</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/forms/advanced_elements.html">Pending Trips</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/forms/validation.html">All Trips</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('adduser') }}">Add Users </a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/forms/text_editor.html">Find Vehicle</a></li>
                </ul>
              </div>
            </li>
            
            
           
            
             <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Maps</span>
              </a>
             
            </li>
            
           
            
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="mdi mdi-image-filter menu-icon"></i>
                <span class="menu-title">Contact Us</span>
              </a>
             
            </li>
            
            
            <li class="nav-item">
              <a href="pages/documentation/documentation.html" class="nav-link">
                <i class="mdi mdi-file-document menu-icon"></i>
                <span class="menu-title">Users</span></a>
            </li>
            
            
             <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="mdi mdi-format-list-bulleted-square menu-icon"></i>
                <span class="menu-title">Reports</span>
              </a>
             
            </li>
          </ul>
        </div>
      </nav>
    </div>
    
    
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
     <div class="main-panel">
  
          @yield('content')
    
    
    
    
    
    
    
     <div class="footer-wrapper">
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright &copy; 2019. All rights reserved. </span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Designed by: <a href="https://www.rentacar.ng/" target="_blank">Hertz Nigeria</a>. </span>
            </div>
          </footer>
        </div>
        <!-- partial -->
      </div>
    </div>
    
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

 <!-- base:js -->
 <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
 <!-- endinject -->
   <!-- Plugin js for this page-->
   <script src="{{ asset('vendors/progressbar.js/progressbar.min.js') }}"></script>
   <script src="{{ asset('vendors/flot/jquery.flot.js') }}"></script>
   <script src="{{ asset('vendors/flot/jquery.flot.resize.js') }}"></script>
   <script src="{{ asset('vendors/flot/curvedLines.js') }}"></script>
   <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
   <!-- End plugin js for this page-->
   <!-- inject:js -->
   <script src="{{ asset('js/off-canvas.js') }}"></script>
   <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
   <script src="{{ asset('js/template.js') }}"></script>
   <script src=".{{ asset('js/settings.js') }}"></script>
   <script src="{{ asset('js/todolist.js') }}"></script>
   <!-- endinject -->
   <!-- Custom js for this page-->
   <script src="{{ asset('js/dashboard.js') }}"></script>
   
   <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
   <script src="{{ asset('js/select2.js') }}"></script>
   
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.1.6/dist/sweetalert2.min.js"></script>
 <!-- End custom js for this page-->
</body>

</html>














