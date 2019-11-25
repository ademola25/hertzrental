<?php

namespace App\Http\Controllers;

use App\Model\AuthenticateLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserCollection;
use DB;
use Session;
use Cookie;
use App\User;
use App\Http\Controllers\Functions;
use Validator;
use App\Model\Vehicle;
use App\Http\Resources\Price\PriceCollection;
use App\Http\Resources\Price\PriceResource;
use App\Model\LocationCost;
use App\Http\Requests\PriceRequest;
use Symfony\Component\HttpFoundation\Response;



class AuthenticateLoginController extends Controller {

    public $successStatus = 200;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        echo "What are you looking or  here?";
    }
    
     public function getprice(PriceRequest $request){
       
        if($request->service_type == ""){
             $json =  response([ 'data' => null ], Response::HTTP_NO_CONTENT  ); 
        }
          
        $service_type = $request->service_type;
        $departure = $request->departure;
        $destination = $request->destination;
        $vehicle_type = $request->vehicle_type;
        $vehicle_make = $request->vehicle_make;
        $pickup_date = $request->pickup_date;
        $end_date = $request->end_date;
        
        
         $matchThese = ['departure' => $departure, 'destination' =>$destination, 
                  'vehicle_type' =>$vehicle_type, 'service_type' => $service_type, 
               'vehicle_make' => $vehicle_make, 'cid' => 96];
                
         $getCost = LocationCost::where($matchThese)->get();
         $getTotalCost = LocationCost::where($matchThese)->value('cost');
         
         if($getTotalCost){
             $json = response(['content' => new PriceResource($getCost) ], Response::HTTP_CREATED); 
         }else{
              $json =  response([ 'content' => 'Customer Service Will Contact You For Your Reservation' ], Response::HTTP_PARTIAL_CONTENT  ); 
         }
       
         
          return $json;
        
    }
    
    

    public function loginDriver() {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password'), 'driver_access' => '1'] )) {
            $user = Auth::user();
            
            $token_result = $user->createToken($user)->accessToken;
            //$success = $user->createToken('Personal Access Token')->accessToken;
            
            $b = new Functions();
            $success = $b::checkAccess($token_result);
            $data = $success->getData();

           //setcookie(    $name, $value, $expire, $path, $domain, $secure, $httponly ) 
           $serverCookie = setcookie("access_token", $token_result, time()+3600, null, null, null,  TRUE);

           $getcid = $data->cid;
           
            if($getcid && ($getcid != 'null' || $getcid !='0') ){          
               
              $setOnline = DB::statement("UPDATE `users` SET `online_status` = 'online' "
                  . "WHERE `id` =  '".$data->user_id."' ");
              
            return response()->json([
                'success' => $success,
                'status' => $this->successStatus,
                'access_token' => $serverCookie,
                'name' => $data->name,
                'email' => $data->email,
                'phone' => $data->phone,
                'cid' => $data->cid,
                'driver_access' => $data->driver_access,
                 'driver_id' => $data->driver_id,
                 'shared_pool_admin' => $data->shared_pool_admin,
                 'company_name' => $data->company_name,
                 'Authorization' => $token_result,
                 'web' => 'driver',
                'token_type' => 'Bearer',
                // 'expires_at' => Carbon::parse( $token_timer->token->expires_at)->toDateTimeString()
                ], $this->successStatus);
            
            }else{
               unset($_COOKIE['access_token']);
               return response()->json(['error' => 'You are not Authorize to use this app. Not a Driver!'], 400);
            }
            
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    
    
    public function register(Request $request) {
        
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'required',
                    'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
       
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
        return response()->json(['success' => $success], $this->successStatus);
    }

    /**
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function details() {
        $user = Auth::user();
       
      
        return response()->json(['success' => $user], $this->successStatus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    public function store(Request $request) {
         $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
           
        ]);
        
         $credentials = request(['email', 'password']);
         
          if (!Auth::attempt($credentials))
            return response()->json([ 'message' => 'Unauthorized' ], 401);
         
          //$user =  $request->user();
         
          $user = Auth::user();
          
           // $success = $user->createToken($user)->accessToken;
         
         // $tokenResult = $user->createToken('Personal Access Token');
          $tokenResult = $user->createToken($user);
          $token = $tokenResult->token;
          
          
          if ($request->checkmein)
            $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();
            
          /////////////////////////////////Implementing decoding the token ////////////////////////////
        
          $token_result =  $tokenResult->accessToken;
          
         
          $b = new Functions();
          $success = $b::checkAccess($token_result);
          $data = $success->getData();
          
         //setcookie(    $name, $value, $expire, $path, $domain, $secure, $httponly ) 
         $serverCookie = setcookie("access_token", $tokenResult->accessToken, time()+3600, null, null, null,  TRUE);
         
         $getcid = $data->cid;
         
          $setOnline = DB::statement("UPDATE `users` SET `online_status` = 'online' "
                  . "WHERE `id` =  '".$data->user_id."' ");
             
         if($getcid && ($getcid != 'null' || $getcid !='0') ){
            
              return response()->json([
                    'success' => $this->successStatus,
                    'name' => $data->name,
                    'email' => $data->email,
                    'phone' => $data->phone,
                    'cid' => $data->cid,
                    'shared_pool_admin' => $data->shared_pool_admin,
                    'company_name' => $data->company_name,
                    'Authorization' => $tokenResult->accessToken,
                    'web' => 'web',
                    'access_token' => $serverCookie,
                    'token_type' => 'Bearer',
                    'expires_at' => Carbon::parse( $tokenResult->token->expires_at)->toDateTimeString()
             ]);
             
         }else{
         
            return response()->json([
                      'success' => $this->successStatus,
                      'name' => $data->name,
                      'email' => $data->email,
                      'phone' => $data->phone,
                      'web' => 'mobile',
                      'Authorization' => $tokenResult->accessToken,
                      'access_token' => $serverCookie,
                      'token_type' => 'Bearer',
                      'expires_at' => Carbon::parse( $tokenResult->token->expires_at)->toDateTimeString()
          ]);
        }
    }

    ////////////////////////////////////// FRONT VIEW /////////////////////////////////////////////////////////////
    public function frontpage($token) {
        // break up the string to get just the token
        $auth_header = explode(' ', $token);


        $token = $auth_header[0];
        // break up the token into its three parts
        $token_parts = explode('.', $token);
        $token_header = $token_parts[0];

        // base64 decode to get a json string
        $token_header_json = base64_decode($token_header);
        // you'll get this with the provided token:
        // {"typ":"JWT","alg":"RS256","jti":"9fdb0dc4382f2833ce2d3993c670fafb5a7e7b88ada85f490abb90ac211802720a0fc7392c3f2e7c"}
        // then convert the json to an array
        $token_header_array = json_decode($token_header_json, true);

        $user_token = $token_header_array['jti'];

        // find the user ID from the oauth access token table
        // based on the token we just got
        return $user_id = DB::table('oauth_access_tokens')->where('id', $user_token)->value('user_id');


        // then retrieve the user from it's primary key
        //  $user = User::findOrFail($user_id);
        //Get the Trip Information
        //$trips = DB::table('trips')->where('logged_by', $user_id)->get();
        // return response()->json(['success' => $user, 'trips' => $trips], $this->successStatus);
    }

    ////////////////////////////////////// FRONT VIEW /////////////////////////////////////////////////////////////   




    public function mylogout(Request $request){
        
        $b = new Functions();
        $success = $b::checkAccess($_COOKIE['access_token']);
        $data = $success->getData();
      
        $token = $data->token;
        
         $setOffline = DB::statement("UPDATE `users` SET `online_status` = 'offline' "
                  . "WHERE `id` =  '".$data->user_id."' ");
         
        $token = DB::table('oauth_access_tokens')->where('id', $token)->delete(); 
      
        unset($_COOKIE['access_token']);
        Cookie::forget('access_token');
        Session::flush();
         
         Session::regenerate();
       
        return response([
            'message' => 'User was logged out'
        ]);
        
    }
    
    
    
    
    public function ilogout(Request $request) {
        if (!$this->guard()->check()) {
            return response([
                'message' => 'No active user session was found'
                    ], 404);
        }

        // Taken from: https://laracasts.com/discuss/channels/laravel/laravel-53-passport-password-grant-logout
        $request->user('api')->token()->delete();
        unset($_COOKIE['access_token']);
        Cookie::forget('access_token');
        Auth::guard()->logout();

        Session::flush();

        Session::regenerate();


        return response([
            'message' => 'User was logged out'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\AuthenticateLogin  $authenticateLogin
     * @return \Illuminate\Http\Response
     */
    public function getvehicleCategory() {
       $json = [];
       
       $getVehicleTypes = DB::table('vehicles')
             ->select('vehicle_type', DB::raw('count(vehicle_id) as dCount'))->where("vehicle_status", "Active")
             ->groupBy('vehicle_type')->get();
       
       $json = ["respnose" => $getVehicleTypes];
       return response()->json($json);
        
    }
    
    
    public function getVehiclemake(Request $request){
           $json = [];
         
        if (isset($request->make)) {
             $vehicleCategory = $request->make;

          $getResult = DB::table('locations_cost')
              ->select('vehicle_make', 'vehicle_type', DB::raw('count(vehicle_make) as total'))
              ->where("vehicle_type", $vehicleCategory)->groupBy('vehicle_make')->get();
          
           $json = ["respnose" => $getResult];
         
        }
        return response()->json($json);
    }

    
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\AuthenticateLogin  $authenticateLogin
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthenticateLogin $authenticateLogin) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\AuthenticateLogin  $authenticateLogin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuthenticateLogin $authenticateLogin) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AuthenticateLogin  $authenticateLogin
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuthenticateLogin $authenticateLogin) {
        //
    }
    
    public function norights(){
        
        return view('template/norights'); 
    }

}
