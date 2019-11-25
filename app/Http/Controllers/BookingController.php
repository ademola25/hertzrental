<?php

namespace App\Http\Controllers;

use App\Model\Booking;
use Illuminate\Http\Request;
use App\Http\Resources\Booking\BookingResource;
use App\Http\Resources\Booking\BookingCollection;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\TripRequest;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Auth;
use App\Model\Trips;
use App\Model\LocationCost;
use App\Http\Controllers\Functions;
use App\Http\Resources\Trip\TripResource;
use App\Http\Resources\Trip\TripCollection;
use App\Model\BookingHistory;
use App\Events\SendDriver;
use DB;

class BookingController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //return Booking::all();
        return BookingCollection::collection(Booking::all());
    }

    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        
        $cookie = isset($_COOKIE['access_token']) ? $_COOKIE['access_token'] : null;
        
        $b = new Functions();
        $success = $b::checkAccess($cookie);
        $data = $success->getData();

        $revoked = $data->revoked;
        $user_id = $data->user_id;
        $cid = $data->cid;
        $json = [];
        
        if($request->passengerName ||  $request->passengerPhone == "" || $request->pickup_address){
             $json =  response([ 'data' => "please make sure all fields are filled" ]); 
        }
        
        $booking= new BookingHistory;
        $booking->username = $request->passengerName;
        $booking->phone = $request->passengerPhone;
        $booking->pickup_address = $request->pickup_address;
        $booking->dropoff_address = $request->dropoff_address;
        $booking->pick_up_date = $request->pickup_date;
        $booking->end_date = $request->end_date;
        $booking->vehicle_id = $request->allgetVehicles;
        $booking->driver_id = $request->allgetDrivers;
        $booking->logged_by = $user_id;
        $booking->company_id = $cid;
        $booking->status = "pending";
        
        
        ////////////CHECK FOR OPTIONAL VALUE /////////////////////
        $booking->pickup_latitude = (isset($request->pickup_latitude) ? $request->pickup_latitude : 0);
        $booking->pickup_longitude = (isset($request->pickup_longitude) ? $request->pickup_latitude : 0);
        $booking->dropoff_latitude = (isset($request->dropoff_latitude) ? $request->dropoff_latitude : 0);
        $booking->dropoff_longitude = (isset($request->dropoff_longitude) ? $request->dropoff_longitude : 0);
        $booking->distance = (isset($request->distance) ? $request->distance : 0);
         ////////////CHECK FOR OPTIONAL VALUE /////////////////////
        
       
       $success =  $booking->save();
       $returnid = $booking->id;
       
        $result = ["jobid" => $returnid, "p_name" => $request->passengerName, "phone" =>$request->passengerPhone,
            "pickup_address" => $request->pickup_address, "dropoff" => $request->dropoff_address, 
            "pickup_date" => $request->pickup_date, "distance" =>$request->distance ]; 
        
        //Get all the drivers that are online and are within my location;
        $allDrivers = DB::table('users')->where('cid', $cid)->get(); 
        
        if($allDrivers){
            
            foreach($allDrivers as $get){
                $driver_id = $get->driver_id;
                
                $newEvent = event(new SendDriver($result));
            }
        }
        
        
        if($success){
            return response([
              // 'data' => new ProductResource($product)
               'status' => "200",
               'result' => $booking,
               'id' => $returnid,
           ], Response::HTTP_CREATED);
        }else{
             return response([ 'status' => "400"]);
        }
      
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * BookingRequest
     */
    //BookingRequest $request, 
    public function store(Request $request, TripRequest $tripRequest) {
       
        $cookie = isset($_COOKIE['access_token']) ? $_COOKIE['access_token'] : null;
        
        $b = new Functions();
        $success = $b::checkAccess($cookie);
        $data = $success->getData();

        $revoked = $data->revoked;
        $user_id = $data->user_id;
        
       
         
        $json = [];
        
        if($request->passenger_names == "" ||  $request->email_address == "" || !isset( $request->email_address)){
             $json =  response([ 'data' => "please make sure all fields are filled" ]); 
        }
       
       
        $reservation = new Booking;
        $reservation->office = 0;
        $reservation->client_name = 332;
        $reservation->contact_name = $request->passenger_names;
        $reservation->contact_email_address = $request->email_address;
        $reservation->contact_phone_number = $request->passenger_phone_numbers;
        $reservation->task_status = "submitted";
        $reservation->client_type = "individual";
        $reservation->credit_type = "non_credit";
        $reservation->reservation_date = date('Y-m-d');
        $reservation->type = "online";
        $reservation->contact_fullname =  $request->passenger_names;// use auth to check this
        $reservation->cid = 332;
        $randomNum = rand(10, 20) . time() . Str::random(32);
        $reservation->random_num = $randomNum;
        $reservation->logged_by = (isset($user_id)) ? $user_id : 0;
        $reservation->created_by = (isset($user_id)) ? $user_id : 0;
                
        $success = $reservation->save();
        
        $lastID = $reservation->reservation_id;
        
        
        ////////////////////////////////////////TRIP RESERVATION ////////////////////////////////////////
        
        $trips = new Trips;
        $trips->reservation_id = $lastID;
        $trips->passenger_names = $tripRequest->passenger_names;
        $trips->number_of_passengers = 1;
        $trips->passenger_phone_numbers = $tripRequest->passenger_phone_numbers;
        $trips->departure = $tripRequest->departure;
        $trips->destination = $tripRequest->destination;
        $trips->pick_up_date = $tripRequest->pick_up_date;
        $trips->end_date = $tripRequest->end_date;
        $trips->vehicle_make = $tripRequest->vehicle_make;
        $trips->service_type = $tripRequest->service_type;
        $trips->vehicle_type = $tripRequest->vehicle_type;
        $trips->email_address = $tripRequest->email_address;
        $trips->rental_conditions = "This Rate is for Within lagos Only 
                            Please note that our working period is between 7am - 6pm
                            Normal Overtime Rate (7pm - 12 midnight -------- N500 per hour
                            Abnormal Overtime Rate (12 midnight - 6am ------- N1000 per hour
                            Weekend Allowance --------------------------------N1,500 per day";
        
        
        /////////////////////////Number of Days /////////////////////////////////////////////////////
        $sPickDate =  Carbon::parse($tripRequest->pick_up_date);
        $sEndDate =  Carbon::parse($tripRequest->end_date);
                    
        $days =  $sEndDate->diffInDays($sPickDate);
        $days = $days == 0 ? $days + 1 : $days + 1;
        
         $trips->number_of_days = $days;
         //$trips->end_date = $tripRequest->end_date;
         
         /////////////////////////////Calculating Cost /////////////////////////////////////////////
          $matchThese = ['departure' => $tripRequest->departure, 'destination' => $tripRequest->destination, 
                  'vehicle_type' => $tripRequest->vehicle_type, 'service_type' => $tripRequest->service_type, 
               'vehicle_make' => $tripRequest->vehicle_make, 'cid' => 96];
                
         $getCost = LocationCost::where($matchThese)->value('cost');
          //Discount Web
         $discount_web = LocationCost::where($matchThese)->value('discount_web');       
         //Additional Web
         $addition_web = LocationCost::where($matchThese)->value('addition_web');
    
          $price = $getCost * $days;
          $additionalCost = (int)$addition_web - (int)$discount_web;
            
          $totalCostTrip = $price + (int)$additionalCost;
          $trips->price = $price;
          $trips->additional_cost =  $additionalCost;
          $trips->total_cost = $totalCostTrip;
         /////////////////////////////End of Cost Calculation //////////////////////////////////////
          $trips->trip_status = "submitted";
          $trips->actual_street = $tripRequest->actual_street;
          $trips->pickup_street = $tripRequest->pickup_street;
          $trips->logged_by = (isset($user_id)) ? $user_id : 0;
         $trips->created_by = (isset($user_id)) ? $user_id : 0;
        
          $trips->task_status = 0;
          $trips->cid = 332;
          $trips->_token = $randomNum;
            
           $success2 = $trips->save();
           $lastTripID = $trips->id;
        
           $message = "";
           if($tripRequest->service_type == "pickup_dropoff" || $tripRequest->service_type == "daily_rental" ){
               $message = "Pay with Paystack";
           }else{
               $message = "THE RATE ABOVE IS EXCLUSIVE OF-"
                       . "Fueling-"
                       . "Overtime (N500 per hour from 7pm to 12 midnight) , (N1000 per hour from 12 midnight to 6pm) -"
                       . "Outstation Allowance (N5,000 per night)-"
                       . "All Our rates are subject to discount -"
                       . "IMPORTANT NOTICE -"
                       . "Our Customer Service will contact you in less than 10mins for further details -"
                       . "Should you have any questions, please contact info@rentacar.ng or call Lagos : 234 906 000 4024 or 234 817 200 7171  Abuja: 234 906 000 4026  or  234 817 200 7159  Port Harcourt: 234 906 000 4025 or  234 817 200 7277 -";
           }
        
        ////////////////////////////////////////TRIP RESERVATION ////////////////////////////////////////
        //  'reservation' => new BookingResource($reservation),
        if($success){
            //You are expected to redirect to the tri with the last id
           $json = ['reservationID' => $lastID, 'tripID' => $lastTripID, 'paymentMode' =>$message,  'trip' => new TripResource($trips) ];
         
           
        }else{
           $json = [ 'error' => "Sorry we cannot process your request at the moment" ]; 
        
        }
        
       
         return response()->json(["data" => $json ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking) {
        return new BookingResource($booking);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking) {
        //
    }

}
