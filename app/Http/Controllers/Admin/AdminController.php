<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
    	return view('layouts.admin.dashboard');
    }

    public function marketing()
    {
    	return view('layouts.admin.marketing.list');
    }

    public function editMarketing($value='')
    {
    	return view('layouts.admin.marketing.edit');
    }

    public function sukuBunga()
    {
    	return view('layouts.admin.sukuBunga.list');
    }

    public function editSukuBunga()
    {
    	return view('layouts.admin.sukuBunga.edit');
    }

    public function category()
    {
    	return view('layouts.admin.category.list');
    }

    public function editCategory()
    {
    	return view('layouts.admin.category.edit');
    }

    public function pengaduan()
    {
    	return view('layouts.admin.pengaduan.list');
    }
    public function pengajuan()
    {
    	return view('layouts.admin.pengajuan.list');
    }

    public function nasabah()
    {
    	return view('layouts.admin.nasabah.list');
    }

    public function addNasabah()
    {
    	return view('layouts.admin.nasabah.add');
    }

    public function adminAccount()
    {
        return view('layouts.admin.adminAccount.list');
    }
}
