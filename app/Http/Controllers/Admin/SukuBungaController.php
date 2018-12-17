<?php

namespace App\Http\Controllers\Admin;

use App\SukuBunga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SukuBungaRequest;

class SukuBungaController extends Controller
{
    //
    public function index()
    {
        $sukuBunga = SukuBunga::orderBy('name', 'asc')->paginate(18);
        return view('layouts.admin.sukuBunga.list', ['sukuBungas' => $sukuBunga]);
    }

    public function addSukuBunga()
    {
        return view('layouts.admin.sukuBunga.add');
    }

    public function createSukuBunga(SukuBungaRequest $req)
    {
        $sukuBunga = new SukuBunga;
        $sukuBunga->name = $req->name;
        $sukuBunga->value = $req->value;

        if (!$sukuBunga->save()) {
            return back()->with('error', 'opps.. someting went wrong');
        }

        return redirect()->route('admin.sukuBunga');
    }

    public function editSukuBunga($id)
    {
        $sukuBunga = SukuBunga::find($id);
        return view('layouts.admin.sukuBunga.edit', ['sukuBunga' => $sukuBunga]);
    }

    public function updateSukuBunga(SukuBungaRequest $req, $id)
    {
        $sukuBunga = SukuBunga::find($id);
        $sukuBunga->name = $req->name;
        $sukuBunga->value = $req->value;

        if (!$sukuBunga->save()) {
            return back()->with('error', 'something went wrong');
        }

        return redirect()->route('admin.sukuBunga');
    }

    public function deleteSukuBunga($id)
    {
        $sukuBunga = SukuBunga::find($id);

        if (!$sukuBunga->delete()) {
            return back()->with('error', 'something went wrong');
        }

        return back();
    }
}
