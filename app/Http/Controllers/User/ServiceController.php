<?php

namespace App\Http\Controllers\User;

use App\Content;
use App\Category;
use App\Pengaduan;
use App\Pengajuan;
use App\PengajuanTabungan;
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
        $pengajuanTabungan = PengajuanTabungan::orderBy('name', 'asc')->paginate(12);
        $content = Content::orderBy('created_at', 'desc')->limit(5);
        return view('layouts.user.service', [
            'categories'            => $categories,
            'pengajuanTabungans'    => $pengajuanTabungan,
            'contents'              => $content
        ]);
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

        return back()->with('message', 'pengaduan anda telah di submit');
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

        return back()->with('message', ' pengajuan anda telah di submit');
    }
}
