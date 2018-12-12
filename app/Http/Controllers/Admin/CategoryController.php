<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\CategoryItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /*
    | fungsi untuk liat semua list category
    */
    public function index()
    {
        $category = Category::orderBy('name', 'asc')->paginate(18);
        return view('layouts.admin.category.list', ['categories' => $category]);
    }

    /*
    |=================[CATEGORY]====================
    | fungsi untuk category
    |===============================================
    */
    public function addCategory()
    {
        return view('layouts.admin.category.add');
    }

    public function createCategory(CategoryRequest $req)
    {
        $category = new Category;
        $category->name = $req->name;
        if (!$category->save()) {
            return back()->with('error', 'something went wrong');
        }

        return redirect()->route('admin.category');
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('layouts.admin.category.edit', ['category' => $category]);
    }

    public function updateCategory(CategoryRequest $req, $id)
    {
        $category = Category::find($id);
        $category->name = $req->name;
        if (!$category->save()) {
            return back()->with('error', 'something went wrong');
        }

        return redirect()->route('admin.category');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if (!$category->delete()) {
            return back()->with('error', 'something went wrong');
        }

        return back();
    }

    /*
    |=================[CATEGORY ITEM]====================
    | fungsi untuk category_item
    |===============================================
    */

    public function createCategoryItem(CategoryRequest $req)
    {
        $category_item = new CategoryItem;
        $category_item->category_id = $req->category_id;
        $category_item->name = $req->name;

        if (!$category_item->save()) {
            return back()->with('error', 'something went wrong');
        }

        return back();
    }

    public function updateCategoryItem(CategoryRequest $req)
    {
        $category_item = CategoryItem::find($req->id);
        $category_item->name = $req->name;

        if (!$category_item->save()) {
            return back()->with('error', 'something went wrong');
        }

        return back();
    }

    public function deleteCategoryItem($id)
    {
        $category = CategoryItem::find($id);
        if (!$category->delete()) {
            return back()->with('error', 'something went wrong');
        }

        return back();
    }
}
