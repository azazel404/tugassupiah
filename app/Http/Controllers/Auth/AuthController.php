<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
	//fungsi untuk menampilkan form login
	public function FunctionName()
	{
		return view('layouts.auth.login');
	}

    //fungsi untuk login admin
    public function login(LoginRequest $req)
    {
    	$credential = ["email" => $req->email, "password" => $req->password];
    	if (Auth::guard('admin')->attempt($credential)) {
    		return "berhasil login admin";
    	}
    	return "email atau password salah";

    }
}
