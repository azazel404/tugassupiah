<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Marketing;
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
    	return view('layouts.user.sukuBunga', ['categories' => $this->categories]);
    }
}
