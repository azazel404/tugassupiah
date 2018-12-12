<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;

class ContentController extends Controller
{
    //
    public function addContent()
    {
        return view('layouts.admin.content.add');
    }

    public function createContent(ContentRequest $req)
    {
        $content = new Content;
        $cover = $req->cover->store('public/cover');
        $content->title = $req->title;
        $content->cover = basename($cover);
        $content->content = $req->content;
        $content->save();
    }
}
