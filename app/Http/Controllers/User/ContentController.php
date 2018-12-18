<?php

namespace App\Http\Controllers\User;

use App\Content;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    //
    private $categories;
    public function __construct()
    {
        $this->categories = Category::orderBy('created_at', 'desc')->get();
    }

    public function getContentByCategory($category_id)
    {
        $category = Category::find($category_id);
        $content = Content::where('category_id', $category_id)->get();

        return view('layouts.user.content.list', [
            'categoryName'  => $category->name,
            'contents'      => $content,
            'categories'    => $this->categories
        ]);
    }

    public function getContentByCategoryItem($category_item_id)
    {
        $content = Content::where('category_item_id', $category_item_id)->get();
        return view('layouts.user.content.list', [
            'contents'      => $content,
            'categories'    => $this->categories
        ]);
    }
}
