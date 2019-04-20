<?php

namespace App\Http\Controllers\Api;

use Auth;
use Hash;
use App\Nasabah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;

class AuthController extends Controller
{
    //fungsi untuk login api android
    public function login(LoginRequest $req)
    {
        $nasabah = Nasabah::whereEmail($req->email)->first();

        if ($nasabah && Hash::check($req->password, $nasabah->password)) {
            $token = base64_encode(str_random(64));
            $nasabah->api_token = $token;

            if ($nasabah->save()) {
                return response()->json([
                    "message"   => "OKE!",
                    "status"    => 200,
                    "data"      => [
                        "api_token" => $token
                    ]
                ]);
            }
        }

    	return response()->json([
    		"message" 	=> "wrong username or password",
    		"status" 	=> 304,
    		"data" 		=> []
    	]);
    }
}
