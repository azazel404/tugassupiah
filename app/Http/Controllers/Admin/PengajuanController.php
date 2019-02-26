<?php

namespace App\Http\Controllers\Admin;

use App\Pengajuan;
use App\TipeKredit;
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

    public function listTipeKredit()
    {
        $tipeKredit = TipeKredit::orderBy('name', 'ASC')->paginate(18);
        return view('layouts.admin.pengajuan.tipeKredit.list', [
            'tipeKredits' => $tipeKredit
        ]);
    }

    public function createTipeKredit(Request $req)
    {
        $tipeKredit = new TipeKredit;
        $tipeKredit->name = $req->name;
        $tipeKredit->save();

        return back();
    }

    public function editTipeKredit(Request $req)
    {
        $tipeKredit = TipeKredit::findOrFail($req->id);
        $tipeKredit->name = $req->name;
        $tipeKredit->save();

        return back();
    }

    public function deleteTipeKredit(Request $req)
    {
        $tipeKredit = TipeKredit::findOrFail($req->id);
        $tipeKredit->delete();

        return back();
    }
}
