<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Nasabah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;

class AuthController extends Controller
{
    //fungsi untuk login api android
    public function login(LoginRequest $req)
    {
    	$credential = ["email" => $req->email, "password" => $req->password];

    	if (Auth::guard('nasabah')->once($credential)) {
    		$token = base64_encode(str_random(64));
    		
    		$user = Nasabah::where('email', $req->email)->first();
    		$user->token = $token;

    		if ($user->save()) {
    			return response()->json([
    				"message" 	=> "OKE!",
    				"status" 	=> 200,
    				"data" 		=> [
    					"token" => $token
    				]
    			]);
    		}

    		return response()->json([
    			"message" 	=> "oops.. looks like something went wrong",
    			"status" 	=> 500,
    			"data" 		=> []
    		]);
    	}

    	return response()->json([
    		"message" 	=> "wrong username or password",
    		"status" 	=> 304,
    		"data" 		=> []
    	]);
    }
}
