<?php

namespace App\Http\Controllers;

use App\Model\Trips;
use Illuminate\Http\Request;
use DB;

class TripsController extends Controller
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

        $Trips = DB::table('direct_bookings')->where('company_id', $cid)->get();
        if($Trips){
            return response()->json(["success" => $Trips]);  //TripResource::collection($getResult) 
        }else{
            return response()->json(["error" => "No Trips Found" ]); 
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
     * @param  \App\Model\Trips  $trips
     * @return \Illuminate\Http\Response
     */
    public function show(Trips $trips)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Trips  $trips
     * @return \Illuminate\Http\Response
     */
    public function edit(Trips $trips)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Trips  $trips
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trips $trips)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Trips  $trips
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trips $trips)
    {
        //
    }
}
