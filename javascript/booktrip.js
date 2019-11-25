var bookVehicle = document.querySelector('#booktrip');
bookVehicle.addEventListener('click', (event) => submitBookings(event));

 // $('#fromgalooli').html("<img src='http://payhaven.com.ng/images/meload.gif'"); image loader

/******************************** FETCHING VEHICLES **********************************/
$(document).ready(function () {
   
    /////////////////////////////////FETCHING VEHICLES BY COMPANY///////////////////////////////////////////////
    $('#fetching').html('<h5>Fetching Vehicles, please wait....</h5>');
    $.ajax({
        url: GLOBALS.appRoot + "api/vehicles",
        type: "GET",
        dataType: "JSON",
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
          
        success: function (data) {
            if(typeof data.success == "object"){
            
               for (var i = 0; i < data.success.length; ++i) {
                     $('#allgetVehicles').append('<option value="'+ data.success[i].vehicle_id + ' ">'+ data.success[i].plate_number + '</option>');
                  
                }
                 $('#fetching').html('Select Vehicle');
                 
                }else{
                   $('#fetching').html("<center>Error Loading Vehicles</center>"); 
                }
             
            }
         }).fail(function () {
         $('#fetching').html("Error! Check your internent and try again later....");
            
     })
   /////////////////////////////////END OF FETCHING VEHICLES BY COMPANY///////////////////////////////////////////////  
     
  
    
   /////////////////////////////////FETCHING VEHICLES BY COMPANY///////////////////////////////////////////////
    $('#fetchingdrivers').html('<h5>Fetching Drivers, please wait....</h5>');
    $.ajax({
        url: GLOBALS.appRoot + "api/drivers",
        type: "GET",
        dataType: "JSON",
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
          
        success: function (data) {
            if(typeof data.success == "object"){
            
               for (var i = 0; i < data.success.length; ++i) {
                     $('#allgetDrivers').append('<option value="'+ data.success[i].driver_id + ' ">'+ data.success[i].name + '</option>');
                  
                }
                 $('#fetchingdrivers').html('Select Driver');
                 
                }else{
                   $('#fetchingdrivers').html("<center>Error Loading Driver</center>"); 
                }
             
            }
         }).fail(function () {
         $('#fetchingdrivers').html("Error! Check your internent and try again later....");
            
     })
   /////////////////////////////////END OF FETCHING VEHICLES BY COMPANY///////////////////////////////////////////////  
     
    
    
    
    
    
});


















 /******************************** SUBMIT BOOKINGS **********************************/
const submitBookings = (event) => {
    
  const passengerName = document.querySelector('#passengerName').value;
  const passengerPhone = document.querySelector('#passengerPhone').value;
  const pickup_address = document.querySelector('#pickup_address').value;
  const dropoff_address = document.querySelector('#dropoff_address').value;
  const pickup_date = document.querySelector('#pickup_date').value;
  const end_date = document.querySelector('#end_date').value;
  const allgetVehicles = document.querySelector('#allgetVehicles').value;
  const allgetDrivers = document.querySelector('#allgetDrivers').value;
  
  
   const data = {
        passengerName: passengerName,
        passengerPhone: passengerPhone,
        pickup_address: pickup_address,
        dropoff_address: dropoff_address,
        pickup_date: pickup_date,
        end_date: end_date,
        allgetVehicles: allgetVehicles,
        allgetDrivers: allgetDrivers,
    }


  if(passengerName == "" || passengerPhone == "" || pickup_address == "" || dropoff_address == ""
          || pickup_date == ""  || end_date == ""){
      
       Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'The Following Are Required! - Passenger Name | Passenger Phone | Pickup Address | Drop Of Address'
           
          })
          
       return;
      
  }else{
       var createPost = GLOBALS.appRoot + "api/createbooking";
       
       $.post(createPost, data, function (data) {
             if(data.status == 200){
                 let newHtml, html;
                 let hplace = document.getElementById("contract_list");
                  html = '<tr><td>%name%</td><td>%pickup%</td><td>%dropoff%</td><td>%status%</td><td>%action%</td></tr>';
                  //newHtml = html.replace('%id%', "new");
                  newHtml = html.replace('%name%', data.result.username);
                  newHtml = newHtml.replace('%pickup%', data.result.pickup_address);
                  newHtml = newHtml.replace('%dropoff%', data.result.dropoff_address);
                  newHtml = newHtml.replace('%status%', "<label class='badge badge-success'>"+data.result.status+"</label>");
                  newHtml = newHtml.replace('%action%', "<a href='#' id="+data.result.status+"  class='mr-1 text-muted p-2'><i class='mdi mdi-view-array'></i></a>\n\
                                                        <a href='#' id="+data.result.status+" class='mr-1 text-muted p-2'><i class='mdi mdi-share'></i></a>");
                  hplace.insertAdjacentHTML('afterbegin', newHtml);
                 
                  Swal.fire({
                        position: 'top-end',
                        icon: 'Success',
                        title: 'Booking Successfully Created',
                        showConfirmButton: false,
                        timer: 1500
                      })
                  
                  document.querySelector('#passengerName').value ="";
                  document.querySelector('#passengerPhone').value="";
                  document.querySelector('#pickup_address').value="";
                  document.querySelector('#dropoff_address').value="";
                  document.querySelector('#pickup_date').value="";
                  document.querySelector('#end_date').value="";
                  document.querySelector('#allgetVehicles').value="";
                  document.querySelector('#allgetDrivers').value="";
                 
             }else{
                
                  Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Error Processing Request, Please Try Again'

                  })
             }
         }); 
  }
  

}

