<?php

namespace App\Http\Controllers\Admin;


use Storage;
use App\Materi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MateriRequest;

class MateriController extends Controller
{
    //tampilkan view layout materi
    public function index()
    {
    	$materi = Materi::orderBy('title', 'asc')->paginate(18);
    	return view('layouts.admin.materi.list', ['materies' => $materi]);
    }

    //tampilkan view layout add materi
    public function addMateri()
    {
    	return view('layouts.admin.materi.add');
    }

    //eksekusi fitur create materi
    public function createMateri(MateriRequest $req)
    {
    	$materi = new Materi;
    	$materi->title = $req->title;
        $materi->description = $req->description;
        $materi->jurusan = $req->jurusan;
        $filemateri = $req->filemateri->getClientOriginalName();
        $materi->filemateri = $filemateri;
        $req->filemateri->move(public_path('img/materi/'), $filemateri);

    	if (!$materi->save()) {
    		return back()->with('error', 'something went wrong');
    	}

    	return redirect()->route('admin.materi');
    }

    //tampilkan view layout edit materi
    public function editMateri($id)
    {
        $materi = Materi::find($id);
        return view('layouts.admin.materi.edit', ['materi' => $materi]);
    }

    //eksekusi fitur update materi
    public function updateMateri(MateriRequest $req, $id)
    {
        $materi = Materi::find($id);
        $materi->title = $req->title;
        $materi->jurusan = $req->jurusan;
        $materi->description = $req->description;
        
           if (isset($req->filemateri)) {
            $filemateri = $req->filemateri->getClientOriginalName();
            $materi->filemateri = $filemateri;
            $req->filemateri->move(public_path('img/materi/'), $materi);
        }

        if (!$materi->save()) {
            return back()->with('error', 'something went wrong');
        }

        return redirect()->route('admin.materi');
    }

    //delete materi
    public function deleteMateri($id)
    {
        $materi = Materi::find($id);
        if (!$materi->delete()) {
            return back()->with('error', 'something went wrong');
        }

        return redirect()->route('admin.materi');
    }
}
