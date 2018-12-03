<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //ini untuk tampilan user > home
    public function index()
    {
    	return view('layouts.user.home');
    }

    public function contact()
    {
    	return view('layouts.user.contact');
    }

    public function profile()
    {
    	return view('layouts.user.profile');
    }

    public function sukuBunga()
    {
    	return view('layouts.user.sukuBunga');
    }
}
