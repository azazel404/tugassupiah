<?php

namespace App\Http\Controllers\Admin;

use App\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaduanController extends Controller
{
    //
    public function index()
    {
        $pengaduan = Pengaduan::orderBy('created_at', 'desc')->paginate(18);
        return view('layouts.admin.pengaduan.list', ['pengaduans' => $pengaduan]);
    }

    public function deletePengaduan($id)
    {
        $pengaduan = Pengaduan::find($id);

        if (!$pengaduan->delete()) {
            return back()->with('error', 'something went wrong');
        }

        return back();
    }
}
