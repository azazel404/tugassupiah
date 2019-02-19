<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Content;
use App\CompanyProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyProfileController extends Controller
{
    //
    public function index()
    {
        $companyProfile = CompanyProfile::findOrFail(1);
        $categories = Category::orderBy('created_at', 'desc')->get();
        $content = Content::orderBy('created_at', 'desc')->limit(5);

        return view('layouts.user.profile', [
            'company_profile'   => $companyProfile,
            'categories'        => $categories,
            'contents'          => $content
        ]);
    }
}
