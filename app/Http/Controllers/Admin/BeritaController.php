<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;

class BeritaController extends Controller
{
    //tampilkan view layout berita
    public function index()
    {
        $content = Content::orderBy('created_at', 'desc')->paginate(18);
        return view('layouts.admin.contentUser.list', ['contents' => $content]);
    }

  
    //tampilkan view layout detail berita
    public function detailBerita($id)
    {
        $content = Content::find($id);
        return view('layouts.admin.contentUser.detail', ['content' => $content]);
    }
   
}
