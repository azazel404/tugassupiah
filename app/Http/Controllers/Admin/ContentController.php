<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    //
    public function addContent()
    {
        return view('layouts.admin.content.add');
    }
}
