<?php

namespace App\Http\Controllers;

use App\Model\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Functions;
use Illuminate\Support\Facades\Auth;
use App\Model\Trips;
use App\Http\Resources\Trip\TripCollection;
use App\Http\Resources\Trip\TripResource;
use Cookie;

class DashboardController extends Controller
{
    
     public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
     public function __construct(){
        //$this->middleware('auth:api')->except('index', 'show');
       $this->middleware('token');
    }
    
    public function index(){
      $user = Auth::user();
     
      $cookie = isset($_COOKIE['access_token']) ? $_COOKIE['access_token'] : null;
       
      $b = new Functions();
      $success = $b::checkAccess($cookie);
      $data = $success->getData();
      
      $revoked = $data->revoked;
      $email = $data->email;
      $name = $data->name;
      $company_name = $data->company_name;
      $cid = $data->cid;
      $shared_pool_admin = $data->shared_pool_admin;
      
     
      //$manage = json_decode($request1, true);
      
      //$name = $manage['name'];
      //$id = $manage['id'];
     
      
      
      if(!$cookie){
         return redirect('/api/home'); 
      }else if($shared_pool_admin == 0 || $shared_pool_admin == ""){
            unset($_COOKIE['access_token']);
            Cookie::forget('access_token');
            return redirect('/api/norights'); 
            //return redirect('/api/home'); 
      }else if($revoked == 1){
          Cookie::forget('access_token');
           return redirect('/api/home');  
      }else if($email == "" || $email == null){
          Cookie::forget('access_token');
           return redirect('/api/home');  
      }
      
     
      return view('template/dashboard')->with('email', $email)->with('name', $name)->with("company_name", $company_name); 
      
        
    }

    public function usertrips(){
      $user_id = "";
      $getResult = [];
      $cookie = isset($_COOKIE['access_token']) ? $_COOKIE['access_token'] : null;
      //Use the User Token to retive the id and also load all the user reservation
     // dd($cookie);
      $b = new Functions();
      $success = $b::checkAccess($cookie);
      $data = $success->getData();
      
      $revoked = $data->revoked;
      $user_id = $data->user_id;
      
      if($user_id){
         $getResult = Trips::where("logged_by", $user_id)->get(); 
      }else{
         $getResult = "no trips";   
      }
      return response()->json(["sucess" =>   TripResource::collection($getResult) ]);
     
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
     * @param  \App\Model\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
    
    public function addUser(){
       
        
         return view('template/adduser');
      
    }
    
    
}
