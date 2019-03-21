<?php

namespace App\Http\Controllers\User;

use App\Content;
use App\Category;
use App\SukuBunga;
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
        // $category = Category::where('name', 'like', '%' . 'prod' . '%')->first();
        // return $category;
        $content = Content::all();

        return view('layouts.mobile.list', ['contents' => $content]);
    }

    public function getDetailContent($id)
    {
        $content = Content::find($id);
        return view('layouts.mobile.content', ['content' => $content]);
    }

    public function getSukuBunga()
    {
        $sukuBunga = SukuBunga::paginate(18);
        return view('layouts.mobile.sukuBunga', [
            'SukuBungas' => $sukuBunga,
        ]);
    }
}
