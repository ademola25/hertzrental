<?php

namespace App\Http\Controllers;

use App\Http\Resources\Service\ServiceResource;
use App\Model\ServiceType;
use App\Location;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Service\ServiceCollection;
use App\Http\Resources\Location\LocationResource;
use App\Http\Resources\Location\LocationCollection;

class ServiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       $matchThese = ['reservation' => 1];
       $serviceType = ServiceType::where($matchThese)->get();
  
        return  ServiceCollection::collection($serviceType);
        //return ServiceCollection::collection(ServiceType::all());
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
     * @param  \App\Model\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function show($serviceType)
    {
       $json = [];
       
        if($serviceType == "inter_state_rental"){
              
              $matchLocation = ['reservation' => 1];
              $collectDeparture = Location::where($matchLocation)->get();
              $depature = LocationResource::collection($collectDeparture);
              
              $collectDestination = Location::all();
              $destination = LocationResource::collection($collectDestination);
              
            $json = ["departure" => $depature, "destination" => $destination];
                
          }else if($serviceType == "daily_rental" || $serviceType == "pickup_dropoff"  ){
              $matchLocation = ['reservation' => 1];
              $collectDeparture = Location::where($matchLocation)->get();
              $depature = LocationResource::collection($collectDeparture);
              
             
            $json = ["departure" => $depature, "destination" => ""]; 
          }else{
              
               return response()->json([
                   'data' => 'Incorrect parameter'
             ], Response::HTTP_NOT_FOUND);
          }
       
       
         return response()->json($json);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceType $serviceType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceType $serviceType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceType $serviceType)
    {
        //
    }
}
