<?php

namespace App\Http\Controllers\User;

use App\Content;
use App\Category;
use App\CategoryItem;
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
        $category = CategoryItem::find($category_item_id);
        $content = Content::where('category_item_id', $category_item_id)->get();
        return view('layouts.user.content.list', [
            'categoryName'  => $category->name,
            'contents'      => $content,
            'categories'    => $this->categories
        ]);
    }

    public function getDetailContent($slug)
    {
        $content = Content::where('slug', $slug)->first();
        return view('layouts.user.content.detail', [
            'content' => $content, 
            'categories'    => $this->categories
        ]);
    }

    public function contentNotFound()
    {
        return view('layouts.error.404', [
            'categories'    => $this->categories,
        ]);
    }
}
