<?php

namespace App\Http\Controllers\User;

use App\Content;
use App\Materi;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    //index page home pertama
    public function index()
    {
        $content = Content::orderBy('created_at','desc')->limit(3)->get();
    	return view('layouts.user.home', [
            'contents'=> $content,
        ]);

    }
    //nampilin semua berita informatika di home page
     public function getContentList()
        {
        $content = Content::orderBy('created_at','desc')->limit(3)->get();
        return view('layouts.user.content.list', [
            'contents'      => $content,
        ]);
        }

    //nampilin content berita dan content disamping kanan fitur berita
    public function getDetailContent($slug){
        $content = Content::where('slug', $slug)->first();
        $contents = Content::orderBy('created_at', 'desc')->limit(5)->get();
        return view('layouts.user.content.detail', [
            'content' => $content,
            'contents' => $contents
        ]);
    }

    //nampilin materi dan content sebelah kanan di fitur materi
    public function getDetailPelajaranMateri(){
        $materi = Materi::paginate(18);
        $content = Content::orderBy('created_at', 'desc')->limit(5)->get();
        return view('layouts.user.pelajaran', [
            'Materies' => $materi,
            'contents'   => $content
        ]);
    }


    //nampilini content sammping kanan di fitur calendar mahasiswa home
    public function CalendarMahasiswa(){
        $content = Content::orderBy('created_at', 'desc')->limit(5)->get();
        return view('layouts.user.calendarmahasiswa', [
            'contents'   => $content
        ]);
    }
}
