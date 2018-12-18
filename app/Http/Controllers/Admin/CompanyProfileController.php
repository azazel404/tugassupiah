<?php

namespace App\Http\Controllers\Admin;

use App\CompanyProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyProfileController extends Controller
{
    //
    public function editCompanyProfile()
    {
        $companyProfile = CompanyProfile::find(1);
        return view('layouts.admin.profile.edit', ['company_profile' => $companyProfile]);
    }
}
