<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\PengajuanTabungan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PengajuanTabunganRequest;

class PengajuanTabunganController extends Controller
{
    public function index()
    {
    	$pengajuanTabungan = PengajuanTabungan::orderBy('name', 'asc')->paginate(12);
    	return vieW('layouts.admin.pengajuanTabungan.list', ['pengajuanTabungans' => $pengajuanTabungan]);
    }

    public function addPengajuanTabungan(PengajuanTabunganRequest $req)
    {
    	$pengajuanTabungan = new PengajuanTabungan;
    	$pengajuanTabungan->name = $req->name;
    	$pengajuanTabungan->file_pdf = $this->storeFilePdf($req->file_pdf);
    	$pengajuanTabungan->status = 1;
    	$pengajuanTabungan->save();

    	return back();
    }

    public function deletePengajuanTabungan($id)
    {
    	$pengajuanTabungan = PengajuanTabungan::findOrFail($id);
    	Storage::delete('public/form_tabungan/' . $pengajuanTabungan->file_pdf);
    	$pengajuanTabungan->delete();

    	return back();
    }

    public function storeFilePdf($file)
    {
    	$file = $file->store('public/form_tabungan');
    	return basename($file);
    }
}
