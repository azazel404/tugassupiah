<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Marketing;
use App\SukuBunga;
use App\Content;
use App\CategoryItem;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //ini untuk tampilan user > home
    private $categories;
    public function __construct()
    {
        $this->categories = Category::orderBy('created_at', 'desc')->get();
    }
    public function index()
    {
    	return view('layouts.user.home', ['categories' => $this->categories]);
    }

    public function contact()
    {
        $marketing = Marketing::all();
    	return view('layouts.user.contact', [
            'categories' => $this->categories,
            'marketings' => $marketing
        ]);
    }

    public function profile()
    {
    	return view('layouts.user.profile', ['categories' => $this->categories]);
    }

    public function sukuBunga()
    {
        $sukuBunga = SukuBunga::orderBy('name', 'asc')->paginate(18);
        return view('layouts.user.sukuBunga', ['SukuBungas' => $sukuBunga,'categories' => $this->categories]);
    	
    }

     public function content()
    {
        $content = Content::where('slug','=',$slug)->firstOrFail();
        return view('layout.user.content', ['Contents' => $this->content]);
    	
    }
}
