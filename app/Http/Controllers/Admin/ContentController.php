<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\Content;
use App\Category;
use App\CategoryItem;
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
        $category = Category::orderBy('name', 'asc')->get();

        return view('layouts.admin.content.add', ['categories' => $category,]);
    }

    public function createContent(ContentRequest $req)
    {
        $content = new Content;
        $cover = $req->cover->store('public/cover');
        $content->title = $req->title;
        $content->slug = str_slug($req->title);
        $content->category_id = $req->category_id;
        $content->category_item_id = $req->category_item_id;
        $content->cover = basename($cover);
        $content->content = $req->content;

        if (!$content->save()) {
            return back()->with('error', 'something went wrong');
        }

        return redirect()->route('admin.content');
    }

    public function editContent($id)
    {
        $content = Content::find($id);
        $category_item = CategoryItem::orderBy('name', 'asc')->get();
        return view('layouts.admin.content.edit', ['content' => $content, 'category_items' => $category_item]);
    }

    public function updateContent(ContentRequest $req, $id)
    {
        $content = Content::find($id);
        $content->title = $req->title;
        $content->slug = str_slug($req->title);
        $content->category_id = $req->category_id;
        $content->category_item_id = $req->category_item_id;
        $content->content = $req->content;

        if ($req->hasFile('cover')) {
            Storage::delete('public/cover/' . $content->cover);
            $cover = $req->cover->store('public/cover');
            $content->cover = basename($cover);
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
