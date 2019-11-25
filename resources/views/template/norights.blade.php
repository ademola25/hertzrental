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
                
              <div style="padding:10px" class="bg bg-inverse-danger">
              <h4>YOU DO NOT HAVE THE APPROPRIATE RIGHTS</h4>
              <h6 class="font-weight-light">Please contact administrator to set you up</h6>
              </div>
             
              <form class="pt-3" onSubmit="return false;" id="pushtoapi" name="pushtoapi">
              
                  
                <div class="my-3">
                    
                  <a href="{{ route('home') }}" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" 
                    style="color:whitesmoke; cursor: pointer" >GO BACK <<</a>
                </div>
                  
             
                  
                  
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
