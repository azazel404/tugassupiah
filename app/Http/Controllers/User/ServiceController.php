<?php

namespace App\Http\Controllers\User;

use App\Pengaduan;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PengaduanRequest;

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
}
