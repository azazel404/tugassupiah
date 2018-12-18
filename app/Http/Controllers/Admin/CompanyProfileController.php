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

    public function updateCompanyProfile(Request $req)
    {
        $companyProfile = CompanyProfile::find(1);
        $companyProfile->content = $req->content;

        if (!$companyProfile->save()) {
            return back()->with('error', ['something went wrong']);
        }

        return back()->with('message', 'profile perushaan berhasil di update');
    }
}
