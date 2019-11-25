<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Company Dashboard</title>
  
  <meta charset="utf-8">
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
  <link rel="stylesheet" href="{{ asset('css/horizontal-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
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
                <li class="nav-item nav-search d-none d-lg-flex">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="search">
                      <i class="mdi mdi-magnify"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Type to search..." aria-label="search" aria-describedby="search">
                  </div>
                </li>
                
                
                
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
                  <li class="nav-item"><a class="nav-link" href="pages/forms/wizard.html">Add Users </a></li>
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
          <div class="content-wrapper">
              <div class="row">
                <div class="col-md-12">
                    
                    
                  <div class="row">
                    <div class="col-sm-6 mb-4 mb-xl-0">
                      <h3><?php echo $name; ?></h3>
                      <h6 class="font-weight-normal mb-0 text-muted">Welcome Back!.</h6>
                    </div>
                    <div class="col-sm-6">
                      <div class="d-flex align-items-center justify-content-md-end">
                        <div class="border-right-dark pr-4 mb-3 mb-xl-0 d-xl-block d-none">
                          <p class="text-muted">Today</p>
                          <h6 class="font-weight-medium text-muted mb-0">23 Aug 2019</h6>
                        </div>
                       
                        <div class="pr-1 mb-3 mb-xl-0">
                          <button type="button" class="btn btn-success btn-icon mr-2"><i class="mdi mdi-refresh"></i></button>
                        </div>
                         
                      </div>
                    </div>
                  </div>
                    
                    
                    
                    
                  <div class="page-header-tab mt-xl-4">
                    <div class="col-12 pl-0 pr-0">
                      <div class="row ">
                        <div class="col-12 col-sm-6 mb-xs-4  pt-2 pb-2 mb-xl-0">
                          <ul class="nav nav-tabs tab-transparent" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#" role="tab" aria-controls="overview" aria-selected="true">Quick Links</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="users-tab" data-toggle="tab" href="#" role="tab" aria-controls="users" aria-selected="false">Book Trip</a>
                            </li>
                            
                             <li class="nav-item">
                              <a class="nav-link" id="users-tab" data-toggle="tab" href="#" role="tab" aria-controls="users" aria-selected="false">All Trip</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="returns-tab" data-toggle="tab" href="#" role="tab" aria-controls="returns" aria-selected="false">Add User</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="more-tab" data-toggle="tab" href="#" role="tab" aria-controls="more" aria-selected="false">Find Vehicle</a>
                            </li>
                          </ul>
                        </div>
                        <div class="col-12 col-sm-6 mb-xs-4 mb-xl-0 pt-2 pb-2 text-md-right d-none d-md-block">
                          <div class="d-inline-flex">
                            <button class="btn d-flex align-items-center">
                            <i class="mdi mdi-download mr-1"></i>
                            <span class="text-left font-weight-medium">
                            Download report
                            </span>
                            </button>
                            
                            <button class="btn d-flex align-items-center pr-0">
                            <i class="mdi mdi-email-outline  mr-1"></i>
                            <span class="text-left font-weight-medium">
                            Email Driver
                            </span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                  <div class="tab-content tab-transparent-content pb-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                      <div class="row">

                        <div class="col-sm-6">
                          <div class="row">
                              <div class="col-12 col-sm-6 col-md-6 col-xl-6 grid-margin stretch-card">
                                  <div class="card">
                                    <div class="card-body">
                                      <div class="d-flex flex-wrap justify-content-between">
                                        <h4 class="card-title">Driver</h4>
                                        <div class="dropdown dropleft card-menu-dropdown">
                                          <button class="btn p-0" type="button" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical card-menu-btn"></i>
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdown1" x-placement="left-start">
                                            <a class="dropdown-item" href="#">All Drivers</a>
                                          </div>
                                        </div>
                                      </div>
                                      <div id="sales" class="carousel slide dashboard-widget-carousel position-static pt-2" data-ride="carousel">
                                        <div class="carousel-inner">
                                          <div class="carousel-item active">
                                            <div class="d-flex flex-wrap align-items-baseline">
                                              <h3 class="mr-3">0807388183</h3>
                                            </div>
                                            <div class="mb-3">
                                              <p class="text-muted font-weight-bold text-small">Opeyemi Badmus<span class=" font-weight-normal"> (SKA 678 AB)</span></p>
                                            </div>
                                              
                                            <button class="btn btn-outline-secondary btn-sm btn-icon-text d-flex align-items-center">
                                            <i class="mdi mdi-earth mr-1"></i>
                                            <span class="text-left"></span>
                                            </button>
                                            
                                          </div>
                                            
                                          <div class="carousel-item">
                                            <div class="d-flex flex-wrap align-items-baseline">
                                              <h3 class="mr-3">0989288932</h3>
                                            </div>
                                            <div class="mb-3">
                                              <p class="text-muted font-weight-bold  text-small">Johnson Niles <span class=" font-weight-normal">(AAA 777 UU)</span></p>
                                            </div>
                                              
                                            <button class="btn btn-outline-secondary btn-sm btn-icon-text d-flex align-items-center">
                                            <i class="mdi mdi-earth mr-1"></i>
                                            <span class="text-left"></span>
                                            </button>
                                           
                                          </div>
                                            
                                        </div>
                                        <a class="carousel-control-prev" href="#sales" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#sales" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              
                              
                                <div class="col-12 col-sm-6 col-md-6 col-xl-6 grid-margin stretch-card">
                                  <div class="card">
                                    <div class="card-body">
                                      <div class="d-flex flex-wrap justify-content-between">
                                        <h4 class="card-title">Vehicles</h4>
                                        <div class="dropdown dropleft card-menu-dropdown">
                                          <button class="btn p-0" type="button" id="dropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical card-menu-btn"></i>
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdown2" x-placement="left-start">
                                            <a class="dropdown-item" href="#">Company Vehicles</a>
                                          </div>
                                        </div>
                                      </div>
                                      <div id="purchases" class="carousel slide dashboard-widget-carousel position-static pt-2" data-ride="carousel">
                                        <div class="carousel-inner">
                                          <div class="carousel-item active">
                                            <div class="d-flex flex-wrap align-items-baseline">
                                              <h3 class="mr-3">AAB 65 MMM</h3>
                                            </div>
                                            <div class="mb-3">
                                              <p class="text-muted font-weight-bold  text-small">Toyota Corolla <span class=" font-weight-normal">(SUV)</span></p>
                                            </div>
                                           
                                              <button class="btn btn-outline-secondary btn-sm btn-icon-text d-flex align-items-center">
                                            <i class="mdi mdi-car mr-1"></i>
                                            <span class="text-left"></span>
                                            </button>
                                          </div>
                                            
                                            
                                          <div class="carousel-item">
                                            <div class="d-flex flex-wrap align-items-baseline">
                                              <h3 class="mr-3">UUU 67 SS</h3>
                                            </div>
                                            <div class="mb-3">
                                              <p class="text-muted font-weight-bold text-small">Nissan Sonny <span class=" font-weight-normal">(Saloon)</span></p>
                                            </div>
                                            
                                              <button class="btn btn-outline-secondary btn-sm btn-icon-text d-flex align-items-center">
                                            <i class="mdi mdi-car mr-1"></i>
                                            <span class="text-left"></span>
                                            </button>
                                            
                                          </div>
                                            
                                        </div>
                                        <a class="carousel-control-prev" href="#purchases" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#purchases" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                          </div>
                            
                            
                          <div class="row">
                              <div class="col-12 col-sm-6 col-md-6 col-xl-6 grid-margin stretch-card">
                                  <div class="card">
                                    <div class="card-body">
                                      <div class="d-flex flex-wrap justify-content-between">
                                        <h4 class="card-title">Trips</h4>
                                        <div class="dropdown dropleft card-menu-dropdown">
                                          <button class="btn p-0" type="button" id="dropdown3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical card-menu-btn"></i>
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdown3" x-placement="left-start">
                                            <a class="dropdown-item" href="#">All Trips</a>
                                          </div>
                                        </div>
                                      </div>
                                      <div id="returns" class="carousel slide dashboard-widget-carousel position-static pt-2" data-ride="carousel">
                                        <div class="carousel-inner">
                                          <div class="carousel-item active">
                                            <div class="d-flex flex-wrap align-items-baseline">
                                              <h2 class="mr-3">2400</h2>
                                            </div>
                                            <div class="mb-3">
                                              <p class="text-muted font-weight-bold text-small">PZ Company <span class=" font-weight-normal"></span></p>
                                            </div>
                                            <button class="btn btn-outline-secondary btn-sm btn-icon-text d-flex align-items-center">
                                            <i class="mdi mdi-shield-check mr-1"></i>
                                            <span class="text-left"></span>
                                            </button>
                                          </div>
                                            
                                          
                                        </div>
                                        <a class="carousel-control-prev" href="#returns" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#returns" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              
                              
                                <div class="col-12 col-sm-6 col-md-6 col-xl-6 grid-margin stretch-card">
                                  <div class="card">
                                    <div class="card-body">
                                      <div class="d-flex flex-wrap justify-content-between">
                                        <h4 class="card-title">Admins</h4>
                                        <div class="dropdown dropleft card-menu-dropdown">
                                          <button class="btn p-0" type="button" id="dropdown4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical card-menu-btn"></i>
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdown4" x-placement="left-start">
                                            <a class="dropdown-item" href="#">All Staff</a>
                                          </div>
                                        </div>
                                      </div>
                                      <div id="marketing" class="carousel slide dashboard-widget-carousel position-static pt-2" data-ride="carousel">
                                        <div class="carousel-inner">
                                          <div class="carousel-item active">
                                            <div class="d-flex flex-wrap align-items-baseline">
                                              <h3 class="mr-3">Jacob Zuma</h3>
                                            </div>
                                            <div class="mb-3">
                                              <p class="text-muted font-weight-bold text-small">Administrator<span class=" font-weight-normal">(level 1)</span></p>
                                            </div>
                                            <button class="btn btn-outline-secondary btn-sm btn-icon-text d-flex align-items-center">
                                            <i class="mdi mdi-view-headline mr-1"></i>
                                            <span class="text-left"></span>
                                            </button>
                                          </div>
                                            
                                          <!--<div class="carousel-item">
                                            <div class="d-flex flex-wrap align-items-baseline">
                                              <h2 class="mr-3">$ 27632</h2>
                                              <h3 class="text-success">+2.3%</h3>
                                            </div>
                                            <div class="mb-3">
                                              <p class="text-muted font-weight-bold text-small">North Ludwig <span class=" font-weight-normal">($2643M last month)</span></p>
                                            </div>
                                            <button class="btn btn-outline-secondary btn-sm btn-icon-text d-flex align-items-center">
                                            <i class="mdi mdi-calendar mr-1"></i>
                                            <span class="text-left">
                                            Oct
                                            </span>
                                            </button>
                                          </div>-->
                                        </div>
                                        <a class="carousel-control-prev" href="#marketing" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#marketing" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                          
                          
                        <div class="col-sm-6">
                            <div class="col-md-6 col-lg-12 p-0 grid-margin">
                                <div class="card bg-primary">
                                  <div class="card-body pb-0">
                                    <div class="d-flex flex-wrap justify-content-between">
                                      <h4 class="card-title text-white">Overview</h4>
                                      <div class="dropdown dropleft card-menu-dropdown">
                                       
                                      </div>
                                    </div>
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                      <div>
                                        <h6 class="text-white">Maps</h6>
                                        <p class="text-white mb-3">Vehicles</p>
                                      </div>
                                      <button class="btn btn-outline-primary btn-fw border ml-xl-4 text-white mb-4">View more</button>
                                    </div>
                                  </div>
                                  <div class="card-body p-0">
                                    <div>
                                      <canvas id="areaChartMarketing"></canvas>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                      </div>
                        
                        
                        
                        
                        
                        
                        
                        
                      <div class="row">
                          <div class="col-12 col-lg-4 col-xl-4 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <div class="d-flex flex-wrap justify-content-between">
                                  <h4 class="card-title">Quick Book</h4>
                                  <div class="dropdown dropleft card-menu-dropdown">
                                    
                                  </div>
                                </div>
                               
                             
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-description">
                                          Booking Trips Made Easy
                                        </p>
                                        <div class="form-group">
                                          <label>User Name</label>
                                          <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username">
                                        </div>
                                        <div class="form-group">
                                          <label>Pickup Address</label>
                                          <input type="text" class="form-control" placeholder="Pickup Address" aria-label="pickup">
                                        </div>
                                        <div class="form-group">
                                          <label>Drop Off Address</label>
                                          <input type="text" class="form-control form-control-sm" placeholder="Drop Off Address" aria-label="drop">
                                        </div>
                                        
                                        <div class="form-group">
                                          <button class="btn btn-block btn-primary  todo-list-add-btn">Book Trip</button>
                                        </div>
                                    </div>
                                </div>
                             
                                  
                              </div>
                            </div>
                          </div>
                          
                          
                          <div class="col-12 col-lg-8 col-xl-8 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <div class="d-flex flex-wrap justify-content-between">
                                  <h4 class="card-title">Recent Trips</h4>
                                  <div class="dropdown dropleft card-menu-dropdown">
                                    <button class="btn p-0" type="button" id="dropdown11" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="mdi mdi-dots-vertical card-menu-btn"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdown11" x-placement="left-start">
                                      <a class="dropdown-item" href="#">All</a>
                                    </div>
                                  </div>
                                </div>
                                  
                                <p class="text-muted">Most Recent Trips are shown here</p>
                                <div class="border pt-2 pb-2 mt-4 mb-3 border-radius-widget">
                                  <ul class="d-md-flex flex-wrap align-items-baseline justify-content-center list-unstyled text-center mb-0 sales-legend">
                                    <li class="border-right-sm">
                                      <h6 class="font-weight-normal">Pending</h6>
                                      <h2 class="text-primary">130</h2>
                                    </li>
                                    <li class="border-right-sm">
                                      <h6 class="font-weight-normal">Dispatched</h6>
                                      <h2 class="text-primary pl-md-3 pr-3">40</h2>
                                    </li>
                                    <li class="border-right-sm">
                                      <h6 class="font-weight-normal">Accepted</h6>
                                      <h2 class="text-primary">10</h2>
                                    </li>
                                    <li class="pb-2 pt-2 pl-4 pr-4">
                                      <h6 class="font-weight-normal">Completed</h6>
                                      <h2 class="text-primary">15</h2>
                                    </li>
                                  </ul>
                                </div>
                                <div class="row mt-1 d-sm-flex">
                                  <div class="col-12">
                                        
                                       <div class="table-responsive">
                                <table class="table center-aligned-table">
                                  <thead>
                                    <tr>
                                      
                                      <th>Name</th>
                                      <th>Pickup </th>
                                      <th>Drop Off</th>
                                      <th>Status</th>
                                      <th>Actions</th>
                                    </tr>
                                  </thead>
                                  
                                  <tbody>
                                    <tr>
                                     
                                      <td>
                                        <div class="text-muted font-weight-medium">Mikel Ogbonna</div>
                                      </td>
                                      <td>Sharaton Hotel </td>
                                      <td>Ozumba Mbadiwe</td>
                                      <td><label class="badge badge-success">Completed</label></td>
                                      <td>
                                        <a href="#" class="mr-1 text-muted p-2"><i class="mdi mdi-view-array"></i></a>
                                        <a href="#" class="mr-1 text-muted p-2"><i class="mdi mdi-share"></i></a>
                                      </td>
                                    </tr>
                                    
                                     <tr>
                                      <td>
                                        <div class="text-muted font-weight-medium">Newton Pastor</div>
                                      </td>
                                      <td>Lekki</td>
                                      <td>Ikorodu</td>
                                      <td><label class="badge badge-info">Dispatch</label></td>
                                      <td>
                                        <a href="#" class="mr-1 text-muted p-2"><i class="mdi mdi-view-array"></i></a>
                                        <a href="#" class="mr-1 text-muted p-2"><i class="mdi mdi-share"></i></a>
                                      </td>
                                    </tr>
                                    
                                    <tr>
                                      <td>
                                        <div class="text-muted font-weight-medium">Johnson PK</div>
                                      </td>
                                      <td>Oshodi</td>
                                      <td>Berger</td>
                                      <td><label class="badge badge-danger">Dispatched</label></td>
                                      <td>
                                        <a href="#" class="mr-1 text-muted p-2"><i class="mdi mdi-view-array"></i></a>
                                        <a href="#" class="mr-1 text-muted p-2"><i class="mdi mdi-share"></i></a>
                                      </td>
                                    </tr>
                                    
                                    
                                    
                                  
                                  </tbody>
                                </table>
                              </div>
                                      
                                      
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        
                    </div>
                      
                   
                      
                  </div>
                    
                    
                    
                    
                    
                </div>
              </div>
          </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
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
      <!-- main-panel ends -->
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
 <!-- End custom js for this page-->
</body>

</html>