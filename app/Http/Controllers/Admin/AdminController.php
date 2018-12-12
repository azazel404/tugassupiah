<?php

namespace App\Http\Controllers\Admin;

use Hash;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAccountRequest;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
    	return view('layouts.admin.dashboard');
    }

    public function adminAccount()
    {
        $admin = Admin::orderBy('name', 'asc')->paginate(18);
        return view('layouts.admin.adminAccount.list', ['admins' => $admin]);
    }

    public function addAdminAccount()
    {

        return view('layouts.admin.adminAccount.add');
    }

    public function createAdminAccount(AdminAccountRequest $req)
    {
        $admin = new Admin;
        $admin->name = $req->name;
        $admin->email = $req->email;

        if ($req->password != $req->retype_password) {
            return back()->with('error', 'password tidak sama');
        }

        $admin->password = Hash::make($req->password);
        $admin->is_super_admin = false;
        $admin->is_active = true;

        if (!$admin->save()) {
            return back()->with('error', 'something went wrong');
        }

        return redirect()->route('admin.manage-account.admin');
    }

    public function editAdminAccount($id)
    {
        $admin = Admin::find($id);
        return view('layouts.admin.adminAccount.edit', ['admin' => $admin]);
    }

    public function updateAdminAccount(AdminAccountRequest $req, $id)
    {
        $admin = Admin::find($id);
        $admin->name = $req->name;
        $admin->email = $req->email;

        if (!$admin->save()) {
            return back()->with('error', 'something went wrong');
        }

        return redirect()->route('admin.manage-account.admin');
    }

    public function bannedAdminAccount($id)
    {
        $admin = Admin::find($id);
        $admin->is_active = false;

        if(!$admin->save() || $admin->is_super_admin == true) {
            return back()->with('error', 'something went wrong');
        }

        return back()->with('message', 'akun ' . $admin->email . ' telah dibanned');
    }

    public function activateAdminAccount($id)
    {
        $admin = Admin::find($id);
        $admin->is_active = true;

        if(!$admin->save() || $admin->is_super_admin == true) {
            return back()->with('error', 'something went wrong');
        }

        return back()->with('message', 'akun ' . $admin->email . ' telah diaktifkan');
    }
}
