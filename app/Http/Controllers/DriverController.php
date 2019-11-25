<?php

namespace App\Http\Controllers;

use App\Model\Driver;
use Illuminate\Http\Request;
use App\Events\RecieverDriverUpdate;


class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //THIS IS FOR SHARED POOL ADMINISTRATOR
      $cookie = isset($_COOKIE['access_token']) ? $_COOKIE['access_token'] : null;     
      $b = new Functions();
      $success = $b::checkAccess($cookie);
      $data = $success->getData();
      $cid = $data->cid;
      
      $getDrivers = Driver::where("cid", $cid)->get();
      if($getDrivers){
          return response()->json(["success" => $getDrivers]);  //TripResource::collection($getResult) 
      }else{
          return response()->json(["error" => "No Driver Found" ]); 
      }
      
      
    }
    
     public function driverDetails(Request $request)
    {
      //GET USER DETAILS WHO IS A DRIVER
      if(isset($request->driverid)){
            $cookie = isset($_COOKIE['access_token']) ? $_COOKIE['access_token'] : null;     
            $b = new Functions();
            $success = $b::checkAccess($cookie);
            $data = $success->getData();
            $cid = $data->cid;

            $getDriverDetails = Driver::where("driver_id", $cid)->get();
            
            if($getDriverDetails){
                return response()->json(["success" => $getDriverDetails]); 
            }else{
                return response()->json(["error" => "No Driver Found" ]); 
            }
      }
     
      
      
    }
    
    
    
    public function jobstatus(Request $request){
        
        //Check Status of Direct Booking First before changing it
        $getStatus = DB::table('direct_bookings')->where('id', $request->jobid)->value('status');
        if($getStatus == "accepted" && $request->jobstatus == "accepted"){
             return response()->json(["status" => 400, "error" => "The Job Has been Accepted By Another Driver"]); 
        }else if($getStatus == "started" && $request->jobstatus == "accepted"){
             return response()->json(["status" => 400, "error" => "The Job Has been Started By Another Driver"]); 
        }else if($getStatus == "completed" && ($request->jobstatus == "started" || $request->jobstatus == "accepted" 
                || $request->jobstatus == "cancelled" || $request->jobstatus == "re-assigned" ||  $request->jobstatus == "declined")  ){  
              return response()->json(["status" => 400, "error" => "The Job Has been Completed"]); 
        }else if($getStatus == "completed" && $request->jobstatus == "cancelled"){
              return response()->json(["status" => 400, "error" => "The Job Has been Completed"]); 
        }else{
            
        
        if(isset($request->driver_token) && isset($request->driver_id) && isset($request->jobid) && isset($request->jobstatus)){
            
            $cookie = isset($_COOKIE['access_token']) ? $_COOKIE['access_token'] : null;

            $b = new Functions();
            $success = $b::checkAccess($cookie);
            $data = $success->getData();
            
            $email = $data->email;
            $name = $data->name;
            $company_name = $data->company_name;
            $cid = $data->cid;
            $user_id = $data->user_id;
            
            $date = date('Y-m-d H:i:s');
            //Use the Driver ID to return the vehicle
             $vehicle = DB::table('drivers')->where('driver_id', $request->driver_id)->value('assigned_vehicle_no');
             $name = DB::table('drivers')->where('driver_id', $request->driver_id)->value('name');
             $phone_no = DB::table('drivers')->where('driver_id', $request->driver_id)->value('phone_no');
             $cid = DB::table('drivers')->where('driver_id', $request->driver_id)->value('cid');
             
             if($request->jobstatus == 'accepted'){
                $auditTrail = "Job Accepted By $name with Phone No: $phone_no on $date <br/>"; 
             }else if($request->jobstatus == 'started'){
                  $auditTrail = "Job Started By $name with Phone No: $phone_no on $date";  
             }else if($request->jobstatus == 'completed'){
                  $auditTrail = "Job Completed By $name with Phone No: $phone_no on $date"; 
             }else if($request->jobstatus == 'cancelled'){
                  $auditTrail = "Job Cancelled By $name with Phone No: $phone_no on $date"; 
             }else if($request->jobstatus == 're-assigned'){
                  $auditTrail = "Job re-assigned By $name with Phone No: $phone_no on $date"; 
             }else if($request->jobstatus == 'declined'){
                  $auditTrail = "Job Declined By $name with Phone No: $phone_no on $date"; 
             }else{
                $auditTrail = "No Status Yet";   
             }
             
             
            //Change the Trip Status to Started and add the driver and vehicle with the captured time
             $jobStarted = DB::statement("UPDATE `direct_bookings` SET `status` = '".$request->jobstatus."', `driver_id` = '".$request->driver_id."',"
                     . "`vehicle_id` = '".$vehicle."', `auditTrail` = CONCAT($auditTrail, auditTrail), `updated_at` = '".date('Y-m-d H:i:s')."' WHERE `id` =  '".$request->jobid."' ");
             
             
             //Get the id of the person who booked the job
             $match = ["user_id" => $request->jobid , "online_status" => "online"];
             $bookerID = DB::table('direct_bookings')->where($match)->value('user_id');
              
              //Send an event to him
             if($bookerID){
                  $newEvent = event(new RecieverDriverUpdate($auditTrail));
             }
             
             
             if($jobStarted){
                return response()->json(["status" => 200, "success" => $auditTrail]);
             }else{
                 return response()->json(["status" => 400]);
             }
        }
          
        }
    }

    
    
 
 public function startedjob(Request $request){
        
        if(isset($request->driver_token) && isset($request->driver_id) && isset($request->jobid)){
            
            $cookie = isset($_COOKIE['access_token']) ? $_COOKIE['access_token'] : null;

            $b = new Functions();
            $success = $b::checkAccess($cookie);
            $data = $success->getData();
            
            $email = $data->email;
            $name = $data->name;
            $company_name = $data->company_name;
            $cid = $data->cid;
            $user_id = $data->user_id;
            
            $date = date('Y-m-d H:i:s');
            //Use the Driver ID to return the vehicle
             $vehicle = DB::table('drivers')->where('driver_id', $request->driver_id)->value('assigned_vehicle_no');
             $name = DB::table('drivers')->where('driver_id', $request->driver_id)->value('name');
             $phone_no = DB::table('drivers')->where('driver_id', $request->driver_id)->value('phone_no');
             $cid = DB::table('drivers')->where('driver_id', $request->driver_id)->value('cid');
             
           
             //Get the id of the person who booked the job
             $match = ["user_id" => $request->jobid , "online_status" => "online"];
             $bookerID = DB::table('direct_bookings')->where($match)->value('user_id');
              
              //Send an event to him that the driver has started the job with the time he started it.
             
             if($jobStarted){
                return response()->json(["status" => 200, "success" => $auditTrail]);
             }else{
                 return response()->json(["status" => 400]);
             }
          
        }
    }   
    
    
    
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        //
    }
}
