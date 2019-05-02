<?php

namespace App\Http\Controllers\Admin;

use Hash;
use App\Admin;//ngambil viel model table admin
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAccountRequest;

class AdminController extends Controller
{
    

    //tampilkan layout view dashboard
    public function dashboard()
    {
    	return view('layouts.admin.dashboard');
    }

    //tampilkan layout view admin
    public function adminAccount()
    {
        $admin = Admin::orderBy('name', 'asc')->paginate(18);
        return view('layouts.admin.adminAccount.list', ['admins' => $admin]);
    }

    //tampilkan view layout adminaccount
    public function addAdminAccount()
    {

        return view('layouts.admin.adminAccount.add');
    }

    //eksekusi fitur create admin
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

    //tampilkan layout edit admin
    public function editAdminAccount($id)
    {
        $admin = Admin::find($id);
        return view('layouts.admin.adminAccount.edit', ['admin' => $admin]);
    }

    //eksekusi fitur admin account
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

    //banned akun 
    public function bannedAdminAccount($id)
    {
        $admin = Admin::find($id);
        $admin->is_active = false;

        if(!$admin->save() || $admin->is_super_admin == true) {
            return back()->with('error', 'something went wrong');
        }

        return back()->with('message', 'akun ' . $admin->email . ' telah dibanned');
    }

    //aktifin akun ke super admin
    public function activateAdminAccount($id)
    {
        $admin = Admin::find($id);
        $admin->is_active = true;

        if(!$admin->save() || $admin->is_super_admin == true) {
            return back()->with('error', 'something went wrong');
        }

        return back()->with('message', 'akun ' . $admin->email . ' telah diaktifkan');
    }

    public function deleteAccount($id)
    {
        $admin = Admin::find($id);
        if (!$admin->delete()) {
            return back()->with('error', 'something went wrong');
        }

        return back();
    }
}
