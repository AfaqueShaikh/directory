<?php

namespace App\Http\Controllers;

use Datatables;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\AppUser;
use App\Modules\Areas\Models\Area;

class ApiController extends Controller
{
    // Store Applications


    public function userLogin(Request $request)
    {


        $user = AppUser::where("mobile", $request->mobile)->first();

        if (!$user) {
            return response()->json(["message" => "Account not found with this mobile.", "success" => false], 200);
        }

         $user->api_token =  $this->random_strings(100);
         $fourRandomDigit = mt_rand(1000,9999);
         $user->otp_verfied = '0';
         $user->otp = $fourRandomDigit;
         $user->save();

         return ["message"=> "Success.","status"=> "success",'data'=>[["otp"=>$fourRandomDigit, "token" => $user->api_token]]];
    }



    public function verifyOtp(Request $request)   {

        $user = AppUser::where('mobile',$request->mobile)
              ->where('otp', $request->otp)
              ->first();

        if($user)
        {
           $user->otp_verfied = '1';
           $user->save();
           return ["message"=> "Success.","status"=> "success",'data'=>[["user_data"=>$user]]];
        }else{
              return ["message"=> "Otp not matched.","status"=> "error",'data'=>[]];
        }
     }




     public function resendOtp(Request $request)   {

        $user = AppUser::where('mobile',$request->mobile)->first();

        if($user)
        {
           $fourRandomDigit = mt_rand(1000,9999);
           $user->otp_verfied = '0';
           $user->otp = $fourRandomDigit;
           $user->save();

           return ["message"=> "Success.","status"=> "success",'data'=>[["otp"=>$fourRandomDigit]]];
        }else{
              return ["message"=> "Phone number not registered.","status"=> "error",'data'=>[]];
        }
     }

    public function random_strings($length_of_string)
    {

        // md5 the timestamps and returns substring
        // of specified length
        return substr(md5(time()), 0, 100);
    }



    public function register(Request $request)
    {


        $user = AppUser::where('mobile',$request->mobile)->first();

        if($user)
        {
            return ["message"=> "Mobile number already exist.","status"=> "error",'data'=>[]];
        }

        $user = new AppUser();
        $user->name = $request->full_name;
        $user->mobile = $request->mobile;
        $user->status = $request->status;
        $user->address_1 = $request->address_1;
        $user->address_2 = $request->address_2;
        $user->business_address = $request->business_address;
        $user->business_name = $request->business_name;
        $user->save();

          return ["message"=> "Success.","status"=> "success",'data'=>[["user_data"=>$user]]];
    }



 public function getUserProfile(Request $request){
    $user = AppUser::where('mobile',$request->mobile)->first();
    return ["message"=> "Success.","status"=> "success",'data'=>[["user_data"=>$user]]];
 }

 public function getAreas(Request $request){
    $data = Area::all();
    return ["message"=> "Success.","status"=> "success",'data'=>[["areas"=>$data]]];
 }






}
