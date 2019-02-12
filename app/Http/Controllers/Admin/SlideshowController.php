<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use App\Slideshow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SlideshowRequest;

class SlideshowController extends Controller
{
    public function index()
    {
    	$slideshow = Slideshow::orderBy('created_at', 'desc')->paginate(18);
    	return view('layouts.admin.slideshow.list', ['slideshows' => $slideshow]);
    }

    public function addSlideshow()
    {
    	$content = Content::select('id', 'title')->orderBy('title', 'asc')->get();
    	return view('layouts.admin.slideshow.add', ['contents' => $content]);
    }

    public function createSlideshow(SlideshowRequest $req)
    {
    	$slideshow = new Slideshow;
    	$image = $req->image->store('public/slideshow');
    	$slideshow->image = basename($image);
    	$slideshow->content_id = $req->content_id;

    	if (!$slideshow->save()) {
            return back()->with('error', 'something went wrong');
        }

        return redirect()->route('admin.slideshow');
    }

    public function editSlideshow($id)
    {
        $content = Slideshow::find($id);
        $category = Category::orderBy('name', 'asc')->get();
        $category_item = CategoryItem::orderBy('name', 'asc')->get();

        return view('layouts.admin.slideshow.edit', ['content' => $content, 'categories' => $category, 'category_items' => $category_item]);
    }

    public function updateSlideshow(Request $req, $id)
    {
        $slideshow = Slideshow::find($id);
        $image = $req->image->store('public/slideshow');
    	$slideshow->image = basename($image);
    	$slideshow->content_id = $req->content_id;

        if ($req->hasFile('image')) {
            Storage::delete('public/slidesho/' . $slideshow->image);
            $image = $req->image->store('public/slideshow');
            $slideshow->image = basename($image);
        }

        if (!$slideshow->save()) {
            return back()->with('error', 'something went wrong');
        }

        return redirect()->route('admin.slideshow');
    }

    public function deleteSlideshow($id)
    {
        $slideshow = Slideshow::find($id);

        if (!$slideshow->delete()) {
            return back()->with('error', 'something went wrong');
        }

        if (!Storage::delete('public/slideshow/' . $content->image)) {
            return back()->with('error', 'something went wrong');
        }

        return back();
    }
}
