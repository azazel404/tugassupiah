<?php

namespace App\Http\Controllers\Api;

use App\SukuBunga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SukuBungaController extends Controller
{
    //
    public function getSukuBunga()
    {
        $sukuBunga = SukuBunga::orderBy('name', 'asc')->get();

        if (!$sukuBunga) {
            return respons()->json([
                'message' => 'no data avaible',
                'status' => 404,
                'data' => []
            ]);
        }

        return response()->json([
            'message' => 'OKE!',
            'status' => 200,
            'data' => $sukuBunga
        ]);
    }
}
