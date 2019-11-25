@extends('layouts.layout')

@section('content')

  <!-- partial -->
   
  <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
  
  <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Form</h4>
                  <p class="card-description">
                   All User
                  </p>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Username</label>
                      <input type="text" class="form-control" id="name" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Confirm Password</label>
                      <input type="password" class="form-control" id="c_password" placeholder="Password">
                    </div>
                      
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Phone</label>
                      <input type="phone" class="form-control" id="phone_number" placeholder="Phone Number">
                    </div>
                     
                    <hr/>
                        <div class="form-check form-check-flat form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            Remember me
                          </label>
                        </div>
                    <hr/>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <!--<button class="btn btn-light">Cancel</button>-->
                  </form>
                </div>
              </div>
            </div>
              
          
              
          <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Users</h4>
                  <p class="card-description">
                    Horizontal form layout
                  </p>
                  
                </div>
              </div>
            </div>
        
          </div>
       </div>
     </div>
  </div>
  
  
  
  

<script src="{{ URL::asset('js/global.js') }}"></script>
<!--<script src="{{ URL::asset('javascript/dashboard.js') }}"></script>
<script src="{{ URL::asset('javascript/booktrip.js') }}"></script>
<script src="{{ URL::asset('javascript/vehicles.js') }}"></script>-->

<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('61221eef2e53bbae8459', {
      cluster: 'eu',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('send-driver', function(data) {
      alert(JSON.stringify(data));
    });
  </script>

@endsection