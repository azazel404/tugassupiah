<?php

namespace App\Http\Controllers\Api;

use App\Pengajuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PengajuanRequest;

class PengajuanController extends Controller
{
    //
    public function createPengajuan(PengajuanRequest $req)
    {
        $pengajuan = new Pengajuan;
        $pengajuan->name = $req->name;
        $pengajuan->telephone = $req->telephone;
        $pengajuan->email = $req->email;
        $pengajuan->address = $req->address;

        if (!$pengajuan->save()) {
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
