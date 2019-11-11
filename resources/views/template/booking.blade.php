<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CAR DISPATCH APP</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{ URL::asset('vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ URL::asset('css/horizontal-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ URL::asset('images/favicon.png') }}" />
  
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.1.6/dist/sweetalert2.min.css">
 
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="{{ URL::asset('https://rentacar.ng/images/hertznigeria.png') }}" alt="Hert Nigeria">
              </div>
              <h4>Welcome back!</h4>
              <h6 class="font-weight-light">Happy to see you again!</h6>
              
             
              <form class="pt-3" onSubmit="return false;" id="pushtoapi" name="pushtoapi">
                <div class="form-group">
                  <label for="exampleInputEmail">User Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" id="email" placeholder="Username">
                  </div>
                </div>
                  
                  
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" id="password" placeholder="Password">                        
                  </div>
                </div>
                  
                  
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" id="checkmein" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                  
                 
                  
                <div class="my-3">
                    
                  <button type="button" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" 
                    style="color:whitesmoke; cursor: pointer" id="postLogin">LOGIN</button>
                </div>
                  
                <!--<div class="mb-2 d-flex">
                  <button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">
                    <i class="mdi mdi-facebook mr-2"></i>Facebook
                  </button>
                  <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
                    <i class="mdi mdi-google mr-2"></i>Google
                  </button>
                </div>-->
                  
                  
                <div class="text-center mt-4 font-weight-light">
                 <!-- Don't have an account? <a href="register-2.html" class="text-primary">Create</a> -->
                </div>
              </form>
              
              
              
            </div>
          </div>
            
          <!-- THIS IS THE BACKGROUND FOR THE LOGIN PAGE -->
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
          </div>
           <!-- END OF BACKGROUND FOR THE LOGIN PAGE -->
            
            
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  
  <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('js/global.js') }}"></script>
  <script src="{{ URL::asset('js/login.js') }}"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.1.6/dist/sweetalert2.min.js"></script>
  
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <!--<script src="{{ URL::asset('vendors/js/vendor.bundle.base.js') }}"></script>
  
  <script src="{{ URL::asset('js/off-canvas.js') }}"></script>
  <script src="{{ URL::asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ URL::asset('js/template.js') }}"></script>
  <script src="{{ URL::asset('js/settings.js') }}"></script>
  <script src="{{ URL::asset('js/todolist.js') }}"></script>-->
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
