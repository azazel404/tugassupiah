<?php

namespace App\Http\Controllers\User;

use App\Content;
use App\Category;
use App\CompanyProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MobileContentController extends Controller
{
    //
    public function getCompanyProfile()
    {
        $content = CompanyProfile::find(1);
        return view('layouts.mobile.content', ['content' => $content]);
    }

    public function getAllProduct()
    {
        $category = Category::where('name', 'like', '%' . 'produk' . '%')->first();
        // return $category;
        $content = Content::where('category_id', $category->id)->get();

        return view('layouts.mobile.list', ['contents' => $content]);
    }

    public function getDetailContent($id)
    {
        $content = Content::find($id);
        return view('layouts.mobile.content', ['content' => $content]);
    }
}
