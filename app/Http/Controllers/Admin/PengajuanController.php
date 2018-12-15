<?php

namespace App\Http\Controllers\Admin;

use App\Pengajuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengajuanController extends Controller
{
    //
    public function index()
    {
        $pengajuan = Pengajuan::orderBy('created_at', 'desc')->paginate(18);
        return view('layouts.admin.pengajuan.list', ['pengajuans' => $pengajuan]);
    }

    public function deletePengajuan($id)
    {
        $pengajuan = Pengajuan::find($id);

        if (!$pengajuan->delete()) {
            return back()->with('error', 'something went wrong');
        }

        return back();
    }
}
