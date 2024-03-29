@extends('layouts.layout')

@section('content')

  <!-- partial -->
   
  
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
                          <h3 class="text-muted">Company</h3>
                          <h6 class="font-weight-medium text-muted mb-0"><?php echo strtoupper($company_name); ?></h6>
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
                                            
                                           
                                          <div id="all_drivers"></div>
                                          
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
                                            
                                          
                                         <div id="all_vehicles"></div>
                                         
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
                                            
                                            
                                         <div id="all_admin"></div>
                                           
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
                               
                             
                                <div id="load_bookings"></div>
                                
                                <form class="forms-sample" onSubmit="return false" name="bookforCar" id="bookforCar">
                                <div class="card">
                                    <div class="card-body">
                                        <!--<p class="card-description">
                                          Booking Trips Made Easy
                                        </p>-->
                                        <div class="form-group">
                                          <label>Passengers Name</label>
                                          <input type="text" id="passengerName" class="form-control form-control-lg" placeholder="Passenger Name" aria-label="Passenger Name">
                                        </div>
                                        
                                        <div class="form-group">
                                          <label>Passengers Phone</label>
                                          <input type="text" id="passengerPhone" class="form-control form-control-lg" placeholder="Passenger Phone" aria-label="Passenger Phone">
                                        </div>
                                        
                                        <div class="form-group">
                                          <label>Pickup Address</label>
                                          <input type="text" id="pickup_address" class="form-control" placeholder="Pickup Address" aria-label="pickup">
                                        </div>
                                        <div class="form-group">
                                          <label>Drop Off Address</label>
                                          <input type="text" id="dropoff_address" class="form-control form-control-sm" placeholder="Drop Off Address" aria-label="drop">
                                        </div>
                                        
                                         <div class="form-group">
                                          <label>Pickup Date</label>
                                          <input type="text" id="pickup_date" class="form-control form-control-sm" placeholder="Pickup Date" aria-label="startdate">
                                        </div>
                                        
                                        <div class="form-group">
                                          <label>End Date</label>
                                          <input type="text" id="end_date" class="form-control form-control-sm" placeholder="End Date" aria-label="enddate">
                                        </div>
                                        
                                        <div class="form-group">
                                        <label id="fetching">Select Vehicle</label>
                                        <select class="js-example-basic-single w-100" id="allgetVehicles"><!-- class="js-example-basic-single w-100" -->
                                          <option value="">Select</option>
                                        </select>
                                      </div>
                                        
                                        
                                        <div class="form-group">
                                        <label id="fetchingdrivers">Add Driver</label>
                                        <select class="js-example-basic-single w-100" id="allgetDrivers">
                                            <option value="">Select</option>
                                        </select>
                                      </div>
                                        
                                        <div class="form-group">
                                          <button class="btn btn-block btn-primary  todo-list-add-btn" id="booktrip">Book Trip</button>
                                        </div>
                                    </div>
                                </div>
                              </form>
                                  
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
                                  
                                  <tbody id="contract_list">
                                    <!--<tr>
                                     
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
                                    </tr>-->
                                    
                                 
                                  
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

<script src="{{ URL::asset('js/global.js') }}"></script>
<script src="{{ URL::asset('javascript/dashboard.js') }}"></script>
<script src="{{ URL::asset('javascript/booktrip.js') }}"></script>
<script src="{{ URL::asset('javascript/vehicles.js') }}"></script>
<!--<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('61221eef2e53bbae8459', {
      cluster: 'eu',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
-->


@endsection