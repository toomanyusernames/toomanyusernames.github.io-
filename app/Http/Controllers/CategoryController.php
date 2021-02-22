<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Contracts\Session\Session;
use Session;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('category.index')->withCategories($categories);
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'name' => 'required|unique:categories|max:255'
            ]);

            $category = new Category;
            $category->name = $request->name;
            $category->user_id = Auth::user()->id;
            $category->save();

            Session::flash('success', 'Category was added successfully');
            return redirect('/category');
        } else {
            return redirect('/login');
        }
    }

    public function showAll($name)
    {
        $category = Category::all()->where('name', '=', $name)->first();
        if ($category != null) {
            $posts = Post::all()->where('category_id', '=', $category->id)->sortByDesc('id');
            return view('category.showAll')->withPosts($posts);
        }
        return redirect('/post');
    }
}
