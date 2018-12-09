<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
	//fungsi untuk menampilkan form login
	public function showLoginForm()
	{
		return view('layouts.auth.login');
	}

    //fungsi untuk login admin
    public function login(LoginRequest $req)
    {
    	$credential = ["email" => $req->email, "password" => $req->password];
    	if (Auth::guard('admin')->attempt($credential)) {
    		return redirect()->route('admin.dashboard');
    	}
    	return back()->with('error', 'wrong email or password');

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}
