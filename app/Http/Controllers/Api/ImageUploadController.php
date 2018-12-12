<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageUploadController extends Controller
{
    //
    public function uploadImage(Request $req)
    {
        $file = "";
        if ($req->hasFile('file')) {
            $file = $req->file->store('public/content');
        }

        return '/storage/content/'.basename($file);
    }
}
