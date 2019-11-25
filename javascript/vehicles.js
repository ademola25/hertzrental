 // $('#fromgalooli').html("<img src='http://payhaven.com.ng/images/meload.gif'"); image loader
/******************************** FETCHING VEHICLES **********************************/

var fetchVehicles = document.querySelector('#contract_list');
fetchVehicles.addEventListener('load', (event) => fetchAll(event));

 /******************************** LOAD DRIVER **********************************/
const fetchAll = (event) => {
    
    getJSON(GLOBALS.appRoot + 'api/tripbycid', function(response){
       // myData = shuffleArray(response);
        _iVehicles(response);
    });

}

////////////////////////////////////////// LOAD VEHICLES FUNCTION ////////////////////////////////////////////

function _iVehicles(response){
   var makeactive = "";
   document.querySelector('#contract_list').innerHTML = "loading vehicles, please wait..";
    if(response){
     const { success } = response;  
     
     //console.log(response);
     
      mainhtml = success.map(el =>  
                '<tr>\n\
                    <td>\n\
                       <div class="text-muted font-weight-medium">'+ el.username +'</div>\n\
                    </td><td>'+ el.pickup_address +'</td>\n\
                    <td>'+ el.dropoff_address +'</td>\n\
                    <td><label class="badge badge-success">'+ el.status +'</label></td>\n\
                    <td><a href="#" class="mr-1 text-muted p-2"><i class="mdi mdi-view-array"></i></a>\n\
                    <a href="#" class="mr-1 text-muted p-2"><i class="mdi mdi-share"></i></a></td></tr>'
                ).join('');
       
       document.querySelector('#contract_list').innerHTML = mainhtml;
       
    }else{
      document.querySelector('#contract_list').innerHTML = 'No Vehicle Awailable In Your Company';  
    }
}
////////////////////////////////////////// END OF LOAD VEHICLES FUNCTION ////////////////////////////////////////////

fetchAll();