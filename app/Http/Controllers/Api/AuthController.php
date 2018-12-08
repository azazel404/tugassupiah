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
    		$token = str_random(64);
    		
    		$user = User::where('email', $email)->first();
    	}

    	return response()->json([
    		"message" 	=> "wrong username or password",
    		"status" 	=> 304,
    		"data" 		=> []
    	]);
    }
}
