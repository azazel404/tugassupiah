<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;

class ContentController extends Controller
{
    //
    public function index()
    {
        $content = Content::orderBy('created_at', 'desc')->paginate(18);
        return view('layouts.admin.content.list', ['contents' => $content]);
    }

    public function addContent()
    {
        return view('layouts.admin.content.add');
    }

    public function createContent(ContentRequest $req)
    {
        $content = new Content;
        $content->title = $req->title;
        $content->slug = str_slug($req->title);
        $content->content = $req->content;
        $cover = time().".".$req->cover->getClientOriginalExtension();
        $content->cover = $cover;
        $req->cover->move(public_path('img/blog'), $cover);

        if (!$content->save()) {
            return back()->with('error', 'something went wrong');
        }

        return redirect()->route('admin.content');
    }

    public function editContent($id)
    {
        $content = Content::find($id);
        return view('layouts.admin.content.edit', ['content' => $content]);
    }

    public function updateContent(Request $req, $id)
    {
        $content = Content::find($id);
        $content->title = $req->title;
        $content->slug = str_slug($req->title);
        $content->content = $req->content;

          if (isset($req->cover)) {
            $cover = time().".".$req->cover->getClientOriginalExtension();
            $content->cover = $cover;
            $req->cover->move(public_path('img/blog'), $cover);
        }

        if (!$content->save()) {
            return back()->with('error', 'something went wrong');
        }

        return redirect()->route('admin.content');
    }

    public function deleteContent($id)
    {
        $content = Content::find($id);

        if (!$content->delete()) {
            return back()->with('error', 'something went wrong');
        }

        if (!Storage::delete('public/cover/' . $content->cover)) {
            return back()->with('error', 'something went wrong');
        }

        return back();
    }
}
