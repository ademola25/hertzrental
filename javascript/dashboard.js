var driverCarosel = document.querySelector('#all_drivers');
driverCarosel.addEventListener('load', (event) => load_driver_carosel(event));

var loadVehicles = document.querySelector('#all_vehicles');
loadVehicles.addEventListener('load', (event) => load_vehicle_carosel(event));

var loadAdmins = document.querySelector('#all_admin');
loadAdmins.addEventListener('load', (event) => load_admin_carosel(event));


var mainhtml = '';



 /******************************** LOAD DRIVER **********************************/
const load_driver_carosel = (event) => {
    
    getJSON(GLOBALS.appRoot + 'api/drivers', function(response){
       // myData = shuffleArray(response);
        _getallmydrivers(response);
    });

}


/******************************** LOAD ADMINS **********************************/
const load_admin_carosel = (event) => {
    
    getJSON(GLOBALS.appRoot + 'api/companyusers', function(response){
       // myData = shuffleArray(response);
        _getalladministrators(response);
    });

}

/******************************** LOAD VEHICLES **********************************/
const load_vehicle_carosel = (event) => {
    
    getJSON(GLOBALS.appRoot + 'api/vehicles', function(response){
       // myData = shuffleArray(response);
        _getallcompanyvehicles(response);
    });

}

////////////////////////////////////////// LOAD VEHICLES FUNCTION ////////////////////////////////////////////

function _getalladministrators(response){
   var makeactive = "";
   
    if(response){
     const { success } = response;  
     
    // console.log(response);
     
      mainhtml = success.map(el =>  
                '<div class="carousel-item">\n\
                    <div class="d-flex flex-wrap align-items-baseline">\n\
                    <h3 class="mr-3">'+ el.name +'</h3>\n\
                </div>\n\
                    <div class="mb-3">\n\
                    <p class="text-muted font-weight-bold text-small">'+ el.designation +'<span class=" font-weight-normal">('+ el.phone_number +')</span></p>\n\
                    </div><button class="btn btn-outline-secondary btn-sm btn-icon-text d-flex align-items-center"><i class="mdi mdi-car mr-1"></i><span class="text-left"></span></button></div>'
                ).join('');
       
       document.querySelector('#all_admin').innerHTML = mainhtml;
       
    }else{
      document.querySelector('#all_admin').innerHTML = 'No Admin';  
    }
}
////////////////////////////////////////// END OF LOAD VEHICLES FUNCTION ////////////////////////////////////////////





////////////////////////////////////////// LOAD VEHICLES FUNCTION ////////////////////////////////////////////

function _getallcompanyvehicles(response){
   var makeactive = "";
   
    if(response){
     const { success } = response;  
     
     //console.log(response);
     
      mainhtml = success.map(el =>  
                '<div class="carousel-item">\n\
                    <div class="d-flex flex-wrap align-items-baseline">\n\
                    <h3 class="mr-3">'+ el.plate_number +'</h3>\n\
                </div>\n\
                    <div class="mb-3">\n\
                    <p class="text-muted font-weight-bold text-small">'+ el.vehicle_type +'<span class=" font-weight-normal">('+ el.service_type +')</span></p>\n\
                    </div><button class="btn btn-outline-secondary btn-sm btn-icon-text d-flex align-items-center"><i class="mdi mdi-car mr-1"></i><span class="text-left"></span></button></div>'
                ).join('');
       
       document.querySelector('#all_vehicles').innerHTML = mainhtml;
       
    }else{
      document.querySelector('#all_vehicles').innerHTML = 'No Vehicle awailable';  
    }
}
////////////////////////////////////////// END OF LOAD VEHICLES FUNCTION ////////////////////////////////////////////



////////////////////////////////////////// LOAD DRIVER FUNCTION ////////////////////////////////////////////

function _getallmydrivers(response){
   var makeactive = "";
   
    if(response){
     const { success } = response;  
     
    // console.log(response);
     
      mainhtml = success.map(el =>  '<div class="carousel-item">\n\
                    <div class="d-flex flex-wrap align-items-baseline">\n\
                    <h3 class="mr-3">'+ el.phone_no + '</h3></div>\n\
                    <div class="mb-3">\n\
                    <p class="text-muted font-weight-bold text-small">'+ el.name + '<span class=" font-weight-normal"> ('+el.assigned_vehicle_no+')</span></p>\n\
                    </div>\n\
                    <button class="btn btn-outline-secondary btn-sm btn-icon-text d-flex align-items-center"><i class="mdi mdi-earth mr-1"></i><span class="text-left"></span></button></div>').join('');
       
       document.querySelector('#all_drivers').innerHTML = mainhtml;
       
    }else{
      document.querySelector('#all_drivers').innerHTML = 'No driver awailable';  
    }
}
////////////////////////////////////////// END OF LOAD DRIVER FUNCTION ////////////////////////////////////////////






load_driver_carosel();
load_vehicle_carosel();
load_admin_carosel();
