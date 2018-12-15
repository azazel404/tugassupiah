<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Pengaduan;
use App\Pengajuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PengaduanRequest;
use App\Http\Requests\PengajuanRequest;

class ServiceController extends Controller
{
    //
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('layouts.user.service', ['categories' => $categories]);
    }

    public function createPengaduan(PengaduanRequest $req)
    {
        $pengaduan = new Pengaduan;
        $pengaduan->name = $req->name;
        $pengaduan->telephone = $req->telephone;
        $pengaduan->email = $req->email;
        $pengaduan->message = $req->message;

        if (!$pengaduan->save()) {
            return back()->with('error', 'something went wrong');
        }

        return back()->with('message', 'Oke pengaduan anda telah di submit');
    }

    public function createPengajuan(PengajuanRequest $req)
    {
        $pengajuan = new Pengajuan;
        $pengajuan->name = $req->name;
        $pengajuan->telephone = $req->telephone;
        $pengajuan->email = $req->email;
        $pengajuan->address = $req->address;

        if (!$pengajuan->save()) {
            return back()->with('error', 'something went wrong');
        }

        return back()->with('message', 'Oke pengajuan anda telah di submit');
    }
}
