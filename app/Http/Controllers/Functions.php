<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;

class Functions extends Controller
{
    private $failure = 400;
    
    
     public static function checkAccess($cookie){
        $user_id = "";
         $cid = "";
         $company_name = "";
         $DB_token = "";
         $userDetail = "";
         $revoked = "";
         
          $json = [];
          $auth_header = explode(' ', $cookie);
          $itoken = $auth_header[0];
          $token_parts = explode('.', $itoken);
          $token_header = $token_parts[0];
          $token_header_json = base64_decode($token_header);
          $token_header_array = json_decode($token_header_json, true);
          $user_token = $token_header_array['jti'];
          
         
         
          $moduleUnitapprsqlR = "SELECT * FROM oauth_access_tokens WHERE `id` = '".$user_token."' AND `revoked` = '0' ";
          $results = collect(DB::select(DB::raw($moduleUnitapprsqlR)));
          
          foreach($results as $get){
              $user_id =  $get->user_id;
          }
         
          if($user_id){
          $name = DB::table('users')->where('id', $user_id)->value('name');
          $email = DB::table('users')->where('id', $user_id)->value('email');
          $shared_pool_admin = DB::table('users')->where('id', $user_id)->value('shared_pool_admin');
          $phone_number = DB::table('users')->where('id', $user_id)->value('phone_number');
          $user_id = DB::table('oauth_access_tokens')->where('id', $user_token)->value('user_id');
          $cid = DB::table('users')->where('id', $user_id)->value('cid');
          $company_name = DB::table('companies')->where('companies_id', $cid)->value('company_name');
          $revoked = DB::table('oauth_access_tokens')->where('id', $user_token)->value('revoked'); 
          $driver_access = DB::table('users')->where('id', $user_id)->value('driver_access');
          $driver_id = DB::table('users')->where('id', $user_id)->value('driver_id');
          
          
          
          $json = ["name" =>$name,  "driver_access" =>$driver_access,  "driver_id"=>$driver_id, "revoked" =>$revoked, "shared_pool_admin" =>$shared_pool_admin,  "company_name"=>$company_name, "cid"=>$cid,  "phone" =>$phone_number,  "user_id" => $user_id, "token" => $user_token, "email" => $email];
        
          }else{
            $json = ["error" => 400];
             
          }
            return response()->json($json);
          
          
          
    }
}
