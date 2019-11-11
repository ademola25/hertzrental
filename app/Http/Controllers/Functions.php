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
          
          
          //$matchResult = ['id' => $user_token, 'revoked' => '0'];
          //$user_id = DB::table('oauth_access_tokens')->where("id", $user_token, "revoked", '0')->value('user_id');
          
          $moduleUnitapprsqlR = "SELECT user_id FROM oauth_access_tokens WHERE `id` = '".$user_token."' AND `revoked` = '0' ";
          $user_id = collect(DB::update(DB::raw($moduleUnitapprsqlR)));
          
          if($user_id){
          $cid = DB::table('users')->where('id', $user_id)->value('cid');
          $company_name = DB::table('companies')->where('companies_id', $cid)->value('company_name');
          $DB_token = DB::table('oauth_access_tokens')->where('id', $user_token)->value('id');
          $userDetail = DB::table('oauth_access_tokens')->where('id', $user_token)->value('name');
          $revoked = DB::table('oauth_access_tokens')->where('id', $user_token)->value('revoked'); 
          }
         
          
          
          $json = ["cid" =>$cid, "revoked" =>$revoked,  "company_name" => $company_name, "token" => $user_token, "user_detail" => $userDetail];
          return response()->json($json);
          
    }
}
