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
}
