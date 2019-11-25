<?php

namespace App\Http\Controllers;

use App\Model\Vehicle;
use Illuminate\Http\Request;
use App\Http\Resources\Vehicle\VehicleCollection;
use App\Http\Resources\Vehicle\VehicleResource;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cookie = isset($_COOKIE['access_token']) ? $_COOKIE['access_token'] : null;     
        $b = new Functions();
        $success = $b::checkAccess($cookie);
        $data = $success->getData();
        $cid = $data->cid;

        $getVehicles = Vehicle::where("cid", $cid)->get();
        
        if($getVehicles){
            return response()->json(["success" => VehicleCollection::collection($getVehicles)]);  //TripResource::collection($getResult) 
        }else{
            return response()->json(["error" => "No Driver Found" ]); 
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
     * @param  \App\Model\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
