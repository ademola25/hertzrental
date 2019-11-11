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

use App\Http\Resources\Trip\TripResource;
use App\Http\Resources\Trip\TripCollection;

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
        
      
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * BookingRequest
     */
    public function store(BookingRequest $request, TripRequest $tripRequest) {
       
        $json = [];
        
        if($request->passenger_names == ""){
             $json =  response([ 'data' => null ], Response::HTTP_NO_CONTENT  ); 
        }
       
        $reservation = new Booking;
        $reservation->office = 0;
        $reservation->client_name = 332;
        $reservation->contact_name = $request->passenger_names;
        $reservation->contact_email_address = $request->contact_email_address;
        $reservation->contact_phone_number = $request->contact_phone_number;
        $reservation->task_status = "submitted";
        $reservation->client_type = "individual";
        $reservation->credit_type = "non_credit";
        $reservation->reservation_date = date('Y-m-d');
        $reservation->type = "online";
        $reservation->contact_fullname =  $request->contact_fullname;
        $reservation->cid = 332;
        $randomNum = rand(10, 20) . time() . Str::random(32);
        $reservation->random_num = $randomNum;
        $reservation->logged_by = (isset(Auth::user()->id)) ? Auth::user()->id : 0;
        $reservation->created_by = (isset(Auth::user()->id)) ? Auth::user()->id : 0;
                
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
        
        
        /////////////////////////Number of Days /////////////////////////////////////////////////////
        $sPickDate =  Carbon::parse($tripRequest->pick_up_date);
        $sEndDate =  Carbon::parse($tripRequest->end_date);
                    
        $days =  $sEndDate->diffInDays($sPickDate);
        $days = $days == 0 ? $days + 1 : $days + 1;
        
         $trip->number_of_days = $days;
         $trips->end_date = $tripRequest->end_date;
         
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
          $trip->price = $price;
          $trip->additional_cost =  $additionalCost;
          $trip->total_cost = $totalCostTrip;
         /////////////////////////////End of Cost Calculation //////////////////////////////////////
          $trips->trip_status = "submitted";
          $trips->actual_street = $tripRequest->actual_street;
          $trips->pickup_street = $tripRequest->pickup_street;
          $trips->task_status = 0;
          $trips->cid = 332;
          $trips->_token = $randomNum;
            
           $success2 = $trips->save();
           $lastTripID = $trip->id;
        
           $message = "";
           if($tripRequest->service_type == "pickup_dropoff" || $tripRequest->service_type == "daily_rental" ){
               $message = "Pay with Paystack";
           }else{
               $message = "<View><Text>THE RATE ABOVE IS EXCLUSIVE OF</Text></View>"
                       . "<View><Text>Fueling</Text></View>"
                       . "<View><Text>Overtime (N500 per hour from 7pm to 12 midnight) <br/> (N1000 per hour from 12 midnight to 6pm)</Text></View>"
                       . "<View><Text>Outstation Allowance (N5,000 per night)</Text></View>"
                       . "<View><Text>All Our rates are subject to discount</Text></View>"
                       . "<View><Text>IMPORTANT NOTICE</Text></View>"
                       . "<View><Text>Our Customer Service will contact you in less than 10mins for further details</Text></View>"
                       . "<View><Text>Should you have any questions, please contact info@rentacar.ng or call Lagos : 234 906 000 4024 or 234 817 200 7171  Abuja: 234 906 000 4026  or  234 817 200 7159  Port Harcourt: 234 906 000 4025 or  234 817 200 7277</Text></View>";
           }
        
        ////////////////////////////////////////TRIP RESERVATION ////////////////////////////////////////
        
        if($success){
            //You are expected to redirect to the tri with the last id
           $json = response(['reservationID' => $lastID, 'tripID' => $lastTripID, 'paymentMode' =>$message,  'reservation' => new BookingResource($reservation), 'trip' => new TripResource($trips) ], Response::HTTP_CREATED);
        }else{
           $json = response([ 'data' => "Sorry we cannot process your request at the moment" ], Response::HTTP_BAD_REQUEST ); 
        }
        
        return $json;
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
