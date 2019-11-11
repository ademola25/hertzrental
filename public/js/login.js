var loginAPI = document.querySelector('#postLogin');
loginAPI.addEventListener('click', (e) => processLogin(e));

const token = null; 

const processLogin = (e) => {
    
   let timerInterval
    Swal.fire({
      title: 'Authenticating Request, Please wait!',
      html: 'counting.. <b></b> milliseconds.',
      timer: 3000,
      onBeforeOpen: () => {
        Swal.showLoading()
        timerInterval = setInterval(() => {
          Swal.getContent().querySelector('b').textContent = Swal.getTimerLeft() }, 100)
         document.querySelector('#postLogin').style.display="none";
      },
      
      onClose: () => { clearInterval(timerInterval) } }).then((result) => {
      if (
         
         //$('#postLogin').show(),
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.timer,
        loginAction()
      ) {
        console.log('I was closed by the timer')
        //$('#postLogin').show(),
      }
    })

  
     
}


function loginAction(){
 
   var email = $('#email').val().trim();
   var password = $('#password').val().trim();
   var checkmein = $('#checkmein').val();
   
   if (!email.length || !password.length) {
       $('#postLogin').show()
      Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Please User Email and Password is Required!',
            footer: '<a href>Please try again</a>'
          })
          
       return;
    }
    
   if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email)) {
        $('#postLogin').show()
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Email is invalid!',
            footer: '<a href>Please try again</a>'
          })
            return;
        }
        
        
        $.ajax({
            type: "POST",
            url: "http://localhost:8000/api/mlogin",
           /*  headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            } */
            
            data: { email: email, password: password, checkmein: checkmein },
            dataType: "JSON",
            
            success: loginSuccess,
            error: loginFailure
        });
   

}
 function loginSuccess(returnedData, status) {
        
        if (typeof returnedData !== 'object' || typeof returnedData.success !== 'number') {
            Swal.fire({
            icon: 'error',
            title: 'Error processing Request!',
            text: 'Unexpected server response!',
            footer: '<a href>Please try again</a>'
          })
          
           //console.log("Unexpected server response: Status - " + status + " returnedData - " + JSON.stringify(returnedData));
            return;
        }

        if(returnedData.success == 200){
            Swal.fire({
                position: 'top-end',
                icon: 'Success',
                title: 'Authenticated, redirecting...',
                showConfirmButton: false,
                timer: 1500
              })
            //alert(returnedData.access_token);
            $('#userEmail').val('');
            $('#userPassword').val('');
           // document.cookie = 'access_token='+returnedData.Authorization+'; expires='+ new Date(2020, 0, 1).toUTCString() + ' ';
           
        /* headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': returnedData.Authorization,
            'Content-Type':'application/json'
            }, */
       
            location.assign(GLOBALS.appRoot + 'api/dashboard');
            
          // console.log(document.cookie);
        }else{
           
           Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Login Failed!',
            footer: '<a href>Please try again</a>'
          })
        }
        
       
    }
    
    
    function loginFailure(request, status, errorMsg) {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Invalid Login, please try again!',
            footer: '<a href>Please try again</a>'
          })
        $('#postLogin').show()
        console.log("Error: request - " + JSON.stringify(request) + " | status "
                + status + " | errorMsg " + errorMsg);
    }
    
    
    function getCookie(name) {
        // Split cookie string and get all individual name=value pairs in an array
        var cookieArr = document.cookie.split(";");

        // Loop through the array elements
        for(var i = 0; i < cookieArr.length; i++) {
            var cookiePair = cookieArr[i].split("=");

            /* Removing whitespace at the beginning of the cookie name
            and compare it with the given string */
            if(name == cookiePair[0].trim()) {
                // Decode the cookie value and return
                return decodeURIComponent(cookiePair[1]);
            }
        }

        // Return null if not found
        return null;
}

function checkCookie() {
    // Get cookie using our custom function
    var authentication = getCookie("access_token");
    
    if(firstName != "") {
        alert("Welcome again, " + authentication);
    } else {
        authentication = prompt("Please enter your first name:");
        if(authentication != "" && authentication != null) {
            // Set cookie using our custom function
            setCookie("authentication", authentication, 30);
        }
    }
   }
//// Deleting a cookie
//document.cookie = "firstName=; max-age=0";