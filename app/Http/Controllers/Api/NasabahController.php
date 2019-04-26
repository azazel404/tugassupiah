<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NasabahController extends Controller
{
    public function test()
    {
    	return response()->json(["message" => "oke"]);
    }

    public function getNasabahDetail(Request $req)
    {
        $user = $req->user();
        return response()->json([
            "message" => "OKE!",
            "status" => 200,
            "data" => $user
        ]);
    }
}
