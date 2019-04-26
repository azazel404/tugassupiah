<?php

namespace App\Http\Controllers\Admin;

use FastExcel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NasabahController extends Controller
{
    public function index()
    {
    	return view('layouts.admin.nasabah.list');
    }

    public function showUpdateDataNasabah()
    {
        return view('layouts.admin.nasabah.updateData.index');
    }

    public function onUpdateDataNasabah(Request $req)
    {
        if ($req->hasFile("excel")) {
            $data = FastExcel::import($req->file('excel'));
            return $data;
        }else{
            return back()->with("message", "tidak ada file excel yang dipilih");
        }
    }
}
