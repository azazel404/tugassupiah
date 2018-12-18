<?php

namespace App\Http\Controllers\User;

use App\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    //
    public function getContentByCategoryItem($category_item_id)
    {
        $content = Content::where('category_item_id', $category_item_id)->get();
        return view('layouts.user.content.list', ['contents' => $content]);
    }
}
