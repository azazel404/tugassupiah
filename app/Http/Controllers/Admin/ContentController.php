<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use App\CategoryItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;

class ContentController extends Controller
{
    //
    public function addContent()
    {
        $category_item = CategoryItem::orderBy('name', 'asc')->get();
        return view('layouts.admin.content.add', ['category_items' => $category_item]);
    }

    public function createContent(ContentRequest $req)
    {
        $content = new Content;
        $cover = $req->cover->store('public/cover');
        $content->title = $req->title;
        $content->slug = str_slug($req->title);
        $content->category_item_id = $req->category_item_id;
        $content->cover = basename($cover);
        $content->content = $req->content;
        $content->save();
    }
}
