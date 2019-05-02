<?php

namespace App\Http\Controllers\Admin;


use Storage;
use App\Materi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MateriRequest;

class ViewMateriController extends Controller
{
    //tampilkan layout view materi
    public function index()
    {
    	$materi = Materi::orderBy('title', 'asc')->paginate(18);
    	return view('layouts.admin.materiUser.list', ['materies' => $materi]);
    }
}
