<?php

namespace App\Http\Controllers\Admin;

use App\Marketing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MarketingRequest;

class MarketingController extends Controller
{
    //
    public function index()
    {
    	$marketing = Marketing::orderBy('name', 'asc')->paginate(18);
    	return view('layouts.admin.marketing.list', ['marketings' => $marketing]);
    }

    public function addMarketing()
    {
    	return view('layouts.admin.marketing.add');
    }

    public function createMarketing(MarketingRequest $req)
    {
    	$marketing = new Marketing;
    	$marketing->name = $req->name;
    	$marketing->telepon = $req->telepon;

    	if (!$marketing->save()) {
    		return back()->with('error', 'something went wrong');
    	}

    	return redirect()->route('admin.marketing');
    }

    public function editMarketing($id)
    {
        $marketing = Marketing::find($id);
        return view('layouts.admin.marketing.edit', ['marketing' => $marketing]);
    }

    public function updateMarketing(MarketingRequest $req, $id)
    {
        $marketing = Marketing::find($id);
        $marketing->name = $req->name;
        $marketing->telepon = $req->telepon;

        if (!$marketing->save()) {
            return back()->with('error', 'something went wrong');
        }

        return redirect()->route('admin.marketing');
    }

    public function deleteMarketing($id)
    {
        $marketing = Marketing::find($id);
        if (!$marketing->delete()) {
            return back()->with('error', 'something went wrong');
        }

        return redirect()->route('admin.marketing');
    }
}
