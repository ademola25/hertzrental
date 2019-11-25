<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
     public $successStatus = 200;
     
    private $SMS_SENDER = "Cileasing";
    private $RESPONSE_TYPE = 'json';
    private $SMS_USERNAME = 'cileasinginfotech@gmail.com';
    private $SMS_PASSWORD = 'flower12345';
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

        $Users = DB::table('users')->where('cid', $cid)->get();
        if($Users){
            return response()->json(["success" => UserResource::collection($Users)]);  //TripResource::collection($getResult) 
        }else{
            return response()->json(["error" => "No User Found" ]); 
        }
    }
    
    
    public function adduserCompany(Request $request){
        
        $cookie = isset($_COOKIE['access_token']) ? $_COOKIE['access_token'] : null;
       
        $b = new Functions();
        $isuccess = $b::checkAccess($cookie);
        $data = $isuccess->getData();
        
        $cid = $data->cid;
       
        $random = rand(1111111,9999999);
        
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'required',
                    'phone_number' => 'required',
                    'c_password' => 'required|same:password',
        ]);
        
       
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['cid'] = $cid;
        $input['random_num'] = $random;
        //rand(10,100));
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
        
        $sms = "Your OTP is ". $random;
        
        $smsSent = $this->initiateSmsActivation($request->phone_number, $sms); 
        
        return response()->json(['success' => $success, 'OTP' => $sms], $this->successStatus);
    }
    
    
    
    
     public function initiateSmsActivation($phone_number, $message) {
        $isError = 0;
        $errorMessage = true;

        //Preparing post parameters
        $postData = array(
                    'username' => $this->SMS_USERNAME,
                    'password' => $this->SMS_PASSWORD,
                    'message' => $message,
                    'sender' => $this->SMS_SENDER,
                    'mobiles' => $phone_number,
                    'response' => $this->RESPONSE_TYPE
        );

        //$url = "http://portal.bulksmsnigeria.net/api/"; // portal.nigeriabulksms.com
         $url = "http://portal.nigeriabulksms.com/api/"; 
         
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
        ));


        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        //get response
        $output = curl_exec($ch);


        //Print error if any

        if (curl_errno($ch)) {
            $isError = true;
            $errorMessage = curl_error($ch);
        }
        curl_close($ch);



        if ($isError) {

            return array('error' => 1, 'message' => $errorMessage);
        } else {

            return array('error' => 0);
        }
    }
    
}
