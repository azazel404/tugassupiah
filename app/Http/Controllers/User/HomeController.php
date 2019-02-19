<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Marketing;
use App\SukuBunga;
use App\Content;
use App\Slideshow;
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
        $content = Content::orderBy('created_at','desc')->limit(3)->get();
        $slideshow = Slideshow::orderBy('created_at', 'desc')->get();
    	return view('layouts.user.home', [
            'categories'    => $this->categories,
            'contents'      => $content,
            'slideshows'    => $slideshow
        ]);
    }

    public function contact()
    {
        $marketing = Marketing::all();
        $content = Content::orderBy('created_at', 'desc')->limit(5);
    	return view('layouts.user.contact', [
            'categories' => $this->categories,
            'marketings' => $marketing,
            'contents'   => $content
        ]);
    }

    public function profile()
    {
    	return view('layouts.user.profile', [
            'categories' => $this->categories
        ]);
    }

    public function sukuBunga()
    {
        $sukuBunga = SukuBunga::orderBy('name', 'asc')->paginate(18);
        $content = Content::orderBy('created_at', 'desc')->limit(5);
        return view('layouts.user.sukuBunga', [
            'SukuBungas' => $sukuBunga,
            'categories' => $this->categories,
            'contents'   => $content
        ]);

    }

    public function content()
    {
        // $content = Content::where('id','=',1)->firstOrFail();
        return view('layouts.user.content', ['categories' => $this->categories]);

    }
}
