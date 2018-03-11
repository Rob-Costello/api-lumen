<?php

Namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;
 use App\User;
 

class UsersController extends Controller{
	//api post login to /api/login

	public function authenticate(Request $request){
		//need to save api_key to cookie for mobile app

 
       $this->validate($request, [
       'email' => 'required',
       'password' => 'required'
        ]);
 
      $user =DB::table('users')->where('email', $request->input('email'))->first();
     	
     	if(Hash::check($request->input('password'), $user->password)){
          $apikey = base64_encode(str_random(40));
           $user =DB::table('users')->where('email', $request->input('email'))->update(['api_key' => "$apikey"]);;
          return response()->json(['status' => 'success','api_key' => $apikey]);
      	}
      	else{
          return response()->json(['status' => 'fail'],401);
      	}
 
   }

//regiser user with post request to /api/regiser
   public function register(Request $request){
   		 //need to sanitise input

   		$email = $request->input('email');
   		$user = $request->input('user');
   		$password  = Hash::make($request->input('password'));
   		DB::table('users')->insert(['email' => $email, 'username' => $user, 'password' => $password]);
   		return response()->json(['status' => 'success'],200);
   }


}