<?php

namespace App\Http\Controllers\Api;

use App\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PengaduanRequest;

class PengaduanController extends Controller
{
    //
    public function createPengaduan(PengaduanRequest $req)
    {
        $pengaduan = new Pengaduan;
        $pengaduan->name = $req->name;
        $pengaduan->telephone = $req->telephone;
        $pengaduan->email = $req->email;
        $pengaduan->message = $req->message;

        if (!$pengaduan->save()) {
            return response()->json([
                "message"   => "opss.. looks like something went wrong",
                "status"    => 501,
                "data"      => []
            ]);
        }

        return response()->json([
            "message"   => "OKE!",
            "status"    => 200,
            "data"      => []
        ]);
    }
}
