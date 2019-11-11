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
//use Auth;

class AuthenticateLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    protected function guard()
    {
        return Auth::guard('api');
    }

    public function index()
    {
        //
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
    
    public $successStatus = 200;
     
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
           
        ]);
        
         $credentials = request(['email', 'password']);
         
          if (!Auth::attempt($credentials))
            return response()->json([ 'message' => 'Unauthorized' ], 401);
         
          $user =  $request->user();
         
         
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
         
          /*
          $auth_header = explode(' ', $token_result);
          $itoken = $auth_header[0];
          $token_parts = explode('.', $itoken);
          $token_header = $token_parts[0];
          $token_header_json = base64_decode($token_header);
          $token_header_array = json_decode($token_header_json, true);
          $user_token = $token_header_array['jti'];
          $matchResult = ['id' => $user_token, 'revoked' => 0];
          $user_id = DB::table('oauth_access_tokens')->where($matchResult)->value('user_id');
          $cid = DB::table('users')->where('id', $user_id)->value('cid');
          $company_name = DB::table('companies')->where('companies_id', $cid)->value('company_name');
          */
          /////////////////////////////////Implementing decoding the token ////////////////////////////
            
         //setcookie(    $name, $value, $expire, $path, $domain, $secure, $httponly ) 
         $serverCookie = setcookie("access_token", $tokenResult->accessToken, time()+3600, null, null, null,  TRUE);
         
          return response()->json([
                    'success' => $this->successStatus,
                    'cid' => $data->cid,
                    'company_name' => $data->company_name,
                    //'Authorization' => $tokenResult->accessToken,
                    'Authorization' => $serverCookie,
                    'token_type' => 'Bearer',
                    'expires_at' => Carbon::parse( $tokenResult->token->expires_at)->toDateTimeString()
        ]);
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
    
    
    
    
    public function ilogout(Request $request){
        if (!$this->guard()->check()) {
            return response([
                'message' => 'No active user session was found'
            ], 404);
        }

        // Taken from: https://laracasts.com/discuss/channels/laravel/laravel-53-passport-password-grant-logout
        $request->user('api')->token()->delete();

        Auth::guard()->logout();

        Session::flush();

        Session::regenerate();

        
        return response([
            'message' => 'User was logged out'
        ]);
    }
    /*
    public function guzzleLogin(Request $request){
        
        $http = new \GuzzleHttp\Client();
        try {
            $response = $http->post('http://localhost:8000/oauth/token' , [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => 2,
                    'client_secret' => 'gLFF22s4VAcii51PkLOqLpxrbg6K6FTip0fuAJPJ',
                    'email' => $request->email,
                    'password' => $request->password,
                ]
            ]);
            
            return $response->getBody();
        } catch (\GuzzleHttp\Exception\BadResponseException $a) {
            if($a->getCode() == 400){
               return response()->json('Invalid Request, Please enter a username or a passord', $a->getCode()); 
            }else if($a->getCode() == 401) {
               return response()->json('Your Credentials are incorrent, Please try again', $a->getCode()); 
            }
            
             return response()->json('Something Went Wrong on the server', $a->getCode()); 
        }
    }
    */
    /**
     * Display the specified resource.
     *
     * @param  \App\Model\AuthenticateLogin  $authenticateLogin
     * @return \Illuminate\Http\Response
     */
    public function show(AuthenticateLogin $authenticateLogin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\AuthenticateLogin  $authenticateLogin
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthenticateLogin $authenticateLogin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\AuthenticateLogin  $authenticateLogin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuthenticateLogin $authenticateLogin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AuthenticateLogin  $authenticateLogin
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuthenticateLogin $authenticateLogin)
    {
        //
    }
}
