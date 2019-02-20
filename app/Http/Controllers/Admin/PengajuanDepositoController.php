<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\PengajuanDeposito;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PengajuanDepositoRequest;

class PengajuanDepositoController extends Controller
{
    public function index()
    {
    	$pengajuanDeposito = PengajuanDeposito::orderBy('name', 'asc')->paginate(12);
    	return vieW('layouts.admin.pengajuanDeposito.list', ['pengajuanDepositos' => $pengajuanDeposito]);
    }

    public function addPengajuanDeposito(PengajuanDepositoRequest $req)
    {
    	$pengajuanDeposito = new PengajuanDeposito;
    	$pengajuanDeposito->name = $req->name;
    	$pengajuanDeposito->file_pdf = $this->storeFilePdf($req->file_pdf);
    	$pengajuanDeposito->status = 1;
    	$pengajuanDeposito->save();

    	return back();
    }

    public function deletePengajuanDeposito($id)
    {
    	$pengajuanDeposito = PengajuanDeposito::findOrFail($id);
    	Storage::delete('public/form_deposito/' . $pengajuanDeposito->file_pdf);
    	$pengajuanDeposito->delete();

    	return back();
    }

    public function storeFilePdf($file)
    {
    	$file = $file->store('public/form_deposito');
    	return basename($file);
    }
}
